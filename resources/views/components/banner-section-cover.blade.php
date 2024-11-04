<div>
    @foreach ($banner as $item)
        <div class="flex flex-col md:flex-row justify-between my-10">
            <a href="{{$item['url_btn']}}">
                <img class="w-full h-full object-contain" style="object-position: 10%" src="{{ asset($item['image']) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
            </a>
        </div>
    @endforeach
</div>
