<div class="flex flex-col group relative">
  <a href="{{ route('producto', $item->id) }}">
      <div class="bg-[#F2F5F7] border-[2px] border-[#052F4E66] rounded-xl flex flex-row aspect-[17/20]">
          <div class="max-w-[340px] rounded-full flex flex-col items-center justify-center p-5 ">
              <img class="w-full h-full object-contain object-bottom rounded-full" alt="{{ $item->name }}" src="{{ asset($item->imagen)}}" onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';" />
          </div>
      </div>
  </a>
  <div class="flex flex-col justify-center items-center gap-1 mt-3">
      <div class="flex flex-col md:flex-row">
          <div class="flex flex-col w-full lg:w-2/3 gap-1">
              <a class="" href="#">  
                  <h2 class="font-galano_regular font-semibold text-[#052F4E] leading-5 text-base md:text-lg line-clamp-2">{{ $item->producto }}</h2>
              </a>
              <div class="font-galano_regular text-[#052F4E] text-xs line-clamp-2 leading-3">
                {!! $item->description !!}
              </div>  
          </div>
          <div class="flex flex-row lg:flex-col lg:justify-start items-center gap-2 lg:gap-0 lg:items-end w-full lg:w-1/3">
            @if ($item->descuento == 0)
              <p class="font-galano_regular font-bold text-lg text-[#052F4E] text-start lg:text-end">S/ {{ $item->precio }} </p>
            @else
              <p class="font-galano_regular font-bold text-lg text-[#052F4E] text-start lg:text-end">S/ {{ $item->descuento }} </p>
              <p class="font-galano_regular text-sm line-through text-[#052F4E] text-start lg:text-end"> S/ {{ $item->precio }}</p>
            
            @endif  
          </div> 
      </div>
  </div>
  <div class="flex flex-row gap-1 mt-2 inset-0 items-end justify-center opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
      <a href="{{ route('producto', $item->id) }}"
          class="text-white text-sm md:text-base py-2 px-6 w-full bg-[#052F4E] rounded-xl font-galano_regular font-semibold text-center">
          Ver producto
      </a>
  </div>
</div>
