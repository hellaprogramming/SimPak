<div class="modal fade" id="modal-editMasterPajak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update-dataPajak">
                <div class="modal-body">
                    <div class="row">
                            <!--isi modal-->
                        <div class="form-group">
                            <label style="margin-top: -10px;" class="col-sm-12 control-label"><h3 class="page-header"><i class="fa fa-file-text fa-1x"></i> Edit Data Pajak</label>
                        </div>
                        <div class="form-group">
                            <div class=" col-sm-12 for-alert"><!-- for alert --></div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Pajak</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input type="hidden" name="idjenissetoran" value="{{ $data->id_JenisSetoran }}" />
                                <input type="hidden" name="idjenispajak" value="{{ $data->KodeJenisPajak }}" />
                                <input class="form-control" disabled type="text" autocomplete="off" value="{{ $data->NamaPajak }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Setoran Pajak</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input class="form-control" disabled autocomplete="off" type="text" value="{{ $data->NamaSetoran }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Kode Jenis Pajak</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input class="form-control" maxlength="6" name="kodejenispajak" autocomplete="off" type="text" value="{{ $data->KodeJenisPajak }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Kode Jenis Setoran</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input class="form-control" maxlength="3" name="kodejenissetoran" autocomplete="off" type="text" value="{{ $data->KodeJenisSetoran }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Tarif</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    {? $Tarif = $data->Tarif * 100 ?}
                                    <input class="form-control" name="tarif" autocomplete="off" type="text" value="{{ $Tarif }}" />
                                    <span class="input-group-addon">%</span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-edit fa-fw"></i> UPDATE</button>
                    <button class="btn btn-default" data-dismiss="modal">BATAL</button>
                </div>
            </form>
        </div>
        <!--modal-content--> 
    </div>
    <!--modal-dialog--> 
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#update-dataPajak').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("data-pajak/update-pajak") }}',
                data: $(this).serialize()
            }).done(function(data){
                if(data.error){
                    $('.for-alert').empty();
                    alert_message('danger', data.error, '.for-alert');
                    $('html, #ModalTambahUser').animate({scrollTop:0}, 'slow');
                }else{
                    $(location).attr('href','{{ URL::to("data-pajak") }}');
                }
            });
        });
    })
</script>