@extends('dashboard.master')

@section('title', '| Create Project')

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
            <h1 class="create"><a href="{{ route('projects.create') }}" class="line-btn">Create New Project &rarr;</a></h1>
            <h1 class="show"><a href="/#projects" class="line-btn">Show All Projects &rarr;</a></h1>
        </div>
    </div>
@endsection
