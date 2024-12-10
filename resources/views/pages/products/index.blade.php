<x-app-layout>
  <link href="/js/dxdatagrid/css/dx.light.css?v=06d3ebc8-645c-4d80-a600-c9652743c425" rel="stylesheet" type="text/css"
    id="dg-default-stylesheet" />
  <script src="/js/dxdatagrid/js/dx.all.js"></script>
  <script src="/js/dxdatagrid/js/localization/dx.messages.es.js"></script>
  <script src="/js/moment/min/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

  {{-- <style>
    @media (prefers-color-scheme: dark) {
      .dark\:even\:bg-gray-900\/50:nth-child(even) {
        background-color: transparent !important;
        border-top: 1px solid rgb(55 65 81 / 0.25);
        border-bottom: 1px solid rgb(55 65 81 / 0.25);
      }
    }
  </style> --}}
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

    <section class="flex flex-wrap gap-2 py-4 border-b border-slate-100 dark:border-slate-700">
      <a href="{{ route('products.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm">
        <i class="fa fa-plus me-1"></i>
        Agregar producto
      </a>
      <button id="file-excel-button"
        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm">
        <i class="fas fa-cloud-upload-alt me-1"></i>
        Cargar productos
      </button>
    </section>

    <div
      class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">


      <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Productos </h2>
      </header>
      <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
          {{-- 
          <table id="tabladatos" class="display text-lg" style="width:100%">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Descuento</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Destacar</th>
                <th>Recomendar</th>
                <th>Visible</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($products as $item)
                <tr>
                  <td>{{ $item->producto }} @if ($item->color)
                      - {{ $item->color }}
                    @endif
                  </td>
                  <td>{{ $item->precio }}</td>
                  <td>{{ $item->descuento }}</td>
                  <td>{{ $item->stock }}</td>
                  <td class="px-3 py-2"><img class="bg-[#f2f2f2] w-20 h-20 object-cover object-center"
                      src="{{ asset($item->imagen) }}" alt=""></td>
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
                        id='{{ 'v_' . $item->id }}' data-field='destacar' data-idService='{{ $item->id }}'
                        data-titleService='{{ $item->producto }}' {{ $item->destacar == 1 ? 'checked' : '' }}>
                      <label for="{{ 'v_' . $item->id }}"></label>
                    </form>



                  </td>
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
                        id='{{ 'v_' . $item->id }}' data-field='recomendar' data-idService='{{ $item->id }}'
                        data-titleService='{{ $item->producto }}' {{ $item->recomendar == 1 ? 'checked' : '' }}>
                      <label for="{{ 'v_' . $item->id }}"></label>
                    </form>



                  </td>


                  <td>
                    <form method="POST" action="">
                      @csrf
                      <input type="checkbox" id="switch_visible"
                        class="check_v btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                              rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                              checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                              dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                              before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow 
                              before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                        id='{{ 'v_' . $item->id }}' data-field='visible' data-idService='{{ $item->id }}'
                        data-titleService='{{ $item->producto }}' {{ $item->visible == 1 ? 'checked' : '' }}>
                      <label for="{{ 'v_' . $item->id }}"></label>
                    </form>



                  </td>

                  <td>
                    <div class="flex justify-center items-center gap-2 text-center sm:text-right h-full w-full">
                      <a href="{{ route('products.edit', $item->id) }}"
                        class="bg-yellow-400 px-3 py-2 rounded text-white  "><i
                          class="fa-regular fa-pen-to-square"></i></a>

                      <form action="" method="POST">
                        @csrf
                        <a data-idService='{{ $item->id }}'
                          class="btn_delete bg-red-600 px-3 py-2 rounded text-white cursor-pointer"><i
                            class="fa-regular fa-trash-can"></i></a>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Descuento</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Destacar</th>
                <th>Recomendar</th>
                <th>Visible</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table> --}}

          <div id="gridContainer"></div>

        </div>
      </div>
    </div>

  </div>

  <form id="file-excel-modal" class="modal !py-6">
    <p class="mb-2">
      <b>Carga un zip (Imagenes sueltas)</b>
    </p>
    <input
      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
      aria-describedby="images_input_help" id="image_input" type="file" accept=".zip">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 mb-4" id="images_input_help">
      Los nombres deben ir en formato: <br>
      <code>
        <span class="mention">Código Interno</span>_<span class="mention">{Color}</span>*.jpg
      </code>
    </p>

    <p class="mb-2">
      <b>Carga un archivo excel</b>
      (<a href="/storage/templates/Items.xlsx" download="Items" class="text-blue-500 underline">Descargar formato</a>)
    </p>
    <input
      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
      aria-describedby="file_input_help" id="file_input" type="file" accept=".xlsx,.xls">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 mb-4" id="file_input_help">XLSX o XLS (Solo archivo Excel)
    </p>

    {{-- <div class="mb-2">
      <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruta de
        imagen</label>
      <div id="image_route_pattern_editor" class="rounded-lg"></div>
    </div> --}}

    <div id="progress-container" class="mt-4 hidden">
      <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
        <div id="progress-bar" class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
      </div>
      <p id="progress-text" class="mt-2 text-sm text-gray-600 dark:text-gray-400">0%</p>
    </div>

    <button
      class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
      type="submit">
      Cargar
    </button>
  </form>

</x-app-layout>

<script>
  // var quill = new Quill('#image_route_pattern_editor', {
  //   theme: 'snow', // Tema de Quill
  //   modules: {
  //     toolbar: false,
  //     mention: {
  //       // Personalizar el activador a '{'
  //       mentionDenotationChars: ["{"],
  //       source: function(searchTerm, renderList, mentionChar) {
  //         const variables = [{
  //             id: 'sku',
  //             value: 'Código (SKU)'
  //           },
  //           {
  //             id: 'codigo',
  //             value: 'Código Interno'
  //           },
  //           {
  //             id: 'producto',
  //             value: 'Producto'
  //           },
  //           {
  //             id: 'category',
  //             value: 'Categoría'
  //           },
  //           {
  //             id: 'subcategory',
  //             value: 'Subcategoría'
  //           },
  //           {
  //             id: 'brand',
  //             value: 'Marca'
  //           },
  //           {
  //             id: 'color',
  //             value: 'Color'
  //           },
  //         ];

  //         const matches = variables.filter(variable => variable.value.toLowerCase().includes(searchTerm
  //           .toLowerCase()));
  //         renderList(matches, searchTerm);
  //       },
  //       onSelect: function(item, insertItem, ...props) {
  //         item.denotationChar = ''
  //         insertItem(item)
  //       }
  //     }
  //   },
  //   placeholder: 'Escribe {variable} aquí...',
  //   bounds: '#editor-container',
  //   // formats: []
  // });

  $(document).on('click', '#file-excel-button', () => {
    $('#file-excel-modal').modal('show');
  });

  $(document).on('submit', '#file-excel-modal', (e) => {
    e.preventDefault();

    const fileInput = $('#file_input')[0];
    const file = fileInput.files[0];

    const zipInput = $('#image_input')[0];
    const zip = zipInput.files[0];

    if (!file) {
      Swal.fire({
        icon: 'warning',
        title: 'Archivo requerido',
        text: 'Por favor, selecciona un archivo Excel.'
      });
      return;
    }

    const formData = new FormData();
    formData.append('file', file);
    if (zip) formData.append('zip', zip)

    // const element = $('<div>' + structuredClone(quill.root.innerHTML) + '</div>');
    // element.find('.mention').each(function(e) {
    //   this.textContent = '{' + this.getAttribute('data-id') + '}'
    // })

    // formData.append('image_route_pattern', element.text().trim());
    formData.append('image_route_pattern', '{1}_{10}');

    $.ajax({
      url: "/api/upload/items",
      type: 'POST',
      headers: {
        'X-Xsrf-Token': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
      },
      data: formData,
      processData: false,
      contentType: false,
      timeout: 240000,
      xhr: function() {
        const xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
          if (evt.lengthComputable) {
            const percentComplete = evt.loaded / evt.total * 100;
            $('#progress-container').removeClass('hidden');
            $('#progress-bar').css('width', percentComplete + '%');
            $('#progress-text').text(Math.round(percentComplete) + '%');
          }
        }, false);
        return xhr;
      },
      success: function(response) {
        Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: 'Archivo cargado exitosamente.'
        });
        $('#file-excel-modal').modal('hide');
        // Aquí puedes agregar código adicional para manejar la respuesta del servidor
      },
      error: function(xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Error al cargar el archivo: ' + error
        });
      },
      complete: function() {
        $('#progress-container').addClass('hidden');
        $('#progress-bar').css('width', '0%');
        $('#progress-text').text('0%');
        $('#file_input').val('');
        $('#image_input').val('');
      }
    });
  });

  const salesDataGrid = $('#gridContainer').dxDataGrid({
    language: "es",
    dataSource: {
      load: async (params) => {
        const res = await fetch("/api/products/paginate", {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'XSRF-TOKEN': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
          },
          body: JSON.stringify({
            _token: $('[name="_token"]').val(),
            is_admin: true,
            ...params
          })
        })
        const data = await res.json()
        return data
      },
    },
    onToolbarPreparing: (e) => {
      const items = e.toolbarOptions.items;
      items.unshift({
        widget: 'dxButton',
        location: 'after',
        options: {
          icon: 'revert',
          hint: 'REFRESCAR TABLA',
          onClick: () => {
            salesDataGrid.refresh()
          }
        }
      });
    },
    remoteOperations: true,
    columnResizingMode: "widget",
    allowColumnResizing: true,
    allowColumnReordering: true,
    columnAutoWidth: true,
    scrollbars: 'auto',
    // filterPanel: {
    //   visible: true
    // },
    searchPanel: {
      visible: true
    },
    // headerFilter: {
    //   visible: true,
    //   search: {
    //     enabled: true
    //   }
    // },
    // height: 'calc(100vh - 185px)',
    rowAlternationEnabled: true,
    showBorders: true,
    paging: {
      pageSize: 10,
    },
    pager: {
      visible: true,
      allowedPageSizes: [5, 10, 25, 50, 100],
      showPageSizeSelector: true,
      showInfo: true,
      showNavigationButtons: true,
    },
    allowFiltering: true,
    scrolling: {
      mode: 'standard',
      useNative: true,
      preloadEnabled: true,
      rowRenderingMode: 'standard'
    },
    columns: [{
        dataField: 'producto',
        caption: 'PRODUCTO',
        width: '40%',
        cellTemplate: (container, {
          data
        }) => {
          container.html(
            `<b class="block text-[12px]">${data.producto}</b><span class="block text-[10px]">${data.color} - ${data.peso}</span><small class="text-[10px] text-[#c1272d]">${data.discount?.name ?? ''}</small>`
            )
        }
      },
      {
        dataField: 'precio',
        caption: 'PRECIO'
      },
      {
        dataField: 'descuento',
        caption: 'DESCUENTO'
      },
      {
        dataField: 'stock',
        caption: 'STOCK'
      },
      {
        caption: 'IMAGEN',
        cellTemplate: (container, {
          data
        }) => {
          container.addClass('!px-3 !py-2 !text-center')
          container.css('vertical-align', 'middle')
          container.html(
            `<img class="bg-[#f2f2f2] w-16 h-10 object-cover object-center rounded-sm" src="/${data.imagen}" alt=""></td>`
          )
        }
      },
      {
        dataField: 'destacar',
        caption: 'DESTACAR',
        cellTemplate: (container, {
          data
        }) => {
          container.html(`<form method="POST" action="">
            @csrf
            <input type="checkbox" id="hs-basic-usage"
              class="check_v btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                    rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                    checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                    dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                    before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow 
                    before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
              id='d_${data.id}' data-field='destacar' data-idService='${data.id}'
              data-titleService='${data.producto}' ${data.destacar ? 'checked': ''}>
            <label for="d_${data.id}"></label>
          </form>`)
        }
      },
      /* {
        dataField: 'recomendar',
        caption: 'RECOMENDAR',
        cellTemplate: (container, {
          data
        }) => {
          container.html(`<form method="POST" action="">
            @csrf
            <input type="checkbox" id="hs-basic-usage"
              class="check_v btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                    rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                    checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                    dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                    before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow 
                    before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
              id='r_${data.id}' data-field='recomendar' data-idService='${data.id}'
              data-titleService='${data.producto}' ${data.recomendar ? 'checked': ''}>
            <label for="r_${data.id}"></label>
          </form>`)
        }
      }, */
      {
        dataField: 'visible',
        caption: 'VISIBLE',
        cellTemplate: (container, {
          data
        }) => {
          container.html(`<form method="POST" action="">
            @csrf
            <input type="checkbox" id="switch_visible"
              class="check_v btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                    rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                    checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                    dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                    before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow 
                    before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
              id='v_${data.id}' data-field='visible' data-idService='${data.id}'
              data-titleService='${data.producto}' ${data.visible ? 'checked' : ''}>
            <label for="v_${data.id}"></label>
          </form>`)
        }
      },
      {
        dataField: 'updated_at',
        caption: 'ÚLTIMA ACTUALIZACIÓN',
        dataType: 'datetime',
        format: 'yyyy-MM-dd HH:mm:ss'
      },
      {
        caption: 'ACCIONES',
        cellTemplate: (container, {
          data
        }) => {
          container.addClass('!px-3 !py-2 !text-center')
          container.css('vertical-align', 'middle')
          container.html(`<a href="/admin/products/${data.id}/edit"
            class="inline-block bg-yellow-400 px-3 py-2 rounded text-white  ">
            <i class="fa-regular fa-pen-to-square"></i>
          </a>
          <form action="" method="POST" class="inline-block">
            @csrf
            <a data-idService='${data.id}'
              class="btn_delete bg-red-600 px-3 py-2 rounded text-white cursor-pointer">
              <i class="fa-regular fa-trash-can"></i>
            </a>
          </form>`)
        }
      }
    ],
    onContentReady: (...props) => {
      tippy('.tippy-here', {
        arrow: true,
        animation: 'scale'
      })
    }
  }).dxDataGrid('instance')
</script>

<script>
  $('document').ready(function() {

    new DataTable('#tabladatos', {
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

    $(document).on("change", ".btn_swithc", function() {



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
        url: "{{ route('products.updateVisible') }}",
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
          title: titleService + " a sido modificado",
          showConfirmButton: false,
          timer: 1500

        });

      })
    });

    $(document).on("click", ".btn_delete", function(e) {
      e.preventDefault()

      let id = $(this).attr('data-idService');

      Swal.fire({
        title: "Seguro que deseas eliminar?",
        text: "Vas a eliminar un Logo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, borrar!",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {

          $.ajax({

            url: `{{ route('products.borrar') }}`,
            method: 'POST',
            data: {
              _token: $('input[name="_token"]').val(),
              id: id,

            }

          }).done(function(res) {

            Swal.fire({
              title: res.message,
              icon: "success"
            });

            location.reload();

          })


        }
      });

    });

  })
</script>
