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
        <section class="w-full -mt-[100px]">
            <div class="w-full">
                    <div class="swiper slider">
                        <div class="swiper-wrapper">
                            @foreach ($slider as $slide)
                                <div class="swiper-slide"> 
                                    <div class="flex flex-col justify-center items-center w-full h-[600px] relative bg-center bg-cover" style="background-image: url({{asset($slide->url_image . $slide->name_image)}})">
                                        <div class="flex flex-col w-full justify-center items-center ">
                                            <div class="flex flex-col h-[300px] sm:h-[350px] md:h-full justify-center items-center gap-6 w-full text-center px-[5%] xl:px-[8%]">
                                                @php
                                                    $texto1 = $slide->title ?? "Ingrese un texto";
                                                    $texto_formateado1 = preg_replace('/\*(.*?)\*/', '<span class="text-[#FB4535]">$1</span>', e($texto1));
                                                @endphp
                                                <h2 class="leading-none font-akira_expanded text-3xl lg:text-4xl xl:text-5xl text-white max-w-3xl xl:line-clamp-5">
                                                    {!!$texto_formateado1!!}
                                                </h2>  
                                                <p class="text-white text-base font-roboto_regular max-w-xl xl:line-clamp-3">
                                                    {{$slide->description ?? "Ingrese un texto para la descripcion del slider"}} 
                                                </p>
                                                <div class="flex flex-row items-start justify-center">
                                                    <a href="{{$slide->link1}}">
                                                        <div class="text-white font-roboto_medium flex flex-row gap-2 bg-[#FB4535] rounded-3xl text-center w-auto py-3 px-6">
                                                            {{$slide->botontext1 ?? "Let´s Go!"}} 
                                                            
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M7 7H17M17 7V17M17 7L7 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>    
                                            </div>
                                            <div class="absolute bottom-[5%] md:bottom-[10%] left-[5%] flex flex-row gap-4 md:gap-0 md:flex-col items-center justify-center">
                                                <img class="object-cover w-28 object-left" src="{{asset('images/imagen/chicos.png')}}"/>
                                                <div class="flex flex-col md:mt-2 w-40 md:text-center">
                                                    <h2 class="leading-none font-akira_expanded text-3xl text-white ">
                                                        200+
                                                    </h2>
                                                    <p class="text-white text-sm font-roboto_regular">
                                                        Miembros activos
                                                    </p> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach    
                        </div>
                    </div>
            </div>    
        </section> 
      @endif

        @if (count($logos) > 0)
            <section class="z-10 col-span-2 bg-[#FB4535]">
                <div class="px-1 py-4 h-24 bg-azulmundoweb font-Pangea_Bold text-white text-2xl">
                    <div x-data="{}" x-init="$nextTick(() => {
                        let ul = $refs.logos;
                        ul.insertAdjacentHTML('afterend', ul.outerHTML);
                        ul.nextSibling.setAttribute('aria-hidden', 'true');
                        })"
                        class="px-[5%]  bg-azulmw w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">
                        <ul x-ref="logos"
                            class="h-16  flex flex-row justify-between items-center  [&_li]:mx-10   animate-infinite-scroll">
                            @foreach ($logos as $marquesina)
                                <li class="flex w-48 justify-center items-center gap-3 px-3"><img class="w-48 h-16 object-contain"
                                    src="{{asset($marquesina->url_image)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                                </li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 15 14" fill="none">
                                    <circle cx="7.74219" cy="7" r="7" fill="white"/>
                                </svg>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif

        <section class="py-12 px-[5%] xl:px-[8%]">
            <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-4 xl:gap-16">
                
                <div class="flex flex-col justify-center gap-5 sm:gap-3">
                    <div class="flex flex-row">
                        @if($textoshome->subtitle1section)
                        <span class="font-roboto_medium w-auto text-white bg-[#010101] rounded-3xl px-3 py-1">{{$textoshome->subtitle1section}}</span>
                        @endif
                    </div>

                    @if($textoshome->title1section)
                        <h2 class="leading-none font-akira_expanded text-4xl xl:text-5xl text-[#010101]">
                            {!! preg_replace('/\*(.*?)\*/', '<span class="text-[#FB4535]">$1</span>', $textoshome->title1section) !!}
                        </h2>
                    @endif

                    @if($textoshome->description1section)    
                        <div class="text-[#010101] text-base font-roboto_regular">
                            <p>{{$textoshome->description1section}}</p>
                        </div>
                    @endif
                    
                    <div class="flex flex-row items-start justify-start mt-2">
                        <a href="{{route('nosotros')}}"><div class="text-white font-roboto_medium flex flex-row gap-2 bg-[#FB4535] rounded-3xl text-center w-auto py-2.5 px-6">
                            Conoce más 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M7 7H17M17 7V17M17 7L7 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div></a>
                    </div>
                </div>
      
                <div class="flex flex-col justify-start items-start">
                    <img class="object-cover aspect-square max-h-[500px] w-full" src="{{ asset('images/imagen/imagenosotros.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/imagenosotros.png') }}';"  />
                </div>
      
            </div>
        </section> 
        
        <section class="pt-12 xl:pt-16 bg-[#F2F2F2] px-[5%] xl:px-[8%]">
            <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-12 xl:gap-16">
                
                @if($textoshome->title2section)
                    <div class="flex flex-col justify-start gap-5 lg:gap-7">
                        <h2 class="leading-none font-akira_expanded text-3xl xl:text-4xl text-[#010101]">
                            {!! preg_replace('/\*(.*?)\*/', '<span class="text-[#FB4535]">$1</span>', $textoshome->title2section) !!}
                        </h2>
                    </div>
                @endif

                <div class="flex flex-col justify-start gap-5 lg:gap-7">
                    @if($textoshome->description2section)
                        <div class="text-[#010101] text-base font-roboto_regular">
                            <p>{{$textoshome->description2section}}</p>
                        </div>
                    @endif
                </div>
      
            </div>   
        </section>

        @if (count($categorias)>0)
            <section class="py-12 xl:py-16 bg-[#F2F2F2]">
                <ul class="acordeon flex flex-row gap-5 justify-center items-end">
                    @foreach ($categorias as $category)
                        <li class="rounded-3xl {{ $loop->first ? 'active' : '' }} bg-cover bg-center bg-no-repeat h-full" style="background-image:  url('{{ asset($category->url_image . $category->name_image) }}')">
                            
                            <div class="divpadre flex flex-col justify-end items-start h-[530px] 2xl:h-[700px] relative">
                                
                                <div class="divcontain flex flex-row gap-5 xl:gap-20 items-end p-5">
                            
                                    <div class="divleft flex flex-col justify-center items-start w-full">
                                        <h2 class="leading-none font-akira_expanded text-3xl xl:text-4xl text-white text-left">
                                            {{$category->name}}  
                                        </h2>
                                        <p class="text-white text-base font-roboto_regular text-left line-clamp-3">
                                            {{$category->description}}  
                                        </p>
                                    </div>
                
                                    <div class="flex flex-col justify-center items-center">
                                        <a href="{{route('catalogo', $category->id)}}"><div class="flex flex-row justify-center items-center gap-2 bg-[#FB4535] rounded-3xl py-3 w-40">
                                            <p class="font-roboto_medium text-white text-base"> Conoce más</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M7 7H17M17 7V17M17 7L7 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        </a>
                                    </div>
                
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif        

        @if(count($categorias) > 0)
            <section class="w-full relative flex flex-col" >
                <img class="w-full h-full p-0 size-full object-cover object-center absolute z-10" src="{{ asset($textoshome->url_image3section) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/bannerphoenix.png') }}';" />
                <div class="px-[5%] py-20">
                    <div class="grid grid-cols-1 md:grid-cols-3 w-full z-20 relative">
                        <div class="md:col-span-2 flex flex-col gap-3">
                            @if($textoshome->subtitle3section)
                                <div class="flex flex-row">
                                    <span class="font-roboto_medium w-auto text-[#010101] bg-white rounded-3xl px-3 py-1">{{$textoshome->subtitle3section}}</span>
                                </div>
                            @endif

                            @if($textoshome->title3section)
                                <h2 class="leading-none font-akira_expanded  text-4xl xl:text-5xl text-white xl:line-clamp-2">
                                    {!! preg_replace('/\*(.*?)\*/', '<span class="text-[#FB4535]">$1</span>', $textoshome->title3section) !!}
                                </h2>
                            @endif

                            <div class="flex flex-row items-center justify-start">
                                <a href="{{route('catalogo', $categorias[0]->id)}}">
                                    <div class="text-white font-roboto_medium flex flex-row gap-2 bg-[#FB4535] rounded-3xl text-center w-auto py-2 px-6">
                                        Let´s Go!
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M7 7H17M17 7V17M17 7L7 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if (count($testimonie)>0)
            <section class="w-full px-[5%] py-20 bg-cover bg-center" style="background-image: url('{{ asset('images/imagen/Servicios.png') }}');">
                    <div class="w-full max-w-4xl mx-auto relative">
                        <div class="swiper carrusel_testimonios h-max ">
                            <div class="swiper-wrapper">
                              @foreach ($testimonie as $testimony)
                                @php
                                    $textot = $testimony->testimonie ?? "Ingrese un texto";
                                    $texto_formateado_t = preg_replace('/\*(.*?)\*/', '<span class="text-[#FB4535]">$1</span>', e($textot));
                                @endphp
                                <div class="swiper-slide">
                                    <div class="flex flex-col gap-10">
                                        <p class="leading-none font-akira_expanded text-2xl xl:text-3xl max-w-3xl mx-auto text-center text-[#010101]">
                                            {!!$texto_formateado_t!!}
                                        </p>
                                        <div class="flex flex-row gap-3 justify-center items-center">
                                            <img class="w-16 h-16 rounded-full object-cover" src="{{ asset($testimony->email) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/snor.png') }}';" />
                                            <div class="flex flex-col gap-1">
                                                <p class="leading-none font-akira_expanded text-xl text-center text-[#010101]">
                                                    {{$testimony->name}}
                                                </p>
                                                <p class="font-roboto_regular text-base text-[#010101]">
                                                    {{$testimony->ocupation}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex flex-row justify-center">
                                            <a href="{{route('contacto')}}"><div class="text-white font-roboto_medium flex flex-row gap-2 bg-[#FB4535] rounded-3xl text-center w-auto py-2.5 px-6">
                                                Sé parte de la familia Phoenix 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M7 7H17M17 7V17M17 7L7 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div></a>
                                        </div>
                                    </div>
                                </div>
                              @endforeach  
                            </div>
                        </div>
                        <div class="swiper-carrusel_testimonios-prev overflow-hidden absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-12 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-left text-3xl md:text-5xl text-[#000000]"></i></div>
                        <div class="swiper-carrusel_testimonios-next overflow-hidden absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-12 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-right  text-3xl md:text-5xl text-[#000000]"></i></div>
                    </div>
            </section>
        @endif
        

        @if ($general[0]->htop && $general[0]->ig_token)
            <div class="h-[500px]" id="map"></div>
        @endif
        

      {{-- @if ($categorias->isEmpty())  
      @else
        <section>
            <div class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
                    <div class="flex flex-col gap-2 max-w-4xl">
                        <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">{{$textoshome->title1section ?? "Ingrese un texto"}}</h4>
                        <h3 class="text-[#082252] font-galano_regular font-normal text-lg">
                            {{$textoshome->description1section ?? "Ingrese un texto"}}
                        </h3>
                    </div>
                    <div class="flex flex-row justify-start md:justify-center items-start">
                        <a href="{{route('catalogo.all')}}"
                            class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                            Ver todos los productos
                        </a>
                    </div>
                </div>
               
                <div class="w-full relative">  
                    <div class="swiper categorias h-max ">
                        <div class="swiper-wrapper">
                            @foreach ($categorias as $categoria)  
                                <div class="swiper-slide group">
                                    <div class="flex flex-col justify-center px-10 py-8 relative bg-[#EBEDEF] rounded-xl min-h-[210px] max-w-[300px] mx-auto transition-all duration-300 ease-in-out group-hover:bg-[#052F4E]">  
                                        <a href="{{ route('catalogo', $categoria->id ) }}">   
                                            <div class="flex flex-row w-full bottom-5">
                                                <div class="flex flex-col gap-4 justify-center items-center w-full">
                                                
                                                    <img class="group-hover:stroke-white group-hover:brightness-0 group-hover:invert" src="{{ asset($categoria->url_image . $categoria->name_image) }}" 
                                                    onerror="this.onerror=null;this.src='{{ asset('images/svg/heladoicono.svg') }}';" alt="producto"
                                                    class="w-full h-full object-contain md:object-cover object-right md:object-center">

                                                    <h2 class="text-[#052F4E] font-galano_semibold text-2xl text-center max-w-[200px] mx-auto line-clamp-2 transition-all duration-300 ease-in-out group-hover:text-white">
                                                        {{$categoria->name ?? "Nombre de categoria"}}
                                                    </h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach 
                        </div> 
                        
                    </div>
                    <div class="swiper-categorias-prev absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-5 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-left text-5xl text-[#052F4E]"></i></div>
                    <div class="swiper-categorias-next absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-5 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-right text-5xl text-[#052F4E]"></i></div>
                </div>
            </div>
        </section>
      @endif --}}
    
      {{-- @if ($productosPupulares->isEmpty())
      @else   
        <section>
            <div class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
                    <div class="flex flex-col gap-2 max-w-4xl">
                        <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">{{$textoshome->title2section ?? "Ingrese un texto"}}</h4>
                        <h3 class="text-[#082252] font-galano_regular font-normal text-lg">
                            {{$textoshome->description2section ?? "Ingrese un texto"}}
                        </h3>
                    </div>
                    <div class="flex flex-row justify-start md:justify-center items-start">
                        <a href="{{route('catalogo.all')}}"
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
      @endif --}}


    {{-- <section>
        <div class="flex flex-col gap-10 w-full px-[5%] pt-10 pb-10 lg:pb-0 bg-[#052F4E] mt-10 lg:mt-20">
            <h2 class="text-white font-maille text-text36 sm:text-4xl md:text-text44 leading-none text-center">
                {{$textoshome->title3section ?? "Ingrese un texto"}}
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-0">
                <div class="flex flex-col sm:flex-row gap-5 sm:gap-10 lg:flex-col justify-around">

                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado.png')}}" />
                        <h2 class="text-white text-2xl font-galano_medium">{{$textoshome->title4section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-lg font-galano_regular"> {{$textoshome->description4section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[30px] w-auto object-contain -right-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha1.png')}}" />
                    </div>

                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado2.png')}}" />
                        <h2 class="text-white text-2xl font-galano_medium">{{$textoshome->title5section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-lg font-galano_regular"> {{$textoshome->description5section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[25px] w-auto object-contain -right-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha2.png')}}" />
                    </div>

                </div>

                <div class="flex flex-col justify-end items-center">
                    <img class="h-[550px] w-full object-contain" src="{{asset($textoshome->url_image3section)}}"
                    onerror="this.onerror=null;this.src='{{ asset('images/imagen/heladocremoso.png') }}';" alt="producto" />
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
                        <h2 class="text-white text-2xl font-galano_medium">{{$textoshome->title6section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-lg font-galano_regular"> {{$textoshome->description6section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[40px] w-auto object-contain -left-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha3.png')}}" />
                    </div>

                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado4.png')}}" />
                        <h2 class="text-white text-2xl font-galano_medium">{{$textoshome->title7section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-lg font-galano_regular"> {{$textoshome->description7section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[80px] w-auto object-contain -left-[130px] top-0 translate-y-0" src="{{asset('images/imagen/flecha4.png')}}" />
                    </div>
                </div>
                
            </div>
        </div>
    </section> --}}

    {{-- @if ($blogs->isEmpty())
    @else
        <section>
            <div class="flex flex-col gap-10 lg:gap-14 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col gap-2 max-w-4xl mx-auto">
                    <h2 class="text-[#052F4E] font-galano_bold text-4xl md:text-text44 leading-none text-left lg:text-center">
                        {{$textoshome->title10section ?? "Ingrese un texto"}}
                    </h2>
                    <p class="text-[#052F4E] font-galano_regular text-lg text-left lg:text-center">
                        {{$textoshome->description10section ?? "Ingrese un texto"}}
                    </p>
                    <div class="flex flex-row justify-start md:justify-center items-start mt-3 lg:mt-6">
                        <a href="{{route('blog', 0)}}"
                            class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                            Ver todos
                        </a>
                    </div>
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach ($blogs as $post)
                        <x-blog.container-post :post="$post" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif --}}
   

    {{-- <section>
        <div class="flex flex-col gap-10 lg:gap-14 w-full px-0 md:pl-[5%]  bg-[#EBEDEF] mt-10 md:mt-20">

            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="flex flex-col gap-1 md:col-span-2 pt-10  md:py-16 px-[5%] md:px-0">
                    
                    <h2 class="text-[#052F4E] text-4xl md:text-5xl font-galano_bold leading-none"> {{$textoshome->title11section ?? "Ingrese un texto"}}</h2>
                    <p class="text-[#052F4E] text-lg font-galano_regular line-clamp-3">
                        {{$textoshome->description11section ?? "Ingrese un texto"}}
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
                    <img class="w-full min-h-[320px] h-full object-center object-cover" src="{{asset('images/imagen/heladosubscription.png')}}"
                    onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" alt="producto" />
                </div>
            </div>

        </div>
    </section> --}}

  
    {{-- <section>
        <div class="flex flex-col gap-10 w-full px-[5%] py-10 md:py-20 bg-white">
            
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-5 lg:gap-0">
                <div class="lg:col-span-2 flex flex-col justify-center">

                    <div class="flex flex-col p-2 justify-center items-start gap-8">
                        <h2 class="text-[#052F4E] text-4xl md:text-5xl font-maille leading-none">{{$textoshome->title8section ?? "Ingrese un texto"}}</h2>
                        <div class="flex flex-row justify-start items-start">
                            <a href="#"
                                class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-lg font-galano_light font-semibold text-center max-w-xs">
                                {{$textoshome->one_description8section ?? "Ingrese un texto"}}
                            </a>
                        </div>
                        <h2 class="text-[#052F4E] text-lg font-galano_regular">
                            {{$textoshome->two_description8section ?? "Ingrese un texto"}}
                        </h2>
                    </div>

                </div>

                <div class="lg:col-span-2 flex flex-col justify-end items-center">
                    <img class="h-96 md:h-[550px] w-full object-contain object-center" src="{{asset('images/imagen/heladobeneficios.png')}}"
                        onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" />
                </div>

                <div class="lg:col-span-1 flex flex-col sm:flex-row gap-5 sm:gap-10 lg:flex-col justify-around items-start lg:items-end">
                    <div class="flex flex-col pl-2 max-w-xs text-left md:text-right">
                        <h3 class="text-[#052F4E] text-6xl font-galano_bold">{{$benefit[0]->descripcionshort ?? "Ingrese texto"}}</h3>
                        <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">{{$benefit[0]->titulo ?? "Ingrese texto"}}</h2>
                        <p class="text-[#052F4E] text-sm font-galano_regular">{{$benefit[0]->descripcion ?? "Ingrese texto"}}</p>
                    </div>

                    <div class="flex flex-col pl-2 max-w-xs text-left md:text-right">
                        <h3 class="text-[#052F4E] text-6xl font-galano_bold">{{$benefit[1]->descripcionshort ?? "Ingrese texto"}}</h3>
                        <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">{{$benefit[1]->titulo ?? "Ingrese texto"}}</h2>
                        <p class="text-[#052F4E] text-sm font-galano_regular">{{$benefit[1]->descripcion ?? "Ingrese texto"}}</p>
                    </div>

                    <div class="flex flex-col pl-2 max-w-xs text-left md:text-right">
                        <h3 class="text-[#052F4E] text-6xl font-galano_bold">{{$benefit[2]->descripcionshort ?? "Ingrese texto"}}</h3>
                        <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">{{$benefit[2]->titulo ?? "Ingrese texto"}}</h2>
                        <p class="text-[#052F4E] text-sm font-galano_regular">{{$benefit[2]->descripcion ?? "Ingrese texto"}}</p>
                    </div>
                </div>
                
            </div>

        </div>
    </section> --}}
    
    
    {{-- @if ($testimonie->isEmpty())
    @else
        <section>
            <div class="flex flex-col gap-5 md:gap-10 w-full px-[5%] py-10 md:py-20 bg-[#EBEDEF]">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-12">
                    <div class="md:col-span-2">
                        <h2 class="text-[#052F4E] text-2xl font-galano_bold max-w-lg">
                            {{$textoshome->subtitle9section ?? "Ingrese un texto"}}
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
                        <a href="{{route('rse')}}" class="bg-[#052F4E] text-white px-6 py-2.5 rounded-xl font-galano_medium mt-2"> Ver más historias </a>
                    </div>
                    <div class="md:col-span-1 space-y-3">
                        <h2 class="text-[#052F4E] text-5xl font-galano_bold max-w-xl leading-none">
                                {{$textoshome->title9section ?? "Ingrese un texto"}}
                        </h2>
                        <div class="flex flex-row justify-start items-start">
                            <a
                                class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-base font-galano_light font-semibold text-left">
                                {{$textoshome->one_description9section ?? "Ingrese un texto"}}   
                            </a>
                        </div>
                        <h2 class="text-[#052F4E] text-lg font-galano_regular">
                                {{$textoshome->two_description9section ?? "Ingrese un texto"}}   
                        </h2>
                    </div>
                </div>
            </div>
        </section>
    @endif --}}

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
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries" >
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var latitude = {{ $general[0]->htop }};
            var longitude = {{ $general[0]->ig_token }};

            var location = [
                ['center', latitude, longitude],
            ];

            var mylatlng= {
                lat:location[0][1],
                lng: location[0][2]
            };

            var darkModeStyle = [
            { elementType: "geometry", stylers: [{ color: "#212121" }] },
            { elementType: "labels.icon", stylers: [{ visibility: "off" }] },
            { elementType: "labels.text.fill", stylers: [{ color: "#757575" }] },
            { elementType: "labels.text.stroke", stylers: [{ color: "#212121" }] },
            {
                featureType: "administrative",
                elementType: "geometry",
                stylers: [{ color: "#757575" }]
            },
            {
                featureType: "administrative.country",
                elementType: "labels.text.fill",
                stylers: [{ color: "#9e9e9e" }]
            },
            {
                featureType: "administrative.land_parcel",
                stylers: [{ visibility: "off" }]
            },
            {
                featureType: "administrative.locality",
                elementType: "labels.text.fill",
                stylers: [{ color: "#bdbdbd" }]
            },
            {
                featureType: "poi",
                elementType: "labels.text.fill",
                stylers: [{ color: "#757575" }]
            },
            {
                featureType: "poi.park",
                elementType: "geometry",
                stylers: [{ color: "#181818" }]
            },
            {
                featureType: "poi.park",
                elementType: "labels.text.fill",
                stylers: [{ color: "#616161" }]
            },
            {
                featureType: "poi.park",
                elementType: "labels.text.stroke",
                stylers: [{ color: "#1b1b1b" }]
            },
            {
                featureType: "road",
                elementType: "geometry.fill",
                stylers: [{ color: "#2c2c2c" }]
            },
            {
                featureType: "road",
                elementType: "labels.text.fill",
                stylers: [{ color: "#8a8a8a" }]
            },
            {
                featureType: "road.arterial",
                elementType: "geometry",
                stylers: [{ color: "#373737" }]
            },
            {
                featureType: "road.highway",
                elementType: "geometry",
                stylers: [{ color: "#3c3c3c" }]
            },
            {
                featureType: "road.highway.controlled_access",
                elementType: "geometry",
                stylers: [{ color: "#4e4e4e" }]
            },
            {
                featureType: "road.local",
                elementType: "labels.text.fill",
                stylers: [{ color: "#616161" }]
            },
            {
                featureType: "transit",
                elementType: "labels.text.fill",
                stylers: [{ color: "#757575" }]
            },
            {
                featureType: "water",
                elementType: "geometry",
                stylers: [{ color: "#000000" }]
            },
            {
                featureType: "water",
                elementType: "labels.text.fill",
                stylers: [{ color: "#3d3d3d" }]
            }
            ];
            

            var map= new google.maps.Map(document.getElementById("map"),{
                zoom:15,
                center: mylatlng,
                styles: darkModeStyle
            });
            for(var i=0; i< location.length; i++){
                new google.maps.Marker({
                    position: new google.maps.LatLng(location[i][1],location[i][2]),
                    map: map,
                    icon: {
                        url: "images/imagen/marcador.png", 
                        scaledSize: new google.maps.Size(60, 60), 
                        anchor: new google.maps.Point(20, 40) 
                    }
    
                });
            }
        });   
    </script>
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

        document.addEventListener("DOMContentLoaded", function() {
            const items = document.querySelectorAll("ul.acordeon li");

            items.forEach(item => {
                item.addEventListener("mouseover", function() {
                    items.forEach(el => el.classList.remove("active"));
                    this.classList.add("active");
                });
            });
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
            slidesPerView: 1,
            spaceBetween: 10,
            centeredSlides: false,
            initialSlide: 0,
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
                nextEl: ".swiper-categorias-next",
                prevEl: ".swiper-categorias-prev",
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


        var swiper = new Swiper(".carrusel_testimonios", {
            slidesPerView: 1,
            spaceBetween: 25,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-carrusel_testimonios-next",
                prevEl: ".swiper-carrusel_testimonios-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 25,
                },
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
