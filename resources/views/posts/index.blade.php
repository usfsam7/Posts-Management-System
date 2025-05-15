@extends('layout.app')

@section('content')




    <div class="container">
        <div class="row">
            <div class="col-12">
                @can('create', \App\Models\Post::class)
                    <a href="{{ url('posts/create') }}" class="btn btn btn-primary my-3">Add new post</a>
                @endcan

                <a href="{{ route('posts.export') }}" class="btn btn-success my-3">Export To Excel </a>

                <a href="{{ route('posts.export') }}" class="btn btn-success my-3">Export To PDF File</a>

                <h1 class="p-3 border text-center my-3">Posts</h1>
            </div>


            <div class="col-12">
                @if (session()->get('success') != null)

                    <h3 class="text-success m-2">{{ session()->get('success') }}</h3>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }} </td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->user->name  }}</td>



                                @if (!$post->image)
                                    <td>No Image For This Post</td>
                                @else
                                    <td>
                                        <img src="{{ asset('storage/' . $post->image) }}" height="100" width="100">
                                    </td>
                                @endif

                                <td>
                                    <a href="{{url('posts/' . $post->id . '/edit')}}" class="btn btn btn-info">Edit</a>

                                </td>
                                <td>
                                    <form action="{{ url('posts/' . $post->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
