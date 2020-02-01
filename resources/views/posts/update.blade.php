@extends('layouts.index')

@section('update_form')
<form action="/posts/{{$post->id}}" method="post">
    @method('PUT')
    @csrf
    <input type="text" name="title" placeholder="Enter title" value={{$post->title}}><br/>
    @error('title')
    <p style="color:red">{{$message}}</p>
    @enderror
    <textarea name="content" id="" cols="30" rows="10">{{$post->content}}</textarea><br/>
    @error('content')
    <p style="color:red">{{$message}}</p>
    @enderror
    <input type="submit" value="Update Post">
</form>
@endsection
