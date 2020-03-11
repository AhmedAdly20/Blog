@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1 class="text-center">All Tags</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td style="font-size: 20px" class="{{ $tag->name }}">
                            {{ $tag->name }}
                            <span class="badge badge-primary ml-1">{{ $tag->posts->count() }}</span>
                        </td>
                        <td class="{{ $tag->name }}">
                            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary float-right">Edit</a>
                            <form action="{{ route('tags.destroy',$tag->id) }}" method="POST" class="{{ $tag->name }}" data-id="{{$tag->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="mr-1 btn btn-danger float-right">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>
    </div>
    <a href="{{route('tags.create')}}" class="btn btn-success mt-2 p-1">Create New Tag</a>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $( document ).ready(function() {
        $("form").submit(function(event) {
            var ee = $(this).attr('class');
            var id = $(this).data('id');
            event.preventDefault();
            $.ajax({
                url: "http://127.0.0.1:8000/admin/tags/"+id,
                type: "POST",
                data: $('form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    var prevRow = $( '.'+ee );
                    prevRow.remove();
                },
                error: function (request, status, error) {
                    var err = eval("(" + request.responseText + ")");
                    console.log(err);
                }
            });
        });
    });
</script>