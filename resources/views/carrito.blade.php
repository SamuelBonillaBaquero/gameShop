@php
    $total = 0;
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Carrito - GameShop</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-950 text-slate-200 min-h-screen p-4 md:p-8">

    <!-- Fondo Decorativo -->
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div class="absolute -top-[10%] -left-[10%] w-[45%] h-[45%] bg-violet-600/10 blur-[120px] rounded-full"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[45%] h-[45%] bg-cyan-600/10 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-6xl mx-auto">

        <!-- Header del Carrito -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <h1 class="text-4xl font-black text-white italic uppercase tracking-tighter">
                    TU <span class="text-cyan-400">INVENTARIO</span>
                </h1>
                <p class="text-slate-500 font-bold tracking-widest text-[10px] uppercase mt-1">Revisa tus items antes del checkout</p>
            </div>
            <a href="/" class="text-slate-400 hover:text-white transition-colors text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                Seguir Comprando
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Lista de Productos -->
            <div class="lg:col-span-2 space-y-4">
                {{-- Encabezados visuales --}}
                <div class="hidden md:grid grid-cols-5 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">
                    <div class="col-span-2">Producto</div>
                    <div class="text-center">Precio</div>
                    <div class="text-center">Cantidad</div>
                    <div class="text-right">Total</div>
                </div>

                @forelse ($carrito->carrito as $game)
                    <div class="group bg-slate-900/40 border border-slate-800/50 backdrop-blur-md rounded-2xl p-4 md:p-6 hover:border-violet-500/50 transition-all shadow-xl">
                        <div class="grid grid-cols-1 md:grid-cols-5 items-center gap-4">

                            <!-- Info Principal -->
                            <div class="md:col-span-2 flex items-center gap-4">
                                <div class="relative group/btn">
                                    <h3 class="text-white font-bold text-lg leading-tight">{{ $game->getName() }}</h3>
                                    <p class="text-slate-500 text-xs line-clamp-1">{{ $game->getDescription() }}</p>

                                    <!-- Botón Eliminar Móvil -->
                                    <form action="" class="md:hidden mt-2">
                                        <button class="text-[10px] text-red-400 font-black uppercase tracking-tighter flex items-center gap-1 hover:text-red-300 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                            Eliminar Item
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Precio -->
                            <div class="text-center">
                                <span class="md:hidden text-[10px] block text-slate-500 uppercase font-black">Precio:</span>
                                <span class="text-cyan-400 font-mono font-bold">{{ $game->getPrice() }}€</span>
                                @php
                                    $total += ($game->getPrice() * $game->getAmount());
                                @endphp
                            </div>

                            <!-- Controles de Cantidad y Eliminar (Desktop) -->
                            <div class="flex flex-col items-center gap-3">
                                <span class="md:hidden text-[10px] text-slate-500 uppercase font-black">Unidades:</span>
                                <div class="flex items-center bg-slate-950 border border-slate-800 rounded-xl overflow-hidden shadow-inner">

                                    <form action="{{route('carrito.menos',$game->getId())}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="px-3 py-2 hover:bg-slate-800 text-slate-400 hover:text-white transition-colors">-</button>
                                    </form>

                                    <span class="px-4 py-2 text-white font-black font-mono text-sm border-x border-slate-800 leading-none">
                                        {{ $game->getAmount() }}
                                    </span>

                                    <form action="{{route('carrito.mas',$game->getId())}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="px-3 py-2 hover:bg-slate-800 text-slate-400 hover:text-white transition-colors">+</button>
                                    </form>

                                </div>

                                <!-- Botón Eliminar Desktop -->
                                <form action="{{route('carrito.delete',$game->getId())}}" class="hidden md:block" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-[9px] text-slate-600 hover:text-red-500 font-black uppercase tracking-widest transition-colors flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                        Eliminar
                                    </button>
                                </form>
                            </div>

                            <!-- Subtotal Item -->
                            <div class="text-right">
                                <span class="md:hidden text-[10px] block text-slate-500 uppercase font-black">Subtotal:</span>
                                <span class="text-white font-black text-xl tracking-tighter italic">
                                    {{ $game->getPrice() * $game->getAmount() }}€
                                </span>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="bg-slate-900/40 border-2 border-dashed border-slate-800 rounded-[2rem] p-20 text-center">
                        <p class="text-slate-500 font-bold uppercase tracking-widest">El carrito está vacío</p>
                    </div>
                @endforelse
            </div>

            <!-- Resumen de Pago -->
            <div class="lg:col-span-1">
                <div class="bg-violet-600/10 border border-violet-500/20 backdrop-blur-2xl rounded-[2rem] p-8 sticky top-8">
                    <h2 class="text-xl font-bold text-white mb-6 uppercase italic tracking-tighter">Resumen de Orden</h2>

                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-slate-400 text-sm font-medium">
                            <span>Subtotal</span>
                            <span class="text-white font-mono">{{ $total }}€</span>
                        </div>
                        <div class="flex justify-between text-slate-400 text-sm font-medium">
                            <span>Gastos de gestión</span>
                            <span class="text-emerald-400 font-mono">FREE</span>
                        </div>
                        <div class="h-px bg-slate-800/50 my-4"></div>
                        <div class="flex justify-between items-end">
                            <span class="text-slate-200 font-black uppercase tracking-widest text-xs">Total</span>
                            <span class="text-3xl font-black text-white italic tracking-tighter">{{ $total }}€</span>
                        </div>
                    </div>

                    <button class="w-full bg-violet-600 hover:bg-violet-500 text-white font-black py-4 rounded-xl transition-all shadow-lg shadow-violet-600/20 active:scale-[0.98] uppercase tracking-tighter text-lg italic flex items-center justify-center gap-3">
                        Proceder al Pago
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </button>

                    <div class="mt-6 flex items-center justify-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Servidor Seguro Activo</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
