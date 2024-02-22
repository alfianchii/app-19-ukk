@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Create Genre</h3>
                <p class="text-subtitle text-muted">
                    Create a new genre for the books in the library.
                </p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/genres">Genre</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                <form class="form" action="/dashboard/genres" method="POST">
                    @csrf

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="name" class="form-label">Name</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Fiction"
                                        id="name" name="name" value="{{ old('name') }}" />
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
                                <label for="description" class="form-label">Description</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control"
                                        placeholder="e.g. Fiction is a form of any work designed to entertain ..."
                                        id="description" name="description" value="{{ old('description') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-envelope-paper"></i>
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
@endsection
