@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.filepond.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Create User</h3>
                <p class="text-subtitle text-muted">
                    Register users to do things in Lidia.
                </p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/users">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registration</h4>
            </div>
            <div class="card-body">
                <form class="form" action="/register" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="full_name" class="form-label">Full name</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Muhammad Alfian"
                                        id="full_name" name="full_name" value="{{ old('full_name') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-person"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="nik" class="form-label">NIK</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. 1050241708900001"
                                        id="nik" name="nik" value="{{ old('nik') }}" maxlength="16" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-person-vcard"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="username" class="form-label">Username</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. alfianchii"
                                        id="username" name="username" value="{{ old('username') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-at"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="email" class="form-label">Email</label>
                                <div class="position-relative">
                                    <input type="email" class="py-2 form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="e.g. alfian.ganteng@gmail.com"
                                        min="1900" max="{{ now()->year }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-envelope-paper"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. 082384763478"
                                        id="phone" name="phone" value="{{ old('phone') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-telephone"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="date" class="form-label">Born</label>
                                <div class="position-relative">
                                    <input type="date" class="py-2 form-control" id="date" name="date"
                                        value="{{ old('date') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-calendar"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="address" class="form-label">Address</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control"
                                        placeholder="e.g. Jl. Free Fire Factory, No. 1, Kla Only" id="address"
                                        name="address" value="{{ old('address') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-house"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group mandatory is-invalid">
                                <fieldset>
                                    <label class="form-label">
                                        Gender
                                    </label>
                                    <div class="mt-md-2 d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gender-male" value="male">
                                            <label class="form-check-label form-label" for="gender-male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gender-female" value="female">
                                            <label class="form-check-label form-label" for="gender-female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="invalid-feedback d-block">
                                    Error message
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="password" class="form-label">Password</label>
                                <div class="flex-row-reverse d-flex align-items-center position-relative" id="wrapper">
                                    <input type="password" class="py-2 mt-1 form-control"
                                        placeholder="e.g. 4kuBu7uhM3dk1t" id="password" name="password"
                                        maxlength="255">
                                    <div class="pt-1 form-control-icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                </div>
                                <div class="invalid-feedback d-block">
                                    Error message
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="password-confirmation" class="form-label">Password Confirmation</label>
                                <div class="flex-row-reverse d-flex align-items-center position-relative" id="wrapper">
                                    <input type="password" class="py-2 mt-1 form-control"
                                        placeholder="e.g. 4kuBu7uhM3dk1t" id="password-confirmation"
                                        name="password_confirmation" maxlength="255">
                                    <div class="pt-1 form-control-icon">
                                        <i class="bi bi-key-fill"></i>
                                    </div>
                                </div>
                                <div class="invalid-feedback d-block">
                                    Error message
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label id="profile_picture" class="form-label text-danger">Profile Picture</label>

                                    <input type="file" class="image-crop-filepond" name="profile_picture"
                                        id="profile_picture" />
                                </div>
                            </div>

                            <div class="invalid-feedback d-block" style="margin-top: -10px">
                                Error message
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
@endsection
