@extends('main')
@section('content')
<main class="main" style="transform: none;">
<div class="container">
    <div class="page-header breadcrumb-wrap">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fas fa-home mr-10"></i>Home</a>
            <span></span> Blog
            <span></span> Blog Details
        </div>
    </div>
</div>
<div class="page-content" style="transform: none;">
    <div class="container" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-lg-8">
                <div class="blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="{{ $blog->thumb }}"></a>
                    </div>
                    <h3 class="blog-title"><a href="javascript:void(0)">{{ $blog->name }}</a></h3>
                    <div class="blog-info clearfix">
                        <div class="post-left">
                            <ul>
                                <li><i class="far fa-clock"></i>{{ $blog->created_at->format('j M Y') }}</li>
                                <li><i class="far fa-comments"></i>12 Comments</li>
                                <li><i class="fa fa-tags"></i>{{ $blog->menu->name }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-content">
                        <p>{!! $blog->content !!}</p>
                    </div>
                </div>
                <div class="card blog-share post-widget">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Share the post</h4>
                    </div>
                    <div class="card-body">
                        <ul class="social-share">
                            <li><a href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card blog-comments post-widget">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Comments (12)</h4>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="comments-list">
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <img class="avatar" alt="" src="/template/assets/img/user/user-01.jpg">
                                    </div>
                                    <div class="comment-block">
                                        <span class="comment-by">
                                            <span class="blog-author-name">Michelle Fairfax</span>
                                        </span>
                                        <p>GOOD GOOD GOOD GOOD GOOD GOOD GOOD GOOD GOOD GOOD GOOD</p>
                                        <p class="blog-date">Jan 6, 2022</p>
                                        <a class="comment-btn" href="#">
                                            <i class="fas fa-reply"></i> Reply
                                        </a>
                                    </div>
                                </div>
                                <ul class="comments-list reply">
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author">
                                                <img class="avatar" alt="" src="/template/assets/img/user/user-02.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <span class="comment-by">
                                                    <span class="blog-author-name">Gina Moore</span>
                                                </span>
                                                <p>GOOD</p>
                                                <p class="blog-date">Jan 6, 2022</p>
                                        <a class="comment-btn" href="#">
                                            <i class="fas fa-reply"></i> Reply
                                        </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author">
                                                <img class="avatar" alt="" src="/template/assets/img/user/user-03.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <span class="comment-by">
                                                    <span class="blog-author-name">Carl Kelly</span>
                                                </span>
                                                <p>NICE</p>
                                                <p class="blog-date">January 7, 2022</p>
                                        <a class="comment-btn" href="#">
                                            <i class="fas fa-reply"></i> Reply
                                        </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <img class="avatar" alt="" src="/template/assets/img/user/user-04.jpg">
                                    </div>
                                    <div class="comment-block">
                                        <span class="comment-by">
                                            <span class="blog-author-name">Elsie Gilley</span>
                                        </span>
                                        <p>:)))</p>
                                        <p class="blog-date">January 11, 2022</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <img class="avatar" alt="" src="/template/assets/img/user/user-05.jpg">
                                    </div>
                                    <div class="comment-block">
                                        <span class="comment-by">
                                            <span class="blog-author-name">Joan Gardner</span>
                                        </span>
                                        <p>:((((</p>
                                        <p class="blog-date">January 13, 2022</p>
                                        <a class="comment-btn" href="#">
                                            <i class="fas fa-reply"></i> Reply
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card new-comment post-widget clearfix">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Leave Comment</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Your Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Comments</label>
                                <textarea rows="4" class="form-control"></textarea>
                            </div>
                            <div class="submit-section">
                                <button class="btn" type="submit" disabled>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height:1px;">
                <div class="theiaStickySidebar" 
                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 2758.67px;">
                    <div class="blog-widget">
                        <style>
                            .search-ajax-result{
                                box-sizing: border-box;
                                background-color: #fff !important;
                                z-index: 1000;
                                top: 100%;
                                left: 0;
                                display: none
                            }
                        </style>
                        <div class="blog-search mb-30">
                            <div class="search-form">
                                <form action="#">
                                    <div class="position-relative">
                                        <input class="form-control input-search-ajax" type="text" placeholder="Search…"/>
                                        <button type="submit" class="blog-btn" disabled><i class="fi-rs-search"></i></button>
                                    </div>
                                    <div class="search-ajax-result d-flex flex-column mt-1 position-absolute border"></div>
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
                        <div class="card post-widget">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Latest Posts</h4>
                            </div>
                            <div class="card-body">
                                <ul class="latest-posts">
                                    @foreach ($latests as $latest)                        
                                    <li>
                                        <div class="post-thumb">
                                            <a href="blog-details.html">
                                                <img class="img-fluid" src="{{ $latest->thumb }}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <h4>
                                                <a href="blog-details.html">{{ $latest->name }}</a>
                                            </h4>
                                            <p>{{ $latest->created_at->format('j M Y') }}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection