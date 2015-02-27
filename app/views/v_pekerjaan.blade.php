@extends('layouts.master')
@section('title', 'Halaman Pekerjaan')
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
        <h1 class="page-header"><i class="fa fa-archive fa-1x"></i> Pekerjaan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#pekerjaan1" data-toggle="tab">Tambah Pekerjaan</a></li>
            <li class=""><a href="#pekerjaan2" data-toggle="tab" class="tab-daftar-pekerjaan">Daftar Pekerjaan</a></li>
            <li class=""><a href="#pekerjaan3" data-toggle="tab" class="tab-daftar-pekerjaan-100">Daftar Pekerjaan 100%</a></li>
        </ul>
        <div class="tab-content">
            <!--tab tambah pekerjaan start-->
            <div class="tab-pane fade active in" id="pekerjaan1">
                <h3> Masukan Pekerjaan</h3>
                <div class="for-alert-tambah-pekerjaan"></div>
                <div class="col-md-9 " id="rekanan-data">
                    <!--form pekerjaan start-->
                    <form id="tambah-pekerjaan">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal Pekerjaan</label>
                            <div class="col-sm-8">
                                <div class="input-group">
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
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Pajak</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <select class="form-control" id="pilihan-pajak" name="pilihan-pajak">
                                    <option value="" id="pilih-pajak" selected>Pilihan Pajak</option>
                                    <optgroup label="PPh Pasal 22">
                                        <option value="1">Pengadaan Barang (1,5%)</option>
                                    </optgroup>
                                    <optgroup label="PPh Pasal 23">
                                        <option value="2">PPh Pasal 23 (2%)</option>
                                    </optgroup>
                                    <optgroup label="PPh Pasal 4 ayat(2) Jasa Konstruksi">
                                        <option value="3">Pelaksana Konstruksi: mempunyai kualifikasi usaha kecil (2%)</option>
                                        <option value="4">Pelaksana Konstruksi: mempunyai kualifikasi usaha selain kecil (3%)</option>
                                        <option value="5">Pelaksana Konstruksi: tidak mempunyai kualifikasi usaha(4%)</option>
                                        <option value="6">Perencana/Pengawas Konstruksi: dengan kualifikasi usaha(4%)</option>
                                        <option value="7">Perencana/Pengawas Konstruksi: tanpa kualifikasi usaha(6%)</option>
                                    </optgroup>

                                </select>
                            </div>
                        </div>
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
                                <input class="form-control" name="NPWP" id="npwp" readonly autocomplete="off" type="text" maxlength="20"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Direktur</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input  class="form-control" name="NamaDirektur" readonly id="direktur" autocomplete="off" type="text"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <textarea class="form-control" autocomplete="off" readonly name="Alamat" id="alamat"  ></textarea>
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
            <!--tab tambah pekerjaan end-->
            
            <!--tab daftar pekerjaan start-->
            <div class="tab-pane fade" id="pekerjaan2">
                <div class="for-alert"></div>
                <br/><br/>
                <div class="col-lg-6 well">
                    <h3> Cari Pekerjaan</h3>
                    <div class="form-group">
                        <div class="col-sm-12">
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
                <div class="col-lg-9 detail-pekerjaan">
                    <!--untuk detail pekerjaan-->
                </div>
                <!--tabel daftar pekerjaan start-->
                <div class="col-lg-12" style="padding-left: 0px;">
                    <h3> Daftar Pekerjaan</h3>
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
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--tabel daftar pekerjaan end-->
            </div>
            <!--tab daftar pekerjaan end-->
            
            <!--Tab daftar Pekerjaan 100% start-->
            <div class="tab-pane fade" id="pekerjaan3">
                <div class="for-alert"></div>
                <br/><br/>
                <div class="col-lg-6 well">
                    <h3> Cari Pekerjaan</h3>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select class="form-control cari-berdasarkan" name="cari-berdasarkan-2" ><option value="" class="pilih-cari" selected>Cari Berdasarkan</option><option value="1">Nama Pekerjaan</option><option value="2">Tanggal Pekerjaan</option><option value="3">Rekanan</option></select>
                        </div>
                    </div>

                    <div class="form-group tombol-cari-2">
                        <div style="margin-top: 10px;text-align: right" class="col-sm-12">
                            <button onclick="caridatapekerjaan()" class="btn btn-primary" ><i class="fa fa-search fa-1x"></i> CARI</button>
                            <a class="btn btn-default tbl-batal-cari" >BATAL</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 detail-pekerjaan">
                    <!--untuk detail pekerjaan-->
                </div>
                <!--tabel daftar pekerjaan 100% start-->
                <div class="col-lg-12" style="padding-left: 0px;">
                    <h3> Daftar Pekerjaan</h3>
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
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--tabel daftar pekerjaan 100% end-->
            </div>
            <!--Tab daftar Pekerjaan 100% end-->
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
    var Variabelautocomplete;
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
    
    function autoPencarian(element ,data){
        $(element).autocomplete({
            minLength: 1,
            source: data,
            select: function(event, ui){
                
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item){
            return $("<li>")
            .append("<a>"+item.label+"<br><div>&nbsp;</div></a>")
            .appendTo( ul );
        };
    }
    
    function notifikasiHapus(keteranganf, fungsidelete){
        $("#ketHapus").html('Apakah ingin menghapus <b>'+keteranganf+'</b> dari daftar pekerjaan ?');
        $(".modal-footer").html('<button onclick="'+fungsidelete+'" type="button" class="btn btn-primary" data-dismiss="modal">OK</button>\n\
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>');
        $('#myModal').trigger('show').modal();
    }
    
    function deletePekerjaan(id){
        $().ready(function(){
            $.ajax({
                type:'POST',
                url: '{{ URL::to("pekerjaan/delete-pekerjaan/'+id+'") }}',
                data: $(this).serialize(),
                success: function(data){
                    data.success;
                    $(location).attr('href','{{ URL::to("profil/rekanan") }}');
                }
            });
        });
    }
    
    function tambahKoma(id){
        ttm = document.getElementById(id).value;
        strtt = ttm.toString();
        kttm = kurensi(strtt);
        
        document.getElementById(id).value = kttm;
    }
    
    function fungsibaris(id_pekerjaan,NamaPekerjaan, tanggalKontrak, PersentasePekerjaan, NamaPerusahaan){
        var baris = '<tr>\
                    <td>'+NamaPekerjaan+'</td>\
                    <td>'+tanggalKontrak+'</td>\
                    <td>'+PersentasePekerjaan+'%</td>\
                    <td>'+NamaPerusahaan+'</td>\n\
                    <td style="text-align: center">\n\
                            <a class="btn btn-info tbl-detail" href="{{ URL::to("pekerjaan/details-pekerjaan/'+id_pekerjaan+'") }}" rel="tooltip" data-placement="top" title="Detail Pekerjaan">\
                                <i class="fa fa-archive"></i>\n\
                            </a>\n\
                    <a class="btn btn-danger tbl-hapus" onclick="notifikasiHapus(&quot;'+NamaPekerjaan+'&quot;, &quot;deletePekerjaan('+id_pekerjaan+')&quot;)" data-toggle="modal" rel="tooltip" data-placement="top" title="Hapus Pekerjaan" >\
                                <i class="fa fa-trash-o"></i>\
                            </a>\
                        </td>\
                    </tr>';
        return baris;
    }
    
    function caridatapekerjaan(){
        var abcd = Variabelautocomplete;
        var data = $('[name="data-cari" ]').val();
        var cariberdasarkan = $('[name="cari-berdasarkan"]').val();
        if(Variabelautocomplete == '2'){
             var cariberdasarkan = $('[name="cari-berdasarkan-2"]').val();
        }
        $().ready(function(){
            $.ajax({
                type: 'POST',
                url: '{{ URL::to("pekerjaan/cari-data-pekerjaan") }}',
                data: {'data' : data, 'berdasarkan': cariberdasarkan, 'pekerjaan100orNot': abcd},
                beforeSend: function(){
                    $('.tabel-daftar-pekerjaan tbody').empty().append('<tr><td colspan="5" style="text-align:center;" class="info" style> Memuat Data ....</td></tr>');
                },
                success: function(data){
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
            });
        })
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
        
        var pekerjaan = function(request, response){
            var alamat = '{{ URL::to("pekerjaan/json-cari-nama-pekerjaan") }}';
            if( Variabelautocomplete == '2'){
                alamat = '{{ URL::to("pekerjaan/json-cari-nama-pekerjaan100") }}';
            }
            $.ajax({
                url: alamat,
                dataType: 'json',
                type: 'Get',
                data: {
                    term: request.term
                },
                success: function(data){
                    var labels = [];
                    var mapped = {};
                    $.each(data, function (i, item){
                        var data = item.NamaPekerjaan;
                        mapped[item.id_pekerjaan] = [];
                        mapped[item.id_pekerjaan]['label'] = item.NamaPekerjaan;
                        mapped[item.id_pekerjaan]['NamaPerusahaan'] = item.NamaPerusahaan;
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
        
        $('.tab-daftar-pekerjaan').on('click', function(){
            Variabelautocomplete = '1';
            $('.NamaPekerjaan').remove();
            $('.TanggalPekerjaan').remove();
            $('.NamaRekanan').remove();
            $('.pilih-cari').attr('selected', 'selected');
            $.get('{{ URL::to("pekerjaan/daftar-pekerjaan") }}').done(function(data){
                $('.tabel-daftar-pekerjaan tbody').empty();
                if(data.length){
                    $.each(data, function(i, item){
                        var baris = fungsibaris(item.id_pekerjaan, item.NamaPekerjaan, item.tanggalKontrak, item.PersentasePekerjaan, item.NamaPerusahaan)
                        $('.tabel-daftar-pekerjaan tbody').append(baris);
                    });
                    $('a[rel="tooltip"]').tooltip();
                }else{
                    $('.tabel-daftar-pekerjaan tbody').append('<tr><td colspan="5" class="danger" style="text-align:center">Tidak Ada Data Pekerjaan</td></tr>');
                }
            });
        });
        
        $('.tab-daftar-pekerjaan-100').on('click', function(){
            Variabelautocomplete = '2';
            $('.NamaPekerjaan').remove();
            $('.TanggalPekerjaan').remove();
            $('.NamaRekanan').remove();
            $('.pilih-cari').attr('selected', 'selected');
            $.get('{{ URL::to("pekerjaan/daftar-pekerjaan-100") }}').done(function(data){
                $('.tabel-daftar-pekerjaan tbody').empty();
                if(data.length){
                    $.each(data, function(i, item){
                        var baris = fungsibaris(item.id_pekerjaan, item.NamaPekerjaan, item.tanggalKontrak, item.PersentasePekerjaan, item.NamaPerusahaan)
                        $('.tabel-daftar-pekerjaan tbody').append(baris);
                    });
                    $('a[rel="tooltip"]').tooltip();
                }else{
                    $('.tabel-daftar-pekerjaan tbody').append('<tr><td colspan="5" class="danger" style="text-align:center">Tidak Ada Data Pekerjaan</td></tr>');
                }
            });
        });
        
        $('.cari-berdasarkan').on('change', function(){
            var value = $(this).val();
            if( value == '1'){
                $('.TanggalPekerjaan').remove();
                $('.NamaRekanan').remove();
                if(Variabelautocomplete == '1'){
                   $('.tombol-cari').before(NamaPekerjaan); 
                }else{
                   $('.tombol-cari-2').before(NamaPekerjaan);
                }
                autoPencarian('.NamePekerjaan' , pekerjaan);
            }else if( value == '2'){
                $('.NamaPekerjaan').remove();
                $('.NamaRekanan').remove();
                if(Variabelautocomplete == '1'){
                   $('.tombol-cari').before(TanggalPekerjaan); 
                }else{
                   $('.tombol-cari-2').before(TanggalPekerjaan);
                }
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
                if(Variabelautocomplete == '1'){
                   $('.tombol-cari').before(NamaRekanan); 
                }else{
                   $('.tombol-cari-2').before(NamaRekanan);
                }
                autoPencarian('.NameRekanan' , rekanan);
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