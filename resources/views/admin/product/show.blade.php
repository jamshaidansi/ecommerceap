@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-3">Category View
                        <a href="{{route('create.product')}}" class="btn-outline-primary btn float-end">Craete</a>
                    </div>
                    <div class="card-body">
                        <form  action="{{route('show.product')}}" method="GET">
                            <div class="row">

                                <div class="col-md-2">
                                    <select name="category_id" class="form-select form-select ">
                                        <option value="" >--All--</option>
                                        @foreach($categories  as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control" name="title" placeholder="Search products">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary ">Search</button>
                                </div>
                            </div>


                        </form>
                        <div class="m-4">
                            @if(session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            @if(session('danger'))
                                <div class="alert alert-danger">{{session('danger')}}</div>
                            @endif
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                            <th >#Id</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th >Title</th>
                            <th >Description</th>
                            <th >Price</th>
                            <th >Status</th>
                            <th >Stock</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        <img src="{{asset($product->product_picture)}}" width="100px" height="90px">
{{--                                        {{$product->product_picture}}--}}
{{--                                        @dump($product->product_picture)--}}
                                    </td>
                                    <td>
                                        @if($product->category)
                                            {{$product->category->name}}
                                        @else
                                            --
                                        @endif

                                    </td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->desc}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>
                                        <a class="btn btn-outline-primary mx-2" href="#">Edit</a>{{--{{route('edit.category',$category->id)}}--}}
                                        <a class="btn btn-outline-danger" href="#">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


