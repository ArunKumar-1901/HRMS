<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Panel</title>
    <Style>
  /* Reset default browser styles */
body, h1, form {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.alert {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    margin-bottom: 20px;
}

form {
    width: 50%;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="date"],
textarea {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

button {
    padding: 10px 20px;
    cursor: pointer;
    border: none;
    outline: none;
    background-color: #007bff;
    color: white;
}

button:hover {
    background-color: #0056b3;
}

button,
input[type="submit"] {
    display: block;
    margin: 20px auto;
}
    </Style>
</head>
<body>
<form action="/leave" method="post">
        @csrf
    <!-- Message related  -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
         @endif

         @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
         @endif
 
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>

        <label for="reason">Reason:</label><br>
        <textarea id="reason" name="reason" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Submit Leave Request</button>
    </form>

    <!-- Logout -->
   <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form> 
</body>
</html>
