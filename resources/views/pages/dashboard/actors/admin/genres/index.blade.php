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
                <h3>Genre</h3>
                <p class="text-subtitle text-muted">Manage the genre of the books in the library.</p>
                <hr>
                <div class="mb-4">
                    <a href="/dashboard/genres/create" class="px-2 pt-2 btn btn-success me-1">
                        <span class="text-white select-all fa-fw fa-lg fas"></span> Create Genre
                    </a>
                </div>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Genre</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Genre</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-genre">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Book(s)</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Action</td>
                            <td>Action films usually include high energy, big-budget physical stunts and chases, possibly
                                with rescues, battles, fights, escapes, destructive crises, etc.</td>
                            <td>6</td>
                            <td>Alfian</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/genres/1/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-genre-destroy="true"
                                            data-unique="1">
                                            <span data-confirm-genre-destroy="true" data-unique="1"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Adventure</td>
                            <td>Adventure films are usually exciting stories, with new experiences or exotic locales, very
                                similar to or often paired with the action film genre.</td>
                            <td>3</td>
                            <td>Alfian</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/genres/2/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-genre-destroy="true"
                                            data-unique="2">
                                            <span data-confirm-genre-destroy="true" data-unique="2"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Comedy</td>
                            <td>Comedy is a story that tells about a series of funny, or comical events, intended to make
                                the audience laugh. It is a very open genre, and thus crosses over with many other genres on
                                a regular basis.</td>
                            <td>7</td>
                            <td>Alfian</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/genres/3/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-genre-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-genre-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Drama</td>
                            <td>Drama is a genre of narrative fiction (or semi-fiction) intended to be more serious than
                                humorous in tone, focusing on in-depth development of realistic characters who must deal
                                with realistic emotional struggles.</td>
                            <td>2</td>
                            <td>Alfian</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/genres/4/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-genre-destroy="true"
                                            data-unique="4">
                                            <span data-confirm-genre-destroy="true" data-unique="4"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td colspan="6">
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
    @vite('resources/js/components/simple-datatable/dashboard/genres/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/genres/alert.js')
    @include('sweetalert::alert')
@endsection
