<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class katnewsCont extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewKatnews(){
        
        $kanws = DB::table('kategorinews')->get();

            return view('kategorinews')
            ->with('kanws',$kanws)
            ->with('act','viewKatnews');
       
    }

     public function viewKatnewsWithMsg($msg){
        
        $kanws = DB::table('kategorinews')->get();

            return view('kategorinews')
            ->with('kanws',$kanws)
            ->with('msg',$msg)
            ->with('act','viewKatnews');
    }


     public function viewTambahKatnews(){
        return view('kategorinews')
        ->with('act','viewTambahKatnews');

     }

     public function viewEditKatnews($katnews_id){
        
        $kanws = DB::table('kategorinews')->where('katnews_id','=',$katnews_id)->first();

        return view('kategorinews')
        ->with('kanws',$kanws)
        ->with('act','viewEditKatnews');
    }


    public function viewDeleteKatnews($katnews_id){
        $kanws = DB::table('kategorinews')->get();

        $kanws_del = DB::table('kategorinews')->where('katnews_id','=',$katnews_id)->first();

        return view('kategorinews')
        ->with('kanws',$kanws)
        ->with('kanws_del',$kanws_del)
        ->with('act','viewDeleteKatnews');
    }

	public function prosesTambahKatnews(Request $req){
    	$katnews_name = $req->katnews_name;
    	
        $hasil = DB::table('kategorinews')->insert(
            ['katnews_name' => $katnews_name]);

        if($hasil){
            return redirect('sipar/kanws/msg/1');
        }else{
            return redirect('sipar/kanws/msg/2');;
        }

    }

    public function prosesEditKatnews(Request $req){
        $katnews_id = $req->katnews_id;
        $katnews_name= $req->katnews_name;
        
        $hasil = DB::table('kategorinews')
            ->where('katnews_id','=',$katnews_id)
            ->update(['katnews_name' => $katnews_name]);

        if($hasil){
            return redirect('sipar/kanws/msg/3');
        }else{
            return redirect('sipar/kanws/msg/4');
        }
    }


    public function prosesDeleteKatnews($katnews_id){

        $del = DB::table('kategorinews')->where('katnews_id', '=', $katnews_id)->delete();

        return redirect('sipar/kanws/msg/5');
    }

}
