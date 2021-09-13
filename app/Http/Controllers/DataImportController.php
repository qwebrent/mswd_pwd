<?php

namespace App\Http\Controllers;

use App\Imports\SeniorsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataImportController extends Controller
{
    public function index(){
        return view('senior.import');
    }

    public function store(Request $request){


        $file = $request->file('file')->store('import');

        $import = new SeniorsImport;
        $import -> import($file);

        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }
        //Excel::import(new SeniorsImport, $file);
        return back()->withStatus('Excel file imported successfully');

    }
}
