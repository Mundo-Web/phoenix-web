@php
  use SoDe\Extend\Crypto;
@endphp

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
                <label for="order">Orden (Considera que el número más bajo será el primero)</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                      version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0"
                      y="0" viewBox="0 0 469.336 469.336" style="enable-background:new 0 0 512 512" xml:space="preserve"
                      class="">
                      <g>
                        <path
                          d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                          fill="#9F9F9F" opacity="1" data-original="#000000" class=""></path>
                      </g>
                    </svg>
                  </div>
                  <input type="number" id="order" name="order" value="{{$category->order}}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingresa el numero de orden">
                </div>
              </div>

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

              <div class="col-span-5 md:col-span-5">
                <label for="duracion">Duración (Agregar elemento por linea)</label>
                <div class="relative mb-2 mt-2">
                  <x-form.quill id="duracion" :value="$category->duracion" />
                </div>
              </div>

              <div class="col-span-5 md:col-span-5">
                <label for="frecuencia">Frecuencia (Agregar elemento por linea)</label>
                <div class="relative mb-2 mt-2">
                  <x-form.quill id="frecuencia" :value="$category->frecuencia" />
                </div>
              </div>

              <div class="col-span-5 md:col-span-5">
                <label for="horario">Horario (Agregar elemento por linea)</label>
                <div class="relative mb-2 mt-2">
                  <x-form.quill id="horario" :value="$category->horario" />
                </div>
              </div>


              <div class="md:col-span-5 mt-2">
                <div class=" flex items-end justify-between gap-2 ">
                    <label for="specifications">Beneficios del servicio</label>
                    <button type="button" id="AddEspecifiacion"
                    class="text-blue-500 hover:underline focus:outline-none font-medium">
                    <i class="fa fa-plus"></i>
                    Agregar
                    </button>
                </div>
                @foreach ($especificacion as $key => $item)
                    @php
                        $counter = count($especificacion) - $key;
                    @endphp
                    <div class="flex w-full gap-2">
                      <div class="relative mb-2 w-full mt-2">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                          </div>
                          <input type="text" id="specifications" name="tittle-{{ $counter }}"
                          value="{{ $item->tittle }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Titulo">
                      </div>
                      <div class="relative mb-2 w-full mt-2">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                          </div>
                          <input type="text" id="specifications" name="specifications-{{ $counter }}"
                          value="{{ $item->specifications }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Especificacion">
                      </div>
                    </div>
                @endforeach
            </div>



              {{-- <div class="md:col-span-5">
                <label for="img_talla">Subir Guia de Tallas</label>
                <div class="relative mb-2  mt-2 flex flex-wrap items-center gap-2">
                  <img class="block w-40 h-40 mb-2 object-contain" src="{{$category->img_talla ? asset($category->img_talla) : asset('images/imagen/image-plus.jpg')}}" alt="">
                  <input name="img_talla"
                    class="p-2.5 block w-max text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
              </div> --}}

              <div class="md:col-span-5">
                <label for="imagen">Subir imagen</label>
                <div class="relative mb-2  mt-2 flex flex-wrap items-center gap-2">
                  <img class="block w-40 h-40 mb-2" src="{{$category->name_image ? asset($category->url_image . $category->name_image) : asset('images/imagen/image-plus.jpg')}}" alt="">
                  <input name="imagen"
                    class="p-2.5 block w-max text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
              </div>

              <div class="col-span-5">
                <label for="imagenes mb-2">Otras imagenes del producto</label>
                <div id="imagenes" class="w-full flex flex-wrap gap-1">

                  <div id="imagenes_sortable" class="flex flex-wrap gap-1 max-w-full">
                    @foreach ($galery as $key => $image)
                      @php
                        $uuid = Crypto::randomUUID();
                      @endphp
                      <div id="galery_container_{{ $uuid }}"
                        class="relative group block w-[120px] h-[160px] rounded-md border" draggable="true">
                        <div
                          class="absolute top-0 left-0 bottom-0 right-0 rounded-md hover:bg-[#00000075] transition-all flex flex-col items-center justify-center gap-1">
                          <label for="galery_{{ $uuid }}" title="Cambiar Imagen" tippy
                            class="text-xl text-white hidden group-hover:block cursor-pointer fa-solid fa-camera-rotate z-10"></label>
                          <i id="btn_delete_galery" data-id="{{ $uuid }}" title="Eliminar Imagen" tippy
                            class="text-xl text-white hidden group-hover:block cursor-pointer fa-regular fa-trash-can z-10"></i>
                        </div>

                        <input class="hidden" name="galery[]"
                          value="{{ $image->id }}|{{ $image->imagen }}|{{ $key }}">
                        <input class="hidden" type="file" id="galery_{{ $uuid }}" accept="image/*">
                        <img class="w-full h-full rounded-md object-cover"
                          src="{{ $image->imagen ? asset($image->imagen) : asset('images/imagen/noimagen.jpg') }}">
                      </div>
                    @endforeach
                  </div>
                  <label for="galery"
                    class="block w-[120px] h-[160px] rounded-md border hover:opacity-50 cursor-pointer"
                    title="Agregar imagen" tippy>
                    <input class="hidden" type="file" id="galery" accept="image/*" multiple>
                    <img class="w-full h-full rounded-md object-cover"
                      src="{{ asset('images/imagen/image-plus.jpg') }}" alt="">
                  </label>
                </div>
              </div>

      
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

<script>
  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

  function agregarElementos(elemento, valorInput, name) {
    elemento.setAttribute("type", "text");
    elemento.setAttribute("name", `${name}-${valorInput}`);
    elemento.setAttribute("placeholder", `${name == 'tittle'? 'Titulo': 'Especificacion'}`);
    elemento.setAttribute("id", `specifications`);

    elemento.classList.add("w-full","mt-1", "bg-gray-50", "border", "border-gray-300", "text-gray-900", "text-sm",
      "rounded-lg",
      "focus:ring-blue-500", "focus:border-blue-500", "block", "w-full", "pl-10", "p-2.5",
      "dark:bg-gray-700",
      "dark:border-gray-600", "dark:placeholder-gray-400", "dark:text-white",
      "dark:focus:ring-blue-500",
      "dark:focus:border-blue-500");

    return elemento
  }
  $('document').ready(function() {
    let valorInput = $('[id="specifications"]').length / 2

    $("#AddEspecifiacion").on('click', function(e) {
      e.preventDefault()
      valorInput++

      const addButton = document.getElementById("AddEspecifiacion");
      const divFlex = document.createElement("div");
      const dRelative = document.createElement("div");
      const dRelative2 = document.createElement("div");

      divFlex.classList.add('flex', 'gap-2')
      dRelative.classList.add('relative', 'mb-2', 'mt-2','w-full')
      dRelative2.classList.add('relative', 'mb-2', 'mt-2','w-full')

      const iconContainer = document.createElement("div");
      const icon = `<div class="absolute w-full inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
      </div>`
      iconContainer.innerHTML = icon;

      // Obtener el nodo del icono
      const iconNode = iconContainer.firstChild;



      const inputTittle = document.createElement("input");
      const inputValue = document.createElement("input");

      let inputT = agregarElementos(inputTittle, valorInput, 'tittle')
      let inputV = agregarElementos(inputValue, valorInput, 'specifications')


      dRelative.appendChild(inputT);
      dRelative2.appendChild(inputV);


      // Agregar el icono como primer hijo de dRelative
      dRelative.insertBefore(iconNode, inputT);

      // Clonar el nodo del icono para agregarlo como primer hijo de dRelative2
      const iconNodeCloned = iconNode.cloneNode(true);
      dRelative2.insertBefore(iconNodeCloned, inputV);


      divFlex.appendChild(dRelative);
      divFlex.appendChild(dRelative2);

      const parentContainer = addButton.parentElement
        .parentElement; // Obtener el contenedor padre
      parentContainer.insertBefore(divFlex, addButton.parentElement
        .nextSibling); // Insertar el input antes del siguiente elemento después del botón
    })

  })
</script>

<script>
  function toggleMenu() {
    console.log('cambiando toggle')
    var menuItems = document.getElementById('menu-items');
    var isExpanded = menuItems.classList.contains('hidden');
    menuItems.classList.toggle('hidden', !isExpanded);
    document.getElementById('menu-button').setAttribute('aria-expanded', !isExpanded);
  }

  const saveImage = async file => {
    const params = new FormData()
    params.append('image', file)
    params.append('_token', $('[name="_token"]').val())

    const data = await fetch('/admin/galery', {
        method: 'POST',
        headers: {
          'XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
        },
        body: params
      })
      .then(res => res.json())

    return data
  }

  $('[data-id="input_img"]').on('change', function() {
    const file = this.files[0]
    const url = URL.createObjectURL(file)

    $(`#${this.id}_previewer`).attr('src', url)
  })

  $(document).on('change', '[id^="galery_"]', function() {
    const input = $(this)
    const label = input.parent()
    const input2send = label.find('[name="galery[]"]')
    const image_container = label.find('img')
    const file = input.get(0).files[0] ?? null
    const url = URL.createObjectURL(file)

    const params = new FormData()
    params.append('image', file)
    params

    saveImage(file).then((x) => {
      const data = x.data
      input2send.val(`0|${data.name}`)
    })

    image_container.attr('src', url)
  })

  $('#galery').on('change', (e) => {
    const files = e.target.files;
    Array.from(files).forEach(async file => {
      const {
        data,
        message,
        status
      } = await saveImage(file)
      const uuid = crypto.randomUUID()
      const pos = $('#imagenes_sortable').length
      $('#imagenes_sortable').append(`<div id="galery_container_${uuid}" class="relative group block w-[120px] h-[160px] rounded-md border">
        <div class="absolute top-0 left-0 bottom-0 right-0 rounded-md hover:bg-[#00000075] transition-all flex flex-col items-center justify-center gap-1">
          <label for="galery_${uuid}" title="Cambiar Imagen" tippy
            class="text-xl text-white hidden group-hover:block cursor-pointer fa-solid fa-camera-rotate z-10"></label>
          <i id="btn_delete_galery" data-id="${uuid}" title="Eliminar Imagen" tippy
            class="text-xl text-white hidden group-hover:block cursor-pointer fa-regular fa-trash-can z-10"></i>
        </div>

        <input class="hidden" name="galery[]"
          value="${0}|${data.name}|${pos}">
        <input class="hidden" type="file" id="galery_${uuid}" accept="image/*">
        <img class="w-full h-full rounded-md object-cover"
          src="/${data.name}">
      </div>`)

      tippy('#product-form [tippy]', {
        arrow: true
      })
    })
    e.target.value = null
  })

  tippy('#product-form [tippy]', {
    arrow: true
  })

  $(document).on('click', '#btn_delete_galery', function() {
    $(this).parents('[id^="galery_container_"]').remove()
  })

</script>