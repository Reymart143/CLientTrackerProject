<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSetting;
use DB;
class DashboardController extends Controller
{
   
    public function Dashboard(Request $request){
        $settings = null;
        if(Auth::check()){
            // dd('da');
            $totalProjects = DB::table('projects')->count();
            $planningProjects = DB::table('projects')->where('status', '0')->count();
            $inProgressProjects = DB::table('projects')->where('status', '1')->count();
            $onHoldProjects = DB::table('projects')->where('status', '2')->count();
            $completedProjects = DB::table('projects')->where('status', '3')->count();
            $lowPriorityProjects = DB::table('projects')->where('priority', '0')->count();
            $mediumPriorityProjects = DB::table('projects')->where('priority', '1')->count();
            $highPriorityProjects = DB::table('projects')->where('priority', '2')->count();

            return view('dashboard.dashboard', compact(
                    'totalProjects',
                    'planningProjects',
                    'inProgressProjects',
                    'onHoldProjects',
                    'completedProjects',
                    'lowPriorityProjects',
                    'mediumPriorityProjects',
                    'highPriorityProjects'
            ));
    }else{
        Auth::logout();
            return redirect('/login')->with('error', 'End Session, Automatic Logout');
        }
    }
}
