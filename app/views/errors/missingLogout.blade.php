<head>
    {{ HTML::style('assets/css/bootstrap.css') }}
    <title>404 Not Found</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/DinasPUicon.png') }}"/>
</head>

<body>
    <div class="col-lg-12"style="text-align: center">
        <div class="well" style="width: 70%;margin: 50px 15%;" >
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">ERROR CODE : "<span style="color: #d21616">404 Not Found</span>"</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    REQUEST GAGAL ...<br/>HALAMAN <b>{{ $URL }}</b> TIDAK TERSEDIA<br/>
                    SILAHKAN KEMBALI KE HALAMAN <b><a href="{{ URL::to('login') }}">{{ URL::to('login') }}</a></b>
                </div>
            </div>
        </div>
    </div>
</body>