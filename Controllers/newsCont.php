<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class newsCont extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

      public function viewNews(){
        
        $news = DB::table('news')
        ->join('kategorinews','news.katnews_id', '=', 'kategorinews.katnews_id')
        ->select('news.*','kategorinews.katnews_name AS katnews_na')
        ->get();

            return view('news')
            ->with('news',$news)
            ->with('act','viewNews');
       
    }

     public function viewNewsWithMsg($msg){
        
       $news = DB::table('news')
        ->join('kategorinews','news.katnews_id', '=', 'kategorinews.katnews_id')
        ->select('news.*','kategorinews.katnews_name AS katnews_na')
        ->get();


            return view('news')
            ->with('news',$news)
            ->with('msg',$msg)
            ->with('act','viewNews');
    }


     public function viewTambahNews(){
        $kanws = DB::table('kategorinews')->get();
        return view('news')
        ->with('kanws',$kanws)
        ->with('act','viewTambahNews');

     }

     public function viewEditNews($news_id){
        
        $news = DB::table('news')->where('news_id','=',$news_id)->first();
        $kanws = DB::table('kategorinews')->get();

        return view('news')
        ->with('news',$news)
        ->with('kanws',$kanws)
        ->with('act','viewEditNews');
    }


    public function viewDeleteNews($news_id){
       $news = DB::table('news')
        ->join('kategorinews','news.katnews_id', '=', 'kategorinews.katnews_id')
        ->select('news.*','news.katnews_name AS katnews_na')
        ->get();

        $news_del = DB::table('news')->where('news_id','=',$news_id)->first();

        return view('news')
        ->with('news',$news)
        ->with('news_del',$news_del)
        ->with('act','viewDeleteNews');
    }

	public function prosesTambahNews(Request $req){
        $news_id = $req->news_id;
    	$news_author = $req->news_author;
        $news_title = $req->news_title;
        $posted_date = $req->posted_date;
        $katnews_id = $req->katnews_id;
        $news_ket = $req->news_ket;
        if($req->hasFile('news_photo')){
            $req->file('news_photo');
            $upload = Storage::putFile('public/news', $req->file('news_photo'));

            $storage = 'storage/';
            $slash= '/';
            $cacah = explode("/",$upload);
            $news_photo = $storage.$cacah[1].$slash.$cacah[2];
        }
        else{
            $news_photo = 'user/img/noimage.png';
        }
        $hasil = DB::table('news')->insert(
            ['news_author' => $news_author, 'news_title' => $news_title, 'posted_date' => $posted_date, 'katnews_id' => $katnews_id, 'news_ket' => $news_ket, 'news_photo' => $news_photo]);

        if($hasil){
            return redirect('sipar/news/msg/1');
        }else{
            return redirect('sipar/news/msg/2');;
        }
    }

    public function prosesEditNews(Request $req){
        $news_id = $req->news_id;
        $news_author = $req->news_author;
        $news_title = $req->news_title;
        $posted_date = $req->posted_date;
        $katnews_id = $req->katnews_id;
        $news_ket = $req->news_ket;
         if($req->hasFile('news_photo')){
            $req->file('news_photo');
            $upload = Storage::putFile('public/news_photo', $req->file('news_photo'));

            $storage = 'storage/';
            $slash= '/';
            $cacah = explode("/",$upload);
            $news_photo = $storage.$cacah[1].$slash.$cacah[2];
        }
        else{
            $news_photo = 'dist/img/noimage.png';
        }

        $hasil = DB::table('news')
            ->where('news_id','=',$news_id)
            ->update(['news_author' => $news_author, 'news_title' => $news_title, 'posted_date' => $posted_date, 'katnews_id' => $katnews_id, 'news_ket' => $news_ket, 'news_photo' => $news_photo]);

        if($hasil){
            return redirect('sipar/news/msg/3');
        }else{
            return redirect('sipar/news/msg/4');
        }
    }


    public function prosesDeleteNews($news_id){

        $del = DB::table('news')->where('news_id', '=', $news_id)->delete();

        return redirect('sipar/news/msg/5');
    }

}
