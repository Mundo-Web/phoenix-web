@extends('components.public.matrix', ['pagina' => 'index'])

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
</style>

@section('content')

  <main>

    {{-- <section class="bg-[#f1f1f1] ">
      <x-swipper-card :items="$slider" />
    </section> --}}


    <section class="py-12 xl:py-16 px-[5%] xl:px-[8%]" style="background-image: url({{asset('images/imagen/texturanosotros.jpg')}})">
      <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-12 xl:gap-16">
          
          <div class="flex flex-col justify-center gap-5 lg:gap-7">
              <div class="flex flex-row">
                <span class="font-roboto_medium w-auto text-white bg-[#010101] rounded-3xl px-3 py-1">Sobre Pheonix Fitness</span>
              </div>
              <h2 class="leading-none font-akira_expanded  text-4xl xl:text-5xl text-[#010101]">
                  Describa por que <span class="text-[#FB4535]">existe</span> su empresa
              </h2>
              <div class="text-[#010101] text-lg font-roboto_regular">
                  Explique en qué está trabajando su empresa y el valor que ofrece a sus clientes.
              </div>
          </div>

          <div class="flex flex-col justify-center items-center">
            <img src="{{ asset($nosotros[1]->image) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/p_nosotros.png') }}';" class="object-cover" />
          </div>

      </div>
    </section>


    @if(count($benefit) > 0)
      <section class="pt-12 xl:pt-16 px-[5%] xl:px-[8%]">
        <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-12 xl:gap-16">
            
            <div class="flex flex-col justify-start gap-5 lg:gap-7">
                <h2 class="leading-none font-akira_expanded text-3xl xl:text-4xl text-[#010101]">
                    Resalte el <span class="text-[#FB4535]">crecimiento</span> de su empresa
                </h2>
            </div>

            <div class="flex flex-col justify-start gap-5 lg:gap-7">
              <div class="text-[#010101] text-base font-roboto_regular">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. 
                  Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.</p>
              </div>
              <div class="grid grid-cols-1 xl:grid-cols-3">
                @foreach ($benefit as $estadistica)
                  <div class="flex flex-col gap-0">
                      <h2 class="text-[#010101] font-akira_expanded text-4xl">{{$estadistica->descripcionshort}}</h2>
                      <span class="text-[#FB4535] text-base font-roboto_medium">{{$estadistica->titulo}}</span>
                  </div>
                @endforeach
              </div>
            </div>

        </div>
      </section>
    @endif

    
    <section class="flex flex-row justify-center items-center px-[5%] xl:px-[8%] py-12 xl:pb-16">
        <img src="{{asset('images/imagen/p_bannernosotros.png')}}" onerror="this.src='{{ asset('images/imagen/p_bannernosotros.png') }}';" class="rounded-xl lg:rounded-3xl h-[250px] sm:h-full xl:h-[450px] w-full object-cover sm:object-contain" />
    </section>
    

    @if(count($valores) > 0)
      <section class="flex flex-col xl:flex-row justify-center items-center px-[5%] xl:pl-[8%] xl:pr-0 gap-0 xl:gap-20" style="background-image: url({{asset('images/imagen/texturanosotros.jpg')}})">
          
          <div class="w-full xl:w-3/5 flex flex-col gap-10 py-10">
              <div class="flex flex-col gap-2">
                  <h2 class="leading-none font-akira_expanded text-3xl xl:text-4xl text-[#010101] lg:max-w-sm">
                    Presenta a tu <span class="text-[#FB4535]">equipo</span>
                  </h2>  
                  <p class="text-[#010101] text-base font-roboto_regular lg:max-w-xl">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. 
                  </p>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 xl:gap-x-10">
                @foreach ($valores as $valor)
                  <div class="flex flex-col gap-5">
                    <img src="{{asset($valor->url_image . $valor->name_image)}}" onerror="this.src='{{ asset('images/imagen/p_icono1.png') }}';" class="rounded-full w-14 h-14 object-contain" />
                    <div class="flex flex-col gap-1">
                      <h2 class="leading-none font-akira_expanded text-xl text-[#010101]">
                        {{$valor->title}}
                      </h2> 
                      <div class="text-[#010101] text-base font-roboto_regular">
                        {!!$valor->description!!}
                      </div> 
                    </div>
                  </div>
                @endforeach                  
              </div>
          </div>

          <div class="w-full xl:w-2/5">
            <img src="{{asset('images/imagen/nosotrosimg2.png')}}" onerror="this.src='{{ asset('images/imagen/nosotrosimg2.png') }}';" class="h-[450px] sm:h-full sm:max-w-md xl:max-w-2xl mx-auto object-cover w-full" />
          </div>

      </section>
    @endif


    
    @if(count($personal) > 0)
      <section class="flex flex-col justify-start items-start px-[5%] xl:px-[8%] gap-10 py-10">
        
            <div class="flex flex-col gap-2">
                <h2 class="leading-none font-akira_expanded text-3xl xl:text-4xl text-[#010101]">
                  Presenta a tu <span class="text-[#FB4535]">equipo</span>
                </h2>  
                <p class="text-[#010101] text-base font-roboto_regular">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. 
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 md:gap-8">
                  @foreach ($personal as $persona)
                    <div class="flex flex-col gap-1">
                        <img src="{{asset($persona->imagen)}}" onerror="this.src='{{ asset('images/imagen/nosotrosimg2.png') }}';" class="w-full aspect-square rounded-2xl object-cover" />
                        <h2 class="leading-none font-roboto_bold text-xl  text-[#010101] mt-3">
                         {{$persona->titulo}}
                        </h2>  
                        <p class="leading-none font-roboto_regular text-base  text-[#010101]">
                          {{$persona->descripcion}}
                        </p>  
                    </div>
                  @endforeach           
            </div>

      </section>
    @endif
  
    {{-- <section class="flex flex-col gap-5 pt-12 xl:pt-16">
        <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-10 lg:gap-24 px-[5%] pb-12 xl:pb-16">
            <div class="flex flex-col justify-start gap-5">
              <h1
                    class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                    {{$nosotros[2]->titulo ?? "Ingrese texto" }}
              </h1>

              <div class="text-[#052F4E] text-lg font-galano_regular">
                  {!! $nosotros[2]->descripcion ?? "Ingrese texto" !!}
              </div>
               
            </div>

            <div class="flex flex-col justify-center items-center">

                <img src="{{ asset($nosotros[2]->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/cremosonosotros2.png') }}';" />
            </div>
        </div>
    </section> --}}


    
    {{-- <section>
            
      @if ($nosotros->isEmpty())
          
      @else
          <div class="w-11/12 mx-auto flex flex-col gap-8 my-5 lg:my-16 ">
              @foreach ($nosotros as $item)
              <div>
                  <h2 class="text-[#082252] font-roboto font-bold text-4xl lg:text-text48 leading-none">{{$item->titulo}}</h2>
                  <div class="text-[#082252] font-roboto font-normal text-text18 mt-3">
                          {!!$item->descripcion!!}
                  </div>
              </div>
              @endforeach
          </div>
      @endif

  </section> --}}


    {{-- seccion Ultimos Productos  --}}

    {{-- <section class="w-full px-[8%] py-10 lg:py-20 ">
      <div class="flex flex-col md:flex-col  w-full gap-3" data-aos="zoom-out-left">
        <h1 class="text-[22px] md:text-3xl font-semibold font-Inter_Medium  text-[#006BF6]">Sobre nosotros</h1>
        <h1 class="text-[48px] md:text-3xl font-semibold font-Inter_Medium  text-[#333333] mt-3">{{ $nosotros[2]->titulo }}
        </h1>


      </div>
      <div class="mt-6  text-justify grid grid-cols-1" id="Aboutus">
        <div class="col-span-1 text-[18px]">{!! $nosotros[2]->descripcion !!}</div>
        <div><img src="{{ asset($nosotros[2]->imagen) }}" alt=""></div>
      </div>

    </section> --}}



    {{-- seccion Productos populares  --}}

    {{-- <section class=" bg-[#F8F8F8]">
      <div class="w-full px-[5%] py-14 lg:py-20" data-aos="fade-down-left">
        <div class="pl-10 flex flex-col md:flex-row justify-between w-full gap-3">
          <h1 class="text-2xl md:text-3xl font-semibold font-Inter_Medium text-[#323232]">Misión</h1>
          <div class="flex  flex-col md:flex-row gap-2 md:gap-8">
              <a href="/catalogo" class="flex items-center   font-Inter_Medium  hover:text-[#006BF6] ">Todos</a>
              @foreach ($categoriasAll as $item)
                <a href="/catalogo/{{ $item->id }}"
                  class="flex items-center font-Inter_Medium  hover:text-[#006BF6]  transition ease-out duration-300 transform  ">{{ $item->name }}
                </a>
              @endforeach
            </div>
        </div> --}}

        {{-- <div class="grid grid-cols-1 md:grid-cols-2  gap-16 mt-14 w-full px-10 ">
          <div><img src="{{ asset($nosotros[0]->imagen) }}" alt=""></div>
          <div class="flex flex-col content-center text-center justify-center gap-16">
            <div class="flex flex-col items-center justify-center">
              <div class="rounded-full w-10 h-10 bg-[#006BF5] flex items-center justify-center mb-4">
                <img src="images/idea.png" alt="">
              </div>
              <h1 class="text-2xl md:text-3xl font-semibold font-Inter_Medium text-[#323232]">Nuestra Misión</h1>
              <div class="text-justify">{!! $nosotros[0]->descripcion !!}</div>
            </div>


            <div class="flex flex-col items-center justify-center">
              <div class="rounded-full w-10 h-10 bg-[#006BF5] flex items-center justify-center"><img src="images/idea.png"
                  alt="">
              </div>
              <h1 class="text-2xl md:text-3xl font-semibold font-Inter_Medium text-[#323232]">Nuestra Visión</h1>
              <div class=" text-justify">{!! $nosotros[3]->descripcion !!}</div>
            </div>


          </div>

        </div>

      </div>
    </section> --}}



    {{-- <section class="w-full px-[5%] py-7 lg:py-14" data-aos="fade-up" data-aos-offset="150">
      <div class="grid grid-cols-1 md:grid-cols-2 w-full">
        <div class=" flex flex-col md:flex-col  w-full gap-3 px-10">
          <h1 class="text-[22px] md:text-3xl font-semibold font-Inter_Medium  text-[#006BF6]">Nuestro sello de Garantia
          </h1>
          <h1 class="text-[48px] md:text-3xl font-semibold font-Inter_Medium  text-[#006BF6] mb-3">

            {{ $nosotros[1]->titulo }}
          </h1>
          <div class=" flex flex-col align-items-end  text-justify">{!! $nosotros[1]->descripcion !!}</div>

        </div>

        <div class="px-10"><img src="{{ asset($nosotros[1]->imagen) }}" alt="" class="object-cover"></div>


      </div>


    </section> --}}


    {{-- @if ($benefit->count() > 0)
      <section class="py-10 lg:py-13 bg-[#F8F8F8] w-full px[5%]" data-aos="zoom-out-right">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
          @foreach ($benefit as $item)
            <div class="flex flex-col items-center w-full gap-1 justify-center text-center px-[10%] xl:px-[18%]">
              <img src="{{ asset($item->icono) }}" alt="">
              <h4 class="text-xl font-bold font-Inter_Medium"> {{ $item->titulo }} </h4>
              <div class="text-lg leading-8 text-[#444444] font-Inter_Medium">{!! $item->descripcionshort !!}</div>
            </div>
          @endforeach
        </div>
      </section>
    @endif --}}





  </main>

  {{-- modalOfertas --}}



  <!-- Modal toggle -->


  <!-- Main modal -->
  {{-- 
  <div id="modalofertas" class="modal">

    <!-- Modal body -->
    <div class="p-1 ">
      <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
    </div>


  </div> --}}


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

<script src="/ckeditor/ckeditor.js"></script>
<script>
   CKEDITOR.replace('description', {
        toolbar: [
            { name: 'document', items: ['Source'] }, // Código fuente
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo'] },
            { name: 'styles', items: ['Styles', 'Format', 'FontSize'] }, // Tamaño y fuente
            { name: 'colors', items: ['TextColor', 'BGColor'] }, // Color de texto y fondo
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
            { name: 'insert', items: ['Table', 'HorizontalRule'] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'tools', items: ['Maximize'] } // Maximizar
        ],
        extraPlugins: 'colorbutton,font', // Activa plugins para color y fuentes
        removePlugins: 'elementspath', // Elimina la ruta de elementos
        resize_enabled: true // Permite redimensionar el editor
    });
</script>

@stop

@stop
