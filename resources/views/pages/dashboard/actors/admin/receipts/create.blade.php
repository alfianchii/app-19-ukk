@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.choices.link')
    @include('utils.flatpickr.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Create Receipt</h3>
                <p class="text-subtitle text-muted">
                    Create a new receipt for readers who want to read a book and bring it back later.
                </p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/receipts">Receipt</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Receipt</h4>
            </div>
            <div class="card-body">
                <form class="form" action="/dashboard/receipts" method="POST">
                    @csrf

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="user" class="form-label">User</label>
                                <div class="position-relative">
                                    <select id="user" class="choices form-select" name="id_user">
                                        <option value="1" selected>Alfian</option>
                                        <option value="2">Nugraha</option>
                                        <option value="3">Moepoi</option>
                                    </select>

                                    <div style="margin-top: -20px" class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="book" class="form-label">Book</label>
                                <div class="position-relative">
                                    <select id="book" class="choices form-select" name="id_book">
                                        <option value="1" selected>Dompet Ayah Sepatu Ibu</option>
                                        <option value="2">Laut Bercerita</option>
                                        <option value="3">The Midnight Library</option>
                                    </select>

                                    <div style="margin-top: -20px" class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="amount" class="form-label">Amount</label>
                                <div class="position-relative">
                                    <input type="number" class="py-2 form-control" id="amount" name="amount"
                                        value="{{ old('amount') }}" placeholder="e.g. 5" min="0" max="5" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-bar-chart"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="from_time" class="form-label">From</label>
                                <div class="position-relative">
                                    <input name="from_time" id="from_time" type="date"
                                        class="mb-2 form-control flatpickr-from" placeholder="Select date ..."
                                        value="{{ old('from_time') ?? date('Y-m-d') }}">
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-calendar-day"></i>
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory is-invalid">
                                <label for="to_time" class="form-label">To</label>
                                <div class="position-relative">
                                    <input name="to_time" id="to_time" type="date"
                                        class="mb-2 form-control flatpickr-to" placeholder="Select date ..."
                                        value="{{ old('to_time') }}">
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-calendar-check"></i>
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
    @include('utils.choices.script')
    @include('utils.flatpickr.script')
    @vite('resources/js/components/flatpickr/dashboard/receipts/date.js')
@endsection
