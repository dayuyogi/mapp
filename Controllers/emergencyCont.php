<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class emergencyCont extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewEmergency(){
        
        $emergency = DB::table('emergency')->get();

            return view('emergency')
            ->with('emergency',$emergency)
            ->with('act','viewEmergency');
       
    }

     public function viewEmergencyWithMsg($msg){
        
        $emergency = DB::table('emergency')->get();

            return view('emergency')
            ->with('emergency',$emergency)
            ->with('msg',$msg)
            ->with('act','viewEmergency');
    }


     public function viewTambahEmergency(){
        return view('emergency')
        ->with('act','viewTambahEmergency');

     }

     public function viewEditEmergency($emergency_id){
        
        $emergency = DB::table('emergency')->where('emergency_id','=',$emergency_id)->first();

        return view('emergency')
        ->with('emergency',$emergency)
        ->with('act','viewEditEmergency');
    }


    public function viewDeleteEmergency($emergency_id){
        $emergency = DB::table('emergency')->get();

        $emergency_del = DB::table('emergency')->where('emergency_id','=',$emergency_id)->first();

        return view('emergency')
        ->with('emergency',$emergency)
        ->with('emergency_del',$emergency_del)
        ->with('act','viewDeleteEmergency');
    }

	public function prosesTambahEmergency(Request $req){
        $emergency_id = $req->emergency_id;
    	$emergency_name = $req->emergency_name;
        $emergency_phone = $req->emergency_phone;
        $emergency_alamat = $req->emergency_alamat;
        $emergency_alamat = $req->emergency_alamat;
        $emergency_alamat = $req->emergency_alamat;

        if($req->hasFile('emergency_photo')){
            $req->file('emergency_photo');
            $upload = Storage::putFile('public/emergency', $req->file('emergency_photo'));

            $storage = 'storage/';
            $slash= '/';
            $cacah = explode("/",$upload);
            $emergency_photo = $storage.$cacah[1].$slash.$cacah[2];
        }
        else{
            $emergency_photo = 'user/img/noimage.png';
        }
        $hasil = DB::table('emergency')->insert(
            ['emergency_id' => $emergency_id,'emergency_name' => $emergency_name, 'emergency_phone' => $emergency_phone, 'emergency_alamat' => $emergency_alamat,'emergency_photo' => $emergency_photo]);

        if($hasil){
            return redirect('sipar/emergency/msg/1');
        }else{
            return redirect('sipar/emergency/msg/2');;
        }
    }

    public function prosesEditEmergency(Request $req){
        $emergency_id = $req->emergency_id;
        $emergency_name = $req->emergency_name;
        $emergency_phone = $req->emergency_phone;
        $emergency_alamat = $req->emergency_alamat;
        if($req->hasFile('emergency_photo')){
            $req->file('emergency_photo');
            $upload = Storage::putFile('public/emergency', $req->file('emergency_photo'));

            $storage = 'storage/';
            $slash= '/';
            $cacah = explode("/",$upload);
            $emergency_photo = $storage.$cacah[1].$slash.$cacah[2];
        }
        else{
            $emergency_photo = 'user/img/noimage.png';
        }
        $hasil = DB::table('emergency')
            ->where('emergency_id','=',$emergency_id)
            ->update(['emergency_name' => $emergency_name, 'emergency_phone' => $emergency_phone, 'emergency_alamat' => $emergency_alamat,'emergency_photo' => $emergency_photo]);
        if($hasil){
            return redirect('sipar/emergency/msg/3');
        }else{
            return redirect('sipar/emergency/msg/4');
        }
    }

    public function prosesDeleteEmergency($emergency_id){

        $del = DB::table('emergency')->where('emergency_id', '=', $emergency_id)->delete();

        return redirect('sipar/emergency/msg/5');
    }

}
