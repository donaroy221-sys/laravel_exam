<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Register</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('register.post')}}" method="POST" >
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" id="name" autocomplete="off" class="form-control" placeholder="Enter Full Name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" autocomplete="off" class="form-control" placeholder="Enter Email">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"  id="password" autocomplete="new-password" class="form-control" placeholder="Enter Password">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password">

                            @error('confirm_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                    </form>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('login')}}">login</a>
                            <a href="">forgot password</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
