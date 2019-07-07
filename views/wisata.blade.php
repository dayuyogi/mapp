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

  @if($act=="viewTambahWisata")
  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Tambah Wisata</h3>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/wisata/prosestambahwisata') }}" method="post">
                  {!! csrf_field() !!}
  	              <div class="box-body">
  	                <div class="form-group">
  	                  <label for="tiket_name" class="col-sm-2 control-label">Nama Wisata
                      </label>
  	                  <div class="col-sm-8">
  	                    <input type="text" class="form-control" id="wisata_name" name="wisata_name" placeholder="Nama Wisata">
  	                  </div>
  	                </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kecamatan</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="kecamatan_id" id="kecamatan_id" >
                                  @foreach($kec as $kecamatan)
                                      <option value="{{$kecamatan->kecamatan_id}}">{{$kecamatan->kecamatan_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Tiket</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="tiket_id" id="tiket_id" >
                                  @foreach($tiket as $tik)
                                      <option value="{{$tik->tiket_id}}">{{$tik->tiket_type}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kategori Wisata</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="katwis_id" id="katwis_id" >
                                  @foreach($katwis as $wis)
                                      <option value="{{$wis->katwis_id}}">{{$wis->katwis_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div> 
                     <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">harga tiket Wisata </label>
                      <div class="col-sm-8">
                       <input type="tel" class="form-control" id="harga" name="harga" placeholder="harga">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Alamat Wisata </label>
                      <div class="col-sm-8">
                       <input type="tel" class="form-control" id="wisata_alamat" name="wisata_alamat" placeholder="Nomor Emergency">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Operasional Jam Buka</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="open_time" name="open_time" placeholder="Jam Buka">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">Operasional Jam Tutup</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="close_time" name="close_time" placeholder="Jam Buka">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">gambar</label>
                      <div class="col-sm-8">
                       <input id="gambar" name="gambar" type="file">
                      </div>
                    </div>
  	              </div>
  	              <!-- /.box-body -->
  	              <div class="box-footer">
  	                <a href="{{ asset('sipar/wisata') }}" class="btn btn-default">Cancel</a>
  	                <button type="submit" class="btn btn-info pull-right">Save</button>
  	              </div>
  	              <!-- /.box-footer -->
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif


  @if($act=="viewEditWisata")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Wisata</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/wisata/proseseditwisata') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Nama Wisata</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="wisata_name" name="wisata_name" value="{{ $wisata->wisata_name }}">
                        <input type="hidden" class="form-control" id="wisata_id" name="wisata_id" value="{{ $wisata->wisata_id }}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kecamatan</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="kecamatan_id" id="kecamatan_id" >
                                  @foreach($kec as $kcmtn)
                                      <option value="{{$kcmtn->kecamatan_id}}">{{$kcmtn->kecamatan_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Tiket</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="tiket_id" id="tiket_id" >
                                  @foreach($tiket as $tik)
                                      <option value="{{$tik->tiket_id}}">{{$tik->tiket_type}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kategori Wisata</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="katwis_id" id="katwis_id" >
                                  @foreach($katwis as $wis)
                                      <option value="{{$wis->katwis_id}}">{{$wis->katwis_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">harga wisata</label>
                      <div class="col-sm-8">
                     <input type="text" class="form-control" id="harga" name="harga" value="{{ $wisata->harga }}">
                    </div>
                  </div>
                     <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">lokasi wisata</label>
                      <div class="col-sm-8">
                     <input type="text" class="form-control" id="wisata_alamat" name="wisata_alamat" value="{{ $wisata->wisata_alamat }}">
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Jam Operasional Buka </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="open_time" name="open_time" value="{{ $wisata->open_time }}">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">Jam Operasional Tutup</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="close_time" name="close_time" value="{{ $wisata->close_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">gambar</label>
                      <div class="col-sm-8">
                       <input id="gambar" name="gambar" type="file" value="{{ $wisata->gambar }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/wisata') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewWisata" || $act=="viewDeleteWisata")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteWisata")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Mahasiswa <strong> {{ $wisata_del->wisata_name }} </strong> ?
            <a href="{{ asset('sipar/wisata') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/wisata/prosesdeletewisata',$wisata_del->wisata_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title pull-center">Data Wisata</h3>
                  <a href="{{ asset('sipar/wisata/viewtambahwisata') }}" class="btn btn-info pull-right">Tambah</a>
                  <a href="{{ asset('sipar/peta') }}" class="btn btn-info pull-right">Peta</a>
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
                    <th>Gambar</th>
                    <th>Opsi</th>
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
                      <td><img id="myImg" src="{{ asset ($m->gambar) }}" alt="gambar.jpg" style="width:50%;max-width:100px"></td>
                      <td>
                        <a href="{{ url('sipar/wisata/vieweditwisata',$m->wisata_id) }}" class="btn-sm btn-warning ">Edit</a> &nbsp;
                        <a href="{{ url('sipar/wisata/viewdeletewisata',$m->wisata_id) }}" class="btn-sm btn-danger ">Hapus</a>   
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
                    <th>Nama Wisata</th>
                    <th>kecamatan</th>
                    <th> Kategori Tiket</th>
                    <th> Kategori Wisata</th>
                    <th> Harga</th>
                    <th>Alamat Wisata</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
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