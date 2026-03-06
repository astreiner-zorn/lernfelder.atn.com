<nav class="bg-orange-500 text-white sticky lg:p-10 top-0 z-50">
  <div class="mx-auto max-w-6xl px-4 sm:px-6">
    <div class="flex items-center justify-between py-3">
      <a href="index.php?page=index" class="font-semibold">Nomade & Nigiri</a>

      <!-- Burger -->
      <details class="lg:hidden relative">
        <summary class="list-none cursor-pointer p-2 -m-2 rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-white/60">
          ☰
        </summary>
        <div class="absolute right-0 mt-2 w-56 rounded-md bg-white text-gray-900 shadow-lg">
          <a href="index.php?page=index" class="block px-4 py-2 hover:bg-gray-100">Startseite</a>

            <!-- Mobile Dropdown -->
            <details>
            <summary class="px-4 py-2 cursor-pointer hover:bg-gray-100">Über uns</summary>
                <div class="border-t">
                <a href="index.php?page=portfolio" class="block px-4 py-2 hover:bg-gray-100">Portfolio</a>
                <a href="index.php?page=blog" class="block px-4 py-2 hover:bg-gray-100">Blog</a>
                <a href="index.php?page=about" class="block px-4 py-2 hover:bg-gray-100">Das sind wir</a>
                </div>
            </details>

          <a href="index.php?page=restaurant" class="block px-4 py-2 hover:bg-gray-100">Unser Restaurant</a>
          <a href="index.php?page=speisekarte" class="block px-4 py-2 hover:bg-gray-100">Speisekarte</a>
          <a href="index.php?page=tischreservierung" class="block px-4 py-2 hover:bg-gray-100">Tischreservierung</a>
        </div>
      </details>

      <!-- Desktop-Menü -->
      <ul class="hidden lg:flex items-center gap-8">
        <li><a href="index.php?page=index" class="hover:underline">Startseite</a></li>
        <li class="relative group">
          <button class="inline-flex items-center gap-2 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-white/60">
            Über uns
            <svg class="size-4" viewBox="0 0 20 20" fill="currentColor"><path d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.24a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08z"/></svg>
          </button>
          <div class="absolute left-0 mt-2 hidden min-w-48 rounded-md bg-white text-gray-900 shadow-lg group-hover:block group-focus-within:block">
            <a href="index.php?page=portfolio" class="block px-4 py-2 hover:bg-gray-100">Portfolio</a>
            <a href="index.php?page=blog" class="block px-4 py-2 hover:bg-gray-100">Blog</a>
            <a href="index.php?page=about" class="block px-4 py-2 hover:bg-gray-100">Das sind wir</a>
          </div>
        </li>
        <li><a href="index.php?page=restaurant" class="hover:underline">Unser Restaurant</a></li>
        <li><a href="index.php?page=speisekarte" class="hover:underline">Speisekarte</a></li>
        <li><a href="index.php?page=tischreservierung" class="hover:underline">Tischreservierung</a></li>
      </ul>
    </div>
  </div>
</nav>