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
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>Book</h4>

                    <div class="mb-3 dropdown dropdown-color-icon d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-all fa-fw fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/books/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-books">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/books/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-books">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/books/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-books">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/books/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-books">
                                <input type="hidden" name="type" value="MPDF">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> PDF
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <th>Genre</th>
                            <th>Stock</th>
                            <th>Wishlist</th>
                            <th>Review</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->year_published }}</td>
                                <td>
                                    @foreach ($book->genres as $genre)
                                        @if (!$loop->last)
                                            {{ $genre->name }},
                                        @elseif($loop->count === 1)
                                            {{ $genre->name }},
                                        @else
                                            and {{ $genre->name }}.
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $book->stock }}</td>
                                <td>{{ $book->wishlists->count() }}</td>
                                <td>{{ $book->reviews->count() }}</td>
                                <td>
                                    <a
                                        href="/dashboard/users/{{ $book->createdBy->id_user }}">{{ '@' . $book->createdBy->username }}</a>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <a href="/dashboard/books/{{ $book->id_book }}/edit"
                                                class="px-2 pt-2 btn btn-warning">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>

                                        <div class="me-2">
                                            <a class="px-2 pt-2 btn btn-danger" data-confirm-book-destroy="true"
                                                data-unique="{{ $book->id_book }}">
                                                <span data-confirm-book-destroy="true" data-unique="{{ $book->id_book }}"
                                                    class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">
                                    <p class="pt-3 text-center">Nothing :(</p>
                                </td>
                            </tr>
                        @endforelse
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
    @include('sweetalert::alert')
    @vite('resources/js/components/sweetalert/dashboard/books/alert.js')
@endsection
