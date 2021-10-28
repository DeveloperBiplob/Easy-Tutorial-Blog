<style>
    .image {
        width: 110px;
        display: inline-block;
    }
    .latest-post-sidebar {
        display: inline-block;
    }
    form#searchForm {
        margin: 0 !important;
    }
    ul#showSearchData {
        background: #607d8b17;
    }
    ul#showSearchData li {

    }
    ul#showSearchData li:last-child {
        border-bottom: none;
    }
    ul#showSearchData li a {
        padding: 0 5px;
        color: #000000b8;
        font-family: 'FontAwesome';
        display: block;
        transition: .4s;
    }
    ul#showSearchData li:hover a{
        background: rgb(197, 182, 182);
    }
    #loderDiv {
        width: 30%;
        height: 30%;
        margin: auto;
        margin-top: 30px;
        display: none;
    }

</style>
<div class="col-lg-4">
    <div class="sidebar">
      <div class="row">
        <div class="col-lg-12">
          <div class="sidebar-item search">
            <form id="searchForm" action="#">
              <input type="text" class="searchText" id="searchInput" placeholder="type to search...">
            </form>
            <div id="loderDiv">
                <img id="loader" width="100%" src="{{ asset('loader.gif') }}" alt="">
            </div>
            <div id="show-data">
                <ul id="showSearchData">

                </ul>
              </div>
            </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item recent-posts">
            <div class="sidebar-heading">
              <h2>Recent Posts</h2>
            </div>
            <div class="content">
              <ul>
                @foreach ($latestPosts as $post)
                <li><a href="post-details.html">
                    <div class="image">
                        <img src="{{ asset($post->image) }}" alt="..." class="img-fluid">
                    </div>
                    <div class="latest-post-sidebar">
                        <h5 style="margin-top:10px">{{ $post->title }}</h5>
                        <span>{{ $post->created_at->format("M d, Y") }}</span>
                    </div>
                  </a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item categories">
            <div class="sidebar-heading">
              <h2>Categories</h2>
            </div>
            <div class="content">
              <ul>
                @foreach ($categories as $category)
                <li><a href="#">- {{ $category->name }}</a></li>
                @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item tags">
            <div class="sidebar-heading">
              <h2>Tag Clouds</h2>
            </div>
            <div class="content">
              <ul>
                @foreach ($tags as $tag)
                <li><a href="#">{{ $tag->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('script')
    <script>
        const selectElement = (el) => document.querySelector(el);

        let searchInput = selectElement('#searchInput');
        let lodeDiv = selectElement('#loderDiv')
        searchInput.addEventListener('keyup', async function(e){
            // console.log(e.target.value);
            let query = e.target.value;
            let url = `${window.location.origin}/search-post/${query}`;

            try{
                lodeDiv.style.display = 'block';
                // let response = await axios.get(url);
                let {data:posts} = await axios.get(url);
                displayPost(posts);

            }catch(err){
                lodeDiv.style.display = 'none';

            }finally{
                lodeDiv.style.display = 'none';
            }


        });

        const displayPost = (posts) => {
        let showSearchData = select('#showSearchData');
        let li = null ;
        if(Object.keys(posts).length === 0){
            li = `<li style="list-style:none;text-align:center;background:#ccc" class="p-2 text-danger">No Post Found!!</li>`;
        }else{
            li = posts.map(post => {
                // return `<li><a href="/post/${post.slug}">${post.name} | ${post.author.name}</a></li>`;
                return `<li><a href=""><i class="fa fa-search"></i>  ${post.title} | ${post.author.name}</a></li>`;
            });
            li = li.join(" ")
        }


        showSearchData.innerHTML = li;
    }
    </script>
  @endpush
