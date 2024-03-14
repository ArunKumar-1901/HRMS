<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmployeeAdd</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h6 class="text-center">Add User</h6>
        <hr>
        <form class="row g-3" method="post" action="{{url('/AddUser')}}">
        @csrf
        <div class="col-md-6">
                <label for="inputEmployeeId" class="form-label">Employee ID</label>
                <input type="text" class="form-control" name="empid" placeholder="Employee ID">
            </div>
            <div class="col-md-6">
                <label for="inputEmployeeName" class="form-label">Employee Name</label>
                <input type="text" class="form-control" name="name" placeholder="Employee Name">
            </div>
            <div class="col-md-6">
                <label for="inputEmployeeEmail" class="form-label">Employee Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="col-md-6">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="col-md-6">
                <label for="inputrole" class="form-label">Role</label>
                <input type="text" class="form-control" name="role">
            </div>
            <div class="col-md-6">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <p class="form-text text-muted">For a strong password, please use a hard-to-guess combination of text with upper and lower case characters, symbols, and numbers.</p>
            </div>
            <div class="col-md-6">
                <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmpassword">
            </div>
            <div class="col-12">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary me-md-2" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
