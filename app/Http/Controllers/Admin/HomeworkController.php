<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\Homework;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
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
        $homeworks = Homework::all();
        return view('uploads.index', compact('homeworks'));
    }

    public function viewSubmissions($id){
        $submissions = Submission::where('homework_id', $id)->get();
//        $submissions = Submission::all();
        return view('uploads.submission', compact('submissions'));
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
        //
        $data = new Homework();
        if ($files = $request->file('image')) {
            $name = $files->getClientOriginalName();
            $files->move('homeworks', $name);
            $data->path = $name;
            $data->upload_by = Auth::user()->id;
        }
        $data->save();
        return redirect('/admin/dashboard/uploads')->with('success', 'File uploaded!');
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

    public function download($path){
        $file = public_path()."/homeworks/".$path;
        $headers = ['Content-Type' => 'application/octet-stream',];
        return response()->download($file, $path, $headers);
    }

    public function downloadSub($path){
        $file = public_path()."/submissions/".$path;
        $headers = ['Content-Type' => 'application/octet-stream',];
        return response()->download($file, $path, $headers);
    }
}
