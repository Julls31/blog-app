@extends('admin.master') 
@section('content')
<div class="row mt-5 mb-5"> 
<div class="col-lg-12 margin-tb"> 
<div class="float-left"> 
<h2>Daftar Halaman</h2> 
</div> 
<div class="float-right"> 
<a class="btn btn-success" href="{{ route('pages.create') }}"> Create page</a> 
</div> 
</div> 
</div> 
@if ($message = Session::get('success')) 
<div class="alert alert-success"> 
<p>{{ $message }}</p> 
</div> 
@endif 
<table class="table table-bordered"> 
<tr> 
<th width="20px" class="text-center">No</th> 
<th width="280px"class="text-center">Title</th> 
<th width="280px"class="text-center">Content</th>
<!-- <th width="50px"class="text-center">Tipe Postingan</th> -->
<th width="280px"class="text-center">Action</th> 
</tr> 
@foreach ($pages as $page) 
<tr> 
<td class="text-center">{{ ++$i }}</td> 
<td>{{ $page->title }}</td> 
<td>{{ $page->content }}</td> 
<!-- <td>{{ $page->post_type }}</td>  -->
<td class="text-center"> 
<form action="{{ route('pages.destroy',$page->id) }}" method="post"> 
<a class="btn btn-info btn-sm" href="{{ route('pages.show',$page->id) }}">Show</a> 
<a class="btn btn-primary btn-sm" href="{{ route('pages.edit',$page->id) }}">Edit</a> 
@csrf 
@method('DELETE') 
<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> 
</form> 
</td> 
</tr> 
@endforeach 
</table> 

{!! $pages->links() !!} 
@endsection