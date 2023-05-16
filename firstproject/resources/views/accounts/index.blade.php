@extends('layouts.app')
@section('content')
    @csrf
    @if (session()->has('status'))
        <div class="alert alert-success text-center mt-3 mx-auto">
            {{ session('status') }}
        </div>
    @endif
    <h1 class="text-center mb-5 mt-5">ACCOUNT DETAILS</h1>
    <div class="pull-right mb-3" style="margin-left:13%">

        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create New
        </button>
    </div>


    <!--  create Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Page</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container form-control mx-auto p-5">
                    @include('accounts.create')
                </div>
            </div>
        </div>
    </div>
    <table class="table table-secondary table-striped table-hover table-bordered m-auto text-center" style="width:75%;">
        <thead>
            <tr>
                <!-- <th scope="col">ID</th> -->
                <th scope="col">NAME</th>
                <th scope="col">CONTACT NO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">GENDER</th>
                <th scope="col">HOBBIES</th>
                <th scope="col=2">OPERATION</th>
            </tr>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->contact_no }}</td>
                    <td>{{ $account->email }}</td>
                    <td>{{ $account->gender }}</td>
                    <td>{{ $account->hobbies }}</td>
                    <td>
                        {{-- <!-- Delete - > --}}
                        <form action="{{ route('accounts.destroy', ['account' => $account['id']]) }}" method="POST"
                            style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn-outline-danger btn">Delete</button>
                        </form>

                        {{-- View --}}
                        <a href="{{ route('accounts.show', ['account' => $account->id]) }}" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop1{{ $account->id }}"
                            class="btn btn-outline-success btn">show</a>

                        <div class="modal fade" id="staticBackdrop1{{ $account->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel1">SHOW PAGE</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('accounts.show')
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Edit --}}
                        <a class="btn btn-outline-dark" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $account['id'] }}">Edit</a>

                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $account['id'] }}" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fs-5" id="editModalLabel">Edit Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @include('accounts.edit')
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
        </thead>
    </table>




    <div class="page" style="padding: 30px;
    margin-left: 37%;
line-height:2">
        {{ $accounts->links() }}
    </div>

    <style>
        .w-5 {
            display: none;
        }
    </style>
@endsection
