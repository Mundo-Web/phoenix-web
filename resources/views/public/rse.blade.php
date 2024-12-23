@extends('components.public.matrix', ['pagina' => 'rse'])

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

        <section>
            <img class="w-full object-cover object-center h-[450px] md:h-[500px]"
                src="{{ asset('images/imagen/rse.png') }}" />
        </section>

        <section class="px-[5%] pt-12 xl:pt-16 w-full">
            <div class="flex flex-col gap-2 max-w-3xl mx-auto">
                <h2
                    class="text-[#052F4E] font-maille text-4xl md:text-5xl leading-none text-left lg:text-center max-w-2xl mx-auto">
                    {{ $rse[0]->titulo ?? 'Ingrese un texto' }}
                </h2>
                <div class="text-[#052F4E] font-galano_regular text-lg text-left lg:text-center">
                    {!! $rse[0]->descripcion ?? 'Ingrese un texto' !!}
                </div>
            </div>
        </section>

        <section class="pt-12 xl:pt-16 px-[5%]">
            <div class="grid grid-cols-1 lg:grid-cols-2 w-full gap-12 xl:gap-16">

                <div class="flex flex-col justify-center gap-5 lg:gap-5 text-textWhite ">
                    <h1 class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                        {{ $rse[1]->titulo ?? 'Ingrese un texto' }}
                    </h1>

                    <div class="text-[#052F4E] text-lg font-galano_regular">
                        {!! $rse[0]->descripcion ?? 'Ingrese un texto' !!}
                    </div>

                </div>

                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('images/imagen/cremosorse.png') }}"
                        class="object-contain aspect-square max-h-[500px] min-h-96" />
                </div>

            </div>
        </section>

        <section class="pt-12 xl:pt-16 px-[5%]">
            <div class="grid grid-cols-1 lg:grid-cols-2 w-full gap-12 xl:gap-16">

                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('images/imagen/cremosorse2.png') }}"
                        class="object-contain aspect-square max-h-[500px] min-h-96" />
                </div>

                <div class="flex flex-col justify-center gap-5 lg:gap-5 text-textWhite ">
                    <h1 class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                        {{ $rse[2]->titulo ?? 'Ingrese un texto' }}
                    </h1>
                    <div class="text-[#052F4E] text-lg font-galano_regular">
                        {!! $rse[2]->descripcion ?? 'Ingrese un texto' !!}
                    </div>
                </div>

            </div>
        </section>

        <section class="pt-12 xl:pt-16 px-[5%]">
            <div class="grid grid-cols-1 lg:grid-cols-2 w-full gap-12 xl:gap-16">

                <div class="flex flex-col justify-center gap-5 lg:gap-5 text-textWhite ">
                    <h1 class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                        {{ $rse[3]->titulo ?? 'Ingrese un texto' }}
                    </h1>
                    <div class="text-[#052F4E] text-lg font-galano_regular">
                        {!! $rse[3]->descripcion ?? 'Ingrese un texto' !!}
                    </div>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('images/imagen/cremosorse3.png') }}"
                        class="object-contain aspect-square max-h-[500px] min-h-96" />
                </div>

            </div>
        </section>

        @if ($testimonie->isEmpty())
        @else
            <section>
                <div class="flex flex-col gap-5 md:gap-10 w-full px-[5%] py-10 md:py-16 mt-10 md:mt-20 bg-[#EBEDEF]">
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
                                                        {{ $testimony->testimonie }}
                                                    </h2>
                                                    <h2 class="text-[#052F4E] text-lg font-galano_medium leading-none">
                                                        {{ $testimony->name }}</h2>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-testimonios !flex justify-center py-3 mt-3"></div>
                                </div>
                            </div>
                          
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


        <section class="py-12 xl:py-16 grid grid-cols-1 lg:grid-cols-2 px-[5%] gap-10">
            <img class="w-full object-cover object-center h-[450px] md:h-[500px] col-span-2"
                src="{{ asset('images/imagen/cremosorsefinal.png') }}" />
            <img class="w-full object-cover object-center h-[450px] md:h-[500px]"
                src="{{ asset('images/imagen/cremosorse.png') }}" />
            <img class="w-full object-cover object-center h-[450px] md:h-[500px]"
                src="{{ asset('images/imagen/cremosorse3.png') }}" />
        </section>

    </main>




@section('scripts_importados')

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

                // PintarCarrito();
            });

        })
    </script>


@stop

@stop
