<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\Homework;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $challenges = Challenge::all();
        return view('challenges.index', compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = new Challenge();
        if ($files = $request->file('upload')) {
            $name = $files->getClientOriginalName();
            $files->move('challenge', $name);
            $data->name = $request->name;
            $data->hint = $request->hint;
            $data->created_at = date('Y-m-d H:i:s');
        }
        $data->save();
        return redirect('/admin/dashboard/challenges')->with('success', 'Challenge created!');

    }

    public function submit(Request $request, $id){

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $challenge = Challenge::where('id', $id)->get();
        $data = array($challenge);
        return view('challenges.create', compact($data));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
