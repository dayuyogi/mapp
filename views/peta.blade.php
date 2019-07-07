@section('js')
        <title>Google Maps API - harviacode.com</title>
        <!--1. Memanggil google Maps API-->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBBbL8XuzggHZSgTu22E3gup27VDoUlWm4"></script>
        <script>
            // 2. menambahkan properti peta
            function initialize() {
                var properti_peta = {
                    center: new google.maps.LatLng('{{ $wisata->latitude }}','{{ $wisata ->longitude }}'),
                    zoom: 8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                // 4. membuat object peta
                var peta = new google.maps.Map(document.getElementById("tempat_peta"), properti_peta);
            }
            // 5. menampilkan peta
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
        <!--3. membuat div untuk menampilkan peta-->
        <div id="tempat_peta" style="width:500px;height:300px;"></div>
@endsection