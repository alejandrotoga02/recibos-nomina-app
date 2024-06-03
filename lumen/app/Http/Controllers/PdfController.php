<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{

    public function index()
    {
        $pdf = Pdf::loadView('payroll');

        return $pdf->stream();

        return view('payroll');
    }
}
