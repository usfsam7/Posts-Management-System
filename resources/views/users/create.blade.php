@extends('layout.app')

@section('content')





         <div class="col-12">
            <h1 class="m-3 text-center">Create New User</h1>
         </div>


         <div class="col-6 mx-auto">
             <form action="{{ route('users.store') }}" method="POST" class="form border p-3">
             @csrf
             @if ($errors->any())
              <div class="alert alert-danger p-1">
                <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
              @endif
              @if (session()->get('success') != null)

                    <h3 class="text-success m-2">{{ session()->get('success') }}</h3>
              @endif

             <div class="class mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control " id="">
                </div>
                <div class="class mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control " id="">
                </div>
                <div class="class mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control " id="">
                </div>
                <div class="class mb-3">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control " id="">
                </div>
                <div class="class mb-3">
                    <label for="">Type</label>
                     <select name="type" id="" class="form-control" >
                        <option value="admin">Admin</option>
                        <option value="author">Author</option>
                     </select>
                </div>
                <div class="class mb-3">
                    <input type="submit" value="Save" class="form-control bg-success text-wight" id="">
                </div>
             </form>
         </div>


@endsection
