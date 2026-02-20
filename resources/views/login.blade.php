<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Login - GameShop</title>
</head>
<body class="bg-slate-950 text-slate-200 min-h-screen flex items-center justify-center p-4">

    <!-- Decoración de fondo (Círculos de luz) -->
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-violet-600/20 blur-[120px] rounded-full"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[40%] h-[40%] bg-cyan-600/20 blur-[120px] rounded-full"></div>
    </div>

    @if (session('mensage'))
        <div class="bg-green-200 text-white p-4 rounded">
        {{session   ('mensage')}}
        </div>
    @endif

    @if (session('mensageError'))
        <div class="bg-red-500 text-black p-4 rounded">
        {{session   ('mensageError')}}
        </div>
    @endif

    <div class="w-full max-w-md" id="login">
        <!-- Logo o Título Superior -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-black text-white tracking-tighter italic">
                GAME<span class="text-violet-500">SHOP</span>
            </h1>
            <p class="text-slate-500 mt-2 font-medium">Bienvenido de nuevo, Player 1</p>
        </div>

        <!-- Tarjeta de Login -->
        <div class="bg-slate-900/50 border border-slate-800 backdrop-blur-xl p-8 rounded-3xl shadow-2xl">
            <h2 class="text-2xl font-bold text-white mb-6">Iniciar Sesión</h2>

            <form action="{{route('user.iniciarSesion')}}" method="POST" class="space-y-6">

                @csrf

                <!-- Campo Usuario -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 ml-1">
                        Email
                    </label>
                    <input type="text" name="email" id="email" placeholder="Escriba usuario"
                        class="w-full bg-slate-950 border border-slate-800 rounded-xl py-3 px-4 text-white focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all placeholder:text-slate-700">
                    @error('email')
                        <span class="text-red-500">{{$message}} </span>
                    @enderror
                </div>

                <!-- Campo Contraseña -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 ml-1">
                        Contraseña
                    </label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="w-full bg-slate-950 border border-slate-800 rounded-xl py-3 px-4 text-white focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all placeholder:text-slate-700">
                    @error('password')
                        <span class="text-red-500">{{$message}} </span>
                    @enderror
                </div>


                <!-- Botón Submit -->
                <button type="submit"
                    class="w-full bg-violet-600 hover:bg-violet-500 text-white font-black py-4 rounded-xl transition-all shadow-lg shadow-violet-500/20 active:scale-[0.98] cursor-pointer">
                    Iniciar Sesion
                </button>
            </form>

            <!-- Separador -->
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center"><span class="w-full border-t border-slate-800"></span></div>
                <div class="relative flex justify-center text-xs uppercase"><span class="bg-slate-900 px-2 text-slate-500 font-bold">O</span></div>
            </div>

            <!-- Registro -->
            <p class="text-center text-slate-400 text-sm">
                ¿No tienes cuenta?
                <a href="{{route('user.Viewregistrar')}}" class="text-cyan-400 font-bold hover:underline ml-1 transition-all">Regístrate aquí</a>
            </p>
        </div>

        <!-- Botón Volver a la Tienda -->
        <div class="text-center mt-8">
            <a href="/" class="text-slate-500 hover:text-white text-sm flex items-center justify-center gap-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                Volver a la tienda
            </a>
        </div>
    </div>

</body>
</html>
