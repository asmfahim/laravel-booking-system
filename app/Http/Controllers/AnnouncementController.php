<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcement = Announcement::orderBy('id','DESC')->get();
        return view('pages.announcement.announcement-view',compact('announcement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::all();
        return view('pages.announcement.announcement-create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required' ,
            'notice_date'   => 'required',
            'publish_date'   => 'required',
        ]);



        $uid = Auth::user()->getRoleNames();
//        dd($request->message_to);
        for($i = 0; $i <count($request->message_to); $i++){
            Announcement::insert([
                'title' => $request->title,
                'message' => $request->message,
                'notice_date' => $request->notice_date,
                'publish_date' => $request->publish_date,
                'message_to' => $request->message_to[$i],
                'created_by' => $uid[0],
        ]);
        }

        session()->flash('success', 'Announcement has been Created !!');
        return redirect()->route('announcement.index');
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
        $announcement = Announcement::find($id);
        $roles = Role::all();
        return view('pages.announcement.announcement-edit',compact('announcement','roles'));
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
        $announcement = Announcement::find($id);

        // Validation Data
        $request->validate([
            'title' => 'required' ,
            'notice_date'   => 'required',
            'publish_date'   => 'required',
        ]);

        $uid = Auth::user()->getRoleNames();
//        dd($request->message_to);
        for($i = 0; $i <count($request->message_to); $i++){
            Announcement::update([
                'title' => $request->title,
                'message' => $request->message,
                'notice_date' => $request->notice_date,
                'publish_date' => $request->publish_date,
                'message_to' => $request->message_to[$i],
                'created_by' => $uid[0],
            ]);
        }

        session()->flash('success', 'Announcement has been updated !!');
        return redirect()->route('announcement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        if (!is_null($announcement)) {
            $announcement->delete();
        }

        session()->flash('success', 'Announcement has been deleted !!');
        return back();
    }
}
