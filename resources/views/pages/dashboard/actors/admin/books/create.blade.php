@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.quill.link')
    @include('utils.filepond.link')
    @include('utils.choices.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Create Book</h3>
                <p class="text-subtitle text-muted">
                    Create a new book in the library.
                </p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/books">Book</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                <form class="form" action="/dashboard/books" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="title" class="form-label">Title</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. The Midnight Library"
                                        id="title" name="title" value="{{ old('title') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-pen"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="author" class="form-label">Author</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Matt Haig"
                                        id="author" name="author" value="{{ old('author') }}" />
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
                                <label for="publisher" class="form-label">Publisher</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Penguin Books"
                                        id="publisher" name="publisher" value="{{ old('publisher') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-globe"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="year_published" class="form-label">Year</label>
                                <div class="position-relative">
                                    <input type="number" class="py-2 form-control" id="year_published"
                                        name="year_published" value="{{ old('year_published') }}" placeholder="e.g. 2020"
                                        min="1900" max="{{ now()->year }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-calendar-date"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="stock" class="form-label">Stock</label>
                                <div class="position-relative">
                                    <input type="number" class="py-2 form-control" id="stock" name="stock"
                                        value="{{ old('stock') }}" placeholder="e.g. 10" min="0" max="1000" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-bar-chart"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="genres" class="form-label">Genre</label>
                                <div class="position-relative">
                                    <select id="genres" class="choices form-select multiple-remove"
                                        multiple="multiple" name="genres[]">
                                        <option placeholder>Please pick the genre ...</option>
                                        <option value="action" selected>Action</option>
                                        <option value="sci-fi">Sci-fi</option>
                                        <option value="fiction">Fiction</option>
                                    </select>

                                    <div style="margin-top: -20px" class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label id="cover" class="form-label text-danger">Cover</label>

                                    <input type="file" class="image-preview-filepond" name="cover"
                                        id="cover" />
                                </div>
                            </div>

                            <div class="invalid-feedback d-block" style="margin-top: -10px">
                                Error message
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-12">
                            <div class="form-group mandatory is-invalid">
                                <div class="position-relative">
                                    <label class="form-label">Synopsis</label>

                                    <input id="synopsis" name="synopsis" value="{{ old('synopsis') }}" type="hidden">
                                    <div id="editor">
                                        {!! old('synopsis') !!}
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
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
    @include('utils.quill.script')
    @vite('resources/js/components/quill/dashboard/books/editor.js')
    @include('utils.filepond.script')
    @vite('resources/js/components/filepond/image-preview/photo.js')
    @include('utils.choices.script')
@endsection
