<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class NoticeBoardController extends Controller
{
    public function index(){

        $uid = Auth::user()->getRoleNames();
        $roleId = Role::where('name', '=', $uid[0])->get(['id']);

//            dd($roleId[0]->id);
        $notice = Announcement::whereDate('notice_date', '<=', (new DateTime)->format('Y-m-d'))
                                ->whereDate('publish_date', '>=', (new DateTime)->format('Y-m-d'))
                                ->where('message_to', '=',$roleId[0]->id )
                                ->get();
//        dd($notice);
        return view('pages.noticeboard.noticeboard-view',compact('notice'));
    }
}
