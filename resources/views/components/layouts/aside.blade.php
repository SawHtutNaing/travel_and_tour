  <!-- Sidebar -->
  <aside class="fixed inset-y-0 z-50 flex flex-col transition-transform duration-300 w-72
  lg:translate-x-0
  "
      id="sidebar">
      <div
          class="flex flex-col flex-1 min-h-0 bg-white border-r dark:bg-slate-800 border-slate-200 dark:border-slate-700">
          <!-- Sidebar Header -->
          <div class="flex items-center justify-between h-16 px-4 border-b border-slate-200 dark:border-slate-700">
              <a href="#" class="flex items-center gap-2">
                  <span
                      class="text-2xl font-bold text-transparent bg-gradient-to-r from-teal-500 to-blue-500 bg-clip-text">
                      TravelEase
                  </span>
              </a>
              <button onclick="toggleSidebar()"
                  class="p-2 rounded-lg  hover:bg-slate-100 dark:hover:bg-slate-700


              ">
                  <i class="fas fa-times"></i>
              </button>
          </div>

          <!-- Sidebar Navigation -->
          <nav class="flex-1 p-4 space-y-2 overflow-y-auto scrollbar-hide">
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg
               {{ request()->routeIs('dashboard') ? 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                <i class="w-6 fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('hotels') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg
               {{ request()->routeIs('hotels') ? 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                <i class="w-6 fas fa-suitcase"></i>
                <span>Hotels</span>
            </a>

            <a href="{{ route('trips_routes') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg
               {{ request()->routeIs('trips_routes') ? 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                <i class="w-6 fas fa-users"></i>
                <span>Trip Routes</span>
            </a>

            <a href="{{ route('admin.packages') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg
               {{ request()->routeIs('admin.packages') ? 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                <i class="w-6 fas fa-map-marked-alt"></i>
                <span>Packages</span>
            </a>


            <a href="{{ route('admin.vehicle-rent') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg
               {{ request()->routeIs('admin.vehicle-rent') ? 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                <i class="w-6 fas fa-map-marked-alt"></i>
                <span>Car Rent</span>
            </a>

            <a href="{{ route('admin.journey_routes') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg
               {{ request()->routeIs('admin.journey_routes') ? 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                <i class="w-6 fas fa-map-marked-alt"></i>
                <span>Journey Routes</span>
            </a>








        </nav>


          <!-- Sidebar Footer -->
          <div class="p-4 border-t border-slate-200 dark:border-slate-700">
              <div class="flex items-center gap-4">
                  <img src="https://ui-avatars.com/api/?name=Admin+User&background=0694a2&color=fff" alt="Admin User"
                      class="w-10 h-10 rounded-full">
                  <div class="flex-1">
                      <h4 class="text-sm font-semibold text-slate-900 dark:text-white">
                        {{ auth()->user()->name }}
                    </h4>
                      <p class="text-sm text-slate-500 dark:text-slate-400">
                        {{ auth()->user()->email }}

                      </p>
                  </div>
                  <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                  class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700">
                  <i class="fas fa-sign-out-alt text-slate-600 dark:text-slate-300"></i>
              </a>
              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                  @csrf
              </form>

                  {{-- <button onclick="toggleDarkMode()" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700">
                      <i class="fas fa-moon dark:hidden"></i>
                      <i class="hidden fas fa-sun dark:block text-slate-200"></i>
                  </button> --}}
              </div>
          </div>
      </div>
  </aside>
