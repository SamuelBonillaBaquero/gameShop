<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Registro - GameShop</title>
</head>
<body class="bg-slate-950 text-slate-200 min-h-screen flex items-center justify-center p-6">

    <!-- Decoración de fondo (Nebulosas) -->
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div class="absolute top-[20%] right-[10%] w-[50%] h-[50%] bg-cyan-600/10 blur-[130px] rounded-full"></div>
        <div class="absolute bottom-[20%] left-[10%] w-[40%] h-[40%] bg-violet-600/10 blur-[130px] rounded-full"></div>
    </div>

    <div class="w-full max-w-xl">
        <!-- Encabezado -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-black text-white tracking-tighter italic uppercase">
                 <span class="text-cyan-400">GameShop</span>
            </h1>
            <p class="text-slate-500 mt-2 font-medium">Crea tu cuenta de jugador y empieza la aventura</p>
        </div>

        <!-- Tarjeta de Registro -->
        <div class="bg-slate-900/40 border border-slate-800 backdrop-blur-2xl p-8 md:p-10 rounded-4xl shadow-2xl">
            <h2 class="text-2xl font-bold text-white mb-8 flex items-center gap-3">
                <span class="w-2 h-8 bg-cyan-500 rounded-full"></span>
                Registro de Usuario
            </h2>

            <form action="{{route('user.register')}}" method="POST" class="space-y-5">

                @csrf

                <!-- Fila 1: Usuario y Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label for="user" class="block text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">
                            Nombre de usuario
                        </label>
                        <input type="text" id="name" name="name" placeholder="Indique usuario"
                            class="w-full bg-slate-950/50 border border-slate-800 rounded-2xl py-3 px-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all">
                            @error('name')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="email" class="block text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">
                            Email
                        </label>
                        <input type="email" id="email" name="email" placeholder="Indique email"
                            class="w-full bg-slate-950/50 border border-slate-800 rounded-2xl py-3 px-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all">
                            @error('email')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                    </div>
                </div>

                <!-- Dirección (Ancho completo) -->
                <div class="space-y-2">
                    <label for="direccion" class="block text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">
                        Dirección de Envío
                    </label>
                    <input type="text" id="direccion" name="direccion" placeholder="Indique direccion"
                        class="w-full bg-slate-950/50 border border-slate-800 rounded-2xl py-3 px-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all">
                            @error('direccion')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                </div>

                <!-- Contraseñas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 border-t border-slate-800/50 pt-5">
                    <div class="space-y-2">
                        <label for="passwd" class="block text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">
                            Contraseña
                        </label>
                        <input type="password" id="password" name="password" placeholder="••••••••"
                            class="w-full bg-slate-950/50 border border-slate-800 rounded-2xl py-3 px-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all">
                            @error('password')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="passwd2" class="block text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">
                            Repetir Contraseña
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                            class="w-full bg-slate-950/50 border border-slate-800 rounded-2xl py-3 px-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all">
                            @error('password_confirmation')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                    </div>
                </div>

                <!-- Botón de Registro -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-cyan-600 hover:bg-cyan-500 text-slate-950 font-black py-4 rounded-2xl transition-all shadow-lg shadow-cyan-500/20 active:scale-[0.98] cursor-pointer">
                        CREAR CUENTA
                    </button>
                </div>
            </form>

            <!-- Enlace Volver al Login -->
            <p class="text-center text-slate-500 text-sm mt-8 border-t border-slate-800 pt-6">
                ¿Ya tienes cuenta?
                <a href="/login" class="text-violet-400 font-bold hover:text-violet-300 ml-1 transition-all">Inicia sesión</a>
            </p>
        </div>

        <!-- Botón Volver a la Tienda -->
        <div class="text-center mt-8">
            <a href="/" class="group text-slate-500 hover:text-white text-sm flex items-center justify-center gap-2 transition-all">
                <svg class="group-hover:-translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                Volver a la tienda
            </a>
        </div>
    </div>


</body>
</html>
