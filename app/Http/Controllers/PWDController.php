<?php

namespace App\Http\Controllers;

use QrCode;
use Validator;
use App\Educbg;
use App\Gender;
use App\PWDInfo;
use App\Barangay;
use App\Disability;
use App\CivilStatus;
use App\PWDDisability;
use Illuminate\Http\Request;
use App\Http\Requests\PWDRequest;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PWDUpdateRequest;

class PWDController extends Controller
{
    public function index()
    {
        $pwdinfos = PWDInfo::get();
        return view('pwd.search', compact('pwdinfos'));
    }

    public function show($id){
        $pwdinfo = PWDInfo::where('id', $id)->firstOrFail();
        return view('pwd.show', compact('pwdinfo'));
    }

    public function create()
    {
        $pwd_gender = Gender::get();
        $civil_status = CivilStatus::get();
        $educ_bg = Educbg::get();
        $pwd_disabilities = Disability::get();
        $barangays = Barangay::get();
        return view('pwd.create', compact('pwd_gender','civil_status','educ_bg', 'pwd_disabilities', 'barangays'));
    }

    public function store(PWDRequest $request)
    {


        $pwdinfo = new PWDInfo();

        $pwdinfo-> lname = $request->input('lname');
        $pwdinfo-> fname = $request->input('fname');
        $pwdinfo-> mname = $request->input('mname');
        $pwdinfo-> suffix = $request->input('suffix');
        $pwdinfo-> reg_num = $request->input('reg_num');
        $pwdinfo-> sss_num = $request->input('sss_num');
        $pwdinfo-> phealth_num = $request->input('phealth_num');
        $pwdinfo-> b_day = $request->input('b_day');
        $pwdinfo-> gender_id = $request->input('gender_id');
        $pwdinfo-> civstatus_id = $request->input('civstatus_id');
        $pwdinfo-> educbg_id = $request->input('educbg_id');
        $pwdinfo-> mobile_num = $request->input('mobile_num');
        $pwdinfo-> street_address = $request->input('street_address');
        $pwdinfo-> barangay_id = $request->input('barangay_id');
        $pwdinfo-> municipality = $request->input('municipality');
        $pwdinfo-> province = $request->input('province');
        $pwdinfo-> emp_status = $request->input('emp_status');
        $pwdinfo-> emp_type = $request->input('emp_type');
        $pwdinfo-> pwd_skill = $request->input('pwd_skill');
        $pwdinfo-> disability_name = $request->input('disability_name');

        if ($request->hasFile('pwd_img'))
        {
            // $file = $request->file('pwd_img');
            // $filename = $file->getClientOriginalName();
            // $request->pwd_img->storeAs('pwd_images', $filename, 'public');
            // $pwdinfo->pwd_img = $filename;

            $file = $request->file('pwd_img');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/pwd_images/', $filename);
            $pwdinfo->pwd_img = $filename;
        }

        if ($request->hasFile('pwd_file'))
        {
            $file = $request->file('pwd_file');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/pwd_files/', $filename);
            $pwdinfo->pwd_file = $filename;
        }
        // dd($pwdinfo);
        $pwdinfo->save();


        return redirect()->route('pwd.home');
    }

    public function edit($id){
        $pwd_gender = Gender::get();
        $civil_status = CivilStatus::get();
        $educ_bg = Educbg::get();
        $pwd_disabilities = Disability::get();
        $barangays = Barangay::get();
        $pwdinfo = PWDInfo::get()->where('id', $id)->first();
        return view('pwd.edit', compact('pwd_gender','civil_status','educ_bg', 'pwd_disabilities', 'barangays', 'pwdinfo'));
    }

    public function update(PWDUpdateRequest $request, $id){

        $pwdinfo = PWDInfo::findOrFail($id);

        $pwdinfo-> lname = $request->input('lname');
        $pwdinfo-> fname = $request->input('fname');
        $pwdinfo-> mname = $request->input('mname');
        $pwdinfo-> suffix = $request ->input('suffix');
        $pwdinfo-> reg_num = $request->input('reg_num');
        $pwdinfo-> sss_num = $request->input('sss_num');
        $pwdinfo-> phealth_num = $request->input('phealth_num');
        $pwdinfo-> b_day = $request->input('b_day');
        $pwdinfo-> gender_id = $request->input('gender_id');
        $pwdinfo-> civstatus_id = $request->input('civstatus_id');
        $pwdinfo-> educbg_id = $request->input('educbg_id');
        $pwdinfo-> mobile_num = $request->input('mobile_num');
        $pwdinfo-> street_address = $request->input('street_address');
        $pwdinfo-> barangay_id = $request->input('barangay_id');
        $pwdinfo-> municipality = $request->input('municipality');
        $pwdinfo-> province = $request->input('province');
        $pwdinfo-> emp_status = $request->input('emp_status');
        $pwdinfo-> emp_type = $request->input('emp_type');
        $pwdinfo-> pwd_skill = $request->input('pwd_skill');
        $pwdinfo-> disability_name = $request->input('disability_name');

        if ($request->hasFile('pwd_img'))
        {
                $file = $request->file('pwd_img');
                $filename = $file->getClientOriginalName();
                $file->move('uploads/pwd_images/', $filename);
                // $request->pwd_img->storeAs('pwd_images', $filename, 'public');
                //File::delete(public_path('/storage/pwd_images/'.$pwdinfo->pwd_img));
                $pwdinfo->pwd_img = $filename;

         }
        if ($request->hasFile('pwd_file'))
        {
                $file = $request->file('pwd_file');
                $filename = $file->getClientOriginalName();
                $file->move('uploads/pwd_files/', $filename);
                // $request->pwd_file->storeAs('pwd_files', $filename, 'public');
                //File::delete(public_path('/storage/pwd_files/'.$pwdinfo->pwd_file));
                $pwdinfo->pwd_file = $filename;
        }
        // dd($pwdinfo);
        $pwdinfo->update();


        return redirect()->route('pwd.show', $pwdinfo->id)->withStatus(__('Information successfully updated.'));

    }

    public function destroy($id)
    {
        $pwdinfo = PWDInfo::findOrFail($id);
        if(\File::exists(public_path().'/uploads/pwd_images/'.$pwdinfo->pwd_img)){
            \File::delete(public_path().'/uploads/pwd_images/'.$pwdinfo->pwd_img);
        }
        if(\File::exists(public_path().'/uploads/pwd_files/'.$pwdinfo->pwd_file)){
            \File::delete(public_path().'/uploads/pwd_files/'.$pwdinfo->pwd_file);
        }
        $pwdinfo->delete();
        return redirect()->route('pwd.search');
    }


    public function download($id){
        $pwdMedicalFile = PWDInfo::where('id', '=', $id)->first();
        return response()->download(public_path("/uploads/pwd_files/{$pwdMedicalFile->pwd_file}"));
    }


}
