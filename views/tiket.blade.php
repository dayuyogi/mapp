@extends('template.admin')

@section('title')
	Tiket - SI Wisata
@endsection


@section('judulmenu')
	Master Data Tiket
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

  @if($act=="viewTambahTiket")
  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Tambah Tiket</h3>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal" action="{{ asset('sipar/tiket/prosestambahtiket') }}" method="post">
                  {!! csrf_field() !!}
  	              <div class="box-body">
  	                <div class="form-group">
  	                  <label for="tiket_name" class="col-sm-2 control-label">Nama Tiket Wisata</label>
  	                  <div class="col-sm-8">
  	                    <input type="text" class="form-control" id="tiket_name" name="tiket_name" placeholder="Nama Tiket Wisata">
  	                  </div>
  	                </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Nama Tipe Tiket Wisata</label>
                      <div class="col-sm-8">
                      <select class="form-control" name="tiket_type" id="tiket_type" placeholder="tiket_type">
                      <option value="Lokal-Anak">Lokal - anak-anak</option>
                      <option value="Lokal-Dewasa">Lokal - dewasa</option>
                      <option value="Asing-Anak">Asing - anak-anak</option>
                      <option value="Asing-Dewasa">Asing - dewasa</option>
                      </select>
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Harga</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Nama Tiket Wisata">
                      </div>
                    </div>
  	              </div>
  	              <!-- /.box-body -->
  	              <div class="box-footer">
  	                <a href="{{ asset('sipar/tiket') }}" class="btn btn-default">Cancel</a>
  	                <button type="submit" class="btn btn-info pull-right">Save</button>
  	              </div>
  	              <!-- /.box-footer -->
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif


  @if($act=="viewEditTiket")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Tiket</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="{{ asset('sipar/tiket/prosesedittiket') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                     <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Nama Tipe Tiket Wisata</label>
                      <div class="col-sm-8">
                      <select class="form-control" name="tiket_type" id="tiket_type" placeholder="tiket_type" value="{{$tiket->tiket_type}}">
                      <option value="Lokal-Anak">Lokal - anak-anak</option>
                      <option value="Lokal-Dewasa">Lokal - dewasa</option>
                      <option value="Asing-Anak">Asing - anak-anak</option>
                      <option value="Asing-Dewasa">Asing - dewasa</option>
                      </select>
                      <input type="hidden" class="form-control" id="tiket_id" name="tiket_id" value="{{ $tiket->tiket_id }}">
                    </div>
                  </div>
                  </div>
                  <div class="box-footer">
                    <a href="{{ asset('sipar/tiket') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewTiket" || $act=="viewDeleteTiket")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteTiket")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Mahasiswa <strong> {{ $tiket_del->tiket_name }} </strong> ?
            <a href="{{ asset('sipar/tiket') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/tiket/prosesdeletetiket',$tiket_del->tiket_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Data Tiket Wisata</h3>
                  <a href="{{ asset('sipar/tiket/viewtambahtiket') }}" class="btn btn-info pull-right">Tambah</a>
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
                    <th>Nama type tiket wisata</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($tiket as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->tiket_type }}</td>
                      <td>
                        <a href="{{ url('sipar/tiket/viewedittiket',$m->tiket_id) }}" class="btn-sm btn-warning ">Edit</a> &nbsp;
                        <a href="{{ url('sipar/tiket/viewdeletetiket',$m->tiket_id) }}" class="btn-sm btn-danger ">Hapus</a>   
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
                    <th>Nama type tiket wisata</th>
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