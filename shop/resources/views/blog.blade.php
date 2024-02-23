@extends('main')

@section('content')
<!-- Main -->        
<main class="main">
    <div class="container">
        <div class="page-header breadcrumb-wrap">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fas fa-home mr-10"></i>Home</a>
                <span></span> Blog
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row blog-grid-row">
                        @foreach ($blogs as $blog)
                        <div class="col-md-6 col-sm-12">
                            <!-- Blog Post -->
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="/blog-detail/{{ $blog->id }}-{{ \Str::slug($blog->name) }}.html">
                                        <img class="img-fluid" src="{{ $blog->thumb }}" 
                                        style="object-fit: cover; width: 350px; height: 200px">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li style="flex: none; max-width: none;">
                                            <i class="far fa-clock me-2"></i>{{ $blog->created_at->format('j M Y') }}
                                        </li>
                                    </ul>
                                    <h3 class="blog-title">
                                        <a href="/blog-detail/{{ $blog->id }}-{{ \Str::slug($blog->name) }}.html">{{ $blog->name }}</a>
                                    </h3>
                                    <p class="mb-0">{{ $blog->description }}</p>
                                </div>
                            </div>
                            <!-- /Blog Post -->
                            
                        </div>
                        @endforeach
                    </div>
                    <style>
                        .page-item.active .page-link{
                            background-color: #EB4648 !important;
                            color: #fff !important;
                            border-color: #EB4648 !important;
                        }
                        .page-link{
                            color: #EB4648 !important;
                        }
                        .page-link:hover{
                            background-color: #EB4648 !important;
                            color: #fff !important;
                            border-color: #EB4648 !important;
                        }
                        .search-ajax-result{
                            box-sizing: border-box;
                            background-color: #fff !important;
                            z-index: 1000;
                            top: 100%;
                            left: 0;
                            display: none
                        }
                    </style>
                    <div class="d-flex justify-content-center mt-30">{{ $blogs->render("pagination::bootstrap-4") }}</div>
                </div>
                <div class="col-lg-4 sticky-sidebar">
                    <div class="blog-widget">
                        <div class="blog-search mb-30">
                            <div class="search-form">
                                <form action="#">
                                    <div class="position-relative">
                                        <input class="form-control input-search-ajax" type="text" placeholder="Search…"/>
                                        <button type="submit" class="blog-btn" disabled><i class="fi-rs-search"></i></button>
                                    </div>
                                    <div class="search-ajax-result d-flex flex-column mt-1 position-absolute border">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                        $('.search-ajax-result').hide();
                        $('.input-search-ajax').keyup(function(){
                            var _text = $(this).val();
                            if (_text != ''){
                                $.ajax({
                                    url: "{{ route('ajax-search-blog') }}?key=" + _text,
                                    type: 'GET',
                                    success: function(res){
                                        var _html = '';
                                        _html += '<ul class="latest-posts shadow px-3 pt-3 bg-body rounded" style="width:103% !important;margin-left: -5px">';
                                        for (var blog of res){
                                            var slug = convertToSlug(blog.name)
                                            _html += '<li>';
                                            _html += '<div class="post-thumb">';
                                            _html += '<a href="/blog-detail/'+ blog.id + '-' + slug +'.html"><img class="img-fluid" src="'+ blog.thumb + '"></a>';
                                            _html += '</div>';
                                            _html += '<div class="post-info">';
                                            _html += '<h4><a href="/blog-detail/'+ blog.id + '-' + slug +'.html">'+ blog.name +'</a></h4>';
                                            var createdAtDate = new Date(blog.created_at);
                                            var options = { day: 'numeric', month: 'short', year: 'numeric' };
                                            var formattedDate = createdAtDate.toLocaleDateString('en-GB', options);
                                            _html += '<p>' + formattedDate + '</p>';
                                            _html += '</div></li>';
                                        }
                                        _html += '</ul>';
                                    
                                        $('.search-ajax-result').show(500)
                                        $('.search-ajax-result').html(_html)
                                    }
                                });
                            } else {
                                $('.search-ajax-result').html('')
                                $('.search-ajax-result').hide()
                            }
                        })

                        function convertToSlug(Text) {
                            return Text
                                .toLowerCase()
                                .replace(/ /g, '-')
                                .replace(/[^\w-]+/g, '')
                        }
                        </script>
                        <div class="card category-widget post-widget">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Blog Categories</h4>
                            </div>
                            <div class="card-body">
                                <ul class="categories">
                                    @foreach($menus as $key => $menu)
                                    <li>
                                        <a href="/blog/{{ $menu->menu_id }}-{{ $menu->name }}">
                                            {{ $menu->name }}<span>({{ $menu->menu_count }})</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card post-widget">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Latest Posts</h4>
                            </div>
                            <div class="card-body">
                                <ul class="latest-posts">
                                    @foreach ($latests as $latest)                        
                                    <li>
                                        <div class="post-thumb">
                                            <a href="/blog-detail/{{ $blog->id }}-{{ \Str::slug($blog->name) }}.html">
                                                <img class="img-fluid" src="{{ $latest->thumb }}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <h4>
                                                <a href="/blog-detail/{{ $blog->id }}-{{ \Str::slug($blog->name) }}.html">{{ $latest->name }}</a>
                                            </h4>
                                            <p>{{ $latest->created_at->format('j M Y') }}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- /Main -->
@endsection