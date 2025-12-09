<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Terpy - Waypoints</title>
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <style>
            /*! tailwindcss v4.0.14 | MIT License | https://tailwindcss.com */
            @layer theme{:root,:host{--font-sans:ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-gray-900:oklch(.21 .034 264.665);--color-zinc-50:oklch(.985 0 0);--color-zinc-200:oklch(.92 .004 286.32);--color-zinc-400:oklch(.705 .015 286.067);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.442 .017 285.786);--color-zinc-700:oklch(.37 .013 285.805);--color-zinc-800:oklch(.274 .006 286.033);--color-zinc-900:oklch(.21 .006 285.885);--color-neutral-100:oklch(.97 0 0);--color-neutral-200:oklch(.922 0 0);--color-neutral-700:oklch(.371 0 0);--color-neutral-800:oklch(.269 0 0);--color-neutral-900:oklch(.205 0 0);--color-neutral-950:oklch(.145 0 0);--color-stone-800:oklch(.268 .007 34.298);--color-stone-950:oklch(.147 .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--default-font-family:var(--font-sans);--default-mono-font-family:var(--font-mono);}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");}body{line-height:inherit}a{color:inherit;text-decoration:inherit}}@layer utilities{.absolute{position:absolute}.relative{position:relative}.top-0{top:calc(var(--spacing)*0)}.right-0{right:calc(var(--spacing)*0)}.flex{display:flex}.flex-col{flex-direction:column}.grid{display:grid}.hidden{display:none}.h-full{height:100%}.w-full{width:100%}.max-w-4xl{max-width:56rem}.items-center{align-items:center}.justify-between{justify-content:space-between}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.gap-4{gap:calc(var(--spacing)*4)}.gap-6{gap:calc(var(--spacing)*6)}.rounded-lg{border-radius:var(--radius-lg)}.rounded-full{border-radius:9999px}.border{border-width:1px}.bg-white{background-color:#fff}.bg-black{background-color:#000}.p-6{padding:calc(var(--spacing)*6)}.px-5{padding-inline:calc(var(--spacing)*5)}.py-2{padding-block:calc(var(--spacing)*2)}.py-6{padding-block:calc(var(--spacing)*6)}.text-center{text-align:center}.text-sm{font-size:.875rem}.text-xl{font-size:1.25rem}.font-bold{font-weight:700}.font-medium{font-weight:500}.text-white{color:#fff}.text-black{color:#000}.text-gray-500{color:oklch(.556 .025 256.8)}.text-gray-600{color:oklch(.446 .03 256.802)}.text-gray-800{color:oklch(.27 .03 256.8)}.text-red-500{color:oklch(.627 .265 30.347)}.text-blue-500{color:oklch(.623 .214 259.815)}.hover\:bg-gray-100:hover{background-color:oklch(.967 .001 286.375)}.dark\:bg-black{background-color:#000}.dark\:bg-zinc-800{background-color:var(--color-zinc-800)}.dark\:bg-zinc-900{background-color:var(--color-zinc-900)}.dark\:text-white{color:#fff}.dark\:text-gray-300{color:oklch(.87 .01 256.8)}.dark\:text-gray-400{color:oklch(.7 .02 256.8)}.dark\:text-gray-500{color:oklch(.556 .025 256.8)}.dark\:border-zinc-700{border-color:var(--color-zinc-700)}.min-h-screen{min-height:100vh}.shadow-sm{box-shadow:0 1px 2px 0 rgb(0 0 0 / 0.05)}.transition{transition-property:all;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}}
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col font-sans antialiased">
        <header class="w-full flex justify-end p-6">
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 text-sm font-medium border border-transparent rounded-full hover:bg-gray-100 dark:hover:bg-white/10 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-medium border border-transparent rounded-full hover:bg-gray-100 dark:hover:bg-white/10 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-medium text-white bg-black dark:bg-white dark:text-black rounded-full hover:opacity-80 transition">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="flex-grow flex flex-col items-center justify-start pt-10 px-6 w-full">
            <div class="w-full max-w-4xl space-y-8">
                <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-lg p-6 shadow-sm">
                    <h2 class="text-xl font-bold mb-4">NEW WAYPOINT</h2>
                    <div class="grid gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Location Name</label>
                            <div class="w-full h-10 border border-gray-300 dark:border-zinc-700 rounded-md bg-gray-50 dark:bg-zinc-800"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Coordinates (X, Y, Z)</label>
                            <div class="w-full h-10 border border-gray-300 dark:border-zinc-700 rounded-md bg-gray-50 dark:bg-zinc-800 flex items-center px-3 text-sm text-gray-400">
                                Format: number, number, number
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Description (Optional)</label>
                            <div class="w-full h-20 border border-gray-300 dark:border-zinc-700 rounded-md bg-gray-50 dark:bg-zinc-800"></div>
                        </div>
                        <div class="flex justify-end">
                            <button class="bg-black dark:bg-white text-white dark:text-black font-bold py-2 px-6 rounded-full text-sm">SAVE WAYPOINT</button>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-lg p-6 shadow-sm flex flex-col gap-2">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold">f</h3>
                                <p class="text-sm font-mono text-gray-500 dark:text-gray-400 mt-1">X:234&nbsp;&nbsp;Y:2344&nbsp;&nbsp;Z:23</p>
                            </div>
                            <div class="flex gap-3 text-sm font-bold">
                                <span class="text-blue-500 cursor-not-allowed">EDIT</span>
                                <span class="text-red-500 cursor-not-allowed">DESTROY</span>
                            </div>
                        </div>
                        <p class="text-gray-800 dark:text-gray-300">sfda</p>
                    </div>

                    <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-lg p-6 shadow-sm flex flex-col gap-2">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold">derp</h3>
                                <p class="text-sm font-mono text-gray-500 dark:text-gray-400 mt-1">X:12&nbsp;&nbsp;Y:3&nbsp;&nbsp;Z:89</p>
                            </div>
                            <div class="flex gap-3 text-sm font-bold">
                                <span class="text-blue-500 cursor-not-allowed">EDIT</span>
                                <span class="text-red-500 cursor-not-allowed">DESTROY</span>
                            </div>
                        </div>
                        <p class="text-gray-800 dark:text-gray-300">emterpy</p>
                    </div>

                    <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-lg p-6 shadow-sm flex flex-col gap-2">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold">story time</h3>
                                <p class="text-sm font-mono text-gray-500 dark:text-gray-400 mt-1">X:0&nbsp;&nbsp;Y:0&nbsp;&nbsp;Z:0</p>
                            </div>
                            <div class="flex gap-3 text-sm font-bold">
                                <span class="text-blue-500 cursor-not-allowed">EDIT</span>
                                <span class="text-red-500 cursor-not-allowed">DESTROY</span>
                            </div>
                        </div>
                        <p class="text-gray-800 dark:text-gray-300">
                            judulanya adalah ketika aku ingin menjalankan project ku , tiba tiba aku mendengar ada sesuatu yang mengajariku dalam diam, namun aku mengabaikannya sesaat karena aku sangat lelah sekali sampai aku tidak peduli apa yang terjadi
                        </p>
                    </div>

                    <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-lg p-6 shadow-sm flex flex-col gap-2">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold">tempat jauh di dalam sana</h3>
                                <p class="text-sm font-mono text-gray-500 dark:text-gray-400 mt-1">X:0&nbsp;&nbsp;Y:0&nbsp;&nbsp;Z:0</p>
                            </div>
                            <div class="flex gap-3 text-sm font-bold">
                                <span class="text-blue-500 cursor-not-allowed">EDIT</span>
                            </div>
                        </div>
                        <p class="text-gray-800 dark:text-gray-300">
                            suatu tempat di mana semua berakhir jelas, dan saat mereka mencoba memiliknya, semua tampak akan sirna.
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <footer class="py-6 text-center text-sm text-gray-500 dark:text-gray-500">
            &copy; {{ date('Y') }} Terpy. Built with Laravel 12.
        </footer>
    </body>
</html>