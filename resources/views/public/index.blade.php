@extends('components.public.matrix', ['pagina' => 'index'])
@section('css_importados')
    <style>
        @media (max-width: 600px) {
            .fixedWhastapp {
                right: 13px !important;
            }
        }

        .swiper-slider .swiper-pagination-bullet {
            width: 14px;
            height: 8px;
            border-radius: 6px;
            background-color: #ffffff !important;
        
        }

        .swiper-slider .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: rgba(255, 255, 255, 0.24)!important;
            opacity: 1;
        }

        .swiper-pagination-categorias .swiper-pagination-bullet {
            width: 14px;
            height: 8px;
            border-radius: 6px;
            background-color: #052F4E !important;
        
        }

        .swiper-pagination-categorias .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: #05304e56!important;
            opacity: 1;
        }

        .swiper-testimonios .swiper-pagination-bullet {
            width: 14px;
            height: 8px;
            border-radius: 6px;
            background-color: #052F4E !important;
        
        }

        .swiper-testimonios .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: #05304e56!important;
            opacity: 1;
        }

        .prose{
            line-height: 1.25;       
        }

        .extractoblog .prose{
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
    </style>
@stop

@php
    $bannersBottom = array_filter($banners, function ($banner) {
        return $banner['potition'] === 'inferior';
    });
    $bannerMid = array_filter($banners, function ($banner) {
        return $banner['potition'] === 'medio';
    });
@endphp

@section('content')

    <main class="z-[15]">

    {{-- @if (count($slider) > 0) 
        <section class="">
          <x-swipper-card :items="$slider" />
        </section>
      @endif --}}

      @if ($slider->isEmpty())
      @else
        <section class="w-full bg-[#052F4E] relative h-[700px] md:h-[550px]">
            <div class="w-full h-full absolute size-full"><img class="object-cover size-full" src="{{asset('images/imagen/texturacremosof.png')}}"/></div>
            <div class=" px-[5%] h-full flex flex-col">
                <div class="h-[580px] md:h-[420px] mt-10 lg:mt-16">
                <div class="swiper slider">
                    <div class="swiper-wrapper">
                        @foreach ($slider as $slide)
                            <div class="swiper-slide">
                                <div class="flex flex-col justify-center items-center max-w-[1000px]">
                                    <div class="bg-[#E6E4E5] h-[580px] md:h-[420px] gap-7 sm:gap-0 flex flex-col md:flex-row rounded-xl overflow-hidden">
                                        <div class="flex flex-col h-[300px] sm:h-[350px] md:h-full justify-start md:justify-center gap-6 w-full lg:w-1/2 text-left pt-6 md:pt-0 px-[5%] lg:pl-[5%] lg:pr-0">
                                            <h2 class="text-[#052F4E] font-maille text-text28 sm:text-4xl md:text-text44 leading-none line-clamp-3">
                                                {{$slide->title ?? "Ingrese un texto para el titulo del slider"}}</h2>
                                            <p class="text-[#052F4E] font-galano_regular line-clamp-4">
                                                {{$slide->description ?? "Ingrese un texto para la descripcion del slider"}}</p>
                                            <div class="flex flex-row items-start justify-start">
                                                <a href="{{$slide->link1}}"><div class="text-white font-galano_semibold bg-[#052f4e] rounded-xl text-center w-auto py-2 px-6">{{$slide->botontext1 ?? "Comprar ahora"}}</div></a>
                                            </div>    
                                        </div>
                                        <div class="flex flex-col h-[280px] sm:h-[230px] md:h-full justify-center items-center w-full lg:w-1/2">
                                                <img src="{{ asset($slide->url_image . $slide->name_image) }}"
                                                    onerror="this.onerror=null;this.src='images/imagen/helados.png';" alt="producto"
                                                    class="w-full h-full object-contain md:object-cover object-right md:object-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach    
                    </div>
                    <div class="swiper-slider !flex justify-center py-3 mt-3"></div>
                </div>
                </div>  
            </div>    
        </section>
      @endif


      @if ($categorias->isEmpty())  
      @else
        <section>
            <div class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
                    <div class="flex flex-col gap-2 max-w-4xl">
                        <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">Descubre Nuestras Categorías de Productos</h4>
                        <h3 class="text-[#082252] font-galano_regular font-normal text-lg">
                            Explora nuestra amplia variedad de suplementos para heladerías. Cada categoría está diseñada para ayudarte a crear helados únicos y deliciosos que sorprenderán a tus clientes.
                        </h3>
                    </div>
                    <div class="flex flex-row justify-start md:justify-center items-start">
                        <a href="#"
                            class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                            Ver todos los productos
                        </a>
                    </div>
                </div>    
                <div class="w-full">  
                    <div class="swiper categorias h-max">
                        <div class="swiper-wrapper">
                            @foreach ($categorias as $categoria)  
                                <div class="swiper-slide group">
                                    <div class="flex flex-col justify-center px-10 py-8 relative bg-[#EBEDEF] rounded-xl min-h-[210px] max-w-[300px] mx-auto transition-all duration-300 ease-in-out group-hover:bg-[#052F4E]">  
                                        <div class="flex flex-row w-full bottom-5">
                                            <div class="flex flex-col gap-4 justify-center items-center w-full">
                                                {{-- <svg class="transition-all duration-300 ease-in-out " xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 65 65" fill="none">
                                                    <path class="group-hover:stroke-white" d="M20.5 32.6582L22.7051 39.8467C26.6886 52.8321 28.6803 59.3249 32.5 59.3249C36.3197 59.3249 38.3115 52.8321 42.2949 39.8467L44.5 32.6582" stroke="#052F4E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path class="group-hover:stroke-white" d="M32.5026 23.7719C32.5026 25.3633 32.9418 26.857 33.7109 28.1491M33.7109 28.1491C31.7487 30.8736 28.4559 32.6608 24.7248 32.6608C18.7111 32.6608 13.8359 28.0179 13.8359 22.2904C13.8359 17.2682 17.5846 13.0797 22.5624 12.1245C24.2644 8.51105 28.0749 5.99414 32.5026 5.99414C38.0277 5.99414 42.5914 9.91299 43.297 14.9913M33.7109 28.1491C35.3143 30.8429 38.3522 32.6608 41.8359 32.6608C46.9906 32.6608 51.1693 28.6811 51.1693 23.7719C51.1693 19.3361 47.7575 15.6591 43.297 14.9913M43.297 14.9913C43.3594 15.4406 43.3914 15.899 43.3914 16.3645C43.3914 17.955 43.0154 19.4619 42.3437 20.809" stroke="#052F4E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg> --}}
                                                <img class="group-hover:stroke-white group-hover:brightness-0 group-hover:invert" src="{{ asset($categoria->url_image . $categoria->name_image) }}"
                                               
                                                class="w-full h-full object-contain md:object-cover object-right md:object-center">

                                                <h2 class="text-[#052F4E] font-galano_semibold text-2xl text-center max-w-[200px] mx-auto line-clamp-2 transition-all duration-300 ease-in-out group-hover:text-white">
                                                    {{$categoria->name ?? "Nombre de categoria"}}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach 
                        </div>
                        <div class="swiper-pagination-categorias !flex justify-center py-3 mt-3"></div>
                    </div>
                </div>
            </div>
        </section>
      @endif
    
      @if ($productosPupulares->isEmpty())
      @else   
        <section>
            <div class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
                    <div class="flex flex-col gap-2 max-w-4xl">
                        <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">Nuestros productos destacados</h4>
                        <h3 class="text-[#082252] font-galano_regular font-normal text-lg">
                            Explora nuestra amplia variedad de suplementos para heladerías. Cada categoría está diseñada para ayudarte a crear helados únicos y deliciosos que sorprenderán a tus clientes.
                        </h3>
                    </div>
                    <div class="flex flex-row justify-start md:justify-center items-start">
                        <a href="#"
                            class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                            Ver todos los productos
                        </a>
                    </div>
                </div>    
                <div class="w-full">  
                    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-5 gap-x-8">
                        @foreach ($productosPupulares as $item)
                            <x-product.card_product_cremoso :item="$item" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
      @endif


    <section>
        <div class="flex flex-col gap-10 w-full px-[5%] pt-10 pb-10 lg:pb-0 bg-[#052F4E] mt-10 lg:mt-20">
            <h2 class="text-white font-maille text-text36 sm:text-4xl md:text-text44 leading-none text-center">
                Una mejor base, un mejor helado
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-0">
                <div class="flex flex-col sm:flex-row gap-5 sm:gap-10 lg:flex-col justify-around">

                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado.png')}}" />
                        <h2 class="text-white text-2xl font-galano_medium">Versatilidad de Usos</h2>
                        <h2 class="text-white text-lg font-galano_regular">Suplementos que se adaptan a todo tipo de recetas y procesos.</h2>
                        <img class="hidden xl:flex absolute h-[30px] w-auto object-contain -right-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha1.png')}}" />
                    </div>

                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado2.png')}}" />
                        <h2 class="text-white text-2xl font-galano_medium">Ingredientes de Alta Calidad</h2>
                        <h2 class="text-white text-lg font-galano_regular">Fórmulas desarrolladas para resultados consistentes y sabrosos.</h2>
                        <img class="hidden xl:flex absolute h-[25px] w-auto object-contain -right-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha2.png')}}" />
                    </div>

                </div>

                <div class="flex flex-col justify-end items-center">
                    <img class="h-[550px] w-full object-contain" src="{{asset('images/imagen/heladocremoso.png')}}" />
                    <div class="lg:hidden flex flex-row justify-start md:justify-center items-start">
                        <a href="#"
                            class="text-[#052F4E] py-3 px-6 bg-white rounded-xl text-base font-galano_regular font-semibold text-center max-w-xs mx-auto">
                            ¡Prueba la diferencia y dale un gusto a tu día!
                        </a>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-5 sm:gap-10 lg:flex-col justify-around items-start lg:items-end">
                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado3.png')}}" />
                        <h2 class="text-white text-2xl font-galano_medium">Certificación y Seguridad</h2>
                        <h2 class="text-white text-lg font-galano_regular">Productos avalados por normas de calidad y seguridad alimentaria.</h2>
                        <img class="hidden xl:flex absolute h-[40px] w-auto object-contain -left-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha3.png')}}" />
                    </div>

                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado4.png')}}" />
                        <h2 class="text-white text-2xl font-galano_medium">Envíos Rápidos y Soporte Personalizado</h2>
                        <h2 class="text-white text-lg font-galano_regular">Te asistimos en cada paso del proceso, desde la compra hasta la implementación.</h2>
                        <img class="hidden xl:flex absolute h-[80px] w-auto object-contain -left-[130px] top-0 translate-y-0" src="{{asset('images/imagen/flecha4.png')}}" />
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    @if ($blogs->isEmpty())
    @else
        <section>
            <div class="flex flex-col gap-10 lg:gap-14 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col gap-2 max-w-4xl mx-auto">
                    <h2 class="text-[#052F4E] font-galano_bold text-4xl md:text-text44 leading-none text-left lg:text-center">
                        Describe de qué trata tu blog
                    </h2>
                    <p class="text-[#052F4E] font-galano_regular text-lg text-left lg:text-center">
                        Mauris euismod vehicula eros egestas venenatis. Vestibulum non pulvinar risus. Praesent hendrerit lectus ultrices purus consectetur, eu sollicitudin libero pretium.
                    </p>
                    <div class="flex flex-row justify-start md:justify-center items-start mt-3 lg:mt-6">
                        <a href="#"
                            class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                            Ver todos
                        </a>
                    </div>
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach ($blogs as $blog)
                        <div class="flex flex-col gap-1">
                            <img class="w-full h-[250px] lg:h-[300px] object-cover" src="{{ asset($blog->url_image.$blog->name_image)}}" onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';" />
                            <h2 class="text-[#052F4E] text-base font-galano_regular font-semibold mt-3">{{$blog->categories->name ?? "S/C"}}</h2>
                            <h2 class="text-[#052F4E] text-2xl font-galano_bold line-clamp-1">{{$blog->title}}</h2>
                            <div class="text-[#052F4E] text-lg font-galano_regular line-clamp-3 extractoblog">
                                {!! Str::limit($blog->extract, 250) !!}
                            </div>
                            <h2 class="text-[#052F4E] text-base font-galano_regular font-semibold mt-1">Publicado {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</h2>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
   

    <section>
        <div class="flex flex-col gap-10 lg:gap-14 w-full px-0 md:pl-[5%]  bg-[#EBEDEF] mt-10 md:mt-20">

            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="flex flex-col gap-1 md:col-span-2 pt-10  md:py-16 px-[5%] md:px-0">
                    
                    <h2 class="text-[#052F4E] text-4xl md:text-5xl font-galano_bold leading-none">Suscríbete a nuestra newsletter</h2>
                    <p class="text-[#052F4E] text-lg font-galano_regular line-clamp-3">
                        Mauris euismod vehicula eros egestas venenatis. Vestibulum non pulvinar risus. 
                        Praesent hendrerit lectus ultrices purus consectetur, eu sollicitudin libero pretium.
                    </p>
                    <div class="flex flex-col md:flex-row gap-3 mt-10">
                        <form id="subsEmail">
                        <input id="emailFooter" type="email" name="email" class="rounded-xl text-base font-galano_regular w-[250px]"  placeholder="Ingresa tu correo electronico"  />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit" class="bg-[#052F4E] text-white px-6 py-2 rounded-xl font-galano_regular w-32"> Inscribirse </button>
                        </form>
                    </div>
                    <h2 class="text-[#052F4E] text-sm font-galano_regular mt-1">Al hacer clic en Inscribirse, confirma que acepta nuestros Términos y condiciones.</h2>
                </div>

                <div class="flex flex-col gap-1 md:col-span-1">
                    <img class="w-full min-h-[320px] h-full object-center object-cover" src="{{asset('images/imagen/heladosubscription.png')}}" />
                </div>
            </div>

        </div>
    </section>

  
    <section>
        <div class="flex flex-col gap-10 w-full px-[5%] py-10 md:py-20 bg-white">
            
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-5 lg:gap-0">
                <div class="lg:col-span-2 flex flex-col justify-center">

                    <div class="flex flex-col p-2 justify-center items-start gap-8">
                        <h2 class="text-[#052F4E] text-4xl md:text-5xl font-maille leading-none">Insumos de Calidad para Heladerías Excepcionales</h2>
                        <div class="flex flex-row justify-start items-start">
                            <a href="#"
                                class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-lg font-galano_light font-semibold text-center max-w-xs">
                                ¡Prueba la magia en cada producto!
                            </a>
                        </div>
                        <h2 class="text-[#052F4E] text-lg font-galano_regular">
                            Encuentra todos los ingredientes y suplementos que tu heladería necesita para destacar. 
                            Desde bases cremosas hasta toppings exclusivos, ofrecemos productos que harán que tus creaciones sean irresistibles.
                        </h2>
                    </div>

                </div>

                <div class="lg:col-span-2 flex flex-col justify-end items-center">
                    <img class="h-96 md:h-[550px] w-full object-contain object-center" src="{{asset('images/imagen/heladobeneficios.png')}}" />
                </div>

                <div class="lg:col-span-1 flex flex-col sm:flex-row gap-5 sm:gap-10 lg:flex-col justify-around items-start lg:items-end">
                    <div class="flex flex-col pl-2 max-w-xs text-left md:text-right">
                        <h3 class="text-[#052F4E] text-6xl font-galano_bold">15+</h3>
                        <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">Años de Experiencia</h2>
                        <p class="text-[#052F4E] text-sm font-galano_regular">Proveemos a heladerías profesionales en todo el país.</p>
                    </div>

                    <div class="flex flex-col pl-2 max-w-xs text-left md:text-right">
                        <h3 class="text-[#052F4E] text-6xl font-galano_bold">80+</h3>
                        <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">Productos en Nuestro Catálogo</h2>
                        <p class="text-[#052F4E] text-sm font-galano_regular">Ofrecemos una amplia gama de suplementos para cubrir todas tus necesidades.</p>
                    </div>

                    <div class="flex flex-col pl-2 max-w-xs text-left md:text-right">
                        <h3 class="text-[#052F4E] text-6xl font-galano_bold">99%</h3>
                        <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">Clientes Satisfechos</h2>
                        <p class="text-[#052F4E] text-sm font-galano_regular">La mayoría de nuestros clientes recomiendan nuestros productos por su calidad y efectividad.</p>
                    </div>
                </div>
                
            </div>

        </div>
    </section>
    
    
    @if ($testimonie->isEmpty())
    @else
        <section>
            <div class="flex flex-col gap-5 md:gap-10 w-full px-[5%] py-10 md:py-20 bg-[#EBEDEF]">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-12">
                    <div class="md:col-span-2">
                        <h2 class="text-[#052F4E] text-2xl font-galano_bold max-w-lg">
                            ¡Déjanos tu experiencia y forma parte de nuestra historia de sabor!
                        </h2>
                        <div class="gap-6 py-6">
                                <div class="swiper testimonios">
                                    <div class="swiper-wrapper">
                                        @foreach ($testimonie as $testimony)
                                        <div class="swiper-slide">
                                            <div class="flex flex-col gap-2 p-3 bg-white rounded-xl line-clamp-5">
                                                <h2 class="text-[#052F4E] text-sm font-galano_regular">
                                                    {{$testimony->testimonie}}
                                                </h2>
                                                <h2 class="text-[#052F4E] text-lg font-galano_medium leading-none">{{$testimony->name}}</h2>
                                            </div>  
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-testimonios !flex justify-center py-3 mt-3"></div>
                                </div>
                        </div>
                        <a class="bg-[#052F4E] text-white px-6 py-2.5 rounded-xl font-galano_medium mt-2"> Ver más historias </a>
                    </div>
                    <div class="md:col-span-1 space-y-3">
                        <h2 class="text-[#052F4E] text-5xl font-galano_bold max-w-xl leading-none">
                            Lo Que Dicen Nuestros Clientes
                        </h2>
                        <div class="flex flex-row justify-start items-start">
                            <a href="#"
                                class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-base font-galano_light font-semibold text-left">
                                ¡Déjanos tu experiencia y forma parte de nuestra historia de sabor!
                            </a>
                        </div>
                        <h2 class="text-[#052F4E] text-lg font-galano_regular">
                            Conoce las opiniones de quienes han disfrutado de nuestros helados artesanales. 
                            ¡Descubre por qué nuestros sabores se han convertido en sus favoritos!
                        </h2>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- @if (count($logosdestacados) > 0) 
        <section class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7 md:gap-8 relative mx-auto pt-12 lg:pt-16">
           @foreach ($logosdestacados as $logosd)
             <a href="/catalogo?marcas={{$logosd->id}}">
                <div class="flex flex-col justify-end bg-white h-[300px] lg:h-[350px] w-full bg-no-repeat object-top bg-center bg-contain" 
                 style=" background-image: url('{{ asset($logosd->url_image2) }}')"
                 >
                    <div class="flex flex-col justify-end items-center w-full pb-[7%]">
                        
                        <img src="{{ asset($logosd->url_image) }}" class="h-16 object-contain"/>
                    </div>
                </div>
              </a>
           @endforeach 
        </section>
    @endif     --}}
        

    {{-- @if (count($logos) > 0)    
        <section class="w-full px-[5%] relative mx-auto pt-12 lg:pt-16">
              <h2 class="text-center font-Urbanist_Black text-2xl lg:text-3xl text-black">TAMBIÉN PUEDES ENCONTRAR</h2>
        </section>
    
         <section class="w-full px-[5%] relative mx-auto pt-12 lg:pt-16">
            <div class="swiper otrasmarcas h-max">
                <div class="swiper-wrapper">
                  @foreach ($logos as $logosn)  
                    <div class="swiper-slide">
                      <a href="/catalogo?marcas={{$logosn->id}}">
                        <div class="bg-no-repeat object-top bg-center bg-cover h-[350px] flex flex-row  items-center p-2 ">
                            <img class="w-full h-full object-contain" src="{{ asset($logosn->url_image2) }}" />
                        </div>
                      </a>
                    </div>
                  @endforeach   
                </div>
                <div class="flex flex-row justify-center items-center relative mt-10">
                    <div class="swiper-pagination-otrasmarcas absolute top-full bottom-0 z-10 right-full !left-1/2 "></div>
                </div>
            </div>
        </section>
    @endif --}}



    {{-- @if (count($logos) > 0)    
        <section class="w-full px-[5%] relative mx-auto pt-12 lg:pt-16">
              <h2 class="text-center font-Urbanist_Black text-2xl lg:text-3xl text-black">TAMBIÉN PUEDES ENCONTRAR</h2>
        </section>
    
         <section class="w-full px-[5%] relative mx-auto pt-12 lg:pt-16">
            <div class="swiper otrasmarcas h-max">
                <div class="swiper-wrapper">
                  @foreach ($logos as $logosn)  
                    <div class="swiper-slide">
                      <a href="/catalogo?marcas={{$logosn->id}}">
                        <div class="bg-no-repeat object-top bg-center bg-cover h-[350px] md:h-[350px] xl:h-[350px]  flex flex-row  items-center p-5 "
                            style=" background-image: url('{{ asset($logosn->url_image2) }}')">
                            <div class="flex flex-col justify-center  h-[300px] lg:h-[350px] w-full bg-no-repeat object-top bg-center bg-cover">
                                <div class="flex flex-col justify-end items-center w-full">
                                    <img src="{{ asset($logosn->url_image) }}" class="h-16 object-contain"/>
                                </div>
                            </div>
                        </div>
                      </a>
                    </div>
                  @endforeach   
                </div>
                <div class="flex flex-row justify-center items-center relative mt-10">
                    <div class="swiper-pagination-cat absolute top-full bottom-0 z-10 right-full !left-1/2 "></div>
                </div>
            </div>
        </section>
    @endif --}}


    {{-- @if (count($destacados) > 0)  
        <section class="w-full px-[5%] relative mx-auto pt-12 lg:pt-16">
              <h2 class="text-center font-Urbanist_Black text-2xl lg:text-3xl text-black">COMPLEMENTA TU ESTILO</h2>
        </section>
            
         <section class="w-full px-[5%] relative mx-auto pt-12 lg:pt-16">
            <div class="swiper complementos h-max">
                <div class="swiper-wrapper">
                  @foreach ($destacados as $productosd)       
                    <div class="swiper-slide">
                        <a href="{{route('producto', $productosd->id)}}">
                            <div class="flex flex-row justify-center items-center aspect-square">
                                <div class="max-w-[350px] rounded-full  flex flex-col items-center p-5 ">
                                    <img class="w-full h-full object-contain rounded-full" src="{{ asset($productosd->imagen) }}" />
                                </div>
                            </div>
                        </a>
                        <div class="flex flex-col justify-center items-center gap-1 mt-3">
                          <p class="font-Urbanist_Semibold text-base text-black line-clamp-1">{{ optional($productosd->category)->name }}</p>
                          <a href="{{route('producto', $productosd->id)}}">  
                            <h2 class="font-Urbanist_Semibold text-base text-[#8f8f8f] line-clamp-1">{{$productosd->producto}}</h2>
                          </a>  
                          @if($productosd->descuento > 0)
                            <p class="font-Urbanist_Semibold text-lg text-black">S/ {{$productosd->descuento}} <span class="text-sm line-through text-[#8f8f8f]"> S/ {{$productosd->precio}}</span></p>
                          @else
                            <p class="font-Urbanist_Semibold text-lg text-black">S/ {{$productosd->precio}}</p>
                          @endif
                        </div>
                    </div>
                  @endforeach    
            </div>
            <div class="flex flex-row justify-center items-center relative mt-10">
                <div class="swiper-pagination-complementos absolute top-full bottom-0 z-10 right-full !left-1/2 "></div>
            </div>
        </section>
    @endif --}}



    {{-- <section class="w-full px-[5%] relative mx-auto pt-12 lg:pt-16">
        <h2 class="text-center font-Urbanist_Black text-2xl lg:text-3xl text-black">FOLLOW US <span class="font-Urbanist_Regular"> ON </span> 
        <span class="font-Urbanist_Regular italic"> @americanbrandspe </span></h2>
    </section> --}}

    {{-- <section class="w-full relative mx-auto pt-12 lg:pt-16">
            <div class="swiper instagram h-max">
                <div class="swiper-wrapper">
                    @php
                        
                        $filteredMedia = array_filter($media, function ($item) {
                            return $item['media_type'] === 'IMAGE' || $item['media_type'] === 'CAROUSEL_ALBUM';
                        });
                    @endphp
                    @foreach (array_slice($filteredMedia, 0, 12) as $item)
                        <div class="swiper-slide">
                            <div class="relative group aspect-square h-full">
                                <img src="{{ $item['media_url'] }}" alt="Image" class="object-cover h-full w-full">
                                <a href="{{ $item['permalink'] }}" target="_blank"
                                    class="opacity-0 hover:cursor-pointer group-hover:opacity-60 duration-300 absolute inset-0 flex justify-center items-center bg-black bg-opacity-70">
                                </a>
                            </div>
                        </div>
                    @endforeach    
                    @foreach (array_slice($media, 0, 12) as $item)
                        <div class="swiper-slide">
                            <div class="relative group aspect-square h-full">
                                @if ($item['media_type'] === 'IMAGE' || $item['media_type'] === 'CAROUSEL_ALBUM')
                                    <img src="{{ $item['media_url'] }}" alt="Image" class="object-cover h-full w-full">
                                    <a href="{{ $item['permalink'] }}" target="_blank"
                                        class="opacity-0 hover:cursor-pointer group-hover:opacity-60 duration-300 absolute inset-0 flex justify-center items-center bg-black bg-opacity-70">
                                    </a>
                                    <img
                                        class="opacity-0 group-hover:opacity-100 duration-300 absolute inset-x-0 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                        src="{{ asset('img_donas/instagram.svg') }}">
                                @elseif ($item['media_type'] === 'VIDEO')
                                    <div class="h-full overflow-hidden">
                                        <video class="min-h-full min-w-full">
                                            <source src="{{ $item['media_url'] }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <a href="{{ $item['permalink'] }}" target="_blank"
                                            class="opacity-0 hover:cursor-pointer group-hover:opacity-60 duration-300 absolute inset-0 flex justify-center items-center bg-black bg-opacity-70">
                                        </a>
                                        <img
                                            class="opacity-0 group-hover:opacity-100 duration-300 absolute inset-x-0 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                            src="{{ asset('img_donas/instagram.svg') }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section> --}}

    </main>



    <!-- Main modal -->
    <div id="modalofertas" class="modal modalbanner">
        <!-- Modal body -->
        <div class="p-1 ">
            <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
        </div>
    </div>

    @if(Session::has('welcome_message'))
    <div id="welcome-popup" class="claseocultar fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded shadow-lg text-center">
                <h2 class="text-lg font-bold mb-4">{{ Session::get('welcome_message') }}</h2>
                <button id="close-popup" class="bg-blue-500 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
        </div>
    @endif


@section('scripts_importados')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const popup = document.getElementById('welcome-popup');
            const closeButton = document.getElementById('close-popup');

            if (popup) {
                popup.classList.remove('hidden'); // Mostrar el popup

                closeButton.addEventListener('click', () => {
                    popup.classList.add('hidden'); // Ocultar el popup
                });
            }
        });
    </script>  

    <script>
        let pops = @json($popups);

        function calcularTotal() {
            let articulos = Local.get('carrito')
            let total = articulos.map(item => {
                let monto
                if (Number(item.descuento) !== 0) {
                    monto = item.cantidad * Number(item.descuento)
                } else {
                    monto = item.cantidad * Number(item.precio)

                }
                return monto

            })
            const suma = total.reduce((total, elemento) => total + elemento, 0);

            $('#itemsTotal').text(`S/. ${suma.toFixed(2)} `)

        }
        $(document).ready(function() {
            console.log(pops.length)
            if (pops.length > 0) {
                $('#modalofertas').modal({
                    show: true,
                    fadeDuration: 100
                })

            }


            $(document).ready(function() {
                articulosCarrito = Local.get('carrito') || [];

                // PintarCarrito();
            });

        })
    </script>

    <script>

         var swiper = new Swiper(".slider", {
            slidesPerView: 1.2,
            spaceBetween: 10,
            centeredSlides: false,
            initialSlide: 1,
            grabCursor: true,
            loop: true,
             autoplay: {
                delay: 4000, 
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                600: {
                    slidesPerView: 1.2,
                }
            },
            pagination: {
                el: ".swiper-slider",
                clickable: true,
            },
        });


        var swiper = new Swiper(".categorias", {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination-categorias",
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                650: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1350: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });


        var swiper = new Swiper(".testimonios", {
            slidesPerView: 2,
            spaceBetween: 25,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-testimonios",
                clickable: true
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 25,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                }
            },
        });

        var swiper = new Swiper(".otrasmarcas", {
            slidesPerView: 4,
            spaceBetween: 25,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination-otrasmarcas",
                clickable: true,
                dynamicBullets: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 25,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1350: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
            },
        });


        var swiper = new Swiper(".complementos", {
            slidesPerView: 5,
            spaceBetween: 25,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination-complementos",
                clickable: true,
                dynamicBullets: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 25,
                },
                600: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1350: {
                    slidesPerView: 5,
                    spaceBetween: 25,
                },
            },
        });


        var swiper = new Swiper(".instagram", {
            slidesPerView: 6,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                600: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                },
                1350: {
                    slidesPerView: 5,
                    spaceBetween: 0,    
                },
            },
        });


        var swiper = new Swiper(".promo", {
            slidesPerView: 1,
            spaceBetween: 50,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            pagination: {
                el: ".swiper-pagination-promo",
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
            },
        });
    </script>
@stop

@stop
