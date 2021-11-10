<?php

namespace App\Http\Controllers;

use App\Senior;
use App\Gender;
use App\CivilStatus;
use App\Barangay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\SeniorRequest;


class SeniorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seniorinfos = Senior::get();
        return view('senior.search', compact('seniorinfos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $senior_gender = Gender::get();
        $civil_status = CivilStatus::get();
        $barangays = Barangay::get();

        return view('senior.create', compact('senior_gender','civil_status', 'barangays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeniorRequest $request)
    {

        
        $seniorinfo = new Senior();

        $seniorinfo-> lname = $request->input('lname');
        $seniorinfo-> fname = $request->input('fname');
        $seniorinfo-> mname = $request->input('mname');
        $seniorinfo-> reg_num = $request->input('reg_num');
        $seniorinfo-> height = $request->input('height');
        $seniorinfo-> weight = $request->input('weight');
        $seniorinfo-> b_day = $request->input('b_day');
        $seniorinfo-> gender_id = $request->input('gender_id');
        $seniorinfo-> civstatus_id = $request->input('civstatus_id');
        $seniorinfo-> mobile_num = $request->input('mobile_num');
        $seniorinfo-> street_address = $request->input('street_address');
        $seniorinfo-> barangay_id = $request->input('barangay_id');
        $seniorinfo-> municipality = $request->input('municipality');
        $seniorinfo-> province = $request->input('province');
        $seniorinfo-> e_name = $request->input('e_name');
        $seniorinfo-> e_contact = $request->input('e_contact');
        $seniorinfo-> e_address = $request->input('e_address');
        $seniorinfo-> senior_illness = $request->input('senior_illness');

        if ($request->hasFile('senior_img'))
        {
            $file = $request->file('senior_img');
            //$extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            // $request->senior_img->storeAs('senior_images', $filename, 'public');
            $file->move('uploads/senior_images/', $filename);
            $seniorinfo->senior_img = $filename;
        }

        if ($request->hasFile('senior_file'))
        {
            $file = $request->file('senior_file');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/senior_files/', $filename);
            $seniorinfo->senior_file = $filename;
        }
         //dd($seniorinfo);
        $seniorinfo->save();


        return redirect()->route('senior.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seniorinfo = Senior::where('id', $id)->firstOrFail();
        return view('senior.show', compact('seniorinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $senior_gender = Gender::get();
        $civil_status = CivilStatus::get();
        $barangays = Barangay::get();
        $seniorinfo = Senior::where('id', $id)->firstOrFail();

        return view('senior.edit', compact('senior_gender','civil_status', 'barangays', 'seniorinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seniorinfo = Senior::findOrFail($id);

        $seniorinfo-> lname = $request->input('lname');
        $seniorinfo-> fname = $request->input('fname');
        $seniorinfo-> mname = $request->input('mname');
        $seniorinfo-> reg_num = $request->input('reg_num');
        $seniorinfo-> height = $request->input('height');
        $seniorinfo-> weight = $request->input('weight');
        $seniorinfo-> b_day = $request->input('b_day');
        $seniorinfo-> gender_id = $request->input('gender_id');
        $seniorinfo-> civstatus_id = $request->input('civstatus_id');
        $seniorinfo-> mobile_num = $request->input('mobile_num');
        $seniorinfo-> street_address = $request->input('street_address');
        $seniorinfo-> barangay_id = $request->input('barangay_id');
        $seniorinfo-> municipality = $request->input('municipality');
        $seniorinfo-> province = $request->input('province');
        $seniorinfo-> e_name = $request->input('e_name');
        $seniorinfo-> e_contact = $request->input('e_contact');
        $seniorinfo-> e_address = $request->input('e_address');
        $seniorinfo-> senior_illness = $request->input('senior_illness');

        if ($request->hasFile('senior_img'))
        {
            $file = $request->file('senior_img');
            //$extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            // $request->senior_img->storeAs('senior_images', $filename, 'public');
            $file->move('uploads/senior_images/', $filename);
            $seniorinfo->senior_img = $filename;
        }

        if ($request->hasFile('senior_file'))
        {
            $file = $request->file('senior_file');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/senior_files/', $filename);
            $seniorinfo->senior_file = $filename;
        }
         //dd($seniorinfo);
        $seniorinfo->update();


        return redirect()->route('senior.show', $seniorinfo->id)->withStatus(__('Information successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seniorinfo = Senior::findOrFail($id);
        if(\File::exists(public_path().'/uploads/senior_images/'.$seniorinfo->senior_img)){
            \File::delete(public_path().'/uploads/senior_images/'.$seniorinfo->senior_img);
        }
        if(\File::exists(public_path().'/uploads/senior_files/'.$seniorinfo->senior_file)){
            \File::delete(public_path().'/uploads/senior_files/'.$seniorinfo->senior_file);
        }
        $seniorinfo->forceDelete();
        return redirect()->route('senior.search');
    }

    public function deceased($id)
    {
        $seniorinfo = Senior::findOrFail($id);
        $seniorinfo->delete();
        return redirect()->route('senior.search');
    }

    public function restore($id)
    {
        Senior::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('senior.search');
    }

    public function updateStatus(Request $request)
    {
        $senior = Senior::findOrFail($request->senior_id);
        $senior->status = $request->status;
        $senior->save();

        return response()->json(['message' => 'Pension status updated successfully.']);
    }

    public function showDeceased(){
        $deceasedSeniors = Senior::onlyTrashed()->get();
        return view('senior.deceased', compact('deceasedSeniors'));
    }

    public function download($id){
        $seniorFile = Senior::where('id', '=', $id)->firstOrFail();
        return response()->download(public_path("/uploads/senior_files/{$seniorFile->senior_file}"));
    }
}
