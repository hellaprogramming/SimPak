<form class="update-user">
    <div class="form-group">
        <label class="col-sm-4 control-label">Nama</label>
        <div class="col-sm-8">
            <input type="hidden" name="id" value="{{ $data->id_pegawai }}" />
            <input value="{{ $data->Nama }}" class="form-control" name="nama" type="text"/>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $data->Email }}" class="form-control" name="email" type="text" />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">NIP</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $data->NIP }}" class="form-control" name="nip" type="text"/>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">No. Telepon</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $data->Telepon }}" class="form-control" name="telepon" type="text"/>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <textarea class="form-control" name="alamat">{{ $data->Alamat}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Username</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $data->username }}" class="form-control"  type="text"  disabled />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis Pengguna</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $data->jenis_user }}" class="form-control"  type="text"  disabled />
        </div>
    </div>
    <div class="form-group">
        <div style="margin-top: 10px;" class="col-sm-4 control-label"></div>
        <div class="col-sm-8" style="margin-top: 10px;text-align: right;">
            <button class="btn btn-primary" type="submit"><i class="fa fa-edit fa-1x"></i> UPDATE</button>
            <a class="btn btn-default tbl-batal">BATAL</a>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $('.update-user').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("user/update-user") }}',
                data: $(this).serialize()
            }).done(function(data){
                if(data.error){
                    $('.for-alert').empty();
                    alert_message('danger', data.error, '.for-alert');
                    $('html, body').animate({scrollTop:0}, 'slow');
                }else{
                    $(location).attr('href','{{ URL::to("user") }}');
                }
            });
        });       
       
        $('.tbl-batal').on('click', function(){
            $('.for-alert').empty();
            $("#user-edit").empty();
            $("#user-data").show();
            $('.tbl-edit').show();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
    });
</script>