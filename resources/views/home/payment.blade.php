@extends('home.layouts.app')

@section('css')
    <!-- Additional CSS styles -->
@endsection

@section('title')
    Payment
@endsection

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Payment
    @endsection
    <!-- breadcrumb -->
@endsection

@section('content')
<br>
    <div class="container mt-14">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-4 mx-auto">
                            <div class="checkout-inner" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                                <div class="checkout-summary">
                                    <h1 class="text-center mb-6">Cart Total</h1>
                                    @php
                                        $totalAmount = 0;
                                    @endphp
                                    @foreach ($orders as $order)
                                        <div class="cart-item" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                            <p class="cart-item-title" style="flex-grow: 1;">{{ $order->products->name }}</p>
                                            <p class="cart-item-quantity" style="margin-left: 20px;">Quantity : {{ $order->quantity }}</p>
                                            
                                        </div>
                                        @php
                                            $totalAmount += $order->amount * $order->quantity;
                                        @endphp
                                    @endforeach
                                    <hr class="my-3">
                                    <div class="cart-total" style="display: flex; justify-content: space-between; margin-bottom: 10px; font-weight: bold;">
                                        <p class="cart-total-label" style="flex-grow: 1;">Subtotal:</p>
                                        <p class="cart-total-amount" style="margin-left: 20px;">{{ $totalAmount }}$</p>
                                    </div>
                                    <div class="cart-shipping" style="display: flex; justify-content: space-between; margin-bottom: 10px; font-weight: bold;">
                                        <p class="cart-shipping-label" style="flex-grow: 1;">Shipping Cost:</p>
                                        <p class="cart-shipping-amount" style="margin-left: 20px;">20$</p>
                                    </div>
                                    <hr class="my-3">
                                    <div class="cart-grand-total" style="display: flex; justify-content: space-between; margin-bottom: 10px; font-weight: bold;">
                                        <p class="cart-grand-total-label" style="flex-grow: 1;">Grand Total:</p>
                                        <p class="cart-grand-total-amount" style="margin-left: 20px;">{{ $totalAmount + 20 }}$</p>
                                    </div>
                                </div>
                                <div class="checkout-btn text-center mt-4">
                                    <a href="{{ route('payment') }}" class="btn btn-success btn-lg" style="background-color: #28a745; color: #fff;">Pay Now</a>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('js')
    <!-- Additional JavaScript scripts -->
@endsection
