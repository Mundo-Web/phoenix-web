@php
  $sliderId = isset($i) ? $id : 'slider-' . uniqid();
@endphp
<style>
  
  @media (max-width: 400px) {
    #{{ $sliderId }} .swiper-slide {
      font-size: 14px;
    }
  }

  @media (max-width: 700px) {
    .modal.modalbanner {
      max-width: 80vw;
    }

    #{{ $sliderId }} .swiper-slide {
      font-size: 14px;
    }
  }
</style>

<div id="{{ $sliderId }}" class="swiper header-slider">
  <div class="swiper-wrapper">
    @foreach ($items as $item)
      <div class="swiper-slide relative">
        <img src="{{ asset($item->image) }}" alt="" class="w-full object-cover h-full max-h-[180px] sm:max-h-[250px] 2xl:max-h-[300px] 3xl:max-h-[350px] sm:aspect-4/3">
        <div class="absolute bottom-10 left-3 right-0 flex content-center justify-start items-center z-10">
          <a href="{{ $item->button_link }}"
            class="font-semibold font-galano_regular text-[16px] 2xl:text-lg 3xl:text-xl bg-[#FB4535] py-2 px-4 text-center text-white rounded-xl absolute">
            {{ $item->button_text }}
          </a>
        </div>
      </div>
    @endforeach
  </div>
  {{-- <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div> --}}
</div>

<script>
  new Swiper("#{{ $sliderId }}", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    autoplay: true,
    grab: true,
    centeredSlides: false,
    initialSlide: 0,
    pagination: {
      el: ".swiper-pagination-slider-header",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
