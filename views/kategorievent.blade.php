@extends('template.admin')

@section('title')
	Kategori Event - SI Wisata
@endsection


@section('judulmenu')
	Master Data Kategori Event
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

  @if($act=="viewTambahKatevent")
  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Tambah Kategori Event</h3>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal" action="{{ asset('sipar/kateven/prosestambahkatevent') }}" method="post">
                  {!! csrf_field() !!}
  	              <div class="box-body">
  	               {{--  <div class="form-group"row{{ $errors->has('kateven_name') ? ' has-error' : '' }}">
  	                  <label for="kateven_name" class="col-sm-2 control-label">Kategori Event</label>
  	                  <div class="col-sm-8">
  	                    <input type="text" class="form-control" id="kateven_name" name="kateven_name" placeholder="Masukkan Kategori Event">
                         @if ($errors->has('kateven_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kateven_name') }}</strong>
                                    </span>
                          @endif 
  	                  </div>
  	                </div> --}}
                       <div class="form-group" row{{ $errors->has('kateven_name') ? ' has-error' : '' }}>
                      <label for="kateven_name" class="col-sm-2 control-label">No Identifikasi</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="kateven_name" name="kateven_name" placeholder="No Identifikasi">
                        @if ($errors->has('kateven_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kateven_name') }}</strong>
                                    </span>
                                @endif 
                      </div>
  	              </div>
  	              <!-- /.box-body -->
  	              <div class="box-footer">
  	                <a href="{{ asset('sipar/kateven') }}" class="btn btn-default">Cancel</a>
  	                <button type="submit" class="btn btn-info pull-right">Save</button>
  	              </div>
  	              <!-- /.box-footer -->
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif


  @if($act=="viewEditKatevent")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Kategori Event</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="{{ asset('sipar/kateven/proseseditkatevent') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="katnews_name" class="col-sm-2 control-label">Kategori Event</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="kateven_name" name="kateven_name" value="{{ $kateven->kateven_name }}">
                        <input type="hidden" class="form-control" id="kateven_id" name="kateven_id" value="{{ $kateven->kateven_id }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/kateven') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewKatevent" || $act=="viewDeleteKatevent")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteKatevent")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Kategori <strong> {{ $kateven_del->kateven_name }} </strong> ?
            <a href="{{ asset('sipar/kateven') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/kateven/prosesdeletekatevent',$kateven_del->kateven_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Data Kategori Event</h3>
                  <a href="{{ asset('sipar/kateven/viewtambahkatevent') }}" class="btn btn-info pull-right">Tambah</a>
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
                    <th>Nama Kategori Event</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($kateven as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->kateven_name }}</td>
                      <td>
                        <a href="{{ url('sipar/kateven/vieweditkatevent',$m->kateven_id) }}" class="btn-sm btn-warning ">Edit</a> &nbsp;
                        <a href="{{ url('sipar/kateven/viewdeletekatevent',$m->kateven_id) }}" class="btn-sm btn-danger ">Hapus</a>   
                      </td>
                    </tr>

                    @php
                      $i++;
                    @endphp
                  @endforeach
                  
  	              <!-- /.box-body -->
  	             </tbody>
                </table>
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif

@endsection