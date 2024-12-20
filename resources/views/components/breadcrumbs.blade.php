@if (isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 0)
  <div class="pt-5 flex items-center justify-center font-galano_semibold w-full">
    <nav aria-label="breadcrumb" class="flex gap-4 items-center justify-center w-full">
      <ol class="breadcrumb flex flex-row items-center gap-3">
        @foreach ($breadcrumbs as $index => $breadcrumb)
          @if ($index > 0)
            <li class="text-base mx-6 font-galano_semibold"><i class="fa-solid fa-greater-than"></i></li>
          @endif
          @if ($loop->last)
            <li class="breadcrumb-item active text-base text-gray-700 font-galano_semibold" aria-current="page">
              {{ $breadcrumb['title'] }}
            </li>
          @else
            <li class="breadcrumb-item text-base font-galano_semibold"><a
                href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
          @endif
        @endforeach
      </ol>
    </nav>
  </div>
@endif
