<?php

namespace App\Providers;

use App\Http\Controllers\IndexController;
use App\Models\BeneficiosSinIntereses;
use App\Models\Blog;
use App\Models\CampanasPublicitarias;
use App\Models\Category;
use App\Models\ClientLogos;
use App\Models\Discount;
use App\Models\General;
use App\Models\LibroReclamaciones;
use App\Models\Message;
use App\Models\NuestrasTiendas;
use App\Models\PlazosDeReembolso;
use App\Models\PoliticaDatos;
use App\Models\PoliticasCookies;
use App\Models\PolyticsCondition;
use App\Models\Products;
use App\Models\Sale;
use App\Models\SeguimientoPedido;
use App\Models\Service;
use App\Models\Shortcode;
use App\Models\Tag;
use App\Models\TermsAndCondition;
use App\Models\TimeAndPriceDelivery;
use App\Models\TratamientoAdicionalDatos;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // if (env('APP_ENV') === 'production') {
        //     URL::forceScheme('https');
        // }

        View::composer('auth.register', function ($view) {
            $termsAndCondicitions = TermsAndCondition::first();
            $politicas = PoliticaDatos::first();
            $view->with(['politicas' => $politicas, 'terminos' => $termsAndCondicitions]);
        });

        View::composer('components.public.footer', function ($view) {


            // Obtener los datos del footer
            $general = General::all(); // Suponiendo que tienes un modelo Footer y un método footerData() en él
            // Pasar los datos a la vista
            $categoriasf = Category::where('status', '=', 1)->where('visible', '=', 1)->get();
            //jalar datos de un controlador 
            $politicDev = PolyticsCondition::first();
            $termsAndCondicitions = TermsAndCondition::first();
            $politicaDatos = PoliticaDatos::first();

            $TimeAndPriceDelivery = TimeAndPriceDelivery::first();
            $PlazosDeReembolso = PlazosDeReembolso::first();
            $TratamientoAdicionalDatos = TratamientoAdicionalDatos::first();
            $PoliticasCookies = PoliticasCookies::first();
            $CampanasPublicitarias = CampanasPublicitarias::first();
            $BeneficiosSinIntereses = BeneficiosSinIntereses::first();
            $SeguimientoPedido = SeguimientoPedido::first();
            $NuestrasTiendas = NuestrasTiendas::first();
            $logosfooter = Service::where('visible', true)->get();

            $services = Service::where("status", "=", true)
                ->where("visible", "=", true)
                ->get();

            $view->with(['categoriasf'=> $categoriasf, 'services'=>$services, 'logosfooter'=> $logosfooter,'NuestrasTiendas'=> $NuestrasTiendas, 'SeguimientoPedido'=> $SeguimientoPedido, 'BeneficiosSinIntereses'=> $BeneficiosSinIntereses, 'CampanasPublicitarias'=> $CampanasPublicitarias, 'TratamientoAdicionalDatos'=> $TratamientoAdicionalDatos, 'PoliticasCookies'=> $PoliticasCookies, 'PoliticasCookies'=> $PoliticasCookies, 'PlazosDeReembolso'=> $PlazosDeReembolso,'TimeAndPriceDelivery'=> $TimeAndPriceDelivery,'general' => $general, 'politicas' => $politicDev, 'terminos' => $termsAndCondicitions, 'politicaDatos' => $politicaDatos]);
        });

        View::composer('components.public.header', function ($view) {

            $datosgenerales = General::all();
            $blog = Blog::where('status', '=', 1)->where('visible', '=', 1)->get(); // Suponiendo que tienes un modelo Footer y un método footerData() en él
            $categoriasMenu = Category::where('status', '=', 1)->where('visible', '=', 1)->where('is_menu', 1)->get();
            $categoriasf = Category::where('status', '=', 1)->where('visible', '=', 1)->get();
            $categorias = Category::where("status", "=", true)->where('is_menu', 1)->with(['subcategories' => function ($query) {
                $query->whereHas('products');
            }])->get();

            $marcas = ClientLogos::where('status', true)->where('visible', true)->get();
                 
            $tags = Tag::where('is_menu', 1)
                ->where("status", "=", true)
                ->where("visible", "=", true)
                ->whereHas('productos')
                ->get();
            
            $services = Service::where("status", "=", true)
                ->where("visible", "=", true)
                ->get();

            $offerExists = Products::where('status', true)
                ->where('descuento', '>', 0)
                ->exists();

            // Pasar los datos a la vista
            $view->with([
                'datosgenerales' => $datosgenerales,
                'blog' => $blog,
                'categoriasMenu' => $categoriasMenu,
                'tags' => $tags,
                'marcas' => $marcas,
                'offerExists' => $offerExists,
                'categorias' => $categorias,
                'services' => $services,
                'categoriasf'=> $categoriasf
            ]);
        });

        View::composer('components.app.sidebar', function ($view) {
            // Obtener los datos del footer
            $salesCount = Sale::where('status_id', 3)->count();
            $mensajes = Message::where('is_read', '!=', 1)->where('status', '!=', 0)->count(); // Suponiendo que tienes un modelo Footer y un método footerData() en él
            $reclamo =  LibroReclamaciones::where('is_read', '!=', 1)->where('status', '!=', 0)->count();
            // Pasar los datos a la vista
            $view
                ->with('salesCount', $salesCount)
                ->with('mensajes', $mensajes)
                ->with('reclamo', $reclamo);
        });

        View::composer('components.shortcode.contain_body', function ($view) {
            $shortcode = Shortcode::find(1);
           
            $view->with('shortcode', $shortcode);
        });


        View::composer('components.shortcode.contain_head', function ($view) {
            $shortcode = Shortcode::find(1);
           
            $view->with('shortcode', $shortcode);
        });

        PaginationPaginator::useTailwind();
    }
}
