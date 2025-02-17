@if (isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 0)
  <div class="pt-5 lg:pt-10 flex items-center justify-center font-roboto_bold w-full px-[5%] lg:px-[10%] text-[#010101]">
    <nav aria-label="breadcrumb" class="flex gap-4 items-center justify-start w-full">
      <ol class="breadcrumb flex flex-row justify-start items-center gap-3">
        @foreach ($breadcrumbs as $index => $breadcrumb)
          @if ($index > 0)
            <li class="text-base mx-3 font-roboto_bold"><i class="fa-solid fa-chevron-right"></i></li>
          @endif
          @if ($loop->last)
            <li class="breadcrumb-item active text-base text-[#010101] font-roboto_bold" aria-current="page">
              {{ $breadcrumb['title'] }}
            </li>
          @else
            <li class="breadcrumb-item text-base font-roboto_bold"><a
                href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
          @endif
        @endforeach
      </ol>
    </nav>
  </div>
@endif
