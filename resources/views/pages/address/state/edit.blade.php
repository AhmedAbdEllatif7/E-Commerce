@extends('layouts.master')
@section('css')

@section('title')
       Edit States
       @stop
       @endsection
       @section('page-header')
       <!-- breadcrumb -->
       @section('PageTitle')
       Edit States
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
                <div class="ml-auto">
                    <a href="{{ route('states.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">Back to countries</span>
                    </a>
                </div>
                <form method="POST" action="{{ route('states.update',$state->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUt')
                    <div class="form-row">

                        <div class="col">
                            <label for="name">Name states</label>
                            <input class="form-control" id="name" type="text" name="name" value="{{ $state->name }}">
                            <input type="hidden" name="id" value="{{ $state->id }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                    </div>
                    <br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
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
