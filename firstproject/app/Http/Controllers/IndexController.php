<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Employee;

class IndexController extends Controller
{
    // public function index()
    // {
    //     return Account::with('getcontact')->get();
    // }

    // public function add_account(){
    //     $employee = new Employee();
    //     $employee-> name = 'Dixita';

    //     $account = new Account();
    //     $account->name = 'Dixita';
    //     $account->contact_no = 12345;
    //     $account->email = 'kahardixita5@gmail.com';
    //     $account->gender = 'female';
    //     $account->hobbies = 'read';
    //     $account->save();
    //     $acccount->mobile()->save($employee);
    // }
    public function index()
    {
        return Account::with('employee')->get();
    }
}

