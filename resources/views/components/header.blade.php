<header class="bg-gray-800 text-white p-4 flex justify-between items-center">
    <div class="flex flex-col md:flex-row items-start md:items-center">
        <div class="flex items-center gap-2">
            <x-lucide-globe class="h-6 w-6" />
            <h1 class="text-xl font-bold">BIOLINKS</h1>
        </div>
        <span class="md:ml-4 text-sm text-gray-400">Seus links para acesso rápido</span>
    </div>

    <div class="flex items-center gap-2">
        @auth
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost">
                <span>{{ auth()->user()->handler }}</span>
                <x-lucide-user-circle class="h-5 w-5" />
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52 text-gray-900">
                <li>
                    <a href="{{ route('profile.index') }}" class="flex items-center gap-2">
                        <x-lucide-user class="h-4 w-4" />
                        Perfil
                    </a>
                </li>
                <li>
                    <a href="{{ route('link.create') }}" class="flex items-center gap-2">
                        <x-lucide-link class="h-4 w-4" />
                        Adicionar Link
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <x-lucide-list-checks class="h-4 w-4" />
                        Meus Links
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="flex items-center gap-2">
                        <x-lucide-log-out class="h-4 w-4" />
                        sair
                    </a>
                </li>
            </ul>
        </div>
        @endauth

        @guest
        <a href="{{ route('login') }}" class="btn btn-primary">Entrar</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Registrar</a>
        @endguest
    </div>
</header>