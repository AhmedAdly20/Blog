@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1 class="text-center">All Users</h1>
        </div>
        <div class="card-body">
            @if ($users->count()>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>UserName</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <img
                                    src="{{$user->getPicture()}}"
                                    alt=""
                                    style="border-radius: 50%"; width="60px"; height="60px";
                                    >
                            </td>
                            <td style="">
                                    {{ $user->name }}
                            </td>
                            <td>
                                @if ($user->isAdmin())
                                    <span class="badge badge-primary">Admin</span>
                                @else
                                    <span class="badge badge-secondary">Writer</span>
                                @endif
                            </td>
                            <td>
                                @if (!$user->isAdmin())
                                    <form action="{{route('users.make-admin',$user->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
                                @else
                                    <form action="{{route('users.remove-admin',$user->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Remove Admin</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="card-body">
                    <h1 class="text-center" style="color:red">No Users Yet</h1>
                </div>
            @endif
        </div>
    </div>
@endsection
