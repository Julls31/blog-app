@extends('admin.master') 
@section('content') 
<div class="row mt-5 mb-5"> 
<div class="col-lg-12 margin-tb"> 
<div class="float-left"> 
<h2>Create New Post</h2> 
</div> 
<div class="float-right"> 
<a class="btn btn-secondary" href="{{ url('admin/posts') }}"> Back</a> 
</div> 
</div> 
</div> 
@if ($errors->any()) 
<div class="alert alert-danger"> 
<strong>peringatan!</strong> There were some problems with your input.<br><br> 
<ul> 

@foreach ($errors->all() as $error) 
<li>{{ $error }}</li> 
@endforeach 
</ul> 
</div> 
@endif 

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
@csrf 
<div class="row"> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Title:</strong>
<div hidden>{{$id = Session::get ('id')}}</div>
<input type="text" name="user_id" value="{{$id}}" hidden>
<input type="text" name="post_type" value="post" hidden>  
<input type="text" name="title" class="form-control" placeholder="Title"> 
</div> 
</div> 

</div>
<!-- <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>  -->

<label class="block mb-4">
                    <span class="sr-only">Choose File</span>
                    <input type="file" name="file" id="tunjukberkas"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                    @error('image')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </label>

<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Content:</strong> 
<textarea class="form-control" style="height:150px" name="content" placeholder="Content"></textarea> 
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12 text-center"> 
<button type="submit" class="btn btn-primary">Submit</button> 
</div> 
</div> 
</form>

@endsection

