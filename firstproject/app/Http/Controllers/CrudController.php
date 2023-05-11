<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $crud = new Crud;  
        // $crud->name =  $request->get('name');  
        // $crud->name = $request->get('contact');  
        // $crud->qualifications = $request->get('email');  
        // $crud->gender = $request->get('gender');
        // $crud->gender = $request->get('hobby');  
        // $crud->save();  
        }  
    

    /**
     * Display the specified resource.
     */
     public function show(cr $cr)
     {
         //
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
