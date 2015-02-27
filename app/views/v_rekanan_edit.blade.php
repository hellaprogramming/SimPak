<form id="edit-rekanan">
    <input type="hidden" name="id" value="{{ $datas->id_rekanan }}" />
    <div class="form-group">
        <label class="col-sm-4 control-label">Nama Wajib Pajak / Rekanan</label>
        <div class="col-sm-8">
            <input value="{{ $datas->NamaPerusahaan }}" class="form-control" name="NamaPerusahaan" id="namawp" type="text" autocomplete="off" />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">NPWP</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $datas->NPWP }}" class="form-control" name="NPWP" id="npwp-edit" autocomplete="off" type="text"  />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Direktur</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $datas->NamaDirektur }}" class="form-control" name="NamaDirektur" id="direktur" autocomplete="off" type="text"  />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <textarea class="form-control" autocomplete="off" name="Alamat" id="alamat"  >{{ $datas->Alamat }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <button style="margin-top: 10px;" type="submit" class="btn btn-primary" ><i class="fa fa-edit fa-1x"></i> UBAH</button>
        <a style="margin-top: 10px;" class="btn btn-default tbl-batal-edit" onclick="" >BATAL</a>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $('#edit-rekanan').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("profil/update-rekanan") }}',
                data: $(this).serialize(),
                success: function(data){
                    if(data.error){
                        $('.for-alert').empty()
                        alert_message('danger', data.error, '.for-alert');  
                    }else{
                        data.success;
                        $(location).attr('href','{{ URL::to("profil/rekanan") }}');
//                        alert_message('success', data.success, '.for-alert');  
//                        $('#rekanan-edit').empty();
//                        $('#rekanan-data').show();
//                        $('#tabel-rekanan').load('{{ URL::to("profil/rekanan") }} #bodi-tabel-rekanan');
                    }    
                }
            });
        });
        
        $("#npwp-edit").iMask({
            type : 'fixed',
            mask : '99.999.999.9-999.999'
        });
    
        $('.tbl-batal-edit').on('click', function(){
            $('.for-alert').empty();
            $('#rekanan-edit').empty();
            $('form')[0].reset();
            $('#rekanan-data').show();
        });
    
    });
</script>