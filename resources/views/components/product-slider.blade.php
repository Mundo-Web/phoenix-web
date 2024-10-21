{{-- <div class="col-span-3">
  <div class="swiper h-full img-complementarias"> 
    <div class="swiper-wrapper"> 
      <div class="swiper-slide w-full h-full col-span-1"> 
        <div class="flex gap-2 items-center justify-start h-full">
          <div class="flex justify-center items-center h-full">
            <img class="size-full object-cover h-full w-full shadow-xl" id="img-complementariaPROD-0"
              src="{{ $product->imagen ? asset($product->imagen) : asset('images/img/noimagen.jpg') }}" />
          </div>
        </div>
      </div>
      @foreach ($product->galeria as $index => $image)
        <div class="swiper-slide w-full h-full col-span-1"> 
          <div class="flex gap-2 items-center justify-start h-full">
            <div class="flex justify-center items-center h-full">
              <img class="size-full object-cover h-full w-full shadow-xl"
                id="img-complementariaPROD-{{ $index }}"
                src="{{ $image->imagen ? asset($image->imagen) : asset('images/img/noimagen.jpg') }}" />
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div> --}}

<div class="flex flex-col w-full">
    <div class="swiper img-complementarias h-60 sm:h-96 xl:h-[32rem]">
      <div class="swiper-wrapper">
        <div class="swiper-slide w-auto h-full  overflow-hidden "
          id="img-complementariaPROD-0">
          <div class="flex items-center justify-center h-full cursor-pointer">
              <img class="object-center object-contain h-full w-full shadow-xl aspect-square"
                src="{{ $product->imagen ? asset($product->imagen) : asset('images/img/noimagen.jpg') }}"
                onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';" />
          </div>
        </div>

        @foreach ($product->galeria as $index => $image)
          <div class="swiper-slide w-auto h-full overflow-hidden "
            id="img-complementariaPROD-{{ $index }}">
            <div class="flex items-center justify-center h-full cursor-pointer">
                <img class="object-center object-contain h-full w-full shadow-xl aspect-square"
                  src="{{ $image->imagen ? asset($image->imagen) : asset('images/img/noimagen.jpg') }}"
                  onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';" />
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>

<script>
  var headerServices = new Swiper(".img-complementarias", {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: false,
    // {{ count($product->galeria) > 1 ? 'true' : 'false' }},
    centeredSlides: false,
    direction: 'vertical',
    initialSlide: 0, // Empieza en el cuarto slide (índice 3) */
    /* pagination: {
      el: ".swiper-pagination-estadisticas",
      clickable: true,
    }, */
    //allowSlideNext: false,  //Bloquea el deslizamiento hacia el siguiente slide
    //allowSlidePrev: false,  //Bloquea el deslizamiento hacia el slide anterior
    allowTouchMove: {{ count($product->galeria) > 1 ? 'true' : 'false' }}, // Bloquea el movimiento táctil
    breakpoints: {
      0: {
        slidesPerView: 3,
        // centeredSlides: {{ count($product->galeria) <= 2 ? 'true' : 'false' }},
        spaceBetween: 0,
        //loop: {{ count($product->galeria) > 1 ? 'true' : 'false' }},
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });
</script>

<script>
  //crear un script que detecte el onclick de un img-complementariaPROD  y lo ponga en #containerProductosdetail
  var imgComplementaria = document.getElementById('img-complementariaPROD');

  $(document).on("click", "[id^='img-complementariaPROD-']", function() {
    let img = document.createElement('img');

    $("[id^='img-complementariaPROD-']").removeClass('border-azulboost').addClass('border-[#E5E7EB]');

    $(this).removeClass('border-[#E5E7EB]').addClass('border-azulboost');

    img.src = $(this).find('img').attr('src');
    img.classList.add('w-full', 'aspect-square', 'object-contain',
      'ease-in', 'duration-500',
      'transform', 'hover:scale-105', 'opacity-0', 'transition-opacity', 'duration-200');
    $("#imagenProducto").html(img);
    setTimeout(function() {
      img.classList.remove('opacity-0');
    }, 100);

    setTimeout(function() {
      container.children('img').not(img).remove();
    }, 200);
  });
</script>
{{-- <script>
  $(document).on("click", "[id^='img-complementariaPROD-']", function() {
    let img = document.createElement('img');
    $("[id^='img-complementariaPROD-']").removeClass('border-4 border-azulboost');
    $(this).addClass('border-4 border-azulboost');
    img.src = $(this).find('img').attr('src');
    img.classList.add('w-full', 'h-[330px]', '2xs:h-[400px]', 'sm:h-[450px]', 'xl:h-[550px]', 'object-contain', 'ease-in', 'duration-300',
      'transform', 'hover:scale-105', 'opacity-0', 'transition-opacity', 'duration-500');
    h-[330px]', '2xs:h-[400px]', 'sm:h-[450px]', 'xl:h-[550px]'
    let container = $("#containerProductosdetail");
    container.append(img);
    
    // setTimeout(function() {
    //   img.classList.remove('opacity-0');
    // }, 1000);
    
    // setTimeout(function() {
    //   container.children('img').not(img).remove();
    // }, 1000);
  });
</script> --}}
