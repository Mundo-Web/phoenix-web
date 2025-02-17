@php
    $pagina = Route::currentRouteName();
    $isIndex = $pagina == 'index';
@endphp


<style>
    .limited-text {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

     .underline-this {
        position: relative;
        overflow: hidden;
        /*display: inline-block;*/
        text-decoration: none;
        padding-bottom: 4px;
    }

     .underline-this::before,
     .underline-this::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #FB4535;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

     .underline-this::after {
        transform-origin: right;
    }

     a:hover .underline-this::before,
     a:hover .underline-this::after {
        transform: scaleX(1);
    }

     a:hover .underline-this::before {
        transform-origin: left;
    }

    nav li {
        padding: 0 !important;
        margin: 0 !important;
    }

    .jquery-modal.blocker.current {
        z-index: 30;
    }

    .active::before,
     .active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #FB4535;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .active {
        position: relative;
        overflow: hidden;
        /*display: inline-block;*/
        text-decoration: none;
        padding-bottom: 4px;
    }

    .active::before,
     .active::after {
        transform: scaleX(1);
    }
</style>


<header class="sticky top-0 z-[25]">
    <div  class="left-0 right-0">

        <div id="header-menu" class="flex justify-between w-full px-[5%]
        @if ($isIndex ? 1 : 0)
        @else
        bg-[#010101]
        @endif">
            <nav class="flex h-[100px] items-center justify-between gap-10 w-full">
                <input type="checkbox" id="menu" class="peer/menu menu hidden" />
                <label for="menu"
                    class="transition-all flex flex-col gap-1 z-40 lg:hidden hamburguesa justify-center items-center order-3 lg:order-3">
                    <p class="w-7 h-1 bg-white transition-transform duration-500"></p>
                    <p class="w-7 h-1 bg-white transition-transform duration-500"></p>
                    <p class="w-7 h-1 bg-white transition-transform duration-500"></p>
                </label>

                <div class="flex justify-center items-center z-40">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('images/imagen/p_phoenixlogo.png') }}" alt="Cremoso" class="w-full">
                    </a>
                </div>


                <ul
                    class="font-roboto_medium text-lg pt-40 fixed inset-0 bg-[#010101] px-[5%] flex flex-col lg:flex-row lg:items-center clip-circle-0 peer-checked/menu:clip-circle-full transition-[clip-path] duration-500 lg:clip-circle-full lg:relative lg:flex lg:justify-items-center lg:p-0 lg:bg-transparent flex-1">

                    <div
                        class="flex flex-col lg:flex-row order-2 lg:order-1 lg:w-[80%] lg:justify-end gap-5 lg:gap-10">

                        <li class="flex flex-col">
                            <a href="{{ route('nosotros') }}"
                                class="{{ isset($pagina) && $pagina == 'nosotros' ? 'text-[#FB4535]' : 'text-white' }}">Nosotros</a>
                        </li>

                        @if (count($categoriasf) > 0)
                            <li class="flex flex-col">
                                <a href="{{route('catalogo', $categoriasf[0]->id )}}"
                                    class="{{ isset($pagina) && $pagina == 'catalogo.all' ? 'text-[#FB4535]' : 'text-white' }}">Servicios y Planes</a>
                            </li>
                        @endif

                        {{-- @if (count($services) > 0)
                            <li class="flex flex-col">
                                <a href="{{ route('servicios', $services->first()->id) }}"
                                    class="{{ isset($pagina) && $pagina == 'servicios' ? 'text-[#FB4535]' : 'text-white' }}">Servicios</a>
                            </li>
                        @endif --}}
                        

                        {{-- <li class="flex flex-col">
                            <a href="{{ route('rse') }}"
                                class="{{ isset($pagina) && $pagina == 'rse' ? 'text-[#FB4535]' : 'text-white' }}">Recetas</a>
                        </li> --}}

                        {{-- @if (count($blog) > 0)
                            <li class="flex flex-col">
                                <a href="{{ route('blog', 0) }}"
                                    class="{{ isset($pagina) && $pagina == 'blog' ? 'text-[#FB4535]' : 'text-white' }}">Blog</a>
                            </li>
                        @endif --}}
                        <li class="flex flex-col">
                            <a href="{{ route('contacto') }}"
                                class="{{ isset($pagina) && $pagina == 'contacto' ? 'text-[#FB4535]' : 'text-white' }}">Contacto</a>
                        </li>
                    </div>

                    <div
                        class="relative flex flex-row justify-end gap-2 w-full order-1 lg:order-2  lg:w-[20%] pb-8 lg:py-0 border-b lg:border-0 border-[#082252]">

                        <div class="flex flex-row items-center justify-center">
                            <a href="{{route('contacto')}}">
                                <div class="text-white font-roboto_medium flex flex-row gap-2 bg-[#FB4535] rounded-3xl text-center w-auto py-2 px-6">
                                    Let´s Go!
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M7 7H17M17 7V17M17 7L7 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </a>
                        </div>

                        {{-- <div class="flex flex-row justify-center items-center">
                            @if (Auth::user() == null)
                                <a class="md:flex" href="{{ route('login') }}">
                                    <i class="fa-solid fa-user-large fa-lg text-[#052f4e] !leading-none"></i>
                                </a>
                            @else
                                <div class="relative md:inline-flex font-Urbanist_Bold" x-data="{ open: false }">
                                    <button class="px-3 py-0 inline-flex justify-center items-center group"
                                        aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                        <div class="flex items-center">
                                            <span id="username"
                                                class="truncate ml-2 text-sm font-medium dark:text-slate-300 group-hover:opacity-75 dark:group-hover:text-slate-200 text-white ">
                                                {{ explode(' ', Auth::user()->name)[0] }}</span>
                                            <i class="fa-solid fa-user-large fa-lg text-[#052f4e] !leading-none"></i>
                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="bg-white origin-top-right z-10 absolute top-full min-w-44 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                        @click.outside="open = false" @keydown.escape.window="open = false" x-show="open">
                                        <ul>
                                            <li class="hover:bg-gray-100">
                                                <a class="font-medium text-sm text-black flex items-center py-1 px-3"
                                                    href="{{ route('micuenta') }}" @click="open = false"
                                                    @focus="open = true" @focusout="open = false">Mi Cuenta</a>
                                            </li>

                                            <li class="hover:bg-gray-100">
                                                <form class="mb-0" method="POST" action="{{ route('logout') }}" x-data>
                                                    @csrf
                                                    <button type="submit"
                                                        class="font-medium text-sm text-black flex items-center py-1 px-3"
                                                        @click.prevent="$root.submit(); open = false">
                                                        {{ __('Cerrar sesión') }}
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div> --}}

                        {{-- <div class="flex justify-center items-center min-w-[38px]">
                            <div id="open-cart" class="relative inline-block cursor-pointer pr-3">
                                <span id="itemsCount"
                                    class="bg-[#052f4e] text-xs font-medium font-Urbanist_Regular text-white text-center px-[8px] py-[2px]  rounded-full absolute bottom-0 right-0 ml-3">0</span>
                                <a><i class="fa-solid fa-cart-shopping text-[#052f4e] w-7"></i></a>
                            </div>
                        </div> --}}

                    </div>

                </ul>
            </nav>
        </div>

    </div>
</header>


<div id="cart-modal"
    class="bag !absolute top-0 right-0 md:w-[450px] cartContainer border shadow-2xl  !rounded-l-2xl !p-0 !z-30"
    style="display: none">
    <div class="p-4 flex flex-col h-[calc(100vh-2px)] justify-between gap-2">
        <div class="flex flex-col">
            <div class="flex justify-between ">
                <h2 class="font-semibold font-galano_bold text-[28px] text-[#052F4E] tracking-tight pb-5">Carrito de
                    compras</h2>
                <div id="close-cart" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke="#272727" stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            <div class="overflow-y-scroll h-[calc(90vh-130px)] scroll__carrito">
                <table class="w-full">
                    <tbody id="itemsCarrito">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col gap-2 pt-2">
            <div class="text-[#052F4E]  text-xl flex justify-between items-center ">
                <p class="font-galano_bold font-semibold">Total</p>
                <p class="font-galano_bold font-semibold" id="itemsTotal">S/ 0.00</p>
            </div>
            <div>
                <a href="/carrito"
                    class="font-normal font-galano_semibold rounded-xl text-lg bg-[#052F4E]  py-3 px-5 text-white cursor-pointer w-full inline-block text-center">Ir
                    al
                    carrito</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if ({{ $isIndex ? 1 : 0 }}) {
            function actualizarHeader() {
                var scroll = $(window).scrollTop();
                const headerMenu = $('#header-menu');

                if (scroll > 0) {  
                    headerMenu
                        .removeClass('bg-transparent')  
                        .addClass('bg-[#010101] shadow-lg');  
                } else {
                    headerMenu
                        .removeClass('bg-[#010101] shadow-lg')  
                        .addClass('bg-transparent');  
                }
            }

            // Ejecutar al cargar la página
            actualizarHeader();

            // Ejecutar cuando haya scroll
            $(window).scroll(function() {
                actualizarHeader();
            });
        }

        mostrarTotalItems();
    });
</script>
<script>
    @auth
    $(document).ready(function() {
        let name = "{{ Auth::user()->name }}" ?? ''
        let lastname = "{{ Auth::user()->lastname }}" ?? ''
        lastname = lastname.toLowerCase()
        let [firstName, SecondName] = name.split(' ')
        let [firstLName, SecondLName] = lastname.split(' ')


        firstLName = firstLName ? firstLName.charAt(0).toUpperCase() + firstLName.slice(1) : ''
        SecondLName = SecondLName ? SecondLName.charAt(0).toUpperCase() + SecondLName.slice(1) : ''

        $('#usernamelogin').text(
            `${firstName ? firstName : ''} ${SecondName ? SecondName : ''} ${firstLName ? firstLName : ''} ${SecondLName ? SecondLName : ''}`
        )

    })
    @endauth
</script>

<script>
    let clockSearch;

    function openSearch() {
        document.getElementById("myOverlay").style.display = "block";

    }

    function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
    }

    function imagenError(image) {
        image.onerror = null; // Previene la posibilidad de un bucle infinito si la imagen de error también falla
        image.src = '/images/imagen/noimagen.jpg'; // Establece la imagen de error
    }

    $('#buscarproducto').keyup(function() {

        clearTimeout(clockSearch);
        var query = $(this).val().trim();

        if (query !== '') {
            clockSearch = setTimeout(() => {
                $.ajax({
                    url: '{{ route('buscar') }}',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var resultsHtml = '';
                        var url = '{{ asset('') }}';
                        data.forEach(function(result) {
                            const price = Number(result.precio) || 0
                            const discount = Number(result.descuento) || 0
                            resultsHtml += `<a href="/producto/${result.id}">
                            <div class="w-full flex flex-row py-3 px-3 hover:bg-slate-200">
                                <div class="w-[15%]">
                                <img class="w-20 rounded-0 object-center" src="${url}${result.imagen}" onerror="imagenError(this)" />
                                </div>
                                <div class="flex flex-col justify-center w-[60%] px-2 line-clamp-2">
                                <h2 class="text-left text-[12px] font-Urbanist_Regular line-clamp-2">${result.producto}</h2>
                                </div>
                                <div class="flex flex-col justify-center w-[15%] font-Urbanist_Regular">
                                <p class="text-right w-max text-[14px] ">S/ ${discount > 0 ? discount.toFixed(2) : price.toFixed(2)}</p>
                                ${discount > 0 ? `<p class="text-[12px] text-right line-through text-slate-500 w-max">S/ ${price.toFixed(2)}</p>` : ''}
                                </div>
                            </div>
                            </a>`;
                        });

                        $('#resultados').html(resultsHtml);
                    }
                });

            }, 300);

        } else {
            $('#resultados').empty();
        }
    });


    $('#buscarproductosecond').keyup(function() {

        clearTimeout(clockSearch);
        var query = $(this).val().trim();

        if (query !== '') {
            clockSearch = setTimeout(() => {
                $.ajax({
                    url: '{{ route('buscar') }}',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var resultsHtml = '';
                        var url = '{{ asset('') }}';
                        data.forEach(function(result) {
                            const price = Number(result.precio) || 0
                            const discount = Number(result.descuento) || 0
                            resultsHtml += `<a class="" href="/producto/${result.id}">
                                <div class="w-full flex flex-row py-3 px-3 hover:bg-slate-200">
                                    <div class="w-[15%]">
                                    <img class="w-20 rounded-md" src="${url}${result.imagen}" onerror="imagenError(this)" />
                                    </div>
                                    <div class="flex flex-col justify-center w-[60%] px-2 line-clamp-2">
                                    <h2 class="text-left text-[12px] font-Urbanist_Regular line-clamp-2">${result.producto}</h2>
                                    </div>
                                    <div class="flex flex-col justify-center w-[15%] font-Urbanist_Regular">
                                    <p class="text-right w-max text-[14px] ">S/ ${discount > 0 ? discount.toFixed(2) : price.toFixed(2)}</p>
                                    ${discount > 0 ? `<p class="text-[12px] text-right line-through text-slate-500 w-max">S/ ${price.toFixed(2)}</p>` : ''}
                                    </div>
                                </div>
                                </a>`;
                        });

                        $('#resultadossecond').html(resultsHtml);
                    }
                });

            }, 300);

        } else {
            $('#resultadossecond').empty();
        }
    });
</script>

<script>
    $('#open-cart').on('click', () => {
        $('#cart-modal').modal({
            showClose: false,
            fadeDuration: 100
        })
    })
    $('#close-cart').on('click', () => {
        $('.jquery-modal.blocker.current').trigger('click')
    })
</script>

<script>
    // $(document).ready(function() {
    //     if ({{ $isIndex ? 1 : 0 }}) {
    //         $(window).scroll(function() {
    //             var scroll = $(window).scrollTop();
    //             var categoriasOffset = $('#categorias').offset().top;

    //             const headerMenu = $('#header-menu')
    //             const logo = $('#logo-decotab')
    //             const items = $('#menu-items')
    //             const username = $('#username')
    //             const burguer = $('#menu-burguer')
    //             if (scroll >= categoriasOffset) {
    //                 headerMenu
    //                     .removeClass('absolute bg-transparent text-white')
    //                     .addClass('fixed top-0 bg-white shadow-lg');
    //                 items
    //                     .removeClass('text-white')
    //                     .addClass('text-[#272727]')
    //                 username
    //                     .removeClass('text-white')
    //                     .addClass('text-[#272727]')
    //                 // burguer
    //                 //   .removeClass('absolute')
    //                 //   .addClass('fixed')
    //                 logo.attr('src', 'images/svg/logo_decotab_header.svg')
    //                 $('#header-menu svg').attr('stroke', '#272727');
    //             } else {
    //                 headerMenu
    //                     .removeClass('fixed bg-white shadow-lg')
    //                     .addClass('absolute bg-transparent text-white');
    //                 items
    //                     .removeClass('text-[#272727]')
    //                     .addClass('text-white')
    //                 username
    //                     .removeClass('text-[#272727]')
    //                     .addClass('text-white')
    //                 // burguer
    //                 //   .removeClass('fixed')
    //                 //   .addClass('absolute')
    //                 logo.attr('src', '')
    //                 $('#header-menu svg').attr('stroke', 'white');
    //             }
    //         });
    //     }
    //     mostrarTotalItems()
    // })
</script>

<script src="{{ asset('js/storage.extend.js') }}"></script>

<script>
    var articulosCarrito = []
    articulosCarrito = Local.get('carrito') || [];

    function addOnCarBtn(id, isCombo) {
        let prodRepetido = articulosCarrito.map(item => {
            if (item.id === id && item.isCombo == isCombo) {

                item.cantidad += 1;
            }
            return item;
        });

        Local.set('carrito', articulosCarrito);
        limpiarHTML();
        PintarCarrito();
    }

    function deleteOnCarBtn(id, isCombo) {
        let prodRepetido = articulosCarrito.map(item => {
            if (item.id === id && item.isCombo == isCombo && item.cantidad > 0) {

                item.cantidad -= 1;
            }
            return item;
        });

        Local.set('carrito', articulosCarrito);
        limpiarHTML();
        PintarCarrito();
    }

    function deleteItem(id, isCombo) {

        let idCount = {};
        let duplicates = [];
        articulosCarrito.forEach(item => {
            if (idCount[item.id]) {
                idCount[item.id]++;
            } else {
                idCount[item.id] = 1;
            }
        });

        for (let id in idCount) {
            if (idCount[id] > 1) {
                duplicates.push(id);
            }
        }

        if (duplicates.length > 0) {
            let index = articulosCarrito.findIndex(item => item.id === id && item.isCombo == isCombo);
            if (index > -1) {
                articulosCarrito.splice(index, 1);
            }
        } else {
            articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

        }

        // return

        Local.set('carrito', articulosCarrito)
        limpiarHTML()
        PintarCarrito()
    }

    function limpiarHTML() {
        //forma lenta 
        /* contenedorCarrito.innerHTML=''; */
        $('#itemsCarrito').html('')
        $('#itemsCarritoCheck').html('')
    }

    var appUrl = "{{ env('APP_URL') }}";

    $(document).ready(function() {

        PintarCarrito()

        $('#buscarblog').keyup(function() {

            var query = $(this).val().trim();

            if (query !== '') {
                $.ajax({
                    url: '{{ route('buscarblog') }}',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var resultsHtml = '';
                        var url = '{{ asset('') }}';
                        data.forEach(function(result) {
                            resultsHtml +=
                                '<a class="z-50" href="/post/' + result.id +
                                '"> <div class=" z-50 w-full flex flex-row py-2 px-3 hover:bg-slate-200"> ' +
                                ' <div class="w-[30%]"><img class="w-full rounded-md" src="' +
                                url + result.url_image + result.name_image +
                                '" /></div>' +
                                ' <div class="flex flex-col justify-center w-[80%] pl-3"> ' +
                                ' <h2 class="text-left line-clamp-1">' + result
                                .title +
                                '</h2> ' +
                                '</div> ' +
                                '</div></a>';
                        });

                        $('#resultadosblog').html(resultsHtml);
                    }
                });
            } else {
                $('#resultadosblog').empty();
            }
        });

        // document.addEventListener('click', function(event) {
        //     var input = document.getElementById('buscarproducto');
        //     var resultados = document.getElementById('resultados');
        //     if (input && resultados) {
        //         var isClickInsideInput = input.contains(event.target);
        //         var isClickInsideResultados = resultados.contains(event.target);

        //         if (!isClickInsideInput && !isClickInsideResultados) {
        //             input.value = '';
        //             $('#resultados').empty();
        //         }
        //     }
        // });

        // document.addEventListener('click', function(event) {
        //     var input = document.getElementById('buscarproductosecond');
        //     var resultados = document.getElementById('resultadossecond');
        //     if (input && resultados) {
        //         var isClickInsideInput = input.contains(event.target);
        //         var isClickInsideResultados = resultados.contains(event.target);

        //         if (!isClickInsideInput && !isClickInsideResultados) {
        //             input.value = '';
        //             $('#resultadossecond').empty();
        //         }
        //     }
        // });
    });
</script>

<script>
    document.addEventListener('click', function(event) {
        var input = document.getElementById('buscarblog');
        var resultados = document.getElementById('resultadosblog');

        // Check if both elements exist
        if (input && resultados) {
            var isClickInsideInput = input.contains(event.target);
            var isClickInsideResultados = resultados.contains(event.target);

            if (!isClickInsideInput && !isClickInsideResultados) {
                input.value = '';
                $('#resultadosblog').empty();
            }
        }
    });
</script>

{{-- <script>
    $(document).ready(function() {
        $(document).on('mouseenter', '.other-class', function() {
            cerrar()
        });
    })

    const categorias = @json($categorias);
    var activeHover = false
    
    document.getElementById('productos-link').addEventListener('mouseenter', function(event) {
        if (event.target === this) {
            // mostrar submenú de productos 
            let padre = document.getElementById('productos-link-h');
            let divcontainer = document.createElement('div');
            divcontainer.id = 'productos-link-container';
            divcontainer.className =
                'absolute top-[219px] border-b-2 border-b-black z-[10] left-1/2 transform -translate-x-1/2 m-0 flex flex-row bg-white gap-4 p-4 w-full overflow-x-auto';

            divcontainer.addEventListener('mouseenter', function() {
                this.addEventListener('mouseleave', cerrar);
            });

            categorias.forEach(element => {
                if (element.subcategories.length == 0) return;
                let ul = document.createElement('ul');
                ul.className =
                    'text-[#006BF6]  font-bold font-poppins text-md py-2 px-3 max-w-lg mx-auto  duration-300 w-full whitespace-nowrap gap-4';

                ul.innerHTML = element.name;
                
                element.subcategories.forEach(subcategoria => {
                    let li = document.createElement('li');
                    li.style.setProperty('padding-left', '4px', 'important');
                    li.style.setProperty('padding-right', '2px', 'important');

                    li.className =
                        'text-[#272727] px-2 rounded-sm cursor-pointer font-normal font-poppins text-[13px] py-2 px-3 hover:bg-blue-200 hover:opacity-75 transition-opacity duration-300 w-full whitespace-nowrap';
                    // Crear el elemento 'a'
                    let a = document.createElement('a');
                    a.href = `/catalogo?subcategoria=${subcategoria.id}`;
                    a.innerHTML = subcategoria.name;
                    a.className = ' w-full h-full'; // Para que el enlace ocupe todo el 'li'

                    // Añadir el elemento 'a' al 'li'
                    li.appendChild(a);
                    ul.appendChild(li);
                });
                
                divcontainer.appendChild(ul);
            });



            // limpia sus hijos antes de agregar los nuevos
            if (!activeHover) {
                padre.appendChild(divcontainer);
                activeHover = true;
            }
        }
    });



    function cerrar() {
        let padre = document.getElementById('productos-link-h');
        activeHover = false
        padre.innerHTML = '';
    }

</script> --}}

<script>
    const categorias = @json($categorias);
    const marcas = @json($marcas);
    let activeHover = false;
    var activeHovermarca = false;


    // function cerrar() {
    //     categorias.forEach(categoria => {
    //         let padre = document.getElementById(`productos-link-${categoria.id}`);
    //         let megaMenu = document.getElementById(`productos-link-container-${categoria.id}`);
    //         if (megaMenu) {
    //             padre.removeChild(megaMenu);
    //         }
    //     });

    //     // También cerramos el menú de marcas si está abierto
    //     let marcasMenu = document.getElementById('productos-link-m-container');
    //     if (marcasMenu) {
    //         document.getElementById('productos-link-m').removeChild(marcasMenu);
    //     }

    //     activeHover = false;
    // }

    function cerrarmarca() {
        let padre = document.getElementById('productos-link-m');
        activeHovermarca = false;
        padre.innerHTML = ''; // Limpia el contenido del menú
    }

    $(document).ready(function() {
        $(document).on('mouseenter', '.other-class2', function() {
            cerrarmarca();
        });
    });



    let insideMenu = false; // Variable auxiliar para saber si el ratón está dentro del área del menú

    categorias.forEach(categoria => {
        const categoriaElement = document.getElementById(`categoria-${categoria.id}`);
        categoriaElement.addEventListener('mouseenter', function(event) {
            if (event.target === this && !activeHover) {
                // Obtener el contenedor específico de la categoría
                let padre = document.getElementById(`productos-link-${categoria.id}`);

                // Crear contenedor del mega menú
                let divcontainer = document.createElement('div');
                divcontainer.id = `productos-link-container-${categoria.id}`;
                divcontainer.className =
                    'absolute top-[130px] border-b-2 border-b-black z-20 left-1/2 transform -translate-x-1/2 m-0 flex justify-center w-full bg-white overflow-x-auto';

                let titulo = document.createElement('h3');
                titulo.className = 'text-lg font-font-Urbanist_Bold font-bold text-left mb-4 uppercase';
                titulo.innerText = `ROPA DE ${categoria.name}`;
                titulo.style.gridColumn = '1 / -1';



                // Definimos el grid para las columnas de subcategorías
                let gridContainer = document.createElement('div');
                gridContainer.className = 'grid gap-2 px-4 pt-3 pb-7 list-none';
                gridContainer.style.gridTemplateColumns = 'repeat(auto-fill, 150px)';
                gridContainer.style.gridAutoRows = 'auto';
                gridContainer.style.maxWidth = '600px';
                gridContainer.style.justifyItems = 'start';
                gridContainer.style.justifyContent = 'center';
                gridContainer.style.alignItems = 'center';

                gridContainer.appendChild(titulo);
                // Agregar cada subcategoría al grid
                categoria.subcategories.forEach(subcategoria => {
                    let li = document.createElement('li');
                    li.className =
                        'text-[#272727] cursor-pointer font-normal font-Urbanist_Regular text-[15px] py-1 w-full line-clamp-1';
                    li.style.maxWidth = '150px';

                    // Crear enlace de subcategoría
                    let a = document.createElement('a');
                    a.href = `/catalogo?subcategoria=${subcategoria.id}`;
                    a.innerHTML = subcategoria.name;
                    a.className = 'w-full h-full text-center';

                    li.appendChild(a);
                    gridContainer.appendChild(li);
                });

                divcontainer.appendChild(gridContainer);

                // Limpiar el contenedor de hijos y agregar el nuevo contenedor
                padre.innerHTML = ''; // Asegura que el contenedor esté vacío antes de agregar
                padre.appendChild(divcontainer);
                activeHover = true;

                // Agregar evento para que el menú permanezca abierto mientras el ratón esté sobre el enlace o el menú
                categoriaElement.addEventListener('mouseleave', checkCloseMenu);
                divcontainer.addEventListener('mouseenter', () => insideMenu = true);
                divcontainer.addEventListener('mouseleave', checkCloseMenu);
            }
        });

        function checkCloseMenu() {
            insideMenu = false;
            setTimeout(() => {
                if (!insideMenu) {
                    let padre = document.getElementById(`productos-link-${categoria.id}`);
                    padre.innerHTML = '';
                    activeHover = false;
                }
            }, 80); // Añadimos un pequeño retraso para que detecte bien la salida
        }
    });


    document.getElementById('productos-link2').addEventListener('mouseenter', function(event) {
        if (event.target === this) {
            // Muestra submenú de marcas
            let padre = document.getElementById('productos-link-m');
            let divcontainer = document.createElement('div');
            divcontainer.id = 'productos-link-m-container';
            divcontainer.className =
                'absolute top-[130px] border-b-2 border-b-black z-20 left-1/2 transform -translate-x-1/2 m-0 flex justify-center w-full bg-white overflow-x-auto';

            // Definimos el grid para las columnas
            let gridContainer = document.createElement('div');
            gridContainer.className = 'grid gap-2 px-4 py-7 list-none';
            gridContainer.style.gridTemplateColumns = 'repeat(auto-fill, 150px)'; // Columnas de 100px máximo
            gridContainer.style.gridAutoRows = 'auto'; // Altura automática para cada fila
            gridContainer.style.maxWidth = '600px'; // Ajuste opcional para el ancho máximo del contenedor
            gridContainer.style.justifyItems = 'center';
            gridContainer.style.justifyContent = 'center';
            gridContainer.style.alignItems = 'center';

            divcontainer.addEventListener('mouseenter', function() {
                this.addEventListener('mouseleave', cerrarmarca);
            });

            // Agregar cada marca al grid
            marcas.forEach(marca => {
                let li = document.createElement('li');
                li.className =
                    'text-[#272727] cursor-pointer font-normal font-Urbanist_Regular text-[15px] py-1 w-full line-clamp-1';
                li.style.maxWidth = '150px'; // Ancho máximo de cada marca

                let a = document.createElement('a');
                a.href = `/catalogo?marcas=${marca.id}`;
                a.innerHTML = marca.title;
                a.className = 'w-full h-full text-center'; // Centrado del texto

                li.appendChild(a);
                gridContainer.appendChild(li);
            });

            divcontainer.appendChild(gridContainer);

            if (!activeHovermarca) {
                padre.appendChild(divcontainer);
                activeHovermarca = true;
            }
        }
    });
</script>

<script>
    function aplicarDescuentosEnCarrito(articulosCarrito) {
        // Agrupar productos que tienen un discount_id
        let productosConDescuento = articulosCarrito.filter(item => item.discount_id !== null);
        // Agrupar por discount_id
        let gruposDescuentos = {};

        productosConDescuento.forEach(item => {
            if (!gruposDescuentos[item.discount_id]) {
                gruposDescuentos[item.discount_id] = {
                    productos: [],
                    take_product: item.take_product,
                    payment_product: item.payment_product,
                    type_id: item.type_id,
                };
            }
            gruposDescuentos[item.discount_id].productos.push(item);
        });



        // Aplicar descuentos a cada grupo
        for (let discount_id in gruposDescuentos) {
            let grupo = gruposDescuentos[discount_id];
            let cantidadTotal = grupo.productos.reduce((total, item) => total + item.cantidad, 0);
            let take_product = grupo.take_product;
            let payment_product = grupo.payment_product;
            let descuentoTipo = grupo.type_id;
            let productosDeMismoNombre = {}



            grupo.productos.forEach(item => {
                if (!productosDeMismoNombre[item.producto]) {
                    productosDeMismoNombre[item.producto] = {
                        productosf: [], // Lista de productos con el mismo nombre
                    };
                }
                productosDeMismoNombre[item.producto].productosf.push(
                    item); // Agregar productos al grupo por nombre
            });



            switch (descuentoTipo) {
                case 1: // Descuento por Unidad
                    for (let productoNombre in productosDeMismoNombre) {
                        let productos = productosDeMismoNombre[productoNombre].productosf;
                        let cantidadTotalPorNombre = productos.reduce((total, item) => total + item.cantidad, 0);

                        if (cantidadTotalPorNombre >= take_product) {
                            let cantidadADescontar = Math.floor(cantidadTotalPorNombre / take_product) * (take_product -
                                payment_product);
                            let productosRestantes = cantidadADescontar;

                            productos.forEach(item => {
                                let cantidadProducto = item.cantidad;
                                // Aplicar descuento a los productos
                                if (cantidadADescontar > 0 && item.cantidad >= take_product) {
                                    // En este caso, pagas por 1 producto de cada 2

                                    item.recalcularcuando =
                                        item.precioFinal = item.precio * payment_product /
                                        take_product; // Precio ajustado
                                    cantidadADescontar -= item.cantidad;
                                } else {
                                    item.precioFinal = item.precio; // Sin descuento
                                }
                            });
                        }
                    }
                    break;

                case 2: // Descuento Porcentual
                    if (cantidadTotal >= take_product) {
                        let porcentajeDescuento = payment_product / 100;
                        grupo.productos.forEach(producto => {
                            producto.precioFinal = producto.precio * porcentajeDescuento;
                        });
                    }
                    break;

                case 3: // Descuento por Precio Fijo
                    if (cantidadTotal >= take_product) {

                        let grupos = Math.floor(cantidadTotal / take_product);
                        let totalProductosConDescuento = grupos * payment_product;
                        let totalProductosSinDescuento = cantidadTotal % take_product;

                        grupo.productos.forEach(producto => {
                            if (totalProductosConDescuento > 0) {
                                producto.precioFinal = payment_product / take_product;
                                totalProductosConDescuento -= producto.cantidad;
                            } else {
                                producto.precioFinal = producto.precio;
                            }
                        });
                    }
                    break;

                default:

                    grupo.productos.forEach(producto => {
                        producto.precioFinal = producto.precio;
                    });
                    break;
            }
        }
        return articulosCarrito;
    }

    function agregarAlCarrito(item, cantidad) {
        $.ajax({

            url: `{{ route('carrito.buscarProducto') }}`,
            method: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                id: item,
                cantidad

            },
            success: function(success) {
                let {
                    producto,
                    id,
                    descuento,
                    precio,
                    imagen,
                    color,
                    peso,
                    precio_reseller,
                    discount_id,
                    discount
                } = success.data

                let is_reseller = success.is_reseller

                if (is_reseller) {
                    descuento = precio_reseller
                }

                if (discount_id && discount) {
                    // Si existe un descuento, desestructuramos las propiedades
                    ({
                        take_product,
                        payment_product,
                        type_id,
                        status
                    } = discount);
                } else {
                    // Si no existe descuento, inicializamos las variables con valores por defecto
                    take_product = null;
                    payment_product = null;
                    type_id = null;
                    status = null;
                }

                let cantidad = Number(success.cantidad)

                let detalleProducto = {
                    id,
                    producto,
                    isCombo: false,
                    descuento,
                    precio,
                    imagen,
                    cantidad,
                    color,
                    peso,
                    discount_id,
                    discount,
                    take_product,
                    payment_product,
                    type_id,
                    status
                }


                let existeArticulo = articulosCarrito.some(item => item.id === detalleProducto.id && item
                    .isCombo ==
                    false, )

                if (existeArticulo) {
                    //sumar al articulo actual 
                    const prodRepetido = articulosCarrito.map(item => {
                        if (item.id === detalleProducto.id && item.isCombo == false) {
                            item.cantidad += Number(detalleProducto.cantidad);
                            // retorna el objeto actualizado 
                        }
                        return item; // retorna los objetos que no son duplicados 


                    });
                } else {
                    articulosCarrito = [...articulosCarrito, detalleProducto]

                }

                articulosCarrito = aplicarDescuentosEnCarrito(articulosCarrito);

                Local.set('carrito', articulosCarrito)
                let itemsCarrito = $('#itemsCarrito')
                let ItemssubTotal = $('#ItemssubTotal')
                let itemsTotal = $('#itemsTotal')
                limpiarHTML()
                PintarCarrito()
                mostrarTotalItems()

                Notify.add({
                    icon: '/favicon.ico',
                    title: 'Producto agregado',
                    body: 'El producto se agregó al carrito',
                    type: 'success',
                })

            },
            error: function(error) {
                console.error(error)
            }

        })
    }

    $(document).on('click', '#btnAgregarCarritoPr', function() {
        //let url = window.location.href;
        //let partesURL = url.split('/');
        //let productoEncontrado = partesURL.find(parte => parte === 'producto');
        let item
        let cantidad

        let product = $('#btnAgregarCarritoPr');
        let productId = product.data('id');

        //item = partesURL[partesURL.length - 1]
        cantidad = Number($('#cantidadSpan span').text());
        //item = $(this).data('id');
        try {
            agregarAlCarrito(productId, cantidad)

        } catch (error) {
            console.error(error)
        }
    })

    $(document).on('click', '#btnAgregarCarrito', function() {

        let item = $(this).data('id')

        let cantidad = 1
        try {
            agregarAlCarrito(item, cantidad)

        } catch (error) {
            console.error(error)

        }
    })
</script>

{{-- <script>
     document.addEventListener('click', function(event) {
      var input = document.getElementById('buscarproducto');
      var resultados = document.getElementById('resultados');
      var isClickInsideInput = input.contains(event.target);
      var isClickInsideResultados = resultados.contains(event.target);

      if (!isClickInsideInput && !isClickInsideResultados) {
          input.value = '';
          $('#resultados').empty();
      }
  });

  document.addEventListener('click', function(event) {
      var input = document.getElementById('buscarproductosecond');
      var resultados = document.getElementById('resultadossecond');
      var isClickInsideInput = input.contains(event.target);
      var isClickInsideResultados = resultados.contains(event.target);

      if (!isClickInsideInput && !isClickInsideResultados) {
          input.value = '';
          $('#resultadossecond').empty();
      }
  });
</script> --}}

{{-- <script>
    document.getElementById('productos-link2').addEventListener('mouseenter', function(event) { 
        if (event.target === this && !activeHovermarca) {
            let padre = document.getElementById('productos-link-m');
            
            // Crear el contenedor del menú de marcas
            let divcontainer = document.createElement('div');
            divcontainer.id = 'productos-link-m-container';
            divcontainer.className =
                'absolute top-[219px] border-b-2 border-b-black z-20 left-1/2 transform -translate-x-1/2 m-0 flex justify-center w-full bg-white overflow-x-auto';

            let gridContainer = document.createElement('div');
            gridContainer.className = 'grid gap-2 px-4 py-7 list-none';
            gridContainer.style.gridTemplateColumns = 'repeat(auto-fill, 150px)';
            gridContainer.style.gridAutoRows = 'auto';
            gridContainer.style.maxWidth = '60%';
            gridContainer.style.justifyItems = 'center';
            gridContainer.style.justifyContent = 'center';
            gridContainer.style.alignItems = 'center';

            // Agregar cada marca al grid
            marcas.forEach(marca => {
                let li = document.createElement('li');
                li.className =
                    'text-[#272727] cursor-pointer font-normal font-Urbanist_Regular text-[15px] py-1 w-full line-clamp-1';
                li.style.maxWidth = '150px';

                let a = document.createElement('a');
                a.href = `/catalogo?marcas=${marca.id}`;
                a.innerHTML = marca.title;
                a.className = 'w-full h-full text-center';

                li.appendChild(a);
                gridContainer.appendChild(li);
            });

            divcontainer.appendChild(gridContainer);

            // Limpiar hijos y agregar el contenedor del menú
            padre.innerHTML = '';
            padre.appendChild(divcontainer);
            activeHovermarca = true;

            // Agregar eventos de `mouseleave` para cerrar el menú
            document.getElementById('productos-link2').addEventListener('mouseleave', scheduleCloseMarca);
            divcontainer.addEventListener('mouseenter', () => clearTimeout(closeTimeoutMarca));
            divcontainer.addEventListener('mouseleave', scheduleCloseMarca);
        }
    });

    let closeTimeoutMarca; // Temporizador para cerrar el menú

    function scheduleCloseMarca() {
        closeTimeoutMarca = setTimeout(() => {
            cerrarmarca();
        }, 100); // Retardo para evitar cierres bruscos
    }

    function cerrarmarca() {
        let padre = document.getElementById('productos-link-m');
        activeHovermarca = false;
        padre.innerHTML = ''; // Limpia el contenido del menú
    }
</script> --}}
