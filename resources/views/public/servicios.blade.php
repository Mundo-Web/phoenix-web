@extends('components.public.matrix', ['pagina' => 'servicios'])

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

    .ckeditor-content ul {
            list-style-type: disc; /* Muestra bullets (puntos) */
            padding-left: 20px; /* Sangría para listas */
            margin: 10px 0; /* Margen superior e inferior */
    }

    .ckeditor-content ol {
            list-style-type: decimal; /* Números para listas ordenadas */
            padding-left: 20px;
            margin: 10px 0;
    }

    .ckeditor-content li {
            margin-bottom: 5px; /* Espacio entre ítems */
    }
</style>

@section('content')

    <main>

        <section class="px-[5%] pt-12 xl:pt-16 w-full">
            <div class="flex flex-col gap-2 max-w-3xl mx-auto">
                <h2
                    class="text-[#052F4E] font-maille text-4xl md:text-5xl leading-none text-left lg:text-center max-w-2xl mx-auto">
                    Nuestros Servicios
                </h2>
                <p class="text-[#052F4E] font-galano_regular text-lg text-left lg:text-center">
                    Mauris euismod vehicula eros egestas venenatis. Vestibulum non pulvinar risus.
                    Praesent hendrerit lectus ultrices purus consectetur, eu sollicitudin libero pretium.
                </p>
            </div>
        </section>


        <section class="px-[5%] py-12 xl:py-20 w-full">

            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-12">

                <div class="md:basis-2/6 lg:basis-1/6 flex flex-col gap-5" data-aos="fade-up" data-aos-duration="150">
                    
                    <div class="flex flex-col gap-3">
                        @foreach ($servicios as $item)
                            <a href="{{ route('servicios', $item->id) }}"
                                class="text-[15px] py-3 px-2 rounded-lg font-galano_regular text-center
                                {{ $item->id == $filtro ? 'text-white bg-[#052F4E]' : 'text-[#052F4E] bg-[#EBEDEF]' }}">
                                {{$item->title}}
                            </a>
                        @endforeach
                    </div>

                </div>

                <div class="md:basis-4/6 lg:basis-5/6 flex flex-col gap-10">

                    <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-duration="150">
                        <div class="flex justify-center items-center">
                            <img src="{{ asset($servicioselec->url_image.$servicioselec->name_image) }}"  alt="{{$servicioselec->title}}"
                                onerror="this.onerror=null;this.src='{{ asset('images/imagen/heladoszambito.png') }}';"
                                class="w-full h-[450px] object-cover rounded-xl hidden md:block">

                            <img src="{{ asset($servicioselec->url_image.$servicioselec->name_image) }}" alt="{{$servicioselec->title}}"
                                onerror="this.onerror=null;this.src='{{ asset('images/imagen/heladoszambito.png') }}';"
                                class="w-full h-[450px] object-cover rounded-xl block md:hidden">
                        </div>

                        <div class="flex flex-col gap-1">
                            <h2 class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl leading-none">
                                {{$servicioselec->title}}</h2>
                            <div class="text-[#052F4E] text-lg font-galano_regular">
                                {!!$servicioselec->description!!}
                            </div>
                        </div>

                        @if (isset($servicioselec) && $servicioselec->link)
                            <div class="flex flex-row justify-start md:justify-center items-start">
                                <a href="{{$servicioselec->link}}"
                                    class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                                    {{$servicioselec->namebutton ?? "Texto de boton"}}
                                </a>
                            </div>
                        @endif
                        
                    </div>

                </div>

            </div>
        </section>

    </main>




@section('scripts_importados')

    <script>
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
