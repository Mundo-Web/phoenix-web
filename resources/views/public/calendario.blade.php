@extends('components.public.matrix', ['pagina' => 'calendario'])

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

        <section class="w-full  py-10 lg:py-16 px-[5%] xl:px-[8%]">
                <div class="flex flex-col justify-center items-center gap-10 w-full">
                    <div class="flex flex-col gap-10 bg-white rounded-xl">
                        <h2 class="leading-none font-akira_expanded  text-4xl xl:text-[56px] text-[#010101]">
                            Nuestro <span class="text-[#FB4535]">Calendario</span>
                        </h2>
                    </div>

                    <div class="w-full">
                        <iframe src="https://gw8t4s3.pushpress.com/landing/calendar"  class="w-full h-full min-h-[900px]" frameborder="0" >
                            <noframes> <a href="https://gw8t4s3.pushpress.com/landing/calendar">Schedule</a></noframes> 
                        </iframe>
                    </div>
                </div>
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
            });

        })
    </script>


@stop

@stop
