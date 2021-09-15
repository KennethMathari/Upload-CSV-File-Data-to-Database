<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>CSV File Upload</title>
</head>
<body>
    <form action="{{url('/')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="">Upload</label>
        <input type="file" name="file">
        <input type="submit" name="submit">
    </form>
</body>
</html>