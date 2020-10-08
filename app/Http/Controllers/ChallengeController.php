<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\Homework;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{

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

    }

    public function submit(Request $request, $id){
        $des_folder = 'challenge';
        $results_array = array();
        if (is_dir($des_folder)){
            if ($handle = opendir($des_folder)){
                while (($file = readdir($handle)) !== FALSE) {
                    $results_array[] = $file;
                }
                closedir($handle);
            }
        }
        $answer = $request->answer;
//        global $check;
//        global $show;
        $check = false;
        $show = "";
        foreach ($results_array as $value){
            if (basename($value, ".txt") == $answer) {
                $show = $value;
                $check = true;
                break;
            }
        }
        if ($check) {
//            header("location:public/challenge/".$show);
            $file = file_get_contents("challenge/".$show);
            echo nl2br($file);
        } else {
//            $_SESSION['msg'] = "You are wrong!";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $challenge = Challenge::find($id);
        $data = array($challenge);
        return view('challenges.create', compact('data'));
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
