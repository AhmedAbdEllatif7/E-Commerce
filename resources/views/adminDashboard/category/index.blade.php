@extends('adminDashboard.layouts.master')
@section('css')

@section('title')
     Categories
     @stop
     @endsection
     @section('page-header')
     <br>     <!-- breadcrumb -->
     @section('PageTitle')
     Categories
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('category.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Create new category +</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category name</th>
                                            <th>Category photo</th>
                                            <th>Processes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $categorie)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$categorie->name}}</td>
                                                <td><img style="width: 70px; height: 80px " src="{{URL::asset('attachments/categories/'.$categorie->image)}}" alt=""></td>
                                                <td>

                                                    <a href="{{route('category.edit',$categorie->id)}}" class="btn btn-info btn-sm" title="Edit" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $categorie->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                        {{-- @include('admin.library.destroy') --}}
                                        <div class="modal fade" id="delete_book{{$categorie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Delete {{$categorie->name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('category.destroy', $categorie->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="file_name" value="{{ $categorie->image }}">
                                                            <h5 style="font-family: 'Cairo', sans-serif;">Are you sure you want to delete it?</h5>
                                                            
                                                            <div class="modal-footer d-flex justify-content-start">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- row closed -->
@endsection
@section('js')

@endsection
