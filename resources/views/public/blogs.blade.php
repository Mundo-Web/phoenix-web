@extends('components.public.matrix', ['pagina' => 'catalogo'])

@section('css_importados')


@stop


@section('content')

    {{-- @php
    $breadcrumbs = [['title' => 'Inicio', 'url' => route('index')], ['title' => 'Blogs', 'url' => '']];
  @endphp --}}

    {{-- @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
  @endcomponent --}}

    <section class="px-[5%] pt-12 xl:pt-16 w-full">
        <div class="flex flex-col gap-2 max-w-3xl mx-auto">
            <h2
                class="text-[#052F4E] font-maille text-4xl md:text-5xl leading-none text-left lg:text-center max-w-2xl mx-auto">
                {{$textoshome->title10section ?? "Ingrese un texto"}}
            </h2>
            <p class="text-[#052F4E] font-galano_regular text-lg text-left lg:text-center">
                {{$textoshome->description10section ?? "Ingrese un texto"}}
            </p>
        </div>
    </section>

    <section class="px-[5%] pt-12 xl:pt-16 w-full">
        <div class="flex flex-col justify-start gap-12">

            <div class="flex flex-wrap gap-3 lg:gap-5 justify-center" data-aos="fade-up" data-aos-duration="150">
                <div class="flex flex-col gap-3">
                    <a href="{{ route('blog', 0) }}"
                        class="text-[15px] py-2.5 px-4 rounded-xl font-galano_medium text-center
                      {{ $filtro == 0 ? 'text-white bg-[#052F4E]' : 'text-[#052F4E] bg-[#EBEDEF]' }}">
                        Ver todas
                    </a>
                </div>
                @foreach ($categorias as $item)
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('blog', $item->id) }}"
                            class="text-[15px] py-2.5 px-4 rounded-lg font-galano_medium text-center
                          {{ $item->id == $filtro ? 'text-white bg-[#052F4E]' : 'text-[#052F4E] bg-[#EBEDEF]' }}">
                            {{ $item->name }}
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-10">

                @foreach ($lastposts as $post)
                    <div class="flex flex-col gap-1">
                      <a href="{{ route('detalleBlog', $post->id) }}" class="w-full">
                        <img class="w-full h-[250px] lg:h-[300px] object-cover"
                            src="{{ asset($post->url_image . $post->name_image) }}"
                            onerror="this.onerror=null;this.src='/images/imagen/noimagen.jpg';" alt="{{ $post->title }}" />

                        <h2 class="text-[#052F4E] text-base font-galano_regular font-semibold mt-3">
                            {{ $post->categories->name ?? 'Sin categoría' }}
                        </h2>

                        <h2 class="text-[#052F4E] text-2xl font-galano_bold line-clamp-2 md:line-clamp-1">
                            {{ $post->title }}
                        </h2>

                        <p class="text-[#052F4E] text-lg font-galano_regular line-clamp-3">
                            {{ $post->extract ?? 'No hay descripción disponible.' }}
                        </p>

                        <h2 class="text-[#052F4E] text-base font-galano_regular font-semibold mt-1">
                            Publicado {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                        </h2>
                      </a>
                    </div>
                @endforeach

            </div>

            @if ($posts->isEmpty())
            @else
              <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                  @foreach ($posts as $post)
                      <x-blog.container-post :post="$post" />
                  @endforeach
              </div>
            @endif

        </div>
    </section>

    <section>
        <div class="flex flex-col gap-10 lg:gap-14 w-full px-0 md:pl-[5%]  bg-[#EBEDEF] mt-10 md:mt-20">

            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="flex flex-col gap-1 md:col-span-2 pt-10  md:py-16 px-[5%] md:px-0">

                    <h2 class="text-[#052F4E] text-4xl md:text-5xl font-galano_bold leading-none">{{$textoshome->title11section ?? "Ingrese un texto"}}</h2>
                    <p class="text-[#052F4E] text-lg font-galano_regular line-clamp-3">
                        {{$textoshome->description11section ?? "Ingrese un texto"}}
                    </p>
                    <div class="flex flex-col md:flex-row gap-3 mt-10">
                        <form id="subsEmail">
                            <input id="emailFooter" type="email" name="email"
                                class="rounded-xl text-base font-galano_regular w-[250px]"
                                placeholder="Ingresa tu correo electronico" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button type="submit"
                                class="bg-[#052F4E] text-white px-6 py-2 rounded-xl font-galano_regular w-32"> Inscribirse
                            </button>
                        </form>
                    </div>
                    <h2 class="text-[#052F4E] text-sm font-galano_regular mt-1">Al hacer clic en Inscribirse, confirma que
                        acepta nuestros Términos y condiciones.</h2>
                </div>

                <div class="flex flex-col gap-1 md:col-span-1">
                    <img class="w-full min-h-[320px] h-full object-center object-cover"
                        src="{{ asset('images/imagen/heladosubscription.png') }}" />
                </div>
            </div>

        </div>
    </section>

@section('scripts_importados')


    <script src="{{ asset('js/storage.extend.js') }}"></script>


@stop

@stop
