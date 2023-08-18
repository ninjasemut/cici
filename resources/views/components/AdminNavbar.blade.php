<header>
  <nav class="relative bg-gray-50 border-gray-200">
    <div class="flex flex-wrap justify-between items-center mx-auto px-6 py-4">
      <div class="items-center hidden md:flex py-2 px-3 bg-green-500 rounded-md">
        <img src="{{ asset('img/icon.png') }}" class="h-8 mr-3" alt="Logo" />
        <span class="self-center text-xl text-gray-50 font-bold whitespace-nowrap">Ruangan</span>
      </div>
      <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
        aria-controls="default-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
          </path>
        </svg>
        <span class="font-semibold text-lg ml-3">Ruangan</span>
      </button>
      <div class="flex items-center">
        <button id="dropdownUser" data-dropdown-toggle="dropdown"
          class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
          type="button">
          <i class="fa-solid fa-user"></i>
          <span class="mx-2.5">Admin</span>
          <i class="fa-solid fa-chevron-down"></i></button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
          <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownUser">
            <li>
              <a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <aside id="default-sidebar"
    class="absolute md:top-24 top-0 left-0 z-40 w-64 max-h-screen h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-5 py-4 overflow-y-auto bg-gray-50">
      <ul class="space-y-2 font-medium">
        <li>
          <a href="/admin/home"
            class="p-3 flex items-center rounded-lg group {{ request()->is('admin/home') ? 'bg-green-600 font-semibold text-gray-50' : 'text-gray-900 hover:bg-green-600 hover:font-semibold hover:text-gray-50' }}">
            <i
              class="{{ request()->is('admin/home') ? 'text-gray-50' : 'text-gray-500' }} fa-solid fa-house flex-shrink-0 text-lg transition duration-75 group-hover:text-gray-50"></i>
            <span class="flex-1 ml-3 whitespace-nowrap">Beranda</span>
          </a>
        </li>
        <li>
          <a href="/admin/room"
            class="p-3 flex items-center rounded-lg group {{ request()->is('admin/room*') ? 'bg-green-600 font-semibold text-gray-50' : 'text-gray-900 hover:bg-green-600 hover:font-semibold hover:text-gray-50' }}">
            <i
              class="{{ request()->is('admin/room*') ? 'text-gray-50' : 'text-gray-500' }} fa-solid fa-door-open flex-shrink-0 text-lg transition duration-75 group-hover:text-gray-50"></i>
            <span class="flex-1 ml-3 whitespace-nowrap">Ruangan</span>
          </a>
        </li>
        <li>
          <a href="booking"
            class="p-3 flex items-center rounded-lg group {{ request()->is('admin/booking*') ? 'bg-green-600 font-semibold text-gray-50' : 'text-gray-900 hover:bg-green-600 hover:font-semibold hover:text-gray-50' }}">
            <i
              class="{{ request()->is('admin/booking*') ? 'text-gray-50' : 'text-gray-500' }} fa-solid fa-clipboard-list flex-shrink-0 text-lg transition duration-75 group-hover:text-gray-50"></i>
            <span class="flex-1 ml-3 whitespace-nowrap">Booking</span>
          </a>
        </li>
        <li>
          <a href="makanan"
            class="p-3 flex items-center rounded-lg group {{ request()->is('admin/makanan*') ? 'bg-green-600 font-semibold text-gray-50' : 'text-gray-900 hover:bg-green-600 hover:font-semibold hover:text-gray-50' }}">
            <i
              class="{{ request()->is('admin/makanan*') ? 'text-gray-50' : 'text-gray-500' }} fa-solid fa-utensils flex-shrink-0 text-lg transition duration-75 group-hover:text-gray-50"></i>
            <span class="flex-1 ml-3 whitespace-nowrap">Makanan / Minuman</span>
          </a>
        </li>
        {{-- <li>
          <a href="/admin/report"
            class="p-3 flex items-center rounded-lg group {{ request()->is('admin/report*') ? 'bg-green-600 font-semibold text-gray-50' : 'text-gray-900 hover:bg-green-600 hover:font-semibold hover:text-gray-50' }}">
            <i
              class="{{ request()->is('admin/report*') ? 'text-gray-50' : 'text-gray-500' }} fa-solid fa-clipboard-list flex-shrink-0 text-lg transition duration-75 group-hover:text-gray-50"></i>
            <span class="flex-1 ml-3 whitespace-nowrap">Report</span>
          </a>
        </li> --}}
      </ul>
    </div>
  </aside>
</header>
