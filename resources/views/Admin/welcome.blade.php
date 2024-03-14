<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <h1>Welcome to Admin Panel</h1>
    <!-- Other content -->
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>