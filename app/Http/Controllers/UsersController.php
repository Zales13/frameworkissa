<?php

namespace App\Http\Controllers;

use App\Users;
use App\Skill;
use Illuminate\Http\Request;
use DB;
use Auth;

class UsersController extends Controller
{

  public function afficher()
  {

  $users = auth()->user();

    return view('users', [
    'users' => $users, 
    ]);

  }

  public function btn_skill()
    {
      $skills = Skill::all();
      return view('skills', [
        'skills' => $skills,
       ]);
        
    }
  public  function update(Request $req)
    {
        DB::table('skill_user')->where('user_id', Auth::user()->id)->where('skill_id', $req->id)->update(['level' => $req->level ]);
        return redirect()->route('current_user');
    }
    public  function delete(Request $req)
    {
        DB::table('skill_user')->where('user_id', Auth::user()->id)->where('skill_id', $req->id)->delete();
        return redirect()->route('current_user');
    }
}