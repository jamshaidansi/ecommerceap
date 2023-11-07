@extends('layouts.app')
@section('content')
<div class="m-4">
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if(session('danger'))
        <div class="alert alert-danger">{{session('danger')}}</div>
    @endif
</div>
    <table class="table table-hover mx-5">
        <thead>
        <tr>
            <th scope="col">#Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th>Action</th>
        </tr>
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
@endsection
