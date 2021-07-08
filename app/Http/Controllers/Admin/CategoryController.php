<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Exercise;

class CategoryController extends Controller
{

    public function index(Request $request){
        $parentCategories = Category::with('subcategory')->where('parent_id',0)->orderBy('created_at','desc')->get();
        return view('admin.category.index',compact('parentCategories'));
    }

    public function create(){
        $categories = Category::latest()->pluck('name','id');
        return view('admin.category.create',compact('categories'));
    }


    public function store(Request $request){
        $rules = array(
            'name'=>'required'
        );
        $validator = Validator::make($request->all(),$rules);

        $parentcategory = Category::where('name',$request->name)->where('parent_id',0)->first();
        $childcategory = Category::where('name',$request->name)->where('parent_id',$request->parent_id)->first();
        if($parentcategory || $childcategory){
            $validator->getMessageBag()->add('name', 'Category Already Added');
            return redirect()->back()->withErrors($validator);
        }else{
            $input = [
                'name'=>$request->name,
                'parent_id'=>$request->parent_id == null ? 0 : $request->parent_id,
        ];
        $category = Category::create($input);
        return redirect()->route('category.index')->with('success','Category has created successfully.');
        }


    }

    public function edit($id){
        $category = Category::findOrFail($id);
        $categories = Category::where('id','!=',$category->id)->pluck('name','id');
        return view('admin.category.edit',compact('category','categories'));
    }


    public function update(Request $request, $id){

        // $this->validate($request,[
        //     'name'=>'required',
        // ]);

        $rules = array(
            'name'=>'required'
        );
        $validator = Validator::make($request->all(),$rules);

        // $parentcategory = Category::where('name',$request->name)->where('parent_id',0)->first();
        // $childcategory = Category::where('name',$request->name)->where('parent_id',$request->parent_id)->first();
        // if($parentcategory || $childcategory){
        //     $validator->getMessageBag()->add('name', 'Category Already Added');
        //     return redirect()->back()->withErrors($validator);
        // }else{
            $category = Category::findOrFail($id);
            if($category){
                $input = [
                    'name'=>$request->name,
                    'parent_id'=>$request->parent_id == null ? 0 : $request->parent_id,
                ];
                $category->update($input);
                return redirect()->route('category.index')->with('success','Category updated successfully.');
            }else{
                return redirect()->route('category.index')->with('error','No category found.');
            }

        //}

    }

    public function status($id){
        $category = Category::findOrFail($id);
        if($category){
            $status = ($category->status==1)?0:1;
            $category->update(['status'=>$status]);
            return redirect()->route('category.index')->with('success','category updated successfully.');
        }else{
            return redirect()->route('category.index')->with('error','No category found.');
        }

    }

    public function catdelete($id)
    {
        $category = Category::findOrFail($id);
        if($category){
            $ids = getchildIds(Category::where('id',$id)->with('childrenrecursive')->first());
            $subcat_id = array_unique($ids);
            Category::whereIn('id',$subcat_id)->delete();
            return redirect()->route('category.index')->with('success','Category Deleted Successfully.');
        }else{
            return redirect()->route('category.index')->with('error','No category found.');
        }
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        if($category){
            $ids = getchildIds(Category::where('id',$id)->with('childrenrecursive')->first());
            $subcat_id = array_unique($ids);
            Category::whereIn('id',$subcat_id)->delete();
            //$subcat_id->delete();
            // if(Exercise::where('category_id',$category->id)->exists()){
            //     return redirect()->route('category.index')->with('warning','Category can not be deleted as it contains some few excercise.');
            // }else if(Category::where('parent_id',$category->id)->exists()){
            //     return redirect()->route('category.index')->with('warning','Category can not be deleted as it contains some sub-categories.');
            // }else{
            //$subcat_id->delete();
            return redirect()->route('category.index')->with('success','Category Deleted Successfully.');
            // }

        }else{
            return redirect()->route('category.index')->with('error','No category found.');
        }
    }
}
