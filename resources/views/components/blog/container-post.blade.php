 @php
     $category = $post->categoria();
 @endphp

<div class="flex flex-col gap-1">
    <a href="{{ route('detalleBlog', $post->id) }}" class="w-full">
        <img class="w-full h-[250px] lg:h-[300px] object-cover" src="{{ asset($post->url_image.$post->name_image)}}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" />
        <h2 class="text-[#052F4E] text-base font-galano_regular font-semibold mt-3">{{ $category->name ?? "S/Categoria"}}</h2>
        <h2 class="text-[#052F4E] text-2xl font-galano_bold line-clamp-2 md:line-clamp-1">{{ $post->title }}</h2>
        <p class="text-[#052F4E] text-lg font-galano_regular line-clamp-3">
            {{ Str::limit($post->extract, 250) }}
        </p>
        <h2 class="text-[#052F4E] text-base font-galano_regular font-semibold mt-1">Publicado {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</h2>
    </a>
</div>