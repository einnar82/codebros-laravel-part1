@extends('layouts.index')

@section('add_form')
<form action="{{route('posts.store')}}" method="post">
    @csrf
    <input type="text" name="title" placeholder="Enter title"><br/>
    <textarea name="content" id="" cols="30" rows="10"></textarea><br/>
    <input type="submit" value="Add Post">
</form>
@endsection
