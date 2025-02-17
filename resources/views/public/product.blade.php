@extends('components.public.matrix', ['pagina' => 'catalogo'])

@section('title', 'Producto Detalle | ' . config('app.name', 'Laravel'))

@section('css_importados')

@stop

@section('content')
    <?php
    // Definición de la función capitalizeFirstLetter()
    // function capitalizeFirstLetter($string)
    // {
    //     return ucfirst($string);
    // }
    ?>
    <style>
        /* imagen de fondo transparente para calcar el dise;o */
        .clase_table {
            border-collapse: separate;
            border-spacing: 10;
        }

        .fixedWhastapp {
            right: 2vw !important;
        }

        .clase_table td {
            /* border: 1px solid black; */
            border-radius: 10px;
            -moz-border-radius: 10px;
            padding: 10px;
        }

        .swiper-pagination-bullet-active {
            background-color: #272727;
        }

        .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: #979693 !important;
        }

        .blocker {
            z-index: 20;
        }


        @media (min-width: 600px) {
            #offers .swiper-slide {
                margin-right: 100px !important;
            }

            #offers .swiper-slide::before {
                content: '+';
                display: block;
                position: absolute;
                top: 50%;
                right: -70px;
                transform: translateY(-50%);
                font-size: 32px;
                font-weight: bolder;
                color: #ffffff;
                padding: 0px 12px;
                background-color: #0d2e5e;
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, .125);
            }

            #offers .swiper-slide:last-child::before {
                content: none;
            }

        }
    </style>

    {{-- @php
        $images = ['', '_ambiente'];
        $x = $product->toArray();
        $i = 1;
    @endphp
    @php
        $breadcrumbs = [['title' => 'Inicio', 'url' => route('index')], ['title' => 'Producto', 'url' => '']];
    @endphp --}}
    {{-- @php
        $StockActual = $product->stock;
        $maxStock = 100; // maximo stock

        if (!is_null($product->max_stock) > 0) {
            $maxStock = $product->max_stock;
        }
        # calculamos en % cuanto queda en base a 100
        $stock = 0;
        if ($maxStock !== 0) {
            $stock = ($StockActual * 100) / $maxStock;
        }

    @endphp --}}

    {{-- @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent --}}

    <main  id="mainSection">
        @csrf
        <section class="w-full px-[5%] pt-10 lg:pt-20">
            {{-- <div class="grid grid-cols-1 lg:grid-cols-5 gap-10  pt-8 lg:pt-16"> --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16">    
               
                {{-- <div class="flex flex-row lg:col-span-3  justify-start items-center lg:items-start gap-2">

                    <div class="w-1/5">
                        <x-product-slider :product="$product" />
                    </div>
                    
                    <div id="containerProductosdetail"
                        class="w-4/5 flex justify-center items-center  aspect-square  overflow-hidden relative">
                        <div id="descuento-container">
                            <div  class="absolute top-[20px] left-0 z-10 text-[14px] sm:text-base font-Urbanist_Regular text-center content-center gap-2 bg-[#c1272d] text-white px-3 lg:px-4 py-[2px] lg:py-1">
                                -<span id="porcentajedescuento">50</span> % 
                            </div>
                        </div>
                        <div id="imagenProducto" class="w-full h-full">
                            <img src="{{ asset($product->imagen) }}" alt="computer" class="w-full h-full object-contain"
                                data-aos="fade-up" data-aos-offset="150"
                                onerror="this.onerror=null;this.src='/images/imagen/noimagen.jpg';">
                        </div>
                    </div>
                    

                </div> --}}

                <div class="flex flex-col justify-start items-center gap-5">
                    <div id="containerProductosdetail"
                        class="w-full flex justify-center items-center aspect-square overflow-hidden">
                        <img src="{{ asset($product->imagen) }}" alt="computer" class="w-full h-full object-contain"
                            data-aos="fade-up" data-aos-offset="150"
                            onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';">
                    </div>
                    <x-product-slider-horizontal :product="$product" />
                </div>   

                <div class="flex flex-col gap-2">
                    <h3 class="font-galano_medium text-base text-[#052F4E]">
                        <a href="{{route('catalogo.all')}}">Productos</a> | <a href="{{route('catalogo', $product->category->id ) ?? route('catalogo.all') }}">{{$product->category->name ?? "Otros"}}</a> | {{$product->producto ?? "Producto sin nombre"}}</h3>

                    <h2 id="nombreproducto" class="font-galano_semibold text-4xl lg:text-5xl text-[#052F4E]">
                            {{$product->producto}} @if($product->color) - {{$product->color}}@endif
                    </h2>           
                             
                    <div class="text-[#052F4E] text-lg font-normal font-galano_regular flex flex-col gap-3">
                       {!!$product->description!!}
                    </div>

                    {{-- <span id="stock" class="font-galano_semibold text-base text-[#052F4E] mt-2">
                        420 Unidades/Caja</span> --}}

                    <div class="flex flex-row items-center justify-start gap-2 w-full">
                        @if ($product->descuento == 0)
                            <h2 class="font-galano_semibold text-4xl lg:text-5xl text-[#052F4E]"> S/ {{ $product->precio }}</h2>
                        @else
                            <h2 class="font-galano_semibold text-4xl lg:text-5xl text-[#052F4E]"> S/ {{ $product->descuento }}</h2>
                            <h2 class="font-galano_regular text-2xl line-through text-[#052F4E] text-start lg:text-end"> S/ {{ $product->precio }}</h2>
                        
                        @endif  
                    </div>
                    
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-3">
                            {{-- @if ($otherProducts->isNotEmpty())
                                <div class="flex flex-col w-full justify-center items-start text-xl text-[#052F4E] font-galano_semibold">
                                <h2>Sabores:</h2>
                                </div>
            
                            
                                <div class="flex flex-wrap w-full gap-2 lg:gap-4 justify-start items-center font-Urbanist_Medium">
                                <a class="ring-1 rounded-full p-[3px] ring-[#3f3f3f]" tippy data-tippy-content="Seleccionado">
                                    <div class="flex justify-center items-center">
                                    <div class="w-7 lg:w-9 h-7 lg:h-9 rounded-full overflow-hidden">
                                        <img class="object-contain object-center" src="{{ asset($product->imagen) }}" />
                                    </div>
                                    </div>
                                </a>
                                
                                @foreach ($otherProducts as $x)
                                    @if (!empty($x->imagen))
                                    <a class="ring-1 rounded-full p-[3px] ring-transparent hover:ring-[#3f3f3f]"
                                        href="{{ route('producto', $x->id) }}" tippy data-tippy-content="{{$x->color}}">
                                        <div class="flex justify-center items-center">
                                        <div class="w-7 lg:w-9 h-7 lg:h-9 rounded-full overflow-hidden">
                                            <img class="object-contain object-center" src="{{ asset($x->imagen) }}" />
                                        </div>
                                        </div>
                                    </a>
                                    @endif
                                @endforeach
                                </div>
                            @endif --}}

                            @if ($otherProducts->isNotEmpty())
                                <div class="flex flex-col w-full justify-center items-start text-xl text-[#052F4E] font-galano_semibold">
                                    <h2>Sabores:</h2>
                                </div>

                                <select id="saborSelect" class="mt-2 p-2 border rounded bg-[#F5F5F7] text-[#052F4E] focus:border-0 focus:ring-[#052F4E] ring-[#052F4E]">
                                    <option value="" disabled>Seleccione un sabor</option>
                                    <option value="{{ route('producto', $product->id) }}" 
                                        {{ request()->url() == route('producto', $product->id) ? 'selected' : '' }}>
                                        {{ $product->color }}
                                    </option>
                                    @foreach ($otherProducts as $x)
                                        <option value="{{ route('producto', $x->id) }}" 
                                            {{ request()->url() == route('producto', $x->id) ? 'selected' : '' }}>
                                            {{ $x->color }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif

                            <script>
                                document.getElementById('saborSelect').addEventListener('change', function() {
                                    if (this.value) {
                                        window.location.href = this.value;
                                    }
                                });
                            </script>
                        </div>

                        @if ($product->status == 1 && $product->visible == 1)
                            <div class="flex flex-col gap-4 mt-3">
                                <div class="flex flex-col md:flex-row gap-1 md:gap-5 items-start">
                                    <div class="flex flex-row gap-5 justify-start items-center w-auto order-2 md:order-1">
                                        
                                        <button id="btnAgregarCarritoPr" data-id="{{ $product->id }}"
                                        class="bg-[#052F4E] w-full py-3 px-5 xl:px-8  text-white text-center rounded-xl font-galano_semibold tracking-wide text-base">
                                            Agregar a la bolsa
                                        </button>
                                        
                                    </div>
                                    <div class="flex order-1 md:order-2">
                                        <div class="flex justify-center items-center cursor-pointer rounded-l-3xl">
                                            <button
                                                class="py-2.5 px-5 text-lg font-galano_semibold rounded-full bg-[#052F4E] m-1 text-white"
                                                id=disminuir type="button">-</button>
                                        </div>
                                        <div id=cantidadSpan
                                            class="py-2.5 px-5 flex justify-center items-center bg-transparent text-lg font-galano_semibold">
                                            <span>1</span>
                                        </div>
                                        <div class="flex justify-center items-center cursor-pointer rounded-r-3xl">
                                            <button
                                                class="py-2.5 px-5 text-lg font-galano_semibold rounded-full bg-[#052F4E] m-1 text-white"
                                                id=aumentar type="button">+</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        

        <section class="w-full px-[5%] pt-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16">

                <div class="flex flex-col justify-center items-start gap-5">
                    <h2 id="nombreproducto" class="font-galano_semibold text-3xl lg:text-4xl text-[#052F4E]">
                        Información adicional</h2>

                    {{-- <div class="text-[#052F4E] text-lg font-normal font-galano_regular flex flex-col gap-3">
                        <p>
                            Suspendisse id pulvinar mi. Curabitur commodo neque eget felis mollis, ac sagittis quam pulvinar.
                        </p>
                    </div> --}}

                    @php
                        $pesoLimpio = trim(strip_tags($product->peso));
                    @endphp
                    @if (!empty($pesoLimpio))
                        <div class="text-[#052F4E] flex flex-col gap-1">
                            <h2 class="text-2xl font-galano_medium font-medium">Peso</h2>
                            
                            <div class="text-base font-normal font-galano_regular">
                                {!! $product->peso !!}
                            </div>
                        </div>
                    @endif
                    
                    @php
                        $medidasLimpio = trim(strip_tags($product->medidas));
                    @endphp
                    @if (!empty($medidasLimpio))
                        <div class="text-[#052F4E] flex flex-col gap-1">
                            <h2 class="text-2xl font-galano_medium font-medium">Medidas</h2>

                            <div class="text-base font-normal font-galano_regular">
                                {!!$product->medidas!!}
                            </div>
                        
                        </div>
                    @endif

                    @php
                        $usosLimpio = trim(strip_tags($product->usos));
                    @endphp
                    @if (!empty($usosLimpio))
                        <div class="text-[#052F4E] flex flex-col gap-1">
                            <h2 class="text-2xl font-galano_medium font-medium">Opciones de uso</h2>
                            
                            <div class="text-base font-normal font-galano_regular">
                                {!!$product->usos!!}
                            </div>
                        </div>
                    @endif
                </div>   
                
                <div class="flex flex-col gap-2">
                    <img class="w-full aspect-square object-contain" src="{{asset($product->imagen_ambiente)}}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/medidascremoso.png') }}';" />  
                </div>

            </div>
        </section>


        @if ($ProdComplementarios->isEmpty())
        @else
            <section>
                <div class="flex flex-col gap-10 w-full px-[5%] mt-10 lg:mt-20 py-10 lg:py-16 bg-[#EBEDEF]">
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
                        <div class="swiper carruselproductos h-max">
                            <div class="swiper-wrapper">
                                @foreach ($ProdComplementarios as $item)
                                    <div class="swiper-slide">
                                        <x-product.card_product_cremoso :item="$item" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>    
                </div>
            </section>
        @endif

    {{-- @if (count($ProdComplementarios) > 0)
        <div class="px-[5%]">
            <div class="h-1 border-b-[2px] border-b-[#cccccc]"></div>
        </div>

        <section class="bg-white py-10 lg:py-14">
            <div class="w-full px-[5%]">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-Urbanist_Bold text-center tracking-tight">PODRÍA GUSTARTE</h1>
                </div>
                <div class="mt-12">
                    <div class="swiper productos-relacionados h-max">
                        <div class="swiper-wrapper">
                            @foreach ($ProdComplementarios->take(10) as $item)
                                <div class="swiper-slide">
                                    <x-product.container width="col-span-1 " bgcolor="bg-[#FFFFFF]" :item="$item" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif --}}
       

    <div id="modaltallas" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div  class="p-1 flex flex-col overflow-hidden">
            <img id="zoomImage" class="object-contain w-full h-full" src="{{asset($product->imagen_ambiente)}}" />
        </div>
    </div>

    </main>

    <style>
        #zoomImage {
            transition: transform 0.3s ease;
        }
    </style>

@section('scripts_importados')
    <script>
        const zoomImage = document.getElementById('zoomImage');

        zoomImage.addEventListener('mousemove', (e) => {
            const rect = zoomImage.getBoundingClientRect();
            const x = e.clientX - rect.left; // Posición X del mouse en la imagen
            const y = e.clientY - rect.top;  // Posición Y del mouse en la imagen

            // Ajustar el nivel de zoom y la posición
            zoomImage.style.transformOrigin = `${x}px ${y}px`;
            zoomImage.style.transform = 'scale(1.5)'; // Ajusta el nivel de zoom según sea necesario
        });

        zoomImage.addEventListener('mouseleave', () => {
            zoomImage.style.transform = 'scale(1)'; // Restaura el zoom al salir
        });
    </script>
    <script>
        var swiper = new Swiper(".carruselproductos", {
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
                el: ".swiper-pagination-carruseltop",
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
        var headerServices = new Swiper(".productos-relacionados", {
            slidesPerView: 4,
            spaceBetween: 10,
            loop: false,
            centeredSlides: false,
            initialSlide: 0, // Empieza en el cuarto slide (índice 3) */
            /* pagination: {
              el: ".swiper-pagination-estadisticas",
              clickable: true,
            }, */
            //allowSlideNext: false,  //Bloquea el deslizamiento hacia el siguiente slide
            //allowSlidePrev: false,  //Bloquea el deslizamiento hacia el slide anterior
            allowTouchMove: true, // Bloquea el movimiento táctil
            autoplay: {
                delay: 5500,
                disableOnInteraction: true,
                pauseOnMouseEnter: true
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    centeredSlides: true,
                    loop: false,
                },
                420: {
                    slidesPerView: 2,
                    centeredSlides: false,

                },
                700: {
                    slidesPerView: 3,
                    centeredSlides: false,

                },
                850: {
                    slidesPerView: 4,
                    centeredSlides: false,

                },
            },
        });
    </script>

    <script> 
        function capitalizeFirstLetter(string) {
            string = string.toLowerCase()
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        // })
        $('#disminuir').on('click', function() {
            let cantidad = Number($('#cantidadSpan span').text())
            if (cantidad > 0) {
                cantidad--
                $('#cantidadSpan span').text(cantidad)
            }


        })
        // cantidadSpan
        $('#aumentar').on('click', function() {
            let cantidad = Number($('#cantidadSpan span').text())
            cantidad++
            $('#cantidadSpan span').text(cantidad)

        })
    </script>
    
    <script>
        $(document).ready(function() {

            $(document).on('click', '#linkmodal', function() {
            $('#modaltallas').modal({
                show: true,
                fadeDuration: 400,
            })
        })
            
        })
    </script>

    <script>
      $(document).ready(function() {

        function buscarTallaProducto() {
          let tallaSelected = $('.tallaSelected');
          let productId = tallaSelected.data('productid');
          
          $.ajax({
            url: '{{ route('buscarTalla') }}', 
            method: 'POST', 
            data: {
              idproduct: productId,
              _token: '{{ csrf_token() }}'
            },
            success: function(response) {
              //console.log(response);
              $('#num_sku').text(response.producto[0].sku);
              $('#btnAgregarCarritoPr').attr('data-id', response.producto[0].id);
              //$('#num_stock').text(Math.floor(response.producto[0].stock));
              let stock = response.producto[0].stock;
              let precio = parseFloat(response.producto[0].precio);
              let descuento = parseFloat(response.producto[0].descuento);
             
              let porcentajeDescuento = 0;
              let seccionPrecioHTML = '';
              let descuentoHTML = '';

              // Validar si hay descuento
              if (descuento > 0 && descuento < precio) {
                  porcentajeDescuento = Math.round((precio - descuento) * 100 / precio);
                  seccionPrecioHTML += `
                      <div class="content-center flex flex-row gap-2 items-center">
                          <div class="font-Urbanist_Bold text-2xl gap-2 text-[#c1272d]">S/
                              <span class="preciodescuento">${descuento.toFixed(2)}</span>
                          </div>
                          <div class="text-[#acacac] font-Urbanist_Regular line-through text-lg">S/
                              <span class="precionormal">${precio.toFixed(2)}</span>
                          </div>
                      </div>
                      <div class="ml-2 font-Urbanist_Regular text-center content-center text-base gap-2 bg-[#c1272d] text-white px-4 py-1">
                          -<span id="porcentajedescuento-value">${porcentajeDescuento}</span> %
                      </div>
                  `;

                   descuentoHTML = `
                        <div class="absolute top-[20px] left-0 z-10 text-[14px] sm:text-base font-Urbanist_Regular text-center content-center gap-2 bg-[#c1272d] text-white px-3 lg:px-4 py-[2px] lg:py-1">
                            -<span id="porcentajedescuento">${porcentajeDescuento}</span> %
                        </div>
                    `;

              } else {
                  seccionPrecioHTML += `
                      <div class="content-center flex flex-row gap-2 items-center">
                          <div class="font-Urbanist_Bold text-2xl gap-2 text-[#c1272d]">S/
                              <span class="precionormal">${precio.toFixed(2)}</span>
                          </div>
                      </div>
                  `;
              }
              
                if (descuento > 0 && descuento < precio) {
                    $('#descuento-container').html(descuentoHTML);
                } else {
                    $('#descuento-container').empty();
                }     

              $('#seccionprecio').html(seccionPrecioHTML);

              if (Number(stock) > 0) {
                  //console.log('numero mayora a 0 ')
                  $('#num_stock').text(`${Math.floor(stock)}`)
                  $('#btnAgregarCarritoPr')
                    .removeClass('opacity-50 cursor-not-allowed')
                    .attr('disabled', false);   
              } else {
                  $('#num_stock').text(`No hay Stock`)
                  $('#btnAgregarCarritoPr')
                    .addClass('opacity-50 cursor-not-allowed')
                    .attr('disabled', true);   
              }

             
            },
            error: function(xhr) {
              console.log(xhr.responseText);
            }
          });
        }

         $(document).on('click', '.tallas', function() {
          $('.tallas').removeClass('tallaSelected');
          $('.tallas').removeClass('ring-1');

          $(this).addClass('tallaSelected');
          $(this).addClass('ring-1');

          buscarTallaProducto();
        });
        
          buscarTallaProducto();
      });
    </script>


    <script>
        tippy('#myButton', {
          content: 'My tooltip!',
        });
    </script>

    <script>
        var appUrl = <?php echo json_encode($url_env); ?>;
        
        $(document).ready(function() {
            articulosCarrito = Local.get('carrito') || [];
        });
    </script>
      


@stop

@stop
