<?php

namespace App\Http\Controllers;

use App\Models\StaffInfo;
use Auth;
use Illuminate\Http\Request;

class StaffInfoController extends Controller
{
    public function deleteStaffInfo(Request $request)
    {
        request()->validate([
            'txtStaffInfoID' => 'required',
            'currentPage' => 'required'
        ]);

        $staffInfo = StaffInfo::find($request->input('txtStaffInfoID'));
        $staffInfo->delete();

        return redirect()->route('staff_page', ['id' => 'update_profile','success' => 'Success! Deleted : ' . $request->input('currentPage'),   $request->input('currentPage') =>  $request->input('currentPage')]);
    }

    public function insertStaffInfoResearch(Request $request)
    {
        request()->validate([
            'txtTittle' => 'required|string',
            'txtInstitution' => 'required|string',
            'selectCategory' => 'required|string',
            'selectDate' => 'required|string',
            'selectStatus' => 'required|string',
        ]);


        $staff = new StaffInfo();
        $staff->email = Auth::user()->email;
        $staff->category = "research";
        $staff->tittle = $request->input('txtTittle');
        $staff->green_text = $request->input('txtInstitution');
        $staff->red_text = $request->input('selectCategory');
        $staff->blue_text = $request->input('selectDate');
        $staff->light_blue_text = $request->input('selectStatus');
        $staff->save();

        return redirect()->route('staff_page', ['id' => 'update_profile','success' => 'Success! information added.', 'research' => 'research']);
    }

    public function insertStaffInfoArticle(Request $request)
    {
        request()->validate([
            'txtTittle' => 'required|string',
            'txtInfo' => 'required|string',
            'txtIndex' => 'required|string',
            'selectAuthor' => 'required|string',
            'selectDate' => 'required|string',
        ]);

        $staff = new StaffInfo();
        $staff->email = Auth::user()->email;
        $staff->category = "article";
        $staff->tittle = $request->input('txtTittle');
        $staff->info = $request->input('txtInfo');
        $staff->red_text = $request->input('selectDate');
        $staff->green_text = $request->input('selectAuthor');
        $staff->blue_text = $request->input('txtIndex');
        $staff->save();

        return redirect()->route('staff_page', ['id' => 'update_profile','success' => 'Success! information added.', 'article' => 'article']);
    }


    public function insertStaffInfoProceeding(Request $request)
    {
        request()->validate([
            'txtTittle' => 'required|string',
            'selectLevel' => 'required|string',
            'selectDate' => 'required|string',
        ]);

        $staff = new StaffInfo();
        $staff->email = Auth::user()->email;
        $staff->category = "proceeding";
        $staff->tittle = $request->input('txtTittle');
        $staff->red_text = $request->input('selectDate');
        $staff->green_text = $request->input('selectLevel');
        $staff->save();

        return redirect()->route('staff_page', ['id' => 'update_profile','success' => 'Success! information added.', 'proceeding' => 'proceeding']);
    }

    public function insertStaffInfoOthers(Request $request)
    {
        request()->validate([
            'txtTittle' => 'required|string',
            'txtCategory' => 'required|string',
            'selectLevel' => 'required|string',
            'selectDate' => 'required|string',
        ]);

        $staff = new StaffInfo();
        $staff->email = Auth::user()->email;
        $staff->category = "others";
        $staff->tittle = $request->input('txtTittle');
        $staff->info = $request->input('txtInfo');
        $staff->red_text = $request->input('selectDate');
        $staff->green_text = $request->input('selectLevel');
        $staff->blue_text = $request->input('txtCategory');
        $staff->save();

        return redirect()->route('staff_page', ['id' => 'update_profile','success' => 'Success! information added.', 'others' => 'others']);
    }

    public function insertStaffInfoSupervision(Request $request)
    {
        request()->validate([
            'txtTittle' => 'required|string',
            'selectStatus' => 'required|string',
            'selectPosition' => 'required|string',
            'selectLevel' => 'required|string',
            'selectAcademicLevel' => 'required|string',
            'selectDate' => 'required|string',
        ]);

        $staff = new StaffInfo();
        $staff->email = Auth::user()->email;
        $staff->category = "supervision";
        $staff->tittle = $request->input('txtTittle');
        $staff->yellow_text = $request->input('selectStatus');
        $staff->light_blue_text = $request->input('selectPosition');
        $staff->green_text = $request->input('selectLevel');
        $staff->blue_text = $request->input('selectAcademicLevel');
        $staff->red_text = $request->input('selectDate');
        $staff->save();

        return redirect()->route('staff_page', ['id' => 'update_profile','success' => 'Success! information added.', 'supervision' => 'supervision']);
    }



    public function insertStaffInfoConsultation(Request $request)
    {
        request()->validate([
            'txtTittle' => 'required|string',
            'txtInfo' => 'required|string',
            'selectPosition' => 'required|string',
            'selectStatus' => 'required|string',
            'selectDate' => 'required|string',
        ]);

        $staff = new StaffInfo();
        $staff->email = Auth::user()->email;
        $staff->category = "consultation";
        $staff->tittle = $request->input('txtTittle');
        $staff->info = $request->input('txtInfo');

        $staff->blue_text = $request->input('selectPosition');
        $staff->green_text = $request->input('selectStatus');

        $staff->red_text = $request->input('selectDate');
        $staff->save();

        return redirect()->route('staff_page', ['id' => 'update_profile','success' => 'Success! information added.', 'consultation' => 'consultation']);
    }

    public function insertStaffInfoAward_Recognition(Request $request)
    {
        request()->validate([
            'txtTittle' => 'required|string',
            'txtInfo' => 'required|string',
            'selectLevel' => 'required|string',
            'selectMedal' => 'required|string',
            'selectDate' => 'required|string',
        ]);

        $staff = new StaffInfo();
        $staff->email = Auth::user()->email;
        $staff->category = "award_recognition";
        $staff->tittle = $request->input('txtTittle');
        $staff->info = $request->input('txtInfo');

        $staff->blue_text = $request->input('selectLevel');
        $staff->green_text = $request->input('selectMedal');

        $staff->red_text = $request->input('selectDate');
        $staff->save();

        return redirect()->route('staff_page', ['id' => 'update_profile','success' => 'Success! information added.', 'award_recognition' => 'award_recognition']);
    }
}
