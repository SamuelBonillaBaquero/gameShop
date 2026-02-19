<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tailwind CSS 4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>GameShop | Expertos en Juegos</title>
    <style>
        /* Gradientes personalizados y suavizado */
        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .text-gradient {
            background: linear-gradient(to right, #a855f7, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-200 font-sans min-h-screen">

    <!-- Header / Navbar -->
    <nav class="sticky top-0 z-50 glass px-6 py-4 flex flex-col md:flex-row justify-between items-center gap-4">
        <div id="izquierda" class="flex items-center">
            <h1 class="text-3xl font-black tracking-tighter text-gradient uppercase">
                GameShop
            </h1>
        </div>

        <div id="derecha" class="flex items-center gap-4">
            <button class="px-5 py-2 rounded-full font-semibold border border-slate-700 hover:bg-slate-800 transition-all cursor-pointer">
                Login
            </button>
            <button class="px-5 py-2 rounded-full font-semibold bg-violet-600 hover:bg-violet-500 text-white shadow-lg shadow-violet-500/20 transition-all flex items-center gap-2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                Carrito
            </button>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-8">

        <!-- Hero Section / Empresa -->
        <section id="infoEmpresa" class="relative overflow-hidden rounded-3xl bg-slate-900 border border-slate-800 mb-12">
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-full md:w-1/2 p-10 z-10">
                    <span class="text-cyan-400 font-bold tracking-widest uppercase text-sm">Bienvenidos</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4 leading-tight">Expertos en <br><span class="text-violet-400">Cultura Gamer</span></h2>
                    <div class="space-y-2 text-slate-400">
                        <p class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-violet-500" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            Calle Francisco Franco 12
                        </p>
                        <p class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-cyan-500" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            635 48 51 99
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 h-64 md:h-96 overflow-hidden">
                    <!-- Imagen con overlay para que no distraiga del texto -->
                    <div class="absolute inset-0 bg-linear-to-r from-slate-900 via-transparent to-transparent z-5 shadow-inner"></div>
                    <img src="{{asset('images/layaout.png')}}" alt="Reserva ya" class="w-full h-full object-cover opacity-60 hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </section>

        <!-- Buscador -->
        <div class="mb-12 max-w-2xl mx-auto">
            <form action="" class="relative group">
                <input type="search" placeholder="¿Qué deseas jugar hoy?"
                    class="w-full bg-slate-900 border-2 border-slate-800 rounded-2xl py-4 px-12 focus:outline-none focus:border-violet-500 transition-all text-lg shadow-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-violet-400 transition-colors" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </form>
        </div>

        <!-- Grid de Juegos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($juegos as $game)
                <a href="{{route('game.show',$game->id)}}">
                    <div class="group bg-slate-900 rounded-3xl overflow-hidden border border-slate-800 hover:border-violet-500/50 hover:shadow-2xl hover:shadow-violet-500/10 transition-all flex flex-col">
                    <!-- Imagen del Juego -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{$game->image}}" alt="Imagen de {{$game->name}}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-3 right-3 bg-slate-950/80 backdrop-blur px-2 py-1 rounded-lg flex items-center gap-1 border border-white/10">
                            <span class="text-yellow-400 text-sm">★</span>
                            <span class="text-xs font-bold">{{$game->valoration}}</span>
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="p-6 flex flex-col grow">
                        <h2 class="text-xl font-bold mb-2 group-hover:text-violet-400 transition-colors leading-tight">{{$game->name}}</h2>
                        <p class="text-slate-400 text-sm line-clamp-2 mb-4 grow">{{$game->description}}</p>

                        <div class="flex justify-between items-end mt-auto">
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-tighter">Stock: {{$game->stock}}</p>
                                <p class="text-2xl font-black text-white mt-1">{{$game->price}}€</p>
                            </div>
                            <button class="bg-slate-800 p-3 rounded-xl hover:bg-violet-600 transition-colors group/btn cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-cyan-400 group-hover/btn:text-white"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach
        </div>

    </main>

    <footer class="mt-20 py-10 border-t border-slate-900 text-center text-slate-500 text-sm">
        &copy; {{ date('Y') }} GameShop - All Rights Reserved.
    </footer>

</body>
</html>
