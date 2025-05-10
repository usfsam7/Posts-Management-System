@extends('layout.app')

@section('content')



    <div class="col-12">


        <h1 class="p-3  text-center my-3">Add New Post With AJax</h1>
    </div>


    <div class="col-8 mx-auto">
        <form action="{{ url('ajax') }}" id="send-data" method="POST" class="form border p-3" enctype="multipart/form-data">
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

            <div class="alert alert-danger d-none" id="show-message"></div>

            <div class="mb-3">
                <label for=""> title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for=""> description</label>
                <textarea name="description" class="form-control" rows="7">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for=""> author</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->name }}</option>
                    @endforeach

                </select>
                <div class="mb-3">
                    <label for=""> Image</label>
                    <input type="file" name="image" class="form-control">

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

@section('script')
    <script>

        let formElement = document.getElementById("send-data");
        let messageElement = document.getElementById("show-message");

        console.log(formElement.action);

        formElement.addEventListener("submit", function (event) {
            event.preventDefault();

            let title = document.querySelectorAll("input[name = 'title']");
            let description = document.querySelectorAll("textarea[name = 'description']");
            let image = document.querySelectorAll("input[name='image']");

            let token = document.querySelector("input[name='_token']");

            let userSelect = document.querySelector("select[name='user_id']");
            let author = userSelect.options[userSelect.selectedIndex].text;

            let formData = new FormData();
            formData.append('title', title.value);
            formData.append('description', description.value);
            formData.append('image', image.value);
            formData.append('_token', token.value);

            fetch(formElement.action, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': token.value,
                    'Accept': "application/json",
                },
                body: formData
            }).then(async (res) => {
                const contentType = res.headers.get("content-type");

                if (contentType && contentType.includes("application/json")) {
                    const data = await res.json();

                    if (!res.ok) {
                        // Handle validation errors
                        console.log("Validation errors:", data.errors);

                        messageElement.classList.remove('d-none');
                        messageElement.textContent = data.errors;

                        if (data.errors?.title) {
                            console.log("Title error:", data.errors.title[0]);
                            messageElement.textContent = data.errors.title[0];
                        }
                    } else {
                        console.log("Success:", data);
                    }
                } else {
                    const text = await res.text();
                    console.warn("Unexpected response (not JSON):", text);
                }

             })
                .catch((err) => {
                    console.error("Network or parsing error:", err);
                });
            });






    </script>
@endsection
