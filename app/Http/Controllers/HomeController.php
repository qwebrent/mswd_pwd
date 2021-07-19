<?php

namespace App\Http\Controllers;
use App\Gender;
use App\PWDInfo;
use App\Barangay;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $maleCount = PWDInfo::where('gender_id', 1)->count();
        $femaleCount = PWDInfo::where('gender_id', 2)->count();


            $chart = (new LarapexChart)->barChart()
            ->setTitle('Number of PWD per Barangay')
            ->addData('Balayhangin',[\App\PWDInfo::where('barangay_id',1)->count()])
            ->addData('Bangyas',[\App\PWDInfo::where('barangay_id',2)->count()])
            ->addData('Dayap',[\App\PWDInfo::where('barangay_id',3)->count()])
            ->addData('Dayap II',[\App\PWDInfo::where('barangay_id',4)->count()])
            ->addData('Hanggan',[\App\PWDInfo::where('barangay_id',5)->count()])
            ->addData('Imok',[\App\PWDInfo::where('barangay_id',6)->count()])
            ->addData('Lamot 1',[\App\PWDInfo::where('barangay_id',7)->count()])
            ->addData('Lamot 2',[\App\PWDInfo::where('barangay_id',8)->count()])
            ->addData('Limao',[\App\PWDInfo::where('barangay_id',9)->count()])
            ->addData('Mabacan',[\App\PWDInfo::where('barangay_id',10)->count()])
            ->addData('Masiit',[\App\PWDInfo::where('barangay_id',11)->count()])
            ->addData('Paliparan',[\App\PWDInfo::where('barangay_id',12)->count()])
            ->addData('Perez',[\App\PWDInfo::where('barangay_id',13)->count()])
            ->addData('Prinza',[\App\PWDInfo::where('barangay_id',14)->count()])
            ->addData('Kanluran',[\App\PWDInfo::where('barangay_id',15)->count()])
            ->addData('Silangan',[\App\PWDInfo::where('barangay_id',16)->count()])
            ->addData('San Isidro',[\App\PWDInfo::where('barangay_id',17)->count()])
            ->addData('Santo Tomas',[\App\PWDInfo::where('barangay_id',18)->count()])



            ->setXAxis(['Barangay']);

            // ->setLabels(['Balayhangin', 'Bangyas', 'Dayap ', 'Dayap II', 'Hanggan', 'Imok', 'Lamot 1', 'Lamot 2',
            // 'Limao', 'Mabacan', 'Masiit', 'Paliparan', 'Perez', 'Prinza', 'Kanluran', 'Silangan', 'San Isidro', 'Santo Tomas']);

        return view('dashboard', compact('chart', 'maleCount', 'femaleCount'));

    }
}
