@extends('layouts.index')

@section('details')
<h1>Title: {{$post->title}}</h1>
<p>Content: {{$post->content}}</p>
@endsection
