<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reset default browser styles */
body, h1, table, th, td, div, a, form {
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

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

a {
    display: block;
    margin-bottom: 20px;
    text-align: center;
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

form {
    text-align: center;
    margin-top: 20px;
}

    </style>
</head>
<body>
<div>
    <h1>Welcome to Employee Panel</h1>
    <!-- Other content -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Id</th>
                <th>Reason</th>
                <th>start_date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($EmpLeave as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->Empid }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->status}}</td>
                </tr>
            @endforeach
        </tbody>
    <a href="{{url('/leave')}}">For leave</a>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>