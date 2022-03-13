@extends('layouts.admin')
    @section('content')
        <div class="edit-add view index">
            <h3>Products</h3>
            
            <a  href="{{route('products.create')}}" style="display: inline-block;" class="btn btn-create">Create Product</a>
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input name="id" type="text"></td>
                        <td></td>
                        <td><input name="name" type="text"></td>
                        <td><input name="title" type="text"></td>
                        <td><input name="price" type="text" ></td>
                        <td>
                            <select name="status" id="order">
                                <option value="" selected disabled></option>
                                <option value="1">Published</option>
                                <option value="0">Not Published</option>
                            </select>
                        </td>
                        <td>
                            <input name="order" type="number">
                        </td>
                    </tr>
                    @foreach($products as $item)
                            <tr>    
                                <td>{{$item->id}}</td>
                                <td> <img src="{{Storage::url($item->image)}}" alt="Product image"></td>
                                <td>{{$item->name}}</td>
                                <td class="min-w-150">{{implode(' ', array_slice(str_word_count($item->title,1), 0, 2))."..." }}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <span class="status {{$item->status?'published':'not_published'}}">
                                        @if($item->status)
                                            Published
                                        @else
                                           Not Published
                                        @endif
                                    </span>            
                                </td>
                                <td>{{$item->order}}</td>
                                <td>
                                    <div class="buttons">       
                                        <a href="{{route('products.edit',$item->id)}}" class="btn btn-update">Update</a>
                                        <a href="{{route('products.show',$item->id)}}" class="btn btn-show">Show</a>
                                        <a href="{{route('products.destroy',$item->id)}}" onclick="return confirm('Are you sure to delete this data?')" class="btn btn-delete">Delete</a>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                    @if(count($products)===0)
                        <tr>
                            <td style="display: table-cell; text-align:end" colspan="7">
                                Hech narsa topilmadi
                            </td>
                        </tr>
                    @endif
                   
                </tbody>
            </table>
        </div>
        @section('script')
            @if(isset($inputs))
                <script>
                    let arr=<?=json_encode($inputs)?>;
                    for(let item of arr)
                    {
                        $('input[name='+item.name+']').val(item.value);
                        $('select[name='+item.name+']').val(item.value);
                    }
                    
                    console.log(arr);
                </script>
            @endif
        @endsection   
    @endsection