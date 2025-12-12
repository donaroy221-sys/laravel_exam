<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello</title>
    <style>
        .is-invalid{
            border: 1px solid red;
        }
    </style>
  </head>
  <body>
    
    <div class="container mt-5">
    <h1>Add Employee</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>    
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
            
          

    <!-- Employee Name -->
    <div class="form-group">
        <label for="name">Employee Name</label>
        <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Phone -->
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}" id="phone" name="phone" value="{{ old('phone') }}">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

   

    <!-- Designation -->
    <div class="form-group">
        <label for="designation">Designation</label>
        <input type="text" class="form-control {{ $errors->first('designation') ? 'is-invalid' : '' }}" id="designation" name="designation" value="{{ old('designation') }}">
        @error('designation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

   <!-- Salary -->
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" class="form-control {{ $errors->first('salary') ? 'is-invalid' : '' }}" id="salary" name="salary" value="{{ old('salary') }}">
        @error('salary')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Photo</label>
                <input type="file" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" name="photo">
                @error('photo')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            
            
                  
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>

    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>