@extends('layouts.admin.layout')

@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Invoice List</h3>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#dasboardModal" >New Invoice</button>
                            @include('pages.admin.includes.add-invoice')
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($products->isNotEmpty())
                            @foreach($products as $key => $product)
                                @foreach($product->invoices as $key => $invoice)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $invoice->invoice }}</td>
                                        <td>{{ $invoice->user_name }}</td>
                                        <td>{{ $invoice->user_email }}</td>
                                        <td>{{ $invoice->user_phone }}</td>
                                        <td>
                                            <a href="{{ url('edit-invoice/'. $invoice->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-pencil-alt"></span></a>
                                            <a href="{{ url('delete-invoice/'. $invoice->id) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Product List</h3>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCar" >New Product</button>
                            @include('pages.admin.includes.add-car')
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($products->isNotEmpty())
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ $product->price }}
                                        </td>
                                        <td>
                                            {{ $product->stock }}
                                        </td>
                                        <td>
                                            <a href="{{ url('edit-product/'. $product->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-pencil-alt"></span></a>
                                            <a href="{{ url('delete-product/'. $product->id) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection