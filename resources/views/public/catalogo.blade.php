@extends('components.public.matrix', ['pagina' => 'catalogo'])
@section('title', 'Productos | ' . config('app.name', 'Laravel'))

@section('css_importados')

  <style>
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
    
    .selected {
        background-color: #052F4E !important;
    }
   
    .iconwhite{
        stroke: white;
        filter: brightness(0) invert(1);
    }

    div.prose{
        color: white;
    }
  </style>
@stop


@section('content')

  @php
    $breadcrumbs = [['title' => 'Inicio', 'url' => route('index')], ['title' => 'Catálogo', 'url' => '']];
  @endphp

  {{-- @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
  @endcomponent --}}

  
  <section>
      <div class="flex flex-col gap-10 w-full px-[5%] xl:px-[8%] pt-10 md:pt-20">
          <div class="flex flex-col items-center justify-center text-center">
              <div class="flex flex-col gap-2 max-w-3xl mx-auto">
                <h2 class="leading-none font-akira_expanded  text-4xl xl:text-[56px] text-[#010101]">
                    Explora Todo lo que <span class="text-[#FB4535]"> Ofrecemos</span>
                </h2>
              </div>
          </div>    
          <div class="w-full relative flex justify-center items-center">  
                <div class="bg-[#F0F1F0] flex flex-wrap justify-center items-center max-w-5xl gap-10 rounded-3xl p-6">
                    @foreach ($categories as $categorias)
                        <a href="{{route('catalogo', $categorias->id)}}">
                            <h2 class="@if($id_cat == $categorias->id) activo @endif underline-this leading-none font-akira_expanded max-w-[200px] text-center text-2xl text-[#010101] basis-auto">
                                {{$categorias->name}}
                            </h2>
                        </a>
                    @endforeach
                </div>
          </div>
      </div>
  </section>

  <section class="flex flex-col gap-10 w-full px-[5%] xl:px-[8%] py-10 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 w-full ">
            
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-3 w-full">
                    <h2 class="leading-none font-akira_expanded text-3xl xl:text-4xl text-[#010101]">
                        {{$categoria->name}}
                    </h2>
                
                    <p class="text-[#010101] text-base font-roboto_regular">
                        {{$categoria->description}}
                    </p>

                    <div class="flex flex-row">
                        <a href="#planes"><div class="text-white font-roboto_medium flex flex-row gap-2 bg-[#FB4535] rounded-3xl text-center w-auto py-2.5 px-6">
                            Conoce más 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M7 7H17M17 7V17M17 7L7 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div></a>
                    </div>

                </div>
               
                <div class="flex flex-col gap-3 w-full">
                    <h2 class="leading-none font-akira_expanded text-xl xl:text-2xl text-[#010101]">
                        Detalles del Plan
                    </h2>
                    @php
                        $duraciones = [];
                        if (!empty($categoria->duracion)) {
                            preg_match_all('/<p>(.*?)<\/p>/s', $categoria->duracion, $matches);
                            $duraciones = array_filter(array_map(fn($text) => trim(strip_tags($text)), $matches[1]), fn($text) => !empty($text));
                        }
                    @endphp
                    
                    @if (!empty($duraciones))
                        <div class="flex flex-row gap-1">
                            <svg class="w-10" xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                                <path d="M1.15499 18.225L6.87898 25.5287L12.6709 18.1401C11.7028 18.7686 10.225 19.2951 7.93206 19.4989L13.724 14.5393L12.7728 12.5011L8.95116 4.39915L6.87898 0L4.8068 4.41614L0.96815 12.518L0 14.5732L5.77494 19.4989C3.58386 19.2951 2.12314 18.8195 1.15499 18.225Z" fill="url(#paint0_linear_52_2722)"/>
                                <defs>
                                <linearGradient id="paint0_linear_52_2722" x1="-16.8693" y1="89.3844" x2="-16.8693" y2="6.06777" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#F47F35"/>
                                <stop offset="1" stop-color="#EE493C"/>
                                </linearGradient>
                                </defs>
                            </svg>
                            <div>
                                <h3 class="font-roboto_bold text-xl text-[#000000]">Duración</h3>
                                
                                <ul class="font-roboto_regular text-lg text-[#000000] list-disc list-inside">
                                    @foreach ($duraciones as $duracion)
                                        <li>{{ $duracion }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    
                    @php
                        $frecuencias = [];
                        if (!empty($categoria->frecuencia)) {
                            preg_match_all('/<p>(.*?)<\/p>/s', $categoria->frecuencia, $matches);
                            $frecuencias = array_filter(array_map(fn($text) => trim(strip_tags($text)), $matches[1]), fn($text) => !empty($text));
                        }
                    @endphp

                    @if (!empty($frecuencias))
                        <div class="flex flex-row gap-1">
                            <svg class="w-10" xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                                <path d="M1.15499 18.225L6.87898 25.5287L12.6709 18.1401C11.7028 18.7686 10.225 19.2951 7.93206 19.4989L13.724 14.5393L12.7728 12.5011L8.95116 4.39915L6.87898 0L4.8068 4.41614L0.96815 12.518L0 14.5732L5.77494 19.4989C3.58386 19.2951 2.12314 18.8195 1.15499 18.225Z" fill="url(#paint0_linear_52_2722)"/>
                                <defs>
                                <linearGradient id="paint0_linear_52_2722" x1="-16.8693" y1="89.3844" x2="-16.8693" y2="6.06777" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#F47F35"/>
                                <stop offset="1" stop-color="#EE493C"/>
                                </linearGradient>
                                </defs>
                            </svg>
                            <div>
                                <h3 class="font-roboto_bold text-xl text-[#000000]">Frecuencia</h3>
                                <ul class="font-roboto_regular text-lg text-[#000000] list-disc list-inside">
                                    @foreach ($frecuencias as $frec)
                                        <li>{{ $frec }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @php
                        $horarios = [];
                        if (!empty($categoria->horario)) {
                            preg_match_all('/<p>(.*?)<\/p>/s', $categoria->horario, $matches);
                            $horarios = array_filter(array_map(fn($text) => trim(strip_tags($text)), $matches[1]), fn($text) => !empty($text));
                        }
                    @endphp

                    @if (!empty($horarios))
                        <div class="flex flex-row gap-1">
                            <svg class="w-10" xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                                <path d="M1.15499 18.225L6.87898 25.5287L12.6709 18.1401C11.7028 18.7686 10.225 19.2951 7.93206 19.4989L13.724 14.5393L12.7728 12.5011L8.95116 4.39915L6.87898 0L4.8068 4.41614L0.96815 12.518L0 14.5732L5.77494 19.4989C3.58386 19.2951 2.12314 18.8195 1.15499 18.225Z" fill="url(#paint0_linear_52_2722)"/>
                                <defs>
                                <linearGradient id="paint0_linear_52_2722" x1="-16.8693" y1="89.3844" x2="-16.8693" y2="6.06777" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#F47F35"/>
                                <stop offset="1" stop-color="#EE493C"/>
                                </linearGradient>
                                </defs>
                            </svg>
                            <div>
                                <h3 class="font-roboto_bold text-xl text-[#000000]">Horario</h3>
                                <ul class="font-roboto_regular text-lg text-[#000000] list-disc list-inside">
                                    @foreach ($horarios as $horario)
                                    <li>{{ $horario }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="flex flex-col gap-3 w-full">
                    <h2 class="leading-none font-akira_expanded text-xl xl:text-2xl text-[#010101]">
                        Beneficios del Servicio
                    </h2>
                   
                    @foreach ($beneficios as $benef)
                        <div class="flex flex-row gap-1">
                            <svg class="w-10" xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                                <path d="M1.15499 18.225L6.87898 25.5287L12.6709 18.1401C11.7028 18.7686 10.225 19.2951 7.93206 19.4989L13.724 14.5393L12.7728 12.5011L8.95116 4.39915L6.87898 0L4.8068 4.41614L0.96815 12.518L0 14.5732L5.77494 19.4989C3.58386 19.2951 2.12314 18.8195 1.15499 18.225Z" fill="url(#paint0_linear_52_2722)"/>
                                <defs>
                                <linearGradient id="paint0_linear_52_2722" x1="-16.8693" y1="89.3844" x2="-16.8693" y2="6.06777" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#F47F35"/>
                                <stop offset="1" stop-color="#EE493C"/>
                                </linearGradient>
                                </defs>
                            </svg>
                            <div>
                                <h3 class="font-roboto_bold text-xl text-[#000000]">{{ $benef->tittle }}</h3>
                                <p class="font-roboto_regular text-lg">{{ $benef->specifications }}</p>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>    
            <div class="flex flex-col justify-start gap-5">
                <img class="object-cover aspect-square galeriatotal rounded-3xl max-h-[500px] w-full cursor-pointer" src="{{ asset($categoria->url_image . $categoria->name_image) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/imagencatalog.png') }}';"  />
                <div class="grid grid-cols-2 gap-5">
                    @foreach ($galeria as $galery)
                        <img class="object-cover galeriatotal aspect-square rounded-2xl max-h-[500px] w-full cursor-pointer" src="{{ asset($galery->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/imagengrid.png') }}';"  />
                    @endforeach
                </div>
            </div>
            
        </div>
  </section>

  @if (count($productos)>0)
    <section id="planes" class="flex flex-col gap-10 w-full px-[5%] xl:px-[8%] py-10 md:py-14 bg-[#F0F1F0]">

            <div class="w-full relative">
                <div class="swiper carrusel_planes h-max ">
                    <div class="swiper-wrapper">
                    @foreach ($productos as $producto)
                        <div class="swiper-slide">
                            <div class="flex flex-col gap-4 bg-[#FB4535] p-6 rounded-3xl">
                                <div class="flex flex-wrap justify-between items-end">
                                    <h3 class="text-[#010101] text-base font-roboto_medium flex flex-row gap-2 bg-white rounded-3xl text-center w-auto py-1 px-3">
                                        {{$producto->producto}}
                                    </h3>
                                    <h3 class="text-white text-3xl font-roboto_medium flex flex-row w-auto items-center gap-2"> 
                                        S/{{$producto->precio}} <span class="text-base font-roboto_regular">/Mes</span>
                                    </h3>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h2 class="leading-none font-akira_expanded text-2xl xl:text-3xl text-white">
                                        {{$producto->extract}}
                                    </h2>
                                
                                    <div class="!text-white text-base font-roboto_regular">
                                        {!!$producto->description!!}
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button id="btnAgregarCarritoPr" data-id="{{ $producto->id }}"> <div class="bg-[#010101] rounded-3xl p-3 flex flex-row items-center justify-center">
                                    <span class="text-white font-roboto_bold text-center">Contratar Plan Básico</span>
                                </div></button>

                                @php
                                    $caracteristicas = [];
                                    if (!empty($producto->peso)) {
                                        preg_match_all('/<p>(.*?)<\/p>/s', $producto->peso, $matches);
                                        $caracteristicas = array_filter(array_map(fn($text) => trim(strip_tags($text)), $matches[1]), fn($text) => !empty($text));
                                    }
                                @endphp
                                @if (!empty($caracteristicas))
                                    <div class="flex flex-col">
                                        @foreach ($caracteristicas as $index => $caracteristica)
                                            <div class="flex flex-row gap-2">
                                                <svg class="w-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 17" fill="none">
                                                    <path d="M9.59919 10.0992L6.39919 6.89919M14.3325 14.8325L13.3992 13.8992M2.59919 3.09919L1.66586 2.16586M12.4372 14.8225C12.1872 15.0726 11.8481 15.2132 11.4944 15.2132C11.1408 15.2133 10.8016 15.0729 10.5515 14.8229C10.3014 14.5728 10.1609 14.2337 10.1608 13.8801C10.1608 13.5265 10.3012 13.1873 10.5512 12.9372L9.37319 14.1159C9.12309 14.366 8.78388 14.5065 8.43019 14.5065C8.0765 14.5065 7.73729 14.366 7.48719 14.1159C7.23709 13.8658 7.09659 13.5266 7.09659 13.1729C7.09659 12.8192 7.23709 12.48 7.48719 12.2299L11.7299 7.98719C11.98 7.73709 12.3192 7.59659 12.6729 7.59659C13.0266 7.59659 13.3658 7.73709 13.6159 7.98719C13.866 8.23729 14.0065 8.5765 14.0065 8.93019C14.0065 9.28388 13.866 9.62309 13.6159 9.87319L12.4372 11.0512C12.6873 10.8012 13.0265 10.6608 13.3801 10.6608C13.7337 10.6609 14.0728 10.8014 14.3229 11.0515C14.5729 11.3016 14.7133 11.6408 14.7132 11.9944C14.7132 12.3481 14.5726 12.6872 14.3225 12.9372L12.4372 14.8225ZM4.26852 9.01119C4.01842 9.26129 3.67922 9.40179 3.32552 9.40179C2.97183 9.40179 2.63262 9.26129 2.38252 9.01119C2.13242 8.76109 1.99192 8.42188 1.99192 8.06819C1.99192 7.7145 2.13242 7.37529 2.38252 7.12519L3.56119 5.94719C3.43735 6.07098 3.29035 6.16917 3.12856 6.23615C2.96678 6.30313 2.79339 6.33759 2.61829 6.33756C2.26466 6.3375 1.92553 6.19696 1.67552 5.94686C1.55173 5.82302 1.45354 5.67601 1.38656 5.51423C1.31958 5.35245 1.28513 5.17906 1.28516 5.00395C1.28522 4.65032 1.42576 4.3112 1.67586 4.06119L3.56119 2.17586C3.8112 1.92576 4.15032 1.78522 4.50395 1.78516C4.67906 1.78513 4.85245 1.81958 5.01423 1.88656C5.17601 1.95354 5.32302 2.05173 5.44686 2.17552C5.57069 2.29932 5.66893 2.44629 5.73597 2.60805C5.80301 2.76981 5.83753 2.94319 5.83756 3.11829C5.83759 3.29339 5.80313 3.46678 5.73615 3.62856C5.66917 3.79035 5.57098 3.93735 5.44719 4.06119L6.62519 2.88252C6.87529 2.63242 7.2145 2.49192 7.56819 2.49192C7.92188 2.49192 8.26109 2.63242 8.51119 2.88252C8.76129 3.13262 8.90179 3.47183 8.90179 3.82552C8.90179 4.17922 8.76129 4.51842 8.51119 4.76852L4.26852 9.01119Z" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <h2 class="text-white text-base font-roboto_medium w-full">{{$caracteristica}}</h2>
                                            </div> 

                                            @if ($index < count($caracteristicas) - 1)
                                                <div class="bg-white h-[1px] w-full mx-auto my-3"></div>
                                            @endif
                                        @endforeach  
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach  
                    </div>
                </div>
                <div class="swiper-carrusel_planes-prev overflow-hidden absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-12 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-left text-3xl md:text-5xl text-[#000000]"></i></div>
                <div class="swiper-carrusel_planes-next overflow-hidden absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-12 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-right  text-3xl md:text-5xl text-[#000000]"></i></div>
            </div>

    </section>
  @endif
  {{-- <section class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-16">
    <div class="flex flex-col gap-2">
        <h2 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none subtitle">
          @if($id_cat != 0 )
            {{$categoria->name}}
          @else
            Todas las categorias 
          @endif
        </h2>
        <p class="text-[#082252] font-roboto font-normal text-text18 description">
          @if($id_cat != 0 )
            {{$categoria->description}}
          @endif    
        </p>
        <input type="hidden" id="valorcategoria" />
    </div>
  </section> --}}

  {{-- <section>
      <div class="flex flex-col gap-10 w-full px-[5%] py-10 ">
          <div class="w-full">  
              <div id="getProductAjax" class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-5 gap-x-8">
                    @foreach ($productos as $item)
                        <x-product.card_product_cremoso :item="$item" />
                    @endforeach
              </div>
          </div>
      </div>

      <div class="flex justify-center items-center mb-10">
            <a href="javascript:;" @if (empty($page) || $page == 0) style="display:none;" @endif
                data-page={{ $page }}
                class="text-white py-3 px-5 border-2 bg-[#052F4E] rounded-xl font-galano_regular font-semibold  w-60 text-center  text-sm md:text-base  px-6 cargarMas">
                Cargar más modelos
            </a>
      </div>
  </section> --}}

  <div id="modalgaleriatotal" class="modal !px-[0px] !py-[0px] !z-50" style="display: none; max-width: 650px !important; width: 100% !important;">
    <div class="flex flex-col gap-3">
        <div class="">
          <div class="swiper galeriadeimagenes">
            <div class="swiper-wrapper">
              
              @foreach ($galeria as $galery)
                <div class="swiper-slide">
                  <img loading="lazy" src="{{ asset($galery->imagen) }}" class="object-cover w-full max-h-[450px] rounded-none overflow-hidden"/>
                </div>
              @endforeach

              @if ($categoria->name_image)
                <div class="swiper-slide">
                  <img loading="lazy" src="{{ asset($categoria->url_image . $categoria->name_image) }}" class="object-cover w-full max-h-[450px] rounded-none overflow-hidden"/>
                </div>
              @endif
             
            </div>
          </div>
          <div class="swiper-galeria-prev absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-5 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-left text-5xl text-[#FB4535]"></i></div>
          <div class="swiper-galeria-next absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-5 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-right text-5xl text-[#FB4535]"></i></div>
        </div>
    </div>
</div>

@section('scripts_importados')


  <script src="{{ asset('js/storage.extend.js') }}"></script>
  <script>
    $(document).ready(function () {
        $(document).on('click', '.galeriatotal', function () {
            $(`#modalgaleriatotal`).modal({
                show: true,
                fadeDuration: 400,
            });
        });
    });
  </script>
  <script>
    var galeria = new Swiper(".galeriadeimagenes", {
      slidesPerView: 1,
      autoHeight: true,
      spaceBetween:0,
      loop: true,
      centeredSlides: false,
      initialSlide: 0, 
      allowTouchMove: true,
      autoplay: {
        delay: 5500,
        disableOnInteraction: true,
        pauseOnMouseEnter: true
      },
      navigation: {
                nextEl: ".swiper-galeria-next",
                prevEl: ".swiper-galeria-prev",
            },
      });
  </script>
  <script>
     var swiper = new Swiper(".carrusel_planes", {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-carrusel_planes-next",
                prevEl: ".swiper-carrusel_planes-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                950: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                }
            },
        });
  </script>
  <script>
    $('document').ready(function() {

        $('.categoryselect').click(function() {

            var id = $(this).attr('id'); 

            $('.categoryselect .select').removeClass('selected');
            $('.categoryselect img').removeClass('stroke-white');
            $('.categoryselect img').removeClass('brightness-0');
            $('.categoryselect img').removeClass('invert');
            $('.categoryselect h2').removeClass('text-white');
            $(this).find('.select').addClass('selected');
            $(this).find('img').addClass('stroke-white');
            $(this).find('img').addClass('brightness-0');
            $(this).find('img').addClass('invert');
            $(this).find('h2').addClass('text-white');


            $.ajax({
                
                url: '{{ route('getSubcategoria') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    console.log(response.productos);
  
                    $('.subtitle').empty();
                    $('.subtitle').text(response.categorias[0].extract);

                    $('.description').empty();
                    $('.description').text(response.categorias[0].description);

                    $('.cargarMas').attr('data-page', response.page);

                    if (response.page == 0) {
                        $('.cargarMas').hide();
                    } else {
                        $('.cargarMas').show();
                    }

                    $('#getProductAjax').empty();
                    $.each(response.productos.data, function(key, value) {
                        console.log(response.productos.data);
                        var productoUrl = `{{ route('producto', ':id') }}`.replace(
                            ':id', value.id);
                        var imagenSrc = `{{ asset(':imagen') }}`.replace(':imagen', value.imagen);

                        $('#getProductAjax').append(
                            `<div class="flex flex-col group relative">
                                <a href="${productoUrl}">
                                    <div class="bg-[#F2F5F7] border-[2px] border-[#052F4E66] rounded-xl flex flex-row aspect-[17/20]">
                                        <div class="max-w-[340px]  flex flex-col items-center justify-center p-5">
                                            <img class="w-full h-full object-contain object-bottom "
                                                alt="${value.producto}"
                                                src="${imagenSrc}"
                                                onerror="this.onerror=null;this.src='/images/imagen/noimagen.jpg';" />
                                        </div>
                                    </div>
                                </a>
                                <div class="flex flex-col justify-center items-center gap-1 mt-3">
                                    <div class="flex flex-col md:flex-row w-full">
                                        <div class="flex flex-col w-full lg:w-2/3 gap-1">
                                            <a class="" href="${productoUrl}">  
                                                <h2 class="font-galano_regular font-semibold text-[#052F4E] leading-5 text-base md:text-lg line-clamp-2">${value.producto}</h2>
                                            </a>
                                            <div class="font-galano_regular text-[#052F4E] text-xs line-clamp-2 leading-3">
                                                ${value.description}
                                            </div>  
                                        </div>
                                        <div class="flex flex-row lg:flex-col lg:justify-start items-center gap-2 lg:gap-0 lg:items-end w-full lg:w-1/3">
                                            ${value.descuento == 0 ? `
                                                <p class="font-galano_regular font-bold text-lg text-[#052F4E] text-start lg:text-end">S/ ${value.precio}</p>
                                            ` : `
                                                <p class="font-galano_regular font-bold text-lg text-[#052F4E] text-start lg:text-end">S/ ${value.descuento}</p>
                                                <p class="font-galano_regular text-sm line-through text-[#052F4E] text-start lg:text-end">S/ ${value.precio}</p>
                                            `}
                                        </div> 
                                    </div>
                                </div>
                                <div class="flex flex-row gap-1 mt-2 inset-0 items-end justify-center opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                                    <a href="${productoUrl}"
                                        class="text-white text-sm md:text-base py-2 px-6 w-full bg-[#052F4E] rounded-xl font-galano_regular font-semibold text-center">
                                        Ver producto
                                    </a>
                                </div>
                            </div>`
                        );
                    });


                },
                error: function(error) {

                }
            });

        });


        $('body').delegate('.cargarMas', 'click', function() {
            
            var page = $(this).attr('data-page');
            $('.cargarMas').html('Cargando...');

            var id = $('#valorcategoria').val();
 
            $.ajax({
                    url: "{{ route('getTotalProductos') }}?page=" + page,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    dataType: "json",
                    cache: false,
                    success: function(response) {
                        console.log(response.page);
                      
                        $.each(response.productos.data, function(key, value) {

                            var productoUrl = `{{ route('producto', ':id') }}`.replace(
                                ':id', value.id);
                            var imagenSrc = `{{ asset(':imagen') }}`.replace(':imagen', value.imagen);

                            $('#getProductAjax').append(
                                `<div class="flex flex-col group relative">
                                <a href="${productoUrl}">
                                    <div class="bg-[#F2F5F7] border-[2px] border-[#052F4E66] rounded-xl flex flex-row aspect-[17/20]">
                                        <div class="max-w-[340px] flex flex-col items-center justify-center p-5">
                                            <img class="w-full h-full object-contain object-bottom"
                                                alt="${value.producto}"
                                                src="${imagenSrc}"
                                                onerror="this.onerror=null;this.src='/images/imagen/noimagen.jpg';" />
                                        </div>
                                    </div>
                                </a>
                                <div class="flex flex-col justify-center items-center gap-1 mt-3">
                                    <div class="flex flex-col md:flex-row w-full">
                                        <div class="flex flex-col w-full lg:w-2/3 gap-1">
                                            <a class="" href="${productoUrl}">  
                                                <h2 class="font-galano_regular font-semibold text-[#052F4E] leading-5 text-base md:text-lg line-clamp-2">${value.producto}</h2>
                                            </a>
                                            <div class="font-galano_regular text-[#052F4E] text-xs line-clamp-2 leading-3">
                                                ${value.description}
                                            </div>  
                                        </div>
                                        <div class="flex flex-row lg:flex-col lg:justify-start items-center gap-2 lg:gap-0 lg:items-end w-full lg:w-1/3">
                                            ${value.descuento == 0 ? `
                                                <p class="font-galano_regular font-bold text-lg text-[#052F4E] text-start lg:text-end">S/ ${value.precio}</p>
                                            ` : `
                                                <p class="font-galano_regular font-bold text-lg text-[#052F4E] text-start lg:text-end">S/ ${value.descuento}</p>
                                                <p class="font-galano_regular text-sm line-through text-[#052F4E] text-start lg:text-end">S/ ${value.precio}</p>
                                            `}
                                        </div> 
                                    </div>
                                </div>
                                <div class="flex flex-row gap-1 mt-2 inset-0 items-end justify-center opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                                    <a href="${productoUrl}"
                                        class="text-white text-sm md:text-base py-2 px-6 w-full bg-[#052F4E] rounded-xl font-galano_regular font-semibold text-center">
                                        Ver producto
                                    </a>
                                </div>
                            </div>`
                            );
                        });


                        $('.cargarMas').attr('data-page', response.page);
                        $('.cargarMas').html('Cargar más modelos');
                        
                        if (response.page == 0) {
                            $('.cargarMas').hide();
                        } else {
                            $('.cargarMas').show();
                        }
                       
                    },
                    error: function(error) {}
            });

        })

    });
    </script>
    <script>
       $(document).ready(function() {
            var selectedElement = $('.selected');

            if (selectedElement.length > 0) {
                var id = selectedElement.attr('id');
                console.log('ID from selected div on page load:', id);
                $('#valorcategoria').val(id);
            }

            $(document).on('click', '.selected', function() {
                var id = $(this).attr('id');
                console.log('ID from selected div:', id);
                $('#valorcategoria').val(id);
            });
        });
    </script>
@stop

@stop
