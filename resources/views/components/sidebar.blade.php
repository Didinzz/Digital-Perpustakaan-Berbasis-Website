<aside id="navbar-dropdown"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0  w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width hidden"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    <li>
                        <a href="{{ route('dashboard.index') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-200 group dark:text-gray-200 dark:hover:bg-gray-700 @yield('dashboard', 'active-class-here')">
                            <i class="fa-solid fa-chart-pie"></i> <!-- Ikon Dashboard Baru -->
                            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                        </a>
                    </li>
                    <li class="relative group">
                        <button id="dropdownSidebarButton"
                            class="flex items-center p-2 {{ Request::is('dashboard/buku*') || Request::is('dashboard/kategori*') || Request::is('dashboard/List-Buku-Saya*') ? 'bg-gray-200 dark:bg-gray-700' : '' }} text-base text-gray-900 rounded-lg hover:bg-gray-200 group dark:text-gray-200 dark:hover:bg-gray-700 w-full">
                            <i class="fa-solid fa-gear transition-transform duration-300 " id="girIcon"></i>
                            <span class="ml-3" sidebar-toggle-item>Master Action</span>
                            <svg class="w-4 h-4 ml-auto -mr-2 transition-transform duration-300 {{ Request::is('dashboard/buku*') || Request::is('dashboard/kategori*') || Request::is('dashboard/List-Buku-Saya*') ? 'rotate-180' : '' }}"
                                id="dropdownSidebarIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <ul class=" group-hover:block pl-6 mt-2 space-y-2  {{ Request::is('dashboard/buku*') || Request::is('dashboard/kategori*') || Request::is('dashboard/List-Buku-Saya*') ? 'block' : 'hidden' }} "
                            id="dropdownSidebarMenu">
                            <li>
                                <a href="{{ route('dashboard.buku.index') }}"
                                    class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 {{ Request::is('dashboard/buku*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                                    <i class="fa-solid fa-book mr-2"></i>
                                    Tabel Buku
                                </a>
                            </li>
                            @if (Auth::user()->role == 'admin')
                                <li>
                                    <a href="{{ route('dashboard.kategori.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 {{ Request::is('dashboard/kategori*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                                        <i class="fa-solid fa-tags mr-2"></i>
                                        Tabel Kategori
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->role == 'user')
                                <li>
                                    <a href="{{ route('dashboard.buku.user') }}"
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 {{ Request::is('dashboard/List-Buku-Saya*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                                        <i class="fa-solid fa-book-bookmark mr-2"></i>
                                        Lihat Buku Saya
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
</aside>
<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

<script>
    document.getElementById('dropdownSidebarButton').addEventListener('click', function() {
        const dropdownMenu = document.getElementById('dropdownSidebarMenu');
        const dropdwonIcon = document.getElementById('dropdownSidebarIcon');
        const girIcon = document.getElementById('girIcon');
        dropdownMenu.classList.toggle('hidden');
        dropdwonIcon.classList.toggle('rotate-180');
        girIcon.classList.toggle('rotate-180');
    });
</script>
