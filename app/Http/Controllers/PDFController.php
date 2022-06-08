<?php

namespace App\Http\Controllers;
use PDF;
use Mail;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function sendmail()
    {
        $data["email"] = "email@sme.gov.ao";
        $data["title"] = "Gvisitas.com";
        $data["body"] = "Este sera um teste";

        $pdf = PDF::loadView('dashboard.sendmail', $data);

        Mail::send('dashboard.sendmail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });

        dd('Mail sent successfully');
    }
}
