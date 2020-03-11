@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1 class="text-center">
                {{ isset($post) ? 'Edit Post' : 'Create New Post' }}
            </h1>
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="post title">Post Title:</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        placeholder="Type The Post Ttitle"
                        value="{{ isset($post) ? $post->title : old('title') }}">
                </div>
                <div class="form-group">
                    <label for="post description">Post Description:</label>
                    <textarea name="description"class="form-control" rows="2" placeholder="Type Post Description">{{ isset($post) ? $post->description : old('description')  }}</textarea>
                </div>
                <div class="form-group">
                    <label for="post content">Post Content:</label>
                    <input id="x" type="hidden" name="content" value="{{  isset($post) ? $post->content : old('content') }}">>
                    <trix-editor input="x"></trix-editor>
                </div>
                @isset($post)
                    <div class="form-group">
                        <img src="{{asset('storage/' . $post->image)}}" style="width: 100%; border-radius: 20px;"  />
                    </div>
                @endisset
                <div class="form-group">
                    <label for="post image">Post Image:</label>
                    <input
                        type="file"
                        name="image"
                        class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="categorySelect">Post Category</label>
                    <select name="categoryID" class="form-control" id="categorySelect">
                        @foreach ($categories as $category)
                            <option
                            value="{{ $category->id }}"
                            @isset($post)
                                @if ($post->category->id == $category->id)
                                    selected
                                @endif
                            @endisset
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="TagSelect">Post Tags</label>
                    <select name="tags[]" class="form-control tags" id="tagSelect" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option
                                class="badge badge-pill badge-light mr-1"
                                value="{{ $tag->id }}"
                                @if (isset($post))
                                    @if ($post->hasTag($tag->id))
                                        selected
                                    @endif
                                @endif
                                >
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($post) ? 'Update Post' : 'Add New Post'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tags').select2();
        });
    </script>
@endsection
