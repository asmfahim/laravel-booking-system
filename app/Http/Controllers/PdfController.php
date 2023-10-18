<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;


class PdfController extends Controller
{
    public function User_Pdf()
    {
        $data = User::all();
        $pdf = PDF::loadView('pages.pdf.user-pdf',compact('data'));
        return $pdf->download('User.pdf');

    }

    public function Booking_Pdf()
    {

        $data = Booking::all();
        $pdf = PDF::loadView('pages.pdf.booking-pdf',compact('data'));
        return $pdf->download('Booking.pdf');
    }
}
