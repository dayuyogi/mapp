@extends('template.admin')

@section('title')
	News - SI Wisata
@endsection


@section('judulmenu')
	Master Data News
@endsection


@php

  function viewMessage($msg){
    $pesan = "";

    if($msg==1)
    {
      $pesan = "Proses tambah data berhasil dilakukan!";
    }elseif($msg==2){
      $pesan = "Error! Proses tambah data gagal dilakukan!";
    }elseif($msg==3){
      $pesan = "Proses edit data berhasil dilakukan!";
    }elseif($msg==4){
      $pesan = "Error! Proses edit data gagal dilakukan!";
    }elseif($msg==5){
      $pesan = "Proses hapus data berhasil dilakukan!";
    }elseif($msg==6){
      $pesan = "Error! Proses hapus data gagal dilakukan!";
    }

    $view = "
      <div class=\"alert alert-info alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4><i class=\"icon fa fa-info\"></i> Informasi!</h4>
                <strong>".$pesan."</strong>
              </div>

    ";

    return $view;
  }
  
@endphp






@section('maincontent')

  @if($act=="viewTambahNews")
  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Tambah News</h3>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/news/prosestambahnews') }}" method="post">
                  {!! csrf_field() !!}
  	              <div class="box-body">
  	                <div class="form-group">
  	                  <label for="news_author" class="col-sm-2 control-label">Penulis</label>
  	                  <div class="col-sm-8">
  	                    <input type="text" class="form-control" id="news_author" name="news_author" placeholder="Nama Penulis">
  	                  </div>
  	                </div>
                    <div class="form-group">
                      <label for="news_title" class="col-sm-2 control-label">Judul Berita</label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control" id="news_title" name="news_title" placeholder="Judul Berita">
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="posted_date" class="col-sm-2 control-label">Tanggal Post</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" id="posted_date" name="posted_date" placeholder="Tanggal Post">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kategori News</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="katnews_id" id="katnews_id" >
                                  @foreach($kanws as $kategorinews)
                                      <option value="{{$kategorinews->katnews_id}}">{{$kategorinews->katnews_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="news_ket" class="col-sm-2 control-label">Keterangan</label>
                      <div class="col-sm-8">
                        <input type="textarea" class="form-control" id="news_ket" name="news_ket" placeholder="Keterangan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">Unggah Bukti</label>
                      <div class="col-sm-10">
                        <input id="news_photo" name="news_photo" type="file">
                      </div>
                    </div>
  	              </div>
  	              <!-- /.box-body -->
  	              <div class="box-footer">
  	                <a href="{{ asset('sipar/news') }}" class="btn btn-default">Cancel</a>
  	                <button type="submit" class="btn btn-info pull-right">Save</button>
  	              </div>
  	              <!-- /.box-footer -->
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif


  @if($act=="viewEditNews")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit News</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/news/proseseditnews') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="news_title" class="col-sm-2 control-label">Penulis</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="news_author" name="news_author" value="{{ $news->news_author }}">
                        <input type="hidden" class="form-control" id="news_id" name="news_id" value="{{ $news->news_id }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Judul Berita </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="news_title" name="news_title" value="{{ $news->news_title }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Tanggal Terbit </label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" id="posted_date" name="posted_date" value="{{ $news->posted_date }}">
                      </div>
                    </div>
                     <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kategori News</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="katnews_id" id="katnews_id" >
                                  @foreach($kanws as $kategorinews)
                                      <option value="{{$kategorinews->katnews_id}}">{{$kategorinews->katnews_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Keterangan </label>
                      <div class="col-sm-8">
                        <input type="textarea" class="form-control" id="news_ket" name="news_ket" value="{{ $news->news_ket }}">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">Unggah Bukti</label>
                      <div class="col-sm-10">
                        <input id="news_photo" name="news_photo" type="file" value="{{ $news->news_photo }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/news') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewNews" || $act=="viewDeleteNews")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteNews")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Mahasiswa <strong> {{ $news_del->news_author }} </strong> ?
            <a href="{{ asset('sipar/news') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/news/prosesdeletenews',$news_del->news_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Data News</h3>
                  <a href="{{ asset('sipar/news/viewtambahnews') }}" class="btn btn-info pull-right">Tambah</a>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal">
  	              <div class="box-body">
  	                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama penulis</th>
                    <th>Judul Berita</th>
                    <th>Tanggal Post</th>
                    <th> Kategori News </th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($news as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->news_author }}</td>
                      <td>{{ $m->news_title }}</td>
                      <td>{{ $m->posted_date }}</td>
                      <td>{{ $m->katnews_na }}</td>
                      <td>{{ $m->news_ket }}</td>
                       <td><img id="myImg" src="{{ asset ($m->news_photo) }}" alt="gambar.jpg" style="width:50%;max-width:100px"></td>
                        <td>
                        <a href="{{ url('sipar/news/vieweditnews',$m->news_id) }}" class="btn-sm btn-warning ">Edit</a> &nbsp;
                        <a href="{{ url('sipar/news/viewdeletenews',$m->news_id) }}" class="btn-sm btn-danger ">Hapus</a>   
                      </td>
                    </tr>
        
                    @php
                      $i++;
                    @endphp
                  @endforeach
                  
  
  	             </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama penulis</th>
                    <th>Judul Berita</th>
                    <th>Tanggal Post</th>
                    <th>Kategori news</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Opsi</th>
                  </tr>
                  </tfoot>
                </table>
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif

@endsection