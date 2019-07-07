@extends('template.admin')

@section('title')
  event
@endsection


@section('judulmenu')
  event
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

  @if($act=="viewTambahevent")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah event</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/event/prosestambahevent') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Nama event
                      </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Nama event">
                      </div>
                    </div>
                      <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kategori Event</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="kateven_id" id="kateven_id" >
                                  @foreach($kateven as $kategorieven)
                                      <option value="{{$kategorieven->kateven_id}}">{{$kategorieven->kateven_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Lokasi Event</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="wisata_id" id="wisata_id" >
                                  @foreach($wisata as $wst)
                                      <option value="{{$wst->wisata_id}}">{{$wst->wisata_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">penyelenggara </label>
                      <div class="col-sm-8">
                       <input type="tel" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Nomor Emergency">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">contact person</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Jam Buka">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">tanggal mulai</label>
                      <div class="col-sm-8">
                       <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="Jam Buka">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">tanggal selesai</label>
                      <div class="col-sm-8">
                       <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="Jam Buka">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">open time</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="open_time" name="open_time" placeholder="Jam Buka">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">close time</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="close_time" name="close_time" placeholder="Jam Buka">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">ket</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="ket" name="ket" placeholder="Jam Buka">
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
                    <a href="{{ asset('sipar/event') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif


  @if($act=="viewEditevent")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit event</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/event/proseseditevent') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">Nama event</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="event_name" name="event_name" value="{{ $event->event_name }}">
                        <input type="hidden" class="form-control" id="event_id" name="event_id" value="{{ $event->event_id }}">
                      </div>
                    </div>
                     <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kategori Event</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="kateven_id" id="kateven_id" >
                                  @foreach($kateven as $kategorieven)
                                      <option value="{{$kategorieven->kateven_id}}">{{$kategorieven->kateven_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                     <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Lokasi Event</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="wisata_id" id="wisata_id" >
                                  @foreach($wisata as $wst)
                                      <option value="{{$wst->wisata_id}}">{{$wst->wisata_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">penyelenggara </label>
                      <div class="col-sm-8">
                       <input type="tel" class="form-control" id="penyelenggara" name="penyelenggara" value="{{ $event->penyelenggara }}" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_name" class="col-sm-2 control-label">contact person</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $event->contact_person }}">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">tanggal mulai</label>
                      <div class="col-sm-8">
                       <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $event->tgl_mulai }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">tanggal selesai</label>
                      <div class="col-sm-8">
                       <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ $event->tgl_selesai }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">open time</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="open_time" name="open_time" value="{{ $event->open_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">close time</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="close_time" name="close_time" value="{{ $event->close_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">ket</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="ket" name="ket" value="{{ $event->ket }}">
                      </div>  
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">gambar</label>
                      <div class="col-sm-8">
                       <input id="gambar" name="gambar" type="file" value="{{ $event->gambar }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/event') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewevent" || $act=="viewDeleteevent")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteevent")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Mahasiswa <strong> {{ $event_del->event_name }} </strong> ?
            <a href="{{ asset('sipar/event') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/event/prosesdeleteevent',$event_del->event_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>

    @endif

    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Data event</h3>
                  <a href="{{ asset('sipar/event/viewtambahevent') }}" class="btn btn-info pull-right">Tambah</a>
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
                    <th>Nama event</th>
                    <th>Kategori event </th>
                    <th>Lokasi event </th>
                    <th>penyelenggara event</th>
                    <th>contact person</th>
                    <th>tgl mulai</th>
                    <th>tgl selesai</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                    <th>ket</th>
                    <th>gambar</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($event as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->event_name }}</td>
                      <td>{{ $m->kateven_na}}</td>
                      <td>{{$m->obj}}</td>
                      <td>{{ $m->penyelenggara }}</td>
                      <td>{{ $m->contact_person }}</td>
                      <td>{{ $m->tgl_mulai}}</td>
                      <td>{{ $m->tgl_selesai}}</td>
                      <td>{{ $m->open_time }}</td>
                      <td>{{ $m->close_time }}</td>
                      <td>{{ $m->ket }}</td>
                      <td><img id="myImg" src="{{ asset ($m->gambar) }}" alt="gambar.jpg" style="width:50%;max-width:100px"></td>
                      <td>
                        <a href="{{ url('sipar/event/vieweditevent',$m->event_id) }}" class="btn-sm btn-warning ">Edit</a> &nbsp;
                        <a href="{{ url('sipar/event/viewdeleteevent',$m->event_id) }}" class="btn-sm btn-danger ">Hapus</a>   
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