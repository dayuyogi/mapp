<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class katwisCont extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewKatwis(){
        
        $katwis = DB::table('kategori_wisata')->get();

            return view('kategoriwisata')
            ->with('katwis',$katwis)
            ->with('act','viewKatwis');
       
    }

     public function viewKatwisWithMsg($msg){
        
        $katwis = DB::table('kategori_wisata')->get();

            return view('kategoriwisata')
            ->with('katwis',$katwis)
            ->with('msg',$msg)
            ->with('act','viewKatwis');
    }


     public function viewTambahKatwis(){
        return view('kategoriwisata')
        ->with('act','viewTambahKatwis');

     }

     public function viewEditKatwis($katwis_id){
        
        $katwis = DB::table('kategori_wisata')->where('katwis_id','=',$katwis_id)->first();

        return view('kategoriwisata')
        ->with('katwis',$katwis)
        ->with('act','viewEditKatwis');
    }


    public function viewDeleteKatwis($katwis_id){
        $katwis = DB::table('kategori_wisata')->get();

        $katwis_del = DB::table('kategori_wisata')->where('katwis_id','=',$katwis_id)->first();

        return view('kategoriwisata')
        ->with('katwis',$katwis)
        ->with('katwis_del',$katwis_del)
        ->with('act','viewDeleteKatwis');
    }

	public function prosesTambahKatwis(Request $req){
    	$katwis_name = $req->katwis_name;
    	
        $hasil = DB::table('kategori_wisata')->insert(
            ['katwis_name' => $katwis_name]);

        if($hasil){
            return redirect('sipar/katwis/msg/1');
        }else{
            return redirect('sipar/katwis/msg/2');;
        }

    }

    public function prosesEditKatwis(Request $req){
        $katwis_id = $req->katwis_id;
        $katwis_name= $req->katwis_name;
        
        $hasil = DB::table('kategori_wisata')
            ->where('katwis_id','=',$katwis_id)
            ->update(['katwis_name' => $katwis_name]);

        if($hasil){
            return redirect('sipar/katwis/msg/3');
        }else{
            return redirect('sipar/katwis/msg/4');
        }
    }


    public function prosesDeleteKatwis($katwis_id){

        $del = DB::table('kategori_wisata')->where('katwis_id', '=', $katwis_id)->delete();

        return redirect('sipar/katwis/msg/5');
    }

}
