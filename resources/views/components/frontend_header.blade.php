<header class="w-full bg-[#0004] fixed  top-0 shadow z-20 flex justify-between items-center h-[5rem] px-[2rem]">
    <a href="/" class="text-4xl font-semibold whitespace-nowrap flex items-center"> <img
            src="{{ asset('logo.svg') }}" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" /> Barber Shop</a>
    <nav class="flex items-center justify-end w-full gap-x-20 relative">
        <ul class="flex items-center  gap-x-6">
            <li class="relative">
                <a href="/" class="peer">Home</a>
                <div
                    class="h-[3px] w-0 {{request()->is('/') ? 'bg-gray-50 w-full' : ''}} peer-hover:bg-gray-5  absolute peer-hover:bg-gray-50 peer-hover:w-full transition-all ease-in-out duration-700">
                </div>
            </li>
            <li class="relative">
                <a href="/services" class="peer">Services</a>
                <div
                    class="h-[3px] w-0  absolute {{request()->is('services') ? 'bg-gray-50 w-full' : ''}}    peer-hover:bg-gray-50 peer-hover:w-full transition-all ease-in-out duration-700">
                </div>
            </li>
            {{--     <li class="relative">
                    <a href="" class="peer">Reservation</a>
                    <div class="h-[3px] w-0  absolute peer-hover:bg-gray-50 peer-hover:w-full transition-all ease-in-out duration-700"></div>
                </li> --}}
            <li class="relative">
                <a href="/about" class="peer">About</a>
                <div
                    class="h-[3px] w-0 {{request()->is('about') ? 'bg-gray-50 w-full' : ''}}  absolute peer-hover:bg-gray-50 peer-hover:w-full transition-all ease-in-out duration-700">
                </div>
            </li>
            <li class="relative">
                <a href="/contact" class="peer">Contact Us</a>
                <div
                    class="h-[3px] w-0 {{request()->is('contact') ? 'bg-gray-50 w-full' : ''}} absolute peer-hover:bg-gray-50 peer-hover:w-full transition-all ease-in-out duration-700">
                </div>
            </li>

        </ul>


        @if (Auth::check())
            <div class="relative">
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                    class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 relative"
                    type="button">
                    <span class="sr-only">Open user menu</span>
                    @if(!!Auth::user()->profile)
                    <img class="w-8 h-8 rounded-full" src="{{ asset(Auth::user()->profile) }}" alt="user photo">
                    @else
                     <img class="w-8 h-8 rounded-full" src="{{ 'https://eu.ui-avatars.com/api/?name='.Auth::user()->firstname.'+'.Auth::user()->lastname }}" alt="user photo">
                    @endif
                    
                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar"
                        class="z-10 hidden bg-white divide-y divide-gray-100 absolute top-10 left-auto right-0 w-44 rounded-lg shadow  dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</div>
                            {{-- <div class="font-medium truncate">{{ Auth::user()->email}}</div> --}}
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <a href="/account"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account</a>
                            </li>
                            <li>
                                <a href="/appointment"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Appointment
                                    History</a>
                            </li>

                        </ul>
                        <div class="py-2">
                            <a type="button" onclick="window.location.href = '/auth/logout'"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </div>
                    </div>
                </button>


            </div>
        @else
            <div>
                <a href="/auth/login" class="bg-blue-500 px-5 py-2 rounded mr-6">Login</a>
                {{-- <a href="/auth/login" class="bg-orange-500 px-5 py-2 rounded">Book now</a> --}}
            </div>
        @endif
    </nav>
</header>
