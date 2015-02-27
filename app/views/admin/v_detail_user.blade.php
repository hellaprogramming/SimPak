<div id="modal-detailUser" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="fa fa-user fa-fw"></i> Detail User</h4>
            </div>
            <form id="tambah-pembayaran">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-lg-4 control-label">Nama</label>
                            <div class="col-lg-8">{{ $data->Nama }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-lg-4 control-label">No. Telp</label>
                            <div class="col-lg-8">{{ $data->Telepon }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-lg-4 control-label">Email</label>
                            <div class="col-lg-8">{{ $data->Email }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-lg-4 control-label">Alamat</label>
                            <div class="col-lg-8">{{ $data->Alamat }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-lg-4 control-label">Username</label>
                            <div class="col-lg-8">{{ $data->username }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-lg-4 control-label">Jenis Pengguna</label>
                            <div class="col-lg-8">{{ $data->jenis_user }}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger"><i class="fa fa-sign-out"></i> TUTUP</button>
                </div>
            </form>
        </div>
    </div>
</div>