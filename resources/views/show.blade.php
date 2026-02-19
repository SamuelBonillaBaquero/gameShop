<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Detalles de {{$game->name}}</title>
    <style>
        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-200 min-h-screen flex flex-col items-center p-4 md:p-8">

    <!-- Botón Volver -->
    <div class="w-full max-w-5xl mb-6">
        <a href="{{route('game.index')}}" class="inline-flex items-center text-slate-400 hover:text-violet-400 transition-colors gap-2 font-semibold">

            < Volver a la tienda
        </a>
    </div>

    <!-- Contenedor Principal de Detalles -->
    <main class="w-full max-w-5xl bg-slate-900 rounded-3xl border border-slate-800 shadow-2xl overflow-hidden">
        <div class="flex flex-col md:flex-row">

            <!-- Columna Izquierda: Imagen -->
            <div class="w-full md:w-1/2 relative bg-slate-800/50">
                <img src="{{$game->image}}" alt="{{$game->name}}" class="w-full h-full object-cover min-h-100">
                <!-- Badge de Valoración -->
                <div class="absolute top-6 left-6 bg-slate-950/90 backdrop-blur-md px-4 py-2 rounded-2xl flex items-center gap-2 border border-white/10 shadow-xl">
                    <span class="text-yellow-400 text-lg">★</span>
                    <span class="text-white font-black text-lg">{{$game->valoration}}</span>
                </div>
            </div>

            <!-- Columna Derecha: Información -->
            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col">
                <div class="mb-6">
                    <span class="text-cyan-400 font-bold tracking-widest uppercase text-xs">Videojuego Original</span>
                    <h1 class="text-4xl md:text-5xl font-black text-white mt-2 leading-tight">{{$game->name}}</h1>
                </div>

                <div class="space-y-6 grow">
                    <div>
                        <h3 class="text-slate-500 uppercase text-xs font-bold tracking-widest mb-2">Descripción</h3>
                        <p class="text-slate-300 leading-relaxed text-lg">
                            {{$game->description}}
                        </p>
                    </div>

                    <div class="flex items-center gap-8 py-6 border-y border-slate-800">
                        <div>
                            <h3 class="text-slate-500 uppercase text-xs font-bold tracking-widest mb-1">Precio</h3>
                            <p class="text-4xl font-black text-white">{{$game->price}}€</p>
                        </div>
                        <div>
                            <h3 class="text-slate-500 uppercase text-xs font-bold tracking-widest mb-1">Disponibilidad</h3>
                            <p class="text-lg font-bold {{ $game->stock > 0 ? 'text-green-400' : 'text-red-400' }}">
                                {{ $game->stock > 0 ? $game->stock . ' en stock' : 'Agotado' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <form action="{{route('game.addCarrito')}}" method="GET" class="w-full">
                        <button type="submit" class="w-full bg-violet-600 hover:bg-violet-500 text-white font-black py-4 px-8 rounded-2xl transition-all shadow-lg shadow-violet-500/25 flex items-center justify-center gap-3 cursor-pointer text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                            AÑADIR AL CARRITO
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Simple -->
    <footer class="mt-12 text-slate-600 text-sm italic">
        GameShop - La mejor experiencia para el jugador.
    </footer>

</body>
</html>
