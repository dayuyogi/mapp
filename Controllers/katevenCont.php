<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class katevenCont extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewKatevent(){
        
        $kateven = DB::table('kategori_event')->get();

            return view('kategorievent')
            ->with('kateven',$kateven)
            ->with('act','viewKatevent');
       
    }

     public function viewKateventWithMsg($msg){
        
        $kateven = DB::table('kategori_event')->get();

            return view('kategorievent')
            ->with('kateven',$kateven)
            ->with('msg',$msg)
            ->with('act','viewKatevent');
    }


     public function viewTambahKatevent(){
        return view('kategorievent')
        ->with('act','viewTambahKatevent');

     }

     public function viewEditKatevent($kateven_id){
        
        $kateven = DB::table('kategori_event')->where('kateven_id','=',$kateven_id)->first();

        return view('kategorievent')
        ->with('kateven',$kateven)
        ->with('act','viewEditKatevent');
    }


    public function viewDeleteKatevent($kateven_id){
        $kateven = DB::table('kategori_event')->get();

        $kateven_del = DB::table('kategori_event')->where('kateven_id','=',$kateven_id)->first();

        return view('kategorievent')
        ->with('kateven',$kateven)
        ->with('kateven_del',$kateven_del)
        ->with('act','viewDeleteKatevent');
    }

	public function prosesTambahKatevent(Request $req){
        $kateven_id = $req->kateven_id;
    	$kateven_name = $req->kateven_name;
    	
        $hasil = DB::table('kategori_event')->insert(
            ['kateven_id' => $kateven_id, 'kateven_name' => $kateven_name]);

        if($hasil){
            return redirect('sipar/kateven/msg/1');
        }else{
            return redirect('sipar/kateven/msg/2');;
        }

    }

    public function prosesEditKatevent(Request $req){
        $kateven_id = $req->kateven_id;
        $kateven_name= $req->kateven_name;
        
        $hasil = DB::table('kategori_event')
            ->where('kateven_id','=',$kateven_id)
            ->update(['kateven_name' => $kateven_name]);

        if($hasil){
            return redirect('sipar/kateven/msg/3');
        }else{
            return redirect('sipar/kateven/msg/4');
        }
    }


    public function prosesDeleteKatevent($kateven_id){

        $del = DB::table('kategori_event')->where('kateven_id', '=', $kateven_id)->delete();

        return redirect('sipar/kateven/msg/5');
    }

}
