@php
    $links = [
        [
            'name' => 'Biometrico',
            'icon' => 'funnel',
            'url' => route('biometrico.index'),
            'current' => request()->routeIs('biometrico.*'),
        ],
    ];

    if(auth()->check()) {
        $links[] = [
            'name' => 'Dashboard',
            'icon' => 'layout-grid',
            'url' => route('dashboard'),
            'current' => request()->routeIs('dashboard'),
        ];
    }
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $title ?? 'Laravel' }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        {{-- script para que funcione sweetAlert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @stack('css')

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance

    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <a href="#" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navbar class="-mb-px max-lg:hidden">

                @foreach ($links as $link)
                    
                    <flux:navbar.item :icon="$link['icon']" :href="$link['url']" :current="$link['current']" wire:navigate>
                        {{ $link['name'] }}
                    </flux:navbar.item>

                @endforeach
            </flux:navbar>

            <flux:spacer />

            <!-- Desktop User Menu -->
            @auth
                
                <flux:dropdown position="top" align="end">
                    <flux:profile
                        class="cursor-pointer"
                        :initials="auth()->user()->initials()"
                    />
                    <flux:menu>
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>

            @else
                <flux:dropdown position="top" align="end">
                    <flux:button
                        class="cursor-pointer"
                        icon="user"
                    />

                    <flux:menu>

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('login')" wire:navigate>
                                {{ __('Log In') }}
                            </flux:menu.item>

                            <flux:menu.item :href="route('register')" wire:navigate>
                                {{ __('Register') }}
                            </flux:menu.item>
                        </flux:menu.radio.group>

                    </flux:menu>
                </flux:dropdown>
            @endauth
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="#" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')">
                    

                    <flux:navlist.item icon="funnel" :href="route('biometrico.index')" :current="request()->routeIs('biometrico.*')" wire:navigate>
                        {{ __('Biometrico') }}
                    </flux:navlist.item>
                    @auth
                        <flux:navlist.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                            {{ __('Dashboard') }}
                        </flux:navlist.item>
                    @endauth
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

        </flux:sidebar>

        <flux:main>
            {{ $slot }}
        </flux:main>

        @stack('js')

        {{-- Alerta --}}
        @if (session('swal'))
            <script>
                Swal.fire(@json(session('swal')));
            </script>  
        @endif

        @fluxScripts
    </body>
</html>
