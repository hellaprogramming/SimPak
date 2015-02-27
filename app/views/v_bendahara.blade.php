@extends('layouts.master')
@section('title', 'Profil Bendahara')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header tultip"><i class="fa fa-user fa-1x"></i> Profil Bendahara <a class="btn btn-primary tbl-edit" onclick="editBendahara('{{ $db->id_pegawai }}')" rel="tooltip" data-placement="top" title="Edit Bendahara"><i class="fa fa-edit fa-fw"></i></a></h1>
    </div>
</div>
<div class="row">
    <div class="for-alert"></div>
    <div class="col-md-8 " id="bendahara-data">
        <div id="bendahara-form">
            <div class="form-group">
                <label class="col-sm-4 control-label">NPWP Dinas</label>
                <div class="col-sm-8">
                    <input value="{{ $db->NpwpDinas }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $db->Nama }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">NIP</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $db->NIP }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <textarea class="form-control" disabled="">{{ $db->Alamat }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">No. Telepon</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $db->Telepon }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $db->Email }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">NPWP Penandatangan</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $db->Npwp }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8" id="bendahara-edit">
        
    </div>
</div>
@stop

@section('jsorjquery')
<script type="text/javascript">
    function editBendahara(idBendahara){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("profil/edit-bendahara/'+idBendahara+'") }}',
                success: function(html){
                    $('.for-alert').empty();
                    $('.tbl-edit').hide();
                    $("#bendahara-data").hide();
                    $("#bendahara-edit").html(html);
                }
            });
        });
        
    }
</script>
@stop
