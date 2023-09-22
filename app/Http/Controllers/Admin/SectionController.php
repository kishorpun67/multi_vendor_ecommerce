<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Session;
class SectionController extends Controller
{
    public function sections()
    {
        $sections = Section::get()->toArray();
        Session::flash('page', 'catelogue');
        return view('admin.sections.sections')->with(compact('sections'));
    }

    public function updateSectionStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =Section::where('id', $data['section_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Section::where('id', $data['section_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'section_id' =>$data['section_id']]);
        }
    }
    public function addEditSection(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Section";
            $button ="Submit";
            $section = new Section;
            $sectiondata = array();
            $message = "Section has been added sucessfully";
        }else{
            $title = "Edit Section";
            $button ="Update";
            $sectiondata = Section::where('id',$id)->first();
            $sectiondata= json_decode(json_encode($sectiondata),true);
            $section = Section::find($id);
            $message = "Section has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'section' => 'required',
              
            ];

            $customMessages = [
                'section.required' => 'section name is required!',
            ];
            $this->validate($request, $rules, $customMessages);

            $section->name = $data['section'];
            $section->status = 1;
            $section->save();
            Session::flash('success_message', $message);
            return to_route('admin.sections');
        }
        Session::flash('page', 'catelogue');
        return view('admin.sections.add_edit_section', compact('title','button','sectiondata'));
    }
    public function deteteSection($id)
    {
        Section::where('id', $id)->delete();
        return redirect()->back()->with('success_message','Section has been deleted!');
    }
}
