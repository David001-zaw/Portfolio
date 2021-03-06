

@extends('dashboard.master')

@section('title', '| Update Project')

@section('custom_css')
<style>

.project-form{
    border-radius: 5px;
    border: 1px solid #555;
    margin: 2rem 0;
    padding: 1rem;
}
.form-group{
    position: relative;
    margin-bottom: 3rem;
}
.input-item{
    background-color: transparent;
    border: none;
    border-bottom: 1px #fff solid;
    display: block;
    width: 100%;
    padding: 10px 0;
    color: #fff;
    letter-spacing: 1;
    font-weight: 800;
}

.input-item.title{
    font-size: 3rem;
}
.input-item.link, .input-item.coder{
    font-size: 2rem;
}
.input-item.overview{
    font-size: 1.2rem;
    font-family: 'Poppins';
}

.input-item:focus, .input-item:valid {
    outline: 0;
}
.input-item ~.focus-border {
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 1px;
    background-color: #00C896;
    transition: 0.4s;
}

.input-item:focus~.focus-border {
    width: 100%;
    transition: 0.4s;
    left: 0;
}

/* Textarea */

textarea{
    width: 100%;
    height: 200px;
    margin-top: 20px;
    max-height: 330px;
    caret-color: #4671EA;
    font-weight: 800;
}
textarea::-webkit-scrollbar{
    width: 0px;
}

/* Input File */

.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.inputfile + label {
    max-width: 80%;
    font-size: 1.2rem;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
}

.inputfile:focus + label,
.inputfile.has-focus + label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    margin-right: 0.25em;
}

.inputfile-1 + label {
    color: #f1e5e6;
    background-color: transparent;
    border: 1px solid #00C896;
    transition: all .3s;
}

.inputfile-1:focus + label,
.inputfile-1.has-focus + label,
.inputfile-1 + label:hover {
    color: #000;
    background-color: #00C896;
}

/* Preview Image */

.img-preview {
    width: 300px;
    min-height: 100px;
    border: 2px solid #dddddd;
    margin-top: 15px;

    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    color: #cccccc;
}
.img-preview__image {
    display: none;
    width: 100%;
    object-fit: cover;
}

/* Skill Tag Input */


.skillTags-note{
    color: violet;
    font-size: .8rem;
    cursor: default;
}
.tags-input-wrapper{
    background: transparent;
    padding: 10px 0;
    max-width: 400px;
    border-bottom: 1px solid #ccc;
    color: #fff;
}
.tags-input-wrapper input{
    border: none;
    background: transparent;
    outline: none;
    width: 100%;
    font-size: 1rem;
    font-family: 'Poppins';
    color: gray;
}

.tags-input-wrapper .tag{
    display: inline-block;
    background-color: #00C896;
    color: black;
    border-radius: 3px;
    padding: 5px 6px;
    margin-right: 5px;
    margin-bottom:5px;
}
.tags-input-wrapper .tag a {
    margin: 5px 6px;
    display: inline-block;
    cursor: pointer;
}

.old-img{
    display: flex;
    margin-top: 20px;
    gap: 50px;
    align-items: center;
}
</style>
@endsection

@section('content')
    <div class="container">
        <div class="go-to-back">
            <a href="{{ route('projects.index') }}" class="line-btn">&larr; Go To Project Title List</a>
        </div>
        <div class="main-title">
            Edit Your Project
        </div>
        @if (Session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="project-form">
            <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <input type="text" class="input-item title" placeholder="Project Title" name="title" value="{{ $project->title }}">
                    <span class="focus-border"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="input-item link" placeholder="Project Demo Link" name="project_link" value="{{ $project->project_link }}">
                    <span class="focus-border"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="input-item coder" placeholder="Project Coder" name="coder" value="{{ $project->coder }}">
                    <span class="focus-border"></span>
                </div>
                <div class="form-group">
                    <textarea spellcheck="false" placeholder="Project Overview..." class="input-item overview" required name="overview">
                        {{ $project->overview }}
                    </textarea>
                    <span class="focus-border"></span>
                </div>
                <div class="form-group">
                    <span class="skillTags-note">* Enter or comma between each skill tags</span>
                    <input type="text" id="skillTags" class="skillTags" name="tags">
                    <span class="focus-border"></span>
                </div>
                <div class="form-group">
                    <input type="file" name="image_path" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose Project Image &hellip;</span></label>
                    <div class="img-preview" id="imgPreview">
                        <img src="" alt="Image Preview" class="img-preview__image" />
                        <span class="img-preview__text">New Image'll be Here</span>
                    </div>

                    <div class="old-img">
                        <span>Old Image Here &rarr; </span>
                        <img src="{{ asset('frontend/images/projects/'.$project->image_path) }}" alt="Image Preview" width="300px" />
                    </div>
                </div>
                <button type="submit" class="main-btn">Update Project <i class="fa fa-edit"></i></button>
            </form>
        </div>
    </div>
@endsection


@section('custom_js')
<script src="{{ asset('dashboard/js/other/tag-input.js') }}"></script>
<script src="{{ asset('dashboard/js/other/custom-file-input.js') }}"></script>
<script>

    const imgFile = document.getElementById("file-1");
    const previewContainer = document.getElementById("imgPreview");
    const previewImage = document.querySelector(".img-preview__image");
    const previewText = document.querySelector(".img-preview__text");

    imgFile.addEventListener("change", function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewText.style.display = "none";
            previewImage.style.display = "block";

            reader.addEventListener("load", function () {
                previewImage.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        }
    });


    var tagInput1 = new TagsInput({
        selector: 'skillTags',
        duplicate : false,
        max : 10
    });
    tagInput1.addData([])

</script>
@endsection
