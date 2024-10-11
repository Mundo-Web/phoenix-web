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

  @php
    $images = ['', '_ambiente'];
    $x = $product->toArray();
    $i = 1;
  @endphp
  @php
    $breadcrumbs = [['title' => 'Inicio', 'url' => route('index')], ['title' => 'Producto', 'url' => '']];
  @endphp
  @php
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

  @endphp
  
  @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
  @endcomponent

  <main class="font-Inter_Regular" id="mainSection">
        @csrf
        <section class="w-full px-[5%]">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-10  pt-8 lg:pt-16">

                <div class="flex flex-row lg:col-span-3  justify-start items-center lg:items-start gap-2">
                    
                    <div class="w-1/5">
                      <x-product-slider :product="$product" />
                    </div>
                    <div id="containerProductosdetail"
                        class="w-4/5 flex justify-center items-center  aspect-square  overflow-hidden">
                        <img src="{{ asset($product->imagen) }}" alt="computer" class="w-full h-full object-contain"
                            data-aos="fade-up" data-aos-offset="150"
                            onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';">
                    </div>

                </div>

                <div class="flex flex-col lg:col-span-2 gap-3">
                    
                    @if($product->marcas)
                            <img src="{{ asset($product->marcas->url_image) }}" class="w-28 h-auto object-contain"/>
                    @endif

                    {{-- @foreach ($atributos as $item)
                     @foreach ($valorAtributo as $value)
                            @if ($value->attribute_id == 1)
                                  @isset($valoresdeatributo)
                                      @foreach($valoresdeatributo as $valorat)
                                        @if($valorat->attribute_value_id == $value->id)
                                          <img src="{{asset($value->imagen)}}" class="w-28 h-auto object-contain"/>
                                        @endif
                                      @endforeach
                                  @endisset
                            @endif
                      @endforeach
                    @endforeach --}}
                    <div class="flex flex-col">
                        <h3 class="font-Urbanist_Black text-3xl text-[#cccccc]">
                            {{ $product->producto }}</h3>
                        {{-- <p class="font-Inter_Regular text-base gap-2">Disponibilidad:
                            @if ($product->stock == 0)
                                <span class="text-[#f6000c]">No hay Stock disponible</span>
                            @else
                                <span class="text-[#006BF6]">Quedan {{ round((float) $product->stock) }} en stock</span>
                            @endif
                        </p> --}}

                        {{-- <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ $stock }}%"></div>
                        </div> --}}
                    </div>

                    <div class="flex flex-col gap-3">
                    
                        <div class="flex flex-row gap-3 content-center items-center">
                            @if ($product->descuento == 0)
                                <div class="content-center flex flex-row gap-2 items-center">
                                    <span class="font-Urbanist_Bold text-2xl gap-2 text-[#c1272d]">S/
                                        {{ $product->precio }}</span>
                                </div>
                            @else
                                <div class="content-center flex flex-row gap-2 items-center">
                                    <span class="font-Urbanist_Bold text-2xl gap-2 text-[#c1272d]">S/
                                        {{ $product->descuento }}</span>
                                    <span class="text-[#acacac] font-Urbanist_Regular line-through text-lg">S/
                                        {{ $product->precio }}</span>
                                </div>
                                @php
                                    $descuento = round(
                                        (($product->precio - $product->descuento) * 100) / $product->precio,
                                    );
                                @endphp
                                <span
                                    class="ml-2 font-Urbanist_Regular text-center content-center text-base gap-2 bg-[#c1272d] text-white px-4 py-1">
                                    -{{ $descuento }} % </span>
                            @endif
                        </div>

                        <div class="h-1 border-b-[2px] border-b-[#cccccc] my-4"></div>
                        
                        <div class="flex flex-col gap-5">
                              <div class="flex flex-row gap-3">
                                    {{-- <div class="flex flex-col w-1/5 justify-start items-start uppercase font-Urbanist_Black">
                                          <h2>Colores</h2>
                                    </div>

                                    <div class="flex flex-wrap w-4/5 gap-4">
                                        <div class="flex justify-center items-center"> 
                                            <label class="cursor-pointer">
                                                <input class="hidden" name="color" type="radio" value="red" />
                                                <div class="bg-red-600 w-7 h-7 rounded-full border-2 border-transparent hover:border-gray-400"></div>
                                            </label>
                                        </div>
                                       <div class="flex justify-center items-center"> 
                                            <label class="cursor-pointer">
                                                <input class="hidden" name="color" type="radio" value="red" />
                                                <div class="bg-black w-7 h-7 rounded-full border-2 border-transparent hover:border-gray-400"></div>
                                            </label>
                                        </div>
                                        <div class="flex justify-center items-center"> 
                                            <label class="cursor-pointer">
                                                <input class="hidden" name="color" type="radio" value="red" />
                                                <div class="bg-blue-800 w-7 h-7 rounded-full border-2 border-transparent hover:border-gray-400"></div>
                                            </label>
                                        </div>
                                        <div class="flex justify-center items-center"> 
                                            <label class="cursor-pointer">
                                                <input class="hidden" name="color" type="radio" value="red" />
                                                <div class="bg-slate-700 w-7 h-7 rounded-full border-2 border-transparent hover:border-gray-400"></div>
                                            </label>
                                        </div>
                                    </div> --}}
                                    @if ($otherProducts->isNotEmpty())
                                        <div class="flex flex-col w-1/5 justify-start items-start uppercase font-Urbanist_Black">
                                              <h2>Colores</h2>
                                        </div>

                                    {{-- <span class="block bg-[#F5F5F7] p-3 mt-2" tippy> {{ $product->color }}</span> --}}
                                          <div class="flex flex-wrap w-4/5 gap-4">
                                                <a class="ring-2 rounded-full p-[3px] ring-black" tippy data-tippy-content="Seleccionado"> 
                                                    <div class="flex justify-center items-center">  
                                                          <div class="w-7 h-7 rounded-full" style="background-color: {{$product->color}}"></div>   
                                                    </div>
                                                </a>
                                                @foreach ($otherProducts as $x)
                                                  <a class="ring-2 rounded-full p-[3px] ring-transparent hover:ring-black" href="{{route('producto',$x->id)}}">
                                                    <div class="flex justify-center items-center">  
                                                          <div class="w-7 h-7 rounded-full" style="background-color: {{$x->color}}"></div>   
                                                    </div>
                                                  </a>
                                                @endforeach
                                          </div>
                                    @endif  
                              </div>
                              
                              

                              @if (!$product->attributes->isEmpty())
                                <div class="flex flex-row gap-3">
                                  @php
                                    $groupedAttributes = $product->attributes->groupBy('titulo');
                                  @endphp
                      
                                  @foreach ($groupedAttributes as $titulo => $items)
                                    @php
                                      $filteredItems = $items->filter(function($item) {
                                        return in_array($item->pivot->attribute_id, [3]);
                                      });
                                    @endphp
                                    @if ($filteredItems->isNotEmpty())
                                        <div class="flex flex-col w-1/5 justify-start items-start uppercase font-Urbanist_Black">
                                          <span>{{ $titulo }}:</span>
                                        </div>
                                        <div class="flex flex-wrap w-4/5 gap-5 justify-start items-center font-Urbanist_Medium">
                                          @foreach ($items as $item)
                                            
                                              @php
                                                $atributo = $valorAtributo->firstWhere('id', $item->pivot->attribute_value_id);
                                              @endphp

                                              @if ($atributo)
                                                <span class="flex justify-center items-center">{{ $atributo->valor }}</span>
                                              @endif
                                            
                                          @endforeach
                                        </div>
                                    @endif
                                  @endforeach
                                </div>
                              @endif
                              
                              {{-- <div class="flex flex-row gap-3">
                                     <div class="flex flex-col w-1/5 justify-start items-start uppercase font-Urbanist_Black">
                                          <h2>Tallas</h2>
                                    </div>

                                    <div class="flex flex-wrap w-4/5 gap-5 justify-start items-center font-Urbanist_Medium">
                                        <div class="flex justify-center items-center">28</div>
                                        <div class="flex justify-center items-center">30</div>
                                        <div class="flex justify-center items-center">32</div>
                                        <div class="flex justify-center items-center">34</div>
                                    </div>
                              </div> --}}

                              <div class="flex flex-row">
                                  <div class="flex flex-row gap-2 border w-auto px-3 py-1 border-black cursor-pointer">
                                        <img class="h-4 object-contain" src="{{asset('images/img/ruler.png')}}"/>
                                        <p class="font-Urbanist_Bold text-sm">GUÍA DE TALLAS</p>
                                  </div>
                              </div>   
                        </div>


                        <div class="h-1 border-b-[2px] border-b-[#cccccc] my-4"></div>
 
                    </div>
                    
                     {{-- @if ($otherProducts->isNotEmpty())
                        <p class="mb-2 "><b>Característica</b>:
                        <span class="block bg-[#F5F5F7] p-3 mt-2" tippy> {{ $product->color }}</span>
                        
                        <p class="-mb-4 "><b>Otras opciones</b>:</p>
                                
                            <div class="flex flex-wrap gap-2">
                                @foreach ($otherProducts as $x)
                                <a class="block bg-[#F5F5F7] hover:bg-[#ebebf2] p-3" href="/producto/{{ $x->id }}" tippy> {{ $x->color }}</a>
                                @endforeach
                            </div>

                    @endif --}}

                    {{-- @if (!$product->attributes->isEmpty())
                        <div class="flex flex-col gap-8 mt-4 font-Inter_Regular text-lg">
                            @php
                                $groupedAttributes = $product->attributes->groupBy('titulo');
                            @endphp

                            @foreach ($groupedAttributes as $titulo => $items)
                                <div class="flex flex-row gap-3 text-center text-base font-Inter_Medium">
                                    <span>{{ $titulo }}:</span>
                                    @foreach ($items as $item)
                                        @php
                                            // Encuentra el objeto en $valorAtributo que tiene el id igual a $item->pivot->attribute_value_id
                                            $atributo = $valorAtributo->firstWhere(
                                                'id',
                                                $item->pivot->attribute_value_id,
                                            );
                                        @endphp
                                        @if ($atributo)
                                            <!-- Muestra el valor del atributo encontrado -->
                                            <span
                                                class="bg-[#006BF6] text-white rounded-md px-5 text-base">{{ $atributo->valor }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endif --}}

                    {{-- @if (!$especificaciones->isEmpty())
                        <p class="font-Inter_Medium text-base gap-2 ">Especificaciones: </p>
                        <div class="min-w-full divide-y divide-gray-200">
                            <table class=" divide-y divide-gray-200 ">
                                <tbody>
                                    @foreach ($especificaciones as $item)
                                        <tr>
                                            <td class="px-4 py-1 border border-gray-200">
                                                {{ $item->tittle }}
                                            </td>
                                            <td class="px-4 py-1 border border-gray-200">
                                                {{ $item->specifications }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif --}}

                
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col md:flex-row gap-1 md:gap-5 items-start">
                            <div class="flex flex-row gap-5 justify-start items-center w-auto order-2 md:order-1">
                                @if ($product->status == 1 && $product->visible == 1)
                                  <button id="btnAgregarCarritoPr" data-id="{{ $product->id }}"
                                      class="bg-black w-full py-3 px-5 xl:px-8  text-white text-center uppercase font-Urbanist_Medium tracking-wide text-base">
                                      Agregar
                                      a la bolsa
                                  </button>
                                @endif
                            </div>
                            <div class="flex order-1 md:order-2">
                                <div
                                    class="flex justify-center items-center cursor-pointer rounded-l-3xl">
                                    <button class="py-2.5 px-5 text-lg font-Helvetica_Bold rounded-full bg-transparent m-1 text-black" id=disminuir
                                        type="button">-</button>
                                </div>
                                <div id=cantidadSpan
                                    class="py-2.5 px-5 flex justify-center items-center bg-transparent text-lg font-Urbanist_Bold">
                                    <span>1</span>
                                </div>
                                <div
                                    class="flex justify-center items-center cursor-pointer rounded-r-3xl">
                                    <button class="py-2.5 px-5 text-lg font-Helvetica_Bold rounded-full bg-transparent m-1 text-black" id=aumentar
                                        type="button">+</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    @if ($product->sku)
                          <p class="font-Urbanist_Regular text-base text-[#444] mt-2">SKU: {{ $product->sku }}
                          </p>
                    @endif 

                    <div class="!text-lg !font-Urbanist_Regular w-full mt-2 text-[#444]">
                            {!! $product->description !!}
                    </div>

                       
                 
                </div>
            </div>
        </section>



        <div class="px-[5%]"><div class="h-1 border-b-[2px] border-b-[#cccccc] mt-16"></div></div>

        <section class="bg-white py-10 lg:py-14">
            <div class="w-full px-[5%]">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-Urbanist_Bold text-center tracking-tight">PODRÍA GUSTARTE</h1>
                </div>
                <div class="grid grid-cols-4 gap-4 mt-14 w-full">
                    @foreach ($ProdComplementarios->take(4) as $item)
                        {{-- <x-product.container-combinalo width="" height="h-[400px]" bgcolor="bg-[#FFFFFF]"
              textpx="text-[20px]" :item="$item" /> --}}
                        <x-product.container width="col-span-1 " bgcolor="bg-[#FFFFFF]" :item="$item" />
                    @endforeach
                </div>
            </div>
        </section>



    </main>

@section('scripts_importados')
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
    // $(document).ready(function() {


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
    // let articulosCarrito = [];

    /* 
        function deleteOnCarBtn(id, operacion) {
          const prodRepetido = articulosCarrito.map(item => {
            if (item.id === id && item.cantidad > 0) {
              item.cantidad -= Number(1);
              return item; // retorna el objeto actualizado 
            } else {
              return item; // retorna los objetos que no son duplicados 
            }

          });
          Local.set('carrito', articulosCarrito)
          limpiarHTML()
          PintarCarrito()


        } */

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

    /*  function addOnCarBtn(id, operacion) {

       const prodRepetido = articulosCarrito.map(item => {
         if (item.id === id) {
           item.cantidad += Number(1);
           return item; // retorna el objeto actualizado 
         } else {
           return item; // retorna los objetos que no son duplicados 
         }

       });
       Local.set('carrito', articulosCarrito)
       // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
       limpiarHTML()
       PintarCarrito()


     } */



    var appUrl = <?php echo json_encode($url_env); ?>;
    $(document).ready(function() {
      articulosCarrito = Local.get('carrito') || [];

      // PintarCarrito();
    });

    function limpiarHTML() {
      //forma lenta 
      /* contenedorCarrito.innerHTML=''; */
      $('#itemsCarrito').html('')


    }

    $('#btnAgregarCombo').on('click', async function() {
      const offerId = this.getAttribute('data-id')
      const res = await fetch(`/api/offers/${offerId}`)
      const data = await res.json()

      let nombre = `<b>${data.producto}</b><ul class="mb-1">`
      data.products.forEach(product => {
        nombre +=
          `<li class="text-xs text-nowrap overflow-hidden text-ellipsis w-[270px]">${product.producto}</li>`
      })
      nombre += '</ul>'

      let newcarrito
      articulosCarrito = Local.get('carrito') ?? []


      const index = articulosCarrito.findIndex(item => item.id == data.id && item.isCombo)

      if (index != -1) {

        articulosCarrito = articulosCarrito.map(item => {
          if (item.isCombo && item.id == data.id) {
            item.nombre = nombre
            item.cantidad++
          }
          return item
        })
      } else {

        articulosCarrito = [...articulosCarrito, {
          "id": data.id,
          "isCombo": true,
          "producto": nombre,
          "descuento": data.descuento,
          "precio": data.precio,
          "imagen": data.imagen ? `${appUrl}${data.imagen}` : `${appUrl}/images/img/noimagen.jpg`,
          "cantidad": 1,
          "color": null
        }]

      }


      Local.set('carrito', articulosCarrito)

      limpiarHTML()
      PintarCarrito()
      mostrarTotalItems()

      Swal.fire({
        icon: "success",
        title: `Combo agregado correctamente`,
        showConfirmButton: true
      });
    })



    $('#addWishlist').on('click', function() {
      $.ajax({
        url: `{{ route('wishlist.store') }}`,
        method: 'POST',
        data: {
          _token: $('input[name="_token"]').val(),
          product_id: '{{ $product->id }}'
        },
        success: function(response) {

          // Cambiar el color del botón

          if (response.message === 'Producto agregado a la lista de deseos') {
            $('#addWishlist').removeClass('bg-[#99b9eb]').addClass('bg-[#0D2E5E]');
          } else {
            $('#addWishlist').removeClass('bg-[#0D2E5E]').addClass('bg-[#99b9eb]');
          }
          Swal.fire({
            icon: 'success',
            title: response.message,
            showConfirmButton: false,
            timer: 1500
          });
        },
        error: function(error) {
          console.log(error);
        }
      });
    })
  </script>


@stop

@stop
