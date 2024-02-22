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
                <h3>Book</h3>
                <p class="text-subtitle text-muted">Manage the books in the library.</p>
                <hr>
                <div class="mb-4">
                    <a href="/dashboard/books/create" class="px-2 pt-2 btn btn-success me-1">
                        <span class="text-white select-all fa-fw fa-lg fas"></span> Create Book
                    </a>
                </div>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Book</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Book</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-book">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Year</th>
                            <th>Stock</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Laut Bercerita</td>
                            <td>Leila S. Chudori</td>
                            <td>Penerbit KPG</td>
                            <td>2017</td>
                            <td>11</td>
                            <td>Alfian</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/books/1/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-book-destroy="true"
                                            data-unique="1">
                                            <span data-confirm-book-destroy="true" data-unique="1"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Dompet Ayah Sepatu Ibu</td>
                            <td>J. S. Khairen</td>
                            <td>Gramedia Widia Sarana Indonesia</td>
                            <td>2023</td>
                            <td>8</td>
                            <td>Alfian</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/books/2/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-book-destroy="true"
                                            data-unique="2">
                                            <span data-confirm-book-destroy="true" data-unique="2"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>I Saw the Same Dream Again</td>
                            <td>Yoru Sumino</td>
                            <td>Penerbit Haru</td>
                            <td>2016</td>
                            <td>6</td>
                            <td>Alfian</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/books/3/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-book-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-book-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>The Midnight Library</td>
                            <td>Matt Haig</td>
                            <td>Penguins Library</td>
                            <td>2020</td>
                            <td>13</td>
                            <td>Alfian</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/books/4/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-book-destroy="true"
                                            data-unique="4">
                                            <span data-confirm-book-destroy="true" data-unique="4"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td colspan="8">
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
    @vite('resources/js/components/simple-datatable/dashboard/books/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/books/alert.js')
@endsection
