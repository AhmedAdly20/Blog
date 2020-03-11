@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row text-center">
                <div class="col-md-6 mb-2">
                    <div class="card text-white bg-info">
                        <div class="card-header"><a href=" {{ route('users.index') }} " class="text-white">Users</a></div>
                        <div class="card-body">{{ $users_count }}</div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card text-white bg-success">
                        <div class="card-header"><a href=" {{ route('categories.index') }} " class="text-white">Categories</a></div>
                        <div class="card-body"> {{ $categories_count }} </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-secondary">
                        <div class="card-header"><a href=" {{ route('posts.index') }} " class="text-white">Posts</a></div>
                        <div class="card-body"> {{ $posts_count }} </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-danger">
                        <div class="card-header"><a href=" {{ route('tags.index') }} " class="text-white">Tags</a></div>
                        <div class="card-body"> {{ $tags_count }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
