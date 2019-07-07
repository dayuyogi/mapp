<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kecamatanCont extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewKecamatan(){
        
        $kec = DB::table('kecamatan')->get();

            return view('kecamatan')
            ->with('kec',$kec)
            ->with('act','viewKecamatan');
       
    }

     public function viewKecamatanWithMsg($msg){
        
        $kec = DB::table('kecamatan')->get();

            return view('kecamatan')
            ->with('kec',$kec)
            ->with('msg',$msg)
            ->with('act','viewKecamatan');
    }


     public function viewTambahKecamatan(){
        return view('kecamatan')
        ->with('act','viewTambahKecamatan');

     }

     public function viewEditKecamatan($kecamatan_id){
        
        $kec = DB::table('kecamatan')->where('kecamatan_id','=',$kecamatan_id)->first();

        return view('kecamatan')
        ->with('kec',$kec)
        ->with('act','viewEditKecamatan');
    }


    public function viewDeleteKecamatan($kecamatan_id){
        $kec = DB::table('kecamatan')->get();

        $kec_del = DB::table('kecamatan')->where('kecamatan_id','=',$kecamatan_id)->first();

        return view('kecamatan')
        ->with('kec',$kec)
        ->with('kec_del',$kec_del)
        ->with('act','viewDeleteKecamatan');
    }

	public function prosesTambahKecamatan(Request $req){
    	$kecamatan_name = $req->kecamatan_name;
    	
        $hasil = DB::table('kecamatan')->insert(
            ['kecamatan_name' => $kecamatan_name]);

        if($hasil){
            return redirect('sipar/kecamatan/msg/1');
        }else{
            return redirect('sipar/kecamatan/msg/2');;
        }

    }

    public function prosesEditKecamatan(Request $req){
        $kecamatan_id = $req->kecamatan_id;
        $kecamatan_name= $req->kecamatan_name;
        
        $hasil = DB::table('kecamatan')
            ->where('kecamatan_id','=',$kecamatan_id)
            ->update(['kecamatan_name' => $kecamatan_name]);

        if($hasil){
            return redirect('sipar/kecamatan/msg/3');
        }else{
            return redirect('sipar/kecamatan/msg/4');
        }
    }


    public function prosesDeleteKecamatan($kecamatan_id){

        $del = DB::table('kecamatan')->where('kecamatan_id', '=', $kecamatan_id)->delete();

        return redirect('sipar/kecamatan/msg/5');
    }

}
