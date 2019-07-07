@extends('template.admin')

@section('title')
	Wisata - SI Wisata
@endsection


@section('judulmenu')
	Master Data Wisata
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

  @if($act=="viewLaporan")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title pull-center">Data Wisata</h3>
                  <a href="{{ asset('sipar/wisata/exportPDF') }}" class="btn btn-info pull-right">CETAK PDF</a>
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
                    <th>Nama Wisata</th>
                    <th>kecamatan</th>
                    <th> Kategori Tiket</th>
                    <th> Kategori Wisata</th>
                    <th> Harga</th>
                    <th>Alamat Wisata</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($wisata as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->wisata_name }}</td>
                      <td>{{$m->kcmtn}}</td>
                      <td>{{$m->type}}</td>
                      <td>{{$m->nama_katwis}}</td>
                      <td>{{$m->harga}}</td>
                      <td>{{ $m->wisata_alamat }}</td>
                      <td>{{ $m->open_time }}</td>
                      <td>{{ $m->close_time }}</td>
                    </tr>

                    @php
                      $i++;
                    @endphp
                  @endforeach
                  
  	              <!-- /.box-body -->
  	             </tbody>
                  <tfoot>
                  <tr>
                     <th>No</th>
                    <th>Nama Wisata</th>
                    <th>kecamatan</th>
                    <th> Kategori Tiket</th>
                    <th> Kategori Wisata</th>
                    <th> Harga</th>
                    <th>Alamat Wisata</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
      
                  </tr>
                  </tfoot>
                </table>
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif

@endsection