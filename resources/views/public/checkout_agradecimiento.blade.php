@extends('components.public.matrix', ['pagina' => ' '])

@section('css_importados')

@stop
<style>
  .fixedWhastapp {
    right: 128px !important;
  }
</style>

@section('content')

  <main>
    <section class="font-poppins my-12 w-11/12 mx-auto">
      <div class="flex flex-col 2md:flex-row gap-32 md:gap-10 w-11/12 mx-auto items-center justify-center">
        <div class="md:basis-1/2 flex flex-col gap-10 basis-0">
          <x-breadcrumb>
            <x-breadcrumb.item>Orden completada</x-breadcrumb.item>
          </x-breadcrumb>

          <div class="flex md:gap-20">
            <div class="flex justify-between items-center  w-full md:w-auto">
              <x-ecommerce.gateway.container completed="{{ 3 }}">
                <div class="flex flex-col justify-start gap-7 max-w-[600px] mx-auto pt-10 text-center">
                  <div class="font-poppins flex flex-col gap-2 justify-center items-center">
                    <p class="text-[#6C7275] font-medium text-[20px]">
                      Gracias por tu compra &#127881;
                    </p>
                    <h2 class="font-semibold text-[40px] text-[#151515]">
                      Tu pedido ha sido recibido
                    </h2>
                    <p class="font-medium text-[16px] text-[#6C7275]">
                      Código de pedido
                    </p>
                    <p id="codigoPedido" class="font-semibold text-[16px] text-[#141718]">#{{ $code }}</p>
                  </div>

                  <div class="font-galano_regular p-2">
            
            

                    <ul class="text-center">
                      <li class="mb-2">Realiza la transferencia/depósito a nuestras cuentas, o paga a través de YAPE o PLIN. </p>
                      {{-- <li class="mb-2">Luego, simplemente carga la imagen y envíanos la confirmación de pago. ¡Y listo 💫!</p> --}}
                      <li class="mb-2">Puedes enviarnos tu confirmación de pago a través de WhatsApp.</p>
                    </ul>
        
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 max-w-md  mx-auto">
                      <div class="flex items-center justify-start w-full">
                        <img src="{{asset('images/bancos/bcp2.jpg')}}" alt="BCP" class="w-10 rounded-lg object-cover object-center" />
                        <span class="ml-2 font-galano_semibold">191-99999999</span>
                      </div>
              
                      <div class="flex items-center justify-start ml-5">
                        <img src="{{asset('images/bancos/scotia2.png')}}" alt="Scotiabank" class="w-10 object-cover object-center rounded-lg" />
                        <span class="ml-2 font-galano_semibold">151-999999</span>
                      </div>
              
                      <div class="flex items-center justify-start">
                        <img src="{{asset('images/bancos/bbvau.png')}}" alt="BBVA" class="w-10 object-cover object-center rounded-lg" />
                        <span class="ml-2 font-galano_semibold leading-none">0011-9999-999999</span>
                      </div>
              
                      <div class="flex items-center justify-start ml-5">
                        <img src="{{asset('images/bancos/interb.png')}}" alt="Interbank" class="w-10 object-cover object-center rounded-lg" />
                        <span class="ml-2 font-galano_semibold">200-99999999</span>
                      </div>
                    </div>
                    
                    <div class="flex items-center justify-start md:justify-center mt-6">
                      <img src="{{asset('images/bancos/yapePlin.png')}}" alt="Yape Plin" class="w-16 h-auto" />
                      <div class="ml-2 font-galano_semibold leading-none">
                        <p>123456789</p>
                        <p>Mr Cremoso</p>
                      </div>
                    </div>
                    
                  </div>

                  <div class="font-poppins">
                    <div>
                      <div class="flex flex-col 2lg:flex-row  gap-5">
                        <div class="w-full basis-5/12" id="itemsCarritoAgradecimientos">

                        </div>
                        <meta name="csrf-token" content="{{ csrf_token() }}">


                      </div>
                    </div>

                  </div>
                </div>

                <div class="flex flex-col gap-5 items-center justify-center">

                  <div>
                    <a href=""
                      class="text-white bg-[#052F4E] w-80 py-3 rounded-xl cursor-pointer font-semibold text-[16px] inline-block text-center">
                      Enviar voucher a whatsapp</a>
                  </div>
                  
                  <div>
                    <a href="{{ route('catalogo.all') }}"
                      class="text-[#052F4E] bg-[#FFFFFF] hover:bg-[#052F4E] hover:text-white w-80 py-3 rounded-xl cursor-pointer font-semibold text-[16px] inline-block text-center border-[1.5px] border-[#052F4E]">Seguir
                      comprando</a>
                  </div>

                  <div>
                    <a href="{{ route('pedidos') }}"
                      class="text-[#052F4E] bg-[#FFFFFF] hover:bg-[#052F4E] hover:text-white w-80 py-3 rounded-xl cursor-pointer font-semibold text-[16px] inline-block text-center border-[1.5px] border-[#052F4E]">Historial
                      de compras</a>
                  </div>
                </div>
              </x-ecommerce.gateway.container>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script>

    // const isAuthenticated = @json($user);

    // $(document).ready(function () {

    //     if (isAuthenticated) {
            
    //       const cupon = Local.get('cupon') ?? {};
    //       const cuponid = cupon?.idcupon;

    //         if (cuponid) {
    //             $.ajax({
    //                 url: "{{ route('deletecupon') }}", 
    //                 method: "POST",
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                 data: {
    //                     id: cuponid,
    //                 },
    //                 success: function (response) {
    //                     if (response.status == true) {
    //                       Local.delete('carrito');
    //                       Local.delete('address');
    //                       Local.delete('cupon');
    //                       Local.delete('autenticado');
    //                     }
    //                 },
    //                 error: function (xhr) {
    //                     Swal.fire({
    //                         title: 'Error',
    //                         text: xhr.responseJSON?.message || 'Hubo un problema al eliminar el cupón.',
    //                         icon: 'error'
    //                     });
    //                 }
    //             });
    //         }

    //     } else {
    //                       // Local.delete('carrito');
    //                       // Local.delete('address');
    //                       // Local.delete('cupon');
    //                       // Local.delete('autenticado');
    //     }
    // });

        Local.delete('carrito');
        Local.delete('address');
        Local.delete('cupon');
        Local.delete('autenticado');

  </script>

@stop
