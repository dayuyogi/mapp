@extends('template.admin')

@section('title')
  Emergency Contact - SI Wisata
@endsection


@section('judulmenu')
  Master Data Emergency Contact
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

  @if($act=="viewTambahEmergency")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Emergency Contact</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/emergency/prosestambahemergency') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Nama Emergency </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="emergency_name" name="emergency_name" placeholder="Nama Emergency">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Nomor Emergency </label>
                      <div class="col-sm-8">
                       <input type="tel" class="form-control" id="emergency_phone" name="emergency_phone" placeholder="Nomor Emergency">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Alamat Emergency</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="emergency_alamat" name="emergency_alamat" placeholder="Alamat">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label" for="emergency_photo">Foto Emergency</label>
                      <div class="col-sm-10">
                        <input id="emergency_photo" name="emergency_photo" type="file">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/emergency') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif


  @if($act=="viewEditEmergency")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Emergency</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/emergency/proseseditemergency') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="emergency_name" class="col-sm-2 control-label">Nama Tiket</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="emergency_name" name="emergency_name" value="{{ $emergency->emergency_name }}">
                        <input type="hidden" class="form-control" id="emergency_id" name="emergency_id" value="{{ $emergency->emergency_id }}">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="emergency_phone" class="col-sm-2 control-label">Nomor Emergency</label>
                      <div class="col-sm-8">
                     <input type="text" class="form-control" id="emergency_phone" name="emergency_phone" value="{{ $emergency->emergency_phone }}">
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Alamat Emergency </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="emergency_alamat" name="emergency_alamat" value="{{ $emergency->emergency_alamat }}">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">Photo</label>
                      <div class="col-sm-10">
                        <input id="emergency_photo" name="emergency_photo" type="file" value="{{ $emergency->emergency_photo }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/emergency') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewEmergency" || $act=="viewDeleteEmergency")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteEmergency")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Mahasiswa <strong> {{ $emergency_del->emergency_name }} </strong> ?
            <a href="{{ asset('sipar/emergency') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/emergency/prosesdeleteemergency',$emergency_del->emergency_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Emergency Contact</h3>
                  <a href="{{ asset('sipar/emergency/viewtambahemergency') }}" class="btn btn-info pull-right">Tambah</a>
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
                    <th>Nama Emergency Contact</th>
                    <th>Nomor Emergency Contact</th>
                    <th>Alamat</th>
                    <th>Photo</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($emergency as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->emergency_name }}</td>
                      <td>{{ $m->emergency_phone }}</td>
                      <td>{{ $m->emergency_alamat }}</td>
                      <td><img id="myImg" src="{{ asset ($m->emergency_photo) }}" alt="gambar.jpg" style="width:50%;max-width:100px"></td>
                      <td>
                        <a href="{{ url('sipar/emergency/vieweditemergency',$m->emergency_id) }}" class="btn-sm btn-warning ">Edit</a> &nbsp;
                        <a href="{{ url('sipar/emergency/viewdeleteemergency',$m->emergency_id) }}" class="btn-sm btn-danger ">Hapus</a>   
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
                    <th>Nama Emergency Contact</th>
                    <th>Nomor Emergency Contact</th>
                    <th>Alamat</th>
                    <th>Photo</th>
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