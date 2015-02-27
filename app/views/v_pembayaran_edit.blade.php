<div id="modal-edit-pembayaran" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close tbl-tutup" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ubah Data Pembayaran</h4>
            </div>
            <form id="edit-pembayaran">
                <div class="modal-body">
                    <div class="row">
                        <!--isi modal-->
                        <div class="form-group">
                            <label style="margin-top: -10px;" class="col-sm-12 control-label"><h3>Data Pembayaran</h3></label>
                        </div>
                        <div class="form-group">
                            <div class=" col-sm-12 for-alert-edit-pembayaran-modal"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal Pembayaran</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="hidden" name="id_pembayaran" value="{{ $pembayaran->id_pembayaran }}"/>
                                    {? $tanggalpembayaran = new DateTime($pembayaran->TanggalPembayaran) ?}
                                    <input value="{{ $tanggalpembayaran->format('d-m-Y') }}" class="form-control" name="TanggalPembayaran" id="tanggalPembayaran" type="text" autocomplete="off" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    {? $tanggalKontrak = new DateTime($pembayaran->tanggalKontrak) ?}
                                    <input type="hidden" name="tanggalKontrak" value="{{ $tanggalKontrak->format('d-m-Y') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 15px;" class="col-sm-4 control-label">No. Pemotongan</label>
                            <div class="col-sm-8" style="margin-top: 15px;">
                                <input value="{{ $pembayaran->NomorPemotongan }}" class="form-control" name="NomorPemotongan" autocomplete="off" type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 15px;" class="col-sm-4 control-label">No. Faktur</label>
                            <div class="col-sm-8" style="margin-top: 15px;">
                                <input class="form-control" value="{{ $pembayaran->noFaktur }}" name="noFaktur"  autocomplete="off" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Untuk Progress</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    <select class="form-control" id="pilihan-pajak" name="PersentasePembayaran">
                                        <option value="" id="pilih-persentase" selected>Persentase Pembayaran</option>
                                        @for($i=0; $i<=100; $i=$i+5)
                                        @if($i == $pembayaran->PersentasePembayaran)
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                        @endfor
                                    </select><span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label style="margin-top: 15px;" class="col-sm-4 control-label">Nilai Pembayaran</label>
                            <div class="col-sm-8" style="margin-top: 15px;">
                                <div class="input-group">
                                    {? $NilaiPembayaran = number_format($pembayaran->NilaiPembayaran, 0, ',', '.') ?}
                                    <span class="input-group-addon">Rp.</span><input value="{{ $NilaiPembayaran }}" class="form-control nilaiPembayaran" onKeyup="tambahKoma('nilaiPembayaran')" id="nilaiPembayaran" autocomplete="off" type="text" style="text-align: right" />
                                    <input value="{{ $pembayaran->NilaiPembayaran }}" class="form-control nilaiPembayaran2" name="NilaiPembayaran" autocomplete="off" type="hidden" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">PPh</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    {? $NilaiPPh = number_format($pembayaran->NilaiPPh, 0, ',', '.') ?}
                                    <span class="input-group-addon">Rp.</span><input value="{{ $NilaiPPh }}" class="form-control pph" id="pph" readonly type="text" style="text-align: right"/>
                                    <input value="{{ $pembayaran->NilaiPPh }}" class="form-control pph2" name="NilaiPPh" type="hidden"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">PPN</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    {? $NilaiPPN = number_format($pembayaran->NilaiPPN, 0, ',', '.') ?}
                                    <span class="input-group-addon">Rp.</span><input value="{{ $NilaiPPN }}" class="form-control ppn" readonly id="ppn" type="text" style="text-align: right"/>
                                    <input value="{{ $pembayaran->NilaiPPN }}" class="form-control ppn2" name="NilaiPPN" type="hidden"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Nilai Dasar Pengenaan Pajak (PPN)</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="input-group">
                                    {? $NilaiDasarPengenaan = number_format($pembayaran->NilaiDasarPengenaan, 0, ',', '.') ?}
                                    <span class="input-group-addon">Rp.</span><input value="{{ $NilaiDasarPengenaan }}" class="form-control nilaiDasarPengenaan" id="nilaiDasarPengenaan" readonly type="text" style="text-align: right"/>
                                    <input value="{{ $pembayaran->NilaiDasarPengenaan }}" class="form-control nilaiDasarPengenaan2" name="NilaiDasarPengenaan" type="hidden"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label style="margin-top: 10px;" class="col-sm-4 control-label">Ket Pembayaran</label>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <textarea class="form-control" autocomplete="off" name="KetPembayaran">{{ $pembayaran->KetPembayaran }}</textarea>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> UBAH</button>
                    <button data-dismiss="modal" class="btn btn-default tbl-tutup">BATAL</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    //Math.abs()= nilai absolut
    //Math.ceil() = pembulatan nilai ke atas
    //Math.floor() = pembulatan nilai ke bawah
    //Math.round() = pembulatan nilai, jika angka dibelakang koma dari 5 ke atas, akan dibulatkan ke atas, dibawah 5 akan dibulatkan ke bawah
    //isNaN() = pengecekan apakah angka atau bukan, jika angka akan mengirim nilai false, dan jika huruf akan mengirim nilai true
    //Math.random() = akan memberikan nilai acak, yang nilainya selalu dibawah 1.
    var Status_pil = '{{ $pembayaran->MetodeHitung }}';
    var Tarif = '{{ $pembayaran->Tarif }}';
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
        $('#tanggalPembayaran').datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            firstDay: 1,
            numberOfMonths: 1
        });
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
        $('#edit-pembayaran').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("pembayaran/update-pembayaran") }}',
                data: $(this).serialize()
            }).done(function(data){
                if(data.error){
                    $('.for-alert-edit-pembayaran-modal').empty();
                    alert_message('danger', data.error, '.for-alert-edit-pembayaran-modal');
                    $('html, #modal-edit-pembayaran').animate({scrollTop:0}, 'slow');
                }else{
                    $(location).attr('href','{{ URL::previous() }}');
                }
            });
        });
    })
</script>