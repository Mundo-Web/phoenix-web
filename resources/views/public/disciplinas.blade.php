@extends('components.public.matrix', ['pagina' => 'disciplinas'])

@section('css_importados')

@stop

<style>
    #Aboutus .prose {
        width: 100%;
        max-width: 100%;
        text-align: justify;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    .prose p {

        margin-top: 0 !important;
        margin-bottom: 0 !important;

    }

    @media (max-width: 600px) {
        .fixedWhastapp {
            right: 116px !important;
        }
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
</style>

@section('content')

    <main>

        <section class="w-full  py-10 lg:py-16 px-[5%] 2xl:px-[8%] bg-[#F0F1F0]">
                <div class="flex flex-col justify-center items-center gap-10 w-full">
                    <div class="flex flex-col gap-10 bg-white rounded-xl">
                        <h2 class="leading-none font-akira_expanded max-w-6xl mx-auto text-4xl xl:text-[56px] text-[#010101] bg-[#F0F1F0] text-center">
                            Nuestras disciplinas en <span class="text-[#FB4535]">Phoenix Life</span> 
                        </h2>
                    </div>

                    <div class="w-full">
                        @if (count($productos)>0)
                            <section id="planes" class="flex flex-col gap-10 w-full py-5 bg-[#F0F1F0]">
                                    {{-- <div class="w-full relative"> --}}
                                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                                            <div class="w-full">
                                                @foreach ($productos as $producto)
                                                    
                                                    <div class="flex flex-col gap-4 
                                                                    {{ $producto->potition == 1 ? 'bg-white' : '' }}
                                                                    {{ $producto->potition == 2 ? 'bg-[#010101]' : '' }}
                                                                    {{ $producto->potition == 3 ? 'bg-[#FB4535]' : '' }}
                                                                    {{ !in_array($producto->potition, [1, 2, 3]) ? 'bg-[#FB4535]' : '' }}
                                                                    p-6 rounded-3xl max-w-xl mx-auto">
                                                            <div class="flex flex-wrap justify-between items-end">
                                                                <h3 class="
                                                                            {{ $producto->potition == 1 ? 'text-white' : '' }}
                                                                            {{ $producto->potition == 2 ? 'text-[#010101]' : '' }}
                                                                            {{ $producto->potition == 3 ? 'text-[#010101]' : '' }}
                                                                            {{ !in_array($producto->potition, [1, 2, 3]) ? 'text-[#010101]' : '' }}    
                                                                            text-base font-roboto_medium flex flex-row gap-2 
                                                                            {{ $producto->potition == 1 ? 'bg-[#010101]' : '' }}
                                                                            {{ $producto->potition == 2 ? 'bg-white' : '' }}
                                                                            {{ $producto->potition == 3 ? 'bg-white' : '' }}
                                                                            {{ !in_array($producto->potition, [1, 2, 3]) ? 'bg-white' : '' }}
                                                                            rounded-3xl text-center w-auto py-1 px-3">
                                                                    {{$producto->title}}
                                                                </h3>
                                                            </div>
                                                            <div class="flex flex-col gap-2">
                                                                <h2 class="leading-none font-akira_expanded text-2xl xl:text-3xl 
                                                                            {{ $producto->potition == 1 ? 'text-[#010101]' : '' }}
                                                                            {{ $producto->potition == 2 ? 'text-white' : '' }}
                                                                            {{ $producto->potition == 3 ? 'text-white' : '' }}
                                                                            {{ !in_array($producto->potition, [1, 2, 3]) ? 'text-white' : '' }}    
                                                                            ">
                                                                    {{$producto->title_btn}}
                                                                </h2>
                                                            
                                                                <div class="text-base font-roboto_regular
                                                                            {{ $producto->potition == 1 ? '!text-[#010101]' : '' }}
                                                                            {{ $producto->potition == 2 ? '!text-white' : '' }}
                                                                            {{ $producto->potition == 3 ? '!text-white' : '' }}
                                                                            {{ !in_array($producto->potition, [1, 2, 3]) ? '!text-white' : '' }}
                                                                            ">
                                                                    {!!$producto->description!!}
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            {{-- <button id="btnAgregarCarritoPr" data-id="{{ $producto->id }}"> <div class="
                                                                {{ $producto->potition == 1 ? 'bg-[#FB4535]' : '' }}
                                                                {{ $producto->potition == 2 ? 'bg-[#FB4535]' : '' }}
                                                                {{ $producto->potition == 3 ? 'bg-[#010101]' : '' }}
                                                                {{ !in_array($producto->potition, [1, 2, 3]) ? 'bg-[#010101]' : '' }}
                                                                rounded-3xl p-3 flex flex-row items-center justify-center">
                                                                <span class="text-white font-roboto_bold text-center">Contratar {{$producto->producto}}</span>
                                                            </div></button> --}}
                            
                                                            @php
                                                                $caracteristicas = [];
                                                                if (!empty($producto->caracteristicas)) {
                                                                    preg_match_all('/<p>(.*?)<\/p>/s', $producto->caracteristicas, $matches);
                                                                    $caracteristicas = array_filter(array_map(fn($text) => trim(strip_tags($text)), $matches[1]), fn($text) => !empty($text));
                                                                }
                                                            @endphp
                                                            @if (!empty($caracteristicas))
                                                                <div class="flex flex-col">
                                                                    @foreach ($caracteristicas as $index => $caracteristica)
                                                                        <div class="flex flex-row gap-2">
                                                                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 17" fill="none">
                                                                                <path d="M9.59919 10.0992L6.39919 6.89919M14.3325 14.8325L13.3992 13.8992M2.59919 3.09919L1.66586 2.16586M12.4372 14.8225C12.1872 15.0726 11.8481 15.2132 11.4944 15.2132C11.1408 15.2133 10.8016 15.0729 10.5515 14.8229C10.3014 14.5728 10.1609 14.2337 10.1608 13.8801C10.1608 13.5265 10.3012 13.1873 10.5512 12.9372L9.37319 14.1159C9.12309 14.366 8.78388 14.5065 8.43019 14.5065C8.0765 14.5065 7.73729 14.366 7.48719 14.1159C7.23709 13.8658 7.09659 13.5266 7.09659 13.1729C7.09659 12.8192 7.23709 12.48 7.48719 12.2299L11.7299 7.98719C11.98 7.73709 12.3192 7.59659 12.6729 7.59659C13.0266 7.59659 13.3658 7.73709 13.6159 7.98719C13.866 8.23729 14.0065 8.5765 14.0065 8.93019C14.0065 9.28388 13.866 9.62309 13.6159 9.87319L12.4372 11.0512C12.6873 10.8012 13.0265 10.6608 13.3801 10.6608C13.7337 10.6609 14.0728 10.8014 14.3229 11.0515C14.5729 11.3016 14.7133 11.6408 14.7132 11.9944C14.7132 12.3481 14.5726 12.6872 14.3225 12.9372L12.4372 14.8225ZM4.26852 9.01119C4.01842 9.26129 3.67922 9.40179 3.32552 9.40179C2.97183 9.40179 2.63262 9.26129 2.38252 9.01119C2.13242 8.76109 1.99192 8.42188 1.99192 8.06819C1.99192 7.7145 2.13242 7.37529 2.38252 7.12519L3.56119 5.94719C3.43735 6.07098 3.29035 6.16917 3.12856 6.23615C2.96678 6.30313 2.79339 6.33759 2.61829 6.33756C2.26466 6.3375 1.92553 6.19696 1.67552 5.94686C1.55173 5.82302 1.45354 5.67601 1.38656 5.51423C1.31958 5.35245 1.28513 5.17906 1.28516 5.00395C1.28522 4.65032 1.42576 4.3112 1.67586 4.06119L3.56119 2.17586C3.8112 1.92576 4.15032 1.78522 4.50395 1.78516C4.67906 1.78513 4.85245 1.81958 5.01423 1.88656C5.17601 1.95354 5.32302 2.05173 5.44686 2.17552C5.57069 2.29932 5.66893 2.44629 5.73597 2.60805C5.80301 2.76981 5.83753 2.94319 5.83756 3.11829C5.83759 3.29339 5.80313 3.46678 5.73615 3.62856C5.66917 3.79035 5.57098 3.93735 5.44719 4.06119L6.62519 2.88252C6.87529 2.63242 7.2145 2.49192 7.56819 2.49192C7.92188 2.49192 8.26109 2.63242 8.51119 2.88252C8.76129 3.13262 8.90179 3.47183 8.90179 3.82552C8.90179 4.17922 8.76129 4.51842 8.51119 4.76852L4.26852 9.01119Z" 
                                                                                stroke="
                                                                                {{ $producto->potition == 1 ? 'black' : '' }}
                                                                                {{ $producto->potition == 2 ? 'white' : '' }}
                                                                                {{ $producto->potition == 3 ? 'white' : '' }}
                                                                                {{ !in_array($producto->potition, [1, 2, 3]) ? 'white' : '' }}
                                                                            " stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>
                                                                            <h2 class="
                                                                            {{ $producto->potition == 1 ? '!text-[#010101]' : '' }}
                                                                            {{ $producto->potition == 2 ? '!text-white' : '' }}
                                                                            {{ $producto->potition == 3 ? '!text-white' : '' }}
                                                                            {{ !in_array($producto->potition, [1, 2, 3]) ? '!text-white' : '' }}
                                                                            text-base font-roboto_medium w-full">{!!$caracteristica!!}</h2>
                                                                        </div> 
                            
                                                                        @if ($index < count($caracteristicas) - 1)
                                                                            <div class="
                                                                            {{ $producto->potition == 1 ? 'bg-[#010101]' : '' }}
                                                                            {{ $producto->potition == 2 ? 'bg-[#FB4535]' : '' }}
                                                                            {{ $producto->potition == 3 ? 'bg-white' : '' }}
                                                                            {{ !in_array($producto->potition, [1, 2, 3]) ? 'bg-white' : '' }}
                                                                            h-[1px] w-full mx-auto my-3"></div>
                                                                        @endif
                                                                    @endforeach  
                                                                </div>
                                                            @endif
                                                    </div>
                                                    
                                                @endforeach  
                                            </div>
                                        </div>
                                        {{-- <div class="swiper-carrusel_planes-prev overflow-hidden absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-12 z-20 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-left text-3xl md:text-5xl text-[#000000]"></i></div>
                                        <div class="swiper-carrusel_planes-next overflow-hidden absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-12 z-20 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-right  text-3xl md:text-5xl text-[#000000]"></i></div> --}}
                                    {{-- </div> --}}
                            </section>
                        @endif
                    </div>
                </div>
        </section>

      
    </main>




@section('scripts_importados')
    <script>
        const slidesCount = document.querySelectorAll('.carrusel_planes .swiper-slide').length;
        var swiper = new Swiper(".carrusel_planes", {
                slidesPerView: slidesCount === 1 ? 1 : 2,
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
                        slidesPerView: slidesCount === 1 ? 1 : 2,
                        spaceBetween: 20,
                    }
                },
            });
    </script>
    <script>    
        
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

            $('#itemsTotal').text(`S/. ${suma} `)

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
            });

        })
    </script>


@stop

@stop
