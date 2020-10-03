<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends UserController
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

//    public function dashboard()
//    {
//        return view('admin.user.dashboard');
////        return redirect()->intended('/users');
////        return $this::index();
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'username'=>'required',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),

        ]);
//        return redirect('/users')->with('success', 'User saved!');
        return redirect('/admin/dashboard/users')->with('success', 'User saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ($user == null) {
//            return redirect()->intended('/users');
            return redirect()->intended('/admin/dashboard/users');
        }
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $constraints = [
            'name'=>'required',
            'email'=>'required',
            'username'=>'required'
        ];
        $input = [
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
        ];
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required';
            $input['password'] = Hash::make($request['password']);
        }
        $this->validate($request, $constraints);
        User::where('id', $id)
            ->update($input);
//        return redirect()->intended('users');
        return redirect()->intended('/admin/dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
//        return redirect()->intended('users');
        return redirect()->intended('/admin/dashboard/users');
    }
}
