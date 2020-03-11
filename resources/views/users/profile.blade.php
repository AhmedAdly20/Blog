@extends('layouts.app')

@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">
            <h1 class="text-center">
                Profile
            </h1>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Username:</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Type UserName"
                        value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Type Your Email"
                        value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea name="about"class="form-control" rows="2" placeholder="Tell Us About You">{{$profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="name">FaceBook:</label>
                    <input
                        type="text"
                        name="facebook"
                        class="form-control"
                        placeholder="Your Facebook account link"
                        value="{{$profile->facebook}}">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter:</label>
                    <input
                        type="text"
                        name="twitter"
                        class="form-control"
                        placeholder="Your Twitter account link"
                        value="{{$profile->twitter}}">
                </div>
                <div class="form-group">
                    <label for="picture">Picture:</label> <br>
                    <img src="{{$user->getPicture()}}" alt="" width="80px" height="80px">
                    <input
                        type="file"
                        name="picture"
                        class="form-control mt-2"
                    >
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
                    <button class="btn btn-success">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
