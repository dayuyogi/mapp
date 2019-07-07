<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class petaCont extends Controller
{
    //   public function __construct()
    // {
    //     $this->middleware('auth');
    // }
      public function viewWisata()
      {
        
        $wisata = DB::table('wisata')
        ->join('tiket','wisata.tiket_id', '=', 'tiket.tiket_id')
        ->join('kecamatan','wisata.kecamatan_id', '=', 'kecamatan.kecamatan_id')
        ->join('kategori_wisata', 'wisata.katwis_id','=','kategori_wisata.katwis_id')
        ->select('wisata.*','tiket.tiket_type AS type', 'kecamatan.kecamatan_name AS kcmtn', 'kategori_wisata.katwis_name AS nama_katwis')
        ->get();

            return view('peta')
            ->with('wisata',$wisata);
       
    }

    
    

     

}
