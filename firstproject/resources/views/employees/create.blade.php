 @extends('layouts.app')
 @section('content')

     <body class="mt-4" style="background-color:aliceblue";>
         @if ($errors->any())
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         @endif
         <h1 class="container p-3 bg-dark text-white text-center "style="width: 700px;">Create Page</h1>
         {{-- {!! Form::open([
             'class' => 'container form-control bg-secondary border-dark mx-auto p-5',
             'style' => 'width: 700px;',
             'route' => 'employees.store',
             'method' => 'POST',
         ]) !!} --}}
         <form class="container form-control bg-secondary border-dark mx-auto p-5 "style="width: 700px;" action= "{{ route('employees.store') }}" method="POST">
         @csrf
         <div class="mb-3 col-10 fs-5">
         {{-- {!! Form::label('name', 'NAME:', ['class' => 'mb-3 col-10 fs-5']) !!} --}}
         <label for="name">Name:</label>
         <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
         @if ($errors->has('name'))
         <div class="text-danger">
             {{ $errors->first('name') }}
         </div>
     @endif
         </div>

         <div class="mb-3 col-10 fs-5">
             <label for="salary">Salary:</label>
             <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary">
             @if ($errors->has('salary'))
             <div class="text-danger">
                 {{ $errors->first('salary') }}
             </div>
         @endif
         </div>

         <div class="mb-3 col-10 fs-5">
            <label for="account_id">Account_id:</label>
            <input type="text" class="form-control" id="account_id" name="account_id" placeholder="Enter account">
            @if ($errors->has('account_id'))
            <div class="text-danger">
                {{ $errors->first('account_id') }}
            </div>
        @endif
        </div>
         <br>
         <div d-flex>
             <button type="submit" class="btn btn-outline-dark">Create</button>
             <a class="btn btn-outline-dark float-end" href="{{ route('employees.index') }}"> Back</a>
         </div>
         </div>
         </div>
         </div>
         </form>
     </body>
 @endsection
