<div>
    @foreach ($banner as $item)
        <div class="flex flex-col md:flex-row justify-between bg-center bg-no-repeat bg-contain object-cover my-10">
            <a href="{{$item['url_btn']}}">
                <img class="w-full h-auto object-cover" src="{{ asset($item['image']) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
            </a>
        </div>
    @endforeach
</div>
