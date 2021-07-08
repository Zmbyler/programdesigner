<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProgramTemplatePdf;
use App\ProgramControl;
use Auth,Validator,Mail;

/**
 * @group Program Template Pdf Mangement
 *
 * APIs for managing Program Template manage
 */
class ProgramTeplatePdfController extends Controller
{
	/**
     * Add Guest
     * @bodyParam program_controls_id string required Program Control Id.
     * @bodyParam email array required Email.
     * @bodyParam notes string required Notes.
     * @bodyParam name string required Name.
     * @bodyParam pdf file required pdf.
     **/
    public function ProgramTemplatePdf(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'name'                =>'required',
    		'program_controls_id' =>'required',
    		'email'               =>'present|array',
    		'notes'               =>'required',
    		'pdf'                 =>'required',
    	]);

    	if($validator->fails())
    	{
    		$errors = $validator->errors()->first();
    		return response()->json(['success'=>false,'message'=>$errors]);
    	}

    	$programcontrol = ProgramControl::where('id',$request->program_controls_id)->first();
    	if(!$programcontrol)
    	{
    		return response()->json(['success'=>false,'message'=>'Program not found']);
    	}
    	if($request->has('pdf'))
        {
    		$pdf = $request->pdf;
    		$fileName = time().'_'.str_replace(' ','_',$pdf->getClientOriginalName());
    		$destintionpath = public_path('uploads/program_pdf/');
    		$pdf->move($destintionpath,$fileName);
    	}else{
    		$fileName= null;
    	}

    	$filedata = [
    		'user_id'				=>Auth::user()->id,
    		'program_controls_id'	=>$request->program_controls_id,
    		'email'					=>json_encode($request->email),
    		'notes'					=>$request->notes,
    		'pdf'					=>$fileName,
    	];

    	$program = ProgramTemplatePdf::create($filedata);
    	$data              = [];
    	$data['name']      = $request->name;
        $data['note']      = $request->note;
    	$data['fileName']  = $program->pdf;
    	$emails            = $request->email;
    	Mail::send('mail.pdfMail',$data,function($message) use($data,$emails){
    		$message->to($emails)->subject('Find the attachment');
    		$message->attach(public_path('uploads/program_pdf/'.$data['fileName']),array(
    			'as'=>$data['fileName'],
    			'mime'=>'application/pdf',
    		));
    	});
    
    	if($program)
    	{
    		return response()->json(['success'=>true,'message'=>'Program Template Pdf send to Mail.']);
    	}else{
    		return response()->json(['success'=>false,'message'=>'Mail Not Send']);
    	}
    }
}
