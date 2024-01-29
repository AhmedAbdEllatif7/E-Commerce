@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
Add new category
    @stop
    @endsection
    @section('page-header')
    <br>     <!-- breadcrumb -->
    @section('PageTitle')
    Add new category
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="col">
                            <label for="name">Name Categories</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="image">Image Categorie : <span class="text-danger">*</span></label>
                                <input type="file" accept="application/image" name="image" required>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-left"
                        type="submit">Create</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')

@endsection
