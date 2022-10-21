@extends ('blog.post.master')
@section ('konten') 
<!-- Page Header-->
<?php foreach ($gambar as $row) {?>
        <header class="masthead" style="background-image: url('{{asset('')}}<?php echo $row->file_path;?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                             <?php } ?>
                            <?php foreach ($posts as $row) { ?>
                                <h1>
                                <?php echo $row->title; ?></h1>
                            
                                                        <span class="meta">
                                Posted by
                                <a href="#!">Julls</a>
                                on October 04, 2022
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                            <p><?php echo $row->content; ?></p>
                            <!-- <p><?php echo $row->id; ?></p> -->
                            <br>
                            <?php } ?>
                            Placeholder text by
                            <a href="http://spaceipsum.com/">Julls Berita-man</a>
                            &middot; Images by
                            <a href="https://pict.sindonews.net/size/640/salsabila/slider/2022/08/17697/ilmuwan-umumkan-dugong-telah-punah-di-china-wxb.jpg">Del Esshole on The Commons</a>
                             <br><br><br><br>
                             <hr>
                             <h4 class="mb-0">Recent comments</h4>
            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
            <?php foreach ($comment as $row) {?>
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1"><?php echo $row->name; ?></h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    March 07, 2021
                    <span class="badge bg-primary">Pending</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                <p class="mb-0">
                  <?= $row->comment;?>
                </p>
              </div>
            </div>
                <br>
                <br>

                        <?php } ?>
                            <h1>Komentar</h1>
                            <form action="{{ route('comment') }}" method="POST">
                                @csrf
           <br> <textarea class="form-control" style="height:150px" name="comment" placeholder="Komentar"></textarea> <br>
                            <form class="user">
                                <div class="form-group ">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}"
                                            placeholder="Name">
                                    <!-- </div> -->
                                <div class="form-group ">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="post_id" value="<?= $post;?>" 
                                            placeholder="Name" hidden>
                                    <!-- </div> -->
                                    <br>
                                </div>
                                <div class="form-group ">
                                    <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}"
                                        placeholder="Email Address">
                                </div>
                                <br>

                                <button type ="submit" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                                <hr>

                            </form>
                        </p>
                    </div>
                </div>
            </div>
        </article>
@endsection   