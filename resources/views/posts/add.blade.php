@extends('layout.app')

@section('content')



            <div class="col-12">


            <h1 class="p-3  text-center my-3">Add New Post</h1>
         </div>


         <div class="col-8 mx-auto">
            <form action="{{ url('posts') }}" method="POST" class="form border p-3" enctype="multipart/form-data" >
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
            <div class="mb-3">
                <label for=""> title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" >
            </div>
            <div class="mb-3">
                <label for=""> description</label>
                <textarea name="description" class="form-control"  rows="7" >{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for=""> author</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user )
                       <option value="{{ $user->id }}"> {{ $user->name }}</option>
                    @endforeach

                </select>
                <div class="mb-3">
                <label for=""> Image</label>
                <input type="file" name="image" class="form-control" >

            </div>
            </div>
            <div class="mb-3">
               <input type="submit" value="Save" class="form-control bg-success">
            </div>
            </form>
         </div>
    </div>
   </div>

@endsection
