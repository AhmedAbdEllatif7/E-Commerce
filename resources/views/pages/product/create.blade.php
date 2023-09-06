@extends('layouts.master')
@section('css')

@section('title')
    اضافة  منتج جديد
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة منتج جديدة
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

                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="categorie_id"> Categorie   : <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="categorie_id">
                                <option selected disabled>اختر اسم Categorie ...</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col">
                            <label for="name">Name prodect</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                    </div>
                    <br>
                    <div class="form-row">

                        <div class="col">
                            <label for="price">price</label>
                            <input type="number" name="price" class="form-control">
                        </div>

                    </div>
                    <br>
                    <div class="form-row">

                        <div class="col">
                            <label for="name">descount_price</label>
                            <input type="number" name="descount_price" class="form-control">
                        </div>

                    </div>
                    <br>
                    <div class="form-row">

                        <div class="col">
                            <label for="name">description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control summernote"></textarea>
                        </div>

                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="image">المرفقات : <span class="text-danger">*</span></label>
                                <input type="file" accept="application/image/*" name="image" multiple required>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
