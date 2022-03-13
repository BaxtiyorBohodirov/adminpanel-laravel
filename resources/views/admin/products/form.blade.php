<?php $type=isset($product)?'update':'store';?>
<div class="form-edit">
    <form method="POST" enctype="multipart/form-data" action="{{route('products.'.$type,isset($product)?$product->id:'')}}">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="image">Image</label><br>
            <div>
                <div class="images">
                    <img src="{{isset($product)?Storage::url($product->image):''}}" alt="">
                </div>
                <input type="file"  id="image" name="image" required>
            </div>
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Images</label><br>
            <div>
                <div class="images">
                    <img src="{{isset($product)?Storage::url($product->images):''}}" alt="">
                </div>
                <input type="file"  id="images" name="images" multiple="multiple" required>
            </div>
            @error('images')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Name</label><br>
            <input type="text"  id="name" name="name" value="{{isset($product)?$product->name:''}}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" value="{{isset($product)?$product->title:''}}" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label><br>
            <input type="text" id="price" name="price" value="{{isset($product)?$product->price:''}}" required>
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label><br>
            <input type="text" id="status" name="status" value="{{isset($product)?$product->status:''}}" required>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="order">Order</label><br>
            <input type="text" id="order" name="order" value="{{isset($product)?$product->order:''}}" required> 
            @error('order')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="submit" class="btn btn-create" value="Save">
    </form>
</div>