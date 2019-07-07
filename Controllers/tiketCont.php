<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tiketCont extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewTiket(){
        
        $tiket = DB::table('tiket')->get();

            return view('tiket')
            ->with('tiket',$tiket)
            ->with('act','viewTiket');
       
    }

     public function viewTiketWithMsg($msg){
        
        $tiket = DB::table('tiket')->get();

            return view('tiket')
            ->with('tiket',$tiket)
            ->with('msg',$msg)
            ->with('act','viewTiket');
    }


     public function viewTambahTiket(){
        return view('tiket')
        ->with('act','viewTambahTiket');

     }

     public function viewEditTiket($tiket_id){
        
        $tiket = DB::table('tiket')->where('tiket_id','=',$tiket_id)->first();

        return view('tiket')
        ->with('tiket',$tiket)
        ->with('act','viewEditTiket');
    }


    public function viewDeleteTiket($tiket_id){
        $tiket = DB::table('tiket')->get();

        $tiket_del = DB::table('tiket')->where('tiket_id','=',$tiket_id)->first();

        return view('tiket')
        ->with('tiket',$tiket)
        ->with('tiket_del',$tiket_del)
        ->with('act','viewDeleteTiket');
    }

	public function prosesTambahTiket(Request $req){
    	
        $tiket_type = $req->tiket_type;

        $hasil = DB::table('tiket')->insert(
            [ 'tiket_type' => $tiket_type]);

        if($hasil){
            return redirect('sipar/tiket/msg/1');
        }else{
            return redirect('sipar/tiket/msg/2');;
        }

    }

    public function prosesEditTiket(Request $req){
        $tiket_id = $req->tiket_id;
        $tiket_type = $req->tiket_type;

        $hasil = DB::table('tiket')
            ->where('tiket_id','=',$tiket_id)
            ->update(['tiket_type' => $tiket_type]);

        if($hasil){
            return redirect('sipar/tiket/msg/3');
        }else{
            return redirect('sipar/tiket/msg/4');
        }
    }


    public function prosesDeleteTiket($tiket_id){

        $del = DB::table('tiket')->where('tiket_id', '=', $tiket_id)->delete();

        return redirect('sipar/tiket/msg/5');
    }

}
