@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1 class="text-center">All Posts</h1>
        </div>
        <div class="card-body">
            @if ($posts->count()>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img
                                src="{{ asset('storage/'.$post->image) }}"
                                style="width: 100px; height: 50px; border-radius: 1.25rem"
                                class="img-fluid img-thumbnail"
                                alt="">
                            </td>
                            <td style="font-size:20px; line-height: 2.5">
                                    {{ $post->title }}
                            </td>
                            <td>
                                @if (!$post->trashed())
                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary float-right btn-sm">Edit</a>
                                @else
                                    <a href="{{ route('trashed.restore',$post->id) }}" class="btn btn-success float-right btn-sm">Restore</a>
                                @endif
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="mr-1 btn btn-danger float-right btn-sm">
                                        {{ $post->trashed() ? 'Delete' : 'Trashed' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            @else
                <div class="card-body">
                    <h1 class="text-center" style="color:red">No Posts Yet</h1>
                </div>
            @endif
        </div>
    </div>
    <a href="{{route('posts.create')}}" class="btn btn-success mt-2 p-1">Create New Post</a>
@endsection
