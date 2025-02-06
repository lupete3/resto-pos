<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-base-200 min-h-screen">
        <!-- Autres éléments du layout -->
        @auth
            <div class="drawer lg:drawer-open">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    @livewire('partial.navbar')
                    {{ $slot }}
                </div>
                <div class="drawer-side">
                    <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    @livewire('partial.sidebar')
                </div>
            </div>
        @endauth
        @guest
            <div class="flex flex-col justify-center items-center h-screen gap-8" >
                <h1 class="font-bold text-4xl">{{ config('app.name') }}</h1>
                {{ $slot }}
            </div>
        @endguest
    
        <!-- Script pour SweetAlert2 -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                window.addEventListener('show-swal', event => {
                    const { type, title, text } = event.detail;
    
                    Swal.fire({
                        icon: type,
                        title: title,
                        text: text,
                        timer: 5000, // Masquer automatiquement après 5 secondes
                        toast: true, // Mode toast
                        position: 'top-end', // Position en haut à droite
                        showConfirmButton: false, // Désactiver le bouton "OK"
                        timerProgressBar: true, // Afficher une barre de progression
                    });
                });
            });
        </script>
    
        @livewireScripts
    </body>
</html>
