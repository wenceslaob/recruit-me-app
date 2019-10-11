<?php

namespace App\Http\Controllers;

use App\Recruitment;
use App\Country;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitmentController extends Controller
{
    public function index(){
        $recruitments=Recruitment::get();
//        dd($recruitments);
        $actions=view('layouts.actions._actions');
        return view('index',  compact('recruitments','actions'));
    }

    public function download(){
        return view('download');
    }
    public function profile(){
//        $profile=User::all();
//        dd(Auth::user()->id);
        $recruitment=Recruitment::where('user_id', 1)->get();
        return view('manage.index', ['recruitment'=>$recruitment,
                                    'routes' => $this->routes]);
    }
    public function update(Request $request, $id){
        if($request->content){
            Recruitment::where('id', $id)
                ->update([
                    'offered_position'=>$request->content['offered_position'],
                    'description'=>$request->content['description'],

                ]);

        }

}
}