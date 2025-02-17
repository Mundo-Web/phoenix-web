@extends('components.public.matrix', ['pagina' => 'contacto'])

@section('css_importados')
    <style>
        .select2-dropdown{
            z-index: 20!important;
        }

        .select2-container{
            width: 100%!important;   
        }
        .select2-container .select2-selection--single {
            padding: 10px 5px!important;
            height: auto!important;
            border-radius: 12px!important;
            background:#F7F7F7!important;
        }
        .select2-results{
            padding: 15px!important;
            background:#F7F7F7!important;
            
        }
        .select2-results li{
            margin: 5px 0px!important;
            border-radius: 12px!important;
            padding: 10px!important; 
        }
        .select2-selection__placeholder{
            font-size: 'roboto_regular'!important;
            color: #010101!important;
            
        }
        .select2-data-custom-select option{
            font-size: 'roboto_regular'!important;
            color: #010101!important;

        }
       
    </style>
@stop

@section('content')



    <main>

        <section class="w-full  py-10 lg:py-16 px-[5%] xl:px-[8%]">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 md:gap-16 w-full ">
               

                <div class="lg:col-span-2 flex flex-col gap-10 w-full">

                    <div class="flex flex-col gap-10 bg-white rounded-xl">
                        <h2 class="leading-none font-akira_expanded  text-4xl xl:text-[56px] text-[#010101]">
                            Ponerse en <span class="text-[#FB4535]">Contacto</span>
                        </h2>
                        <form id="formContactos" class="grid grid-cols-1 lg:grid-cols-2 gap-4 font-roboto_regular">
                            @csrf

                            <div class="relative w-full ">
                                <label for="fullNameContacto"
                                    class="font-roboto_regular font-semibold text-sm text-[#010101]">Nombre completo</label>
                                <input required name="full_name" id="fullNameContacto" type="text"
                                    placeholder="Nombre completo"
                                    class="mt-1 w-full py-3 px-4 focus:outline-none bg-[#F7F7F7] font-roboto_regular text-base text-[#010101] focus:ring-0 placeholder:text-[#010101]  border-[#d7dee6] border transition-all focus:outline-0 focus:font-medium focus:bg-[#F7F7F7] focus:border-[#d7dee6] rounded-xl" />
                            </div>

                            <div class="relative w-full">
                                <label for="birthay"
                                    class="font-roboto_regular font-semibold text-sm text-[#010101]">Fecha de nacimiento (opcional)</label>
                                <input required name="birthay" id="birthay" type="date"
                                    placeholder="Fecha de nacimiento"
                                    class="mt-1 w-full py-3 px-4 focus:outline-none font-roboto_regular text-base text-[#010101] focus:ring-0 placeholder:text-[#010101]  border-[#d7dee6] border transition-all focus:outline-0 focus:font-medium bg-[#F7F7F7] focus:bg-[#F7F7F7] focus:border-[#d7dee6] rounded-xl" />
                            </div>

                            <div class="relative w-full">
                                <label for="emailContacto"
                                    class="font-roboto_regular font-semibold text-sm text-[#010101]">E-Mail</label>
                                <input type="email" name="email" placeholder="E-mail" required id="emailContacto"
                                    class="mt-1 w-full py-3 px-4 focus:outline-none font-roboto_regular text-base text-[#010101] focus:ring-0 placeholder:text-[#010101]  border-[#d7dee6] border transition-all focus:outline-0 focus:font-medium bg-[#F7F7F7] focus:bg-[#F7F7F7] focus:border-[#d7dee6] rounded-xl" />
                            </div>

                            <div class="relative w-full">
                                <label for="telefonoContacto"
                                    class="font-roboto_regular font-semibold text-sm text-[#010101]">Número de Teléfono</label>
                                <input id="telefonoContacto" name="phone" placeholder="Teléfono" type="tel"
                                    maxlength="12" required
                                    class="mt-1 w-full py-3 px-4 focus:outline-none font-roboto_regular text-base text-[#010101] focus:ring-0 placeholder:text-[#010101]  border-[#d7dee6] border transition-all focus:outline-0 focus:font-medium bg-[#F7F7F7] focus:bg-[#F7F7F7] focus:border-[#d7dee6] rounded-xl" />
                            </div>

                            <div class="lg:col-span-2 w-full flex flex-col gap-1">
                                <label for="custom-select"
                                    class="font-roboto_regular font-semibold text-sm text-[#010101]">Tus objetivos</label>
                                <select name="objective" id="custom-select" class="w-full font-roboto_regular font-semibold text-[#010101] bg-[#F7F7F7]">
                                    <option></option>
                                    <option value="sitio-web">Quiero bajar peso</option>
                                    <option value="redes-sociales">Mejorar condición física</option>
                                    <option value="recomendacion">Continuar con mi entrenamiento</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>

                            <div class="lg:col-span-2 relative w-full hidden" id="input-container">
                                <input id="otro" name="other" placeholder="Mi objetivo es..." type="text" 
                                    class="mt-1 w-full py-3 px-4 focus:outline-none font-roboto_regular text-base text-[#010101] focus:ring-0 placeholder:text-[#010101]  border-[#d7dee6] border transition-all focus:outline-0 focus:font-medium bg-[#F7F7F7] focus:bg-[#F7F7F7] focus:border-[#d7dee6] rounded-xl" />
                            </div>

                            <input class="lg:col-span-2" type="hidden" id="tipo" placeholder="tipo" name="source" value="Inicio" />

                            <div class="lg:col-span-2 lg:relative w-full">
                                <label for="message" class="font-roboto_regular font-semibold text-sm text-[#010101]">¿Tienes alguna pregunta? (opcional)</label>
                                <textarea name="message" id="message" rows="3" cols="30"
                                    class="mt-1 w-full py-3 px-4 focus:outline-none font-roboto_regular text-base text-[#010101] focus:ring-0 placeholder:text-[#010101]  border-[#d7dee6] border transition-all focus:outline-0 focus:font-medium bg-[#F7F7F7] focus:bg-[#F7F7F7] focus:border-[#d7dee6] rounded-xl"
                                    placeholder="Mensaje"></textarea>
                            </div>

                            <div class="lg:col-span-2 relative w-full flex flex-row items-center gap-3">

                                <input type="checkbox" required id="polytic"
                                    class="w-6 h-6  focus:outline-none font-roboto_regular text-base text-[#FB4535] focus:ring-0 placeholder:text-[#010101]  border-[#d7dee6] border transition-all focus:outline-0 focus:font-medium bg-transparent focus:bg-transparent focus:border-[#d7dee6] rounded-lg" />
                                <label for="polytic" class="font-roboto_regular font-semibold text-sm text-[#010101]">Usted
                                    acepta nuestra amigable política de privacidad.</label>
                            </div>

                            <input type="hidden" name="client_width" id="anchodispositivo">
                            <input type="hidden" name="client_height" id="largodispositivo">
                            <input type="hidden" name="client_latitude" id="latitud">
                            <input type="hidden" name="client_longitude" id="longitud">
                            <input type="hidden" name="client_system" id="sistema">
                            <input type="hidden" id="tipo" placeholder="tipo" name="source" value="Inicio" />
                            <div class="flex justify-center items-center py-5">
                                <button type="submit"
                                    class="flex flex-row justify-center gap-3 items-center text-lg font-roboto_medium  text-white bg-[#FB4535] py-3 px-6 w-full text-center rounded-3xl">Enviar
                                    formulario
                                  
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-1 flex flex-col justify-start">

                    <div class="flex flex-col gap-4">
                        <h2 class="leading-tight font-roboto_bold  text-2xl text-[#010101]">
                           {{$textoshome->title6sectio ?? "¿Quieres contactar con nosotros directamente?"}}</h2>
                        
                        <p class="text-[#010101] font-roboto_regular text-base">
                            {{$textoshome->description6sectin ?? "Ponte en contacto con los expertos en sistemas automáticos de gran trayectoria y alta efectividad."}}
                        </p>
                    </div>

                    <div class="flex flex-col gap-2 mt-4">
                        {{-- <div class="flex flex-col gap-1">
                            <p class="font-gotham_medium  text-2xl text-[#0181AA] ">Horario
                            </p>
                            <p class="font-gotham_book text-base text-[#11355a] font-normal">
                                @foreach (explode(',', $general[0]->schedule) as $item)
                                    {{ $item }}<br>
                                @endforeach
                            </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-gotham_medium  text-2xl text-[#0181AA] ">Dirección
                            </p>
                            <p class="font-gotham_book text-base text-[#11355a] font-normal">
                                {{ $general[0]->address }}, {{ $general[0]->inside }},
                                {{ $general[0]->district }} - {{ $general[0]->city }}
                            </p>
                        </div> --}}
                        <div class="flex flex-col gap-1">
                            <p class="font-roboto_regular text-base text-[#010101] font-normal flex flex-row gap-2 items-center">
                               <img src="{{asset('images/imagen/mailicon.png')}}" /> {{ $general[0]->email }}  
                            </p>
                        </div>
                    </div>

                </div>
                
            </div>
        </section>

        @if(count($categorias) > 0)
            <section class="w-full px-[5%] xl:px-[8%] py-20 bg-cover bg-center" style="background-image: url('{{ asset('images/imagen/bannerphoenix.png') }}');">
                <div class="grid grid-cols-1 md:grid-cols-3 w-full">
                    <div class="md:col-span-2 flex flex-col gap-3">
                        <div class="flex flex-row">
                            <span class="font-roboto_medium w-auto text-[#010101] bg-white rounded-3xl px-3 py-1">Team Pheonix Fitness</span>
                        </div>
                        <h2 class="leading-none font-akira_expanded  text-4xl xl:text-5xl text-white">
                            Tu mejor version comienza <span class="text-[#FB4535]">aqui</span>
                        </h2>
                        <div class="flex flex-row items-center justify-start">
                            <a href="{{route('catalogo', $categorias[0]->id)}}">
                                <div class="text-white font-roboto_medium flex flex-row gap-2 bg-[#FB4535] rounded-3xl text-center w-auto py-2 px-6">
                                    Let´s Go!
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M7 7H17M17 7V17M17 7L7 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif


        <section class="bg-cover relative py-10 lg:py-16" >
                <div class="">
                    <div class="flex flex-col justify-center items-center px-[5%] xl:px-[8%] pb-10 w-full max-w-2xl text-center mx-auto gap-5">
                        <h1 class="text-4xl lg:text-5xl font-akira_expanded font-bold text-[#010101]">
                            Preguntas
                            <span class="text-[#FB4535]">frecuentes</span>
                        </h1>

                        <p class="text-base font-roboto_regular tracking-normal">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                    </div>
                </div>

                <div class="px-[5%] md:px-[10%] flex flex-col gap-5 md:gap-10">  
                    <div class="flex flex-col items-center justify-center gap-5">
                        
                        <div class="grid w-full divide-y gap-y-5 divide-neutral-100 px-0 sm:px-6 py-2 rounded-3xl" data-aos="fade-down">

                           
                                <div class="py-3 bg-[#F7F7F7] rounded-3xl px-4" key={index}>
                                    <details class="group">
                                        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                            <span class="font-bold text-lg text-[#010101] font-roboto_bold">
                                                ¿Necesito experiencia previa para unirme?</span>
                                            <span class="transition group-open:rotate-180 bg-white rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none">
                                                    <path d="M17 10L11.9992 14.58L7 10" stroke="#FB4535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </summary>
                                        <p class="text-base text-[#010101] font-roboto_regular">
                                            No, no es necesario tener experiencia previa. Nuestros entrenadores adaptan los ejercicios a tu nivel físico, ya seas principiante o avanzado.
                                        </p>
                                    </details>
                                </div>

                                <div class="py-3 bg-[#F7F7F7] rounded-3xl px-4" key={index}>
                                    <details class="group">
                                        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                            <span class="font-bold text-lg text-[#010101] font-roboto_bold">
                                                ¿Necesito experiencia previa para unirme?</span>
                                            <span class="transition group-open:rotate-180 bg-white rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none">
                                                    <path d="M17 10L11.9992 14.58L7 10" stroke="#FB4535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </summary>
                                        <p class="text-base text-[#010101] font-roboto_regular">
                                            No, no es necesario tener experiencia previa. Nuestros entrenadores adaptan los ejercicios a tu nivel físico, ya seas principiante o avanzado.
                                        </p>
                                    </details>
                                </div>
                                    
                        </div>
                    </div>
                </div>  
        </section>

        {{-- <section class="px-[5%] pt-12 xl:pt-16">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-5">
                <div class="lg:col-span-4 flex flex-col gap-2 max-w-3xl">
                    <h2 class="text-[#052F4E] font-maille text-4xl md:text-5xl leading-none text-left ">
                        Ponte en contacto con nosotros. Estamos aquí para ayudarte.
                    </h2>
                    <p class="text-[#052F4E] font-galano_regular text-lg text-left ">
                        Si tienes alguna duda o necesitas más información sobre nuestros productos, no dudes en contactarnos.
                        Nuestro equipo está listo para brindarte la atención que necesitas y ayudarte a llevar tu heladería al siguiente nivel.
                    </p>
                </div>
                <div class="lg:col-span-1 flex flex-row lg:flex-col gap-4 lg:gap-2 max-w-3xl justify-center items-end">
                   <div class="flex">
                        @if ($general[0]->facebook)
                            <div class=" p-2 rounded-full border border-[#052F4E] w-auto">
                                <a href="{{ $general[0]->facebook }}" target="_blank"
                                    class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                                    <img class="w-5 h-5 rounded-full object-cover aspect-square" src="{{ asset('images/imagen/facecremoso.png') }}"/>
                                </a>
                            </div>
                        @endif   
                   </div>

                   <div class="flex">
                        @if ($general[0]->instagram)
                            <div class=" p-2 rounded-full border border-[#052F4E] w-auto">
                                <a href="{{ $general[0]->instagram }}" target="_blank"
                                    class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                                    <img class="w-5 h-5 rounded-full object-cover aspect-square" src="{{ asset('images/imagen/instacremoso.png') }}"/>
                                </a>
                            </div>
                        @endif   
                   </div>

                   <div class="flex">
                        @if ($general[0]->linkedin)
                            <div class=" p-2 rounded-full border border-[#052F4E] w-auto">
                                <a href="{{ $general[0]->linkedin }}" target="_blank"
                                    class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                                    <img class="w-5 h-5 rounded-full object-cover aspect-square" src="{{ asset('images/imagen/linkedcremoso.png') }}"/>
                                </a>
                            </div>
                        @endif   
                    </div>

                    <div class="flex">
                        @if ($general[0]->twitter)
                            <div class=" p-2 rounded-full border border-[#052F4E] w-auto">
                                <a href="{{ $general[0]->twitter }}" target="_blank"
                                    class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                                    <img class="w-5 h-5 rounded-full object-cover aspect-square" src="{{ asset('images/imagen/twicremoso.png') }}"/>
                                </a>
                            </div>
                        @endif   
                    </div>

                </div>

            </div>
        </section> --}}

        {{-- <section class="px-[5%] pt-12 xl:pt-16">
            <form id="formContactos">
                @csrf
                   <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                       <div>
                           <input name="full_name" id="fullNameContacto" type="text" class="text-[#052F4E] font-galano_regular font-semibold text-base focus:ring-0 focus:border-b 
                           border-x-0 border-t-0 border-b border-[#052F4E] w-full" placeholder="Nombre completo"/>
                       </div>
   
                       <div>
                           <input name="email" id="emailContacto" type="text" class="text-[#052F4E] font-galano_regular font-semibold text-base focus:ring-0 focus:border-b 
                           border-x-0 border-t-0 border-b border-[#052F4E] w-full" placeholder="Correo electrónico"/>
                       </div>
   
                       <div>
                           <input type="tel" name="phone" id="telefonoContacto" maxlength="12" class="text-[#052F4E] font-galano_regular font-semibold text-base focus:ring-0 focus:border-b 
                           border-x-0 border-t-0 border-b border-[#052F4E] w-full" placeholder="Número de teléfono (opcional)"/>
                       </div>
   
                       <div class="md:col-span-3">
                           <textarea name="message" id="message" cols="30" rows="3" placeholder="Ingresa el mensaje"
                            class=" text-[#052F4E] font-galano_regular font-semibold text-base focus:ring-0 focus:border-b border-x-0 border-t-0 border-b border-[#052F4E] w-full"></textarea>
                       </div>
   
                       <div class="flex flex-row justify-start items-start">
                            <button type="submit"
                                class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-base font-galano_light font-semibold text-left">
                                Déjanos un mensaje
                            </button>
                       </div>
                   </div>
               </form>
        </section> --}}


        {{-- <section>
            <div class="flex flex-col gap-10 w-full px-[5%] py-10 md:py-20 bg-[#EBEDEF] mt-10 md:mt-20">
                
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-5 lg:gap-0">
                    
                    <div class="lg:col-span-2 flex flex-col justify-center">

                        <div class="flex flex-col p-2 justify-center items-start gap-8">
                            <h2 class="text-[#052F4E] text-lg font-galano_regular">
                                Información de contacto
                            </h2>
                            <h2 class="text-[#052F4E] text-4xl md:text-5xl font-maille leading-none">Siempre estaremos
                                encantados de ayudarle.</h2>
                        </div>

                    </div>

                    <div class="lg:col-span-1 flex flex-col gap-10 justify-center items-start">
                        <div class="flex flex-col">
                            @if(!empty($general[0]->email))
                                <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">Correo electrónico</h2>
                                <div class="h-[2px] w-20 bg-[#C69671] my-2"></div>
                                <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">{{ $general[0]->email }}</h2>
                            @endif
                        
                            @if(!empty($general[0]->schedule))
                                <p class="text-[#052F4E] text-sm font-galano_regular mt-1">{{ $general[0]->schedule }}</p>
                            @endif
                        </div>
                        <div class="flex flex-col gap-1.5">
                            @if(!empty($general[0]->cellphone) && !empty($general[0]->office_phone))
                                <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">Teléfonos</h2>
                                <div class="h-[2px] w-20 bg-[#C69671] my-2"></div>
                            @endif

                            @if(!empty($general[0]->cellphone))
                                <div class="flex text-[#052F4E] text-sm font-galano_regular flex-row gap-2">
                                    <span>Teléfono móvil:</span>
                                    <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">{{ $general[0]->cellphone }}</h2>
                                </div>
                            @endif
                        
                            @if(!empty($general[0]->office_phone))
                                <div class="flex text-[#052F4E] text-sm font-galano_regular flex-row gap-2">
                                    <span>Teléfono fijo:</span>
                                    <h2 class="text-[#052F4E] text-xl font-galano_medium leading-none">{{ $general[0]->office_phone }}</h2>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="lg:col-span-2 flex flex-col sm:flex-row gap-5 sm:gap-10 lg:flex-col justify-around items-start lg:items-end">
                        <img class="h-96 md:h-[350px] w-auto object-contain object-center" src="{{asset('images/imagen/imagenmapa.png')}}" />
                    </div>
                    
                </div>

            </div>
        </section> --}}

        {{-- <section class="flex flex-col my-8 lg:my-16 font-Urbanist_Regular">
            <div class="flex flex-wrap gap-10 items-start px-[5%] lg:px-[8%] w-full">
                <div class="flex flex-col grow shrink min-w-[240px] w-[390px] max-md:max-w-full">
                    <header class="flex flex-col max-w-full text-neutral-900 w-[488px]">
                        <h1 class="text-5xl font-medium max-md:max-w-full font-Urbanist_Bold">A nuestro amable equipo le
                            encantaría saber de
                            usted</h1>
                        <p class="mt-3 text-base font-Urbanist_Regular max-md:max-w-full"> ¿Tienes alguna pregunta o necesitas ayuda? Estamos aquí para asistirte. 
                            No dudes en ponerte en contacto con nosotros para resolver cualquier inquietud, 
                            recibir asesoría personalizada o conocer más sobre nuestros servicios. </p>
                    </header>
                    <aside class="flex flex-col mt-12 max-w-full w-full max-md:mt-10 ">
                        <div class="flex flex-col w-full">
                            <h2 class="text-xl font-semibold text-black font-Urbanist_Regular">Horario de oficina</h2>
                            <p class="flex flex-col mt-2 max-w-[300px] text-base font-light text-neutral-900 w-full">
                                @if ($general->schedule)
                                    <span>{{ $general->schedule }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="flex flex-col mt-8 w-full">
                            <h2 class="text-xl font-semibold text-black font-Urbanist_Regular">Nuestra dirección</h2>
                            <div class="flex flex-col mt-2 max-w-full text-base font-light text-neutral-900 w-full">
                                @if ($general->address && is_null($general->inside))
                                    <span>{{ $general->address }}</span>
                                @elseif(is_null($general->address) && $general->inside)
                                    <span>{{ $general->inside }}</span>
                                @elseif($general->address && $general->inside)
                                    <span>{{ $general->address }}, {{ $general->inside }}</span>
                                @endif

                                @if ($general->district && is_null($general->city))
                                    <span>{{ $general->district }}</span>
                                @elseif(is_null($general->district) && $general->city)
                                    <span>{{ $general->city }}</span>
                                @elseif($general->district && $general->city)
                                    <span>{{ $general->district }}, {{ $general->city }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="flex flex-col mt-8 w-full">
                            <h2 class="text-xl font-semibold text-black font-Urbanist_Regular">Ponerse en contacto</h2>
                            <p class="flex flex-col mt-2 max-w-full text-base font-light text-neutral-900 w-full">
                                @if ($general->cellphone)
                                    <a href="tel:+51{{ $general->cellphone }}">{{ $general->cellphone }}</a>
                                @endif

                                @if ($general->office_phone)
                                    <a href="tel:+51{{ $general->office_phone }}">{{ $general->office_phone }}</a>
                                @endif
                            </p>
                        </div>
                    </aside>
                </div>
                <div class="flex flex-col grow shrink justify-center px-0 lg:px-10 min-w-[240px] w-[494px]">
                    <header class="flex flex-col w-full text-neutral-900 max-md:max-w-full">
                        <h2 class="text-3xl font-semibold max-md:max-w-full font-Helvetica_Medium">Ponerse en contacto</h2>
                        <p class="mt-4 text-base font-light max-md:max-w-full">Puedes llamarnos, enviarnos un correo o completar el formulario de contacto. 
                            ¡Estamos a tu disposición!</p>
                    </header>
                    <form class="flex flex-col mt-12 w-full max-md:mt-10 max-md:max-w-full" id="formContactos">
                        <div class="flex flex-wrap gap-4 items-start w-full text-neutral-900 max-md:max-w-full">
                            <div class="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                                <label for="nombre" class="text-[15px] font-medium font-Helvetica_Medium">Nombre</label>
                                <input id="nombre" type="text" placeholder="Ingresa tu nombre" name="name"
                                    class="focus:ring-black focus:border-black px-4 py-2 mt-1.5 w-full text-base font-light bg-white rounded-0 border border-gray-300 border-solid shadow-sm"
                                    aria-label="Ingresa tu nombre">
                            </div>
                            <div class="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                                <label for="apellido" class="text-[15px] font-medium font-Helvetica_Medium">Apellido</label>
                                <input id="apellido" type="text" placeholder="Ingresa tu apellido" name="lastname"
                                    class="focus:ring-black focus:border-black px-4 py-2 mt-1.5 w-full text-base font-light bg-white rounded-0 border border-gray-300 border-solid shadow-sm"
                                    aria-label="Ingresa tu apellido">
                            </div>
                        </div>
                        <div class="flex flex-col mt-6 w-full text-neutral-900 max-md:max-w-full">
                            <label for="email" class="text-[15px] font-medium font-Helvetica_Medium">E-mail</label>
                            <input id="email" type="email" placeholder="Ingresa tu dirección de correo electrónico"
                                name="email"
                                class="focus:ring-black focus:border-black px-4 py-2 mt-1.5 w-full text-base font-light bg-white rounded-0 border border-gray-300 border-solid shadow-sm"
                                aria-label="Ingresa tu dirección de correo electrónico">
                        </div>
                        <div class="flex flex-col mt-6 w-full whitespace-nowrap text-neutral-900 max-md:max-w-full">
                            <label for="telefono"
                                class="text-[15px] font-medium max-md:max-w-full font-Helvetica_Medium">Telefono</label>
                            <input id="telefono" type="tel" placeholder="+51..." name="phone"
                                class="focus:ring-black focus:border-black px-4 py-2 mt-1.5 w-full text-base font-light bg-white rounded-0 border border-gray-300 border-solid shadow-sm"
                                aria-label="Ingresa tu número de teléfono">
                        </div>
                        <div class="flex flex-col mt-6 w-full text-neutral-900 max-md:max-w-full">
                            <label for="mensaje"
                                class="text-[15px] font-medium max-md:max-w-full font-Helvetica_Medium">Escribe un
                                mensaje</label>
                            <textarea id="mensaje" placeholder="Escríbenos tu pregunta aquí" name="message"
                                class="focus:ring-black focus:border-black px-4 py-2 mt-1.5 w-full text-base font-light bg-white rounded-0 border border-gray-300 border-solid shadow-sm"
                                rows="3" aria-label="Escribe tu mensaje"></textarea>
                        </div>
                        <div class="flex flex-wrap gap-3 items-center mt-6 w-full max-md:max-w-full">
                            <input type="checkbox" id="privacy-policy" required
                                class="w-5 h-5 bg-white text-black focus:ring-0 rounded-0 border border-gray-300 border-solid">
                            <label for="privacy-policy"
                                class="text-[15px] font-light text-neutral-900 font-Helvetica_Light">Usted acepta nuestra
                                amigable política de privacidad.</label>
                        </div>
                        <button type="submit"
                            class="font-Urbanist_Regular font-semibold tracking-wider gap-2.5 self-stretch px-4 py-3 mt-8 w-full text-base text-center text-white bg-black rounded-0 min-h-[43px] max-md:max-w-full">Enviar
                            mensaje</button>
                    </form>
                </div>
            </div>
        </section> --}}

    </main>


@section('scripts_importados')
    
    <script>
        $(document).ready(function () {
            // Inicializar Select2
            $('#custom-select').select2();

            // Manejar el evento change de Select2
            $('#custom-select').on('change', function () {
                const inputContainer = $('#input-container');

                if ($(this).val() === 'otro') {
                    inputContainer.removeClass('hidden').addClass('flex'); // Mostrar input
                } else {
                    inputContainer.addClass('hidden').removeClass('flex'); // Ocultar input
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#custom-select').select2({
                placeholder: '¿Cuáles son tus objetivos?',
                minimumResultsForSearch: Infinity,
                templateSelection: function(data, container) {
                    // Add custom styling to selected option
                    $(container).addClass("");
                    return data.text;
                }
            });
        });
    </script>

    <script>
        function alerta(message) {
            Swal.fire({
                title: message,
                icon: "error",
            });
        }

        function validarEmail(value) {
            console.log(value)
            const regex =
                /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

            if (!regex.test(value)) {
                alerta("El campo email no es válido");
                return false;
            }
            return true;
        }

        $('#formContactos').submit(function(event) {
            // Evita que se envíe el formulario automáticamente
            //console.log('evcnto')
            let btnEnviar = $('#btnEnviar');
            btnEnviar.prop('disabled', true);
            btnEnviar.text('Enviando...');
            btnEnviar.css('cursor', 'not-allowed');

            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarEmail($('#emailContacto').val())) {
                btnEnviar.prop('disabled', false);
                btnEnviar.text('Enviar Mensaje');
                btnEnviar.css('cursor', 'pointer');
                return;
            };


            /* console.log(formDataArray); */
            $.ajax({
                url: '{{ route('guardarContactos') }}',
                method: 'POST',
                data: $(this).serialize(),
                beforeSend: function() {
                    Swal.fire({
                        title: 'Enviando...',
                        text: 'Por favor, espere',
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    Swal.close(); // Close the loading message
                    $('#formContactos')[0].reset();
                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    if (!window.location.href.includes('#formularioenviado')) {
                        window.location.href = window.location.href.split('#')[0] +
                        '#formularioenviado';
                    }
                    btnEnviar.prop('disabled', false);
                    btnEnviar.text('Enviar Mensaje');
                    btnEnviar.css('cursor', 'pointer');
                },
                error: function(error) {
                    Swal.close(); // Close the loading message
                    const obj = error.responseJSON.message;
                    const keys = Object.keys(error.responseJSON.message);
                    let flag = false;
                    keys.forEach(key => {
                        if (!flag) {
                            const e = obj[key][0];
                            Swal.fire({
                                title: error.message,
                                text: e,
                                icon: "error",
                            });
                            flag = true; // Marcar como mostrado
                        }
                    });
                    btnEnviar.prop('disabled', false);
                    btnEnviar.text('Enviar Mensaje');
                    btnEnviar.css('cursor', 'pointer');
                }
            });
        })
    </script>

    <script>
        $(document).ready(function() {


            function capitalizeFirstLetter(string) {
                string = string.toLowerCase()
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        })
        $('#disminuir').on('click', function() {
            console.log('disminuyendo')
            let cantidad = Number($('#cantidadSpan span').text())
            if (cantidad > 0) {
                cantidad--
                $('#cantidadSpan span').text(cantidad)
            }


        })
        // cantidadSpan
        $('#aumentar').on('click', function() {
            console.log('aumentando')
            let cantidad = Number($('#cantidadSpan span').text())
            cantidad++
            $('#cantidadSpan span').text(cantidad)

        })
    </script>
    <script>
        let articulosCarrito = [];


        function deleteOnCarBtn(id, operacion) {
            console.log('Elimino un elemento del carrito');
            console.log(id, operacion)
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


        }

        function calcularTotal() {
            let articulos = Local.get('carrito')
            console.log(articulos)
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

        function addOnCarBtn(id, operacion) {
            console.log('agrego un elemento del cvarrio');
            console.log(id, operacion)

            const prodRepetido = articulosCarrito.map(item => {
                if (item.id === id) {
                    item.cantidad += Number(1);
                    return item; // retorna el objeto actualizado 
                } else {
                    return item; // retorna los objetos que no son duplicados 
                }

            });
            console.log(articulosCarrito)
            Local.set('carrito', articulosCarrito)
            // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
            limpiarHTML()
            PintarCarrito()


        }

        function deleteItem(id) {
            console.log('borrando elemento')
            articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

            Local.set('carrito', articulosCarrito)
            limpiarHTML()
            PintarCarrito()
        }

        var appUrl = <?php echo json_encode($url_env); ?>;
        console.log(appUrl);
        $(document).ready(function() {
            articulosCarrito = Local.get('carrito') || [];

            PintarCarrito();
        });

        function limpiarHTML() {
            //forma lenta 
            /* contenedorCarrito.innerHTML=''; */
            $('#itemsCarrito').html('')


        }



        // function PintarCarrito() {
        //   console.log('pintando carrito ')

        //   let itemsCarrito = $('#itemsCarrito')

        //   articulosCarrito.forEach(element => {
        //     let plantilla = `<div class="flex justify-between bg-white font-Inter_Regular border-b-[1px] border-[#E8ECEF] pb-5">
    //         <div class="flex justify-center items-center gap-5">
    //           <div class="bg-[#F3F5F7] rounded-md p-4">
    //             <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
    //           </div>
    //           <div class="flex flex-col gap-3 py-2">
    //             <h3 class="font-semibold text-[14px] text-[#151515]">
    //               ${element.producto}
    //             </h3>
    //             <p class="font-normal text-[12px] text-[#6C7275]">

    //             </p>
    //             <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
    //               <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
    //                 <span  class="text-[20px]">-</span>
    //               </button>
    //               <div class="w-8 h-8 flex justify-center items-center">
    //                 <span  class="font-semibold text-[12px]">${element.cantidad }</span>
    //               </div>
    //               <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
    //                 <span class="text-[20px]">+</span>
    //               </button>
    //             </div>
    //           </div>
    //         </div>
    //         <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
    //           <p class="font-semibold text-[14px] text-[#151515]">
    //             S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
    //           </p>
    //           <div class="flex items-center">
    //             <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
    //             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    //               <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
    //             </svg>
    //             </button>

    //           </div>
    //         </div>
    //       </div>`

        //     itemsCarrito.append(plantilla)

        //   });

        //   calcularTotal()
        // }






        $('#btnAgregarCarrito').on('click', function() {
            let url = window.location.href;
            let partesURl = url.split('/')
            let item = partesURl[partesURl.length - 1]
            let cantidad = Number($('#cantidadSpan span').text())
            item = item.replace('#', '')



            // id='nodescuento'


            $.ajax({

                url: `{{ route('carrito.buscarProducto') }}`,
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    id: item,
                    cantidad

                },
                success: function(success) {
                    console.log(success)
                    let {
                        producto,
                        id,
                        descuento,
                        precio,
                        imagen,
                        color
                    } = success.data
                    let cantidad = Number(success.cantidad)
                    let detalleProducto = {
                        id,
                        producto,
                        descuento,
                        precio,
                        imagen,
                        cantidad,
                        color

                    }
                    let existeArticulo = articulosCarrito.some(item => item.id === detalleProducto.id)
                    if (existeArticulo) {
                        //sumar al articulo actual 
                        const prodRepetido = articulosCarrito.map(item => {
                            if (item.id === detalleProducto.id) {
                                item.cantidad += Number(detalleProducto.cantidad);
                                return item; // retorna el objeto actualizado 
                            } else {
                                return item; // retorna los objetos que no son duplicados 
                            }

                        });
                    } else {
                        articulosCarrito = [...articulosCarrito, detalleProducto]

                    }

                    Local.set('carrito', articulosCarrito)
                    let itemsCarrito = $('#itemsCarrito')
                    let ItemssubTotal = $('#ItemssubTotal')
                    let itemsTotal = $('#itemsTotal')
                    limpiarHTML()
                    PintarCarrito()

                },
                error: function(error) {
                    console.log(error)
                }

            })



            // articulosCarrito = {...articulosCarrito , detalleProducto }
        })
        // $('#openCarrito').on('click', function() {
        //   console.log('abriendo carrito ');
        //   $('.main').addClass('blur')
        // })
        // $('#closeCarrito').on('click', function() {
        //   console.log('cerrando  carrito ');

        //   $('.cartContainer').addClass('hidden')
        //   $('#check').prop('checked', false);
        //   $('.main').removeClass('blur')


        // })
    </script>

    <script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop
