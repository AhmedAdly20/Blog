@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1 class="text-center">All Categories</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td style="font-size: 20px">
                            {{ $category->name }}
                        </td>
                        <td>
                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary float-right">Edit</a>
                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="mr-1 btn btn-danger float-right">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{route('categories.create')}}" class="btn btn-success mt-2 p-1">Create New Categore</a>
@endsection
