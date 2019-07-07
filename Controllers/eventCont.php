<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class eventCont extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewevent(){
        
        $event = DB::table('event')
        ->join('kategori_event','event.kateven_id', '=', 'kategori_event.kateven_id')
        ->join('wisata','event.wisata_id', '=', 'wisata.wisata_id')
        ->select('event.*','kategori_event.kateven_name AS kateven_na', 'wisata.wisata_name AS obj')
        ->get();

            return view('event')
            ->with('event',$event)
            ->with('act','viewevent');
       
    }

     public function vieweventWithMsg($msg){
        
        $event = DB::table('event')
        ->join('kategori_event','event.kateven_id', '=', 'kategori_event.kateven_id')
        ->join('wisata','event.wisata_id', '=', 'wisata.wisata_id')
        ->select('event.*','kategori_event.kateven_name AS kateven_na', 'wisata.wisata_name AS obj')
        ->get();

            return view('event')
            ->with('event',$event)
            ->with('msg',$msg)
            ->with('act','viewevent');
    }


     public function viewTambahevent(){
        $kateven = DB::table('kategori_event')->get();
        $wisata = DB::table('wisata')->get();
        return view('event')
        ->with('kateven',$kateven)
        ->with('wisata',$wisata)
        ->with('act','viewTambahevent');

     }

     public function viewEditevent($event_id){
        
        $event = DB::table('event')->where('event_id','=',$event_id)->first();
        $kateven = DB::table('kategori_event')->get();
        $wisata = DB::table('wisata')->get();
        return view('event')
        ->with('event',$event)
        ->with('kateven',$kateven)
        ->with('wisata',$wisata)
        ->with('act','viewEditevent');
    }


    public function viewDeleteevent($event_id){
        $event = DB::table('event')
        ->join('kategori_event','event.kateven_id', '=', 'kategori_event.kateven_id')
        ->join('wisata','event.wisata_id', '=', 'wisata.wisata_id')
        ->select('event.*','kategori_event.kateven_name AS kateven_na', 'wisata.wisata_name AS obj')
        ->get();

        $event_del = DB::table('event')->where('event_id','=',$event_id)->first();

        return view('event')
        ->with('event',$event)
        ->with('event_del',$event_del)
        ->with('act','viewDeleteevent');
    }

	public function prosesTambahevent(Request $req){
    	$event_name = $req->event_name;
        $penyelenggara = $req->penyelenggara;
        $kateven_id = $req->kateven_id;
        $wisata_id = $req->wisata_id;
        $contact_person = $req->contact_person;
        $tgl_mulai = $req->tgl_mulai;
        $tgl_selesai = $req->tgl_selesai;
        $open_time = $req->open_time;
        $close_time = $req->close_time;
        $ket = $req->ket;
         if($req->hasFile('gambar')){
            $req->file('gambar');
            $upload = Storage::putFile('public/event', $req->file('gambar'));

            $storage = 'storage/';
            $slash= '/';
            $cacah = explode("/",$upload);
            $gambar = $storage.$cacah[1].$slash.$cacah[2];
        }
        else{
            $gambar = 'user/img/noimage.png';
        }

        $hasil = DB::table('event')->insert(
            ['event_name' => $event_name, 'penyelenggara'=> $penyelenggara,'kateven_id'=>$kateven_id, 'wisata_id'=>$wisata_id,'contact_person'=>$contact_person,'tgl_mulai'=> $tgl_mulai,'tgl_selesai'=>$tgl_selesai,'open_time'=>$open_time, 'close_time'=>$close_time,'ket'=>$ket,'gambar'=>$gambar]);

        if($hasil){
            return redirect('sipar/event/msg/1');
        }else{
            return redirect('sipar/event/msg/2');;
        }

    }

    public function prosesEditevent(Request $req){
        $event_id = $req->event_id;
        $event_name = $req->event_name;
        $penyelenggara = $req->penyelenggara;
        $kateven_id = $req->kateven_id;
        $wisata_id = $req->wisata_id;
        $contact_person = $req->contact_person;
        $tgl_mulai = $req->tgl_mulai;
        $tgl_selesai = $req->tgl_selesai;
        $open_time = $req->open_time;
        $close_time = $req->close_time;
        $ket = $req->ket;
        if($req->hasFile('gambar')){
            $req->file('gambar');
            $upload = Storage::putFile('public/event', $req->file('gambar'));

            $storage = 'storage/';
            $slash= '/';
            $cacah = explode("/",$upload);
           $gambar = $storage.$cacah[1].$slash.$cacah[2];
        }
        else{
            $gambar = 'user/img/noimage.png';
        }
        
        $hasil = DB::table('event')
            ->where('event_id','=',$event_id)
            ->update( ['event_name' => $event_name, 'penyelenggara'=> $penyelenggara, 'kateven_id'=>$kateven_id, 'wisata_id'=>$wisata_id,'contact_person'=>$contact_person,'tgl_mulai'=> $tgl_mulai,'tgl_selesai'=>$tgl_selesai,'open_time'=>$open_time, 'close_time'=>$close_time,'ket'=>$ket,'gambar'=>$gambar]);

        if($hasil){
            return redirect('sipar/event/msg/3');
        }else{
            return redirect('sipar/event/msg/4');
        }
    }


    public function prosesDeleteevent($event_id){

        $del = DB::table('event')->where('event_id', '=', $event_id)->delete();

        return redirect('sipar/event/msg/5');
    }

}
