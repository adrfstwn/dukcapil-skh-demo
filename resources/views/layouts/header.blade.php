  <!-- start header section -->
  <header class="drop-shadow-lg z-20">
      <div class="w-full text-gray-700 bg-white ">
          <div x-data="{ open: false }"
              class="flex flex-col max-w-screen-2xl mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8 z-20">
              <div class="p-4 flex flex-row items-center justify-between">
                  <a href="#">
                      <img src="dist/assets/image/logo-Dispendukcapil.png" alt="logo disdukcapil skh" class="w-36 md:w-60">
                  </a>
                  <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                      <svg fill="black" viewBox="0 0 20 20" class="size-7">
                          <path x-show="!open" fill-rule="evenodd"
                              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                              clip-rule="evenodd"></path>
                          <path x-show="open" fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                      </svg>
                  </button>
              </div>
              <nav :class="{ 'flex': open, 'hidden': !open }"
                  class="flex-col items-center flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row z-20">
                  <a class="px-2 py-2 mt-2 text-sm font-bold font-nunito  rounded-lg  md:mt-0 md:ml-3 style-menu-navbar focus:outline-none focus:shadow-outline"
                      href="/">BERANDA</a>
                  <!-- Profile Menu -->
                  <div @click.away="open = false" class="relative z-20" x-data="{ open: false }">
                      <button @click="open = !open"
                          class="flex flex-row items-center w-full px-2 py-2 mt-2 text-sm font-bold text-left bg-transparent rounded-lg  style-menu-navbar md:w-auto md:inline md:mt-0 md:ml-3 focus:outline-none focus:shadow-outline z-20">
                          <span>PROFIL</span>
                          <svg fill="currentColor" viewBox="0 0 20 20"
                              :class="{ 'rotate-180': open, 'rotate-0': !open }"
                              class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                              <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                          </svg>
                      </button>
                      <div x-show="open" x-transition:enter="transition ease-out duration-100"
                          x-transition:enter-start="transform opacity-0 scale-95"
                          x-transition:enter-end="transform opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-75"
                          x-transition:leave-start="transform opacity-100 scale-100"
                          x-transition:leave-end="transform opacity-0 scale-95"
                          class="absolute z-20 right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                          <div class="px-2 py-2 bg-background_light rounded-md shadow ">
                              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                  href="profile">PROFIL</a>
                              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                  href="tupoksi">TUPOKSI, VISI & MISI</a>
                              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                  href="struktur-organisasi">STRUKTUR ORGANISASI</a>
                              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                  href="kontak">KONTAK</a>
                          </div>
                      </div>
                  </div>


                  @foreach ($menu as $menu)
                      @if ($menu->kontenMenus && $menu->kontenMenus->isNotEmpty())
                          <!-- Menu with content directly links to content -->
                          <a href="{{ route('konten.showByMenu', ['menu_id' => $menu->id]) }}"
                              class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                              {{ $menu->nama_menu }}
                          </a>
                      @elseif ($menu->url)
                          <!-- Menu with URL redirects to external link -->
                          <a href="{{ $menu->url }}"
                              class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                              {{ $menu->nama_menu }}
                          </a>
                      @elseif (isset($allSubmenus[$menu->id]) && count($allSubmenus[$menu->id]) > 0)
                          <!-- Menu with submenus opens dropdown -->
                          <div @click.away="open{{ $menu->id }} = false" class="relative"
                              x-data="{ open{{ $menu->id }}: false }">
                              <button @click="open{{ $menu->id }} = !open{{ $menu->id }}"
                                  class="flex flex-row items-center w-full px-2 py-2 mt-2 text-sm font-bold text-left bg-transparent rounded-lg style-menu-navbar md:w-auto md:inline md:mt-0 md:ml-3 focus:outline-none focus:shadow-outline">
                                  <span>{{ $menu->nama_menu }}</span>
                                  <svg fill="currentColor" viewBox="0 0 20 20"
                                      :class="{
                                          'rotate-180': open{{ $menu->id }},
                                          'rotate-0': !
                                              open{{ $menu->id }}
                                      }"
                                      class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                      <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                  </svg>
                              </button>
                              <div x-show="open{{ $menu->id }}"
                                  x-transition:enter="transition ease-out duration-100"
                                  x-transition:enter-start="transform opacity-0 scale-95"
                                  x-transition:enter-end="transform opacity-100 scale-100"
                                  x-transition:leave="transition ease-in duration-75"
                                  x-transition:leave-start="transform opacity-100 scale-100"
                                  x-transition:leave-end="transform opacity-0 scale-95"
                                  class="absolute z-10 right-0 mt-2 w-full origin-top-left rounded-md shadow-lg md:w-48">
                                  <div class="px-2 py-2 bg-background_light rounded-md shadow ">
                                    @foreach ($allSubmenus[$menu->id] as $submenu)
                        <div class="relative">
                            @if ($submenu->kontenSubMenus && $submenu->kontenSubMenus->isNotEmpty())
                                <a href="{{ route('konten.showBySubmenu', ['submenu_id' => $submenu->id]) }}"
                                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                    {{ $submenu->nama_submenu }}
                                </a>
                            @elseif ($submenu->url)
                                <a href="{{ $submenu->url }}"
                                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                    {{ $submenu->nama_submenu }}
                                </a>
                            @else
                                <!-- Empty submenu item -->
                                <span
                                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                    {{ $submenu->nama_submenu }}
                                </span>
                            @endif
                        </div>
                    @endforeach
                                  </div>
                              </div>
                          </div>
                      @else
                          <!-- Menu with neither content nor submenus -->
                          <a href="#"
                              class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                              {{ $menu->nama_menu }}
                          </a>
                      @endif
                  @endforeach
                  <a class="px-2 py-2 mt-2 text-sm font-bold font-nunito  rounded-lg  md:mt-0 md:ml-3 style-menu-navbar focus:outline-none focus:shadow-outline"
                      href="persyaratan">PERSYARATAN</a>
                  <a class="px-2 py-2 mt-2 text-sm font-bold font-nunito  rounded-lg  md:mt-0 md:ml-3 style-menu-navbar focus:outline-none focus:shadow-outline"
                      href="{{ route('download.tampil') }}">DOWNLOAD</a>
              </nav>
          </div>
      </div>
  </header>
  <!-- end header section -->
