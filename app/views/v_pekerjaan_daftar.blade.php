@extends('layouts.master')
@section('title', 'Daftar Pekerjaan')
@section('styleload')
{{ HTML::style('assets/css/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.css') }}
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-archive fa-1x"></i> {{ $page_header }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6 well">
            <h3> Cari Pekerjaan</h3>
            <div class="form-group">
                <div class="col-lg-12 for-alert-cari-pekerjaan" style="padding-right: 0px;"></div>
                <div class="col-lg-12">
                    <select class="form-control cari-berdasarkan" name="cari-berdasarkan" ><option value="" class="pilih-cari" selected>Cari Berdasarkan</option><option value="1">Nama Pekerjaan</option><option value="2">Tanggal Pekerjaan</option><option value="3">Rekanan</option></select>
                </div>
            </div>
            <div class="form-group tombol-cari">
                <div style="margin-top: 10px;text-align: right" class="col-sm-12">
                    <button onclick="caridatapekerjaan()" class="btn btn-primary" ><i class="fa fa-search fa-1x"></i> CARI</button>
                    <a class="btn btn-default tbl-batal-cari" >BATAL</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--tabel daftar pekerjaan start-->
<div class="row">
    <div class="col-lg-12">
        <h3> Daftar Pekerjaan</h3>
        @include('layouts.alert')
        <div class="table-responsive div-responsive">
            <table class="table table-striped table-bordered table-hover tabel-daftar-pekerjaan" >
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
                @if(count($item))
                    @foreach($item as $data)
                    {? $tanggalKontrak = new \DateTime($data->tanggalKontrak) ?}
                    <tr>
                        <td>{{ $data->NamaPekerjaan }}</td>
                        <td>{{ $tanggalKontrak->format('d-m-Y') }}</td>
                        <td style="text-align: center;">{{ $data->PersentasePekerjaan }}%</td>
                        <td>{{ $data->NamaPerusahaan }}</td>
                        <td style="text-align: center">
                            <div class="btn-group">
                                <a class="btn btn-info tbl-detail" href="{{ URL::to('pekerjaan/details-pekerjaan/'.$data->id_pekerjaan) }}" rel="tooltip" data-placement="top" title="Detail Pekerjaan">
                                    <i class="fa fa-archive"></i>
                                </a>
                                <a class="btn btn-danger tbl-hapus" onclick="notifikasiHapus('{{ $data->NamaPekerjaan }}', '{{ $data->id_pekerjaan }}')" data-toggle="modal" rel="tooltip" data-placement="top" title="Hapus Pekerjaan" >
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                 @else
                 <tr>
                     <td colspan="5" class="danger" style="text-align: center">Daftar Pekerjaan Kosong...</td>
                 </tr>
                 @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.alert_modal')
@stop

@section('jsload')
{{ HTML::script('assets/js/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.js') }}
@stop

@section('jsorjquery')
<script type="text/javascript">
    var NamaPekerjaan = '<div class="form-group NamaPekerjaan">\
                            <div style="margin-top: 10px;" class="col-sm-12">\
                                <input placeholder="Nama Pekerjaan" class="form-control NamePekerjaan" name="data-cari" type="text" autocomplete="off" />\
                            </div>\
                        </div>';
    var TanggalPekerjaan = '<div class="form-group TanggalPekerjaan">\
                            <div style="margin-top: 10px;" class="col-sm-12">\
                                <div class="input-group">\
                                    <input placeholder="Tanggal Pekerjaan" class="form-control tanggalCari" name="data-cari" type="text" autocomplete="off" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>\
                                </div>\
                            </div>\
                        </div>';
    var NamaRekanan = '<div class="form-group NamaRekanan">\
                            <div style="margin-top: 10px;" class="col-sm-12">\
                                <input placeholder="Rekanan" class="form-control NameRekanan" name="data-cari" type="text" autocomplete="off" />\
                            </div>\
                        </div>';
    function notifikasiHapus(keteranganf, id_pekerjaan){
        var url = "{{ URL::to('pekerjaan/hapus/"+id_pekerjaan+"') }}";
        $("#ketHapus").html('<div style="text-align:center;">Loading ...</div>');
        $.ajax({
            url: '{{ URL::to("pekerjaan/hapus/info-jumlah-pembayaran/'+id_pekerjaan+'") }}',
            dataType: 'json',
            type: 'Get',
            success: function(data){
                if(data.jml == 0){
                    $("#ketHapus").html('Apakah anda yakin ingin menghapus <b>'+keteranganf+'</b> dari daftar pekerjaan ?');
                }else{
                    $("#ketHapus").html('Pekerjaan ini memiliki <b>'+data.jml+'</b> data Pembayaran, data Pembayaran juga akan ikut terhapus.<br/> \n\
                    Apakah anda yakin ingin menghapus <b>'+keteranganf+'</b> dari daftar pekerjaan ?');
                }
                
                                        
                                        
                $(".foot-modal").html('<a href="'+url+'" type="button" class="btn btn-primary" >OK</a>\n\
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>');

            }
        });
        $('#myModal').modal();
    }
    function fungsibaris(id_pekerjaan,NamaPekerjaan, tanggalKontrak, PersentasePekerjaan, NamaPerusahaan){
    var baris = '<tr>\
                <td>'+NamaPekerjaan+'</td>\
                <td>'+tanggalKontrak+'</td>\
                <td>'+PersentasePekerjaan+'%</td>\
                <td>'+NamaPerusahaan+'</td>\n\
                <td style="text-align: center">\n\
                        <div class="btn-group">\n\
                        <a class="btn btn-info tbl-detail" href="{{ URL::to("pekerjaan/details-pekerjaan/'+id_pekerjaan+'") }}" rel="tooltip" data-placement="top" title="Detail Pekerjaan">\
                            <i class="fa fa-archive"></i>\n\
                        </a>\n\
                        <a class="btn btn-danger tbl-hapus" onclick="notifikasiHapus(&quot;'+NamaPekerjaan+'&quot;, '+id_pekerjaan+')" data-toggle="modal" rel="tooltip" data-placement="top" title="Hapus Pekerjaan" >\
                            <i class="fa fa-trash-o"></i>\
                        </a>\n\
                    </div>\
                    </td>\
                </tr>';
    return baris;
    }
    
    function caridatapekerjaan(){
        var idJenisPajak = '{{ $id_JenisPajak }}';
        var data = $('[name="data-cari" ]').val();
        var cariberdasarkan = $('[name="cari-berdasarkan"]').val();
        $().ready(function(){
            $.ajax({
                type: 'POST',
                url: '{{ URL::to("pekerjaan/cari-data-pekerjaan") }}',
                data: {'data' : data, 'berdasarkan': cariberdasarkan, 'id_JenisPajak': idJenisPajak},
                beforeSend: function(){
                    $('.tabel-daftar-pekerjaan tbody').empty().append('<tr><td colspan="5" style="text-align:center;" class="info" style> Memuat Data ....</td></tr>');
                },
                success: function(data){
                    if(data.error){
                        $('.for-alert-cari-pekerjaan').empty();
                        alert_message('danger', data.error, '.for-alert-cari-pekerjaan');  
                        $('html, body').animate({scrollTop:0}, 'slow');
                        $('.tabel-daftar-pekerjaan tbody').empty().append('<tr><td colspan="5" style="text-align:center;" class="danger" style> Pencarian Error </td></tr>');
                    }else{
                        $('.for-alert-cari-pekerjaan').empty();
                        $('.tabel-daftar-pekerjaan tbody').empty();
                        if(data.length){
                            $.each(data, function(i, item){
                                var baris = fungsibaris(item.id_pekerjaan, item.NamaPekerjaan, item.tanggalKontrak, item.PersentasePekerjaan, item.NamaPerusahaan)
                                $('.tabel-daftar-pekerjaan tbody').append(baris);
                            });
                            $('a[rel="tooltip"]').tooltip();
                        }else{
                            $('.tabel-daftar-pekerjaan tbody').append('<tr><td colspan="5" style="text-align:center;" class="danger" style> Data Kosong..</td></tr>');
                        } 
                    }
                    
                }
            });
        })
    }
    
    $(document).ready(function(){
       $('.cari-berdasarkan').on('change', function(){
            var value = $(this).val();
            if( value == '1'){
                $('.TanggalPekerjaan').remove();
                $('.NamaRekanan').remove();
                $('.tombol-cari').before(NamaPekerjaan);
            }else if( value == '2'){
                $('.NamaPekerjaan').remove();
                $('.NamaRekanan').remove();
                $('.tombol-cari').before(TanggalPekerjaan);
                $('.tanggalCari').datepicker({
                    dateFormat: 'dd-mm-yy',
                    changeMonth: true,
                    changeYear: true,
                    firstDay: 1,
                    numberOfMonths: 1
                });
            }else if( value == '3'){
                $('.NamaPekerjaan').remove();
                $('.TanggalPekerjaan').remove();
                $('.tombol-cari').before(NamaRekanan); 
            }else{
                $('.NamaPekerjaan').remove();
                $('.TanggalPekerjaan').remove();
                $('.NamaRekanan').remove();
            }
        });
        
        $('.tbl-batal-cari').on('click', function(){
            $('.NamaPekerjaan').remove();
            $('.TanggalPekerjaan').remove();
            $('.NamaRekanan').remove();
            $('.pilih-cari').attr('selected', 'selected');
        });
        
    });

</script>
@stop