@extends('layouts.master')
@section('title', 'Profil Rekanan')
@section('styleload')
<!-- Page-Level Plugin CSS - Tables -->
{{ HTML::style('assets/css/plugins/dataTables/dataTables.bootstrap.css') }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-users fa-1x"></i> Profil Wajib Pajak/Rekanan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="for-alert">@include('layouts.alert')</div>
    <div class="col-md-8 " id="rekanan-data">
        <form id="insert-rekanan">
            <div class="form-group">
                <label class="col-sm-4 control-label">Nama Wajib Pajak / Rekanan</label>
                <div class="col-sm-8">
                    <input class="form-control" name="NamaPerusahaan" id="namawp" type="text" autocomplete="off" />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">NPWP</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input class="form-control" name="NPWP" id="npwp" autocomplete="off" type="text" maxlength="20"  />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Direktur</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input  class="form-control" name="NamaDirektur" id="direktur" autocomplete="off" type="text"  />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <textarea class="form-control" autocomplete="off" name="Alamat" id="alamat"  ></textarea>
                </div>
            </div>
            <div class="form-group">
                <button style="margin-top: 10px;" type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o fa-1x"></i> SIMPAN</button>
                <a style="margin-top: 10px;" class="btn btn-default tbl-batal" onclick="" >BATAL</a>
            </div>
        </form>
    </div>
    <div class="col-md-8" id="rekanan-edit">
        <!-- area edit data -->
    </div>
</div>

<div class="row">

</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Wajib Pajak/Rekanan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabel-rekanan">
                        <thead>
                            <tr style="/*text-align: center;font-weight: bold;*/">
                                <!--<th>No.</th>-->
                                <th>Nama WP/Rekanan</th>
                                <th>NPWP</th>
                                <th>Direktur</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="bodi-tabel-rekanan">
                        <span style="display: none;">{{ $i = 1 }}</span>
                        @foreach($db as $data)
                        <tr>
                            <!--<td>{{ $i++ }}.</td>-->
                            <td>{{ $data->NamaPerusahaan }}</td>
                            <td>{{ $data->NPWP }}</td>
                            <td>{{ $data->NamaDirektur }}</td>
                            <td>{{ $data->Alamat }}</td>
                            <td class="tultip">
                                <a class="btn btn-info tbl-edit" onclick="getDataEditRekanan('{{ $data->id_rekanan }}')" rel="tooltip" data-placement="top" title="Edit Rekanan"><i class="fa fa-edit"></i></a>
                                @if( $data->id_rekanan != '1' )
                                <a class="btn btn-danger tbl-hapus"  data-toggle="modal" rel="tooltip" onclick="notifikasiHapus('{{ $data->NamaPerusahaan }}', 'deleteRekanan({{ $data->id_rekanan }})')" data-placement="top" title="Hapus Rekanan"><i class="fa fa-trash-o"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.alert_modal')
@stop

@section('jsload')
<!-- Page-Level Plugin Scripts - Tables -->
{{ HTML::script('assets/js/plugins/dataTables/jquery.dataTables.js') }}
{{ HTML::script('assets/js/plugins/dataTables/dataTables.bootstrap.js') }}
@stop

@section('jsorjquery')
<script type="text/javascript">
        
    function getDataEditRekanan(idRekanan){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("profil/data-ubah-rekanan/'+idRekanan+'") }}',
                success: function(html){
                    $('.for-alert').empty();
                    $("#rekanan-data").hide();
                    $('html, body').animate({scrollTop:0}, 'slow');
                    $("#rekanan-edit").show().html(html);
                }
            });
        });
    }
    
    function notifikasiHapus(keteranganf, fungsidelete){
        $('#rekanan-edit').empty();
        $('#rekanan-data').show(); 
        $("#ketHapus").html('Apakah ingin menghapus <b>'+keteranganf+'</b> dari daftar rekanan ?');
        $(".modal-footer").html('<button onclick="'+fungsidelete+'" type="button" class="btn btn-primary" data-dismiss="modal">OK</button>\n\
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>');
        $('#myModal').modal();
    }
    
    function deleteRekanan(id){
        $().ready(function(){
            $.ajax({
                type:'POST',
                url: '{{ URL::to("profil/delete-rekanan/'+id+'") }}',
                data: $(this).serialize(),
                success: function(){
                    $(location).attr('href','{{ URL::to("profil/rekanan") }}');
                    //                    alert_message('success', data.success, '.for-alert'); 
                    //                    $('#tabel-rekanan').load('{{ URL::to("profil/rekanan") }} #bodi-tabel-rekanan');
                    //                    $('html, body').animate({scrollTop:0}, 'slow');
                }
            });
        });
    }
    
    $(document).ready(function(){
        $("#npwp").iMask({
            type : 'fixed',
            mask : '99.999.999.9-999.999'
        });
        $('#tabel-rekanan').dataTable({
            'scrollX': true,
            'ordering':false
        });
        $('.tbl-batal').on('click', function(){
            $('.for-alert').empty()
            $('form')[0].reset();
        });
        
        $('#insert-rekanan').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("profil/tambah-rekanan") }}',
                data: $(this).serialize()
            }).done(function(data){
                if(data.error){
                    $('.for-alert').empty();
                    alert_message('danger', data.error, '.for-alert');
                    $('html, body').animate({scrollTop:0}, 'slow');
                }else{
                  $(location).attr('href','{{ URL::to("profil/rekanan") }}');
                }
            });
        });
    });
</script>
@stop