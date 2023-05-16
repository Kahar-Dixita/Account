
<body class="mt-4" style="background-color:aliceblue";>
    @if (isset($account))
        {!! Form::model($account, ['route' => ['accounts.update', $account->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::model(null, ['route' => ['accounts.store'], 'method' => 'POST']) !!}
    @endif

    @csrf
    <div class="mb-3 col-10 fs-5">
        {!! Form::label('name', 'Name : ') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Name']) !!}
    </div>

    <div class="mb-3 col-10 fs-5">
        {!! Form::label('contact_no', 'Contact_no :') !!}
        {!! Form::text('contact_no', null, [
            'class' => 'form-control',
            'id' => 'contact',
            'placeholder' => 'Enter Contact No',
        ]) !!}
    </div>

    <div class="mb-3 col-10 fs-5">
        {!! Form::label('email', 'Email : ') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter Email']) !!}
    </div>
    <div class="fs-5 mb-1">
        {!! Form::label('gender', 'Gender :') !!}
    </div>
    <div class="form-check mb-3">
        {!! Form::radio('gender', 'Male', null, ['id' => 'radio1', 'class' => 'form-check-input']) !!}
        {!! Form::label('radio1', 'Male', ['class' => 'form-check-label']) !!}
    </div>

    <div class="form-check mb-3">
        {!! Form::radio('gender', 'Female', null, ['id' => 'radio2', 'class' => 'form-check-input']) !!}
        {!! Form::label('radio2', 'Female', ['class' => 'form-check-label']) !!}
    </div>

    <div class="fs-5 mb-1">
        {!! Form::label('hobbies', 'Hobbies :') !!}
    </div>

    <div class="form-check">
        {!! Form::checkbox('hobbies[]', 'Read', null, ['class' => 'form-check-input', 'id' => 'check1']) !!}
        {!! Form::label('check1', 'Read', ['class' => 'form-check-label']) !!}
    </div>
    <div class="form-check">
        {!! Form::checkbox('hobbies[]', 'Travelling', null, ['class' => 'form-check-input', 'id' => 'check2']) !!}
        {!! Form::label('check2', 'Travelling', ['class' => 'form-check-label']) !!}
    </div>

    <br>
    <div class="d-flex" style="justify-content:space-between">
        {!! Form::submit(isset($account) ? 'Update' : 'Create', ['class' => 'btn btn-outline-primary']) !!}
        <a class="btn btn-outline-dark float-end" href="{{ route('accounts.index') }}"> Back</a>
    </div>

    {!! Form::close() !!}
</body>
