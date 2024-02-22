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
                <h3>Wishlist</h3>
                <p class="text-subtitle text-muted">
                    Here are all the wishlists made by users for a book.
                </p>
                <hr>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Your Wishlist --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>Your Wishlist</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-your-wishlist">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Book</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dompet Ayah Sepatu Ibu</td>
                            <td>J. S. Khairen</td>
                            <td>Fiction, Slice of Life, Humanism</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                            data-unique="1">
                                            <span data-confirm-wishlist-destroy="true" data-unique="1"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/wishlists/1" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>The Midnight Library</td>
                            <td>Matt Haig</td>
                            <td>Fiction, Slice of Life, Library</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                            data-unique="2">
                                            <span data-confirm-wishlist-destroy="true" data-unique="2"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/wishlists/2" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Laut Bercerita</td>
                            <td>Leila S. Chudori</td>
                            <td>Slice of Life, History Fiction, Thriller</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-wishlist-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/wishlists/3" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>I Saw the Same Dream Again</td>
                            <td>Yoru Sumino</td>
                            <td>Slice of Life, Fiction, Drama</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                            data-unique="4">
                                            <span data-confirm-wishlist-destroy="true" data-unique="4"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/wishlists/4" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td colspan="5">
                                <p class="pt-3 text-center">Nothing :(</p>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- All Wishlist --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>All Wishlist</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-wishlist">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Book</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="/dashboard/users/1">{{ '@' . 'alfianchii' }}</a></td>
                            <td>Dompet Ayah Sepatu Ibu</td>
                            <td>{{ now()->format('j F Y, \a\t H.i') }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-wishlist-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/wishlists/1" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="/dashboard/users/2">{{ '@' . 'lolioverflow' }}</a></td>
                            <td>The Midnight Library</td>
                            <td>{{ now()->format('j F Y, \a\t H.i') }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-wishlist-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/wishlists/2" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="/dashboard/users/3">{{ '@' . 'moepoi' }}</a></td>
                            <td>Laut Bercerita</td>
                            <td>{{ now()->format('j F Y, \a\t H.i') }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-wishlist-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/wishlists/3" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="/dashboard/users/4">{{ '@' . 'asawgi' }}</a></td>
                            <td>I Saw the Same Dream Again</td>
                            <td>{{ now()->format('j F Y, \a\t H.i') }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-wishlist-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/wishlists/4" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td colspan="5">
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
    @vite('resources/js/components/simple-datatable/dashboard/wishlists/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/wishlists/alert.js')
    @include('sweetalert::alert')
@endsection
