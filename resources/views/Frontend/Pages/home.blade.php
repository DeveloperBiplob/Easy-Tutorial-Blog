
@extends('Frontend.Layouts.frontend_primary')

@section('frontend_primary_content')
        <!-- Banner Starts Here -->
        <div class="main-banner header-text">
            <div class="container-fluid">
              <div class="owl-banner owl-carousel">
                @foreach ($randPosts as $post)
                <div class="item">
                    <img src="{{ asset($post->image) }}" alt="">
                    <div class="item-content">
                      <div class="main-content">
                        <div class="meta-category">
                          <span>{{ $post->category->name }}</span>
                        </div>
                        <a href="{{ route('frontend.single-post', $post->slug) }}"><h4>{{ $post->title }}</h4></a>
                        <ul class="post-info">
                          <li><a href="#">Admin</a></li>
                          <li><a href="#">{{ $post->created_at->format("M d, Y") }}</a></li>
                          <li><a href="#">12 Comments</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- Banner Ends Here -->

        <!-- Subscriber Module -->
        <x-subscriber-component/>


          <section class="blog-posts">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="all-blog-posts">
                    <div class="row">
                        @foreach ($latestPosts as $post)
                        <div class="col-lg-12">
                            <div class="blog-post">
                              <div class="blog-thumb">
                                <img src="{{ asset($post->image) }}" alt="">
                              </div>
                              <div class="down-content">
                                <span>{{ $post->category->name }}</span>
                                <a href="{{ route('frontend.single-post', $post->slug) }}"><h4>{{ $post->title }}</h4></a>
                                <ul class="post-info">
                                  <li><a href="#">Admin</a></li>
                                  <li><a href="#">{{ $post->created_at->format("M d, Y") }}</a></li>
                                  <li><a href="#">12 Comments</a></li>
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
                        @endforeach
                      <div class="col-lg-12">
                        <div class="main-button">
                          <a href="{{ route('frontend.all-post') }}">View All Posts</a>
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
