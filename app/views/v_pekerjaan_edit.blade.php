
<form id="edit-pekerjaan">
    <div class="form-group">
        <label class="col-sm-4 control-label">Tanggal Pekerjaan</label>
        <div class="col-sm-8">
            <div class="input-group">
                {? $tanggalKontrak = new \DateTime($pekerjaan->tanggalKontrak) ?}
                <input  class="form-control" value="{{ $tanggalKontrak->format('d-m-Y') }}" name="TanggalKontrak" id="tanggalKontrak" type="text" autocomplete="off" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input value="{{ $pekerjaan->id_pekerjaan }}" name="id_pekerjaan" type="hidden"/>
            </div>
        </div>
    </div>
    <div class="form-group" id="form-insert-kontrak">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Pekerjaan</label>
        <div style="margin-top: 10px;" class="col-sm-8">
            <input  class="form-control" value="{{ $pekerjaan->NamaPekerjaan }}"type="text" name="NamaPekerjaan" id="namaPekerjaan" autocomplete="off" />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis Pajak</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $pekerjaan->NamaPajak }}" class="form-control" name="jenis_pajak" readonly autocomplete="off" type="text"  />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Jenis Setoran</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <select class="form-control" id="pilihan-pajak" name="pilihan-setoran-pajak">
                <option value="" id="pilih-pajak" selected>Pilihan Kategori Pajak</option>
                <optgroup label="{{ $pekerjaan->NamaPajak }}">
                    @foreach($kategori as $data)
                    @if($data->id != 1)
                        @if($data->id_JenisSetoran == $pekerjaan->id_JenisSetoran)
                            <option value="{{ $data->id_JenisSetoran }}" selected>{{ $data->NamaSetoran }}</option>
                        @else
                            <option value="{{ $data->id_JenisSetoran }}">{{ $data->NamaSetoran }}</option>
                        @endif
                    @elseif($data->id == 1)
                        {? $kategoriPajak[1]['isi'] = 'PPh Pasal 22: Industri/Eksportir' ?}
                        {? $kategoriPajak[2]['isi'] = 'PPh Pasal 22: Bendaharawan/Badan Tertentu Yang Ditunjuk ' ?}
                        @foreach($kategoriPajak as $key => $item)
                            @if($key == $pekerjaan->id_JenisSetoran)
                                <option value="{{ $key }}" selected>{{ $item['isi'] }}</option>
                            @else
                                <option value="{{ $key }}">{{ $item['isi'] }}</option>
                            @endif
                        @endforeach
                    {? break ?}
                    @endif
                    @endforeach
                </optgroup>

            </select>
        </div>
    </div>
    @if($pekerjaan->id == 3)
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Kategori Pelaksana</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <select class="form-control" id="pilihan-pajak" name="pilihan-kategori-pelaksana">
                <option value="" id="pilih-pelaksana" selected>Pilihan Kategori Pelaksana</option>
                <optgroup label="Kategori">
                    {? $kategoriPelaksana[1]['isi'] = 'Perencana Konstruksi' ?}
                    {? $kategoriPelaksana[2]['isi'] = 'Pelaksana Konstruksi' ?}
                    {? $kategoriPelaksana[3]['isi'] = 'Pengawas Konstruksi' ?} 
                    @foreach($kategoriPelaksana as $key => $item)
                        @if($key == $pekerjaan->KategoriPelaksana)
                        <option value="{{ $key }}" selected>{{ $item['isi'] }}</option>
                        @else
                        <option value="{{ $key }}">{{ $item['isi'] }}</option>
                        @endif
                    @endforeach
                </optgroup>
            </select>
        </div>
    </div>
    @endif
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Nilai Pekerjaan</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <div class="input-group">
                {? $NilaiKontrak = number_format($pekerjaan->NilaiKontrak, 0, ',', '.') ?}
                <span class="input-group-addon">Rp.</span><input value="{{ $NilaiKontrak }}" class="form-control" id="nilaiKontrak" onKeyup="tambahKoma('nilaiKontrak')" autocomplete="off" type="text" style="text-align: right" />
                <input type="hidden" name="NilaiKontrak" value="{{ $pekerjaan->NilaiKontrak }}" id="nilaiKontrak2" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label"></label>
        <div class="col-sm-8" style="margin-top: 10px;">
            @if($pekerjaan->MetodeHitung == 1)
            <label class="radio-inline"><input type="radio" name="MetodeHitung" checked value="1"> include pajak</label>
            <label class="radio-inline"><input type="radio" name="MetodeHitung" value="0"> tidak include pajak</label>
            @else
            <label class="radio-inline"><input type="radio" name="MetodeHitung" value="1"> include pajak</label>
            <label class="radio-inline"><input type="radio" name="MetodeHitung" checked value="0"> tidak include pajak</label>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Persentase Pekerjaan</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <div class="input-group">
                <select class="form-control" id="pilihan-pajak" name="PersentasePekerjaan">
                    <option value="" id="pilih-persentase" selected>Persentase Pekerjaan</option>
                    @for($i=0; $i<=100; $i=$i+5)
                    @if($i == $pekerjaan->PersentasePekerjaan)
                    <option value="{{ $i }}" selected>{{ $i }}</option>
                    @else
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                    @endfor
                </select><span class="input-group-addon">%</span>
            </div>
        </div>
    </div>
    <!--form pekerjaan end -->
    <!--form rekanan start -->
    <div class="form-group">
        <h4 style="margin-top: 30px;" class="col-sm-12 control-label page-header">Rekanan / Wajib Pajak</h4>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Rekanan</label>
        <div style="margin-top: 10px;" class="col-sm-8">
            <input value="{{ $pekerjaan->NamaPerusahaan }}" class="form-control" name="NamaPerusahaan" id="namaPerusahaan" type="text" autocomplete="off" />
            <input class="form-control" name="id_rekanan" value="{{ $pekerjaan->id_rekanan }}" id="id_rekanan" type="hidden"/>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">NPWP</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $pekerjaan->NPWP }}" class="form-control" id="npwp" readonly type="text"   />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Nama Direktur</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <input value="{{ $pekerjaan->NamaDirektur }}"  class="form-control" readonly id="direktur" autocomplete="off" type="text"  />
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-sm-4 control-label">Alamat</label>
        <div class="col-sm-8" style="margin-top: 10px;">
            <textarea class="form-control" autocomplete="off" readonly id="alamat"  >{{ $pekerjaan->Alamat }}</textarea>
        </div>
    </div>
    <!--form rekanan end-->
    <div class="form-group tultip">
        <button style="margin-top: 10px;" type="submit" class="btn btn-primary" ><i class="fa fa-edit fa-1x"></i> UBAH</button>
        <a style="margin-top: 10px;" class="btn btn-default tbl-batal-edit" >BATAL</a>
    </div>
</form>

<script type="text/javascript">
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
    
    $(document).ready(function(){
        $('#tanggalKontrak').datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            firstDay: 1,
            numberOfMonths: 1
        });
        
        var rekanan = function(request, response){
            $.ajax({
                url: '{{ URL::to("pekerjaan/json-cari-rekanan") }}',
                dataType: 'json',
                type: 'Get',
                data: {
                    term: request.term
                },
                success: function(data){
                    var labels = [];
                    var mapped = {};
                    $.each(data, function (i, item){
                        var data = item.NamaPerusahaan;
                        mapped[item.id_rekanan] = [];
                        mapped[item.id_rekanan]['label'] = item.NamaPerusahaan;
                        mapped[item.id_rekanan]['npwp'] = item.NPWP;
                        mapped[item.id_rekanan]['direktur'] = item.NamaDirektur;
                        mapped[item.id_rekanan]['alamat'] = item.Alamat;
                        mapped[item.id_rekanan]['id'] = item.id_rekanan;
                    });
                    $.each(mapped, function (i, item){
                        labels.push(item);
                    });
                    
                    response(labels);
                }
            });
        };
        $('#namaPerusahaan').autocomplete({
            minLength: 1,
            source: rekanan,
            select: function(event, ui){
                $('#namaPerusahaan').val(ui.item.label);
                $('#npwp').val(ui.item.npwp);
                $('#direktur').val(ui.item.direktur);
                $('#alamat').val(ui.item.alamat);
                $('#id_rekanan').val(ui.item.id);    
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item){
            return $("<li>")
            .append("<a>"+item.label+"<br><font style='font-size:8pt'>"+item.npwp+"</font></a>")
            .appendTo( ul );
        };
        
        $('#edit-pekerjaan').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("pekerjaan/update-pekerjaan") }}',
                data: $(this).serialize(),
                success: function(data){
                    if(data.error){
                        $('.for-alert').empty()
                        alert_message('danger', data.error, '.for-alert');  
                        $('html, body').animate({scrollTop:0}, 'slow');
                    }else{
                        data.success;
                        $(location).attr('href','{{ URL::previous(); }}');
                    }    
                }
            });
        });
    
        $('.tbl-batal-edit').on('click', function(){
            $('.for-alert').empty();
            $('#pekerjaan-edit').empty();
            $('.tbl-edit').show();
            $('#pekerjaan-data').show();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
    
        $('#nilaiKontrak').on('keyup', function(){
            var nilai = $(this).val().toString();
            nilai = nilai.replace(/[^\d]/g,"");
            $('#nilaiKontrak2').val(nilai);
        });
    });
</script>