@extends('layouts.master')
@section('title', 'Cetak Transaksi Pembayaran')
@section('styleload')
{{ HTML::style('assets/css/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.css') }}
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-paste fa-1x"></i> Cetak Transaksi Pembayaran</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-7 well">
            <h4>Cari Data Pembayaran</h4>
            <div class="form-group">
                <div class="col-lg-12 for-alert-cari-pembayaran" style="margin-top: 10px;padding-right: 0px;"></div>
                <label style="margin-top: 17px;" class="col-sm-3 control-label">Periode</label>
                <div class="col-sm-9" style="margin-top: 17px;">
                    <select  class="form-control periode" id="periode" type="text" autocomplete="off" >
                        <option selected value="" id="pilih-periode">-Pilih Periode-</option>
                        <option value="1"> Harian</option>
                        <option value="2"> Bulanan</option>
                    </select>
                </div>
            </div>
            <div class="form-group tombol-cari">
                <label style="margin-top: 10px;" class="col-sm-3 control-label">&nbsp;</label>
                <div class="col-sm-9" style="margin-top: 10px;text-align: right;">
                    <button class="btn btn-primary" onclick="caridatapembayaran()"><i class="fa fa-search"></i> CARI</button>
                    <button class="btn btn-default tbl-batal">BATAL</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <table style="margin-left: 20px;">
                <tr><td colspan="4" style="padding-bottom: 10px;"><b>Keterangan</b></td></tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td style="padding:5px;"><a class="btn btn-primary"><i class="fa fa-print"></i></a></td>
                    <td style="padding:5px;">=</td>
                    <td style="padding:5px;">Cetak Bukti Potong</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td style="padding:5px;"><a class="btn btn-info"><i class="fa fa-print"></i></a></td>
                    <td style="padding:5px;">=</td>
                    <td style="padding:5px;">Cetak Surat Setoran Pajak</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding:5px;"><a class="btn btn-warning"><i class="fa fa-print"></i></a></td>
                    <td style="padding:5px;">=</td>
                    <td style="padding:5px;">Cetak Faktur Pajak</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding:5px;"><a class="btn btn-success"><i class="fa fa-print"></i></a></td>
                    <td style="padding:5px;">=</td>
                    <td style="padding:5px;">Cetak Surat Setoran Pajak (PPN)</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive div-responsive">
            <table class="table table-striped table-bordered table-hover tabel-daftar-pembayaran" >
                <thead>
                    <tr>
                        <th style="vertical-align: middle;">Nama Pekerjaan</th>
                        <th style="vertical-align: middle;width: 150px;">Tgl Pembayaran</th>
                        <th style="vertical-align: middle;width: 150px;">Nilai Pembayaran</th>
                        <th style="text-align: center;vertical-align: middle;width: 150px;">Nilai PPh</th>
                        <th>Persentase<br/>Pembayaran</th>
                        <th style="vertical-align: middle;">Rekanan</th>
                        <th style="text-align: center;vertical-align: middle;width: 195px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data))
                        @foreach($data as $data)
                        {? $NilaiPembayaran = number_format($data->NilaiPembayaran, 0, ',', '.') ?}
                        {? $NilaiPPh = number_format($data->NilaiPPh, 0, ',', '.') ?}
                        {? $TanggalPembayaran = new \DateTime($data->TanggalPembayaran) ?}
                        <tr>
                            <td>{{ $data->NamaPekerjaan }}</td>
                            <td>{{ $TanggalPembayaran->format('d-m-Y') }}</td>
                            <td style="text-align:center;">Rp. {{ $NilaiPembayaran }}</td>
                            <td style="text-align:center;">Rp. {{ $NilaiPPh }}</td>
                            <td style="text-align:center;">{{ $data->PersentasePembayaran }}%</td>
                            <td>{{ $data->NamaPerusahaan }}</td>
                            <td style="text-align:center;">
                                <div class="btn-group">
                                    @if($idPajak == "2")
                                    <a onclick="cetakbuktipotong23('{{$data->id_pembayaran}}')" class="btn btn-primary" rel="tooltip" data-placement="top" title=" Cetak Bukti Potong"><i class="fa fa-print fa-fw"></i></a>
                                    @elseif($idPajak == "3")
                                    <a onclick="cetakbuktipotong('{{$data->id_pembayaran}}')" class="btn btn-primary" rel="tooltip" data-placement="top" title=" Cetak Bukti Potong"><i class="fa fa-print fa-fw"></i></a>
                                    @endif
                                    <a onclick="cetakssp('{{$data->id_pembayaran}}')" class="btn btn-info" rel="tooltip" data-placement="top" title="Cetak SSP"><i class="fa fa-print"></i></a>
                                    <a onclick="cetakfaktur('{{$data->id_pembayaran}}')" class="btn btn-warning" rel="tooltip" data-placement="top" title="Cetak Faktur"><i class="fa fa-print"></i></a>
                                    <a onclick="cetaksspPPN('{{$data->id_pembayaran}}')" class="btn btn-success" rel="tooltip" data-placement="top" title="Cetak SSP PPN"><i class="fa fa-print"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr><td colspan="7" style="text-align:center;" class="danger" style> Data Kosong..</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<iframe id="print-report" frameborder="0" marginheight="0" marginwidth="0" width="0" height="0"></iframe>
@stop

@section('jsload')
{{ HTML::script('assets/js/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.js') }}
@stop

@section('jsorjquery')
<script>
    var idPajak = '{{ $idPajak }}';
    $hari = '<div class="form-group hari">\n\
                    <label style="margin-top: 10px;" class="col-sm-3 control-label">Harian</label>\n\
                    <div class="col-sm-9" style="margin-top: 10px;">\n\
                        <div class="input-group">\n\
                            <input  class="form-control harian tanggalCari" type="text" autocomplete="off" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>\n\
                        </div>\n\
                    </div>\n\
                </div>';
    $bulan = '<div class="form-group bulan">\n\
                <label style="margin-top: 10px;" class="col-sm-3 control-label">Bulanan</label>\n\
                <div class="col-sm-6" style="margin-top: 10px;padding-right:0px;">\n\
                    <select  class="form-control tanggalCari1" type="text" >\n\
                        <option value="01">Januari</option><option value="02">Februari</option><option value="03">Maret</option>\n\
                        <option value="04">April</option><option value="05">Mei</option><option value="06">Juni</option>\n\
                        <option value="07">Juli</option><option value="08">Agustus</option><option value="09">September</option>\n\
                        <option value="10">Oktober</option><option value="11">Nopember</option><option value="12">Desember</option>\n\
                    </select>\n\
                </div>\n\
                <div class="col-sm-3" style="margin-top: 10px;">\n\
                    <select  class="form-control tanggalCari2" type="text" >\n\
                        <option value="2013">2013</option><option value="2014" selected>2014</option><option value="2015">2015</option>\n\
                    </select>\n\
                </div>\n\
            </div>';
                        
    function fungsibaris(id_pembayaran, NamaPekerjaan, TanggalPembayaran, NilaiPembayaran, NilaiPPh, PersentasePembayaran, NamaPerusahaan){
        var baris = '<tr>\n\
                        <td>'+NamaPekerjaan+'</td>\n\
                        <td>'+TanggalPembayaran+'</td>\n\
                        <td style="text-align:center;">Rp. '+NilaiPembayaran+'</td>\n\
                        <td style="text-align:center;">Rp. '+NilaiPPh+'</td>\n\
                        <td style="text-align:center;">'+PersentasePembayaran+'%</td>\n\
                        <td>'+NamaPerusahaan+'</td>\n\
                        <td style="text-align:center;">\n\
                        <div class="btn-group">\n\
                            @if($idPajak == "2")\n\
                            <a onclick="cetakbuktipotong23('+id_pembayaran+')" class="btn btn-primary" rel="tooltip" data-placement="top" title=" Cetak Bukti Potong"><i class="fa fa-print fa-fw"></i></a>\n\
                            @elseif($idPajak == "3")\n\
                            <a onclick="cetakbuktipotong('+id_pembayaran+')" class="btn btn-primary" rel="tooltip" data-placement="top" title="Cetak Bukti Potong"><i class="fa fa-print"></i></a>\n\
                            @endif  \n\
                            <a onclick="cetakssp('+id_pembayaran+')" class="btn btn-info" rel="tooltip" data-placement="top" title="Cetak SSP"><i class="fa fa-print"></i></a>\n\
                            <a onclick="cetakfaktur('+id_pembayaran+')" class="btn btn-warning" rel="tooltip" data-placement="top" title="Cetak Faktur"><i class="fa fa-print"></i></a>\n\
                            <a onclick="cetaksspPPN('+id_pembayaran+')" class="btn btn-success" rel="tooltip" data-placement="top" title="Cetak SSP PPN"><i class="fa fa-print"></i></a>\n\
                        </div>\n\
                        </td>\n\
                    </tr>';
        return baris;
    }                    
function caridatapembayaran(){
    var dataperiode = $('#periode').val();
    if( dataperiode == '1'){
    var datakirim = {'tanggal' : $('.tanggalCari').val(), 'periode': dataperiode, 'id_pajak': idPajak};
         }else if ( dataperiode == '2' ){
    var datakirim = {'tanggal1' : $('.tanggalCari1').val(), 'tanggal2' : $('.tanggalCari2').val(), 'periode': dataperiode, 'id_pajak': idPajak};
         }
    $().ready(function(){
        $.ajax({
            type: 'POST',
            url: '{{ URL::to("pembayaran/cari-data-pembayaran") }}',
            data : datakirim ,
            beforeSend: function(){
                $('.tabel-daftar-pembayaran tbody').empty().append('<tr><td colspan="7" style="text-align:center;" class="info" style> Memuat Data ....</td></tr>');
            },
            success: function(data){
                if(data.error){
                    $('.for-alert-cari-pembayaran').empty();
                    alert_message('danger', data.error, '.for-alert-cari-pembayaran');  
                    $('html, body').animate({scrollTop:0}, 'slow');
                    $('.tabel-daftar-pembayaran tbody').empty().append('<tr><td colspan="7" style="text-align:center;" class="danger" style> Pencarian Error</td></tr>');
                }else{
                    $('.for-alert-cari-pembayaran').empty();
                    $('.tabel-daftar-pembayaran tbody').empty();
                    if(data.length){
                        $.each(data, function(i, item){
                            var baris = fungsibaris(item.id_pembayaran, item.NamaPekerjaan, item.TanggalPembayaran, item.NilaiPembayaran, item.NilaiPPh, item.PersentasePembayaran, item.NamaPerusahaan);
                            $('.tabel-daftar-pembayaran tbody').append(baris);
                        });
                        $('a[rel="tooltip"]').tooltip();
                    }else{
                        $('.tabel-daftar-pembayaran tbody').append('<tr><td colspan="7" style="text-align:center;" class="danger" style> Data Kosong..</td></tr>');
                    }
                }
            }
        });
    })
};

var $framed = $('#print-report');
var printFrame = function($frame, url) {
    $frame.attr('src', url);
    $frame.load(function(){
        this.contentWindow.focus();
        this.contentWindow.print();
    });
 };
function cetakssp(id_pembayaran){
    printFrame($framed, '{{ URL::to("cetak-ssp/'+id_pembayaran+'") }}');
    return false;
};
function cetakbuktipotong22(id_pembayaran){
    printFrame($framed, '{{ URL::to("cetak-bukti-potong-pasal22/'+id_pembayaran+'") }}');
    return false;
};
function cetakbuktipotong23(id_pembayaran){
    printFrame($framed, '{{ URL::to("cetak-bukti-potong-pasal23/'+id_pembayaran+'") }}');
    return false;
};
function cetakbuktipotong(id_pembayaran){
    printFrame($framed, '{{ URL::to("cetak-bukti-potong-konstruksi/'+id_pembayaran+'") }}');
    return false;
};
function cetakfaktur(id_pembayaran){
    printFrame($framed, '{{ URL::to("cetak-faktur-pajak/'+id_pembayaran+'") }}');
    return false;
};
function cetaksspPPN(id_pembayaran){
    printFrame($framed, '{{ URL::to("cetak-ssp-ppn/'+id_pembayaran+'") }}');
    return false;
};
 
$(document).ready(function() { 
    $('.periode').on('change', function(){
        var value = $(this).val();
        if( value == '1'){
            $('.bulan').remove();
            $('.tombol-cari').before($hari);
            $('.harian').datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                firstDay: 1,
                numberOfMonths: 1
            });
        }else if( value == '2'){
            $('.hari').remove();
            $('.tombol-cari').before($bulan);
        }else{
            $('.hari').remove();
            $('.bulan').remove();
        }
    });
    $('.tbl-batal').on('click', function(){
            $('.hari').remove();
            $('.bulan').remove();
            $('#pilih-periode').attr('selected', 'selected');
        });
});
        
        
</script>
@stop