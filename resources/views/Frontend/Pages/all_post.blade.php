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
                  <h4>Recent Posts</h4>
                  <h2>Our Recent Blog Entries</h2>
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
                    @foreach ($posts as $post)
                    <div class="col-lg-6">
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
                              <li><a href="#">{{ count($post->comments) }}</a></li>
                            </ul>
                            <p>{!! $post->description !!}</p>
                            <div class="post-options">
                              <div class="row">
                                <div class="col-lg-12">
                                  <ul class="post-tags">
                                    <li><i class="fa fa-tags"></i></li>
                                    @foreach ($post->tags as $tag)
                                    <li><a href="#">{{ $tag->name }}</a>,</li>
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  <div class="col-lg-12">
                    <div style="width: 200px; margin:auto">
                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    {{-- <ul class="page-numbers">
                      <li><a href="#">1</a></li>
                      <li class="active"><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul> --}}
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

