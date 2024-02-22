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
                <h3>Review</h3>
                <p class="text-subtitle text-muted">
                    Here are all the reviews made by users for a book.
                </p>
                <hr>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Revew</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Your Review --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>Your Review</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-your-review">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Review</th>
                            <th>Edit</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ now()->format('j M Y, \a\t H.i') }}</td>
                            <td>{!! 'Thought-provoking narrative and rich prose. A must-read for any avid book lover!' !!}</td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <span class="badge bg-light-dark">No</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/reviews/1/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-review-destroy="true"
                                            data-unique="1">
                                            <span data-confirm-review-destroy="true" data-unique="1"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/reviews/1" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>{{ now()->format('j M Y, \a\t H.i') }}</td>
                            <td>{!! 'Engaging plot, vivid characters; a captivating read that lingers in your thoughts.' !!}</td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/reviews/2/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-review-destroy="true"
                                            data-unique="2">
                                            <span data-confirm-review-destroy="true" data-unique="2"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/reviews/2" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>{{ now()->format('j M Y, \a\t H.i') }}</td>
                            <td>{!! 'Immersive storytelling! An enriching literary experience worth savoring and sharing.' !!}</td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <span class="badge bg-light-dark">No</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/reviews/3/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-review-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-review-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/reviews/3" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>{{ now()->format('j M Y, \a\t H.i') }}</td>
                            <td>{!! 'Thought-provoking narrative and rich prose. A must-read for any avid book lover!' !!}</td>
                            <td>
                                <span class="badge bg-light-dark">No</span>
                            </td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/reviews/4/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-review-destroy="true"
                                            data-unique="4">
                                            <span data-confirm-review-destroy="true" data-unique="4"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/reviews/4" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
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

    {{-- All Wishlist --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>All Wishlist</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-review">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Review</th>
                            <th>Edit</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="/dashboard/reviews/1">{{ '@' . 'alfianchii' }}</a></td>
                            <td>{{ now()->format('j M Y, \a\t H.i') }}</td>
                            <td>{!! 'Thought-provoking narrative and rich prose. A must-read for any avid book lover!' !!}</td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <span class="badge bg-light-dark">No</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/reviews/1/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-review-destroy="true"
                                            data-unique="1">
                                            <span data-confirm-review-destroy="true" data-unique="1"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/reviews/1" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="/dashboard/reviews/2">{{ '@' . 'lolioverflow' }}</a></td>
                            <td>{{ now()->format('j M Y, \a\t H.i') }}</td>
                            <td>{!! 'Engaging plot, vivid characters; a captivating read that lingers in your thoughts.' !!}</td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/reviews/2/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-review-destroy="true"
                                            data-unique="2">
                                            <span data-confirm-review-destroy="true" data-unique="2"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/reviews/2" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="/dashboard/reviews/3">{{ '@' . 'moepoi' }}</a></td>
                            <td>{{ now()->format('j M Y, \a\t H.i') }}</td>
                            <td>{!! 'Immersive storytelling! An enriching literary experience worth savoring and sharing.' !!}</td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <span class="badge bg-light-dark">No</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/reviews/3/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-review-destroy="true"
                                            data-unique="3">
                                            <span data-confirm-review-destroy="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/reviews/3" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="/dashboard/reviews/4">{{ '@' . 'asawgi' }}</a></td>
                            <td>{{ now()->format('j M Y, \a\t H.i') }}</td>
                            <td>{!! 'Thought-provoking narrative and rich prose. A must-read for any avid book lover!' !!}</td>
                            <td>
                                <span class="badge bg-light-dark">No</span>
                            </td>
                            <td>
                                <span class="badge bg-light-warning">Yes</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="/dashboard/reviews/4/edit" class="px-2 pt-2 btn btn-warning">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-danger" data-confirm-review-destroy="true"
                                            data-unique="4">
                                            <span data-confirm-review-destroy="true" data-unique="4"
                                                class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>

                                    <div class="me-2">
                                        <a href="/dashboard/reviews/4" class="px-2 pt-2 btn btn-info">
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
    @vite('resources/js/components/simple-datatable/dashboard/reviews/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/reviews/alert.js')
    @include('sweetalert::alert')
@endsection
