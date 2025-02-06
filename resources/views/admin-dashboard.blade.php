@extends('Layout.master')
@section('content')

<div style="display: flex; justify-content: center; align-items: center;">
    @if(session('success'))
        <div style="color: lime;">
            {{ session('success'); }}
        </div>
    @else
        <div style="color: red;">
            <ul>
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>


<div class="post-container" style="display: flex;">
    <div style="width: 1000px; justify-content: center;">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Last Updated</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <th scope="row">{{ $blog->title }}</th>
                <td>{{ $blog->author }}</td>
                <td>{{ $blog->updated_at->diffForHumans(); }}</td>
                <td>
                    <a href="{{ route('blogs.editAdmin', $blog->id); }}"><button type="button" class="btn btn-success" style="max-width: 100px;">Edit <i class="bi bi-pencil-fill"></i></button></a>
                    <a href="{{ route('blogs.delete', $blog->id); }}"><button type="button" class="btn btn-danger" style="max-width: 100px;">Delete <i class="bi bi-trash-fill"></i></button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection