@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-3">Category View</div>
                        <div class="card-body">
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
                                    <th scope="col">#Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->desc}}</td>
                                        <td>
                                            <a class="btn btn-primary mx-2" href="{{route('edit.category',$category->id)}}">Edit</a>
                                            <a class="btn btn-outline-danger" href="{{route('delete.category',$category->id)}}">Delete</a>
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


