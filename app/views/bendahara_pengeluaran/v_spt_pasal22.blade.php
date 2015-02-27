@extends('layouts.master')
@section('title', 'SPT Masa Pasal 22')
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
        <h1 class="page-header"><i class="fa fa-list fa-1x"></i> SPT Masa Pajak Pasal 22</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6 well">
            <h4 class="control-label col-lg-12">Masa Pajak</h4>
            <form id="cari-masa-pajak">
                <div class="col-lg-12 for-alert-spt22" style="padding-right: 0px;"></div>
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
    <div class="col-lg-6 ket-masa-pajak" style="font-size: 14pt;padding-bottom: 5px;"></div><div class="col-lg-6 tbl-cetak" style="text-align: right;padding-bottom: 5px;"></div>
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 40px;">No.</th>
                    <th style="width: 570px;vertical-align: middle;text-align: center;">Uraian</th>
                    <th style="text-align: center;width: 212px;">Nilai Objek Pajak</th>
                    <th style="vertical-align: middle;text-align: center;">PPh yang Dipotong</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;"><b>1</b></td>
                    <td><b>Badan Usaha Industri/Eksportir</b></td>
                    <td style="text-align: center;" class="IndustriNOP"></td>
                    <td style="text-align: center;" class="IndustriPPh"></td>
                </tr><tr>
                    <td style="text-align: center;"><b>2</b></td>
                    <td><b>Pembelian Barang Oleh Bendaharawan/Badan Tertentu Yang Ditunjuk</b></td>
                    <td style="text-align: center;" class="BendaharaNOP"></td>
                    <td style="text-align: center;" class="BendaharaPPh"></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 52px;"><b>Jumlah</b></td>
                    <td style="text-align: center;" class="jumlah1"></td>
                    <td style="text-align: center;" class="jumlah2"></td>
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
        printFrame($framed, '{{ URL::to("cetak-SPTMasa-pasal22/'+id_rekanan+'&'+masapajak+'") }}');
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
                url: '{{ URL::to("spt-masa/cari-data-pasal22") }}',
                data: $(this).serialize(),
                beforeSend: function(){
                    $('.IndustriNOP').addClass('info').html('Memuat Data...'); $('.IndustriPPh').addClass('info').html('Memuat Data...');
                    $('.BendaharaNOP').addClass('info').html('Memuat Data...'); $('.BendaharaPPh').addClass('info').html('Memuat Data...');
                    $('.jumlah1').addClass('info').html('Memuat Data...'); $('.jumlah2').addClass('info').html('Memuat Data...');
                    $('.tbl-cetak').empty();
                },
                success: function(data){
                    if(data.error){
                        $('.IndustriNOP').removeClass('info').html(''); $('.IndustriPPh').removeClass('info').html('');
                        $('.BendaharaNOP').removeClass('info').html(''); $('.BendaharaPPh').removeClass('info').html('');
                        $('.jumlah1').removeClass('info').html(''); $('.jumlah2').removeClass('info').html('');
                        $('.for-alert-spt22').empty();
                        alert_message('danger', data.error, '.for-alert-spt22');  
                        $('html, body').animate({scrollTop:0}, 'slow');
                    }else{
                        $('.for-alert-spt22').empty();
                        $('.IndustriNOP').removeClass('info').html(''); $('.IndustriPPh').removeClass('info').html('');
                        $('.BendaharaNOP').removeClass('info').html(''); $('.BendaharaPPh').removeClass('info').html('');
                        $('.jumlah1').removeClass('info').html(''); $('.jumlah2').removeClass('info').html('');
                        if(data.IndustriNOP != null && data.IndustriPPh != null){
                            $('.IndustriNOP').html(data.IndustriNOP); $('.IndustriPPh').html(data.IndustriPPh);  
                        }
                        if(data.BendaharaNOP != null && data.BendaharaPPh != null){
                            $('.BendaharaNOP').html(data.BendaharaNOP); $('.BendaharaPPh').html(data.BendaharaPPh);  
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