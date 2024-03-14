<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>
    <!-- <x-Navbar> -->
        <a href="{{url('/AddUser')}}">Add</a>
    <!-- </x-Navbar> -->
    
    <!-- For add check -->
    <div class="container mt-4 table-container">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
        <tr>
        <th>Id</th>
            <th>EmpId</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employee as $details)
            <tr>
                <td>{{$details->id}}</td>
                <td>{{$details->empid}}</td>
                <td>{{$details->name}}</td>
                <td>{{$details->email}}</td>
                <td>{{$details->role}}</td>
                <td>{{$details->username}}</td>
                <td>
                    <a href="{{url('/Edit/'.$details->id.'/User')}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('/Delete/'.$details->id.'/User')}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
    <div>
    <a href="/EmployeeLeaveFiles">Check leave </a>
    <a href="/recruitment">Check Recruitment </a>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>