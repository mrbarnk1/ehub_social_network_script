@include('inc.head')
  <body>
      <style type="text/css">
        body {
            /*background-color: #eeeeee;*/
        }

        .h7 {
            font-size: 0.8rem;
        }

        .gedf-wrapper {
            margin-top: 0.97rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 4rem;
                padding-right: 4rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }

        /**Reset Bootstrap*/
        .dropdown-toggle::after {
            content: none;
            display: none;
        }
      </style>
    <!-- Header
    ================================================= -->
		@include('inc.header')
    <!--Header End-->

    <div id="page-contents">
    	<div class="container">
    		<div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			@include('inc.left-sidebar')
          <!-- Newsfeed Common Side Bar Left End
          ================================================= -->
          
    			<div class="col-md-7">
                            <!--- \\\\\\\Post-->
              <form action="{{ route('post.store') }}" class="dropzone" id="my-awesome-dropzone" method="POST" enctype="multipart/form-data" hidden="">
                @csrf
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true"><i class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;Make
                                    a post</a>
                            </li>
                            <li class="nav-item" hidden>
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images"><i class="ion-images"></i>&nbsp;&nbsp;&nbsp;Photos/Videos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea name="content" class="form-control" id="message" rows="3" placeholder="What are you thinking?" style="z-index: 9999!important;"></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input name="images[]" type="file" class="form-control custom-file-input" id="customFile" multiple="true">
                                        <label class="custom-file-label" for="customFile">Upload image</label>
                                    </div>
                                </div>
                                <div class="py-4"></div>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">share</button>
                            </div>
                            <!-- <div class="btn-group" hidden="hidden">
                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-globe"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
              </form>
                <!-- Post /////-->
            <form action="{{ route('post.store') }}" class="dropzone" id="my-awesome-dropzone post_content" method="POST" enctype="multipart/form-data">
              @csrf
            <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
            	<div class="row">
            		<div class="col-md-10 col-sm-10">
                  <div class="form-group">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />
                    <textarea name="content" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right btn-post">Publish</button>
                </div>
            		<div class="col-md-5 col-sm-5" hidden="">
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
                      <!-- <li><a href="#"><i class="ion-compose"></i></a></li> -->
                      <!-- <li><a href="#"><i class="ion-images"></i></a></li>
                      <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                      <li><a href="#"><i class="ion-map"></i></a></li> -->
                    </ul>
                    <button type="submit" class="btn btn-primary pull-right">Publish</button>
                  </div>
                </div>
            	</div>
            </div><!-- Post Create Box End-->
          </form>
          <br>
            <!-- Post Content
            ================================================= -->
            
            <?php 
            //   $min = min(count($homePost), count($postImages));
            //   $result = array_combine(array_slice($homePost, 0, $min), array_slice($postImages, 0, $min));
            // dd($result);
              foreach ($homePost as $post) {
                // echo $keyvalue->id;
                // echo "$post->id";
                // dd($post);
                // $posts[] = $post;
                // dd(array_keys(($posts)));
                $images = json_decode($post->images);
                print_r($images);
                // dd(array_merge($homePost , $postImages));
              ?>
            {{-- @foreach($homePost as $post) --}}
            
            <div class="post-content">
              <img src="{{ $post->image }}" alt="post-image" class="img-responsive post-image" />
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">{{ $post->id }}</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a post about 3 mins ago</p>
                  </div>
                  <div class="reaction">
                    <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                    <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-text">
                    <p>{{ $post->content }}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-comment">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                    <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                  </div>
                  <div class="post-comment">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                    <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                  </div>
                  <div class="post-comment">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                    <input type="text" class="form-control" placeholder="Post a comment">
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
             ?>
            {{-- @foreach --}}
            

            <!-- Post Content End
            ================================================= -->
          </div>

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
    			@include('inc.right-sidebar')
          <!-- Newsfeed Common Side Bar Right Ebd
          ================================================= -->
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
@include('inc.footer')
<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    // body...
    $(".dropzone").submit(function (e) {
      e.preventDefault();
      // $(".btn-post").attr('disabled', 'disabled');
        $.ajax({
                url: "{{ route('post.store') }}",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function () {
                  $(".btn-post").css("opacity", "0.5");
                  $(".btn-post").html('Posting...');
                  $(".btn-post").attr('disabled', 'disabled');
                },
                success: function(data){
                  $(".btn-post").css("opacity", "1");
                  $(".btn-post").html('Publish');
                  $(".btn-post").removeAttr('disabled', 'disabled');
                    if(data == 'ok'){
                      // $(".post-content").load();
                      $('.post-content').load(document.URL +  ' .post-content');
                      // $('form').load(document.URL +  ' form');
                       $("textarea").val('');
                    }else if (data == 'session expired') {
                      window.location.href = "{{ url('/') }}";
                    }else {
                       Swal({
                        type: 'error',
                        title: data,
                        // text: data,
                        // footer: 'Contact us?'
                        });
                    }
                }
              });
        });
  });
</script>