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
     * SignatureController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['insert', 'pdf']]);
    }

    /**
     * Get all the signatures in the index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['signatures'] = Signatures::paginate(50);
        return view('signature.index', $data);
    }

    public function search()
    {

    }

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
        Signatures::create([
            'naam'          => $input->naam,
            'geboortedatum' => $input->dag .'/'. $input->maand .'/'. $input->jaar,
            'email'         => $input->email,
            'stad'          => $input->stad,
        ]);

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
