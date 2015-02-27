@extends('layouts.master')

@section('title')
Hi, {{ Auth::user()->username }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            @if(Auth::user()->jenis_user == 'super_user')
            Halaman Admin
            @elseif (Auth::user()->jenis_user == 'bendahara_pembantu')
            Sistem Pajak atas Pengadaan Barang & Jasa
            @elseif (Auth::user()->jenis_user == 'bendahara_pengeluaran')
            Sistem Pajak atas Pengadaan Barang & Jasa
            @endif
        </h2>
    </div>
</div>

@if(Auth::user()->jenis_user == 'super_user')
<div class="row">
    <div class="col-lg-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> Profil Pengguna
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("user") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-user fa-4x"></i><p>Profil Anda</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("user/ganti-password") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-gear fa-4x"></i><p>Ganti Password</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list fa-fw"></i> Menu
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("daftar-user") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-users fa-4x"></i><p>Daftar User</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("data-pajak") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-file-text fa-4x"></i><p>Master Pajak</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("master-informasi-pajak") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-file-text fa-4x"></i><p>Master Inf Pajak</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>





@elseif (Auth::user()->jenis_user == 'bendahara_pembantu')
<div class="row">
    <div class="col-lg-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> Profil Pengguna
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("user") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-user fa-4x"></i><p>Profil Anda</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("user/ganti-password") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-gear fa-4x"></i><p>Ganti Password</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-users fa-fw"></i> Profil
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("profil/bendahara") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-user fa-4x"></i><p>Bendahara</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("profil/rekanan") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-users fa-4x"></i><p>Rekanan</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-tasks fa-fw"></i> Pekerjaan
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pekerjaan-pasal22") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-suitcase fa-4x"></i><p>Tambah<br/>Pekerjaan<br/>Pasal 22</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pekerjaan-pasal23") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-suitcase fa-4x"></i><p>Tambah<br/>Pekerjaan<br/>Pasal 23</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pekerjaan-pasal4") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-suitcase fa-4x"></i><p>Tambah<br/>Pekerjaan<br/>Pasal 4 Ayat (2)</p>
                    </a>
                </div>
                <div class="col-md-12">&nbsp;</div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pekerjaan-pasal22/daftar-pekerjaan") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-list fa-4x"></i><p>Daftar<br/>Pekerjaan<br/>Pasal 22</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pekerjaan-pasal23/daftar-pekerjaan") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-list fa-4x"></i><p>Daftar<br/>Pekerjaan<br/>Pasal 23</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pekerjaan-pasal4/daftar-pekerjaan") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-list fa-4x"></i><p>Daftar<br/>Pekerjaan<br/>Pasal 4 Ayat (2)</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bookmark fa-fw"></i> Pembayaran & Cetak
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pembayaran/pasal22") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i style="font-family: 'Bauhaus 93';" class="fa fa-4x">Rp</i><p>Pembayaran<br/>PPh Pasal<br/>22</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pembayaran/pasal23") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i style="font-family: 'Bauhaus 93';" class="fa fa-4x">Rp</i><p>Pembayaran<br/>PPh Pasal<br/>23</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("pembayaran/pasal4") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i style="font-family: 'Bauhaus 93';" class="fa fa-4x">Rp</i><p>Pembayaran<br/>PPh Pasal<br/>4 ayat (2)</p>
                    </a>
                </div>
                <div class="col-md-12">&nbsp;</div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("cetak/pasal22") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-print fa-4x"></i><p>Cetak<br/>Laporan PPh<br/>Pasal 22</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("cetak/pasal23") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-print fa-4x"></i><p>Cetak<br/>Laporan PPh<br/>Pasal 23</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("cetak/pasal4") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-print fa-4x"></i><p>Cetak<br/>Laporan PPh<br/>Pasal 4 ayat (2)</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



@elseif(Auth::user()->jenis_user == 'bendahara_pengeluaran')
<div class="row">
    <div class="col-lg-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> Profil Pengguna
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("user") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-user fa-4x"></i><p>Profil Anda<br/>&nbsp;</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("user/ganti-password") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-gear fa-4x"></i><p>Ganti Password<br/>&nbsp;</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list fa-fw"></i> Daftar Bukti Potong
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("daftar-bukti-potong/pasal22") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-file-text fa-4x"></i><p>PPh Pasal<br/>22</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("daftar-bukti-potong/pasal23") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-file-text fa-4x"></i><p>PPh Pasal<br/>23</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("daftar-bukti-potong/pasal4") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-file-text fa-4x"></i><p>PPh Pasal<br/>4 Ayat (2)</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list fa-fw"></i> SPT Masa Pajak
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("spt-masa/pasal22") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-file-text fa-4x"></i><p>PPh Pasal<br/>22</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("spt-masa/pasal23") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-file-text fa-4x"></i><p>PPh Pasal<br/>23</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("spt-masa/pasal4") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-file-text fa-4x"></i><p>PPh Pasal<br/>4 Ayat (2)</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-info-circle fa-fw"></i> &nbsp;
            </div>
            <div class="panel-body">
                <div class="col-xs-6 col-md-4">
                    <a href='{{ URL::to("spt-masa/pasal22") }}' class="thumbnail" style="margin: 0px auto;text-align: center;text-decoration: none;">
                        <i class="fa fa-info-circle fa-4x"></i><p>Informasi<br/>Pajak</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@stop