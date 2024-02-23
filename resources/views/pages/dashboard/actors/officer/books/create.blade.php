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
                            <div class="form-group has-icon-left mandatory @error('title'){{ 'is-invalid' }}@enderror">
                                <label for="title" class="form-label">Title</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. The Midnight Library"
                                        id="title" name="title" value="{{ old('title') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-pen"></i>
                                    </div>

                                    @error('title')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('author'){{ 'is-invalid' }}@enderror">
                                <label for="author" class="form-label">Author</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Matt Haig"
                                        id="author" name="author" value="{{ old('author') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-person"></i>
                                    </div>

                                    @error('author')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('publisher'){{ 'is-invalid' }}@enderror">
                                <label for="publisher" class="form-label">Publisher</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Penguin Books"
                                        id="publisher" name="publisher" value="{{ old('publisher') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-globe"></i>
                                    </div>

                                    @error('publisher')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div
                                class="form-group has-icon-left mandatory @error('year_published'){{ 'is-invalid' }}@enderror">
                                <label for="year_published" class="form-label">Year</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" id="year_published"
                                        name="year_published" value="{{ old('year_published') }}" placeholder="e.g. 2020"
                                        min="1901" max="{{ now()->year }}" maxlength="4" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-calendar-date"></i>
                                    </div>

                                    @error('year_published')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div class="form-group has-icon-left mandatory @error('stock'){{ 'is-invalid' }}@enderror">
                                <label for="stock" class="form-label">Stock</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" id="stock" name="stock"
                                        value="{{ old('stock') }}" placeholder="e.g. 10" min="0" max="1000"
                                        maxlength="4" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-bar-chart"></i>
                                    </div>

                                    @error('stock')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div class="form-group has-icon-left mandatory @error('genres'){{ 'is-invalid' }}@enderror">
                                <label for="genres" class="form-label">Genre</label>
                                <div class="position-relative">
                                    <select id="genres" class="choices form-select multiple-remove"
                                        multiple="multiple" name="genres[]">
                                        <option placeholder>Please pick the genre ...</option>

                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id_genre }}"
                                                @if (old('genres')) @foreach (old('genres') as $oldGenre)
                                                        @if ($oldGenre == $genre->id_genre)
                                                        selected @endif
                                                @endforeach
                                        @endif
                                        >{{ $genre->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('genres')
                                        <div style="margin-top: -20px" class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label id="cover"
                                        class="form-label @error('cover'){{ 'text-danger' }}@enderror">Cover</label>

                                    <input type="file" class="image-preview-filepond" name="cover"
                                        id="cover" />
                                </div>
                            </div>

                            @error('cover')
                                <div class="invalid-feedback d-block" style="margin-top: -10px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-12">
                            <div class="form-group mandatory @error('synopsis'){{ 'is-invalid' }}@enderror">
                                <div class="position-relative">
                                    <label class="form-label">Synopsis</label>

                                    <input id="synopsis" name="synopsis" value="{{ old('synopsis') }}" type="hidden">
                                    <div id="editor">
                                        {!! old('synopsis') !!}
                                    </div>

                                    @error('synopsis')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
