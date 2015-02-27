@extends('layouts.master')
@section('title', 'Profile Anda')
@section('content')
<div class="row">
    <div class="col-lg-12" >
        <h1 class="page-header tultip"><i class="fa fa-user fa-1x"></i> Profile Anda <a class="btn btn-primary tbl-edit" onclick="getDataUser('{{ Auth::user()->id }}')" rel="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit fa-fw"></i></a></h1>
    </div>
</div>
<div class="row">
    <div class=" col-lg-12 for-alert">@include('layouts.alert')</div>
    <div class="col-md-8 col-md-offset-2" id="user-data">
            <div class="form-group">
                <label class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-8">
                    <input value="{{ $data->Nama }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $data->Email }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">NIP</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $data->NIP }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">No. Telepon</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $data->Telepon }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <textarea class="form-control" disabled="">{{ $data->Alamat}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Username</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ Auth::user()->username }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis Pengguna</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ Auth::user()->jenis_user }}" class="form-control"  type="text"  disabled />
                </div>
            </div>
    </div>
    <div class="col-md-8 col-md-offset-2" id="user-edit">
        
    </div>
</div>
@stop

@section('jsorjquery')
<script type="text/javascript">
    function getDataUser(idUser){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("user/edit-user/'+idUser+'") }}',
                success: function(html){
                    $("#user-data").hide();
                    $("#user-edit").html(html);
                    $('html, body').animate({scrollTop:100}, 'slow');
                    $('.tbl-edit').hide();
                }
            });
        });
    }
</script>
@stop