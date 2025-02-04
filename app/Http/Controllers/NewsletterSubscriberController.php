<?php

namespace App\Http\Controllers;

use App\Helpers\EmailConfig;
use App\Models\General;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(NewsletterSubscriber $newsletterSubscriber)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(NewsletterSubscriber $newsletterSubscriber)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, String $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(NewsletterSubscriber $newsletterSubscriber)
  {
    //
  }

  public function showSubscripciones()
  {
    $subscripciones = NewsletterSubscriber::orderBy('created_at', 'desc')->get();

    return view('pages.subscripciones.index', compact('subscripciones'));
  }

  public function guardarUserNewsLetter(Request $request)
  {
    NewsletterSubscriber::create($request->all());
    $data = $request->all();
    $data['nombre'] = '';
    $this->envioCorreo($data);
    $this->envioCorreoInterno($data);
    return response()->json(['message' => 'Usuario suscrito']);
  }

  private function envioCorreo($data)
  {

    $appUrl = env('APP_URL');
    $appName = env('APP_NAME');
    $name = '';
    $mensaje = "Gracias por comunicarte con $appName";
    $mail = EmailConfig::config($name, $mensaje);
    $general = General::all()->first();
    // dd($mail);
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
                      ¡Gracias por suscribirte! 
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
                    Pronto recibirás nuestras últimas noticias, artículos
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
                       y promociones directamente en tu correo.
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
      // dump($th);
    }
  }

  private function envioCorreoInterno($data)
  {
    /* $name = $data['full_name']; */
    $name = 'MrCremoso';
    $appUrl = env('APP_URL');
    // $name = $data['full_name'];
    $mensaje = "Tienes un nuevo mensaje";
    $mail = EmailConfig::config($name, $mensaje);
    $emailCliente = General::all()->first();
    $general = General::all()->first();

    try {
      $mail->addAddress($emailCliente->email);
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
                      ¡Nuevo suscriptor!
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
                        ¡Hola!. Administrador de MrCremoso
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
                        Tienes un nuevo suscriptor en la web
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

  public function envioMasivo($plantilla){
    try {
      //code...
      $subscripciones = NewsletterSubscriber::all();
      $general = General::all()->first();
      $appUrl = env('APP_URL');
      $name = '';
      $mensaje = env('APP_NAME'). 'Acaba de publicar un nuevo post ';
      $mail = EmailConfig::config($name, $mensaje);
      $mail->Subject = 'Nuevo Post Publicado';
      $mail->Body = $plantilla;
      $mail->isHTML(true);
      foreach ($subscripciones as $subscripcion) {
        $mail->addBCC($subscripcion->email);
        
      }
      $mail->send();
      return response()->json(['message' => 'Correo enviado']);
    } catch (\Throwable $th) {
      //throw $th;
      // dump($th);
    }
   
  }
}
