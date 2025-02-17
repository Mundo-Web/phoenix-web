@php
  $completed = isset($completed) ? $completed : 1;
@endphp

<div class="w-full font-roboto_medium font-semibold">
  <ol
    class="flex items-center w-full text-sm font-semibold text-center text-gray-500 dark:text-gray-400 sm:text-base  border-b-2 px-0 py-4 sm:px-4">
    <li
      class="flex md:w-full items-center text-[#010101] sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
      <span
        class="flex items-center after:content-['/'] sm:after:hidden after:mx-1 after:text-gray-200 dark:after:text-gray-500">
        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        Carro <span class="hidden sm:inline-flex sm:ms-2 w-max">de compra</span>
      </span>
    </li>
    <li
      class="flex md:w-full items-center {{ $completed >= 2 ? 'text-[#010101] dark:text-[#010101] sm:' : '' }}after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
      <span
        class="flex items-center after:content-['/'] sm:after:hidden after:mx-1  after:text-gray-200 dark:after:text-gray-500">
        @if ($completed >= 2)
          <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
          </svg>
        @else
          <span class="me-2">2</span>
        @endif
        <span class=" sm:inline-flex sm:me-2 w-max mr-1">Detalles de </span> pago
      </span>
    </li>
    <li
      class="flex md:w-full items-center {{ $completed >= 3 ? 'text-[#010101] dark:text-[#010101] sm:' : '' }}after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
      <span
        class="flex items-center after:content-['/'] sm:after:hidden after:mx-1 after:text-gray-200 dark:after:text-gray-500">
        @if ($completed >= 3)
          <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
          </svg>
        @else
          <span class="me-2">3</span>
        @endif
        <span class=" sm:inline-flex sm:me-2 w-max font-semibold font-roboto_medium mr-1">Orden </span> completada
      </span>
    </li>
  </ol>
  <div class="block {{ $class ?? '' }}">
    {{ $slot }}
  </div>

</div>
