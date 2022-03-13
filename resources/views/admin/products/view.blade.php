@extends('layouts.admin')
    @section('content')
        <div class="edit-add view show">
            <h3 style="margin: 20px 0px">Products</h3>
            
            <a  href="{{route('products.edit',$product->id)}}" class="btn">Update</a>
            <a href="{{route('products.destroy',$product->id)}}" onclick="return confirm('Are you sure to delete this data?')" class="btn btn-delete">Delete</a>
            <table class="table" width="100%">
                <tr>
                    <th>Id</th>
                    <td>{{$product->id}}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{Storage::url($product->image)}}" alt="This is a image of product {{$product->id}}">    
                    </td>
                </tr>        
                <tr>
                    <th>Name</th>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$product->title}}</td>
                </tr>        
                <tr>
                    <th>Price</th>
                    <td>{{$product->price}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$product->status}}</td>
                </tr>
                <tr>
                    <th>Order</th>
                    <td>{{$product->order}}</td>
                </tr>
            </table>
        </div>   
    @endsection