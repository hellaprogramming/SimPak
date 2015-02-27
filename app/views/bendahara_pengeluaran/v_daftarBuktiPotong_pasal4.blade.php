@extends('layouts.master')
@section('title', 'Daftar Bukti Potong Pasal 4 ayat (2)')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-list fa-1x"></i> Daftar Bukti Potong Pasal 4 ayat (2)</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6 well">
            <h4 class="control-label col-lg-12">Masa Pajak</h4>
            <form id="cari-masa-pajak">
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-lg-3 control-label">Periode</label>
                    <div class="col-sm-6" style="margin-top: 10px;padding-right: 0px;">
                        <input type="hidden" name="id" value="3" />
                        <select  class="form-control" name="bulanCari" type="text" autocomplete="off" >
                            <option value="01">Januari</option><option value="02">Februari</option><option value="03">Maret</option>
                            <option value="04">April</option><option value="05">Mei</option><option value="06">Juni</option>
                            <option value="07">Juli</option><option value="08">Agustus</option><option value="09">September</option>
                            <option value="10">Oktober</option><option value="11">Nopember</option><option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="col-sm-3" style="margin-top: 10px;padding-right: 0px;">
                        <select  class="form-control" name="tahunCari" type="text" autocomplete="off" >
                            <option value="2013">2013</option><option value="2014" selected>2014</option><option value="2015">2015</option>
                        </select>
                    </div>
                </div>
                <!--form rekanan end-->
                <div class="form-group tultip">
                    <div class="col-lg-12" style="text-align: right;padding-right: 0px;">
                        <button style="margin-top: 20px;" type="submit" class="btn btn-primary" ><i class="fa fa-search fa-1x"></i> CARI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <br/>
    <div class="col-lg-6 ket-masa-pajak" style="font-size: 14pt;padding-bottom: 5px;"></div><div class="col-lg-6 tbl-cetak" style="text-align: right;padding-bottom: 5px;"></div>
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover tabel-daftar-potong">
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">No.</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">NPWP</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama</th>
                    <th colspan="2"style="text-align: center;">Bukti Pemotongan/Pemungutan</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">Nilai Obyek<br/>Pajak (Rp)</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">PPh yang Dipotong<br/>/Dipungut (Rp)</th>
                </tr>
                <tr>
                    <th style="text-align: center;">Nomor</th>
                    <th style="text-align: center;">Tanggal</th>
                </tr>
                <tr style="background: #cccccc;">
                    <th style="text-align: center;">(1)</th>
                    <th style="text-align: center;">(2)</th>
                    <th style="text-align: center;">(3)</th>
                    <th style="text-align: center;">(4)</th>
                    <th style="text-align: center;">(5)</th>
                    <th style="text-align: center;">(6)</th>
                    <th style="text-align: center;">(7)</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<iframe id="print-report" frameborder="0" marginheight="0" marginwidth="0" width="0" height="0"></iframe>
@stop

@section('jsorjquery')
<script type="text/javascript">
    function fungsibaris(no, npwp, nama, nomor, tanggal, NilaiObjek, PPh){
        var baris = '<tr>\
                    <td style="text-align:center;">'+no+'</td>\
                    <td>'+npwp+'</td>\
                    <td>'+nama+'</td>\
                    <td style="text-align:center;">'+nomor+'</td>\
                    <td>'+tanggal+'</td>\
                    <td style="text-align:right;">'+NilaiObjek+'</td>\
                    <td style="text-align:right;">'+PPh+'</td>\
                    </tr>';
        return baris;
    }
    var $framed = $('#print-report');
    var printFrame = function($frame, url) {
        $frame.attr('src', url);
        $frame.load(function(){
            this.contentWindow.focus();
            this.contentWindow.print();
        });
     };
    function cetak(id_pasal, masapajak){
        printFrame($framed, '{{ URL::to("cetak-daftar-potong/'+id_pasal+'&'+masapajak+'") }}');
        return false;
    };
    $(document).ready(function(){
        $('#cari-masa-pajak').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ URL::to("daftar-bukti-potong/cari-data") }}',
                data: $(this).serialize(),
                beforeSend: function(){
                    $('.tbl-cetak').empty();
                    $('.tabel-daftar-potong tbody').empty().append('<tr><td colspan="7" style="text-align:center;" class="info" style> Memuat Data ....</td></tr>');
                },
                success: function(data){
                    var ket = '<b>Masa Pajak '+data.bln+'/'+data.thn+'</b>';
                    $('.tabel-daftar-potong tbody').empty();
                    $('.ket-masa-pajak').empty().append(ket);
                    if(data.db.length){
                        $('.tbl-cetak').append('<a class="btn btn-success" onclick="cetak( 3, &quot;'+data.bln+'-'+data.thn+'&quot;)"><i class="fa fa-print fa-fw"></i> CETAK</a>');
                        $.each(data.db, function(i, item){
                            var baris = fungsibaris(i+1, item.NPWP, item.NamaPerusahaan, item.NomorPemotongan, item.TanggalPembayaran, item.NilaiPembayaran, item.NilaiPPh)
                            $('.tabel-daftar-potong tbody').append(baris);
                        });
                    }else{
                        $('.tabel-daftar-potong tbody').append('<tr><td colspan="7" style="text-align:center;" class="danger" style> Data Kosong..</td></tr>');
                    }
                }
            });
        });
    });
</script>
@stop