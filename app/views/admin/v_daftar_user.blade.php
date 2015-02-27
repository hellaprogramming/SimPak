@extends('layouts.master')
@section('title','Daftar User')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-users fa-1x"></i> Daftar User</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @include('layouts.alert')
        <button class="btn btn-primary" onclick="modalTambahUser()"><i class="fa fa-plus-circle fa"></i> Tambah User</button>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Jenis User</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {? $no = 1 ?}
                @foreach($data as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->Nama }}</td>
                    <td>{{ $data->jenis_user }}</td>
                    <td>{{ $data->Email }}</td>
                    <td class="tultip" style="text-align: center;">
                        <div class="btn-group">
                        @if( $data->id != Auth::user()->id )
                            @if( $data->jenis_user == "bendahara_pengeluaran")
                            <a type="button" class="btn btn-primary" onclick="notifikasiReset('{{ $data->username }}', '{{ $data->id }}')"
                               rel="tooltip" data-placement="top" title="Reset Password">
                                <i class="fa fa-refresh" ></i>
                            </a>
                            <a type="button" class="btn btn-info" onclick="detailUser('{{ $data->id }}')"
                               rel="tooltip" data-placement="top" title="Detail User">
                                <i class="fa fa-archive"></i>
                            </a>
                            @else
                            <a type="button" class="btn btn-primary" onclick="notifikasiReset('{{ $data->username }}', '{{ $data->id }}')"
                               rel="tooltip" data-placement="top" title="Reset Password">
                                <i class="fa fa-refresh" ></i>
                            </a>
                            <a type="button" class="btn btn-info" onclick="detailUser('{{ $data->id }}')"
                               rel="tooltip" data-placement="top" title="Detail User">
                                <i class="fa fa-archive"></i>
                            </a>
                            <a type="button" class="btn btn-danger" onclick="notifikasiHapus('{{ $data->username }}', '{{ $data->id_pegawai }}')"
                               rel="tooltip" data-placement="top" title="Hapus User">
                                <i class="fa fa-times"></i>
                            </a>
                            @endif
                        @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layouts.alert_modal')
<!--start modal tambah user-->
<div class="modal fade" id="ModalTambahUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="tambah-user">
                <div class="modal-body">
                    <div class="row">
                            <!--isi modal-->
                        <div class="form-group">
                            <label style="margin-top: -10px;" class="col-sm-12 control-label"><h3 class="page-header"><i class="fa fa-user fa-1x"></i> Tambah User</h3></label>
                        </div>
                        <div class="form-group">
                            <div class=" col-sm-12 for-alert"><!-- for alert --></div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input class="form-control" name="username" type="text" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input class="form-control" name="email" autocomplete="off" type="text"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis User</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <select class="form-control" name="jenisuser">
                                    <option value="">- Pilih Jenis User</option>
                                    <option value="super_user">Super User (Admin)</option>
                                    <option value="bendahara_pembantu">Bendahara Pembantu</option>
                                    <!--<option value="bendahara_pengeluaran">Bendahara Pengeluaran</option>-->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input class="form-control" name="nama" autocomplete="off" type="text"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label"></label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <label class="radio-inline"><input type="radio" name="npwpX" value="1"> memiliki NPWP</label>
                                <label class="radio-inline"><input type="radio" name="npwpX" value="0" checked> tidak memiliki NPWP</label>
                            </div>
                        </div>    
                        <div class="form-group sampulNPWP">
                            <!--untuk npwp-->
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">NIP</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input class="form-control" name="nip" maxlength="18" autocomplete="off" type="text"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Telepon</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input class="form-control" name="telepon" autocomplete="off" type="text"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <textarea class="form-control" name="alamat"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle fa-fw"></i>TAMBAH</button>
                    <button class="btn btn-default" data-dismiss="modal">BATAL</button>
                </div>
            </form>
        </div>
        <!--modal-content--> 
    </div>
    <!--modal-dialog--> 
</div>
<!--end modal tambah user-->
<div class="modal-detailUser">
    <!--untuk modal detail user-->
</div>
@stop

@section('jsorjquery')
<script type="text/javascript">
    function notifikasiReset(keteranganf, id_user){
        var url = "{{ URL::to('daftar-user/reset-password/"+id_user+"') }}";
        $("#ketHapus").html('Apakah Anda Ingin Mereset Password dari username <b>'+keteranganf+'</b> ?');
        $(".foot-modal").html('<a href="'+url+'" type="button" class="btn btn-primary">OK</a>\n\
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>');
        $('#myModal').modal();
    }
    
    function detailUser(idUser){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("daftar-user/detail-user/'+idUser+'") }}',
                success: function(html){
                    $(".modal-detailUser").empty();
                    $(".modal-detailUser").show().html(html);
                    $('#modal-detailUser').modal();                
                }
            });
        });
    }
    
    function notifikasiHapus(keteranganf, id_user){
        var url = "{{ URL::to('daftar-user/hapus-user/"+id_user+"+"+keteranganf+"') }}";
        $("#ketHapus").html('Apakah Anda Ingin Menghapus <b>'+keteranganf+'</b> dari daftar user ?');
        $(".foot-modal").html('<a href='+url+' type="button" class="btn btn-primary">OK</a>\n\
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>');
        $('#myModal').modal();
    }
    function modalTambahUser(){
        $('#ModalTambahUser').modal();
    }
    $(document).ready(function(){
        $('input[name="npwpX"]').on('change',function(){
            if( $(this).val() == 0){
                $('.sampulNPWP').empty();
            }else if($(this).val() == 1){
                $('.sampulNPWP').append('<label style="margin-top: 10px;" class="col-sm-4 control-label">NPWP</label>\
                            <div class="col-sm-8" style="margin-top: 10px;">\
                                <input class="form-control npwp1" name="npwp" maxlength="20" autocomplete="off" type="text"  />\
                            </div>');
                $(".npwp1").iMask({
                    type : 'fixed',
                    mask : '99.999.999.9-999.999'
                });
            }
        })
        
        $('#tambah-user').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("daftar-user/tambah-user") }}',
                data: $(this).serialize()
            }).done(function(data){
                if(data.error){
                    $('.for-alert').empty();
                    alert_message('danger', data.error, '.for-alert');
                    $('html, #ModalTambahUser').animate({scrollTop:0}, 'slow');
                }else{
                    $(location).attr('href','{{ URL::to("daftar-user") }}');
                }
            });
        });
    })
</script>
@stop