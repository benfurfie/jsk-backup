<div
    class="relative bg-slate-50 dark:bg-slate-800"
    x-data="{ open: false }"
    @keydown.escape="open = false"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div
            class="flex justify-between items-center border-b-2 border-slate-200 dark:border-slate-600 py-6 md:justify-start md:space-x-10"
        >
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="{{ route('pages:home') }}">
                    <span class="sr-only">JustSteveKing</span>
                    <svg
                        viewBox="0 0 804 455"
                        class="h-8 w-auto sm:h-10 fill-current text-slate-800 dark:text-slate-50"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M394.48 455c126.901 0 229.774-101.855 229.774-227.5S521.381 0 394.48 0c-126.9 0-229.774 101.855-229.774 227.5S267.58 455 394.48 455Zm2.298-318.5c-38.973 94.445-69.859 132.599-140.162 26v133.25c109.478 19.459 170.846 19.15 280.324 0V162.5c-60.35 87.195-88.394 92.237-140.162-26Z"
                        />
                        <path
                            d="m28.4511 377.945 153.4149 11.579 8.269 23.434-183.769-17.95L0 376.968l134.088-122.84 8.269 23.434L28.4511 377.945ZM775.549 114.428l-153.415-11.579-8.269-23.434 183.769 17.9501L804 115.405l-134.088 122.84-8.269-23.434 113.906-100.383Z"
                        />
                    </svg>
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button
                    type="button"
                    class="bg-slate-50 dark:bg-slate-800 rounded-md p-2 inline-flex items-center justify-center text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    @click="open = true"
                    aria-expanded="false"
                    :aria-expanded="open.toString()"
                >
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <nav itemscope itemtype="https://schema.org/SiteNavigationElement" class="hidden md:flex space-x-10">

                <a itemprop="name" role="menuitem" href="{{ route('pages:posts:list') }}" title="View all articles" class="text-base font-medium text-slate-800 hover:text-slate-400 hover:underline dark:text-slate-50 dark:hover:text-slate-400">
                    Posts
                </a>
                <a itemprop="name" role="menuitem" href="{{ route('pages:uses') }}" title="View what Software and Hardware I use" class="text-base font-medium text-slate-800 hover:text-slate-400 hover:underline dark:text-slate-50 dark:hover:text-slate-400">
                    Uses
                </a>
                <a itemprop="name" role="menuitem" href="{{ route('pages:youtube:list') }}" title="View my YouTube content" class="text-base font-medium text-slate-800 hover:text-slate-400 hover:underline dark:text-slate-50 dark:hover:text-slate-400">
                    YouTube
                </a>
                <a itemprop="name" role="menuitem" href="{{ route('pages:packages:list') }}" title="View my Open Source Packages" class="text-base font-medium text-slate-800 hover:text-slate-400 hover:underline dark:text-slate-50 dark:hover:text-slate-400">
                    Packages
                </a>

            </nav>
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0"></div>
        </div>
    </div>


    <div
        x-show="open"
        x-transition:enter="duration-200 ease-out"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-10"
        x-ref="panel"
        @click.away="open = false"
        style="display: none;"
    >
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-slate-100 dark:bg-slate-900 divide-y-2 divide-slate-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div>
                        <svg
                            viewBox="0 0 804 455"
                            class="h-8 w-auto fill-current text-slate-800 dark:text-slate-50"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M394.48 455c126.901 0 229.774-101.855 229.774-227.5S521.381 0 394.48 0c-126.9 0-229.774 101.855-229.774 227.5S267.58 455 394.48 455Zm2.298-318.5c-38.973 94.445-69.859 132.599-140.162 26v133.25c109.478 19.459 170.846 19.15 280.324 0V162.5c-60.35 87.195-88.394 92.237-140.162-26Z"
                            />
                            <path
                                d="m28.4511 377.945 153.4149 11.579 8.269 23.434-183.769-17.95L0 376.968l134.088-122.84 8.269 23.434L28.4511 377.945ZM775.549 114.428l-153.415-11.579-8.269-23.434 183.769 17.9501L804 115.405l-134.088 122.84-8.269-23.434 113.906-100.383Z"
                            />
                        </svg>
                    </div>
                    <div class="-mr-2">
                        <button
                            type="button"
                            class="bg-slate-50 dark:bg-slate-800 rounded-md p-2 inline-flex items-center justify-center text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            @click="open = false"
                        >
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav itemscope itemtype="https://schema.org/SiteNavigationElement" class="grid gap-y-8">

                        <a itemprop="name" role="menuitem" title="Link Title" href="{{ route('pages:posts:list') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-slate-300 dark:hover:bg-slate-600">
                            <span class="text-base font-medium text-gray-800 dark:text-gray-50">
                                Articles
                            </span>
                        </a>

                        <a itemprop="name" role="menuitem" title="Link Title" href="{{ route('pages:uses') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-slate-300 dark:hover:bg-slate-600">
                            <span class="text-base font-medium text-gray-800 dark:text-gray-50">
                                Uses
                            </span>
                        </a>

                        <a itemprop="name" role="menuitem" title="Link Title" href="{{ route('pages:youtube:list') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-slate-300 dark:hover:bg-slate-600">
                            <span class="text-base font-medium text-gray-800 dark:text-gray-50">
                                YouTube
                            </span>
                        </a>

                        <a itemprop="name" role="menuitem" title="Link Title" href="{{ route('pages:packages:list') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-slate-300 dark:hover:bg-slate-600">
                            <span class="text-base font-medium text-slate-800 dark:text-slate-50">
                                Packages
                            </span>
                        </a>


                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>
