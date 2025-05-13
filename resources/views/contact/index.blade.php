<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Email</title>
</head>

<body>


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

</html>
