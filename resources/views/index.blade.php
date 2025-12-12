@extends('layouts.app')
@section('content')
<body>
    <div class="container">
      @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif
        <h1>All Employees </h1>
        <a href="{{route('logout')}}" class="btn btn-success">Logout</a>

        <a href="{{route('employee.create')}}" class="btn btn-info">Add-Employee</a>

         <a href="{{route('salary.generate')}}" class="btn btn-info">salary_report</a>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">slug</th>
                  <th scope="col">Designation</th>
                  <th scope="col">Salary</th>
                  <th scope="col">Photo</th>
                  <th colspan="3">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $index = ($employees->currentPage() - 1) * $employees->perPage() + 1;
               @endphp
                @foreach ($employees as $employee)
                <tr>
                  <th scope="row">{{$index++}}</th>
                  <td>{{ $employee->name }}</td>
                  <td>{{ $employee->email }}</td>
                  <td>{{ $employee->phone }}</td>
                  <td>{{ $employee->slug }}</td>
                  <td>{{ $employee->designation }}</td>
                  <td>{{ $employee->salary }}</td>
            
                  
                    <td><img src="{{asset('uploads/'.$employee->photo)}}" alt="" width="100px" height="100px"></td>
                   
                  <td>
                    @can('update',$employee)
                    <a href="{{route('employee.update',$employee->id)}}" class="btn btn-success">Update</a></td>
                   @endcan
                   <td>
                    
                    @can('update',$employee)
                   
                      <form action="{{ route('employee.destroy', $employee->id) }}"  method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                      @endcan
                      </td>
                  </form>
            </td>
            </td>
            </tr>
            @endforeach
               
                
              </tbody>
            </table>
            {{$employees ->links()}}
                </div>
</body>
@endsection
