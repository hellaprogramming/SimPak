<?php

class Ccetak extends BaseController {
    public function indexPasal22() {
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');
        $data['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=', 'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.TanggalPembayaran', $hariini)
                ->where('Jenispajak.id', 1)
                ->orderBy('Pembayaran.id_pembayaran', 'asc')
                ->get();
        $data['idPajak'] = '1';
        return View::make('v_cetak', $data);
    }
    
    public function indexPasal23() {
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');
        $data['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.TanggalPembayaran', $hariini)
                ->where('Jenispajak.id', 2)
                ->orderBy('Pembayaran.id_pembayaran', 'asc')
                ->get();
        $data['idPajak'] = '2';
        //echo $hariini;
        return View::make('v_cetak', $data);
    }
    
    public function indexPasal4() {
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');
        $data['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.TanggalPembayaran', $hariini)
                ->where('Jenispajak.id', 3)
                ->orderBy('Pembayaran.id_pembayaran', 'asc')
                ->get();
        $data['idPajak'] = '3';
        //echo $hariini;
        return View::make('v_cetak', $data);
    }
    public function BuktiPotongPasal22($id){
        $objek['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Kategoripajak', 'Pekerjaan.id_KategoriPajak', '=' ,'Kategoripajak.id_KategoriPajak')
                ->join('Jenispajak', 'Kategoripajak.id_JenisPajak', '=', 'Jenispajak.id_JenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.id_pembayaran', $id)
                ->first();
        $objek['data2'] = Bendahara::where('id_bendahara', 1)->first();
        $npwp = $objek['data']->NPWP;
        $NamaPerusahaan = $objek['data']->NamaPerusahaan;
        $alamat = $objek['data']->Alamat;
        $objek['n'] = str_split($npwp);
        $objek['NamaPerusahaan'] = str_split($NamaPerusahaan);
        $objek['Alamat'] = str_split($alamat);
        $nominal_pph = BaseController::terbilang($objek['data']->NilaiPPh);
        $objek['terbilang'] = preg_replace('~((?:\S*?\s){7})~', "$1\n", $nominal_pph);
        $Tglb = new \DateTime($objek['data']->TanggalPembayaran);
        $bulan = BaseController::bulan($Tglb->format('m'));
        $objek['TanggalPembayaran'] = $Tglb->format('d').' '.$bulan.' '.$Tglb->format('Y');
        
        $npwpDinas = $objek['data2']->NpwpDinas;
        $objek['nd'] = str_split($npwpDinas);
        $objek['anDinas'] = array('B','e','n','d','a','h','a','r','a',
            ' ','R','u','t','i','n',' ','D','P','U',' ','K','a','b','.',
            'K','u','t','a','i',' ','T','i','m','u','r');
        return View::make('cetak.BuktiPotongPasal22', $objek);
    }
    public function BuktiPotongPasal23($id){
        $objek['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.id_pembayaran', $id)
                ->first();
        $objek['data2'] = Pegawai::where('id_pegawai', 1)->first();
        $npwp = $objek['data']->NPWP;
        $NamaPerusahaan = $objek['data']->NamaPerusahaan;
        $alamat = $objek['data']->Alamat;
        $objek['n'] = str_split($npwp);
        $objek['NamaPerusahaan'] = str_split($NamaPerusahaan);
        $objek['Alamat'] = str_split($alamat);
        $nominal_pph = BaseController::terbilang($objek['data']->NilaiPPh);
        $objek['terbilang'] = preg_replace('~((?:\S*?\s){7})~', "$1\n", $nominal_pph);
        $Tglb = new \DateTime($objek['data']->TanggalPembayaran);
        $bulan = BaseController::bulan($Tglb->format('m'));
        $objek['TanggalPembayaran'] = $Tglb->format('d').' '.$bulan.' '.$Tglb->format('Y');
        
        $npwpDinas = $objek['data2']->NpwpDinas;
        $objek['nd'] = str_split($npwpDinas);
        $objek['anDinas'] = array('B','e','n','d','a','h','a','r','a',
            ' ','R','u','t','i','n',' ','D','P','U',' ','K','a','b','.',
            'K','u','t','a','i',' ','T','i','m','u','r');
        return View::make('cetak.BuktiPotongPasal23', $objek);
    }
    
    public function BuktiPotongPasal4($id) {
        $fungsibase = new BaseController;
        $objek['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.id_pembayaran', $id)
                ->first();
        $objek['data2'] = Pegawai::where('id_pegawai', 1)->first();
        $npwp = $objek['data']->NPWP;
        $NamaPerusahaan = $objek['data']->NamaPerusahaan;
        $alamat = $objek['data']->Alamat;
        $objek['n'] = str_split($npwp);
        $objek['NamaPerusahaan'] = str_split($NamaPerusahaan);
        $objek['Alamat'] = str_split($alamat);
        $nominal_pph = $fungsibase->terbilang($objek['data']->NilaiPPh);
        $objek['terbilang'] = preg_replace('~((?:\S*?\s){7})~', "$1\n", $nominal_pph);
        $Tglb = new \DateTime($objek['data']->TanggalPembayaran);
        $bulan = $fungsibase->bulan($Tglb->format('m'));
        $objek['TanggalPembayaran'] = $Tglb->format('d').' '.$bulan.' '.$Tglb->format('Y');
        
        $npwpDinas = $objek['data2']->NpwpDinas;
        $objek['nd'] = str_split($npwpDinas);
        $objek['anDinas'] = array('B','e','n','d','a','h','a','r','a',
            ' ','R','u','t','i','n',' ','D','P','U',' ','K','a','b','.',
            'K','u','t','a','i',' ','T','i','m','u','r');

        return View::make('cetak.BuktiPotongJasaKonstruksi', $objek);
    }
    
    public function SuratSetoranPajak($id){
        $fungsibase = new BaseController;
        $objek['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.id_pembayaran', $id)
                ->first();
        $objek['data2'] = Pegawai::where('id_pegawai', 1)->first();
        
        $npwp = $objek['data']->NPWP;
        $KodeJenisPajak = $objek['data']->KodeJenisPajak;
        $KodeJenisSetoran = $objek['data']->KodeJenisSetoran;
        $TanggalPembayaran = new \DateTime($objek['data']->TanggalPembayaran);
        $objek['n'] = str_split($npwp);
        $objek['kjp'] = str_split($KodeJenisPajak);
        $objek['kjs'] = str_split($KodeJenisSetoran);
        $objek['bln'] = $TanggalPembayaran->format('m');
        $objek['thn'] = str_split($TanggalPembayaran->format('Y'));
        $nominal_pph = $fungsibase->terbilang($objek['data']->NilaiPPh);
        $objek['jumlah_pembayaran'] = number_format($objek['data']->NilaiPPh, 0, ',', '.');
        $objek['terbilang'] = preg_replace('~((?:\S*?\s){7})~', "$1\n", $nominal_pph);
        $Tglb = new \DateTime($objek['data']->TanggalPembayaran);
        $bulan = $fungsibase->bulan($Tglb->format('m'));
        $objek['TanggalPembayaran'] = $Tglb->format('d').' '.$bulan.' '.$Tglb->format('Y');
        return View::make('cetak.SuratSetoranPajak', $objek);
    }
    
    public function FakturPajak($id){
        $fungsibase = new BaseController;
        $objek['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.id_pembayaran', $id)
                ->first();
        $objek['data2'] = Rekanan::where('id_rekanan', 1)->first();
        $objek['data3'] = Pegawai::where('id_pegawai', 1)
                ->first();
        
        $npwp = $objek['data']->NPWP;
        $objek['n'] = str_split($npwp);
        $Tglb = new \DateTime($objek['data']->TanggalPembayaran);
        $bulan = $fungsibase->bulan($Tglb->format('m'));
        $objek['TanggalPembayaran'] = $Tglb->format('d').' '.$bulan.' '.$Tglb->format('Y');
        $npwpBendahara = $objek['data2']->NPWP;
        $objek['nb'] = str_split($npwpBendahara);
        return View::make('cetak.FakturPajak', $objek);
    }
    
    public function SuratSetoranPajakPPN($id){
        $objek['data'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.id_pembayaran', $id)
                ->first();
        $objek['data2'] = Pegawai::where('id_pegawai', 1)->first();
        
        $npwp = $objek['data']->NPWP;
        $TanggalPembayaran = new \DateTime($objek['data']->TanggalPembayaran);
        $objek['n'] = str_split($npwp);
        $objek['kjp'] = str_split(Jenissetoran::where('id_JenisSetoran', 14)->first()->KodeJenisPajak);
        $objek['kjs'] = str_split(Jenissetoran::where('id_JenisSetoran', 14)->first()->KodeJenisSetoran);
        $objek['bln'] = $TanggalPembayaran->format('m');
        $objek['thn'] = str_split($TanggalPembayaran->format('Y'));
        $nominal_ppn = BaseController::terbilang($objek['data']->NilaiPPN);
        $objek['jumlah_pembayaran'] = number_format($objek['data']->NilaiPPN, 0, ',', '.');
        $objek['terbilang'] = preg_replace('~((?:\S*?\s){7})~', "$1\n", $nominal_ppn);
        $Tglb = new \DateTime($objek['data']->TanggalPembayaran);
        $bulan = BaseController::bulan($Tglb->format('m'));
        $objek['TanggalPembayaran'] = $Tglb->format('d').' '.$bulan.' '.$Tglb->format('Y');
        return View::make('cetak.SuratSetoranPajak', $objek);
    }

//    fungsi bendahara pengeluaran
    
    public function vDaftarBuktiPotongPasal22(){
        Return View::make('bendahara_pengeluaran.v_daftarBuktiPotong_pasal22');
    }
    public function vDaftarBuktiPotongPasal23(){
        Return View::make('bendahara_pengeluaran.v_daftarBuktiPotong_pasal23');
    }
    public function vDaftarBuktiPotongPasal4(){
        Return View::make('bendahara_pengeluaran.v_daftarBuktiPotong_pasal4');
    }
    
    public function cariDaftarPotong(){
        $id = Input::get('id');
        $data['bln'] = Input::get('bulanCari');
        $data['thn'] = Input::get('tahunCari');
        $tanggal = '01-'.$data['bln'].'-'.$data['thn'];
        $tanggal1 = new \DateTime($tanggal);
        $tanggal2 = clone $tanggal1;
        $tanggal2->add(DateInterval::createFromDateString('1 month'));
        $tanggal2->add(DateInterval::createFromDateString('-1 day'));
        $item = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                ->where('Jenispajak.id', $id)
                ->orderBy('Rekanan.NamaPerusahaan', 'asc')
                ->get();
        $datasementara['db'] = array();
        foreach ($item as $i => $data){
            $tanggal = new \DateTime($data->TanggalPembayaran);
            $datasementara['db'][$i] = array(
                'NPWP' => $data->NPWP,
                'NamaPerusahaan' => $data->NamaPerusahaan,
                'NomorPemotongan' => $data->NomorPemotongan,
                'TanggalPembayaran' => $tanggal->format('d-m-Y'),
                'NilaiPembayaran' => number_format($data->NilaiPembayaran, 0, ',', '.'),
                'NilaiPPh' => number_format($data->NilaiPPh, 0, ',', '.')
            );
        }
        $datasementara['bln'] = Input::get('bulanCari');
        $datasementara['thn'] = Input::get('tahunCari');
        return Response::json($datasementara);
    }
    
    public function DBP($id_pasal, $masa_pajak){
        $id = $id_pasal;
        $masapajak = explode('-', $masa_pajak);
        $data['masa_bulan'] = str_split($masapajak[0]);
        $data['masa_tahun'] = str_split($masapajak[1]);
        if($id_pasal == '1'){
            $data['judul'] = 'DAFTAR BUKTI PEMUNGUTAN<br/>PPh PASAL 22';
            $data['judul_kolom'] = 'Bukti Pemungutan';
        }elseif($id_pasal == '2'){
            $data['judul'] = 'DAFTAR BUKTI PEMOTONGAN<br/>PPh PASAL 23';
            $data['judul_kolom'] = 'Bukti Pemotongan';
        }elseif($id_pasal == '3'){
            $data['judul'] = 'DAFTAR BUKTI PEMOTONGAN/PEMUNGUTAN<br/>PPh FINAL PASAL 4 AYAT (2)';
            $data['judul_kolom'] = 'Bukti Pemotongan/Pemungutan';
        }
        $tanggal = '01-'.$masa_pajak;
        $tanggal1 = new \DateTime($tanggal);
        $tanggal2 = clone $tanggal1;
        $tanggal2->add(DateInterval::createFromDateString('1 month'));
        $tanggal2->add(DateInterval::createFromDateString('-1 day'));
        $data['item'] = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                ->where('Jenispajak.id', $id)
                ->orderBy('Rekanan.NamaPerusahaan', 'asc')
                ->get();
        $data['jumlah_pembayaran'] = 0;
        $data['jumlah_pph'] = 0;
        foreach($data['item'] as $item){
            $data['jumlah_pembayaran'] += $item->NilaiPembayaran;
            $data['jumlah_pph'] += $item->NilaiPPh;
        }
        $penandatangan = 'Bend Rutin DPU Kutim';
        $data['npwp'] = str_split(Pegawai::where('id_pegawai', 1)->first()->Npwp);
        $data['penandatangan'] = str_split($penandatangan);
        $tgl_cetak = new \DateTime();
        $data['tgl_cetak'] = str_split($tgl_cetak->format('d-m-Y'));
        return View::make('cetak.DaftarBuktiPotong', $data);
    }
    
    public function vSptMasaPasal22(){
        Return View::make('bendahara_pengeluaran.v_spt_pasal22');
    }
    
    public function vSptMasaPasal23(){
        Return View::make('bendahara_pengeluaran.v_spt_pasal23');
    }
    
    public function vSptMasaPasal4(){
        Return View::make('bendahara_pengeluaran.v_spt_pasal4');
    }
    
    public function cariDataSPT22(){
        $data['bln'] = Input::get('bulanCari');
        $data['thn'] = Input::get('tahunCari');
        $tanggal = '01-'.$data['bln'].'-'.$data['thn'];
        $tanggal1 = new \DateTime($tanggal);
        $tanggal2 = clone $tanggal1;
        $tanggal2->add(DateInterval::createFromDateString('1 month'));
        $tanggal2->add(DateInterval::createFromDateString('-1 day'));
        
        $rules = array('nama_rekanan' => 'required','id_rekanan' => 'required');
        $messages = array('nama_rekanan.required' => 'Baris <b>Rekanan</b> tidak boleh kosong.',
                'id_rekanan.required' => 'Silahkan Pilih Rekanan berdasarkan Autocomplete');
        $validasi = BaseController::validasi(Input::all(), $rules, $messages);
        if($validasi->validator->fails()){
            $data['error'] = $validasi->PesanError;
        }else{
            $data1 = DB::table('Pembayaran')
                    ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                    ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                    ->join('Jenissetoran', 'Jenissetoran.id_JenisSetoran', '=', 'Pekerjaan.id_JenisSetoran')
                    ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                    ->where('Rekanan.id_rekanan', Input::get('id_rekanan'))
                    ->where('Jenispajak.id', 1)
                    ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                    ->get();
            $data['NOP'][1] = NULL;$data['PPh'][1]=NULL;
            $data['NOP'][2] = NULL;$data['PPh'][2]=NULL;
            foreach($data1 as $item){
                $kategori = $item->id_JenisSetoran;
                if(isset($data['NOP'][$kategori])){
                    $data['NOP'][$kategori] += $item->NilaiPembayaran;
                    $data['PPh'][$kategori] += $item->NilaiPPh;
                }else{
                    $data['NOP'][$kategori] = $item->NilaiPembayaran;
                    $data['PPh'][$kategori] = $item->NilaiPPh;
                }
            }
            if($data['NOP'][1] != NULL){
                $data['IndustriNOP'] = number_format($data['NOP'][1], 0, ',', '.');$data['IndustriPPh'] = number_format($data['PPh'][1], 0, ',', '.');
            }else{
                $data['IndustriNOP'] = $data['NOP'][1];$data['IndustriPPh'] = $data['PPh'][1];
            }
            if($data['NOP'][2] != NULL){
                $data['BendaharaNOP'] = number_format($data['NOP'][2], 0, ',', '.');$data['BendaharaPPh'] = number_format($data['PPh'][2], 0, ',', '.');
            }else{
                $data['BendaharaNOP'] = $data['NOP'][2];$data['BendaharaPPh'] = $data['PPh'][2];
            }
            $data['JumlahNOP'] = $data['NOP'][1] + $data['NOP'][2];
            $data['JumlahPPh'] = $data['PPh'][1] + $data['PPh'][2];
            $data['JumlahNOP'] = number_format($data['JumlahNOP'], 0, ',', '.');
            $data['JumlahPPh'] = number_format($data['JumlahPPh'], 0, ',', '.');
            $Rekanan = Rekanan::where('id_rekanan', Input::get('id_rekanan'))->first();
            $data['NamaRekanan'] = $Rekanan->NamaPerusahaan;
            $data['id_rekanan'] = $Rekanan->id_rekanan;
        }
        return Response::json($data);
    }
    
    public function cariDataSPT23(){
        $data['bln'] = Input::get('bulanCari');
        $data['thn'] = Input::get('tahunCari');
        $tanggal = '01-'.$data['bln'].'-'.$data['thn'];
        $tanggal1 = new \DateTime($tanggal);
        $tanggal2 = clone $tanggal1;
        $tanggal2->add(DateInterval::createFromDateString('1 month'));
        $tanggal2->add(DateInterval::createFromDateString('-1 day'));
        
        $rules = array('nama_rekanan' => 'required','id_rekanan' => 'required');
        $messages = array('nama_rekanan.required' => 'Baris <b>Rekanan</b> tidak boleh kosong.',
                'id_rekanan.required' => 'Silahkan Pilih Rekanan berdasarkan Autocomplete');
        $validasi = BaseController::validasi(Input::all(), $rules, $messages);
        if($validasi->validator->fails()){
            $data['error'] = $validasi->PesanError;
        }else{
            $data1 = DB::table('Pembayaran')
                    ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                    ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                    ->join('Jenissetoran', 'Jenissetoran.id_JenisSetoran', '=', 'Pekerjaan.id_JenisSetoran')
                    ->join('Jenispajak', 'Jenispajak.KodeJenisPajak', '=', 'Jenissetoran.KodeJenisPajak')
                    ->where('Rekanan.id_rekanan', Input::get('id_rekanan'))
                    ->where('Jenispajak.id', 2)
                    ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                    ->get();
            $data['NOP'][5] = NULL;$data['PPh'][5]=NULL;
            $data['NOP'][6] = NULL;$data['PPh'][6]=NULL;
            $data['NOP'][7] = NULL;$data['PPh'][7]=NULL;
            $data['NOP'][8] = NULL;$data['PPh'][8]=NULL;
            foreach($data1 as $item){
                $kategori = $item->id_JenisSetoran;
                if(isset($data['NOP'][$kategori])){
                    $data['NOP'][$kategori] += $item->NilaiPembayaran;
                    $data['PPh'][$kategori] += $item->NilaiPPh;
                }else{
                    $data['NOP'][$kategori] = $item->NilaiPembayaran;
                    $data['PPh'][$kategori] = $item->NilaiPPh;
                }
            }
            if($data['NOP'][5] != NULL){
                $data['SewaNOP'] = number_format($data['NOP'][5], 0, ',', '.');$data['SewaPPh'] = number_format($data['PPh'][5], 0, ',', '.');
            }else{
                $data['SewaNOP'] = $data['NOP'][5];$data['SewaPPh'] = $data['PPh'][5];
            }
            if($data['NOP'][6] != NULL){
                $data['Teknik1NOP'] = number_format($data['NOP'][6], 0, ',', '.');$data['Teknik1PPh'] = number_format($data['PPh'][6], 0, ',', '.');
            }else{
                $data['Teknik1NOP'] = $data['NOP'][6];$data['Teknik1PPh'] = $data['PPh'][6];
            }
            if($data['NOP'][7] != NULL){
                $data['Teknik2NOP'] = number_format($data['NOP'][7], 0, ',', '.');$data['Teknik2PPh'] = number_format($data['PPh'][7], 0, ',', '.');
            }else{
                $data['Teknik2NOP'] = $data['NOP'][7];$data['Teknik2PPh'] = $data['PPh'][7];
            }
            if($data['NOP'][8] != NULL){
                $data['Teknik3NOP'] = number_format($data['NOP'][8], 0, ',', '.');$data['Teknik3PPh'] = number_format($data['PPh'][8], 0, ',', '.');
            }else{
                $data['Teknik3NOP'] = $data['NOP'][8];$data['Teknik3PPh'] = $data['PPh'][8];
            }
            $data['JumlahNOP'] = $data['NOP'][5] + $data['NOP'][6] + $data['NOP'][7] + $data['NOP'][8];
            $data['JumlahPPh'] = $data['PPh'][5] + $data['PPh'][6] + $data['PPh'][7] + $data['PPh'][8];
            $data['JumlahNOP'] = number_format($data['JumlahNOP'], 0, ',', '.');
            $data['JumlahPPh'] = number_format($data['JumlahPPh'], 0, ',', '.');
            $Rekanan = Rekanan::where('id_rekanan', Input::get('id_rekanan'))->first();
            $data['NamaRekanan'] = $Rekanan->NamaPerusahaan;
            $data['id_rekanan'] = $Rekanan->id_rekanan;
        }
        return Response::json($data);
    }
    
    public function cariDataSPT4(){
        $data['bln'] = Input::get('bulanCari');
        $data['thn'] = Input::get('tahunCari');
        $tanggal = '01-'.$data['bln'].'-'.$data['thn'];
        $tanggal1 = new \DateTime($tanggal);
        $tanggal2 = clone $tanggal1;
        $tanggal2->add(DateInterval::createFromDateString('1 month'));
        $tanggal2->add(DateInterval::createFromDateString('-1 day'));
        
        $rules = array('nama_rekanan' => 'required','id_rekanan' => 'required');
        $messages = array('nama_rekanan.required' => 'Baris <b>Rekanan</b> tidak boleh kosong.',
                'id_rekanan.required' => 'Silahkan Pilih Rekanan berdasarkan Autocomplete');
        $validasi = BaseController::validasi(Input::all(), $rules, $messages);
        if($validasi->validator->fails()){
            $data['error'] = $validasi->PesanError;
        }else{
            $data1 = DB::table('Pembayaran')
                    ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                    ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                    ->where('Rekanan.id_rekanan', Input::get('id_rekanan'))
                    ->where('Pekerjaan.KategoriPelaksana', '1')
                    ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                    ->get();
            $data2 = DB::table('Pembayaran')
                    ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                    ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                    ->where('Rekanan.id_rekanan', Input::get('id_rekanan'))
                    ->where('Pekerjaan.KategoriPelaksana', '2')
                    ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                    ->get();
            $data3 = DB::table('Pembayaran')
                    ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                    ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                    ->where('Rekanan.id_rekanan', Input::get('id_rekanan'))
                    ->where('Pekerjaan.KategoriPelaksana', '3')
                    ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                    ->get();
            if(count($data1)){
                $PerencanaNOP = 0;
                $PerencanaPPh = 0;
                foreach($data1 as $item){
                    $PerencanaNOP += $item->NilaiPembayaran;
                    $PerencanaPPh += $item->NilaiPPh;
                }
                $data['PerencanaNOP'] = number_format($PerencanaNOP, 0, ',', '.');
                $data['PerencanaPPh'] = number_format($PerencanaPPh, 0, ',', '.');
            }else{ $data['PerencanaNOP'] = NULL; $data['PerencanaPPh'] = NULL; $PerencanaNOP = NULL; $PerencanaPPh = NULL;}
            if(count($data2)){
                $PelaksanaNOP = 0;
                $PelaksanaPPh = 0;
                foreach($data2 as $item){
                    $PelaksanaNOP += $item->NilaiPembayaran;
                    $PelaksanaPPh += $item->NilaiPPh;
                }
                $data['PelaksanaNOP'] = number_format($PelaksanaNOP, 0, ',', '.');
                $data['PelaksanaPPh'] = number_format($PelaksanaPPh, 0, ',', '.');
            }else{ $data['PelaksanaNOP'] = NULL; $data['PelaksanaPPh'] = NULL; $PelaksanaNOP = NULL; $PelaksanaPPh = NULL;}
            if(count($data3)){
                $PengawasNOP = 0;
                $PengawasPPh = 0;
                foreach($data3 as $item){
                    $PengawasNOP += $item->NilaiPembayaran;
                    $PengawasPPh += $item->NilaiPPh;
                }
                $data['PengawasNOP'] = number_format($PengawasNOP, 0, ',', '.');
                $data['PengawasPPh'] = number_format($PengawasPPh, 0, ',', '.');
            }else{ $data['PengawasNOP'] = NULL; $data['PengawasPPh'] = NULL; $PengawasNOP = NULL; $PengawasPPh = NULL;}
            $data['JumlahNOP'] = $PerencanaNOP + $PelaksanaNOP + $PengawasNOP;
            $data['JumlahPPh'] = $PerencanaPPh + $PelaksanaPPh + $PengawasPPh;
            $data['JumlahNOP'] = number_format($data['JumlahNOP'], 0, ',', '.');
            $data['JumlahPPh'] = number_format($data['JumlahPPh'], 0, ',', '.');
            $Rekanan = Rekanan::where('id_rekanan', Input::get('id_rekanan'))->first();
            $data['NamaRekanan'] = $Rekanan->NamaPerusahaan;
            $data['id_rekanan'] = $Rekanan->id_rekanan;
        }
        return Response::json($data);
    }
    
    public function SPTMasa22($id, $masa_pajak){
        $id_rekanan = $id;
        $masapajak = explode('-', $masa_pajak);
        $data['masa_bulan'] = str_split($masapajak[0]);
        $data['masa_tahun'] = str_split($masapajak[1]);
        $Rekanan = Rekanan::where('id_rekanan', $id_rekanan)->first();
        $data['NPWP'] = str_split($Rekanan->NPWP);
        $data['NamaPerusahaan'] = str_split($Rekanan->NamaPerusahaan);
        $data['Alamat'] = str_split($Rekanan->Alamat);
        $tanggal = '01-'.$masapajak[0].'-'.$masapajak[1];
        $tanggal1 = new \DateTime($tanggal);
        $tanggal2 = clone $tanggal1;
        $tanggal2->add(DateInterval::createFromDateString('1 month'));
        $tanggal2->add(DateInterval::createFromDateString('-1 day'));
        
        $data1 = DB::table('Pembayaran')
                    ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                    ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                    ->join('Jenissetoran', 'Jenissetoran.id_JenisSetoran', '=', 'Pekerjaan.id_JenisSetoran')
                    ->join('Jenispajak', 'Jenispajak.KodeJenisPajak', '=', 'Jenissetoran.KodeJenisPajak')
                    ->where('Rekanan.id_rekanan', $id_rekanan)
                    ->where('Jenispajak.id', 1)
                    ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                    ->get();
        $data['NOP'][1] = NULL;$data['PPh'][1]=NULL;
        $data['NOP'][2] = NULL;$data['PPh'][2]=NULL;
        foreach($data1 as $item){
            $kategori = $item->id_JenisSetoran;
            if(isset($data['NOP'][$kategori])){
                $data['NOP'][$kategori] += $item->NilaiPembayaran;
                $data['PPh'][$kategori] += $item->NilaiPPh;
            }else{
                $data['NOP'][$kategori] = $item->NilaiPembayaran;
                $data['PPh'][$kategori] = $item->NilaiPPh;
            }
        }
        if($data['NOP'][1] != NULL){
            $data['IndustriNOP'] = number_format($data['NOP'][1], 0, ',', '.');$data['IndustriPPh'] = number_format($data['PPh'][1], 0, ',', '.');
        }else{
            $data['IndustriNOP'] = $data['NOP'][1];$data['IndustriPPh'] = $data['PPh'][1];
        }
        if($data['NOP'][2] != NULL){
            $data['BendaharaNOP'] = number_format($data['NOP'][2], 0, ',', '.');$data['BendaharaPPh'] = number_format($data['PPh'][2], 0, ',', '.');
        }else{
            $data['BendaharaNOP'] = $data['NOP'][2];$data['BendaharaPPh'] = $data['PPh'][2];
        }
        $data['JumlahNOP'] = $data['NOP'][1] + $data['NOP'][2];
        $data['JumlahPPh'] = $data['PPh'][1] + $data['PPh'][2];
        $nominal_pph = BaseController::terbilang($data['JumlahPPh']);
        $data['terbilang'] = preg_replace('~((?:\S*?\s){7})~', "$1\n", $nominal_pph);
        $data['JumlahNOP'] = number_format($data['JumlahNOP'], 0, ',', '.');
        $data['JumlahPPh'] = number_format($data['JumlahPPh'], 0, ',', '.');
        
        $bendahara = Pegawai::where('id_pegawai', 1)->first();
        $data['NamaBendahara'] = str_split($bendahara->Nama);
        $data['NpwpBendahara'] = str_split($bendahara->Npwp);
        return View::make('cetak.SPTMasa22', $data);
    }
    
    public function SPTMasa23($id, $masa_pajak){
        $id_rekanan = $id;
        $masapajak = explode('-', $masa_pajak);
        $data['masa_bulan'] = str_split($masapajak[0]);
        $data['masa_tahun'] = str_split($masapajak[1]);
        $Rekanan = Rekanan::where('id_rekanan', $id_rekanan)->first();
        $data['NPWP'] = str_split($Rekanan->NPWP);
        $data['NamaPerusahaan'] = str_split($Rekanan->NamaPerusahaan);
        $data['Alamat'] = str_split($Rekanan->Alamat);
        $tanggal = '01-'.$masapajak[0].'-'.$masapajak[1];
        $tanggal1 = new \DateTime($tanggal);
        $tanggal2 = clone $tanggal1;
        $tanggal2->add(DateInterval::createFromDateString('1 month'));
        $tanggal2->add(DateInterval::createFromDateString('-1 day'));
        
        $data1 = DB::table('Pembayaran')
                    ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                    ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                    ->join('Jenissetoran', 'Jenissetoran.id_JenisSetoran', '=', 'Pekerjaan.id_JenisSetoran')
                    ->join('Jenispajak', 'Jenispajak.KodeJenisPajak', '=', 'Jenissetoran.KodeJenisPajak')
                    ->where('Rekanan.id_rekanan', $id_rekanan)
                    ->where('Jenispajak.id', 2)
                    ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                    ->get();
        $data['NOP'][5] = NULL;$data['PPh'][5]=NULL;
        $data['NOP'][6] = NULL;$data['PPh'][6]=NULL;
        $data['NOP'][7] = NULL;$data['PPh'][7]=NULL;
        $data['NOP'][8] = NULL;$data['PPh'][8]=NULL;
        foreach($data1 as $item){
            $kategori = $item->id_JenisSetoran;
            if(isset($data['NOP'][$kategori])){
                $data['NOP'][$kategori] += $item->NilaiPembayaran;
                $data['PPh'][$kategori] += $item->NilaiPPh;
            }else{
                $data['NOP'][$kategori] = $item->NilaiPembayaran;
                $data['PPh'][$kategori] = $item->NilaiPPh;
            }
        }
        if($data['NOP'][5] != NULL){
            $data['SewaNOP'] = number_format($data['NOP'][5], 0, ',', '.');$data['SewaPPh'] = number_format($data['PPh'][5], 0, ',', '.');
        }else{
            $data['SewaNOP'] = $data['NOP'][5];$data['SewaPPh'] = $data['PPh'][5];
        }
        if($data['NOP'][6] != NULL){
            $data['Teknik1NOP'] = number_format($data['NOP'][6], 0, ',', '.');$data['Teknik1PPh'] = number_format($data['PPh'][6], 0, ',', '.');
        }else{
            $data['Teknik1NOP'] = $data['NOP'][6];$data['Teknik1PPh'] = $data['PPh'][6];
        }
        if($data['NOP'][7] != NULL){
            $data['Teknik2NOP'] = number_format($data['NOP'][7], 0, ',', '.');$data['Teknik2PPh'] = number_format($data['PPh'][7], 0, ',', '.');
        }else{
            $data['Teknik2NOP'] = $data['NOP'][7];$data['Teknik2PPh'] = $data['PPh'][7];
        }
        if($data['NOP'][8] != NULL){
            $data['Teknik3NOP'] = number_format($data['NOP'][8], 0, ',', '.');$data['Teknik3PPh'] = number_format($data['PPh'][8], 0, ',', '.');
        }else{
            $data['Teknik3NOP'] = $data['NOP'][8];$data['Teknik3PPh'] = $data['PPh'][8];
        }
        $data['JumlahNOP'] = $data['NOP'][5] + $data['NOP'][6] + $data['NOP'][7] + $data['NOP'][8];
        $data['JumlahPPh'] = $data['PPh'][5] + $data['PPh'][6] + $data['PPh'][7] + $data['PPh'][8];
        $nominal_pph = BaseController::terbilang($data['JumlahPPh']);
        $data['terbilang'] = preg_replace('~((?:\S*?\s){7})~', "$1\n", $nominal_pph);
        $data['JumlahNOP'] = number_format($data['JumlahNOP'], 0, ',', '.');
        $data['JumlahPPh'] = number_format($data['JumlahPPh'], 0, ',', '.');
        
        $bendahara = Pegawai::where('id_pegawai', 1)->first();
        $data['NamaBendahara'] = str_split($bendahara->Nama);
        $data['NpwpBendahara'] = str_split($bendahara->Npwp);
        return View::make('cetak.SPTMasa23', $data);
    }
    
    public function SPTMasa4($id, $masa_pajak){
        $id_rekanan = $id;
        $masapajak = explode('-', $masa_pajak);
        $data['masa_bulan'] = str_split($masapajak[0]);
        $data['masa_tahun'] = str_split($masapajak[1]);
        $Rekanan = Rekanan::where('id_rekanan', $id_rekanan)->first();
        $data['NPWP'] = str_split($Rekanan->NPWP);
        $data['NamaPerusahaan'] = str_split($Rekanan->NamaPerusahaan);
        $data['Alamat'] = str_split($Rekanan->Alamat);
        $tanggal = '01-'.$masapajak[0].'-'.$masapajak[1];
        $tanggal1 = new \DateTime($tanggal);
        $tanggal2 = clone $tanggal1;
        $tanggal2->add(DateInterval::createFromDateString('1 month'));
        $tanggal2->add(DateInterval::createFromDateString('-1 day'));
        $data1 = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                ->join('Jenissetoran', 'Jenissetoran.id_JenisSetoran', '=', 'Pekerjaan.id_JenisSetoran')
                ->where('Rekanan.id_rekanan', $id_rekanan)
                ->where('Pekerjaan.KategoriPelaksana', '1')
                ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                ->get();
        $data2 = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                ->join('Jenissetoran', 'Jenissetoran.id_JenisSetoran', '=', 'Pekerjaan.id_JenisSetoran')
                ->where('Rekanan.id_rekanan', $id_rekanan)
                ->where('Pekerjaan.KategoriPelaksana', '2')
                ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                ->get();
        $data3 = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Rekanan', 'Rekanan.id_rekanan', '=', 'Pekerjaan.id_rekanan')
                ->join('Jenissetoran', 'Jenissetoran.id_JenisSetoran', '=', 'Pekerjaan.id_JenisSetoran')
                ->where('Rekanan.id_rekanan', $id_rekanan)
                ->where('Pekerjaan.KategoriPelaksana', '3')
                ->whereBetween('Pembayaran.TanggalPembayaran', array($tanggal1,$tanggal2))
                ->get();
        if(count($data1)){
            $PerencanaNOP = 0;
            $PerencanaPPh = 0;
            foreach($data1 as $item){
                $PerencanaNOP += $item->NilaiPembayaran;
                $PerencanaPPh += $item->NilaiPPh;
                $data['PerencanaTarif'] = $item->Tarif * 100;
            }
            $data['PerencanaNOP'] = number_format($PerencanaNOP, 0, ',', '.');
            $data['PerencanaPPh'] = number_format($PerencanaPPh, 0, ',', '.');
            $data['PerencanaTarif'] .= '%';
        }else{ $data['PerencanaNOP'] = ''; $data['PerencanaPPh'] = ''; $data['PerencanaTarif'] = '';$PerencanaNOP = NULL; $PerencanaPPh = NULL;}
        if(count($data2)){
            $PelaksanaNOP = 0;
            $PelaksanaPPh = 0;
            foreach($data2 as $item){
                $PelaksanaNOP += $item->NilaiPembayaran;
                $PelaksanaPPh += $item->NilaiPPh;
                $data['PelaksanaTarif'] = $item->Tarif * 100;
            }
            $data['PelaksanaNOP'] = number_format($PelaksanaNOP, 0, ',', '.');
            $data['PelaksanaPPh'] = number_format($PelaksanaPPh, 0, ',', '.');
            $data['PelaksanaTarif'] .= '%';
        }else{ $data['PelaksanaNOP'] = ''; $data['PelaksanaPPh'] = ''; $data['PelaksanaTarif'] = '';$PelaksanaNOP = NULL; $PelaksanaPPh = NULL;}
        if(count($data3)){
            $PengawasNOP = 0;
            $PengawasPPh = 0;
            foreach($data3 as $item){
                $PengawasNOP += $item->NilaiPembayaran;
                $PengawasPPh += $item->NilaiPPh;
                $data['PengawasTarif'] = $item->Tarif * 100;
            }
            $data['PengawasNOP'] = number_format($PengawasNOP, 0, ',', '.');
            $data['PengawasPPh'] = number_format($PengawasPPh, 0, ',', '.');
            $data['PengawasTarif'] .= '%';
        }else{ $data['PengawasNOP'] = ''; $data['PengawasPPh'] = ''; $data['PengawasTarif'] ='';$PengawasNOP = NULL; $PengawasPPh = NULL;}
        $data['JumlahNOP'] = $PerencanaNOP + $PelaksanaNOP + $PengawasNOP;
        $data['JumlahPPh'] = $PerencanaPPh + $PelaksanaPPh + $PengawasPPh;
        $nominal_pph = BaseController::terbilang($data['JumlahPPh']);
        $data['terbilang'] = preg_replace('~((?:\S*?\s){7})~', "$1\n", $nominal_pph);
        $data['JumlahNOP'] = number_format($data['JumlahNOP'], 0, ',', '.');
        $data['JumlahPPh'] = number_format($data['JumlahPPh'], 0, ',', '.');
        $bendahara = Pegawai::where('id_pegawai', 1)->first();
        $data['NamaBendahara'] = str_split($bendahara->Nama);
        $data['NpwpBendahara'] = str_split($bendahara->Npwp);
//        echo $id.' dan '.$masa_pajak.' dan '.$tanggal.' dan '.$data['PerencanaTarif'];
        return View::make('cetak.SPTMasa4', $data);
    }
}

