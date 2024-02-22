@extends('pages.landing-page.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.quill.link')
    @include('utils.filepond.link')
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
            <li class="inline-flex items-center">
                <a href="/books"
                    class="inline-flex items-center text-sm font-medium transition-all duration-300 text-midnight-blue hover:text-dodger-blue">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 md:ms-2">Books</span>
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-sm font-medium text-slate-grey ms-1 md:ms-2 line-clamp-1">Dompet Ayah Sepatu
                        Ibu</span>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Content --}}
    <section class="pt-10">
        <div class="flex flex-col md:flex-row">
            <div class="flex-shrink-0 w-full px-4 mb-6 md:w-5/12 lg:w-3/12 md:mb-0">
                <img class="mx-auto rounded-lg shadow-2xl md:mx-0"
                    src="{{ asset('assets/images/Dompet Ayah Sepatu Ibu.png') }}" alt="Dompet Ayah Sepatu Ibu">
            </div>

            <div class="w-full px-4 mt-8 md:w-7/12 lg:w-9/12 md:mt-0">
                <h2 class="text-3xl font-semibold tracking-wide text-center md:text-start lg:text-5xl text-midnight-blue">
                    📚• Dompet Ayah Sepatu
                    Ibu
                </h2>
                <h3 class="text-3xl font-semibold tracking-wider text-center uppercase md:text-start mt-7 text-sky-cyan">J.
                    S. Khairen</h3>
                <p class="leading-loose mt-7 text-slate-grey">The world is evil and you lost? Look at the palm of your hand.
                    Father always forged that hand to not give up. Mom never stops holding that hand to pray. Rise up to
                    take a
                    step. This is the story of a father and mother, whose love was born even before you were born, whose
                    love
                    grew even before you grew. This is a story of fathers and mothers, whose tears can light a fire, whose
                    tears
                    can put out a fire. The hottest fire is lit when mom and dad cry in disappointment. The hottest fire is
                    extinguished by mom and dad's tears of struggle. So, always remember home.</p>

                <div class="mt-8 space-y-3">
                    <p class="font-semibold text-midnight-blue">Year: <span class="font-normal">2023</span></p>
                    <p class="font-semibold text-midnight-blue">Publisher:
                        <span class="font-normal">Gramedia Widia Sarana Indonesia</span>
                    </p>
                    <p class="font-semibold text-midnight-blue">Stock: <span class="font-normal">3</span></p>
                    <p class="font-semibold text-midnight-blue">Review: <span class="font-normal">324</span>
                    <p class="font-semibold text-midnight-blue">Wishlist: <span class="font-normal">1319</span>
                    </p>
                    <p class="font-semibold text-midnight-blue">Genre:
                        <span
                            class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Fiction</span>
                        <span
                            class="bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">Slice
                            of Life</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-20">
        <div class="p-6 transition-colors border-t-2 shadow-2xl rounded-xl border-t-dodger-blue">
            {{-- Your Review --}}
            <div>
                <h2 class="text-3xl font-semibold tracking-wide text-midnight-blue">Your Review</h2>

                <div class="flex flex-col justify-center mt-10 lg:justify-start lg:flex-row">
                    <div class="flex items-center justify-center flex-shrink-0 transition-all rounded-lg lg:w-16 lg:h-16">
                        @if (auth()?->user()?->profile_photo)
                            <img width="60" class="rounded-full"
                                src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="User Avatar" />
                        @else
                            <img width="60" class="rounded-full" src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}"
                                alt="User Avatar" />
                        @endif
                    </div>
                    <div class="mt-6 lg:mt-0 lg:ml-6">
                        <h3
                            class="mb-2 text-2xl font-semibold text-center transition-all duration-300 text-midnight-blue hover:text-midnight-blue/60 lg:text-start">
                            Alfian</h3>

                        <form class="mt-8" action="/dashboard/reviews/1" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-1">
                                <label for="body" class="block mb-2 text-sm font-bold text-midnight-blue">Review</label>

                                <input id="body" name="body" value="{{ old('body') }}" type="hidden">
                                <div id="editor">
                                    {!! old('body') !!}
                                </div>

                                @error('body')
                                    <p class="mt-2 text-red-500">Error message</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <label for="photo" class="block mb-2 text-sm font-bold text-midnight-blue">Photo</label>

                                <input type="file" class="image-preview-filepond" name="photo" id="photo" />

                                @error('profile_picture')
                                    <p class="-mt-2 text-red-500">Error message</p>
                                @enderror
                            </div>

                            <div class="mt-7">
                                <button
                                    class="px-6 py-3 text-sm font-bold text-white transition-all duration-300 rounded hover:bg-blue-700 bg-dodger-blue"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="my-10">

            {{-- Other's Review --}}
            <div class="mb-6">
                <h2 class="text-3xl font-semibold tracking-wide text-midnight-blue">Other's Review</h2>

                <div>
                    <div class="flex flex-col justify-center mt-10 lg:justify-start lg:flex-row">
                        <div
                            class="flex items-center justify-center flex-shrink-0 transition-all rounded-lg lg:w-16 lg:h-16">
                            @if (auth()?->user()?->profile_photo)
                                <img width="60" class="rounded-full"
                                    src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="User Avatar" />
                            @else
                                <img width="60" class="rounded-full"
                                    src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="User Avatar" />
                            @endif
                        </div>
                        <div class="mt-6 lg:mt-0 lg:ml-6">
                            <h3
                                class="mb-2 text-base font-semibold text-center transition-all duration-300 lg:text-start text-midnight-blue hover:text-midnight-blue/60">
                                Nugraha</h3>
                            <p class="text-sm text-center lg:text-start text-slate-grey">{{ now()->diffForHumans() }}</p>

                            <p class="mt-5 text-slate-grey">"Dompet Ayah Sepatu Ibu" is a thought-provoking puzzle that
                                keeps
                                readers guessing until the very end. With its intricate plot twists and enigmatic
                                characters, this book is a captivating rollercoaster ride through the depths of space and
                                time. While some may find the narrative challenging to follow, those who persevere will be
                                rewarded with a profound meditation on the nature of reality.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex flex-col justify-center mt-10 lg:justify-start lg:flex-row">
                        <div
                            class="flex items-center justify-center flex-shrink-0 transition-all rounded-lg lg:w-16 lg:h-16">
                            @if (auth()?->user()?->profile_photo)
                                <img width="60" class="rounded-full"
                                    src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="User Avatar" />
                            @else
                                <img width="60" class="rounded-full"
                                    src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="User Avatar" />
                            @endif
                        </div>
                        <div class="mt-6 lg:mt-0 lg:ml-6">
                            <h3
                                class="mb-2 text-base font-semibold text-center transition-all duration-300 lg:text-start text-midnight-blue hover:text-midnight-blue/60">
                                Moepoi</h3>
                            <p class="text-sm text-center lg:text-start text-slate-grey">{{ now()->diffForHumans() }}</p>

                            <p class="mt-5 text-slate-grey">While "Dompet Ayah Sepatu Ibu" promises an intriguing
                                exploration of time and eternity, its execution falls short. The plot is convoluted, with
                                too many characters and subplots vying for attention. The philosophical musings feel forced
                                at times, detracting from the overall coherence of the narrative. Despite moments of
                                brilliance, the book ultimately fails to deliver a satisfying resolution to its central
                                mysteries.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex flex-col justify-center mt-10 lg:justify-start lg:flex-row">
                        <div
                            class="flex items-center justify-center flex-shrink-0 transition-all rounded-lg lg:w-16 lg:h-16">
                            @if (auth()?->user()?->profile_photo)
                                <img width="60" class="rounded-full"
                                    src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="User Avatar" />
                            @else
                                <img width="60" class="rounded-full"
                                    src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="User Avatar" />
                            @endif
                        </div>
                        <div class="mt-6 lg:mt-0 lg:ml-6">
                            <h3
                                class="mb-2 text-base font-semibold text-center transition-all duration-300 lg:text-start text-midnight-blue hover:text-midnight-blue/60">
                                Ogi</h3>
                            <p class="text-sm text-center lg:text-start text-slate-grey">{{ now()->diffForHumans() }}</p>

                            <p class="mt-5 text-slate-grey">Prepare to have your mind blown by "Dompet Ayah Sepatu Ibu".
                                This book seamlessly blends elements of science fiction, fantasy, and metaphysics to create
                                a truly unique reading experience. The author's imagination knows no bounds, crafting a
                                world where time is fluid and reality is mutable. With its vivid imagery and captivating
                                storytelling, this book will leave you pondering the nature of existence long after you've
                                turned the final page.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.quill.script')
    @vite('resources/js/components/quill/dashboard/reviews/editor.js')
    @include('utils.filepond.script')
    @vite('resources/js/components/filepond/image-preview/photo.js')
@endsection
