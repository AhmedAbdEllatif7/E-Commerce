@extends('layouts.master')
@section('css')

@section('title')
     Categorie
     @stop
     @endsection
     @section('page-header')
     <!-- breadcrumb -->
     @section('PageTitle')

     Categorie
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
                                   aria-pressed="true">Create New Categore</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم القسم</th>
                                            <th>صور القسم</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $categorie)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$categorie->name}}</td>
                                                <td><img style="width: 70px; " src="{{URL::asset('attachments/upload_attachments/'.$categorie->image)}}" alt=""></td>
                                                <td>

                                                    <a href="{{route('category.edit',$categorie->id)}}" class="btn btn-info btn-sm" title="Edit" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('category.show',$categorie->id)}}" class="btn btn-info btn-sm" title="Show" role="button" aria-pressed="true"><i class="fa fa-book"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $categorie->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                        {{-- @include('pages.library.destroy') --}}
                                        <div class="modal fade" id="delete_book{{$categorie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف {{$categorie->name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('category.destroy',$categorie->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{$categorie->id}}">
                                                            <input type="hidden" name="file_name" value="{{$categorie->image}}">
                                                            <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد مع عملية الحذف ؟</h5>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button  class="btn btn-danger">Submit</button>
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
    <!-- row closed -->
@endsection
@section('js')

@endsection
