<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignatureValidator;
use App\Signatures;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;


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
     * @param  Signatures $sign
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Signatures $sign)
    {
        $data['unknown']    = $sign->where('leeftijd', '<', 0)->orWhere('leeftijd', 'geen')->count();
        $data['adult']      = $sign->where('leeftijd', '>', 18)->count();
        $data['youth']      = $sign->where('leeftijd', '<', 18)->count();
        $data['signatures'] = $sign->paginate(50); // All the signatures
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
        $current = Carbon::now();
        $birth   = $input->dag .'/'. $input->maand .'/'. $input->jaar;

        Signatures::create([
            'naam'          => $input->naam,
            'geboortedatum' => $birth,
            'email'         => $input->email,
            'stad'          => $input->stad,
            'leeftijd'      => $current->diffInYears(Carbon::parse($birth))
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

    /**
     * Export the data to csv.
     */
    public function exportCsv()
    {
        Excel::create('Signatures', function ($csv) {
            $csv->sheet('all', function($sheet) {
                $signatures = Signatures::all();
                $sheet->loadView('signature.report', compact('signatures'));
            });
        })->download('csv');
    }

    /**
     * Export the data to excel.
     */
    public function exportExcel()
    {
        Excel::create('Signatures', function ($excel) {
            $excel->sheet('all', function($sheet) {
                $signatures = Signatures::all();
                $sheet->loadView('signature.report', compact('signatures'));
            });
        })->download('xls');
    }

    /**
     * Export the data to excel 2007.
     */
    public function exportExcel2007()
    {
        Excel::create('Signatures', function ($excel2007) {
            $excel2007->sheet('all', function($sheet) {
                $signatures = Signatures::all();
                $sheet->loadView('signature.report', compact('signatures'));
            });
        })->download('xlsx');
    }

    /**
     * Export the data to pdf.
     */
    public function exportPdf()
    {
        Excel::create('Signatures', function ($pdf) {
            $pdf->sheet('all', function($sheet) {
                $signatures = Signatures::all();
                $sheet->loadView('signature.report', compact('signatures'));
            });
        })->download('pdf');
    }
}
