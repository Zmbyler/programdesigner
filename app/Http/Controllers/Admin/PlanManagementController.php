<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;
use App\Plan;

class PlanManagementController extends Controller
{
    public function index(Request $request)
    {
        $keyword = '';
        $status = '';
        if($request->keyword){
            $keyword =$request->keyword;
            $plans = Plan::Where('name','LIKE', '%'.$keyword.'%')
            ->orderBy('created_at','desc')->get();
        }elseif($request->status){
            $status = $request->status;
            $plans = Plan::where('status', ($status == 'Inactive') ? false : true)
            ->orderBy('created_at','desc')->get();
        }else{
           $plans = Plan::latest()->get();
        }
        return view('admin.planmanagement.index',compact('plans','keyword','status'));
    }

    public function create()
    {
        return view('admin.planmanagement.create');
    }

    public function store(Request $request)
    {
        $stripe = Stripe::make(config('app.stripe_api_key'), '2020-03-02');
        $this->validate($request,[
            'name'      =>'required|min:3',
            'no_of_user'=>'required|integer|gt:0',
            'price'     =>'required|integer|gt:0',
            'interval'  =>'required',
        ]);
        $input = $request->all();
        try {
            $plan = $stripe->plans()->create([
                'amount'    => $input['price'],
                'currency'  => 'inr',
                'interval'  => $input['interval'],
                'product'   => ['name' => $input['name']],
                'metadata'  => ['no_of_user'=>$input['no_of_user'],'name'=>$input['name']]
            ]);
        }catch (Cartalyst\Stripe\Exception\NotFoundException $e) {
            $message = $e->getMessage();
            return back()->with('error',$message);
        }
        Plan::create([
            'plan_id'       => $plan['id'],
            'name'          => $input['name'],
            'price'         => $input['price'],
            'interval'      => $input['interval'],
            'no_of_user'    => $input['no_of_user'],
        ]);
        return redirect()->route('plan.index')->with('success','Plan has created successfully.');
    }
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.planmanagement.edit',compact('plan'));
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
        $stripe = Stripe::make(config('app.stripe_api_key'), '2020-03-02');
        $this->validate($request,[
            'name'      =>'required|min:3',
            'no_of_user'=>'required|integer|gt:0',
        ]);
        $plan = Plan::findOrFail($id);
        if($plan){
            $input = $request->all();
            try {
                $stripe->plans()->update($plan->plan_id, 
                    ['metadata' => ['no_of_user' => $input['no_of_user'],'name'=> $input['name']]]
                );
            }catch (Cartalyst\Stripe\Exception\NotFoundException $e) {
                $message = $e->getMessage();
                return back()->with('error',$message);
            }
            $plan->update($input);
            return redirect()->route('plan.index')->with('success','Plan updated successfully.');
        }else{
            return redirect()->route('plan.index')->with('error','No Plan found.');
        }
    }

     public function status($id){
        $plan = Plan::findOrFail($id);
        if($plan){
            $status = ($plan->status==1)?0:1;
            $plan->update(['status'=>$status]);
            return redirect()->route('plan.index')->with('success','Plan updated successfully.');
        }else{
            return redirect()->route('plan.index')->with('error','No Plan found.');
        }
       
    }

    public function destroy($id)
    {
        $stripe = Stripe::make(config('app.stripe_api_key'), '2020-03-02');
        $plan = Plan::findOrFail($id);
        
        if($plan){
            try{
               $stripe->plans()->delete($plan->plan_id); 
            }catch (Cartalyst\Stripe\Exception\NotFoundException $e) {
                $message = $e->getMessage();
                return back()->with('error',$message);
            }
            
            $plan->delete();
            return redirect()->route('plan.index')->with('success','Plan Deleted Successfully.');

        }else{
            return redirect()->route('plan.index')->with('error','No plan found.');
        }
    }
}
