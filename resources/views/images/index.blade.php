@extends('images.layout')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<a href="{{route('images.create')}}" class="btn show create mb-3">Create</a>
    <table class="table table-bordered  text-center">
    <tr>
      
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>created at</th>
        <th>updated at</th>

        <th  width="300px">Action</th>

    </tr>
    @foreach ($images as $image)
    <tr>
        <td>{{$image->id}}</td>
        <td>{{$image->name}}</td>
        <td><img style="width:50px ;height:50px;" src={{$image->image_url}} /></td>
        <td class="text-success">{{$image->created_at}}</td>
        <td class="text-success">{{$image->updated_at}}</td>

        <td>
                    <a class="btn edit" href="{{ route('images.edit',$image->id) }}">Edit</a>  
                    <form action="{{ route('images.destroy',$image->id) }}" class="companyform" method="POST">   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn delete">Delete</button>
                    </form>
        </td>
      </tr>
      @endforeach

    </table>
    @endsection
