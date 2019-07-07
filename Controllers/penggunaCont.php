<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class penggunaCont extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function viewTambahpengguna(){
        return view('pengguna')
        ->with('act','viewTambahpengguna');
        

     }
    public function viewpengguna(){
        
        $pengguna = DB::table('users')
        ->get();

            return view('pengguna')
            ->with('pengguna',$pengguna)
            ->with('act','viewpengguna');
       
    }

     public function viewpenggunaWithMsg($msg){
        
        $pengguna = DB::table('users')
        ->get();

            return view('pengguna')
            ->with('pengguna',$pengguna)
            ->with('msg',$msg)
            ->with('act','viewpengguna');
    }

    public function viewDeletepengguna($id){
        $pengguna = DB::table('users')
        ->get();

        $pengguna_del = DB::table('users')->where('id','=',$id)->first();

        return view('pengguna')
        ->with('pengguna',$pengguna)
        ->with('pengguna_del',$pengguna_del)
        ->with('act','viewDeletepengguna');
    }

    
    public function prosesTambahpengguna(Request $req){
        
        $id = $req->id;
        $name = $req->name;
        $email = $req->email;
        $jabatan = $req->jabatan;
        
        $tambahpengguna = DB::table('users')->insert(
            [   'id' => $id, 
                'name' => $name, 
                'email' => $email, 
                'jabatan' => $jabatan,
                'password' =>bcrypt($req->password),
            ]
        );

        if($tambahpengguna){
            return redirect('sipar/pengguna/msg/1');
        }else{
            return redirect('sipar/pengguna/msg/2');;
        }

    }

    public function prosesDeletepengguna($id){

        $del = DB::table('users')->where('id', '=', $id)->delete();

        return redirect('sipar/pengguna/msg/5');
    }




}
