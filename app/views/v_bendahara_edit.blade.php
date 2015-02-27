<form id="edit-Bendahara">
    <input value="{{ $datas->id_pegawai }}"   type="hidden" name="id" />
    <div class="form-group">
        <label class="col-sm-4 control-label">NPWP Dinas</label>
        <div class="col-sm-8">
            <input value="{{ $datas->NpwpDinas }}" name="NPWP" id="npwp" class="form-control"  type="text"  autocomplete="off" />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $datas->Nama }}" name="Nama" class="form-control"  type="text"  autocomplete="off" />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">NIP</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $datas->NIP }}" name="NIP" class="form-control"  type="text"  autocomplete="off" />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <textarea class="form-control" name="Alamat" >{{ $datas->Alamat }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">No. Telepon</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $datas->Telepon }}" name="Telepon" class="form-control"  type="text"  autocomplete="off" />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $datas->Email }}" name="Email" class="form-control"  type="text"  autocomplete="off" />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">NPWP Penandatangan</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $datas->Npwp }}" name="NPWP2" id="npwp2" class="form-control"  type="text"  autocomplete="off" />
        </div>
    </div>
    <div class="form-group">
        <button style="margin-top: 10px;" type="submit" class="btn btn-primary" ><i class="fa fa-edit fa-1x"></i>UBAH</button>
        <a style="margin-top: 10px;" class="btn btn-default tbl-batal" onclick="" >BATAL</a>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#edit-Bendahara').submit(function(e){
            console.log($(this).serialize());
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("profil/update-bendahara") }}',
                data: $(this).serialize(),
                success: function(data){
                    if(data.error){
                        $('.for-alert').empty();
                        alert_message('danger', data.error, '.for-alert');
                        $('html, body').animate({scrollTop:0}, 'slow');
                    }else{
                        $('.for-alert').empty();
                        alert_message('success', data.success, '.for-alert');
                        $('#bendahara-edit').empty();
                        $('.tbl-edit').show();
                        $('#bendahara-data').load('{{ URL::to("profil/bendahara") }} #bendahara-form').show();
                        $('html, body').animate({scrollTop:0}, 'slow');
                    }
                }
            });
        });
        
        $("#npwp").iMask({
            type : 'fixed',
            mask : '99.999.999.9-999.999'
        });
        
        $("#npwp2").iMask({
            type : 'fixed',
            mask : '99.999.999.9-999.999'
        });
    
        $('.tbl-batal').on('click', function(){
            $('.for-alert').empty();
            $('#bendahara-edit').empty();
            $('.tbl-edit').show();
            $('#bendahara-data').show();
        });
    
    });
</script>