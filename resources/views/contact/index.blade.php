<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Email</title>
</head>

<body class="bg-black text-white p-5">


    <form action="{{ url('contact') }}" method="POST">

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @csrf
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send</button>
    </form>
</body>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Email</title>
    <style>
        /* Full page black background */
        body {
            background-color: #000000;
            color: #ffffff;
            font-family: Arial, sans-serif;
            padding: 2rem;
            margin: 0;
            min-height: 100vh;
        }

        /* Form container styling */
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #111111;
            border-radius: 8px;
        }

        /* Form elements styling */
        input,
        textarea,
        button {
            display: block;
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #333;
            border-radius: 4px;
            font-size: 1rem;
        }

        input,
        textarea {
            background-color: #222;
            color: #fff;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Success message styling */
        .success-message {
            color: #4CAF50;
            padding: 1rem;
            margin-bottom: 1rem;
            background-color: rgba(76, 175, 80, 0.1);
            border-radius: 4px;
        }
    </style>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger p-1 text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('contact') }}" method="POST">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @csrf
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send</button>
    </form>
</body>

</html>
