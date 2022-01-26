@extends('images.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
  <li>{{$error}}</li>
</ul>
@endforeach
</div>
@endif
<div class="bb">

<form class="form mx-auto" action="{{route('images.store') }}" enctype="multipart/form-data" method="POST">
@csrf



     <div class="row">
    <label for="name" class="col-md-3 col-form-label">Name</label>

    <div class="form-group col-md-9">
      <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name">
      @error('name')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
     </div> 

     <div class="row">

    <label for="image" class="col-md-3 col-form-label">Image</label>
    <div  class="form-group col-md-9">
    <input type="file" value="{{old('image')}}" name="image" class="form-control" id="image">

      @error('image')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    </div>

    

  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary ">Create</button>
        </div>

</form>
</div>
@endsection