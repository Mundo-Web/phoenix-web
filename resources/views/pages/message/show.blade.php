<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div
            class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
            <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl">Enviado el {{ $message->created_at->format('d-m-Y') }} por {{ $message->full_name }}</h2>
            </header>
            <div class="p-3">
                <div class="flex flex-col gap-2 p-6">
                    <p> <span class="font-bold">Nombre: </span><span> {{ $message->full_name ?? "Sin nombre"}} </span></p> 
                    <p> <span class="font-bold">Correo: </span><span> {{ $message->email ?? "Sin correo"}} </span></p> 
                    <p> <span class="font-bold">Teléfono: </span><span> {{ $message->phone ?? "Sin telefono"}} </span></p> 
                    <p> <span class="font-bold">Mensaje: </span><span class="mb-5">{{ $message->message ?? "Sin mensaje" }}</span></p> 
                    <div>
                      <a href="{{ route('mensajes.index') }}" class="bg-blue-500 px-4 py-2 rounded text-white"><span><i
                                class="fa-solid fa-arrow-left mr-2 mt-3"></i></span> Volver</a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    </div>



</x-app-layout>
