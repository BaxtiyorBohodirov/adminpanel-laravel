@extends('layouts.admin')
    @section('content')
        <div class="create-product view">
            <h3>Create Product</h3>
            @include('admin.products.form')
        </div>
    @endsection