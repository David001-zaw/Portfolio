@extends('dashboard.master')

@section('title', '| Blogs')

@section('custom_css')
<style>
.content{
    margin: 2rem 0;
}
.links{
    text-align: center;
    border: 1px solid gray;
    margin: 2rem 0;
}
.links a{
    /* color: #fff; */
    text-decoration: none;
    margin: 1rem 0;

}
</style>
@endsection

@section('content')
    <div class="content">
        <div class="links">
            <h1 class="create"><a href="{{ route('blogs.index') }}" class="line-btn">Create New Blog &rarr;</a></h1>
            <h1 class="show"><a href="{{ route('categories.index') }}" class="line-btn">Create New Category &rarr;</a></h1>
        </div>
    </div>
@endsection
