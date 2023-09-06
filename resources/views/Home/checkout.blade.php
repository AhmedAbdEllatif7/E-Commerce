@extends('Home.home')
@section('css')

@section('title')
Checkout
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Checkout
@stop
<!-- breadcrumb -->
@endsection
@section('content')

        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-13">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                 <div class="row">
                                     <div class="col-md-6">
                            </div>
                                </div>
                                <div class="row">
                                    @if (auth('customer')->check() && auth('customer')->user()->orders->isEmpty())
                                        <p>No available orders.</p>
                                    @else
                                        <form action="{{route('customer_address.show', 'test')}}" method="get" >
                                            <label>You have an address ?</label>
                                            <select name="address_title" onchange="this.form.submit()">
                                                @foreach($customer_address as $customer_addres)
                                                    <option selected disabled>Your title</option>
                                                <option value="{{$customer_addres->address_title}}">{{$customer_addres->address_title}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    <br>
                                    <form class="row" action="{{ route('customer_address.store') }}" method="POST">
                                        @csrf
                                        <div class="col-md-6">
                                            <label>Address Title</label>
                                            <input class="form-control @error('address_title') is-invalid @enderror" name="address_title" type="text" placeholder="Address Title"  >
                                            @error('address_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>First Name</label>
                                            <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" type="text" placeholder="First Name"  >
                                            @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Last Name</label>
                                            <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" type="text" placeholder="Last Name"   >
                                            <input type="hidden" name="customer_id" value="{{ auth('customer')->user()->id }}">
                                            @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="countrie_id">Countries: <span class="text-danger">*</span></label>
                                                <select class="custom-select @error('countrie_id') is-invalid @enderror" name="countrie_id"   >
                                                    <option selected disabled>Countries ...</option>
                                                    @foreach ($countries as $countrie)
                                                        <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('countrie_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="state_id">States: <span class="text-danger">*</span></label>
                                                <select class="custom-select @error('state_id') is-invalid @enderror" name="state_id"   >
                                                    <option selected disabled>States ...</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('state_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="citie_id">Cities: <span class="text-danger">*</span></label>
                                                <select class="custom-select @error('citie_id') is-invalid @enderror" name="citie_id"   >
                                                    <option selected disabled>Cities ...</option>
                                                    @foreach ($cities as $citie)
                                                        <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('citie_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>E-mail</label>
                                            <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" placeholder="E-mail"   >
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mobile No</label>
                                            <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text" placeholder="Mobile No"   >
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label>Address</label>
                                            <input class="form-control @error('address') is-invalid @enderror" name="address" type="text" placeholder="Address"   >
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit">Next</button>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->
        @endsection
        @section('js')

        @endsection
