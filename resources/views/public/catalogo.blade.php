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
  </style>
@stop


@section('content')

  @php
    $breadcrumbs = [['title' => 'Inicio', 'url' => route('index')], ['title' => 'Catálogo', 'url' => '']];
  @endphp

  {{-- @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
  @endcomponent --}}

  <section>
      <div class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-20">
          <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
              <div class="flex flex-col gap-2 max-w-4xl">
                  <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">{{$textoshome->title2section ?? "Ingrese un texto"}}</h4>
                  <h3 class="text-[#082252] font-galano_regular font-normal text-lg">
                    {{$textoshome->description2section ?? "Ingrese un texto"}}
                  </h3>
              </div>
          </div>    
          <div class="w-full relative">  
              <div class="swiper categorias h-max">
                  <div class="swiper-wrapper">
                      @foreach ($categories as $categorie)  
                          <div class="swiper-slide group">
                            <a id="{{ $categorie->id }}" class="categoryselect">
                              <div id="{{ $categorie->id }}" class="{{ $id_cat == $categorie->id ? 'selected' : '' }} select flex flex-col justify-center px-10 py-8 relative bg-[#EBEDEF] rounded-xl min-h-[210px] max-w-[300px] mx-auto transition-all duration-300 ease-in-out group-hover:bg-[#052F4E]">  
                                  <div class="flex flex-row w-full bottom-5">
                                      <div class="flex flex-col gap-4 justify-center items-center w-full">
                                          <img class="group-hover:stroke-white group-hover:brightness-0 group-hover:invert {{ $id_cat == $categorie->id ? 'stroke-white invert brightness-0' : '' }}" src="{{ asset($categorie->url_image . $categorie->name_image) }}"
                                          onerror="this.onerror=null;this.src='{{ asset('images/svg/heladoicono.svg') }}';" class="w-full h-full object-contain md:object-cover object-right md:object-center">

                                          <h2 class="{{ $id_cat == $categorie->id ? 'text-white' : '' }} text-[#052F4E] font-galano_semibold text-xl text-center max-w-[200px] mx-auto line-clamp-2 transition-all duration-300 ease-in-out group-hover:text-white">
                                              {{$categorie->name ?? "Nombre de categoria"}}
                                          </h2>
                                      </div>
                                  </div>
                              </div>
                            </a>
                          </div>
                      @endforeach 
                  </div>
                  {{-- <div class="swiper-pagination-categorias !flex justify-center py-3 mt-3"></div> --}}
              </div>
              <div class="swiper-categorias-prev absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-5 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-left text-5xl text-[#052F4E]"></i></div>
              <div class="swiper-categorias-next absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-5 z-50 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-right text-5xl text-[#052F4E]"></i></div>
          </div>
      </div>
  </section>

  <section class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-16">
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
  </section>

  <section>
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
  </section>

  

@section('scripts_importados')


  <script src="{{ asset('js/storage.extend.js') }}"></script>

  <script>
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
