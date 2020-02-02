@extends('layouts.index')

@section('add_form')
Hello,

This is your post details,

<h1>Title: {{$post->title}}</h1>
<p>Content: {{$post->content}}</p>
@endsection
