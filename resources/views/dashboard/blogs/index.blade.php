@extends('dashboard.master')

@section('title', '| Blogs List')

@section('custom_css')
<style>
/* .blog-title.line-btn{
    color: #fff;
}
.blog-title.line-btn:hover{
    color: #00C896;
} */
.blog-title.line-btn::after{
    height: 1px;
    transform-origin: center;
}

.permission{
    color: red;
}
</style>
@endsection

@section('content')
    <div class="container">

        <div class="go-to-back">
            <a href="{{ route('blogs.home') }}" class="line-btn">&larr; Go To Blog Title List</a>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-md-10">
                @if (Session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif

                <a href="{{ route('blogs.create') }}" class="main-btn create-btn">Create New Blog <i class="fa fa-user-plus"></i></a>



                @foreach ($blogs as $blog)
                <div class="card bg-dark my-3">
                    <div class="card-body">
                        <h4><a href="{{ route('blogs.show', $blog) }}" class="blog-title line-btn">{{ $blog->title }}</a></h4>
                    </div>
                    <div class="card-footer">
                        @auth
                            @if (auth()->user()->id == $blog->author->id)
                            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>

                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            @else
                            <p class="permission">!!! This blog is belonged to other admin.! </p>
                            @endif
                        @endauth
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
