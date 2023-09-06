@extends('layouts.master')
@section('css')

@section('title')
     orders
     @stop
     @endsection
     @section('page-header')
     <!-- breadcrumb -->
     @section('PageTitle')
     Orders
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
                                <a href="{{route('orders.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Create New orders</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name Customers</th>
                                            <th>Name Category</th>
                                            <th>Name Products</th>
                                            <th>Price</th>
                                            <th>quantity</th>
                                            <th>size</th>
                                            <th>color</th>
                                            <th>Payment status</th>
                                            <th>Address</th>
                                            <th>Processes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($NotDeletedOrders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->customers->name }}</td>
                                                <td>{{ $order->categories->name }}</td>
                                                <td>{{ $order->products->name }}</td>
                                                <td>{{ $order->amount }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->size }}</td>
                                                <td>{{ $order->color }}</td>
                                                <td>
                                                    @if ($order->payment_status == 0)
                                                        <span class="badge badge-danger">Not paid</span>
                                                    @else
                                                        <span class="badge badge-success">Paid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->address_title == null )
                                                        <span class="badge badge-danger">No address</span>
                                                    @else
                                                        <strong><span class="badge badge-success"><a href="{{route('show.address')}}" >{{$order->address_title}}</a></span></strong>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin-orders.edit', $order->id) }}" class="btn btn-info btn-sm" title="Edit" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $order->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete_book{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف {{ $order->products->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin-orders.destroy', $order->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id" value="{{ $order->id }}">
                                                                <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد مع عملية الحذف ؟{{ $order->products->name }}</h5>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-danger">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="12">No unpaid orders found.</td>
                                            </tr>
                                        @endforelse

                                    </table>
                                </div>

                                <br>
                                <h3>Paid orders</h3>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name Customers</th>
                                            <th>Name Category</th>
                                            <th>Name Products</th>
                                            <th>Price</th>
                                            <th>quantity</th>
                                            <th>size</th>
                                            <th>color</th>
                                            <th>Payment status</th>
                                            <th>Address</th>
                                            <th>Processes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($PaidOrders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->customers->name }}</td>
                                                <td>{{ $order->categories->name }}</td>
                                                <td>{{ $order->products->name }}</td>
                                                <td>{{ $order->amount }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->size }}</td>
                                                <td>{{ $order->color }}</td>
                                                <td>
                                                    @if ($order->payment_status == 0)
                                                        <span class="badge badge-danger">Not paid</span>
                                                    @else
                                                        <span class="badge badge-success">Paid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->customerAddress)
                                                        <strong><span class="badge badge-success"><a href="{{ route('show.address', $order->customerAddress->id) }}">{{ $order->customerAddress->address_title }}</a></span></strong>
                                                    @else
                                                        <span class="badge badge-danger">No address</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('admin-orders.edit', $order->id) }}" class="btn btn-info btn-sm" title="Edit" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    {{-- <a href="{{ route('admin-orders.show', $order->id) }}" class="btn btn-info btn-sm" title="Show" role="button" aria-pressed="true"><i class="fa fa-book"></i></a> --}}
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $order->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete_book{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف {{ $order->products->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ route('admin-orders.destroy', $order->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id" value="{{ $order->id }}">
                                                                {{-- <input type="hidden" name="file_name" value="{{ $order->image }}"> --}}
                                                                <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد مع عملية الحذف ؟{{ $order->products->name }}</h5>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-danger">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="12">No paid orders found.</td>
                                            </tr>
                                        @endforelse

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
