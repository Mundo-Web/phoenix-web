<li>
  <div class="flex items-center font-Urbanist_Bold">
    <svg class="rtl:rotate-180 w-3 h-3 text-[#c1272d] mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="none" viewBox="0 0 6 10">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
    </svg>
    @if (isset($href))
      <a href="{{ $href }}"
        class="ms-1 text-base font-medium text-gray-700 hover:text-[#c1272d] md:ms-2">{{ $slot }}</a>
    @else
      <span class="ms-1 text-base font-medium text-gray-700 md:ms-1">{{ $slot }}</span>
    @endisset
</div>
</li>
