<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('id','desc')->paginate('2');
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin',auth()->user())) {
            return view('admin.user.create');
        }
        session()->flash('message','You are not authorize this operation!!');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Gate::allows('admin',auth()->user())) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'image' => 'mimes:jpeg,png,webp'
            ]);
            $data = $request->except(['_token','password','image']);
            $data['password'] = bcrypt($request->password);
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $path = 'images/user';
                $file_name = time().rand(0000,9999).'.'.$file->getClientOriginalExtension();
                $file->move($path,$file_name);
                $data['image'] = $path.'/'.$file_name;
            }
            // dd($request->all());
            User::create($data);
            session()->flash('message','Admin create successfully');
            return redirect()->route('user.index');
        }
        session()->flash('message','You are not authorize this operation!!');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Gate::allows('admin',auth()->user())) {
            $data['user'] = User::findOrFail($id);
            return view('admin.user.edit',$data);
        }
        session()->flash('message','You are not authorize this operation!!');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('admin',auth()->user())) {
            $request->validate([
                'name' => 'required',
                'image' => 'mimes:jpeg,png,webp'
            ]);
            $data['name'] = $request->name;
            $user = User::findOrFail($id);
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $path = 'images/user';
                $file_name = time().rand(0000,9999).'.'.$file->getClientOriginalExtension();
                $file->move($path,$file_name);
                $data['image'] = $path.'/'.$file_name;
            }
            if ($user->image != null && file_exists($user->image)) {
                unlink($user->image);
            }
            // dd($request->all());
            $user->update($data);
            session()->flash('message','Admin Update successfully');
            return redirect()->route('user.index');
        }
        session()->flash('message','You are not authorize this operation!!');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admin',auth()->user())) {
        //
            User::destroy($id);
            session()->flash('message','Delete successfully');
            return redirect()->back();
        }
        session()->flash('message','You are not authorize this operation!!');
        return redirect()->route('admin.dashboard');
    }
}
