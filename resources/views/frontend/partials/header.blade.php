  <header>
      <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
          <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-1 mx-4">
              <a href="#" class="flex items-center">
                  <img src="{{ asset('assets/images/kos-fav.png') }}" class="h-6 mr-3 sm:h-9" alt="Logo">
                  <span class="text-black text-3xl mt-0">KANTIPUR OVERSEAS PVT LTD.</span>
              </a>
              <div class="flex items-center lg:order-2">
                  <div class="hidden mt-2 mr-4 sm:inline-block">
                      <span></span>
                  </div>

                  <a href="{{ route('login') }}"
                      class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Login</a>
                  <button data-collapse-toggle="mobile-menu-2" type="button"
                      class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                      aria-controls="mobile-menu-2" aria-expanded="true">
                      <span class="sr-only">Open main menu</span>
                      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                              clip-rule="evenodd"></path>
                      </svg>
                      <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                      </svg>
                  </button>
              </div>
              <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                  <ul class="flex flex-col mt-4 font-semi-bold lg:flex-row lg:space-x-8 lg:mt-0">
                      <li>
                          <a href="{{ request()->is('/') ? '#' : url('/') }}"
                              class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0 dark:text-white"
                              aria-current="page">Home</a>
                      </li>
                      <li>
                          <div class="dropdown block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0"
                              data-dropdown="true" data-dropdown-trigger="click">
                              <a href="#"
                                  class="dropdown-toggle text-gray-700 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                  About Us
                                  <i class="ki-outline ki-down dropdown-open:hidden">
                                  </i>
                                  <i class="ki-outline ki-up hidden dropdown-open:block">
                                  </i>
                              </a>
                              <div class="dropdown-content w-full max-w-56 p-4">
                                  <div>
                                      <a href="/company_overview"
                                          class="block py-2 pl-3 pr-4 cursor-pointer text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Company
                                          Profile</a>
                                  </div>
                                  <div>
                                      <a href="{{ request()->is('/') ? '#chairman' : url('/') . '#chairman' }}"
                                          class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Message
                                          From Chairman</a>
                                  </div>
                                  <div>
                                      <a href="{{ route('our.team') }}"
                                          class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Our
                                          Team</a>
                                  </div>
                                  <div>
                                      <a href="{{ route('company.license') }}"
                                          class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">License
                                          & Certificates</a>
                                  </div>
                              </div>
                          </div>
                          {{-- <a href="#"
                              class="">Services</a> --}}
                      </li>
                      <li>
                          <a href="{{ request()->is('/') ? '#requirement' : url('/') . '#requirement' }}"
                              class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Job Requirement
                              </a>
                      </li>
                      <li>
                          <a href="{{ route('why.nepal') }}"
                              class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About
                              Nepal</a>
                      </li>
                      <li>
                          <a href="{{ request()->is('/') ? '#demands' : url('/') . '#demands' }}"
                              class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Demands</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
  </header>
