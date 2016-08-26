<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignatureValidator;
use App\Signatures;
use Barryvdh\DomPDF\PDF;


/**
 * Class SignatureController.
 */
class SignatureController extends Controller
{
    /**
     * Insert a new signature.
     *
     * @url:platform   POST: /signature
     * @see:phpunit    testSignature::testInsert()
     *
     * @param  SignatureValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(SignatureValidator $input)
    {
        Signatures::create($input->except('_token'));

        $message = 'Bedankt om de petitie te ondertekenen.';
        $class = 'alert alert-success';

        session()->flash('class', $class);
        session()->flash('message', $message);

        return redirect()->back();
    }

    /**
     * Get the paper petition.
     *
     * @url:platform
     * @see:phpunit
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf.signature');

        return $pdf->stream();
    }
}
