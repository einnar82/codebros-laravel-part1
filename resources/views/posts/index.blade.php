@extends('layouts.index')

@section('table')
<table border="1">
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Content</th>
  </tr>
  @foreach ($posts as $post)
  <tr>
    <td>{{$post->id}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->content}}</td>
    <td><a href="{{url("posts/$post->id")}}">View</a></td>
    <td><a href="{{url("posts/$post->id/edit")}}">Edit</a></td>
    <td>
        <form action="{{url("posts/$post->id")}}" method="post">
            <input type="submit" value="Delete">
            @method('DELETE')
            @csrf
        </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection
