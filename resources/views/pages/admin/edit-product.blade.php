@extends('layouts.admin.layout')
@section('content')
    <form method="post" action="{{ url('input-product/'. $products->id) }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Nama produk" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputPrice" name="price" placeholder="Harga produk" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputStock" class="col-sm-2 col-form-label">Stock</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputStock" name="stock" placeholder="Stok produk" required>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
@endsection