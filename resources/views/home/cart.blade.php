@extends('home.layouts.app')
@section('css')

@section('title')
    Checkout Cart
@stop

@section('PageTitle')
    Carts
@stop
@stop

@section('content')
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>date</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>

                                    <tbody class="align-middle">
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="{{URL::asset('attachments/products/'.$order->products->image)}}" alt="Image"></a>
                                                    <p>{{ $order->products->name }}</p>
                                                </div>
                                            </td>
                                            <td>{{ $order->amount }}</td>
                                            <td>
                                                <div class="qty">
                                                    <input type="text" name="quantity" value="{{ $order->quantity }}">
                                                </div>
                                            </td>
                                            <td>
                                                {{ $order->quantity * $order->amount }}
                                            </td>
                                            <td>
                                                {{ $order->created_at->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <!-- Button to trigger the modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $order->id }}" title="Delete"><i class="fa fa-trash"></i></button>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete_book{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Delete {{ $order->products->name }} ?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form action="{{route('orders.destroy', 'test')}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;">Are you sure you want to delete {{ $order->products->name }} ?</h5>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No orders available.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>

                                            <p class="shipping-cost">Shipping Cost<span>20$</span></p>
                                            @if ($totalAmount > 0)
                                                <h2>Total Cost: <span class="total-amount">{{ $totalAmount + 20 }}$</span></h2>
                                            @else
                                                <p>Your cart is empty.</p>
                                            @endif
                                        </div>
                                        <div class="cart-btn">
                                            @if ($totalAmount > 0)
                                                <a href="{{ route('customer-address.index') }}" class="btn btn-success btn-checkout">Checkout</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Cart End -->

        @endsection
        @section('js')
        @endsection
