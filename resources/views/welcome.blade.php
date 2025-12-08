@php
    // Tentukan apakah pengguna sudah login
    $isLoggedIn = Auth::check();
@endphp

{{-- Menggunakan base layout untuk memuat CSS dan JS (Vite) --}}
<x-layouts.base>
    {{-- Bagian Navigasi (Taskbar) --}}
    <nav class="bg-gray-800 p-4 shadow-lg fixed w-full top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            {{-- Logo dan Nama Proyek --}}
            <a href="/" class="text-white text-2xl font-bold tracking-wider">
                <x-logo class="w-6 h-6 inline mr-2 text-yellow-400" /> Melify
            </a>

            {{-- Tautan Navigasi --}}
            <div class="space-x-4">
                @if ($isLoggedIn)
                    {{-- Jika sudah login --}}
                    <a href="{{ route('/meli-er') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-150">
                        <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
                    </a>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="bg-yellow-500 text-gray-900 hover:bg-yellow-400 px-3 py-2 rounded-md text-sm font-medium transition duration-150">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    {{-- Jika belum login --}}
                    <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-150">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-yellow-500 text-gray-900 hover:bg-yellow-400 px-3 py-2 rounded-md text-sm font-medium transition duration-150">
                        Mulai Gratis
                    </a>
                @endif
            </div>
        </div>
    </nav>

    {{-- Bagian Utama (Hero Section) --}}
    <header class="bg-gray-900 text-white min-h-screen flex items-center pt-24">
        <div class="container mx-auto px-4 py-20 flex flex-wrap items-center">
            
            {{-- Kolom Kiri (Judul dan Deskripsi) --}}
            <div class="w-full lg:w-1/2 mb-12 lg:mb-0">
                <h1 class="text-6xl font-extrabold leading-tight mb-4 text-yellow-400">
                    Kelola <span class="text-white">Mineral</span> Data Lebih Cepat
                </h1>
                <p class="text-xl text-gray-300 mb-8">
                    Melify adalah solusi cerdas untuk manajemen data Mineral Anda. 
                    Dengan Livewire dan Vue.js, pengelolaan data Anda menjadi reaktif, cepat, dan modern.
                </p>
                
                {{-- Tombol Call to Action --}}
                @if ($isLoggedIn)
                    <a href="{{ route('meli-er') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 shadow-xl">
                        Kembali ke Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 shadow-xl">
                        Daftar Sekarang
                    </a>
                @endif
            </div>

            {{-- Kolom Kanan (Ilustrasi/Fitur Utama) --}}
            <div class="w-full lg:w-1/2 flex justify-center">
                {{-- Placeholder Ilustrasi (Ganti dengan SVG atau Image Anda) --}}
                <div class="bg-gray-800 p-8 rounded-xl shadow-2xl w-full max-w-md border-t-4 border-yellow-500">
                    <h2 class="text-2xl font-semibold mb-4 border-b pb-2 border-gray-700">Fitur Utama</h2>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-bolt text-yellow-400 mt-1 mr-3"></i>
                            Reaktivitas Real-time (Livewire)
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-code-branch text-yellow-400 mt-1 mr-3"></i>
                            Struktur Data Terpisah (Meli & MeliUri)
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-desktop text-yellow-400 mt-1 mr-3"></i>
                            Antarmuka Modern (Tailwind + Alpine.js)
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </header>

    {{-- Bagian Fitur (Opsional) --}}
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Mengapa Memilih Melify?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Kartu Fitur 1 --}}
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 border-t-2 border-indigo-500">
                    <i class="fas fa-database text-4xl text-indigo-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Integrasi Data Kuat</h3>
                    <p class="text-gray-600">
                        Menggunakan MariaDB lokal/MySQL hosting, memastikan data Anda tersimpan dengan aman dan cepat.
                    </p>
                </div>
                
                {{-- Kartu Fitur 2 --}}
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 border-t-2 border-green-500">
                    <i class="fab fa-laravel text-4xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Teknologi Modern (Laravel 12)</h3>
                    <p class="text-gray-600">
                        Dibangun di atas framework PHP paling populer, menjamin skalabilitas dan performa aplikasi.
                    </p>
                </div>

                {{-- Kartu Fitur 3 --}}
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 border-t-2 border-pink-500">
                    <i class="fas fa-lock text-4xl text-pink-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Deployment Aman</h3>
                    <p class="text-gray-600">
                        Menggunakan Metode Pisah Kamar di Shared Hosting, menjaga kode inti backend dari akses publik.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Bagian Footer --}}
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center px-4">
            <p>&copy; 2025 Melify | Final Project Laravel | <span class="text-yellow-400">nmsyauqi.my.id</span></p>
        </div>
    </footer>
</x-layouts.base>