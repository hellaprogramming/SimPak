@extends('layouts.master')
@section('title', 'Tambah Pekerjaan')
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
        <h1 class="page-header"><i class="fa fa-archive fa-1x"></i> {{ $page_header }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <h3> Masukan Data Pekerjaan</h3>
        <div class="for-alert-tambah-pekerjaan"></div>
        <div class="col-md-9 " id="rekanan-data">
            <!--form pekerjaan start-->
            <form id="tambah-pekerjaan">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Tanggal Pekerjaan</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" name="jenis_pajak" value="{{ $page_header }}" />
                            <input  class="form-control" name="TanggalKontrak" id="tanggalKontrak" type="text" autocomplete="off" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="form-insert-kontrak">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Pekerjaan</label>
                    <div style="margin-top: 10px;" class="col-sm-8">
                        <input  class="form-control" type="text" name="NamaPekerjaan" id="namaPekerjaan" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis Setoran</label>
                    <div class="col-sm-8" style="margin-top: 10px;">
                        <select class="form-control" id="pilihan-pajak" name="pilihan-jenis-setoran">
                            <option value="" id="pilih-pajak" selected>Pilihan Kategori Pajak</option>
                            <optgroup label="{{ $jenis_pajak }}">
                                @foreach($kategori as $data)
                                @if($data->id != 1)
                                <option value="{{ $data->id_JenisSetoran }}">{{ $data->NamaSetoran }}</option>
                                @elseif($data->id == 1)
                                <option value="1">PPh Pasal 22 Industri/Eksportir</option>
                                <option value="2">PPh Pasal 22 Bendaharawan/Badan Tertentu Yang Ditunjuk</option>
                                {? break ?}
                                @endif
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                @if($jenis_pajak == 'PPh Pasal 4 ayat(2) Jasa Konstruksi')
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label">Kategori Pelaksana</label>
                    <div class="col-sm-8" style="margin-top: 10px;">
                        <select class="form-control" id="pilihan-pajak" name="pilihan-kategori-pelaksana">
                            <option value="" id="pilih-pelaksana" selected>Pilihan Kategori Pelaksana</option>
                            <optgroup label="Kategori">
                                <option value="1">Perencana Konstruksi</option>
                                <option value="2">Pelaksana Konstruksi</option>
                                <option value="3">Pengawas Konstruksi</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label">Nilai Pekerjaan</label>
                    <div class="col-sm-8" style="margin-top: 10px;">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span><input class="form-control" id="nilaiKontrak" onKeyup="tambahKoma('nilaiKontrak')" autocomplete="off" type="text" style="text-align: right" />
                            <input type="hidden" name="NilaiKontrak" id="nilaiKontrak2" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label"></label>
                    <div class="col-sm-8" style="margin-top: 10px;">
                        <label class="radio-inline"><input type="radio" name="MetodeHitung" value="1"> include pajak</label>
                        <label class="radio-inline"><input type="radio" name="MetodeHitung" value="0"> tidak include pajak</label>
                    </div>
                </div>
                <!--form pekerjaan end -->
                <!--form rekanan start -->
                <div class="form-group">
                    <h4 style="margin-top: 30px;" class="col-sm-12 control-label page-header">Rekanan / Wajib Pajak</h4>
                </div>
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Rekanan</label>
                    <div style="margin-top: 10px;" class="col-sm-8">
                        <input class="form-control" name="NamaPerusahaan" id="namaPerusahaan" type="text" autocomplete="off" />
                        <input class="form-control" name="id_rekanan" id="id_rekanan" type="hidden"/>
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label">NPWP</label>
                    <div class="col-sm-8" style="margin-top: 10px;">
                        <input class="form-control" id="npwp" readonly autocomplete="off" type="text" maxlength="20"  />
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Direktur</label>
                    <div class="col-sm-8" style="margin-top: 10px;">
                        <input  class="form-control" readonly id="direktur" autocomplete="off" type="text"  />
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8" style="margin-top: 10px;">
                        <textarea class="form-control" autocomplete="off" readonly id="alamat"  ></textarea>
                    </div>
                </div>
                <!--form rekanan end-->
                <div class="form-group tultip">
                    <button style="margin-top: 10px;" type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o fa-1x"></i> SIMPAN</button>
                    <a style="margin-top: 10px;" class="btn btn-default tbl-batal-form" onclick="" >BATAL</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('jsload')
{{ HTML::script('assets/js/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.js') }}
@stop

@section('jsorjquery')
<script type="text/javascript">
    function kurensi(nilai){
        bk = nilai.replace(/[^\d]/g,"");
        ck="";
        panjangk = bk.length;
        j = 0;
        for(i = panjangk; i > 0; i--){
            j = j + 1;
            if(((j % 3) == 1) && (j != 1)){
                ck = bk.substr(i-1, 1)+"."+ck;
                xk = bk;
            }else{
                ck = bk.substr(i-1, 1)+ck;
                xk = bk;
            }
        }
        return ck;
    }
    function tambahKoma(id){
        ttm = document.getElementById(id).value;
        strtt = ttm.toString();
        kttm = kurensi(strtt);
        
        document.getElementById(id).value = kttm;
    }
    $(document).ready(function(){
        $('#tanggalKontrak').datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            firstDay: 1,
            numberOfMonths: 1
        });
        
        $('#nilaiKontrak').on('keyup', function(){
            var nilai = $(this).val().toString();
            nilai = nilai.replace(/[^\d]/g,"");
            $('#nilaiKontrak2').val(nilai);
        });
        
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
                        mapped[item.id_rekanan]['direktur'] = item.NamaDirektur;
                        mapped[item.id_rekanan]['alamat'] = item.Alamat;
                        mapped[item.id_rekanan]['id'] = item.id_rekanan;
                    });
                    $.each(mapped, function (i, item){
                        labels.push(item);
                    });
                    
                    response(labels);
                }
            });
        };
        $('#namaPerusahaan').autocomplete({
            minLength: 1,
            source: rekanan,
            select: function(event, ui){
                $('#namaPerusahaan').val(ui.item.label);
                $('#npwp').val(ui.item.npwp);
                $('#direktur').val(ui.item.direktur);
                $('#alamat').val(ui.item.alamat);
                $('#id_rekanan').val(ui.item.id);    
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item){
            return $("<li>")
            .append("<a>"+item.label+"<br><font style='font-size:8pt'>"+item.npwp+"</font></a>")
            .appendTo( ul );
        };
        $('#tambah-pekerjaan').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("pekerjaan/tambah-pekerjaan") }}',
                data: $(this).serialize()
            }).done(function(data){
                if(data.error){
                    $('.for-alert-tambah-pekerjaan').empty();
                    alert_message('danger', data.error, '.for-alert-tambah-pekerjaan');  
                    $('html, body').animate({scrollTop:0}, 'slow');
                }else{
                    $('.for-alert-tambah-pekerjaan').empty();
                    alert_message('success', data.success, '.for-alert-tambah-pekerjaan');
                    $('#id_rekanan').val('');
                    $('form')[0].reset();
                    $('html, body').animate({scrollTop:0}, 'slow');
                }
            });
        });
        
        $('.tbl-batal-form').on('click', function(){
            $('.for-alert-tambah-pekerjaan').empty();
            $('form')[0].reset();
            $('#id_rekanan').val('');
            $('html, body').animate({scrollTop:85}, 'slow');
        });
    });
</script>
@stop