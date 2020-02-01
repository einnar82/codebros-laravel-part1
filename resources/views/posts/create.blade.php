@extends('layouts.index')

@section('add_form')
<form action="{{route('posts.store')}}" method="post">
    @csrf
    <input type="text" name="title" placeholder="Enter title"><br/>
    @error('title')
    <p style="color:red">{{$message}}</p>
    @enderror
    <textarea name="content" id="" cols="30" rows="10"></textarea><br/>
    @error('content')
    <p style="color:red">{{$message}}</p>
    @enderror
    <input type="submit" value="Add Post">
</form>
@endsection
