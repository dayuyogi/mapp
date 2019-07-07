<html>
<head>
  <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <style type="text/css">
    table tr td,
    table tr th{
      font-size: 9pt;
    }
  </style>
  <center>
    <h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
    <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
  </center>
 
  <table class='table table-bordered'>
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
      @php $i=1 @endphp
      @foreach($wisata as $m)
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
      @endforeach
    </tbody>
  </table>
 
</body>
</html>