<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $category->id }}">
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Creación de nueva
            categoría</h2>
        </header>

        <div class="p-3">
          <div class="rounded shadow-lg p-4 px-4 ">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              <div class="md:col-span-5">
                <label for="name">Nombre</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                  </div>
                  <input type="text" id="name" name="name" value="{{ $category->name }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nombre">
                </div>
              </div>

              <div class="md:col-span-5">
                <label for="description">Descripción</label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-start pl-3 pointer-events-none top-3">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                  </div>
                  <textarea type="text" rows="2" id="description" name="description" value=""
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Descripción">{{ $category->description }}</textarea>
                </div>
              </div>

              {{-- <div class="md:col-span-5">
                <label for="img_talla">Subir Guia de Tallas</label>
                <div class="relative mb-2  mt-2 flex flex-wrap items-center gap-2">
                  <img class="block w-40 h-40 mb-2 object-contain" src="{{$category->img_talla ? asset($category->img_talla) : asset('images/img/image-plus.jpg')}}" alt="">
                  <input name="img_talla"
                    class="p-2.5 block w-max text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
              </div> --}}

              {{-- <div class="md:col-span-5">
                <label for="imagen">Subir una Foto</label>
                <div class="relative mb-2  mt-2 flex flex-wrap items-center gap-2">
                  <img class="block w-40 h-40 mb-2" src="{{$category->name_image ? asset($category->url_image . $category->name_image) : asset('images/img/image-plus.jpg')}}" alt="">
                  <input name="imagen"
                    class="p-2.5 block w-max text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
              </div> --}}


              <label class=" hidden mb-2 text-gray-900 dark:text-white">Visualizacion de productos:</label>
              <ul class="hidden md:col-span-5  w-full gap-6 md:grid-cols-4">
                <li>
                  <input type="radio" id="object-cover" name="fit" value="cover" class="hidden peer"
                    @if ($category->fit == 'cover') checked @endif required @if($category->fit == null) checked @endif>
                  <label for="object-cover"
                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                      {{-- <i class="fas fa-square-full mb-2 text-xl text-sky-500"></i> --}}
                      <div class="w-full text-lg font-semibold">Ajustar al contenedor</div>
                      <div class="w-full text-sm">La imagen se ajustara al contenedor de la imagen</div>
                    </div>
                  </label>
                </li>
                <li>
                  <input type="radio" id="object-contain" name="fit" value="contain" class="hidden peer"
                    @if ($category->fit == 'contain') checked @endif required>
                  <label for="object-contain"
                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                      {{-- <i class="far fa-square mb-2 text-xl text-sky-500"></i> --}}
                      <div class="w-full text-lg font-semibold">Contener</div>
                      <div class="w-full text-sm">La imagen estara siempre dentro del contenedor</div>
                    </div>
                  </label>
                </li>
              </ul>


              <div class="md:col-span-5 text-right mt-6 flex justify-between">
                <div class="inline-flex items-end">
                  <a href="{{ route('categorias.index') }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
                </div>
                <div class="inline-flex items-end">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar
                    categoría</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>

</x-app-layout>
