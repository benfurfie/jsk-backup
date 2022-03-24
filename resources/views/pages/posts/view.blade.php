<x-site-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative pt-8 py-4 sm:px-6 lg:px-8">
            <article class="xl:divide-y xl:divide-gray-200">
                <header class="xl:pb-10">
                    <div class="space-y-2 text-left">
                        <dl class="space-y-10">
                            <div>
                                <dt class="sr-only">
                                    Published on
                                </dt>
                                <dd class="text-base leading-6 font-medium">
                                    <time itemprop="datePublished" content="2021-06-08" datetime="2021-06-08">
                                        Tuesday, 8th June 2021
                                    </time>
                                </dd>
                            </div>
                        </dl>
                        <div>
                            <h1 itemprop="name"
                                class="text-3xl leading-9 font-extrabold tracking-wider sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">
                                Introducing - Laravel Transporter
                            </h1>
                        </div>
                    </div>
                </header>

                <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:col-gap-6 pb-16 xl:pb-20"
                     style="grid-template-rows: auto 1fr;">
                    <dl class="pt-6 pb-10 xl:pt-11 xl:border-b xl:border-gray-200">
                        <dt class="sr-only">Authors</dt>
                        <dd>
                            <ul class="flex items-center justify-start xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
                                <li class="flex items-center space-x-2">
                                    <img src="https://www.juststeveking.uk/assets/images/avatar.webp" alt="Steve McDougall Avatar"
                                         class="object-fit object-center rounded-full h-12 w-12 md:h-14 md:w-14 lg:h-16 lg:w-16">
                                    <dl class="text-md tracking-wide font-medium leading-5 whitespace-no-wrap">
                                        <dt class="sr-only">Name</dt>
                                        <dd itemprop="publisher" class="text-lg tracking-wide">Steve McDougall</dd>
                                        <dt class="sr-only">Twitter</dt>
                                        <dd>
                                            <a href="https://twitter.com/JustSteveKing" target="__blank"
                                               rel="noopener nofollow" title="Follow Steve on twitter"
                                               class="text-md font-semibold text-transparent bg-clip-text bg-gradient-to-tr from-indigo-500 to-pink-600">
                                                @JustSteveKing
                                            </a>
                                        </dd>
                                    </dl>
                                </li>
                            </ul>
                        </dd>
                    </dl>

                    <div class="xl:pb-0 xl:col-span-3 xl:row-span-2">

                        <div
                            class="max-w-full prose prose-indigo prose-lg text-gray-800 dark:text-gray-50 pb-8 px-3">
                            <div itemprop="articleBody" class="whitespace-normal">
                                <p>Sending API requests in any PHP framework has always been a little bit of a manual
                                    process, yes you can create an SDK or wrapper - but you are still having to do the
                                    same thing.</p>

                                <p>You pull in the HTTP client, or facade, you configure it in a proceedural way
                                    entering the URI you want to send a request to, then tag on the optional extras such
                                    as authentication, payload, any additional headers. It is quite a manual
                                    process.</p>

                                <p>A lot of the time you have a specific request you want to send, yes you may slightly
                                    adjust things as you go by passing in an identifier etc etc - but in general they
                                    remain relatively constant.</p>

                                <p>This has frustrated me for a while, we have to great lengths to make a lot of our
                                    code Object Oriented. Yet, we hadn't tried to do this with API requests. I have been
                                    sitting on this question for quite a while, pondering on the possible solutions -
                                    how it might look, and how it might be used.</p>

                                <p>The result of this has turned into my latest Laravel package: <a
                                        href="https://github.com/JustSteveKing/laravel-transporter">Laravel
                                        Transporter</a> which I describe as:</p>

                                <blockquote class="text-slate-800 dark:text-slate-50">
                                    <p>Transporter is a futuristic way to send API requests in PHP. This is an OOP
                                        approach to handle API requests.</p>
                                </blockquote>

                                <p>Quite a bold statement, so let me dig in.</p>

                                <p>To get started all you need to do is install it, theres no configuration required
                                    nothing extra to add to your project - it will only be used when you want to use
                                    it.</p>

                                <p>Then, let's take an example API request:</p>

                                <pre><code class="language-http torchlight" style=""><div class="line">GET https://jsonplaceholder.typicode.com/todos?completed=true HTTP/1.1</div></code></pre>

                                <p>All we are doing here is filtering a list of todos that are completed - nothing
                                    overly difficult.</p>

                                <p>Firstly let us have a look at how we would do this usually (but let's pretend this
                                    API required us to be authenticated using an API token we have previously
                                    generated).</p>

                                <pre><code class="language-php torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">1</span><span
                                                style="color: #FFCB6B;">Http</span><span
                                                style="color: #89DDFF;">::</span><span
                                                style="color: #82AAFF;">withToken</span><span
                                                style="color: #89DDFF;">(</span><span
                                                style="color: #82AAFF;">config</span><span
                                                style="color: #89DDFF;">(</span><span
                                                style="color: #89DDFF;">'</span><span style="color: #C3E88D;">jsonplaceholder.api.token</span><span
                                                style="color: #89DDFF;">'</span><span style="color: #89DDFF;">))</span></div><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">2</span><span
                                                style="color: #89DDFF;">-&gt;</span><span
                                                style="color: #82AAFF;">get</span><span style="color: #89DDFF;">(</span><span
                                                style="color: #89DDFF;">"</span><span style="color: #C3E88D;">https://jsonplaceholder.typicode.com/todos</span><span
                                                style="color: #89DDFF;">"</span><span
                                                style="color: #89DDFF;">,</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">[</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">3</span><span
                                                style="color: #A6ACCD;">    </span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #C3E88D;">completed</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">=&gt;</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #C3E88D;">true</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #89DDFF;">,</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">4</span><span
                                                style="color: #89DDFF;">]);</span></div></code></pre>

                                <p>Not terrible right? I mean, it works and does what you might expect. But, this is
                                    very proceedural. What happens if the URL changes? What happens if the query
                                    parameters change? We have to hunt through our code base, and update these
                                    everywhere. You know, the thing we are trying to avoid more and more in everything
                                    we build.</p>

                                <p>Let's add a little magic to these requests and see how we would send this exact same
                                    request using Laravel Transporter:</p>

                                <pre><code class="language-php torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">1</span><span
                                                style="color: #FFCB6B;">TodoRequest</span><span style="color: #89DDFF;">::</span><span
                                                style="color: #82AAFF;">build</span><span style="color: #89DDFF;">()-&gt;</span><span
                                                style="color: #82AAFF;">send</span><span
                                                style="color: #89DDFF;">();</span></div></code></pre>

                                <p>That's it. The entire thing condensed into a class. Let's look how we got there.</p>

                                <p>First thing we do, create our request:</p>

                                <pre><code class="language-bash torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">1</span><span style="color: #A6ACCD;">php artisan make:api-request TodoRequest</span></div></code></pre>

                                <p>This gives us <code>app/Transporter/TodoRequest.php</code>, inside there we have:</p>

                                <pre><code class="language-php torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 1</span><span
                                                style="color: #89DDFF;">&lt;?</span><span
                                                style="color: #A6ACCD;">php</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 2</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 3</span><span
                                                style="color: #89DDFF;">declare</span><span
                                                style="color: #89DDFF;">(</span><span style="color: #A6ACCD;">strict_types</span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #F78C6C;">1</span><span style="color: #89DDFF;">);</span></div><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 4</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 5</span><span
                                                style="color: #F78C6C;">namespace</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #FFCB6B;">App</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #FFCB6B;">Transporter</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 6</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 7</span><span
                                                style="color: #F78C6C;">use</span><span style="color: #FFCB6B;"> </span><span
                                                style="color: #A6ACCD;">Illuminate</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Http</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Client</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #A6ACCD;">PendingRequest</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 8</span><span
                                                style="color: #F78C6C;">use</span><span style="color: #FFCB6B;"> </span><span
                                                style="color: #A6ACCD;">JustSteveKing</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #A6ACCD;">Transporter</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Request</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 9</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">10</span><span
                                                style="color: #C792EA;">class</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #FFCB6B;">TodoRequest</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">extends</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #FFCB6B;">Request</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">11</span><span
                                                style="color: #89DDFF;">{</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">12</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">string</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">method </span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">'</span><span style="color: #C3E88D;">GET</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">13</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">string</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">baseUrl </span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">'</span><span style="color: #C3E88D;">https://jsonplaceholder.typicode.com</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">14</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">string</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">path </span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #C3E88D;">/todos</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">15</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">16</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">array</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">data </span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">[</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">17</span><span
                                                style="color: #A6ACCD;">        </span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #C3E88D;">completed</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">=&gt;</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">true,</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">18</span><span
                                                style="color: #A6ACCD;">    </span><span
                                                style="color: #89DDFF;">];</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">19</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">20</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">function</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #82AAFF;">withRequest</span><span
                                                style="color: #89DDFF;">(</span><span style="color: #FFCB6B;">PendingRequest</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">request</span><span
                                                style="color: #89DDFF;">):</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #FFCB6B;">void</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">21</span><span
                                                style="color: #A6ACCD;">    </span><span
                                                style="color: #89DDFF;">{</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">22</span><span
                                                style="color: #A6ACCD;">        </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">request</span><span style="color: #89DDFF;">-&gt;</span><span
                                                style="color: #82AAFF;">withToken</span><span
                                                style="color: #89DDFF;">(</span><span
                                                style="color: #82AAFF;">config</span><span
                                                style="color: #89DDFF;">(</span><span
                                                style="color: #89DDFF;">'</span><span style="color: #C3E88D;">jsonplaceholder.api.token</span><span
                                                style="color: #89DDFF;">'</span><span style="color: #89DDFF;">));</span></div><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">23</span><span
                                                style="color: #A6ACCD;">    </span><span
                                                style="color: #89DDFF;">}</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">24</span><span
                                                style="color: #89DDFF;">}</span></div></code></pre>

                                <p>Going back to the original problem, if options change - we have to hunt everywhere in
                                    our application for where we may have used it. That problem has been solved by
                                    moving this to a class based request. Also, as the request itself is just a fancy
                                    wrapper around Laravels inbuilt <code>PendingRequest</code> - we can call all the
                                    same methods before and after sending. Meaning there is no new API to learn, so it
                                    is relatively straight forward. You can override options at runtime too - want to
                                    show not completed todos?</p>

                                <pre><code class="language-php torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">1</span><span
                                                style="color: #FFCB6B;">TodoRequest</span><span style="color: #89DDFF;">::</span><span
                                                style="color: #82AAFF;">build</span><span style="color: #89DDFF;">()-&gt;</span><span
                                                style="color: #82AAFF;">withData</span><span
                                                style="color: #89DDFF;">([</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">2</span><span
                                                style="color: #A6ACCD;">    </span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #C3E88D;">completed</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">=&gt;</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">false,</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">3</span><span style="color: #89DDFF;">])-&gt;</span><span
                                                style="color: #82AAFF;">send</span><span
                                                style="color: #89DDFF;">();</span></div></code></pre>

                                <p>This may not be a ground breaking package that is going to change the world, however
                                    what it is going to do is make you start asking the question: Could I send API
                                    requests in a more structured and organised way?</p>

                                <p>Imagine a scenario, where you needed to work with a 3rd party API. You could quite
                                    quickly generate a series of requests and it will be done! Let's take the example of
                                    Laravel Forge, which if you remember I wrote about before when I released PHP-SDK <a
                                        href="https://www.juststeveking.uk/adventures-in-php-php-sdk-builder/">here is
                                        that article</a>.</p>

                                <p>First we can generate a base API request:</p>

                                <pre><code class="language-bash torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">1</span><span style="color: #A6ACCD;">php artisan make:api-request Forge\\ForgeRequest</span></div></code></pre>

                                <p>Then make these changes:</p>

                                <pre><code class="language-php torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 1</span><span
                                                style="color: #89DDFF;">&lt;?</span><span
                                                style="color: #A6ACCD;">php</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 2</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 3</span><span
                                                style="color: #89DDFF;">declare</span><span
                                                style="color: #89DDFF;">(</span><span style="color: #A6ACCD;">strict_types</span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #F78C6C;">1</span><span style="color: #89DDFF;">);</span></div><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 4</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 5</span><span
                                                style="color: #F78C6C;">namespace</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #FFCB6B;">App</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #FFCB6B;">Transporter</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #FFCB6B;">Forge</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 6</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 7</span><span
                                                style="color: #F78C6C;">use</span><span style="color: #FFCB6B;"> </span><span
                                                style="color: #A6ACCD;">Illuminate</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Http</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Client</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #A6ACCD;">PendingRequest</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 8</span><span
                                                style="color: #F78C6C;">use</span><span style="color: #FFCB6B;"> </span><span
                                                style="color: #A6ACCD;">JustSteveKing</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #A6ACCD;">Transporter</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Request</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 9</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">10</span><span
                                                style="color: #C792EA;">class</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #FFCB6B;">ForgeRequest</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">extends</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #FFCB6B;">Request</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">11</span><span
                                                style="color: #89DDFF;">{</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">12</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">string</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">baseUrl </span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">'</span><span style="color: #C3E88D;">https://forge.laravel.com/api/v1</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">13</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">14</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">function</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #82AAFF;">withRequest</span><span
                                                style="color: #89DDFF;">(</span><span style="color: #FFCB6B;">PendingRequest</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">request</span><span
                                                style="color: #89DDFF;">):</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #FFCB6B;">void</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">15</span><span
                                                style="color: #A6ACCD;">    </span><span
                                                style="color: #89DDFF;">{</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">16</span><span
                                                style="color: #A6ACCD;">        </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">request</span><span style="color: #89DDFF;">-&gt;</span><span
                                                style="color: #82AAFF;">withToken</span><span
                                                style="color: #89DDFF;">(</span><span
                                                style="color: #82AAFF;">config</span><span
                                                style="color: #89DDFF;">(</span><span
                                                style="color: #89DDFF;">'</span><span style="color: #C3E88D;">services.forge.token</span><span
                                                style="color: #89DDFF;">'</span><span style="color: #89DDFF;">));</span></div><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">17</span><span
                                                style="color: #A6ACCD;">    </span><span
                                                style="color: #89DDFF;">}</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">18</span><span
                                                style="color: #89DDFF;">}</span></div></code></pre>

                                <p>Next let's take the example of getting all servers. Generate a new request for this
                                    request:</p>

                                <pre><code class="language-bash torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">1</span><span style="color: #A6ACCD;">php artisan make:api-request Forge\\Servers\\ListServers</span></div></code></pre>

                                <p>Then make the following changes:</p>

                                <pre><code class="language-php torchlight"
                                           style="background-color: #292D3E; --theme-selection-background: #00000080;"><!-- Syntax highlighted by torchlight.dev --><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 1</span><span
                                                style="color: #89DDFF;">&lt;?</span><span
                                                style="color: #A6ACCD;">php</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 2</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 3</span><span
                                                style="color: #89DDFF;">declare</span><span
                                                style="color: #89DDFF;">(</span><span style="color: #A6ACCD;">strict_types</span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #F78C6C;">1</span><span style="color: #89DDFF;">);</span></div><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 4</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 5</span><span
                                                style="color: #F78C6C;">namespace</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #FFCB6B;">App</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #FFCB6B;">Transporter</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #FFCB6B;">Forge</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #FFCB6B;">Servers</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 6</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 7</span><span
                                                style="color: #F78C6C;">use</span><span style="color: #FFCB6B;"> </span><span
                                                style="color: #A6ACCD;">App</span><span style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Transporter</span><span style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Forge</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #A6ACCD;">ForgeRequest</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 8</span><span
                                                style="color: #F78C6C;">use</span><span style="color: #FFCB6B;"> </span><span
                                                style="color: #A6ACCD;">Illuminate</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Http</span><span
                                                style="color: #89DDFF;">\</span><span
                                                style="color: #A6ACCD;">Client</span><span
                                                style="color: #89DDFF;">\</span><span style="color: #A6ACCD;">PendingRequest</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number"> 9</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">10</span><span
                                                style="color: #C792EA;">class</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #FFCB6B;">ListServers</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">extends</span><span
                                                style="color: #A6ACCD;"> </span><span style="color: #FFCB6B;">ForgeRequest</span></div><div
                                            class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">11</span><span
                                                style="color: #89DDFF;">{</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">12</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">string</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">method </span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">'</span><span style="color: #C3E88D;">GET</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">13</span>&nbsp;</div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">14</span><span
                                                style="color: #A6ACCD;">    </span><span style="color: #C792EA;">protected</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #C792EA;">string</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">$</span><span
                                                style="color: #A6ACCD;">path </span><span
                                                style="color: #89DDFF;">=</span><span
                                                style="color: #A6ACCD;"> </span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #C3E88D;">/servers</span><span
                                                style="color: #89DDFF;">'</span><span
                                                style="color: #89DDFF;">;</span></div><div class="line"><span
                                                style="color:#a6accd40; text-align: right; -webkit-user-select: none; user-select: none;"
                                                class="line-number">15</span><span
                                                style="color: #89DDFF;">}</span></div></code></pre>

                                <p>All we have done here is used inheritance to extend the ForgeRequest which contains
                                    our initial state for every request we need - and allows us to build upon that where
                                    we want to.</p>

                                <p>Thanks for reading, I welcome any feedback that may assist in pushing this package
                                    forward and making it easier to use! Feel free to start a discussion or open an
                                    issue on the <a href="https://github.com/JustSteveKing/laravel-transporter">GitHub
                                        Repository</a> or even drop me a tweet/DM on <a
                                        href="https://twitter.com/JustSteveKing">twitter</a>.</p>
                            </div>
                        </div>
                    </div>

                    <footer
                        class="text-sm font-medium leading-5 divide-y divide-gray-200 xl:col-start-1 xl:row-start-2">
                        <div class="space-y-8 py-8">
                            <div class="space-y-2">
                                <h2 class="text-md tracking-wide uppercase">
                                    Tags
                                </h2>
                                <div class="space-x-2 flex flex-wrap">
                                    <a href="{{ route('pages:tags:view', 'php') }}" title="View articles in php" itemscope=""
                                       itemtype="https://schema.org/DefinedTerm" itemprop="name"
                                       class="text-md font-semibold text-transparent bg-clip-text bg-gradient-to-tr from-indigo-500 to-pink-600">
                                        php
                                    </a>
                                    <a href="{{ route('pages:tags:view', 'apis') }}" title="View articles in apis" itemscope=""
                                       itemtype="https://schema.org/DefinedTerm" itemprop="name"
                                       class="text-md font-semibold text-transparent bg-clip-text bg-gradient-to-tr from-indigo-500 to-pink-600">
                                        apis
                                    </a>
                                    <a href="{{ route('pages:tags:view', 'laravel') }}" title="View articles in laravel" itemscope=""
                                       itemtype="https://schema.org/DefinedTerm" itemprop="name"
                                       class="text-md font-semibold text-transparent bg-clip-text bg-gradient-to-tr from-indigo-500 to-pink-600">
                                        laravel
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-8 py-8">
                            <div class="space-y-2">
                                <h3 class="text-md tracking-wide uppercase">
                                    Reading Time
                                </h3>
                                <div class="space-x-2 flex flex-wrap">
                                    <p class="text-md tracking-wide">4 min read</p>
                                </div>
                            </div>
                        </div>
                        <div class="pt-8">
                            <a class="text-md font-semibold text-transparent bg-clip-text bg-gradient-to-tr from-indigo-500 to-pink-600"
                               href="/blog">
                                ← Back to the blog
                            </a>
                        </div>
                    </footer>
                </div>
            </article>
        </div>
    </section>
</x-site-layout>
