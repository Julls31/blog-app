@extends('admin.master') 
@section('content')
<div class="row mt-5 mb-5"> 
<div class="col-lg-12 margin-tb"> 
<div class="float-left"> 
<h2>Komentar Nich</h2> 

</div> 
@if ($message = Session::get('success')) 
<div class="alert alert-success"> 
<p>{{ $message }}</p> 
</div> 
@endif 
<table class="table table-bordered"> 
<tr> 
<th width="180px" class="text-center">Nama</th> 
<th width="200px" class="text-center">Judul Artikel</th>
<th width="400px" class="text-center">Komentar</th>  
<th width="150px"class="text-center">Action</th>

</tr> 
@foreach ($posts as $post) 
<tr> 
<td>{{ $post->name }}</td> 
<td>{{ $post->title }}</td> 
<td>{{ $post->comment }}</td> 
<td class="text-center"> 

<form action="{{ url('') }}/admin/comment/<?php echo $post->id ?>" method="POST"> 
@csrf 
<div class="row"> 
<div class="col-xs-12 col-sm-12 col-md-12 text-center"> 
<input type="text" name="approve" value="<?php echo $post->id ?>" class="form-control" placeholder="Title" hidden>
<?php if ($post->approve ==null) { ?>
  <button type="submit" class="btn btn-primary">Approve</button>
  </form> 
<?php } else { ?> 
<div class="btn btn-success disabled">Approved</div>
<?php } ?>

<!-- <form action="{{ route('posts.destroy',$post->id) }}" method="POST"> 
@csrf 
@method('DELETE') 
<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Reject</button>  -->
</form> 
</td> 
</tr> 
@endforeach 
</table> 

{!! $posts->links() !!} 
@endsection