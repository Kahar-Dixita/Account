@extends('layouts.app')
@section('content')
<body>
    @csrf
    @if (session()->has('status'))
                 <div class="alert alert-success text-center mt-3 mx-auto">
                     {{session('status')}}
                 </div>
                 @endif
    <h1 class="text-center mb-5 mt-5">EMPLOYEES DETAILS</h1>
    <div class="pull-right mb-3" style="margin-left:13%">
       <a class="btn-outline-primary btn" href="{{ route('employees.create') }}"> Create New  </a>
   </div>
     <table class="table table-secondary table-striped table-hover table-bordered m-auto text-center" style="width:75%;">
      <thead>
        <tr>
          {{-- <th scope="col">ID</th> --}}
          <th scope="col">NAME</th>
          <th scope="col">SALARY</th>
          <th scope="col">ACCOUNT_ID</th>
          <th scope="col=2">OPERATION</th>
        </tr>
        <tbody>
            @foreach( $employees as $employee)
          <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->salary }}</td>
            <td>{{ $employee->account_id }}</td>
      <td>
       <form action="{{ route('employees.destroy', ['employee' => $employee['id']]) }}" method="POST">
          <a class=" btn-outline-dark btn " href="{{ route('employees.edit', ['employee' => $employee['id']]) }}">Edit</a>
         <a class="btn-outline-success btn" href="{{ route('employees.show', ['employee' => $employee['id']]) }}">View</a>
         @method('DELETE')
         @csrf
         <button type="submit" class="btn-outline-danger btn">Delete</button>
         @endforeach
       </form>
     </td>
    </tr>
  </div>
  </tbody>
  </table>
  <div class="page" style="padding: 30px;
      margin-left: 37%;
  line-height:2">
  {{ $employees->links() }}
  </div>

  <style>
    .w-5{
      display:none;
    }

  </style>
  </body>
  </html>
  @endsection
