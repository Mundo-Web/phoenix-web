<div>
    @foreach ($banner as $item)
        <div class="flex flex-col my-10 w-full">
            <a href="{{$item['url_btn']}}">
                <img class="hidden md:flex w-full h-auto object-cover" style="object-position: 10%" src="{{ asset($item['image']) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
                <img class="flex md:hidden w-full h-auto object-cover" style="object-position: 10%" src="{{ asset($item['price']) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
            </a>
        </div>
    @endforeach
</div>
