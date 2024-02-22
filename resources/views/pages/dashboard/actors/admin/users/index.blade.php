@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.simple-datatable.link')
    @include('utils.sweetalert.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>User</h3>
                <p class="text-subtitle text-muted">The entire data of each user.</p>
                <hr>
                <div class="mb-4">
                    <a href="/dashboard/users/create" class="px-2 pt-2 btn btn-success me-1">
                        <span class="text-white select-all fa-fw fa-lg fas"></span> Registration
                    </a>
                </div>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
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
                <table class="table table-striped" id="table-user">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                @if (auth()?->user()?->profile_photo)
                                    <img class="rounded" width="100"
                                        src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="User Avatar" />
                                @else
                                    <img class="rounded" width="100" src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}"
                                        alt="User Avatar" />
                                @endif
                            </td>
                            <td>Alfian</td>
                            <td>{{ now()->format('j F Y, \a\t H.i') }}</td>
                            <td>
                                <span class="badge bg-info">Admin</span>
                            </td>
                            <td>
                                <span class="badge bg-light-success">Active</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/users/1/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-user-destroy="true"
                                            data-unique="1">
                                            <span data-confirm-user-destroy="true" data-unique="1"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-success" data-confirm-user-activate="true"
                                            data-unique="1">
                                            <span data-confirm-user-activate="true" data-unique="1"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/users/1" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                @if (auth()?->user()?->profile_photo)
                                    <img class="rounded" width="100"
                                        src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="User Avatar" />
                                @else
                                    <img class="rounded" width="100" src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}"
                                        alt="User Avatar" />
                                @endif
                            </td>
                            <td>Nugraha</td>
                            <td>{{ now()->format('j F Y, \a\t H.i') }}</td>
                            <td>
                                <span class="badge bg-warning">Officer</span>
                            </td>
                            <td>
                                <span class="badge bg-light-success">Active</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/users/2/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-user-destroy="true"
                                            data-unique="2">
                                            <span data-confirm-user-destroy="true" data-unique="2"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-success" data-confirm-user-activate="true"
                                            data-unique="2">
                                            <span data-confirm-user-activate="true" data-unique="2"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/users/2" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                @if (auth()?->user()?->profile_photo)
                                    <img class="rounded" width="100"
                                        src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="User Avatar" />
                                @else
                                    <img class="rounded" width="100" src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}"
                                        alt="User Avatar" />
                                @endif
                            </td>
                            <td>Moepoi</td>
                            <td>{{ now()->format('j F Y, \a\t H.i') }}</td>
                            <td>
                                <span class="badge bg-success">Reader</span>
                            </td>
                            <td>
                                <span class="badge bg-light-danger">Non-active</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/users/3/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-user-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-user-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-success" data-confirm-user-activate="true"
                                            data-unique="3">
                                            <span data-confirm-user-activate="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/users/3" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>
                                @if (auth()?->user()?->profile_photo)
                                    <img class="rounded" width="100"
                                        src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                        alt="User Avatar" />
                                @else
                                    <img class="rounded" width="100"
                                        src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="User Avatar" />
                                @endif
                            </td>
                            <td>Ogi</td>
                            <td>{{ now()->format('j F Y, \a\t H.i') }}</td>
                            <td>
                                <span class="badge bg-warning">Reader</span>
                            </td>
                            <td>
                                <span class="badge bg-light-success">Active</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/users/4/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-user-destroy="true"
                                            data-unique="4">
                                            <span data-confirm-user-destroy="true" data-unique="4"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-success" data-confirm-user-activate="true"
                                            data-unique="4">
                                            <span data-confirm-user-activate="true" data-unique="4"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/users/4" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td colspan="7">
                                <p class="pt-3 text-center">Nothing :(</p>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.simple-datatable.script')
    @vite('resources/js/components/simple-datatable/dashboard/users/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/users/alert.js')
@endsection
