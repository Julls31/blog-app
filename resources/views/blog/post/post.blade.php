@extends ('blog.post.master')
@section ('konten') 
<!-- Page Header-->
        <header class="masthead" style="background-image: url('{{asset('')}}blog2/assets/img/dugong.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
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
                            <p><?php echo $row->id; ?></p>
                            <br>
                            <?php } ?>
                            Placeholder text by
                            <a href="http://spaceipsum.com/">Julls Berita-man</a>
                            &middot; Images by
                            <a href="https://pict.sindonews.net/size/640/salsabila/slider/2022/08/17697/ilmuwan-umumkan-dugong-telah-punah-di-china-wxb.jpg">Del Esshole on The Commons</a>
                             <br><br><br><br>
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
                                        <input type="text" class="form-control form-control-user" name="post_id" value="<?= $row->id;?>" 
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