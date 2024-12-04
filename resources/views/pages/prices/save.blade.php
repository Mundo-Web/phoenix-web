<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ route('prices.store') }}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $price->id }}">
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
            @if ($price->id != 0)
              Actualizar costo de envio
              <span class="text-slate-500">para</span>
              {{ $price->district->province->department->description ?? 'Sin departamento' }}
              -
              {{ $price->district->province->description ?? 'Sin provincia' }}
              -
              {{ $price->district->description ?? 'Sin distrito' }}
            @else
              Agregar costo de envio
            @endif
          </h2>
        </header>

        <div class="p-3">
          <div class="rounded shadow-lg p-4 px-4 ">

            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

              <div class="md:col-span-1">
                <label for="costo_x_art">Departamento <span class="text-red-500">*</span></label>
                <div class="relative mb-2  mt-2">
                  <select name="departamento_id" id="departamento_id" required
                    class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Departamento </option>
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}" @if ($price->district->province->department->id == $department->id) selected @endif>
                        {{ $department->description }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="md:col-span-1" id="cont_provincia">
                <label for="costo_x_art">Provincia <span class="text-red-500">*</span></label>
                <div class="relative mb-2  mt-2">
                  <select name="provincia_id" id="provincia_id" required
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Provincia </option>
                    @foreach ($provinces as $province)
                      <option value="{{ $province->id }}" @if ($price->district->province->id == $province->id) selected @endif>
                        {{ $province->description }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="md:col-span-1" id="cont_distrito">
                <label for="costo_x_art">Distrito <span class="text-red-500">*</span></label>
                <div class="relative mb-2  mt-2">
                  <select name="distrito_id" id="distrito_id" required
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Distrito </option>
                    @foreach ($districts as $district)
                      <option value="{{ $district->id }}" @if ($price->district->id == $district->id) selected @endif>
                        {{ $district->description }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              <div class="md:col-span-3">
                <label for="name">Costo de envío <span class="text-red-500">*</span></label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-coins text-lg"></i>
                  </div>
                  <input type="text" id="price" name="price" value="{{ $price->price }}" step="0.01"
                    required
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Precio de envio">
                </div>

                <input type="hidden" id="type" name="type" value="product"
                  class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>

              <div class="md:col-span-3 text-right mt-6 flex justify-between">
                <div class="inline-flex items-end">
                  <a href="{{ route('prices.index') }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
                </div>
                <div class="inline-flex items-end">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar Costo de
                    envio</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>

  <script>
    $(document).ready(function() {


      $("#departamento_id").change(function() {
        //ni bien cambie el departamento capturamos
        //el valor del ID del valor seleccionado 
        departamento_id = $('#departamento_id').val();

        //ejecutamos el ajax
        $.ajax({
          url: "{{ route('prices.getProvincias') }}",
          dataType: "json",
          method: 'POST',
          data: {
            _token: $('input[name="_token"]').val(),
            id: departamento_id
          }
        }).done(function(res) {
          $('#provincia_id').html('<option value="">Seleccionar Provincia</option>')
          $('#distrito_id').html('<option value="">Seleccionar Distrito</option>');

          $.each(res, function(key, value) {
            $('#provincia_id').append(
              '<option value="' + value['id'] + '">' + value['description'] + '</option>'
            )
          });
        });
      });


      $("#provincia_id").change(function() {
        //ni bien cambie el departamento capturamos
        //el valor del ID del valor seleccionado 
        provincia_id = $('#provincia_id').val();

        //ejecutamos el ajax
        $.ajax({
          url: "{{ route('prices.getDistrito') }}",
          dataType: "json",
          method: 'POST',
          data: {
            _token: $('input[name="_token"]').val(),
            id: provincia_id
          }
        }).done(function(res) {
          $('#distrito_id').empty();
          $('#distrito_id').append(
            '<option value="">Seleccionar Distrito</option>'
          )
          // $('#cont_distrito').toggleClass('opacity-15')
          $.each(res, function(key, value) {
            $('#distrito_id').append(
              '<option value="' + value['id'] + '">' + value['description'] + '</option>'
            )
          });
        });
      });

    })
  </script>

</x-app-layout>
