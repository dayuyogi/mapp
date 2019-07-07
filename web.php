<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/peta','petaCont@viewWisata');

Route::prefix('sipar')->group(function () {
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
	Route::prefix('kecamatan')->group(function () {
		Route::get('/','kecamatanCont@viewKecamatan');
		Route::get('msg/{msg}','kecamatanCont@viewKecamatanWithMsg');
		Route::get('viewtambahkecamatan','kecamatanCont@viewTambahKecamatan');
		Route::get('vieweditkecamatan/{kecamatan_id}','kecamatanCont@viewEditKecamatan');
		Route::get('viewdeletekecamatan/{kecamatan_id}','kecamatanCont@viewDeleteKecamatan');
		Route::post('prosestambahkecamatan','kecamatanCont@prosesTambahKecamatan');
		Route::post('proseseditkecamatan','kecamatanCont@prosesEditKecamatan');
		Route::get('prosesdeletekecamatan/{kecamatan_id}','kecamatanCont@prosesDeleteKecamatan');
		});

	Route::prefix('kateven')->group(function () {
		Route::get('/','katevenCont@viewKatevent');
		Route::get('msg/{msg}','katevenCont@viewKateventWithMsg');
		Route::get('viewtambahkatevent','katevenCont@viewTambahKatevent');
		Route::get('vieweditkatevent/{kateven_id}','katevenCont@viewEditKatevent');
		Route::get('viewdeletekatevent/{kateven_id}','katevenCont@viewDeleteKatevent');
		Route::post('prosestambahkatevent','katevenCont@prosesTambahKatevent');
		Route::post('proseseditkatevent','katevenCont@prosesEditKatevent');
		Route::get('prosesdeletekatevent/{kateven_id}','katevenCont@prosesDeleteKatevent');
		});

	Route::prefix('kanws')->group(function () {
		Route::get('/','katnewsCont@viewKatnews');
		Route::get('msg/{msg}','katnewsCont@viewKatnewsWithMsg');
		Route::get('viewtambahkatnews','katnewsCont@viewTambahKatnews');
		Route::get('vieweditkatnews/{katnews_id}','katnewsCont@viewEditKatnews');
		Route::get('viewdeletekatnews/{katnews_id}','katnewsCont@viewDeleteKatnews');
		Route::post('prosestambahkatnews','katnewsCont@prosesTambahKatnews');
		Route::post('proseseditkatnews','katnewsCont@prosesEditKatnews');
		Route::get('prosesdeletekatnews/{katnews_id}','katnewsCont@prosesDeleteKatnews');
		});

	Route::prefix('katwis')->group(function () {
		Route::get('/','katwisCont@viewKatwis');
		Route::get('msg/{msg}','katwisCont@viewKatwisWithMsg');
		Route::get('viewtambahkatwis','katwisCont@viewTambahKatwis');
		Route::get('vieweditkatwis/{katwis_id}','katwisCont@viewEditKatwis');
		Route::get('viewdeletekatwis/{katwis_id}','katwisCont@viewDeleteKatwis');
		Route::post('prosestambahkatwis','katwisCont@prosesTambahKatwis');
		Route::post('proseseditkatwis','katwisCont@prosesEditKatwis');
		Route::get('prosesdeletekatwis/{katwis_id}','katwisCont@prosesDeleteKatwis');
		});

	Route::prefix('tiket')->group(function () {
		Route::get('/','tiketCont@viewTiket');
		Route::get('msg/{msg}','tiketCont@viewTiketWithMsg');
		Route::get('viewtambahtiket','tiketCont@viewTambahTiket');
		Route::get('viewedittiket/{tiket_id}','tiketCont@viewEditTiket');
		Route::get('viewdeletetiket/{tiket_id}','tiketCont@viewDeleteTiket');
		Route::post('prosestambahtiket','tiketCont@prosesTambahTiket');
		Route::post('prosesedittiket','tiketCont@prosesEditTiket');
		Route::get('prosesdeletetiket/{tiket_id}','tiketCont@prosesDeleteTiket');
		});

	Route::prefix('news')->group(function () {
		Route::get('/','newsCont@viewNews');
		Route::get('msg/{msg}','newsCont@viewNewsWithMsg');
		Route::get('viewtambahnews','newsCont@viewTambahNews');
		Route::post('prosestambahnews','newsCont@prosesTambahNews');
		Route::get('vieweditnews/{news_id}','newsCont@viewEditNews');
		Route::get('viewdeletenews/{news_id}','newsCont@viewDeleteNews');
		Route::post('proseseditnews','newsCont@prosesEditNews');
		Route::get('prosesdeletenews/{news_id}','newsCont@prosesDeleteNews');
		});

	Route::prefix('emergency')->group(function () {
		Route::get('/','emergencyCont@viewEmergency');
		Route::get('msg/{msg}','emergencyCont@viewEmergencyWithMsg');
		Route::get('viewtambahemergency','emergencyCont@viewTambahEmergency');
		Route::post('prosestambahemergency','emergencyCont@prosesTambahEmergency');
		Route::get('vieweditemergency/{emergency_id}','emergencyCont@viewEditEmergency');
		Route::get('viewdeleteemergency/{emergency_id}','emergencyCont@viewDeleteEmergency');
		Route::post('proseseditemergency','emergencyCont@prosesEditEmergency');
		Route::get('prosesdeleteemergency/{emergency_id}','emergencyCont@prosesDeleteEmergency');
		});

	Route::prefix('event')->group(function () {
		Route::get('/','eventCont@viewevent');
		Route::get('msg/{msg}','eventCont@vieweventWithMsg');
		Route::get('viewtambahevent','eventCont@viewTambahevent');
		Route::post('prosestambahevent','eventCont@prosesTambahevent');
		Route::get('vieweditevent/{event_id}','eventCont@viewEditevent');
		Route::get('viewdeleteevent/{event_id}','eventCont@viewDeleteevent');
		Route::post('proseseditevent','eventCont@prosesEditevent');
		Route::get('prosesdeleteevent/{event_id}','eventCont@prosesDeleteevent');
		});

	Route::prefix('wisata')->group(function () {
		Route::get('/','wisataCont@viewWisata');
		Route::get('msg/{msg}','wisataCont@viewWisataWithMsg');
		Route::get('viewtambahwisata','wisataCont@viewTambahWisata');
		Route::post('prosestambahwisata','wisataCont@prosesTambahWisata');
		Route::get('vieweditwisata/{wisata_id}','wisataCont@viewEditWisata');
		Route::get('viewdeletewisata/{wisata_id}','wisataCont@viewDeleteWisata');
		Route::post('proseseditwisata','wisataCont@prosesEditWisata');
		Route::get('prosesdeletewisata/{wisata_id}','wisataCont@prosesDeleteWisata');
		Route::get('/cetak_pdf', 'wisataCont@exportPDF');
		Route::get('/laporan', 'wisataCont@viewLaporan');


		});
	Route::prefix('pengguna')->group(function () {
    	Route::get('/','penggunaCont@viewpengguna');
		Route::get('msg/{msg}','penggunaCont@viewpenggunaWithMsg');
		Route::get('viewDeletepengguna/{id}','penggunaCont@viewDeletepengguna');
		Route::get('prosesDeletepengguna/{id}','penggunaCont@prosesDeletepengguna');
		Route::get('viewTambahpengguna','penggunaCont@viewTambahpengguna');
		Route::post('prosesTambahpengguna','penggunaCont@prosesTambahpengguna');
	});

	Route::get('/peta','petaCont@viewWisata');
});


