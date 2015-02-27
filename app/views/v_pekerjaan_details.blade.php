@extends('layouts.master')
@section('title', 'Detail Pekerjaan')
@section('styleload')
{{ HTML::style('assets/css/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.css') }}
<style>
    .ui-autocomplete{
        max-height: 150px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    * html .ui-autocomplete{
        height: 150px;
    }
</style>
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-archive fa-1x"></i> Detail Pekerjaan <a class="btn btn-primary tbl-edit" onclick="getDataEditPekerjaan('{{ $pekerjaan->id_pekerjaan }}', '{{ $pekerjaan->id }}')" rel="tooltip" data-placement="top" title="Edit Pekerjaan"><i class="fa fa-edit fa-fw"></i></a></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="for-alert">@include('layouts.alert')</div>
        <div class="col-lg-8" id="pekerjaan-data">
            <div class="form-group">
                <label class="col-sm-4 control-label">Tanggal Pekerjaan</label>
                <div class="col-sm-8">
                    {? $tanggalKontrak = new \DateTime($pekerjaan->tanggalKontrak) ?}
                    <input value="{{ $tanggalKontrak->format('d-m-Y') }}" class="form-control" readonly type="text" />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Pekerjaan</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $pekerjaan->NamaPekerjaan }}" class="form-control" readonly name="NamaPekerjaan" type="text"/>
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis Pajak</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $pekerjaan->NamaPajak }}" class="form-control" readonly autocomplete="off" type="text"  />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis Setoran</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input value="{{ $pekerjaan->NamaSetoran }}" class="form-control" readonly autocomplete="off" type="text"  />
                </div>
            </div>
            @if($pekerjaan->id == 3)
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Kategori Pelaksana</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    @if($pekerjaan->KategoriPelaksana == 1)
                    <input value="Perencana Konstruksi" class="form-control" readonly autocomplete="off" type="text" />
                    @elseif($pekerjaan->KategoriPelaksana == 2)
                    <input value="Pelaksana Konstruksi" class="form-control" readonly autocomplete="off" type="text" />
                    @elseif($pekerjaan->KategoriPelaksana == 3)
                    <input value="Pengawas Konstruksi" class="form-control" readonly autocomplete="off" type="text" />
                    @endif
                </div>
            </div>
            @endif
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Nilai Pekerjaan</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <div class="input-group">
                        <span class="input-group-addon">Rp.</span>
                        {? $NilaiKontrak = number_format($pekerjaan->NilaiKontrak, 0, ',', '.') ?}
                        <input value="{{ $NilaiKontrak }}" class="form-control" readonly autocomplete="off" type="text"  />
                    </div>
                    @if ($pekerjaan->MetodeHitung == 1)
                    * Harga Termasuk PPN
                    @else
                    ** Harga Tidak Termasuk PPN
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Persentase Pekerjaan</label>
                <div class="col-sm-8" style="margin-top: 10px">
                    <p>
                        <strong>Pekerjaan</strong>
                        <span class="pull-right text-muted"> {{ $pekerjaan->PersentasePekerjaan }}% Complete</span>
                    </p>
                    <div class="progress progress-striped active">        
                        <div class=" progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $pekerjaan->PersentasePekerjaan }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pekerjaan->PersentasePekerjaan }}%">
                            {{ $pekerjaan->PersentasePekerjaan }}% Complete 
                        </div>
                    </div>
                </div>
            </div>

            <!--Data Rekanan-->
            <div class="form-group">
                <h4 style="margin-top: 30px;" class="col-sm-12 control-label page-header">Rekanan / Wajib Pajak</h4>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Rekanan</label>
                <div style="margin-top: 10px;" class="col-sm-8">
                    <input class="form-control" name="NamaPerusahaan" readonly value="{{ $pekerjaan->NamaPerusahaan }}" type="text" autocomplete="off" />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">NPWP</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input class="form-control" name="NPWP" value="{{ $pekerjaan->NPWP }}" readonly autocomplete="off" type="text" maxlength="20"  />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Direktur</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <input  class="form-control" name="NamaDirektur" readonly value="{{ $pekerjaan->NamaDirektur }}" autocomplete="off" type="text"  />
                </div>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-8" style="margin-top: 10px;">
                    <textarea class="form-control" autocomplete="off" readonly name="Alamat" >{{ $pekerjaan->Alamat }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-8" id="pekerjaan-edit">
        <!-- area edit data -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <h4 style="margin-top: 30px;" class="col-sm-12 control-label page-header">Riwayat Pembayaran</h4>
        </div>
        <div class="table-responsive div-responsive">
            <table class="table table-striped table-bordered table-hover tabel-daftar-pembayaran" >
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">Tgl Pembayaran</th>
                        <th style="text-align: center;vertical-align: middle;width: 150px;">Nilai Pembayaran</th>
                        <th style="text-align: center;vertical-align: middle;width: 120px;">Nilai PPh</th>
                        <th style="vertical-align: middle;width: 120px;">Nilai PPN</th>
                        <th style="text-align: center;">Persentase<br/>Pembayaran</th>
                        <th style="text-align: center;vertical-align: middle;">Keterangan<br/>Pembayaran</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($pembayaran))
                        @foreach($pembayaran as $data)
                        {? $TanggalPembayaran = new \DateTime($data->TanggalPembayaran) ?}
                        {? $NilaiPembayaran = number_format($data->NilaiPembayaran, 0, ',', '.') ?}
                        {? $NilaiPPh = number_format($data->NilaiPPh, 0, ',', '.') ?}
                        {? $NilaiPPN = number_format($data->NilaiPPN, 0, ',', '.') ?}
                        <tr>
                            <td style="text-align: center;">{{ $TanggalPembayaran->format('d-m-Y') }}</td>
                            <td style="text-align: right;">{{ $NilaiPembayaran }}</td>
                            <td style="text-align: right;">{{ $NilaiPPh }}</td>
                            <td style="text-align: right;">{{ $NilaiPPN }}</td>
                            <td style="text-align: center;">{{ $data->PersentasePembayaran }}%</td>
                            <td>{{ $data->KetPembayaran }}</td>
                            <td style="text-align:center;">
                                <a class="btn btn-success" onclick="getDataEditPembayaran('{{ $data->id_pembayaran }}')" data-toggle="modal" rel="tooltip" data-placement="top" title="Edit Pembayaran" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" onclick="notifikasiHapus('{{ $TanggalPembayaran->format('d-m-Y') }}', '{{ $data->id_pembayaran }}')" data-toggle="modal" rel="tooltip" data-placement="top" title="Hapus Pembayaran" >
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="danger" style="text-align: center">Belum Terdapat Data Pembayaran ...</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-edit-pembayaran">
    <!--untuk modal edit pembayaran-->
</div>
@include('layouts.alert_modal')
@stop

@section('jsload')
{{ HTML::script('assets/js/plugins/jqueryUI/jquery-ui-1.10.4.custom.min.js') }}
@stop

@section('jsorjquery')
<script type="text/javascript">
    function getDataEditPekerjaan(idPekerjaan, idJenisPajak){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("pekerjaan/data-ubah-pekerjaan/'+idPekerjaan+'&'+idJenisPajak+'") }}',
                success: function(html){
                    $('.for-alert').empty();
                    $('.tbl-edit').hide();
                    $("#pekerjaan-data").hide();
                    $('html, body').animate({scrollTop:0}, 'slow');
                    $("#pekerjaan-edit").show().html(html);
                }
            });
        });
    }
    
    function getDataEditPembayaran(idPembayaran){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("pembayaran/data-ubah-pembayaran/'+idPembayaran+'") }}',
                success: function(html){
                    $(".modal-edit-pembayaran").empty();
                    $(".modal-edit-pembayaran").show().html(html);
                    $('#modal-edit-pembayaran').modal();                
                }
            });
        });
    }
    
    function notifikasiHapus(keteranganf, id_pembayaran){
        var url = "{{ URL::to('pembayaran/hapus/"+id_pembayaran+"') }}";
        $("#ketHapus").html('Apakah anda yakin ingin menghapus pembayaran pada tanggal <b>'+keteranganf+'</b> dari daftar pembayaran ?');
        $(".foot-modal").html('<a href="'+url+'" type="button" class="btn btn-danger" ><i class="fa fa-trash-o"></i> HAPUS</a>\n\
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>');
        $('#myModal').modal();
    }
    
   
</script>
@stop