@extends('layouts.master')
@section('css')

@section('title')
       create Citie
       @stop
       @endsection
       @section('page-header')
       <!-- breadcrumb -->
       @section('PageTitle')
       create Citie
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
                    <a href="{{ route('cities.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">Back to cities</span>
                    </a>
                </div>
                <form method="post" action="{{ route('cities.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Name cities</label>
                            <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                            <label for="name">Name countries</label>
                            <select name="state_id" id="state_id" class="form-control">
                                <option selected disabled>---- States</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="image">Cities : <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">--- Status</option>
                                    <option value="1" {{ old('status') == "1" ? 'selected' : null }}>Active</option>
                                    <option value="0" {{ old('status') == "0" ? 'selected' : null }}>Inactive</option>
                                </select>
                                @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
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
