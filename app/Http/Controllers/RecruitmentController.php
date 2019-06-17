<?php

namespace App\Http\Controllers;

use App\Recruitment;
use App\User;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index(){
        $recruitments=Recruitment::all();
        $actions=view('layouts.actions._actions');

        return view('index',  compact('recruitments','actions'));
    }
    public function download(){
        return view('download');
    }
}