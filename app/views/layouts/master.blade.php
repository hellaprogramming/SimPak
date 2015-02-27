<!--
 * 
 * Sistem Penghitungan Pajak dan pelaporan atas pengadaan barang dan jasa Dinas PU Kutai Timur
 * author Randa Wahyu Pradhana
 * email : randaw46.rw@gmail.com
 * 
--> 
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="{{ asset('assets/img/DinasPUicon.png') }}"/>
        <!-- Core CSS - Include with every page -->
        {{ HTML::style('assets/css/bootstrap.css') }}
        {{ HTML::style('assets/font-awesome/css/font-awesome.css') }}

        @yield('styleload')

        <!-- SB Admin CSS - Include with every page -->
        {{ HTML::style('assets/css/sb-admin.css') }}
        <style>
            .div-responsive{
                width: 100%;
                margin-bottom: 15px;
                overflow-x: scroll;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar;
                border: 1px solid #ddd;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">

            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="beranda">Sistem Pajak Dinas PU Kutim</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Hi, {{ Auth::user()->username }}  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href='{{ URL::to("user") }}'><i class="fa fa-user fa-fw"></i> Profile Anda</a>
                            </li>
                            <li><a href='{{ URL::to("user/ganti-password") }}'><i class="fa fa-gear fa-fw"></i> Ganti Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href='{{ URL::to("logout") }}'><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href='{{ URL::to("beranda") }}'><i class="fa fa-home fa-fw"></i> Dashboard</a>
                            </li>
                            @if (Auth::user()->jenis_user == 'super_user')
                            <li>
                                <a href='{{ URL::to("daftar-user") }}'><i class="fa fa-users fa-fw"></i> Daftar User</a>                                
                            </li>
                            <li>
                                <a href='{{ URL::to("data-pajak") }}'><i class="fa fa-file-text fa-fw"></i> Master Pajak</a>                                
                            </li>
                            <li>
                                <a href='{{ URL::to("master-informasi-pajak") }}'><i class="fa fa-file-text fa-fw"></i> Master Informasi Pajak</a>
                            </li>
                            @elseif (Auth::user()->jenis_user == 'bendahara_pembantu')
                            <li>
                                <a href='#'><i class="fa fa-user fa-fw"></i> Profil<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href='{{ URL::to("profil/bendahara") }}'>Bendahara</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("profil/rekanan") }}'> Wajib Pajak/Rekanan</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href='#'><i class="fa fa-suitcase fa-fw"></i> Pekerjaan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href='#'>Tambah Pekerjaan<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level collapse">
                                            <li>
                                                <a href="{{ URL::to('pekerjaan-pasal22') }}">PPh Pasal 22</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::to('pekerjaan-pasal23') }}">PPh Pasal 23</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::to('pekerjaan-pasal4') }}">PPh Pasal 4 Ayat (2)</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href='#'> Daftar Pekerjaan<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level collapse">
                                            <li>
                                                <a href="{{ URL::to('pekerjaan-pasal22/daftar-pekerjaan') }}">PPh Pasal 22</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::to('pekerjaan-pasal23/daftar-pekerjaan') }}">PPh Pasal 23</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::to('pekerjaan-pasal4/daftar-pekerjaan') }}">PPh Pasal 4 Ayat (2)</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i style="width: 18px;height: 22px;font-size: 6pt;" class="btn-primary btn-circle fa ">Rp</i> Pembayaran<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href='{{ URL::to("pembayaran/pasal22") }}'>Pembayaran Pasal 22</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("pembayaran/pasal23") }}'>Pembayaran Pasal 23</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("pembayaran/pasal4") }}'>Pembayaran Pasal 4 ayat (2)</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-print fa-fw"></i> Cetak<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href='{{ URL::to("cetak/pasal22") }}'>PPh Pasal 22</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("cetak/pasal23") }}'>PPh Pasal 23</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("cetak/pasal4") }}'>PPh Pasal 4 ayat (2)</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            @elseif (Auth::user()->jenis_user == 'bendahara_pengeluaran')
                            <li>
                                <a href="#"><i class="fa fa-list fa-fw"></i> Daftar Bukti Potong<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href='{{ URL::to("daftar-bukti-potong/pasal22") }}'>PPh Pasal 22</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("daftar-bukti-potong/pasal23") }}'>PPh Pasal 23</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("daftar-bukti-potong/pasal4") }}'>PPh Pasal 4 ayat (2)</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-list fa-fw"></i> SPT Masa Pajak<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href='{{ URL::to("spt-masa/pasal22") }}'>PPh Pasal 22</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("spt-masa/pasal23") }}'>PPh Pasal 23</a>
                                    </li>
                                    <li>
                                        <a href='{{ URL::to("spt-masa/pasal4") }}'>PPh Pasal 4 ayat (2)</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            @endif
                            <li>
                                <a href='{{ URL::to("informasi-pajak") }}'><i class="fa fa-info-circle fa-fw"></i> Informasi Pajak</a>
                            </li>
                        </ul>
                        <!-- /#side-menu -->
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper" >
                @yield('content')
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Core Scripts - Include with every page -->
        {{ HTML::script('assets/js/jquery-1.10.2.js') }}
        {{ HTML::script('assets/js/plugins/jquery.redirect.min.js') }}
        {{ HTML::script('assets/js/bootstrap.min.js') }}
        {{ HTML::script('assets/js/jquery-imask.js') }}
        {{ HTML::script('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}

        @yield('jsload')

        <!-- SB Admin Scripts - Include with every page -->
        {{ HTML::script('assets/js/sb-admin.js') }}
        <script type="text/javascript">
            var alert_message = function(type, message, foralert){
                var alert = '<div class="alert alert-'+type+' alert-dismissable"><button class="close" data-dismiss="alert">×</button>'+message+'</div>';
                $(foralert).append(alert).show();
            }
            
            $('img[rel="tooltip"], button[rel="tooltip"], a[rel="tooltip"]').tooltip();

        </script>
        @yield('jsorjquery')

    </body>
</html>