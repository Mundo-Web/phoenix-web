<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="{{ route('shortcode.update', $shortcode->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div
                class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Editar Shortcode
                    </h2>
                </header>
                @if (session('success'))
                    <script>
                        window.onload = function() {
                            mostrarAlerta();
                        }
                    </script>
                @endif

                <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

                <div class="p-3">

                    <div>

                        <div class="flex flex-row  w-full">


                            <div class=" rounded shadow-lg p-4 px-4 w-full ">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 w-full">

                                    <div class="w-full">
                                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 w-full">

                                            <div class="md:col-span-5">
                                                <label for="head">Header Shortcode</label>
                                                <div class="relative mb-2 ">
                                        
                                                    <textarea rows="6"  id="head" name="head"
                                                        class="editortext mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Inserte shortcode en el Head">{{ $shortcode->head }}</textarea>
                                                </div>
                                            </div>


                                            <div class="md:col-span-5">
                                                <label for="body">Body Shortcode</label>
                                                   
                                                    <textarea rows="6"  name="body" id="bodytext"
                                                        class="editortext mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Inserte shortcode en el Body">{{ $shortcode->body }}</textarea>
                                                    {{-- <x-textarea id="body" name="body" value="{!! $shortcode->body !!}" /> --}}
                                            </div>

                                            

                                            <div class="col-span-5 text-right mt-20">
                                                <div class="inline-flex items-end">
                                                    <button type="submit" id="form_general"
                                                        onclick="confirmarActualizacion()"
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Actualizar
                                                        datos</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        $('document').ready(function() {

            // Función para mostrar la alerta de confirmación antes de enviar el formulario
            function confirmarActualizacion() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción actualizará los datos.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, actualizar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Envía el formulario si se confirma la acción
                        document.getElementById('form_general').submit();
                    }
                });
            }


            function mostrarAlerta() {
                Swal.fire({
                    title: '¡Actualizado!',
                    text: 'Los datos se han actualizado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                });
            }


        });
    </script>



  <script type="text/javascript">
 
   
  </script>

</x-app-layout>
