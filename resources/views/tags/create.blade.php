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
                {{ isset($tag) ? 'Edit Tag' : 'Create New Tag' }}
            </h1>
        </div>
        <div class="card-body">
            <form action="{{ isset($tag) ? route('tags.update',$tag->id) : route('tags.store')}}" method="POST">
                @csrf
                @if (isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="tag">Tag Name:</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Type The Tag Name"
                        value="{{ isset($tag) ? $tag->name : old('name') }}">
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
                        {{-- {{ isset($tag) ? 'Update Tag' : 'Add New Tag' }} --}}
                        Add New Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $( document ).ready(function() {
    $("form").submit(function(event) {//alert(222)
    event.preventDefault();
        $.ajax({
            url: "{{ route('tags.store') }}",
            type: "POST",
            data: $('form').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                alert('success');},
            error: function (request, status, error) {
                          var err = eval("(" + request.responseText + ")");
alert(err.errors.name);
            }

        });
});

    });
</script>