<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Vandor;
use Illuminate\Http\Request;

class VandorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['vandors'] = Vandor::orderBy('id','desc')->paginate('2');
       // dd($data);
        return view('admin.vandor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vandor.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'status' => 'required',

        ]);
        $data = $request->except(['_token']);
        // dd($data);
        Vandor::create($data);
        session()->flash('message','Create Vandor successfully');
        return redirect()->route('vandor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vandor  $vandor
     * @return \Illuminate\Http\Response
     */
    public function show(Vandor $vandor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vandor  $vandor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vandor $vandor)
    {
       $data['vandor'] = $vandor;
        // dd($data);
        return view('admin.vandor.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vandor  $vandor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vandor $vandor)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'status' => 'required',

        ]);
        $data = $request->except(['_token']);
        // dd($data);
        $vandor->update($data);
        session()->flash('message','Update Vandor successfully');
        return redirect()->route('vandor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vandor  $vandor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vandor $vandor)
    {
        $vandor->delete();
        session()->flash('message','Deleted vandor');
        return redirect()->back();
    }
}
