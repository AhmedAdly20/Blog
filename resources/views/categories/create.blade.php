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
                {{ isset($category) ? 'Edit Category' : 'Create New Category' }}
            </h1>
        </div>
        <div class="card-body">
            <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="category">Category Name:</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Type The Category Name"
                        value="{{ isset($category) ? $category->name : old('name') }}">
                </div>
                <div class="form-group">
                    {!! app('captcha')->display() !!}
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
                        {{ isset($category) ? 'Update Category' : 'Add New Category' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
