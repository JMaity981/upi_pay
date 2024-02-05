<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Endroid\QrCode\QrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function generateUpiQrCode(Request $request)
    {
        // UPI link example (replace with your own UPI details)  composer require simplesoftwareio/simple-qrcode
        $am=$request->am ? $request->am : 0;
        $tn=$request->tn ? $request->tn : "";
        $upiLink = 'upi://pay?pa=7856256556@ybl&pn=Jayanta&tn='.$tn.'&am='.$am.'&cu=INR';
        // $upiLink = 'upi://pay?pa=example@upi&pn=Recipient&mc=123&tid=123456&tr=123456789&tn=Payment%20for%20goods&am=10.00&cu=INR';

        // Generate QR code
        QrCode::generate($upiLink, public_path('qr/upi_qr_code'.$am.'.png'));

        // Display the QR code or redirect as needed
        return response()->file(public_path('qr/upi_qr_code'.$am.'.png'));
        // return view('upi_qr', compact('am', 'tn', 'upiLink'));
    }

    public function qrBtn(Request $request)
    {
        // UPI link example (replace with your own UPI details)  composer require simplesoftwareio/simple-qrcode
        $am=$request->am ? $request->am : 0;
        $tn=$request->tn ? $request->tn : "";
        $upiLink = 'upi://pay?pa=7856256556@ybl&pn=Jayanta&tn='.$tn.'&am='.$am.'&cu=INR';

        // Generate QR code
        // QrCode::generate($upiLink, public_path('qr/upi_qr_code'.$am.'.png'));
          // Generate SVG QR code
        $svgQRCode = QrCode::size(300)->format('svg')->generate($upiLink);
        // Display the QR code or redirect as needed
        return view('upi_qr', compact('am', 'tn', 'upiLink','svgQRCode'));
    }
}
