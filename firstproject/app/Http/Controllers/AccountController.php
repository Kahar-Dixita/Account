<?php

namespace App\Http\Controllers;
use App\Interfaces\AccountRepositoryInterface;
use App\Models\Account;
// use App\Http\Requests\AccountPostRequest;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\RedirectResponse;

class AccountController extends Controller
{
    protected $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }
    public function index()
    {

        $accounts = $this->accountRepository->getALLAccount();
        $accounts = Account::paginate(5);
         return view('accounts.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
            $accounts= Account::create($request->all());
            $accounts->hobbies = is_array($request->input('hobbies')) ? implode(',', $request->input('hobbies')) : $request->input('hobbies');

            // $accounts->hobbies = implode(',',$request->input('hobbies'));
            $accounts->save();


            return redirect()->route('accounts.index')->with('status','Account created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $account = $this->accountRepository->getAccountbyId($id);
        return view('accounts.show',compact('account'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $account = $this->accountRepository->getAccountbyId($id);
        return view('accounts.edit',compact('account'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request,Account $account)
    {

        Account::find($account->id)->update($request->all());

        $newDetails = $request->except(['_token', '_method']);

        $this->accountRepository->updateAccount($account, $newDetails);
        return redirect()->route('accounts.index')->with('status','Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
            $this->accountRepository->deleteAccount($account);
            $account->delete();

            return redirect()->route('accounts.index')->with('status','Account deleted successfully');
    }
    // public function fulfilled()
    // {
    //     $accounts = $this->accountRepository->getFulfilledAccounts();
    //     return view('accounts.index', compact('account'));
    // }
}



