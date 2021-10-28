<style>
    .blog-posts .comments ul li .author-thumb {
        width: 100px;
        display: inline-block;
    }
    .blog-posts .comments ul li .right-content {
        margin-left: 10px !important;
        width: 600px;
        display: inline-block;
    }
</style>
@extends('Frontend.Layouts.frontend_primary')

@section('frontend_primary_content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>Post Details</h4>
                  <h2>Single blog post</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

        <!-- Subscriber Module -->
        <x-subscriber-component/>


      <section class="blog-posts grid-system">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        <img src="{{ asset($post->image) }}" alt="">
                      </div>
                      <div class="down-content">
                        <span>{{ $post->category->name }}</span>
                        <h4>{{ $post->title }}</h4>
                        <ul class="post-info">
                          <li><a href="#">Admin</a></li>
                          <li><a href="#">{{ $post->created_at->format("M d, Y") }}</a></li>
                          <li><a href="#">10 Comments</a></li>
                        </ul>
                        <p>{!! $post->description !!}</p>
                        <div class="post-options">
                          <div class="row">
                            <div class="col-6">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                @foreach ($post->tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a>,</li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="col-6">
                              <ul class="post-share">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="#">Facebook</a>,</li>
                                <li><a href="#"> Twitter</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="sidebar-item comments">
                      <div class="sidebar-heading">
                        <h2>{{ count($post->comments) }} comments</h2>
                      </div>
                      <div class="content">
                        <ul class="commet-ul">
                            @foreach ($post->comments as $comment)
                            <li class="comment-li">
                                <div class="author-thumb">
                                  <img src="{{ asset('Frontend') }}/assets/images/comment-author-01.jpg" alt="">
                                </div>
                                <div class="right-content">
                                  <h4>{{ $comment->name }}<span>{{ $comment->created_at->format("M d, Y") }}</span></h4>
                                  <p style="display: block">{!! $comment->comment !!}</p>
                                </div>
                              </li>
                            @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="sidebar-item submit-comment">
                      <div class="sidebar-heading">
                        <h2>Your comment</h2>
                      </div>
                      <div class="content">
                        <form action="{{ route('frontend.comment', $post->slug) }}" method="post">
                            @csrf
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your name">
                              </fieldset>
                              @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" placeholder="Your email">
                              </fieldset>
                              @error('email')
                                <span class="text-danger">{{ $message }}</span>
                               @enderror
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Subject">
                              </fieldset>
                              @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="comment" rows="6" id="comment" placeholder="Type your comment"></textarea>
                              </fieldset>
                              @error('comment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Side bar Content -->
            <x-sidebar-component :latestPosts="$latestPosts" :categories="$categories" :tags="$tags" />
          </div>
        </div>
      </section>
@endsection
