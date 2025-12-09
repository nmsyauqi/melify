@php
    $isLoggedIn = Auth::check();
@endphp

<x-layouts.base>
    <nav class="bg-gray-800 p-4 fixed w-full z-10 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-2xl font-bold">
                <x-logo class="w-6 h-6 inline mr-2 text-yellow-400" /> Melify
            </a>
            
            <div class="space-x-4">
                @if ($isLoggedIn)
                    <a href="/meli-er" class="text-yellow-400 hover:text-white px-3 py-2 rounded-md transition duration-150">Dashboard</a>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="bg-yellow-500 text-gray-900 hover:bg-yellow-600 px-3 py-2 rounded-md font-medium">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md transition duration-150">Login</a>
                    <a href="{{ route('register') }}" class="bg-yellow-500 text-gray-900 hover:bg-yellow-600 px-3 py-2 rounded-md font-medium">Daftar</a>
                @endif
            </div>
        </div>
    </nav>

    <main class="bg-gray-900 text-white min-h-screen flex items-center pt-20">
        <div class="container mx-auto px-4 py-16 text-center">
            <h1 class="text-7xl font-extrabold mb-6">
                <span class="text-yellow-400">Melify:</span> Data Minerba Cepat & Modern
            </h1>
            <p class="text-2xl text-gray-300 mb-10 max-w-3xl mx-auto">
                Sistem manajemen data Livewire dan Vue.js yang reaktif, dirancang untuk efisiensi dan keamanan data Anda.
            </p>

            @if ($isLoggedIn)
                <a href="/meli-er" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 rounded-full text-xl shadow-2xl transition duration-300">
                    Masuk ke Dashboard
                </a>
            @else
                <a href="{{ route('register') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 rounded-full text-xl shadow-2xl transition duration-300">
                    Mulai Sekarang
                </a>
            @endif

            <div class="mt-20 text-gray-500 text-sm">
                <p>Framework: Laravel 12 (TALL Stack + Vue) | Arsitektur: Pisah Kamar</p>
                <p>&copy; 2025 Melify | Final Project</p>
            </div>
        </div>
    </main>
</x-layouts.base>