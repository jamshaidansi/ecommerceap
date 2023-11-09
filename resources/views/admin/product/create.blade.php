@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                        <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <select name="category_id" class="form-control form-select">
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group mb-2" >
                                    <input class="form-control @error('title') is-invalid @enderror" type="text"  name="title" placeholder="Enter the title">
                                    @error('title')
                                    <div class="invalid-feedback mb-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12 form-group " >
                                    <input class="form-control @error('desc') is-invalid @enderror" type="text" name="desc" placeholder="Enter the desc">
                                    @error('desc')
                                    <div class="invalid-feedback mb-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12 form-group ">
                                    <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" placeholder="Enter the price">
                                    @error('price')
                                    <div class="invalid-feedback mb-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12 form-group ">
                                    <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock" placeholder="Enter the stock">
                                    @error('stock')
                                    <div class="invalid-feedback mb-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-12 form-group ">
                                    <input class="form-control @error('default_picture') is-invalid @enderror" type="file" name="default_picture" >
                                    @error('default_picture')
                                    <div class="invalid-feedback mb-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row ">
                                <div class="col-md-12 text-end" >
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
