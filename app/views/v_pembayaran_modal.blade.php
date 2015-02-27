<div id="modal-pembayaran" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close tbl-tutup" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Pembayaran</h4>
            </div>
            <form id="tambah-pembayaran">
                <div class="modal-body">
                    <div class="row">
                        <!--isi modal-->
                        <input type="hidden" name="id_pekerjaan" value="{{ $datas->id_pekerjaan }}" />
                        <div class="form-group">
                            <label style="margin-top: -10px;" class="col-sm-12 control-label"><h3>Info Pekerjaan</h3></label>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Pekerjaan</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input value="{{ $datas->NamaPekerjaan }}" class="form-control" readonly type="text" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis Pajak</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input value="{{ $datas->NamaPajak }}" class="form-control" readonly autocomplete="off" type="text"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Nilai Kontrak</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input value="{{ number_format($datas->NilaiKontrak, 0, ',', '.') }}" class="form-control" readonly autocomplete="off" type="text"  />
                                </div>
                                @if ($datas->MetodeHitung == 1)
                                * Harga Termasuk PPN
                                @else
                                ** Harga Tidak Termasuk PPN
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal Pekerjaan</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    {? $tanggalKontrak = new \DateTime($datas->tanggalKontrak) ?}
                                    <input value="{{ $tanggalKontrak->format('d-m-Y') }}" class="form-control" name="tanggalKontrak" type="text" readonly /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Persentase Pekerjaan</label>
                            <div class="col-sm-8" style="margin-top: 10px">
                                <p>
                                    <strong>Pekerjaan</strong>
                                    <input type="hidden" name="PersentasePekerjaanAwal" value="{{ $datas->PersentasePekerjaan }}" />
                                    <span class="pull-right text-muted">{{ $datas->PersentasePekerjaan }}% Complete</span>
                                </p>
                                <div class="progress progress-striped active">        
                                    <div class=" progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $datas->PersentasePekerjaan }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $datas->PersentasePekerjaan }}%">
                                        {{ $datas->PersentasePekerjaan }}% Complete 
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: -10px;" class="col-sm-12 control-label"><h3>Masukan Data Pembayaran</h3></label>
                        </div>
                        <div class="form-group">
                            <div class=" col-sm-12 for-alert-pembayaran-modal"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Sisa Pembayaran</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input value="{{ number_format($sisaPembayaran, 0, ',', '.') }}" class="form-control" readonly autocomplete="off" type="text"  />
                                    <input type="hidden" name="sisaPembayaran" value="{{ $sisaPembayaran }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 15px;" class="col-sm-4 control-label">Tanggal Pembayaran</label>
                            <div class="col-sm-8" style="margin-top: 15px;">
                                <div class="input-group">
                                    <input  class="form-control" value="{{ $TglSekarang }}" name="TanggalPembayaran" readonly type="text" autocomplete="off" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <!--<input  class="form-control" name="TanggalPembayaran" id="tanggalPembayaran" type="text" autocomplete="off" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
                                    <!--<input type="hidden" name="id_JenisPajak" value="@{ $datas->id_JenisPajak }}"/>-->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 15px;" class="col-sm-4 control-label">No. Pemotongan</label>
                            <div class="col-sm-8" style="margin-top: 15px;">
                                <input class="form-control" name="NomorPemotongan" readonly value="{{ $BuatNomor->noPotong }}" autocomplete="off" type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 15px;" class="col-sm-4 control-label">No. Faktur</label>
                            <div class="col-sm-8" style="margin-top: 15px;">
                                <input class="form-control" name="noFaktur" value="{{ $BuatNomor->noFaktur }}" readonly autocomplete="off" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Untuk Progress (%)</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <input  style="width: 361px" type="text" class="form-control tbl-slider" name="PersentasePekerjaan" data-slider-min="{{ $datas->PersentasePekerjaan }}" data-slider-max="100" data-slider-step="5" data-slider-value="-14" data-slider-orientation="" data-slider-selection="before" data-slider-tooltip="show">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label style="margin-top: 15px;" class="col-sm-4 control-label">Nilai Pembayaran</label>
                            <div class="col-sm-8" style="margin-top: 15px;">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span><input class="form-control nilaiPembayaran" onKeyup="tambahKoma('nilaiPembayaran')" id="nilaiPembayaran" autocomplete="off" type="text" style="text-align: right" />
                                    <input class="form-control nilaiPembayaran2" name="NilaiPembayaran" autocomplete="off" type="hidden" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">PPh</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span><input  class="form-control pph" id="pph" readonly type="text" style="text-align: right"/>
                                    <input  class="form-control pph2" name="NilaiPPh" type="hidden"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">PPN</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span><input  class="form-control ppn" readonly id="ppn" type="text" style="text-align: right"/>
                                    <input  class="form-control ppn2" name="NilaiPPN" type="hidden"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Nilai Dasar Pengenaan Pajak (PPN)</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span><input class="form-control nilaiDasarPengenaan" id="nilaiDasarPengenaan" readonly type="text" style="text-align: right"/>
                                    <input class="form-control nilaiDasarPengenaan2" name="NilaiDasarPengenaan" type="hidden"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Ket Pembayaran</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <textarea class="form-control" autocomplete="off" name="KetPembayaran"></textarea>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa">Rp.</i> BAYAR</button>
                    <button data-dismiss="modal" class="btn btn-default tbl-tutup">BATAL</button>
                </div>
            </form>
        </div>
    </div>
</div>
<iframe id="print-report" frameborder="0" marginheight="0" marginwidth="0" width="0" height="0"></iframe>
<script type="text/javascript">
    //Math.abs()= nilai absolut
    //Math.ceil() = pembulatan nilai ke atas
    //Math.floor() = pembulatan nilai ke bawah
    //Math.round() = pembulatan nilai, jika angka dibelakang koma dari 5 ke atas, akan dibulatkan ke atas, dibawah 5 akan dibulatkan ke bawah
    //isNaN() = pengecekan apakah angka atau bukan, jika angka akan mengirim nilai false, dan jika huruf akan mengirim nilai true
    //Math.random() = akan memberikan nilai acak, yang nilainya selalu dibawah 1.
    var Status_pil = '{{ $datas->MetodeHitung }}';
    var Tarif = '{{ $datas->Tarif }}';
    function kurensi(nilai){
        bk = nilai.replace(/[^\d]/g,"");
        ck="";
        panjangk = bk.length;
        j = 0;
        for(i = panjangk; i > 0; i--){
            j = j + 1;
            if(((j % 3) == 1) && (j != 1)){
                ck = bk.substr(i-1, 1)+"."+ck;
                xk = bk;
            }else{
                ck = bk.substr(i-1, 1)+ck;
                xk = bk;
            }
        }
        return ck;
    }
    function tambahKoma(id){
        ttm = document.getElementById(id).value;
        strtt = ttm.toString();
        kttm = kurensi(strtt);
        
        document.getElementById(id).value = kttm;
    }
    function PerhitunganPajak(nilaiKontrak, status, tarif){
        var persentasePph = tarif;        
        if( status == 1){
            ppn = nilaiKontrak / 11; // rumus (nilai kontrak dikali 100/110) x 10% atau nilai kontrak dikali 10/110
            pengenaanPajak = nilaiKontrak * 100/110;
            pph = persentasePph * (100/110 * nilaiKontrak);
            var cek_nilai = nilaiKontrak.toString();
            if(cek_nilai != isNaN || cek_nilai !=0){
                pph = persentasePph * (100/110 * cek_nilai);
                ppn = cek_nilai / 11;
                pengenaanPajak = nilaiKontrak * 100/110;
                $('.nilaiPembayaran2').val(nilaiKontrak);
                $('.nilaiDasarPengenaan').val(Math.ceil(pengenaanPajak));
                $('.nilaiDasarPengenaan2').val(Math.ceil(pengenaanPajak));
                $('.pph').val(Math.ceil(pph));
                $('.pph2').val(Math.ceil(pph));
                $('.ppn').val(Math.ceil(ppn));
                $('.ppn2').val(Math.ceil(ppn));
            }  
        }else if(status == 0){
            pph = nilaiKontrak * persentasePph;
            ppn = nilaiKontrak * 0.1;
            var cek_nilai = nilaiKontrak.toString();
            if(cek_nilai != isNaN || cek_nilai !=0){
                pph = cek_nilai * persentasePph;
                ppn = cek_nilai * 0.1;
                $('.nilaiPembayaran2').val(nilaiKontrak);
                $('.nilaiDasarPengenaan').val(nilaiKontrak);
                $('.nilaiDasarPengenaan2').val(nilaiKontrak);
                $('.pph').val(Math.ceil(pph));
                $('.pph2').val(Math.ceil(pph));
                $('.ppn').val(Math.ceil(ppn));
                $('.ppn2').val(Math.ceil(ppn));
            }
        }
    }
    $(document).ready(function(){
        $( ".tbl-slider" ).slider();
        $('.nilaiPembayaran').on('keyup', function(){
            var nilai = $(this).val().toString();
            nilai = nilai.replace(/[^\d]/g,"");
            var nilai2 = parseFloat(nilai);
            PerhitunganPajak(nilai2, Status_pil, Tarif);
            tambahKoma('pph');
            tambahKoma('ppn');
            tambahKoma('nilaiDasarPengenaan');
        });
        $('#tambah-pembayaran').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("pembayaran/simpan-pembayaran") }}',
                data: $(this).serialize()
            }).done(function(data){
                if(data.error){
                    $('.for-alert-pembayaran-modal').empty();
                    alert_message('danger', data.error, '.for-alert-pembayaran-modal');
                    $('html, #modal-pembayaran').animate({scrollTop:400}, 'slow');
                }else{
                   // $().redirect('{{ URL::to("pembayaran/berhasil") }}', {'urlnya': data.urlnya});
                    $(location).attr('href','{{ URL::previous() }}');
                }
            });
        });
//        $('.tbl-tutup').on('click', function(){
//            $(".modal-pembayaran").hide();
//        });
    })
</script>