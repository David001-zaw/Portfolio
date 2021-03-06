

<!-- ========== BLogs Section ========== -->
<section class="blogs" id="blogs">
    <div class="main-title title-right blogs__title" data-content="Blogs">
        <div class="main-title__number">
            <p>04</p>
        </div>
        <div class="main-title__text">
            <p class="main-title__text-short">My Blogs</p>
            <p class="main-title__text-long">Share knowledges for juniors</p>
        </div>
    </div>

    <div class="blogs__intro intro">
        <h1>Collection of useful knowledges for junior web developer also tip and tricks. <img src="frontend/images/gif/Book.gif" alt="Books" width="50" height="50"> </h1>
        <p>To get more knoweldeg em ipsum dolor sit amet consectetur adipisicing elit. Veritatis sit nam quod omnis consequatur vel ipsa nostrum eum rerum tempora.</p>
    </div>

    <div class="blogs-container">
        <div class="latest-blogs">
            @forelse ($latestBlogs as $blog)
            <div class="blog-item">
                <div class="blog-img">
                    <img src="{{ asset('frontend/images/blogs/'.$blog->image_path ) }}" alt="">
                </div>
                <div class="blog-content">
                    <div class="blog-title">
                        <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                    </div>
                    <div class="blog-box">
                        <div class="line"></div>
                        <div class="blog-info">
                            <div class="blog-date">
                                {{ $blog->created_at->diffForHumans() }}
                            </div>
                            <div class="blog-category">
                                <a href="#" class="line-btn">{{ $blog->category->name }}</a>
                            </div>
                        </div>
                        <div class="blog-excerpt">
                            {{ $blog->excerpt }}
                        </div>
                    </div>
                    <div class="blog-btn">
                        <a href="{{ route('blogs.show', $blog) }}" class="main-btn">Read more &rarr;</a>
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
        <div class="more-blogs-btn">
            <a href="{{ route('blogs') }}" class="main-btn">
                View all Blogs
                &rarr;
            </a>
        </div>
    </div>

</section>
