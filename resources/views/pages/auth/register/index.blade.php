@extends('pages.auth.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.filepond.link')
@endsection

@section('content')
    <section class="flex justify-center">
        <div class="mt-16">
            <div class="flex items-center">
                <img class="mx-auto" src="{{ asset('assets/logo/high-resolutions/logo-rounded.png') }}" alt="Lidia"
                    width="100">
            </div>

            <div class="flex flex-col p-10 mt-10 bg-white border-t-2 rounded-lg shadow-2xl border-t-dodger-blue">
                {{-- Breadcrumbs --}}
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="/"
                                class="inline-flex items-center text-sm font-medium transition-all duration-300 text-midnight-blue hover:text-dodger-blue">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="text-sm font-medium text-slate-grey ms-1 md:ms-2">Sign-up</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                {{-- Header --}}
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-midnight-blue">Sign-up</h3>
                    <p class="text-slate-grey">Register yourself to do something on Lidia.</p>
                </div>

                {{-- Form --}}
                <form action="/register" method="POST" class="mt-8" enctype="multipart/form-data">
                    @csrf

                    {{-- Session --}}
                    @if (session()->has('error'))
                        <div id="alert-2"
                            class="flex items-center p-4 text-red-800 rounded-lg mt-7 bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-medium ms-3">
                                {{ session('error') }}
                            </div>
                            <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-2" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @elseif (session()->has('success'))
                        <div id="alert-3"
                            class="flex items-center p-4 text-green-800 rounded-lg mt-7 bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-medium ms-3">
                                {{ session('success') }}
                            </div>
                            <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-7">
                        <div class="mb-5">
                            <label for="full_name" class="block mb-2 text-sm font-bold text-midnight-blue">Full
                                Name</label>
                            <input type="text" id="full_name"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full py-2.5 pe-32"
                                placeholder="e.g. Muhammad Alfian" name="full_name" value="{{ old('full_name') }}"
                                autofocus>

                            @error('full_name')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="nik" class="block mb-2 text-sm font-bold text-midnight-blue">NIK</label>
                            <input type="text" id="nik" placeholder="e.g. 1050241708900001"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                                name="nik" value="{{ old('nik') }}" maxlength="16">

                            @error('nik')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-7">
                        <div class="mb-5">
                            <label for="username" class="block mb-2 text-sm font-bold text-midnight-blue">Username</label>
                            <input type="text" id="username"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                                placeholder="e.g. alfianchii" name="username" value="{{ old('username') }}">

                            @error('username')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-bold text-midnight-blue">Email</label>
                            <input type="email" id="email" placeholder="e.g. alfian.ganteng@gmail.com"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                                name="email" value="{{ old('email') }}">

                            @error('email')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-7">
                        <div class="mb-5">
                            <label for="phone" class="block mb-2 text-sm font-bold text-midnight-blue">Phone</label>
                            <input type="text" id="phone"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                                placeholder="e.g. 082384763478" name="phone" value="{{ old('phone') }}"
                                min="11" max="13" maxlength="13">

                            @error('phone')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="born" class="block mb-2 text-sm font-bold text-midnight-blue">Born</label>
                            <input type="date" id="born" placeholder="e.g. alfian.ganteng@gmail.com"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                                name="born" value="{{ old('date') ?? date('Y-m-d') }}">

                            @error('born')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-7">
                        <div class="mb-5">
                            <label for="address" class="block mb-2 text-sm font-bold text-midnight-blue">Address</label>
                            <input type="text" id="address"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                                placeholder="e.g. Jl. Free Fire Factory, No. 1, Kla Only" name="address"
                                value="{{ old('address') }}">

                            @error('address')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="address" class="block mb-2 text-sm font-bold text-midnight-blue">Gender</label>

                            <div class="flex items-center py-3 gap-x-5">
                                <div class="flex items-center">
                                    <input @if (old('gender') == 'male') checked @endif id="male" type="radio"
                                        value="male" name="gender"
                                        class="w-4 h-4 border-pale-silver text-dodger-blue focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="male"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Male</label>
                                </div>
                                <div class="flex items-center">
                                    <input @if (old('gender') == 'female') checked @endif id="female" type="radio"
                                        value="female" name="gender"
                                        class="w-4 h-4 border-pale-silver text-dodger-blue focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="female"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Female</label>
                                </div>
                            </div>

                            @error('gender')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-7">
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-bold text-midnight-blue">Password</label>
                            <input type="password" id="password"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                                placeholder="e.g. 4kuBu7uhM3dk1t" name="password" value="{{ old('password') }}">

                            @error('password')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-bold text-midnight-blue">Password Confirmation</label>
                            <input type="password" id="password_confirmation" placeholder="e.g. 4kuBu7uhM3dk1t"
                                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                                name="password_confirmation" value="{{ old('password_confirmation') }}">

                            @error('password_confirmation')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <div>
                            <label for="profile_picture" class="block mb-2 text-sm font-bold text-midnight-blue">Profile
                                Picture</label>

                            <input type="file" class="image-crop-filepond" name="profile_picture"
                                id="profile_picture" />

                            @error('profile_picture')
                                <p class="-mt-2 text-xs text-red-500">Error message</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-7">
                        <button
                            class="w-full py-3 text-sm font-bold text-white transition-all duration-300 rounded hover:bg-blue-700 bg-dodger-blue"
                            type="submit">Sign-up</button>
                    </div>
                </form>
            </div>

            <div class="mt-12 text-center">
                <p class="text-sm text-slate-grey">Already have an account? <a href="/login"
                        class="text-royal-blue">Let's use our application!</a></p>
            </div>

            @include('pages.auth.layouts.footer')
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.filepond.script')
    @vite('resources/js/components/filepond/image-crop/photo.js')

    @include('utils.session.forget-error')
@endsection
