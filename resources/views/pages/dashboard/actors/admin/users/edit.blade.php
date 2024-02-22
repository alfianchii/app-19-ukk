@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.filepond.link')
    @include('utils.sweetalert.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Profile</h3>
                <p class="text-subtitle text-muted">Make edits to user {{ $user->full_name }}.</p>
                <hr>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/users">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User</h4>
            </div>
            <div class="card-body">
                <form class="form" action="/dashboard/users/{{ $user->id_user }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('full_name'){{ 'is-invalid' }}@enderror">
                                <label for="full_name" class="form-label">Full name</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Muhammad Alfian"
                                        id="full_name" name="full_name"
                                        value="{{ old('full_name') ?? $user->full_name }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-person"></i>
                                    </div>

                                    @error('full_name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('nik'){{ 'is-invalid' }}@enderror">
                                <label for="nik" class="form-label">NIK</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. 1050241708900001"
                                        id="nik" name="nik" value="{{ old('nik') ?? $user->nik }}"
                                        maxlength="16" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-person-vcard"></i>
                                    </div>

                                    @error('nik')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('username'){{ 'is-invalid' }}@enderror">
                                <label for="username" class="form-label">Username</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. alfianchii"
                                        id="username" name="username" value="{{ old('username') ?? $user->username }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-at"></i>
                                    </div>

                                    @error('username')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('email'){{ 'is-invalid' }}@enderror">
                                <label for="email" class="form-label">Email</label>
                                <div class="position-relative">
                                    <input type="email" class="py-2 form-control" id="email" name="email"
                                        value="{{ old('email') ?? $user->email }}"
                                        placeholder="e.g. alfian.ganteng@gmail.com" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-envelope-paper"></i>
                                    </div>

                                    @error('email')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('phone'){{ 'is-invalid' }}@enderror">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. 082384763478"
                                        id="phone" name="phone" value="{{ old('phone') ?? $user->phone }}"
                                        min="11" max="13" maxlength="13" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-telephone"></i>
                                    </div>

                                    @error('phone')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('born'){{ 'is-invalid' }}@enderror">
                                <label for="born" class="form-label">Born</label>
                                <div class="position-relative">
                                    <input type="date" class="py-2 form-control" id="born" name="born"
                                        value="{{ old('born') ?? $user->born->format('Y-m-d') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-calendar"></i>
                                    </div>

                                    @error('born')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('address'){{ 'is-invalid' }}@enderror">
                                <label for="address" class="form-label">Address</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control"
                                        placeholder="e.g. Jl. Free Fire Factory, No. 1, Kla Only" id="address"
                                        name="address" value="{{ old('address') ?? $user->address }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-house"></i>
                                    </div>

                                    @error('address')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group mandatory @error('gender'){{ 'is-invalid' }}@enderror">
                                <fieldset>
                                    <label class="form-label">
                                        Gender
                                    </label>
                                    <div class="mt-md-2 d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gender-male" value="male"
                                                @if ($user->gender == 'male') checked @endif>
                                            <label class="form-check-label form-label" for="gender-male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gender-female" value="female"
                                                @if ($user->gender == 'female') checked @endif>
                                            <label class="form-check-label form-label" for="gender-female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                @error('gender')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group mandatory @error('role'){{ 'is-invalid' }}@enderror">
                                <fieldset>
                                    <label class="form-label">
                                        Role
                                    </label>
                                    <div class="mt-md-2 d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="role"
                                                id="role-officer" value="officer"
                                                @if ($user->role == 'officer') checked @endif>
                                            <label class="form-check-label form-label" for="role-officer">
                                                Officer
                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="role"
                                                id="role-reader" value="reader"
                                                @if ($user->role == 'reader') checked @endif>
                                            <label class="form-check-label form-label" for="role-reader">
                                                Reader
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                @error('role')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label id="profile_picture"
                                        class="form-label @error('profile_picture'){{ 'text-danger' }}@enderror">Profile
                                        Picture</label>

                                    @if ($user->profile_picture)
                                        <div class="mb-3 relative" data-confirm-user-profile-picture-destroy="true"
                                            data-unique="{{ $user->id_user }}">
                                            <a class="px-2 pt-2 btn btn-danger position-absolute"
                                                data-confirm-user-profile-picture-destroy="true"
                                                data-unique="{{ $user->id_user }}">
                                                <span data-confirm-user-profile-picture-destroy="true"
                                                    data-unique="{{ $user->id_user }}"
                                                    class="select-all fa-fw fa-lg fas"></span>
                                            </a>

                                            <img class="rounded-2" width="250"
                                                src="{{ asset('storage/' . $user->profile_picture) }}"
                                                alt="{{ $user->full_name }}">
                                        </div>
                                    @endif

                                    <input type="file" class="image-crop-filepond" name="profile_picture"
                                        id="profile_picture" />
                                </div>
                            </div>

                            @error('profile_picture')
                                <div class="invalid-feedback d-block" style="margin-top: -10px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="mb-1 btn btn-primary me-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Password</h4>
            </div>
            <div class="card-body">
                <form class="form" action="/dashboard/users/{{ $user->id_user }}/change-password" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div
                                class="form-group has-icon-left mandatory @error('password'){{ 'is-invalid' }}@enderror">
                                <label for="password" class="form-label">Password</label>
                                <div class="flex-row-reverse d-flex align-items-center position-relative" id="wrapper">
                                    <input type="password" class="py-2 mt-1 form-control"
                                        placeholder="e.g. 4kuBu7uhM3dk1t" id="password" name="password"
                                        maxlength="255">
                                    <div class="pt-1 form-control-icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                </div>

                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div
                                class="form-group has-icon-left mandatory @error('password_confirmation'){{ 'is-invalid' }}@enderror">
                                <label for="password-confirmation" class="form-label">Password Confirmation</label>
                                <div class="flex-row-reverse d-flex align-items-center position-relative" id="wrapper">
                                    <input type="password" class="py-2 mt-1 form-control"
                                        placeholder="e.g. 4kuBu7uhM3dk1t" id="password-confirmation"
                                        name="password_confirmation" maxlength="255">
                                    <div class="pt-1 form-control-icon">
                                        <i class="bi bi-key-fill"></i>
                                    </div>
                                </div>

                                @error('password_confirmation')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="mb-1 btn btn-primary me-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.filepond.script')
    @vite('resources/js/components/filepond/image-crop/photo.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/users/alert.js')

    @include('utils.session.forget-error')
@endsection
