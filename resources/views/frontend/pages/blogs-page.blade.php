@extends('frontend.layouts.master')

@section('title', '| Blogs')


@section('content')

<!-- ========== Blog Page ========== -->
<section class="blogPage" id="blogPage">

    <!-- ========== Circles ========== -->
    <div class="circle circle-home-one">
        <img src="frontend/images/circle-small.png" alt="">
    </div>

    <div class="circle circle-home-two">
        <img src="frontend/images/circle-small.png" alt="">
    </div>


    <div class="banner">
        <div class="banner-title">
            <h1><span>Zaw.</span> Coder Blog</h1>
        </div>
        <p>နည်းပညာနဲ့ ပတ်သက်ပြီး သိချင်တဲ့အကြောင်းအရာကို အောက်မှာရှိတဲ့ search box မှာ ရိုက်ထည့်ပြီး ရှာဖွေလို့ရပါတယ်။ အကယ်၍ သင်ရိုက်ရှာတဲ့ အကြောင်းအရာကို မတွေ့ပါက message box ကနေ သိချင်တဲ့အကြောင်းအရာကို request ထားလို့ရပါတယ်ဗျ။</p>
        <form action="" autocomplete="off">
            <div class="input-group">
                <input class="effect-8" type="text" placeholder="Search Blogs with name" name="search">
                <span class="focus-border">
                    <i></i>
                </span>
            </div>
            <button type="submit" class="main-btn">Search Blog &rarr;</button>
        </form>
    </div>
</section>

<section class="posts">
    <div class="posts-container">
        <div class="posts-list">
            @if (count($blogs))
            <div class="latest-post">
                <div class="blog-item">
                    <img src="{{ asset('frontend/images/blogs/'.$blogs[0]->image_path) }}" alt="">
                    <div class="blog-detail">
                        <div class="blog-title">
                            <h1>{{ $blogs[0]->title }}</h1>
                        </div>
                        <div class="blog-info">
                            <div class="category">
                                <a href="{{ route('blogs', ['author' => $blogs[0]->author->id]) }}">
                                    <i class="fa fa-user-alt"></i>
                                    {{ $blogs[0]->author->name }}
                                </a>
                            </div>
                            <div class="category">
                                <a href="{{ route('blogs', ['category' => $blogs[0]->category->name]) }}">
                                    <i class="fa fa-folder-open"></i>
                                    {{ $blogs[0]->category->name }}
                                </a>
                            </div>
                            <div class="created">
                                <i class="fa fa-calendar-alt"></i>
                                {{ $blogs[0]->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="blog-btn">
                            <a href="{{ route('blogs.show', $blogs[0]) }}" class="main-btn">Read More &rarr;</a>
                        </div>
                    </div>
                </div>
                <div class="ribbon"><span>Latest</span></div>
            </div>
            @else
            <marquee behavior="" direction="right" scrollamount="12">
                <div class="no-items">
                    <h1>There's no blog concerned with "{{ $category }}" category!</h1>
                </div>
            </marquee>
            @endif
            <div class="all-posts">

                @forelse ($blogs->skip(1) as $blog)
                <div class="post-item">
                    <div class="post-img">
                        <img src="{{ asset('frontend/images/blogs/'. $blog->image_path) }}" alt="">
                        <div class="icons">
                            <a href="#"> <i class="fas fa-calendar"></i> {{ $blog->created_at->diffForHumans() }}</a>
                            <a href="{{ route('blogs', ['author' => $blog->author->id]) }}"> <i class="fas fa-user"></i> by {{ $blog->author->name }} </a>
                        </div>
                    </div>
                    <div class="post-info">
                        <div class="post-category">
                            <span><a href="{{ route('blogs', ['category' => $blog->category->name]) }}" class="line-btn"> <i class="fa fa-folder"></i> {{ $blog->category->name }}</a></span>
                        </div>
                        <div class="post-title">
                            <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                        </div>
                    </div>
                </div>
                @empty
                <marquee behavior="" direction="right" scrollamount="12">
                    <div class="no-items">
                        <h1>No Blog Here!</h1>
                    </div>
                </marquee>
                @endforelse
            </div>
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a href="#" class="active">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
        <div class="side-bar">
            <div class="categories">
                <div class="title">
                    Categories
                </div>
                <ul class="categories-list">
                    <li class="categories-item"><a href="{{ route('blogs') }}" class="">All Blogs &rarr;</a></li>
                    @foreach ($categories as $category)
                        <li class="categories-item"><a href="{{ route('blogs', ['category' => $category->name]) }}" class="">{{ $category->name }} ({{ count($category->blog) }}) &rarr;</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="about-me">
                <div class="title">
                    About me
                </div>
                <div class="img">
                    <img src="frontend/images/about.png" alt="Profile">
                </div>
                <div class="sign">
                    <img src="frontend/images/signature.png" alt="Sign">
                </div>
            </div>
            <div class="follow-me">
                <div class="title">
                    Follow me
                </div>
                <div class="text">
                    Follow on Most Popular social community and receive NEW posts in your social line every day!
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram-square"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-github-alt"></i></a>
                </div>
            </div>
            <div class="posts">
                <div class="title">
                    Popular Posts
                </div>
                <div class="posts-list">

                    @foreach ($latestBlogs as $blog)
                    <div class="posts-item">
                        <div class="posts-img">
                            <img src="{{ asset('frontend/images/blogs/'.$blog->image_path) }}" alt="">
                        </div>
                        <div class="posts-title">
                            <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                        </div>
                        <div class="posts-date">
                            {{ $blog->created_at->diffForHumans() }}
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('custom_js')

@endsection
