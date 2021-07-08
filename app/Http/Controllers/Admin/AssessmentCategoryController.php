<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AssessmentCategory;
use App\AssessmentResult;
use App\AssessmentCatOption;
use App\Exercise;
use Auth;

class AssessmentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assementcategory = AssessmentCategory::with('assessmentcatoption.assessmentresult')->orderBy('id','desc')->get();
        return view('admin.assessmentCategoy.index',compact('assementcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assessmentresults = AssessmentResult::where('user_id',Auth::user()->id)->whereStatus(1)->orderBy('id','desc')->get();
        return view('admin.assessmentCategoy.create',compact('assessmentresults'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        $category = new AssessmentCategory;
        $category->name = $request->name;
        $category->category_option = json_encode($request->h_asssessment);
        $category->save();
        //if($key == "val"){
            
       // }
//return $request->h_asssessment;
        $data = [];
        foreach ($request->h_asssessment as $key => $value) {
            if(@$value['val']){
                $catoption = new AssessmentCatOption;
                $catoption->assessment_category_id= $category->id;
                $catoption->assessment_result_id= $value['id'];
                $catoption->option_value= $value['val'];
                $catoption->save();
                $data[] = ['id'=> $value['id'],'val'=> $value['val']];
            }
        }
        $category->update(['category_option'=>$data]);
        return redirect()->route('assessmentCategory.index')->with('success','Assessment Result Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assessmentCategory = AssessmentCategory::with('assessmentcatoption.assessmentresult')->findOrFail($id);
        $assessmentresults = AssessmentResult::whereStatus(1)->orderBy('id','desc')->get();
        return view('admin.assessmentCategoy.edit',compact('assessmentCategory','assessmentresults'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',

        ]);
        $category = AssessmentCategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        if($category){
            AssessmentCatOption::where('assessment_category_id',$id)->delete();
            foreach ($request->h_asssessment as $key => $value) {
                if(@$value['val']){
                    $catoption = new AssessmentCatOption;
                    $catoption->assessment_category_id= $category->id;
                    $catoption->assessment_result_id= $value['id'];
                    $catoption->option_value= $value['val'];
                    $catoption->save();
                    $data[] = ['id'=> $value['id'],'val'=> $value['val']];
                }
            }
            $category->update(['category_option'=>$data]);
            // foreach ($request->h_asssessment as $key => $value) {
            //     $assessment = AssessmentCatOption::where('assessment_category_id',$id)->get();
            //     foreach( $assessment as $ass){
            //        $ass->where('assessment_result_id',$value['id'])->update(['option_value'=>$value['val']]);
            //     }
            //     // $catoption = new AssessmentCatOption;
            //     // $catoption->assessment_category_id= $id;
            //     // $catoption->assessment_result_id= $value['id'];
            //     // $catoption->option_value= $value['val'];
            //     // $catoption->save();
            // }
            
            return redirect()->route('assessmentCategory.index')->with('success','Assessment Category updated successfully.');
        }else{
            return redirect()->route('assessmentCategory.index')->with('error','No Assessment Category found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assessmentCategory = AssessmentCategory::findOrFail($id);
        if($assessmentCategory){
            Exercise::where('assessment_category_id',$id)->update(['assessment_category_id'=>null]);
            $assessmentCategory->delete();
            return redirect()->route('assessmentCategory.index')->with('success','Assessment Category Delete Successfully.');
        }else{
            return redirect()->route('assessmentCategory.index')->with('error','No Assessment Category found.');
        }
    }
}
