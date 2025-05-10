@extends('layout.app')

@section('content')




   <div class="container">
    <div class="row">
         <div class="col-12">
            @can('create', \App\Models\User::class)
             <a href="{{ route('users.create') }}" class="btn btn btn-primary my-3">Add new User</a>
            @endcan

           <h1 class="p-3 border text-center my-3">Users</h1>
         </div>


         <div class="col-12">
         @if (session()->get('success') != null)

                    <h3 class="text-success m-2">{{ session()->get('success') }}</h3>
              @endif
            <table class="table table-bordered">
                <thead>
                       <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Edit</th>
                        <th>Posts</th>
                        <th>Delete</th>
                       </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type  }}</td>


                         <td>
                            <a href="{{route('user.posts', $user->id)}}" class="btn btn btn-primary">Posts</a>

                        </td>

                  <td>

                            <a href="{{url('users/'. $user->id . '/edit')}}" class="btn btn btn-info">Edit</a>
                       
                  </td>
                        <td>
                            <form action="{{ url('users/' . $user->id) }}" method="POST">
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
                {{ $users->links() }}
            </div>
         </div>
    </div>
   </div>

@endsection
