

@extends('Home.layout.app')
@section('css')

    @section('title')
        Categories
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        Categories
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="header-slider normal-slider">
                    @foreach($categories as $categorie)
                        <div class="header-slider-item" style="text-align: center; padding: 20px;">
                            <img src="{{ URL::asset('attachments/upload_attachments/' . $categorie->image) }}" alt="Slider Image" style="width: 100%; height: 700px; border-radius: 10px; object-fit: cover; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);" />
                            <div class="header-slider-caption">
                                <p style="font-size: 24px; font-weight: bold; margin-top: 20px;">{{ $categorie->name }}</p>
                                <a class="btn" href="{{ route('customer.category.show', $categorie->id) }}" style="display: inline-block; padding: 10px 20px; background-color: #ff9800; color: #fff; border-radius: 5px; text-decoration: none; font-weight: bold; margin-top: 10px; transition: background-color 0.3s ease;">Shop Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')



@endsection
