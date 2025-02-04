<?php

namespace App\Http\Responses;

use App\Helpers\EmailConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;


class RegisterResponse implements RegisterResponseContract
{

    public function toResponse($request)
    {
        $role = Auth::user()->roles->pluck('name');
        $usuario = Auth::user();
        
        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }

        Session::flash('welcome_message', "¡Bienvenido, {$usuario->name}!");
        
        switch ($role[0]) {
            case 'Admin':
                return redirect()->intended(config('fortify.home'));
            case 'Customer':
                $this-> envioCorreo($usuario);
                return redirect()->intended(config('fortify.home_public'));
            default:
                return redirect()->intended(config('fortify.home_public'));
        }
    }



    private function envioCorreo($data){
        
        $appUrl = env('APP_URL');
        $name = $data['name'];
        $mensaje = "Gracias por registrarte en ".env('APP_NAME');
        $mail = EmailConfig::config($name, $mensaje);
        try {
            $mail->addAddress($data['email']);
            $mail->Body = '<html lang="es">
            <head>
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <title>Mundo web</title>
              <link rel="preconnect" href="https://fonts.googleapis.com" />
              <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
              <link
                href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                rel="stylesheet"
              />
              <style>
                * {
                  margin: 0;
                  padding: 0;
                  box-sizing: border-box;
                }
              </style>
            </head>
            <body>
              <main>
                <table
                  style="
                    width: 600px;
                    height: 600px;
                    margin: 0 auto;
                    text-align: center;
                    background-image:url(' . $appUrl . '/mail/fondocontacto.png);
                    background-repeat: no-repeat, no-repeat;
                    background-position: center bottom , center bottom;;
                    background-size: fit , fit;
                    background-color: #f9f9f9;
                  "
                >
                  <thead>
                    
                  </thead>
                  <tbody>
                    <tr 
                      style=" 
                        display: grid;
                      "
                      >
                      <th
                        style="
                          display: flex;
                          flex-direction: row;
                          justify-content: center;
                          align-items: center;
                          margin: 40px 40px 0px 40px;
                        "
                      >
                        <img src="' . $appUrl . '/mail/logocontacto.png" alt="americanbrands"  style="
                        margin: auto;
                        width: 200px;
                        height: auto;
                        "
                        />
                      </th>
                    </tr>
                    

                    <tr style="display: grid;">
                      <td style="padding-bottom:15px;">
                        <p
                          style="
                            font-weight: 600;
                            font-size: 40px;
                            text-align: center;
                            color: #052F4E;
                            font-family: cursive;
                          "
                        >
                          ¡Bienvenido a MrCremoso!
                        </p>
                      </td>
                    </tr>

                    <tr style="display: grid;">
                      <td style="">
                        <p
                          style="
                            font-weight: 500;
                            font-size: 16px;
                            text-align: center;
                            color: #052F4E;
                            font-family: Google Sans;
                          "
                        >
                            ¡Hola!. Tu cuenta ha sido creada
                        </p>
                      </td>
                    </tr>
                    
                    <tr style="display: grid;">
                      <td style="text-align: center;">
                          <p
                            style=" 
                              font-weight: 500;
                              font-size: 16px;
                              text-align: center;
                              color: #052F4E;
                              font-family: Google Sans;
                            "
                          >
                            satisfactoriamente en www.mrcremosobasedehelados.com.pe
                          </p>
                      </td>
                    </tr>

                    <tr style="display: grid;">
                      <td
                        style="
                        text-align: center;
                        padding-top:15px
                        "
                      >
                        <a
                          href="' . $appUrl . '"
                          style="
                            text-decoration: none;
                            background-color: #052F4E;
                            color: white;
                            padding: 8px 16px;
                            display: inline-flex;
                            justify-content: center;
                            align-items: center;
                            font-weight: 600;
                            font-family: Google Sans;
                            font-size: 16px;
                            border-radius: 12px;
                            border: 1px solid #052F4E;
                          "
                        >
                          <span>Visita nuestra web</span>
                        </a>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </main>
            </body>
          </html>
          ';
            $mail->isHTML(true);
            $mail->send();
            
        } catch (\Throwable $th) {
            //throw $th;
        }
}

}