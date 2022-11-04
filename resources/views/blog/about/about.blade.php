@extends ('blog.about.master')
@section ('konten') 
        <!-- Main Content-->
        <?php foreach ($about as $row) {?>
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h1><?php echo $row->title; ?></h1>
                        <a href="#!"><img class="img-fluid" src="blog2/assets/img/rickroll-rick.gif" alt="..." /></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
@endsection