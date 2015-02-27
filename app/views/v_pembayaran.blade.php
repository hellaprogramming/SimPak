@extends('layouts.master')
@section('title')
{{ $title }}
@stop
@section('styleload')
<!-- Page-Level Plugin CSS - Tables -->
{{ HTML::style('assets/css/plugins/dataTables/dataTables.bootstrap.css') }}
{{ HTML::style('assets/css/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.css') }}
{{ HTML::style('assets/css/plugins/slider.css') }}
@stop


@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-archive fa-1x"></i> {{ $title }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        @include('layouts.alert')
        <div class="panel panel-default" >
            <div class="panel-heading">
                Daftar Pekerjaan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" >
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabel-pembayaran">
                        <thead>
                            <tr>
                                <th>Nama Pekerjaan</th>
                                <th>Tgl Pekerjaan</th>
                                <th>Persentase</th>
                                <th>Rekanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($db as $data)
                            <tr>
                                <td>{{ $data->NamaPekerjaan }}</td>
                                <td>{{ $data->tanggalKontrak }}</td>
                                <td>{{ $data->PersentasePekerjaan }}%</td>
                                <td>{{ $data->NamaPerusahaan }}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-success" onclick="modalPembayaran('{{ $data->id_pekerjaan }}')" 
                                       rel="tooltip" data-placement="top" title="Pembayaran Pekerjaan">
                                        Rp. BAYAR
                                    </a>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-pembayaran">
    <!--untuk modal pembayaran-->
</div>
@stop

@section('jsload')
{{ HTML::script('assets/js/plugins/dataTables/jquery.dataTables.js') }}
{{ HTML::script('assets/js/plugins/dataTables/dataTables.bootstrap.js') }}
{{ HTML::script('assets/js/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.js') }}
{{ HTML::script('assets/js/plugins/bootstrap-slider.js') }}
@stop

@section('jsorjquery')
<script>
    var idPajak = '{{ $idPajak }}';
    
    function modalPembayaran(idPekerjaan){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("pembayaran/modal-pembayaran/'+idPekerjaan+'") }}',
                success: function(html){
                    $(".modal-pembayaran").empty();
                    $(".modal-pembayaran").show().html(html);
                    $('#modal-pembayaran').modal();                
                }
            });
        });
    }
    
    
    $(document).ready(function() {
        $('#tabel-pembayaran').dataTable({
            'scrollX': true,
            'ordering': false
        });
        
        $('.tab-daftar-pembayaran').on('click', function(){
            $.get('{{ URL::to("pembayaran/daftar-pembayaran/'+idPajak+'") }}').done(function(data){
                $('.tabel-daftar-pembayaran tbody').empty();
                if(data.length){
                    $.each(data, function(i, item){
                        tanggal = new Date(item.TanggalPembayaran);
                        bulan = tanggal.getMonth("dd")+1;
                        if(bulan < 10){
                            bulan = '0'+bulan;
                        }
                        baris = '<tr>\n\
                                    <td>'+item.NamaPekerjaan+'</td>\n\
                                    <td>'+ tanggal.getDate()+' - '+bulan+' - '+tanggal.getFullYear()+'</td>\n\
                                    <td style="text-align:center;">Rp. '+item.NilaiPembayaran+'</td>\n\
                                    <td style="text-align:center;">Rp. '+item.NilaiPPh+'</td>\n\
                                    <td style="text-align:center;">'+item.PersentasePembayaran+'%</td>\n\
                                    <td>'+item.NamaPerusahaan+'</td>\n\
                                    <td style="text-align:center;">\n\
                                        @if( $idPajak == "1" )  \n\
                                        <a onclick="cetakssp22()" class="btn btn-primary print-ssp" rel="tooltip" data-placement="top" title="Pembayaran Pekerjaan"><i class="fa fa-print"></i> Cetak</a> \n\
                                        @elseif( $idPajak == "4:5:6:7:8:9:10" ) \n\
                                        <a onclick="cetakbuktipotong('+item.id_pembayaran+')" class="btn btn-primary print-bukti-potong" rel="tooltip" data-placement="top" title="Pembayaran Pekerjaan"><i class="fa fa-print"></i> Cetak</a>\n\
                                        @endif  \n\
                                    </td>\n\
                                </tr>';
                                                            $('.tabel-daftar-pembayaran tbody').append(baris);
                                                        });
                                                        $('a[rel="tooltip"]').tooltip();
                                                    }else{
                                                        $('.tabel-daftar-pembayaran tbody').append('<tr><td colspan="7" style="text-align:center;" class="danger" style> Data Kosong..</td></tr>');
                                                    }
                                                });
                                                //           
                                            });
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

        });
</script>
@stop