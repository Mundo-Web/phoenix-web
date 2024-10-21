<x-app-layout>


  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ route('reglasDescuentos.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $reglasDescuento->id }}">
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
            @if ($reglasDescuento->id)
              Editar regla de descuento - {{ $reglasDescuento->titulo }}
            @else
              Nueva regla de descuento
            @endif
          </h2>
        </header>


        <div class="p-3">
          <div class="rounded shadow-lg p-4 px-4 ">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              <div class="md:col-span-5">
                <label for="titulo">Titulo</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-pen text-lg"></i>
                  </div>
                  <input type="text" id="titulo" name="titulo" value="{{ $reglasDescuento->titulo }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Titulo">
                </div>
              </div>
              <div class="md:col-span-5">
                <label for="descripcion">Descripcion</label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-pen text-lg"></i>
                  </div>
                  <input type="text" id="descripcion" name="descripcion" value="{{ $reglasDescuento->descripcion }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Descripcion">
                </div>
              </div>
              <div class="md:col-span-5">
                <label for="is_multiple">Tipo de seleccion</label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg fas fa-list-check"></i>
                  </div>
                  <select name="is_multiple" id="is_multiple"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="0" {{ $reglasDescuento->is_multiple == 0 ? 'selected' : '' }}>
                      Valor unico
                    </option>
                    <option value="1"
                      {{ $reglasDescuento->is_multiple == 1 ? 'selected' : '' }}>
                      Seleccion multiple
                    </option>
                  </select>
                </div>
              </div>
              <div class="md:col-span-5">
                <label for="imagen">Imagen principal</label>
                <div class="relative flex gap-4 mb-2 mt-2 items-center">
                  <img class="w-20 h-20 rounded" src="{{ asset($reglasDescuento->imagen ?? 'images/img/noimagen.jpg') }}"
                    alt="">
                  <input id="imagen" name="imagen" value="{{ $reglasDescuento->imagen }}"
                    class="p-2.5 block w-max text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
              </div>
              <div class="md:col-span-1">
                <label for="color">Color</label>
                <input type="text" id="color" name="color" value="{{ $reglasDescuento->color }}"
                  class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
              <div class="md:col-span-1 mt-8 ">
                <div id="colorPicker">
                </div>
              </div>

              <div class="md:col-span-5 text-right mt-6 flex justify-between">
                <div class="inline-flex items-end">
                  <a href="{{ route('reglasDescuentos.index') }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
                </div>
                <div class="inline-flex items-end">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Guardar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>

  
  <script>
    const pickr = Pickr.create({
      el: '#colorPicker', // Selector CSS del input
      theme: 'classic', // Tema de Pickr
      default: '#000000', // Color por defecto
      swatches: [ // Colores de muestra
        '#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#00FFFF', '#FF00FF'
      ],
      components: {
        preview: true, // Mostrar vista previa
        opacity: true, // Habilitar control de opacidad
        hue: true, // Habilitar control de matiz
        interaction: {
          input: true, // Permitir entrada manual
          hex: true,
          save: true // Permitir guardar
        }
      }
    });
    pickr.on('save', (color, instance) => {

      document.getElementById('color').value = color.toHEXA().toString();

    })

    
  </script>



</x-app-layout>
