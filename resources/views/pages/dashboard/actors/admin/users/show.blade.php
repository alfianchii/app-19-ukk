@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.sweetalert.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Profile</h3>
                <p class="text-subtitle text-muted">All data from Alfian's account.</p>
                <hr>
                <div class="mb-4">
                    <a href="/dashboard/users/1/edit" class="px-2 pt-2 btn btn-warning me-1">
                        <span class="select-all fa-fw fa-lg fas"></span>
                    </a>
                    <a class="px-2 pt-2 btn btn-danger me-1" data-confirm-user-destroy="true" data-unique="1">
                        <span data-confirm-user-destroy="true" data-unique="1" class="select-all fa-fw fa-lg fas"></span>
                    </a>
                </div>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/users">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">User {{ '@' . 'alfianchii' }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                    @if (auth()?->user()?->profile_photo)
                        <img width="150" class="rounded-circle"
                            src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="User Avatar">
                    @else
                        <img width="150" class="rounded-circle" src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}"
                            alt="User Avatar">
                    @endif

                    <h4 class="mt-4">Alfian</h4>

                    <small class="text-muted">(@alfianchii)</small>
                </div>

                <div class="divider">
                    <div class="divider-text">{{ now()->format('d F Y') }}</div>
                </div>

                <div class="container text-center justify-content-center">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="font-bold">
                                <p>NIK: <span style="font-weight: 400;" class="text-muted">5678901234561234</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="font-bold">
                                <p>Email: <span style="font-weight: 400;" class="text-muted">alfian.ganteng@gmail.com</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="font-bold">
                                <p>Gender:
                                    <span style="font-weight: 400;" class="text-muted">
                                        Male
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="font-bold">
                                <p>Status: <span class="badge bg-primary">Student</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="font-bold">
                                <p>NISN:
                                    <span style="font-weight: 400;" class="text-muted">
                                        6789012345
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/users/alert.js')
@endsection
