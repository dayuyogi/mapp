<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
use PDF;

class wisataCont extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewWisata()
      {
        
        $wisata = DB::table('wisata')
        ->join('tiket','wisata.tiket_id', '=', 'tiket.tiket_id')
        ->join('kecamatan','wisata.kecamatan_id', '=', 'kecamatan.kecamatan_id')
        ->join('kategori_wisata', 'wisata.katwis_id','=','kategori_wisata.katwis_id')
        ->select('wisata.*','tiket.tiket_type AS type', 'kecamatan.kecamatan_name AS kcmtn', 'kategori_wisata.katwis_name AS nama_katwis')
        ->get();

            return view('wisata')
            ->with('wisata',$wisata)
            ->with('act','viewWisata');
       
    }

    public function exportPDF()
    {
        $wisata = DB::table('wisata')
        ->join('tiket','wisata.tiket_id', '=', 'tiket.tiket_id')
        ->join('kecamatan','wisata.kecamatan_id', '=', 'kecamatan.kecamatan_id')
        ->join('kategori_wisata', 'wisata.katwis_id','=','kategori_wisata.katwis_id')
        ->select('wisata.*','tiket.tiket_type AS type', 'kecamatan.kecamatan_name AS kcmtn', 'kategori_wisata.katwis_name AS nama_katwis')
        ->get();
        $pdf = PDF::loadview('wisatapdf',['wisata'=>$wisata]);
        return $pdf->download('laporan_wisata_'.date('Y-m-d').'.pdf');
    }

    public function viewLaporan()
      {
        
        $wisata = DB::table('wisata')
        ->join('tiket','wisata.tiket_id', '=', 'tiket.tiket_id')
        ->join('kecamatan','wisata.kecamatan_id', '=', 'kecamatan.kecamatan_id')
        ->join('kategori_wisata', 'wisata.katwis_id','=','kategori_wisata.katwis_id')
        ->select('wisata.*','tiket.tiket_type AS type', 'kecamatan.kecamatan_name AS kcmtn', 'kategori_wisata.katwis_name AS nama_katwis')
        ->get();

            return view('laporan')
            ->with('wisata',$wisata)
            ->with('act','viewLaporan');
       
    }

     public function viewWisataWithMsg($msg){
        
        $wisata = DB::table('wisata')
        ->join('tiket','wisata.tiket_id', '=', 'tiket.tiket_id')
        ->join('kecamatan','wisata.kecamatan_id', '=', 'kecamatan.kecamatan_id')
        ->join('kategori_wisata', 'wisata.katwis_id','=','kategori_wisata.katwis_id')
        ->select('wisata.*','tiket.tiket_type AS type', 'kecamatan.kecamatan_name AS kcmtn', 'kategori_wisata.katwis_name AS nama_katwis')
        ->get();

            return view('wisata')
            ->with('wisata',$wisata)
            ->with('msg',$msg)
            ->with('act','viewWisata');
    }


     public function viewTambahWisata(){
        $kec = DB::table('kecamatan')->get();
        $tiket = DB::table('tiket')->get();
        $katwis = DB::table('kategori_wisata')->get();
        return view('wisata')
        ->with('kec',$kec)
        ->with('tiket',$tiket)
        ->with('katwis',$katwis)
        ->with('act','viewTambahWisata');

     }

     public function viewEditWisata($wisata_id){
        
        $wisata = DB::table('wisata')->where('wisata_id','=',$wisata_id)->first();
        $kec = DB::table('kecamatan')->get();
        $tiket = DB::table('tiket')->get();
        $katwis = DB::table('kategori_wisata')->get();
       
        return view('wisata')
        ->with('wisata',$wisata)
        ->with('kec',$kec)
        ->with('tiket',$tiket)
        ->with('katwis',$katwis)
        ->with('act','viewEditWisata');
    }

    public function viewDeleteWisata($wisata_id){
       $wisata = DB::table('wisata')
        ->join('tiket','wisata.tiket_id', '=', 'tiket.tiket_id')
        ->join('kecamatan','wisata.kecamatan_id', '=', 'kecamatan.kecamatan_id')
        ->join('kategori_wisata', 'wisata.katwis_id','=','kategori_wisata.katwis_id')
        ->select('wisata.*','tiket.tiket_type AS type', 'kecamatan.kecamatan_name AS kcmtn', 'kategori_wisata.katwis_name AS nama_katwis')
        ->get();


        $wisata_del = DB::table('wisata')->where('wisata_id','=',$wisata_id)->first();

        return view('wisata')
        ->with('wisata',$wisata)
        ->with('wisata_del',$wisata_del)
        ->with('act','viewDeleteWisata');
    }

	public function prosesTambahWisata(Request $req){
    	$wisata_name = $req->wisata_name;
        $tiket_id = $req->tiket_id;
        $kecamatan_id = $req->kecamatan_id;
        $katwis_id = $req->katwis_id;
        $harga = $req->harga;
        $wisata_alamat = $req->wisata_alamat;
        $open_time = $req->open_time;
        $close_time = $req->close_time;
    	 if($req->hasFile('gambar')){
            $req->file('gambar');
            $upload = Storage::putFile('public/wisata', $req->file('gambar'));

            $storage = 'storage/';
            $slash= '/';
            $cacah = explode("/",$upload);
           $gambar = $storage.$cacah[1].$slash.$cacah[2];
        }
        else{
            $gambar = 'user/img/noimage.png';
        }

        $hasil = DB::table('wisata')->insert(
            ['wisata_name' => $wisata_name, 'tiket_id'=>$tiket_id,'kecamatan_id'=>$kecamatan_id,
            'katwis_id'=>$katwis_id,'harga'=>$harga,'wisata_alamat'=> $wisata_alamat, 'open_time'=>$open_time, 'close_time'=>$close_time,'gambar'=>$gambar]);

        if($hasil){
            return redirect('sipar/wisata/msg/1');
        }else{
            return redirect('sipar/wisata/msg/2');;
        }

    }

    public function prosesEditWisata(Request $req){
        $wisata_id = $req->wisata_id;
        $wisata_name = $req->wisata_name;
        $tiket_id = $req->tiket_id;
        $kecamatan_id = $req->kecamatan_id;
        $katwis_id = $req->katwis_id;
        $harga = $req->harga;
        $wisata_alamat = $req->wisata_alamat;
        $open_time = $req->open_time;
        $close_time = $req->close_time;
         if($req->hasFile('gambar')){
            $req->file('gambar');
            $upload = Storage::putFile('public/wisata', $req->file('gambar'));

            $storage = 'storage/';
            $slash= '/';
            $cacah = explode("/",$upload);
           $gambar = $storage.$cacah[1].$slash.$cacah[2];
        }
        else{
            $gambar = 'user/img/noimage.png';
        }
        
        $hasil = DB::table('wisata')
            ->where('wisata_id','=',$wisata_id)
            ->update(['wisata_name' => $wisata_name, 'tiket_id'=>$tiket_id,'kecamatan_id'=>$kecamatan_id,'katwis_id'=>$katwis_id,'harga'=>$harga,'wisata_alamat'=> $wisata_alamat, 'open_time'=>$open_time, 'close_time'=>$close_time,'gambar'=>$gambar]);

        if($hasil){
            return redirect('sipar/wisata/msg/3');
        }else{
            return redirect('sipar/wisata/msg/4');
        }
    }


    public function prosesDeleteWisata($wisata_id){

        $del = DB::table('wisata')->where('wisata_id', '=', $wisata_id)->delete();

        return redirect('sipar/wisata/msg/5');
    }

}
