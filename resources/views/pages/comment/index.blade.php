<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div
            class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
            <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Comentarios</h2>
            </header>
            <div class="p-3">

                <!-- Table -->
                <div class="overflow-x-auto">

                    <table id="tabladatos" class="display text-lg dark:even:!bg-gray-100/50" style="width:100%">
                        <thead>
                            <tr>
                                <th class="w-60">Nombre</th>
                                <th>Categoria</th>
                                <th class="w-20">Calificación</th>
                                <th class="w-32">Registrado</th>
                                <th class="w-20">Aprobar</th>
                                <th class="w-32">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($mensajes as $item)
                                <tr>
                                    <td class="dark:bg-slate-800">
                                        <a href="{{ route('comentarios.show', $item->id) }}"><span class="mr-4"><i
                                                    class="fa-regular fa-envelope"></i></span><span
                                                class="dark:text-white">{{ $item->name }}</span></a>
                                    </td>
                                    <td class="dark:bg-slate-800 dark:text-white">
                                        {{ $item->category->name ?? 'Sin nombre' }}</td>
                                    <td class="dark:bg-slate-800 dark:text-white">{{ $item->rating }}/5</td>
                                    <td class="dark:bg-slate-800 dark:text-white">
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                    <td>
                                        <form method="POST" action="">
                                            @csrf
                                            <input type="checkbox" id="hs-basic-usage"
                                                class="check_v btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                                                  rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                                                  checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                                                  dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                                                  before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow 
                                                  before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                id='{{ 'v_' . $item->id }}' data-field='visible'
                                                data-idService='{{ $item->id }}'
                                                data-titleService='{{ $item->name }}'
                                                {{ $item->visible == 1 ? 'checked' : '' }}>
                                            <label for="{{ 'v_' . $item->id }}"></label>
                                        </form>
                                    </td>
                                    <td class="flex flex-row items-center justify-center dark:bg-slate-800">
                                        <button method="POST" onclick="borrarmensaje({{ $item->id }})"
                                            class="bg-red-600 p-2 rounded text-white"><i
                                                class="fa-regular fa-trash-can"></i></button>
                                        <!--a href="" class="bg-yellow-400 p-2 rounded text-white mr-6"><i class="fa-regular fa-pen-to-square"></i></a-->
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Calificación</th>
                                <th>Registrado</th>
                                <th>Aprobar</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <script>
        $('document').ready(function() {
            new DataTable('#tabladatos', {
                ordering: false,
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                layout: {
                    topStart: 'buttons'
                },
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",

                    "sProcessing": "Procesando...",
                },
                buttons: [

                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success',
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-csv"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                    },
                    {
                        extend: 'copy',
                        text: '<i class="fas fa-copy"></i> ',
                        titleAttr: 'Copiar',
                        className: 'btn btn-success',
                    },
                ]
            });

        })


        $(".btn_swithc").on("change", function() {

            let status = 0;
            let id = $(this).attr('data-idService');
            let titleService = $(this).attr('data-titleService');
            let field = $(this).attr('data-field');

            if ($(this).is(':checked')) {
                status = 1;
            } else {
                status = 0;
            }

            console.log(titleService)

            $.ajax({
                url: "{{ route('comentarios.updateVisible') }}",
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    status: status,
                    id: id,
                    field: field,
                    titleService
                }
            }).done(function(res) {

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: titleService + " a sido aprobado",
                    showConfirmButton: false,
                    timer: 1500

                });

            })
        });

        function borrarmensaje(id) {

            $.ajax({
                url: '{{ route('comentarios.borrar') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id
                },
                success: function(success) {
                    Swal.fire({
                        title: "Exito",
                        text: 'Solicitud enviada con exito ',
                        icon: "success"
                    });

                    window.location.href = '/admin/mensajes';
                },
                error: function(error) {
                    console.log(error)
                    Swal.fire({
                        title: "Ops !",
                        text: 'El mensaje no ha podido ser enviado, en breves momentos volvera a estar disponible',
                        icon: "warning"
                    });
                }

            })
        }
    </script>

</x-app-layout>
