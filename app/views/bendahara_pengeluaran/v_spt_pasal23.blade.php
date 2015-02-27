@extends('layouts.master')
@section('title', 'SPT Masa Pasal 23')
@section('styleload')
{{ HTML::style('assets/css/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.css') }}
<style>
    .ui-autocomplete{
        max-height: 150px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    * html .ui-autocomplete{
        height: 150px;
    }
</style>
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-list fa-1x"></i> SPT Masa Pajak Pasal 23</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6 well">
            <h4 class="control-label col-lg-12">Masa Pajak</h4>
            <form id="cari-masa-pajak">
                <div class="col-lg-12 for-alert-spt23" style="padding-right: 0px;"></div>
                <div class="form-group">
                    <label style="margin-top: 5px;" class="col-lg-3 control-label">Rekanan</label>
                    <div class="col-sm-9" style="margin-top: 5px;padding-right: 0px;">
                        <input type="text" autocomplete="off" class="form-control" name="nama_rekanan" id="rekanan"/>
                        <input type="hidden" autocomplete="off" class="form-control" id="id_rekanan" name="id_rekanan"/>
                    </div>
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
    <div class="col-lg-10 ket-masa-pajak" style="font-size: 14pt;padding-bottom: 5px;"></div><div class="col-lg-2 tbl-cetak" style="text-align: right;padding-bottom: 5px;"></div>
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 40px;">No.</th>
                    <th style="vertical-align: middle;text-align: center;">Uraian</th>
                    <th style="text-align: center;">Nilai Objek Pajak</th>
                    <th style="vertical-align: middle;text-align: center;">PPh yang Dipotong</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;"><b>1</b></td>
                    <td><b>Sewa dan Penghasilan lain sehubungan dengan penggunaan harta</b></td>
                    <td style="" class="SewaNOP"></td>
                    <td style="" class="SewaPPh"></td>
                </tr>
                <tr>
                    <td rowspan="2" style="text-align: center;"><b>2</b></td>
                    <td rowspan="2"><b>Jasa Teknik, Jasa Manajemen, Jasa Konsultasi dan jasa lain sesuai<br/>
                            dengan PMK-244/PMK.03/2008:</b>
                    </td>
                    <td colspan="2" style="background: #cccccc;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="background: #cccccc;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 52px;"><b>a.&nbsp;&nbsp;Jasa Teknik</b></td>
                    <td style="" class="Teknik1NOP"></td>
                    <td style="" class="Teknik1PPh"></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 52px;"><b>b.&nbsp;&nbsp;Jasa Manajemen</b></td>
                    <td style="" class="Teknik2NOP"></td>
                    <td style="" class="Teknik2PPh"></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 52px;"><b>b.&nbsp;&nbsp;Jasa Konsultan</b></td>
                    <td style="" class="Teknik3NOP"></td>
                    <td style="" class="Teknik3PPh"></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 52px;background: #CCCCCC"><b>Jumlah</b></td>
                    <td style="" class="jumlah1"></td>
                    <td style="" class="jumlah2"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<iframe id="print-report" frameborder="0" marginheight="0" marginwidth="0" width="0" height="0"></iframe>
@stop

@section('jsload')
{{ HTML::script('assets/js/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.js') }}
@stop

@section('jsorjquery')
<script type="text/javascript">
    var $framed = $('#print-report');
    var printFrame = function($frame, url) {
        $frame.attr('src', url);
        $frame.load(function(){
            this.contentWindow.focus();
            this.contentWindow.print();
        });
     };
    function cetak(id_rekanan, masapajak){
        printFrame($framed, '{{ URL::to("cetak-SPTMasa-pasal23/'+id_rekanan+'&'+masapajak+'") }}');
        return false;
    };
    
    $(document).ready(function(){
        var rekanan = function(request, response){
            $.ajax({
                url: '{{ URL::to("pekerjaan/json-cari-rekanan") }}',
                dataType: 'json',
                type: 'Get',
                data: {
                    term: request.term
                },
                success: function(data){
                    var labels = [];
                    var mapped = {};
                    $.each(data, function (i, item){
                        var data = item.NamaPerusahaan;
                        mapped[item.id_rekanan] = [];
                        mapped[item.id_rekanan]['label'] = item.NamaPerusahaan;
                        mapped[item.id_rekanan]['npwp'] = item.NPWP;
                        mapped[item.id_rekanan]['id'] = item.id_rekanan;
                    });
                    $.each(mapped, function (i, item){
                        labels.push(item);
                    });
                    response(labels);
                }
            });
        };
        
        $('#rekanan').autocomplete({
            minLength: 1,
            source: rekanan,
            select: function(event, ui){
                $('#rekanan').val(ui.item.label);
                $('#id_rekanan').val(ui.item.id);    
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item){
            return $("<li>")
            .append("<a>"+item.label+"<br><font style='font-size:8pt'>"+item.npwp+"</font></a>")
            .appendTo( ul );
        };
        
        $('#cari-masa-pajak').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ URL::to("spt-masa/cari-data-pasal23") }}',
                data: $(this).serialize(),
                beforeSend: function(){
                    $('.SewaNOP').addClass('info').html('Memuat Data...'); $('.SewaPPh').addClass('info').html('Memuat Data...');
                    $('.Teknik1NOP').addClass('info').html('Memuat Data...'); $('.Teknik1PPh').addClass('info').html('Memuat Data...');
                    $('.Teknik2NOP').addClass('info').html('Memuat Data...'); $('.Teknik2PPh').addClass('info').html('Memuat Data...');
                    $('.Teknik3NOP').addClass('info').html('Memuat Data...'); $('.Teknik3PPh').addClass('info').html('Memuat Data...');
                    $('.jumlah1').addClass('info').html('Memuat Data...'); $('.jumlah2').addClass('info').html('Memuat Data...');
                    $('.tbl-cetak').empty();
                },
                success: function(data){
                    if(data.error){
                        $('.SewaNOP').removeClass('info').html(''); $('.SewaPPh').removeClass('info').html('');
                        $('.Teknik1NOP').removeClass('info').html(''); $('.Teknik1PPh').removeClass('info').html('');
                        $('.Teknik2NOP').removeClass('info').html(''); $('.Teknik2PPh').removeClass('info').html('');
                        $('.Teknik3NOP').removeClass('info').html(''); $('.Teknik3PPh').removeClass('info').html('');
                        $('.jumlah1').removeClass('info').html(''); $('.jumlah2').removeClass('info').html('');
                        $('.for-alert-spt23').empty();
                        alert_message('danger', data.error, '.for-alert-spt23');  
                        $('html, body').animate({scrollTop:0}, 'slow');
                    }else{
                        $('.for-alert-spt23').empty();
                        $('.SewaNOP').removeClass('info').html(''); $('.SewaPPh').removeClass('info').html('');
                        $('.Teknik1NOP').removeClass('info').html(''); $('.Teknik1PPh').removeClass('info').html('');
                        $('.Teknik2NOP').removeClass('info').html(''); $('.Teknik2PPh').removeClass('info').html('');
                        $('.Teknik3NOP').removeClass('info').html(''); $('.Teknik3PPh').removeClass('info').html('');
                        $('.jumlah1').removeClass('info').html(''); $('.jumlah2').removeClass('info').html('');
                        if(data.SewaNOP != null && data.SewaPPh != null){
                            $('.SewaNOP').html(data.SewaNOP); $('.SewaPPh').html(data.SewaPPh);  
                        }
                        if(data.Teknik1NOP != null && data.Teknik1PPh != null){
                            $('.Teknik1NOP').html(data.Teknik1NOP); $('.Teknik1PPh').html(data.Teknik1PPh);  
                        }
                        if(data.Teknik2NOP != null && data.Teknik2PPh != null){
                            $('.Teknik2NOP').html(data.Teknik2NOP); $('.Teknik2PPh').html(data.Teknik2PPh);  
                        }
                        if(data.Teknik3NOP != null && data.Teknik3PPh != null){
                            $('.Teknik3NOP').html(data.Teknik3NOP); $('.Teknik3PPh').html(data.Teknik3PPh);  
                        }
                        if(data.JumlahNOP != "0" && data.JumlahPPh != "0"){
                            $('.jumlah1').html(data.JumlahNOP); $('.jumlah2').html(data.JumlahPPh);
                            $('.tbl-cetak').append('<a class="btn btn-success" onclick="cetak( '+data.id_rekanan+', &quot;'+data.bln+'-'+data.thn+'&quot;)"><i class="fa fa-print fa-fw"></i> CETAK</a>');
                        }
                        var ket = '<b>Masa Pajak '+data.bln+'/'+data.thn+' ( '+data.NamaRekanan+' )'+'</b>';
                        $('.ket-masa-pajak').empty().append(ket); 
                    }
                }
            });
        });
    });
</script>
@stop