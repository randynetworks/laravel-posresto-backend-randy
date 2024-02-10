@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Form</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Products</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Products</h2>
                <div class="card">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <x-form-input type="text" label="Name" name="name" />
                            <x-form-input type="text" label="Description" name="description" />
                            <div class="row">
                                <div class="col-md-4">
                                    <x-form-input type="file" label="Image" name="image" />
                                </div>
                                <div class="col-md-4">
                                    <x-form-input type="number" label="Price" name="price" />
                                </div>
                                <div class="col-md-4">
                                    <x-form-input type="number" label="Stock" name="stock" />
                                </div>
                                @php
                                    $activeOption = (object) ['id' => 1, 'name' => 'Active'];
                                    $inactiveOption = (object) ['id' => 0, 'name' => 'Not Active'];
                                @endphp
                                <div class="col-md-4">
                                    <x-form-select name="status" :options="[$activeOption,$inactiveOption]"
                                                   label="Status" />
                                </div>
                                <div class="col-md-4">
                                    <x-form-select name="favorite" :options="[$activeOption,$inactiveOption]"
                                                   label="Favorite" />
                                </div>
                            </div>
                            <x-form-select name="category_id" :options="$categories" label="Category" />
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
