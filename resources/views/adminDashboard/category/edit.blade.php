@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
Edit Category
        @stop
        @endsection
        @section('page-header')
        <br>     <!-- breadcrumb -->
        @section('PageTitle')
        Edit Category
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

                <form method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">

                        <div class="col">
                            <label for="name">product name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
{{--                            <input type="hidden" name="id" value="{{ $category->id }}" class="form-control">--}}

                        </div>

                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <img src="{{ URL::asset('attachments/categories/'.$category->image) }}" type="application/jpg"   height="150px" width="150px"><br><br>
                            <div class="form-group">
                                <label for="image">Attachments : <span class="text-danger">*</span></label>
                                <input type="file" accept="application/image" name="image" >
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-left"
                        type="submit">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
