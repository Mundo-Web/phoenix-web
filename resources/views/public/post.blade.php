@extends('components.public.matrix', ['pagina' => 'blog'])
@section('titulo', 'Post')
@section('meta_title', $meta_title)
@section('meta_description', $meta_description)
@section('meta_keywords', $meta_keywords)
@section('css_importados')

@stop

@section('content')

    @php
        $breadcrumbs = [['title' => 'Inicio', 'url' => route('index')], ['title' => 'Blogs', 'url' => route('blog', 0)], ['title' => $post->title, 'url' => '']];
    @endphp

    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <main>
        <section class="w-full px-[5%] lg:px-[10%] flex flex-col gap-10 pt-5" data-aos="fade-up" data-aos-offset="150">
            <div class="flex flex-col gap-3">
                <div class="flex flex-row gap-3 items-center">
                    <h3 class="font-semibold font-galano_regular text-base text-[#052F4E] bg-[#EBEDEF] rounded-xl px-6 py-1">{{$post->categories->name ?? "Sin categoria"}}</h3>
                    <p class=" font-galano_regular font-semibold text-base text-[#052F4E]">Publicado
                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                </div>
               
                <h2 class="font-galano_bold font-bold text-3xl lg:text-5xl  text-[#052F4E] leading-tight tracking-tight">
                    {{ $post->title }}
                </h2>
                
                @if ($post->url_image)
                    <div class="w-full mt-5" data-aos="fade-up" data-aos-offset="150">
                        <img src="{{ asset($post->url_image . $post->name_image) }}" alt="catedral"
                            class="w-full h-[563px] object-cover hidden md:block rounded-xl" onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" />
                        <img src="{{ asset($post->url_image . $post->name_image) }}" alt="catedral"
                            class="w-full h-[563px] object-cover block md:hidden rounded-xl" onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" />
                    </div>
                @endif


                <div class="flex flex-col gap-2 text-[#333] font-galano_regular font-normal text-base py-4">
                    {!! $post->description !!}
                </div>


                @if ($post->url_video)
                    <div class="w-full mb-10 lg:mb-16" data-aos="fade-up" data-aos-offset="150">
                        <iframe width="100%" height="600px" src="https://www.youtube.com/embed/{{ $post->url_video }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                @endif



               
                
            </div>

 
        </section>
    </main>


@section('scripts_importados')


@stop

@stop
