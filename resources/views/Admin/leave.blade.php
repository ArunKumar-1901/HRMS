<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Leave Panel</title>

    <style>
        /* Reset default browser styles */
body, h1, table {
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

td button {
    padding: 5px 10px;
    cursor: pointer;
    border: none;
    outline: none;
    background-color: #007bff;
    color: white;
}

td button:hover {
    background-color: #0056b3;
}

form {
    display: inline-block;
    margin-right: 5px;
}

    </style>
</head>
<body>
    <h1>Leave Requests</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
            @foreach ($leaves as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->Empid }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>
                        @if ($leave->status == 'pending')
                       
                        <a href="{{ url('leave/approve', ['id' => $leave->id]) }}">Approve</a>
                        <a href="{{ url('leave/reject', ['id' => $leave->id]) }}">Reject</a>

                        @endif
                        @if ($leave->status == 'approved')
                            Approved
                            @endif 
                         @if ($leave->status == 'rejected')
                            Rejected
                            @endif    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Logout -->
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
