<x-site-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative pt-8 py-4 sm:px-6 lg:px-8">
            <div class="text-lg prose prose-slate dark:prose-invert">
                <h1>
                    <span class="mt-2 block text-3xl leading-8 font-extrabold tracking-tight sm:text-4xl">
                        Who the heck am I?
                    </span>
                </h1>
                <p class="mt-8 text-xl leading-8">
                    👋 Hey there, I'm Steve, but you may know me better as
                    <x-external-link title="Check out my twitter profile" href="https://twitter.com/JustSteveKing">
                        @JustSteveKing
                    </x-external-link>
                    . I currently live in the Welsh Valleys, about 40 minutes outside of Cardiff.
                </p>

                <p class="mt-8 text-xl leading-8">
                    I am the Engineering Manager for
                    <x-external-link title="Check out some awesome classic cars" href="https://www.carandclassic.com/">
                        Car &amp; Classic
                    </x-external-link>
                    the world's largest classic vehicle marketplace. I spend a lot of my time helping train and mentor
                    other developers with their careers and development, and help plan technical strategy for out
                    engineering department.
                </p>

                <p class="mt-8 text-xl leading-8">
                    I also spend some time moonlighting as a consultant CTO, and freelance software engineer for various
                    clients from around the world. As a consultant CTO I have been involved in some major Digital
                    Transformation projects, API consulting, open source consulting, advising companies on strategy and
                    preparing product companies for acquisition.
                </p>

                <p class="mt-8 text-xl leading-8">
                    When I am not writing code, or advising anyone, I spend a lot of my spare time with my family,
                    cooking, and contributing to open source and the community in many different ways.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
        <div class="mt-6 pt-10 grid gap-16 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">

            <article class="p-8 shadow group block hover:scale-[1.025] transition-transform duration-150 ease-in-out">

                <!-- Header -->
                <header class="flex font-light text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2"  viewBox="0 0 24 24" stroke="#b91c1c">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    <p>TECH BLOG</p>
                </header>

                <!-- Title -->
                <h2 class="font-bold text-3xl mt-2">
                    Post Title
                </h2>

                <!-- Tags -->
                <p class="mt-5">By: <a href="#" class="text-red-600">Author Name</a>.</p>

                <!-- Description -->
                <h3 class="font-bold text-xl mt-8"> Intro </h3>
                <p class="font-light">
                    Post Summary
                </p>

                <!-- Button -->
                <button class="bg-red-600 text-white font-semibold py-2 px-5 text-sm mt-6 inline-flex items-center group">
                    <p> READ MORE </p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-2 delay-100 duration-200 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

            </article>

        </div>
    </section>
</x-site-layout>
