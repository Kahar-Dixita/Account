@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="mt-5">
   <h1 class="container p-3 bg-dark text-white text-center "style="width: 700px;">Edit Account</h1>
    @if (session()->has('status'))
               <div class="alert alert-success">
                   {{session('status')}}
               </div>
               @endif
    <form class="container form-control bg-secondary border-dark mx-auto p-5 "style="width: 700px; --bs-bg-opacity: .5;" action="{{ route('employees.update',$employee->id) }}" method="POST">
        @csrf
        @method('PUT')
                   <div class="mb-3 col-10 fs-5">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $employee->name }}" placeholder="enter name">
                   </div>

                   <div class="mb-3 col-10 fs-5">
                     <strong>Contact No:</strong>
                     <input type="text" name="contact_no" value="{{ $employee->contact_no }}" placeholder="enter contact no">
                  </div>

                  <div class="mb-3 col-10 fs-5">
                  <label for="salary">Salary:</label>
            <input type="text" name="salary" value="{{ $employee->salary }}" placeholder="Enter salary">
                </div>

                <div d-flex>
                  <button type="submit" class="btn btn-outline-dark">Submit</button>
                  <a class="btn btn-outline-dark float-end" href="{{ route('employees.index') }}"> Back</a>
                </div>
             </form>
