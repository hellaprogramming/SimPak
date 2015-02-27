@extends('layouts.master')
@section('title', 'Ganti Password')
@section('content')
<div class="row">
    <div class="col-md-7 col-md-offset-2" style="margin-top: 100px">
        @include('layouts.alert')
        <div class="login-panel panel panel-default" style="margin-top: 5px">
            <div class="panel-heading">
                <h3 class="panel-title">GANTI PASSWORD</h3>
            </div>
            <div class="panel-body">
                <form action="{{ URL::to('user/proses-ganti-password') }}" method="POST">
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Masukan Password Lama</label>
                        <div class="col-sm-7">
                            <input  class="form-control" name="PasswordLama" type="password" autocomplete="off" />
                            <input type="hidden" name="hashed" value="{{ Auth::user()->password }}" />
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 10px;" class="col-sm-5 control-label">Masukan Password Baru</label>
                        <div style="margin-top: 10px;" class="divpass col-sm-7">
                            <input  class="form-control" name="PasswordBaru" id="pass" type="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 10px;" class="col-sm-5 control-label">Masukan Ulang Password Baru</label>
                        <div style="margin-top: 10px;" class="divpass col-sm-7">
                            <input  class="form-control" id="repass" type="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="margin-top: 10px;text-align: right" class="col-sm-12">
                            <button class="btn btn-success tbl-ganti" disabled>Ganti Password</button>
                        </div>
                    </div>
                </form>                       
            </div>
        </div>
    </div>
</div>
@stop

@section('jsorjquery')
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#repass').on('keyup', function(){
            pass = $('#pass').val();
            repass = $(this).val();
            if( pass == repass && pass != ''){
                $('.divpass').addClass('has-success');
                $('.divpass').removeClass('has-error');
                $('.tbl-ganti').removeAttr('disabled');
            }else{
                $('.divpass').removeClass('has-success');
                $('.divpass').addClass('has-error');
                $('.tbl-ganti').attr('disabled', 'disabled');
            }
        });
        $('#pass').on('keyup', function(){
            pass = $(this).val();
            repass = $('#repass').val();
            if( pass == repass && pass != ''){
                $('.tbl-ganti').removeAttr('disabled');
                $('.divpass').addClass('has-success');
                $('.divpass').removeClass('has-error')
            }else{
                $('.tbl-ganti').attr('disabled', 'disabled');
                $('.divpass').removeClass('has-success');
                $('.divpass').addClass('has-error');
            }
        });
    })
</script>
@stop
