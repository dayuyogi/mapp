@extends('template.admin')

@section('title')
	Kecamatan - SI Wisata
@endsection


@section('judulmenu')
	Master Data Kecamatan
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

  @if($act=="viewTambahKecamatan")
  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Tambah Kecamatan</h3>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal" action="{{ asset('/sipar/kecamatan/prosestambahkecamatan') }}" method="post">
                  {!! csrf_field() !!}
  	              <div class="box-body">
  	                <div class="form-group">
  	                  <label for="kecamatan_name" class="col-sm-2 control-label">Nama Kecamatan</label>
  	                  <div class="col-sm-8">
  	                    <input type="text" class="form-control" id="kecamatan_name" name="kecamatan_name" placeholder="Kecamatan">
  	                  </div>
  	                </div>
  	              </div>
  	              <!-- /.box-body -->
  	              <div class="box-footer">
  	                <a href="{{ asset('sipar/kecamatan') }}" class="btn btn-default">Cancel</a>
  	                <button type="submit" class="btn btn-info pull-right">Save</button>
  	              </div>
  	              <!-- /.box-footer -->
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif


  @if($act=="viewEditKecamatan")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Kecamatan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="{{ asset('sipar/kecamatan/proseseditkecamatan') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="katnews_name" class="col-sm-2 control-label">Kecamatan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="kecamatan_name" name="kecamatan_name" value="{{ $kec->kecamatan_name }}">
                        <input type="hidden" class="form-control" id="kecamatan_id" name="kecamatan_id" value="{{ $kec->kecamatan_id }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/kecamatan') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewKecamatan" || $act=="viewDeleteKecamatan")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteKecamatan")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Kecamatan <strong> {{ $kec_del->kecamatan_name }} </strong> ?
            <a href="{{ asset('sipar/kecamatan') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/kecamatan/prosesdeletekecamatan',$kec_del->kecamatan_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Data Kecamatan</h3>
                  <a href="{{ asset('sipar/kecamatan/viewtambahkecamatan') }}" class="btn btn-info pull-right">Tambah</a>
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
                    <th>Nama Kecamatan</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($kec as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->kecamatan_name }}</td>
                      <td>
                        <a href="{{ url('sipar/kecamatan/vieweditkecamatan',$m->kecamatan_id) }}" class="btn-sm btn-warning ">Edit</a> &nbsp;
                        <a href="{{ url('sipar/kecamatan/viewdeletekecamatan',$m->kecamatan_id) }}" class="btn-sm btn-danger ">Hapus</a>   
                      </td>
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
                    <th>Nama Kecamatan</th>
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