<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function index()
    {

        $categories = Category::orderBy('category_name',"ASC")->get();

        return view('pages.booking.booking-view',compact('categories',));
    }

    public function confirm($id)
    {
        $data = Booking::find($id);
        $data->status = 1;
        $data->save();

        session()->flash('success', 'Booking has been confirmed !!');

        return redirect()->route('booking.index');
    }

    //Sub Category ajax
    public function Sub_Ajax(Request $request,$id){

        if($request->ajax())
        {
            $data = SubCategory::where('category_id',  $id)
                ->get();
            return response()->json($data);
        }

    }

    //Sub Category ajax
    public function Booking_Ajax(Request $request){

        if($request->ajax())
        {
            $data = Booking::orderBy('start',"ASC")->get();
            return response()->json($data);
        }

    }

    public function Booking_Delete(Request $request){

        if($request->type == 'delete')
        {
            $event = Booking::find($request->id)->delete();

            return response()->json($event);
        }


    }



}