@extends('layouts.admin.layout')

@section('content')
    <form method="post" action="{{ url('input-invoice/'.$invoice->id) }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Nama Pembeli" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email Pembeli" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Nomor Telepon Pembeli" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="carType" class="col-sm-2 col-form-label">Car</label>
            <div class="col-sm-10">
                <select class="form-control" name="products_id" id="carType" required>
                    @if($products->isNotEmpty())
                        @foreach($products as $key => $product)
                            <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price }} - {{ $product->stock }}</option>
                        @endforeach
                    @else
                        <option disabled value="" selected>You must add product before add new Invoice</option>
                    @endif
                </select>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
@endsection