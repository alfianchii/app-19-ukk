@extends('pages.landing-page.layouts.main')

@section('title', $title)

@section('additional_links')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
    {{-- Breadcrumbs --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/"
                    class="inline-flex items-center text-sm font-medium transition-all duration-300 text-midnight-blue hover:text-dodger-blue">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-sm font-medium text-slate-grey ms-1 md:ms-2">Books</span>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Content --}}
    <section class="pt-10">
        <div class="flex flex-col w-full md:w-10/12 lg:w-8/12">
            <h2 class="mt-5 text-3xl font-semibold tracking-wide lg:text-5xl text-midnight-blue">📚• Books</h2>
            <p class="mt-3 leading-loose text-slate-grey"><span class="text-dodger-blue">Books</span> open doors
                to <span class="text-dodger-blue">new
                    worlds</span>, ideas, and perspectives. They
                inviting readers to explore the depths of human experience and the vastness of the universe.</p>
        </div>

        <section class="pt-20">
            <div class="flex flex-col items-start justify-center w-full mb-8 gap-y-6">
                <form class="flex items-center justify-center w-full" action="/books" method="GET">
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @elseif(request('title'))
                        <input type="hidden" name="title" value="{{ request('title') }}">
                    @elseif(request('year_published'))
                        <input type="hidden" name="year_published" value="{{ request('year_published') }}">
                    @elseif(request('publisher'))
                        <input type="hidden" name="publisher" value="{{ request('publisher') }}">
                    @elseif(request('genre'))
                        <input type="hidden" name="genre" value="{{ request('genre') }}">
                    @endif

                    <div class="relative w-full">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">📑</div>
                        <input type="text" id="simple-search"
                            class="border transition-all duration-300 outline-none border-pale-silver text-slate-grey text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            name="search" placeholder="Search a book ..." value="{{ request('search') }}" required
                            autofocus />
                    </div>
                    <button id="search-button" type="submit"
                        class="p-3 text-sm font-medium text-white transition-all duration-300 rounded-lg ms-2 bg-dodger-blue hover:bg-dodger-blue/80 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg width="20" height="20" viewBox="0 0 45 45" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.625 35.625C28.9093 35.625 35.625 28.9093 35.625 20.625C35.625 12.3407 28.9093 5.625 20.625 5.625C12.3407 5.625 5.625 12.3407 5.625 20.625C5.625 28.9093 12.3407 35.625 20.625 35.625Z"
                                stroke="white" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M39.375 39.375L31.2188 31.2188" stroke="white" stroke-width="7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>

                {{-- If just "page" on params, don't display --}}
                @if (!empty(request()->all()))
                    <div class="mx-auto text-center">
                        <a href="{{ url()->current([]) }}"
                            class="inline-flex items-center justify-center h-10 px-4 py-3 font-bold text-center text-white transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 hover:bg-dodger-blue/80 lg:px-10 bg-dodger-blue">Reset
                            Filters</a>
                    </div>
                @endif
            </div>

            <div class="flex flex-col gap-y-10">
                {{-- Dompet Ayah Sepatu Ibu --}}
                <div
                    class="p-6 transition-colors border-t-2 shadow-2xl bg-white/60 hover:bg-white rounded-xl shadow-dodger-blue/20 border-t-dodger-blue">
                    <div class="flex flex-wrap items-start -mx-4 lg:items-center">
                        <div class="flex-shrink-0 w-full px-4 mb-6 md:w-5/12 lg:w-3/12 md:mb-0">
                            <a class="relative inline-block w-full" href="/books/1">
                                <img alt="Dompet Ayah Sepatu Ibu" loading="lazy" decoding="async"
                                    class="mx-auto rounded-lg md:mx-0"
                                    src="{{ asset('assets/images/Dompet Ayah Sepatu Ibu.png') }}" width="200">
                            </a>
                        </div>
                        <div class="w-full px-4 md:w-7/12 lg:w-9/12">
                            <div class="flex flex-wrap items-center -mx-4">
                                <div class="w-full px-4 lg:w-9/12">
                                    <div class="text-2xl font-semibold">
                                        <a href="/books/1">
                                            <h2
                                                class="transition-all duration-300 text-midnight-blue hover:text-midnight-blue/60">
                                                Dompet Ayah Sepatu Ibu
                                            </h2>
                                        </a>
                                    </div>
                                    <div class="mt-2 line-clamp-2 text-slate-grey">The world is evil and you lost? Look
                                        at the palm of your hand. Father always forged that hand to not give up. Mom
                                        never stops holding that hand to pray. Rise up to take a step. This is the story
                                        of a father and mother, whose love was born even before you were born, whose
                                        love grew even before you grew. This is a story of fathers and mothers, whose
                                        tears can light a fire, whose tears can put out a fire. The hottest fire is lit
                                        when mom and dad cry in disappointment. The hottest fire is extinguished by mom
                                        and dad's tears of struggle. So, always remember home.</div>
                                    <div class="flex items-center mt-6 text-sm gap-x-6 text-slate-grey">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <rect width="18" height="18" x="3" y="4" rx="2"
                                                    ry="2"></rect>
                                                <line x1="16" x2="16" y1="2" y2="6">
                                                </line>
                                                <line x1="8" x2="8" y1="2" y2="6">
                                                </line>
                                                <line x1="3" x2="21" y1="10" y2="10">
                                                </line>
                                            </svg>
                                            <div class="text-14 lh-1">2023</div>
                                        </div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <div class="text-14 lh-1">Gramedia Widia Sarana Indonesia</div>
                                        </div>
                                        <div class="flex items-center">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 6.99997H3.99978C4.00007 7.36652 4.20262 7.71932 4.55279 7.8944C5.04676 8.14139 5.64744 7.94117 5.89443 7.44719L6.11803 6.99997H13.882L14.1056 7.44719C14.3526 7.94117 14.9532 8.14139 15.4472 7.8944C15.7974 7.71932 15.9999 7.36652 16.0002 6.99997H18V8.99998H2V6.99997ZM15.118 4.99997H18C19.1046 4.99997 20 5.89541 20 6.99997V8.99998C20 9.84 19.4821 10.5591 18.7482 10.8553C18.7516 10.9031 18.7534 10.9513 18.7534 11C18.7534 11.1459 18.7374 11.2914 18.7058 11.4338L17.1502 18.4338C16.9469 19.3489 16.1352 20 15.1978 20H4.80217C3.86477 20 3.05315 19.3489 2.8498 18.4338L1.29424 11.4338C1.25095 11.239 1.23767 11.0445 1.25134 10.8551C0.517674 10.5588 0 9.83983 0 8.99998V6.99997C0 5.89541 0.89543 4.99997 2 4.99997H4.88197L7.10557 0.552761C7.35256 0.0587828 7.95323 -0.141442 8.44721 0.105548C8.94119 0.352537 9.14142 0.95321 8.89443 1.44719L7.11803 4.99997H12.882L11.1056 1.44719C10.8586 0.95321 11.0588 0.352537 11.5528 0.105548C12.0468 -0.141442 12.6474 0.0587828 12.8944 0.552761L15.118 4.99997ZM3.24662 11H16.7534L15.1978 18H4.80217L3.24662 11Z"
                                                    fill="#5E6282" />
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <div class="text-14 lh-1">3</div>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="mb-2 text-sm font-semibold tracking-wider uppercase text-sky-cyan">
                                            J. S. Khairen</h3>

                                        <div class="mt-8">
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Fiction</span>
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Slice
                                                of Life</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-between w-full px-4 mt-8 lg:w-3/12 lg:border-l lg:border-dark/5 lg:ml-auto lg:py-10 lg:text-center lg:block lg:mt-0">
                                    <div class="text-2xl font-semibold">
                                        <i class="text-red-500 bi bi-heart-fill"></i>
                                    </div>
                                    <a class="inline-flex items-center justify-center h-10 px-4 py-3 font-medium text-center transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 bg-dodger-blue/10 text-dodger-blue hover:bg-dodger-blue/20 lg:mt-4"
                                        href="/books/1">See Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Laut Bercerita --}}
                <div
                    class="p-6 transition-colors border-t-2 shadow-2xl bg-white/60 hover:bg-white rounded-xl shadow-dodger-blue/20 border-t-dodger-blue">
                    <div class="flex flex-wrap items-start -mx-4 lg:items-center">
                        <div class="flex-shrink-0 w-full px-4 mb-6 md:w-5/12 lg:w-3/12 md:mb-0">
                            <a class="relative inline-block w-full" href="/books/2">
                                <img alt="Laut Bercerita" loading="lazy" decoding="async"
                                    class="mx-auto rounded-lg md:mx-0"
                                    src="{{ asset('assets/images/Laut Bercerita.png') }}" width="200">
                            </a>
                        </div>
                        <div class="w-full px-4 md:w-7/12 lg:w-9/12">
                            <div class="flex flex-wrap items-center -mx-4">
                                <div class="w-full px-4 lg:w-9/12">
                                    <div class="text-2xl font-semibold">
                                        <a href="/books/2">
                                            <h2
                                                class="transition-all duration-300 text-midnight-blue hover:text-midnight-blue/60">
                                                Laut Bercerita
                                            </h2>
                                        </a>
                                    </div>
                                    <div class="mt-2 line-clamp-2 text-slate-grey">At dusk, in a flat in Jakarta, a
                                        student
                                        named Biru Laut was ambushed by four unknown men. Together with his friends,
                                        Daniel Tumbuan, Sunu Dyantoro, Alex Perazon, he was taken to an unknown place.
                                        For months they were held captive, interrogated, beaten, kicked, hung and
                                        electrocuted to answer one important question: who was behind the activist and
                                        student movements at the time.</div>
                                    <div class="flex items-center mt-6 text-sm gap-x-6 text-slate-grey">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <rect width="18" height="18" x="3" y="4" rx="2"
                                                    ry="2"></rect>
                                                <line x1="16" x2="16" y1="2" y2="6">
                                                </line>
                                                <line x1="8" x2="8" y1="2" y2="6">
                                                </line>
                                                <line x1="3" x2="21" y1="10" y2="10">
                                                </line>
                                            </svg>
                                            <div class="text-14 lh-1">2017</div>
                                        </div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <div class="text-14 lh-1">Penerbit KPG</div>
                                        </div>
                                        <div class="flex items-center">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 6.99997H3.99978C4.00007 7.36652 4.20262 7.71932 4.55279 7.8944C5.04676 8.14139 5.64744 7.94117 5.89443 7.44719L6.11803 6.99997H13.882L14.1056 7.44719C14.3526 7.94117 14.9532 8.14139 15.4472 7.8944C15.7974 7.71932 15.9999 7.36652 16.0002 6.99997H18V8.99998H2V6.99997ZM15.118 4.99997H18C19.1046 4.99997 20 5.89541 20 6.99997V8.99998C20 9.84 19.4821 10.5591 18.7482 10.8553C18.7516 10.9031 18.7534 10.9513 18.7534 11C18.7534 11.1459 18.7374 11.2914 18.7058 11.4338L17.1502 18.4338C16.9469 19.3489 16.1352 20 15.1978 20H4.80217C3.86477 20 3.05315 19.3489 2.8498 18.4338L1.29424 11.4338C1.25095 11.239 1.23767 11.0445 1.25134 10.8551C0.517674 10.5588 0 9.83983 0 8.99998V6.99997C0 5.89541 0.89543 4.99997 2 4.99997H4.88197L7.10557 0.552761C7.35256 0.0587828 7.95323 -0.141442 8.44721 0.105548C8.94119 0.352537 9.14142 0.95321 8.89443 1.44719L7.11803 4.99997H12.882L11.1056 1.44719C10.8586 0.95321 11.0588 0.352537 11.5528 0.105548C12.0468 -0.141442 12.6474 0.0587828 12.8944 0.552761L15.118 4.99997ZM3.24662 11H16.7534L15.1978 18H4.80217L3.24662 11Z"
                                                    fill="#5E6282" />
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <div class="text-14 lh-1">5</div>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="mb-2 text-sm font-semibold tracking-wider uppercase text-sky-cyan">
                                            Leila S. Chudori</h3>

                                        <div class="mt-8">
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Thriller</span>
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Slice
                                                of Life</span>
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Fiction</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-between w-full px-4 mt-8 lg:w-3/12 lg:border-l lg:border-dark/5 lg:ml-auto lg:py-10 lg:text-center lg:block lg:mt-0">
                                    <div class="text-2xl font-semibold">
                                        <i class="text-red-500 bi bi-heart-fill"></i>
                                    </div>
                                    <a class="inline-flex items-center justify-center h-10 px-4 py-3 font-medium text-center transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 bg-dodger-blue/10 text-dodger-blue hover:bg-dodger-blue/20 lg:mt-4"
                                        href="/books/2">See Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- The Visual MBA --}}
                <div
                    class="p-6 transition-colors border-t-2 shadow-2xl bg-white/60 hover:bg-white rounded-xl shadow-dodger-blue/20 border-t-dodger-blue">
                    <div class="flex flex-wrap items-start -mx-4 lg:items-center">
                        <div class="flex-shrink-0 w-full px-4 mb-6 md:w-5/12 lg:w-3/12 md:mb-0">
                            <a class="relative inline-block w-full" href="/books/3">
                                <img alt="The Visual MBA" loading="lazy" decoding="async"
                                    class="mx-auto rounded-lg md:mx-0"
                                    src="{{ asset('assets/images/The Visual MBA.png') }}" width="200">
                            </a>
                        </div>
                        <div class="w-full px-4 md:w-7/12 lg:w-9/12">
                            <div class="flex flex-wrap items-center -mx-4">
                                <div class="w-full px-4 lg:w-9/12">
                                    <div class="text-2xl font-semibold">
                                        <a href="/books/3">
                                            <h2
                                                class="transition-all duration-300 text-midnight-blue hover:text-midnight-blue/60">
                                                The Visual MBA
                                            </h2>
                                        </a>
                                    </div>
                                    <div class="mt-2 line-clamp-2 text-slate-grey">Jason Barron spent 516 hours in
                                        class, completed mountains of homework and shelled out tens of thousands of
                                        dollars to complete his MBA at the BYU Marriott School of Business. Along the
                                        way, rather than taking boring notes that he would never read (nor use) again,
                                        Jason created sketch notes for each class—visually capturing the essential
                                        points of his education—and providing an engaging and invaluable resource. Once
                                        finished with his MBA, Jason launched a widely successful Kickstarter campaign
                                        distilling these same notes into a self-published book to help aspiring business
                                        leaders of all backgrounds and income levels understand the critical concepts
                                        one learns in business school. Whether you are thinking about applying to
                                        business school, are currently in college studying business, or have always
                                        wondered what is taught in an MBA program, this highly entertaining and visual
                                        book is for you.</div>
                                    <div class="flex items-center mt-6 text-sm gap-x-6 text-slate-grey">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <rect width="18" height="18" x="3" y="4" rx="2"
                                                    ry="2"></rect>
                                                <line x1="16" x2="16" y1="2" y2="6">
                                                </line>
                                                <line x1="8" x2="8" y1="2" y2="6">
                                                </line>
                                                <line x1="3" x2="21" y1="10" y2="10">
                                                </line>
                                            </svg>
                                            <div class="text-14 lh-1">2019</div>
                                        </div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <div class="text-14 lh-1">Penguin Books</div>
                                        </div>
                                        <div class="flex items-center">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 6.99997H3.99978C4.00007 7.36652 4.20262 7.71932 4.55279 7.8944C5.04676 8.14139 5.64744 7.94117 5.89443 7.44719L6.11803 6.99997H13.882L14.1056 7.44719C14.3526 7.94117 14.9532 8.14139 15.4472 7.8944C15.7974 7.71932 15.9999 7.36652 16.0002 6.99997H18V8.99998H2V6.99997ZM15.118 4.99997H18C19.1046 4.99997 20 5.89541 20 6.99997V8.99998C20 9.84 19.4821 10.5591 18.7482 10.8553C18.7516 10.9031 18.7534 10.9513 18.7534 11C18.7534 11.1459 18.7374 11.2914 18.7058 11.4338L17.1502 18.4338C16.9469 19.3489 16.1352 20 15.1978 20H4.80217C3.86477 20 3.05315 19.3489 2.8498 18.4338L1.29424 11.4338C1.25095 11.239 1.23767 11.0445 1.25134 10.8551C0.517674 10.5588 0 9.83983 0 8.99998V6.99997C0 5.89541 0.89543 4.99997 2 4.99997H4.88197L7.10557 0.552761C7.35256 0.0587828 7.95323 -0.141442 8.44721 0.105548C8.94119 0.352537 9.14142 0.95321 8.89443 1.44719L7.11803 4.99997H12.882L11.1056 1.44719C10.8586 0.95321 11.0588 0.352537 11.5528 0.105548C12.0468 -0.141442 12.6474 0.0587828 12.8944 0.552761L15.118 4.99997ZM3.24662 11H16.7534L15.1978 18H4.80217L3.24662 11Z"
                                                    fill="#5E6282" />
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <div class="text-14 lh-1">6</div>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="mb-2 text-sm font-semibold tracking-wider uppercase text-sky-cyan">
                                            Jason Barron</h3>

                                        <div class="mt-8">
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Economy</span>
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Non-fiction</span>
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Econs</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-between w-full px-4 mt-8 lg:w-3/12 lg:border-l lg:border-dark/5 lg:ml-auto lg:py-10 lg:text-center lg:block lg:mt-0">
                                    <div class="text-2xl font-semibold">
                                        <i class="text-red-500 bi bi-heart"></i>
                                    </div>
                                    <a class="inline-flex items-center justify-center h-10 px-4 py-3 font-medium text-center transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 bg-dodger-blue/10 text-dodger-blue hover:bg-dodger-blue/20 lg:mt-4"
                                        href="/books/3">See Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Talking to Strangers --}}
                <div
                    class="p-6 transition-colors border-t-2 shadow-2xl bg-white/60 hover:bg-white rounded-xl shadow-dodger-blue/20 border-t-dodger-blue">
                    <div class="flex flex-wrap items-start -mx-4 lg:items-center">
                        <div class="flex-shrink-0 w-full px-4 mb-6 md:w-5/12 lg:w-3/12 md:mb-0">
                            <a class="relative inline-block w-full" href="/books/4">
                                <img alt="Talking to Strangers" loading="lazy" decoding="async"
                                    class="mx-auto rounded-lg md:mx-0"
                                    src="{{ asset('assets/images/Talking to Strangers.png') }}" width="200">
                            </a>
                        </div>
                        <div class="w-full px-4 md:w-7/12 lg:w-9/12">
                            <div class="flex flex-wrap items-center -mx-4">
                                <div class="w-full px-4 lg:w-9/12">
                                    <div class="text-2xl font-semibold">
                                        <a href="/books/4">
                                            <h2
                                                class="transition-all duration-300 text-midnight-blue hover:text-midnight-blue/60">
                                                Talking to Strangers
                                            </h2>
                                        </a>
                                    </div>
                                    <div class="mt-2 line-clamp-2 text-slate-grey">How did Fidel Castro fool the CIA
                                        for a generation? Why did Neville Chamberlain think he could trust Adolf Hitler?
                                        Why are campus sexual assaults on the rise? Do television sitcoms teach us
                                        something about the way we relate to each other that isn't true?

                                        While tackling these questions, Malcolm Gladwell was not solely writing a book
                                        for the page. He was also producing for the ear. In the audiobook version of
                                        Talking to Strangers, you'll hear the voices of people he
                                        interviewed--scientists, criminologists, military psychologists. Court
                                        transcripts are brought to life with re-enactments. You actually hear the
                                        contentious arrest of Sandra Bland by the side of the road in Texas. As Gladwell
                                        revisits the deceptions of Bernie Madoff, the trial of Amanda Knox, and the
                                        suicide of Sylvia Plath, you hear directly from many of the players in these
                                        real-life tragedies. There's even a theme song - Janelle Monae's "Hell You
                                        Talmbout."

                                        Something is very wrong, Gladwell argues, with the tools and strategies we use
                                        to make sense of people we don't know. And because we don't know how to talk to
                                        strangers, we are inviting conflict and misunderstanding in ways that have a
                                        profound effect on our lives and our world.</div>
                                    <div class="flex items-center mt-6 text-sm gap-x-6 text-slate-grey">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <rect width="18" height="18" x="3" y="4" rx="2"
                                                    ry="2"></rect>
                                                <line x1="16" x2="16" y1="2" y2="6">
                                                </line>
                                                <line x1="8" x2="8" y1="2" y2="6">
                                                </line>
                                                <line x1="3" x2="21" y1="10" y2="10">
                                                </line>
                                            </svg>
                                            <div class="text-14 lh-1">2019</div>
                                        </div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <div class="text-14 lh-1">Penguin Books</div>
                                        </div>
                                        <div class="flex items-center">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 6.99997H3.99978C4.00007 7.36652 4.20262 7.71932 4.55279 7.8944C5.04676 8.14139 5.64744 7.94117 5.89443 7.44719L6.11803 6.99997H13.882L14.1056 7.44719C14.3526 7.94117 14.9532 8.14139 15.4472 7.8944C15.7974 7.71932 15.9999 7.36652 16.0002 6.99997H18V8.99998H2V6.99997ZM15.118 4.99997H18C19.1046 4.99997 20 5.89541 20 6.99997V8.99998C20 9.84 19.4821 10.5591 18.7482 10.8553C18.7516 10.9031 18.7534 10.9513 18.7534 11C18.7534 11.1459 18.7374 11.2914 18.7058 11.4338L17.1502 18.4338C16.9469 19.3489 16.1352 20 15.1978 20H4.80217C3.86477 20 3.05315 19.3489 2.8498 18.4338L1.29424 11.4338C1.25095 11.239 1.23767 11.0445 1.25134 10.8551C0.517674 10.5588 0 9.83983 0 8.99998V6.99997C0 5.89541 0.89543 4.99997 2 4.99997H4.88197L7.10557 0.552761C7.35256 0.0587828 7.95323 -0.141442 8.44721 0.105548C8.94119 0.352537 9.14142 0.95321 8.89443 1.44719L7.11803 4.99997H12.882L11.1056 1.44719C10.8586 0.95321 11.0588 0.352537 11.5528 0.105548C12.0468 -0.141442 12.6474 0.0587828 12.8944 0.552761L15.118 4.99997ZM3.24662 11H16.7534L15.1978 18H4.80217L3.24662 11Z"
                                                    fill="#5E6282" />
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <div class="text-14 lh-1">10</div>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="mb-2 text-sm font-semibold tracking-wider uppercase text-sky-cyan">
                                            Malcolm Gladwell</h3>

                                        <div class="mt-8">
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Human
                                                Nature</span>
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Non-fiction</span>
                                            <span
                                                class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Stranger</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-between w-full px-4 mt-8 lg:w-3/12 lg:border-l lg:border-dark/5 lg:ml-auto lg:py-10 lg:text-center lg:block lg:mt-0">
                                    <div class="text-2xl font-semibold">
                                        <i class="text-red-500 bi bi-heart-fill"></i>
                                    </div>
                                    <a class="inline-flex items-center justify-center h-10 px-4 py-3 font-medium text-center transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 bg-dodger-blue/10 text-dodger-blue hover:bg-dodger-blue/20 lg:mt-4"
                                        href="/books/4">See Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col d-flex justify-content-center" id="pagin-links">
                {{-- Pagination --}}
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
@endsection
