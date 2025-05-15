<!--

<table>
   <thead>
    <tr>
      <th>Title</th>
      <th>Body</th>
      <th>User</th>
      <th>Time Of Creation</th>
    </tr>
   </thead>

   <tbody>
    @foreach($posts as $post)
        <div class="post-container">
            <div><span class="label">Title:</span> {{ $post->title }}</div>
            <div><span class="label">Body:</span> {{ $post->body }}</div>
            <div><span class="label">User:</span> {{ $post->user }}</div>
            <div><span class="label">Time Of Creation:</span> {{ $post->created_at }}</div>
        </div>
        <div class="page-break"></div>
    @endforeach
   </tbody>
</table> -->


<!DOCTYPE html>
<html>
<head>
    <title>Posts PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            vertical-align: top;
            word-break: break-word;
        }

        th {
            background-color: #f2f2f2;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    @foreach ($posts as $post)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>User</th>
                    <th>Time Of Creation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at }}</td>
                </tr>
            </tbody>
        </table>
        <div class="page-break"></div>
    @endforeach
</body>
</html>
