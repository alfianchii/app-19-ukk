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
                <h3>Receipt</h3>
                <p class="text-subtitle text-muted">This is a list of all receipts that have been made by the admin or
                    officer.
                </p>
                <hr>
                <div class="mb-4">
                    <a href="/dashboard/receipts/create" class="px-2 pt-2 btn btn-success me-1">
                        <span class="text-white select-all fa-fw fa-lg fas"></span> Create Receipt
                    </a>
                </div>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Receipt</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>Receipt</h4>

                    <div class="mb-3 dropdown dropdown-color-icon d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-all fa-fw fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/receipts/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-receipts">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/receipts/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-receipts">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/receipts/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-receipts">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/receipts/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-receipts">
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
                <table class="table table-striped" id="table-receipt">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Reader</th>
                            <th>Book</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nugraha</td>
                            <td>Dompet Ayah Sepatu Ibu</td>
                            <td>6</td>
                            <td><span class="badge bg-success">Returned</span></td>
                            <td>{{ now()->format('j M Y') }} to {{ now()->subDays(-7)->format('j M Y') }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-success" data-confirm-book-returned="true"
                                            data-unique="1">
                                            <span data-confirm-book-returned="true" data-unique="1"
                                                class="select-all fa-fw fa-lg fas"></span>
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
                                        <a href="/dashboard/receipts/1" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Moepoi</td>
                            <td>The Visual MBA</td>
                            <td>3</td>
                            <td><span class="badge bg-warning">Taken</span></td>
                            <td>{{ now()->format('j M Y') }} to {{ now()->subDays(-7)->format('j M Y') }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-success" data-confirm-book-returned="true"
                                            data-unique="2">
                                            <span data-confirm-book-returned="true" data-unique="2"
                                                class="select-all fa-fw fa-lg fas"></span>
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
                                        <a href="/dashboard/receipts/2" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Galih</td>
                            <td>Laut Bercerita</td>
                            <td>7</td>
                            <td><span class="badge bg-danger">Overdue</span></td>
                            <td>{{ now()->format('j M Y') }} to {{ now()->subDays(-7)->format('j M Y') }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-success" data-confirm-book-returned="true"
                                            data-unique="3">
                                            <span data-confirm-book-returned="true" data-unique="3"
                                                class="select-all fa-fw fa-lg fas"></span>
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
                                        <a href="/dashboard/receipts/3" class="px-2 pt-2 btn btn-info">
                                            <span class="select-all fa-fw fa-lg fas"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ogi</td>
                            <td>Talking to Strangers</td>
                            <td>7</td>
                            <td><span class="badge bg-warning">Taken</span></td>
                            <td>{{ now()->format('j M Y') }} to {{ now()->subDays(-7)->format('j M Y') }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a class="px-2 pt-2 btn btn-success" data-confirm-book-returned="true"
                                            data-unique="4">
                                            <span data-confirm-book-returned="true" data-unique="4"
                                                class="select-all fa-fw fa-lg fas"></span>
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
                                        <a href="/dashboard/receipts/4" class="px-2 pt-2 btn btn-info">
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
    @vite('resources/js/components/simple-datatable/dashboard/receipts/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/receipts/alert.js')
    @include('sweetalert::alert')
@endsection
