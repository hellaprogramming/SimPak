<?php

class Cpembayaran extends BaseController {

    public function indexPasal22() {
        $data['db'] = DB::table('Pekerjaan')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->where('Jenispajak.id', 1)
                ->where('Pekerjaan.PersentasePekerjaan', '!=', 100)
                ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                ->get();
        $data['title'] = 'Pembayaran PPh Pasal 22';
        $dataSementara = array();
        foreach ($data['db'] as $key => $i) {
            $tanggal = new \DateTime($i->tanggalKontrak);
            $dataSementara[$key] = array(
                'id_pekerjaan' => $i->id_pekerjaan, //$i['id_pekerjaan'],
                'NamaPekerjaan' => $i->NamaPekerjaan, //$i['NamaPekerjaan'],
                'tanggalKontrak' => $tanggal->format('d-m-Y'),
                'PersentasePekerjaan' => $i->PersentasePekerjaan, //$i['PersentasePekerjaan'],
                'NamaPerusahaan' => $i->NamaPerusahaan//$i['NamaPerusahaan']
            );
        }
        $data['db'] = json_decode(json_encode($dataSementara), false);
        $data['idPajak'] = '1';
        return View::make('v_pembayaran', $data);
    }

    public function indexPasal23() {
        $data['db'] = DB::table('Pekerjaan')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->where('Jenispajak.id', 2)
                ->where('Pekerjaan.PersentasePekerjaan', '!=', 100)
                ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                ->get();
        $data['title'] = 'Pembayaran PPh Pasal 23';
        $dataSementara = array();
        foreach ($data['db'] as $key => $i) {
            $tanggal = new \DateTime($i->tanggalKontrak);
            $dataSementara[$key] = array(
                'id_pekerjaan' => $i->id_pekerjaan, //$i['id_pekerjaan'],
                'NamaPekerjaan' => $i->NamaPekerjaan, //$i['NamaPekerjaan'],
                'tanggalKontrak' => $tanggal->format('d-m-Y'),
                'PersentasePekerjaan' => $i->PersentasePekerjaan, //$i['PersentasePekerjaan'],
                'NamaPerusahaan' => $i->NamaPerusahaan//$i['NamaPerusahaan']
            );
        }
        $data['db'] = json_decode(json_encode($dataSementara), false);
        $data['idPajak'] = '2';
        return View::make('v_pembayaran', $data);
    }

    public function indexPasal4() {
        $data['db'] = DB::table('Pekerjaan')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->where('Jenispajak.id', 3)
                ->where('Pekerjaan.PersentasePekerjaan', '!=', 100)
                ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                ->get();
        $data['title'] = 'Pembayaran PPh Pasal 4 ayat (2)';
        $dataSementara = array();
        foreach ($data['db'] as $key => $i) {
            $tanggal = new \DateTime($i->tanggalKontrak);
            $dataSementara[$key] = array(
                'id_pekerjaan' => $i->id_pekerjaan, //$i['id_pekerjaan'],
                'NamaPekerjaan' => $i->NamaPekerjaan, //$i['NamaPekerjaan'],
                'tanggalKontrak' => $tanggal->format('d-m-Y'),
                'PersentasePekerjaan' => $i->PersentasePekerjaan, //$i['PersentasePekerjaan'],
                'NamaPerusahaan' => $i->NamaPerusahaan//$i['NamaPerusahaan']
            );
        }
        $data['db'] = json_decode(json_encode($dataSementara), false);
        $data['idPajak'] = '3';
        return View::make('v_pembayaran', $data);
    }

    public function FormTambahPembayaran($id){
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('d-m-Y');
        $objek = DB::table('Pekerjaan')
                        ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                        ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.kodeJenisPajak')
                        ->where('Pekerjaan.id_pekerjaan', $id)->first();
        $idPajak = $objek->id;
        $BuatNomor = BaseController::buatNoPotong($idPajak);
        
        $getTotalPembayaran = Pembayaran::where('id_pekerjaan', $id)->get();
        $totalPembayaran = 0;
        foreach($getTotalPembayaran as $item){
            $totalPembayaran += $item->NilaiPembayaran;
        }
        $sisaPembayaran = $objek->NilaiKontrak - $totalPembayaran;

        return View::make('v_pembayaran_modal')
                ->with('datas', $objek)
                ->with('TglSekarang', $hariini)
                ->with('sisaPembayaran', $sisaPembayaran)
                ->with('BuatNomor', $BuatNomor);
    }


    public function TambahPembayaran() {
        //date_default_timezone_set('Asia/Jakarta');
        $tanggalPekerjaan = Input::get('tanggalKontrak');
        $PersentasePekerjaanAwal = Input::get('PersentasePekerjaanAwal');
        $PersentasePekerjaanAwalplus = Input::get('PersentasePekerjaanAwal') + 1;
        $selisihTanggal = BaseController::selisihTanggal($tanggalPekerjaan, Input::get('TanggalPembayaran'));
        $sisaPembayaran = Input::get('sisaPembayaran') - Input::get('NilaiPembayaran');
        $validasiProgress = 1;
        $validasiProgress2 = 1;
        $progress = Input::get('PersentasePekerjaan');
        if( $progress < 100 & $sisaPembayaran == 0 ){
            $validasiProgress = 0;
        }
        if($progress == 100 && ($sisaPembayaran < 0 || $sisaPembayaran > 0)){
            $validasiProgress2 = 0;
        }
        $input = array(
            //'TanggalPembayaran' => $hariini,
            'sisaPembayaran' => $sisaPembayaran,
            'selisihTanggal' => $selisihTanggal,
            'validasiProgress' => $validasiProgress,
            'validasiProgress2' => $validasiProgress2,
            'NomorPemotongan' => Input::get('NomorPemotongan'),
            'noFaktur' => Input::get('noFaktur'),
            'PersentasePekerjaan' => Input::get('PersentasePekerjaan'),
            'NilaiPembayaran' => Input::get('NilaiPembayaran'),
            'NilaiPPh' => Input::get('NilaiPPh'),
            'NilaiPPN' => Input::get('NilaiPPN'),
            'NilaiDasarPengenaan' => Input::get('NilaiDasarPengenaan'),
            'KetPembayaran' => Input::get('KetPembayaran')
        );
        $rules = array(
            //'TanggalPembayaran' => 'required|date_format:d-m-Y',
            'sisaPembayaran' => 'numeric|min:0',
            'selisihTanggal'  => 'numeric|min:0',
            'validasiProgress' => 'numeric|min:1',
            'validasiProgress2' => 'numeric|min:1',
            'NomorPemotongan' => 'required',
            'noFaktur' => 'required',
            'PersentasePekerjaan' => 'required|numeric|min:'.$PersentasePekerjaanAwalplus,
            'NilaiPembayaran' => 'required|numeric',
            'NilaiPPh' => 'required|numeric',
            'NilaiPPN' => 'required|numeric',
            'NilaiDasarPengenaan' => 'required|numeric',
            'KetPembayaran' => 'required'
        );
        $messages = array(
            'sisaPembayaran.min' => '<b>Nilai Pembayaran</b> tidak boleh melebihi <b>Sisa Pembayaran</b>',
            'validasiProgress.min' => 'Baris <b>Untuk Progess</b> Harus 100%,Sisa Pembayaran telah habis',
            'validasiProgress2.min' => 'Baris <b>Untuk Progess</b> tidak boleh 100%, masih terdapat Sisa Pembayaran',
            'TanggalPembayaran.required' => 'Baris <b>Tanggal Pembayaran</b> tidak boleh kosong.',
            'TanggalPembayaran.date_format' => 'Baris <b>Tanggal Pembayaran</b> harus sesuai format tgl-bln-thn (xx-xx-xxxx).',
            'selisihTanggal.min' => '<b>Tanggal Pembayaran</b> tidak boleh dibawah Tanggal Pekerjaan '.$tanggalPekerjaan.'.',
            'NomorPemotongan.required' => 'Baris <b>No. Pemotongan</b> tidak boleh kosong.',
            'noFaktur.required' => 'Baris <b>No. Faktur</b> tidak boleh kosong.',
            'PersentasePekerjaan.required' => 'Baris <b>Untuk Progress</b> harus diisi.',
            'PersentasePekerjaan.min' => 'Baris <b>Untuk Progress</b> tidak boleh seperti persentase pekerjaan sebelumnya ('.$PersentasePekerjaanAwal.'%).',
            'NilaiPembayaran.required' => 'Baris <b>Nilai Pembayaran</b> tidak boleh kosong.',
            'NilaiPembayaran.numeric' => 'Baris <b>Nilai Pembayaran</b> tidak boleh kosong.',
            'NilaiPPh.required' => 'Baris <b>PPh</b> tidak boleh kosong.',
            'NilaiPPh.numeric' => 'Baris <b>PPh</b> tidak boleh kosong.',
            'NilaiPPN.required' => 'Baris <b>PPN</b> tidak boleh kosong.',
            'NilaiPPN.numeric' => 'Baris <b>PPN</b> tidak boleh kosong.',
            'NilaiDasarPengenaan.required' => 'Baris <b>Nilai Dasar Pengenaan Pajak</b> tidak boleh kosong.',
            'NilaiDasarPengenaan.numeric' => 'Baris <b>Nilai Dasar Pengenaan Pajak</b> tidak boleh kosong.',
            'KetPembayaran.required' => 'Baris <b>Ket Pembayaran</b> tidak boleh kosong.'
        );
        $validasi = BaseController::validasi($input, $rules, $messages);
        if($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            $tanggalPembayaran = new \DateTime(Input::get('TanggalPembayaran'));
            $inputPembayaran = array(
                'id_pekerjaan' => Input::get('id_pekerjaan'),
                'id_pegawai' => 1,
                'PersentasePembayaran' => Input::get('PersentasePekerjaan'),
                'NilaiPembayaran' => Input::get('NilaiPembayaran'),
                'NilaiPPh' => Input::get('NilaiPPh'),
                'NilaiPPN' => Input::get('NilaiPPN'),
                'NilaiDasarPengenaan' => Input::get('NilaiDasarPengenaan'),
                'NomorPemotongan' => Input::get('NomorPemotongan'),
                'noFaktur' => Input::get('noFaktur'),
                'KetPembayaran' => Input::get('KetPembayaran'),
                'TanggalPembayaran' => $tanggalPembayaran
            );
            DB::table('Pembayaran')->insert($inputPembayaran);
            $persentase = Input::get('PersentasePekerjaan');
            Pekerjaan::where('id_pekerjaan', Input::get('id_pekerjaan'))
                    ->update(array('PersentasePekerjaan' => $persentase));

            $result['success'] = Redirect::back()->with('success', 'Data Pembayaran berhasil disimpan.');
        }
        return $result;
    }
    
    public function EditPembayaran(){
        $tanggalPekerjaan = Input::get('tanggalKontrak');
        $selisihTanggal = BaseController::selisihTanggal($tanggalPekerjaan, Input::get('TanggalPembayaran'));
        $input = Input::all();
        $input = array_merge($input, array('selisihTanggal' => $selisihTanggal));
        $rules = array(
            'TanggalPembayaran' => 'required|date_format:d-m-Y',
            'selisihTanggal'  => 'numeric|min:0',
            'NomorPemotongan' => 'required',
            'noFaktur' => 'required',
            'NilaiPembayaran' => 'required|numeric',
            'NilaiPPh' => 'required|numeric',
            'NilaiPPN' => 'required|numeric',
            'NilaiDasarPengenaan' => 'required|numeric',
            'KetPembayaran' => 'required'
        );
        $messages = array(
            'TanggalPembayaran.required' => 'Baris <b>Tanggal Pembayaran</b> tidak boleh kosong.',
            'TanggalPembayaran.date_format' => 'Baris <b>Tanggal Pembayaran</b> harus sesuai format tgl-bln-thn (xx-xx-xxxx).',
            'selisihTanggal.min' => '<b>Tanggal Pembayaran</b> tidak boleh dibawah Tanggal Pekerjaan '.$tanggalPekerjaan.'.',
            'NomorPemotongan.required' => 'Baris <b>No. Pemotongan</b> tidak boleh kosong.',
            'noFaktur.required' => 'Baris <b>No. Faktur</b> tidak boleh kosong.',
            'PersentasePekerjaan.required' => 'Baris <b>Untuk Progress</b> harus diisi.',
            'NilaiPembayaran.required' => 'Baris <b>Nilai Pembayaran</b> tidak boleh kosong.',
            'NilaiPembayaran.numeric' => 'Baris <b>Nilai Pembayaran</b> tidak boleh kosong.',
            'NilaiPPh.required' => 'Baris <b>PPh</b> tidak boleh kosong.',
            'NilaiPPh.numeric' => 'Baris <b>PPh</b> tidak boleh kosong.',
            'NilaiPPN.required' => 'Baris <b>PPN</b> tidak boleh kosong.',
            'NilaiPPN.numeric' => 'Baris <b>PPN</b> tidak boleh kosong.',
            'NilaiDasarPengenaan.required' => 'Baris <b>Nilai Dasar Pengenaan Pajak</b> tidak boleh kosong.',
            'NilaiDasarPengenaan.numeric' => 'Baris <b>Nilai Dasar Pengenaan Pajak</b> tidak boleh kosong.',
            'KetPembayaran.required' => 'Baris <b>Ket Pembayaran</b> tidak boleh kosong.'
        );
        $validasi = BaseController::validasi($input, $rules, $messages);
        if($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            $tanggalPembayaran = new \DateTime(Input::get('TanggalPembayaran'));
            $inputPembayaran = array(
                'PersentasePembayaran' => Input::get('PersentasePembayaran'),
                'TanggalPembayaran' => $tanggalPembayaran,
                'NomorPemotongan' => Input::get('NomorPemotongan'),
                'NilaiPembayaran' => Input::get('NilaiPembayaran'),
                'NilaiPPh' => Input::get('NilaiPPh'),
                'KetPembayaran' => Input::get('KetPembayaran'),
                'noFaktur' => Input::get('noFaktur'),
                'NilaiPPN' => Input::get('NilaiPPN'),
                'NilaiDasarPengenaan' => Input::get('NilaiDasarPengenaan')
            );
            DB::table('Pembayaran')->where('id_pembayaran', Input::get('id_pembayaran'))->update($inputPembayaran);
            $result['success'] = Redirect::back()->with('success', 'Data Pembayaran Berhasil diupdate.');
        }
        return $result;
    }

    public function HapusPembayaran($id){
        Pembayaran::where('id_pembayaran', $id)->delete();
        return Redirect::back()->with('success', 'Data Pembayaran Berhasil dihapus.');
    }
    
    public function daftarPembayaran($id) {
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');
        $id = explode(":", $id);
        $objek = DB::table('Pembayaran')
                ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->join('Jenispajak', 'Pekerjaan.id_JenisPajak', '=', 'Jenispajak.id_JenisPajak')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->where('Pembayaran.TanggalPembayaran', $hariini)
                ->whereIn('Jenispajak.id_JenisPajak', $id)
                ->orderBy('Pembayaran.id_pembayaran', 'desc')
                ->get();
        
        return Response::json($objek);
    }
    
    public function cariDataPembayaran(){
        $berdasarkan = Input::get('periode');
        $input = Input::all();
        $rules = array(  'periode' => 'required' );
        $messages = array('periode.required' => 'Silahkan Pilih Periode.');
        if($berdasarkan == '1'){
            $input = Input::all();
            $rules = array( 'tanggal' => 'required|date_format:d-m-Y' );
            $messages = array('tanggal.required' => 'Baris tanggal harian tidak boleh kosong.',
                'tanggal.date_format' => 'Format tanggal harian harus tgl-bln-thn (xx-xx-xxx)');
        }
        $validasi = BaseController::validasi($input, $rules, $messages);
        if ($validasi->validator->fails()){
            $dataSementara['error'] = $validasi->PesanError;
        }else{
            $id = Input::get('id_pajak');
            if( $berdasarkan == '1'){
                $tanggal1 = new \DateTime(Input::get('tanggal'));
                $tanggal = array($tanggal1, $tanggal1);
            }else{
                $tanggal1 = '01-'.Input::get('tanggal1').'-'.Input::get('tanggal2');
                $tanggal1 = new \DateTime($tanggal1);
                $tanggal2 = clone $tanggal1;
                $tanggal2->add(DateInterval::createFromDateString('1 month'));
                $tanggal2->add(DateInterval::createFromDateString('-1 day'));
                $tanggal = array($tanggal1, $tanggal2);
            };

            $objek = DB::table('Pembayaran')
                    ->join('Pekerjaan', 'Pembayaran.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                    ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=' ,'Jenissetoran.id_JenisSetoran')
                    ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                    ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                    ->whereBetween('Pembayaran.TanggalPembayaran', $tanggal)
                    ->where('Jenispajak.id', $id)
                    ->orderBy('Pembayaran.TanggalPembayaran', 'asc')
                    ->get();
            $dataSementara = array();
            foreach ($objek as $i => $item){
                $NilaiPembayaran = number_format($item->NilaiPembayaran, 0, ',', '.');
                $NilaiPPh = number_format($item->NilaiPPh, 0, ',', '.');
                $tanggal = new \DateTime($item->TanggalPembayaran);
                $dataSementara[$i] = array(
                    'id_pembayaran' => $item->id_pembayaran,
                    'NamaPekerjaan' => $item->NamaPekerjaan,
                    'TanggalPembayaran' => $tanggal->format('d-m-Y'),
                    'NilaiPembayaran' => $NilaiPembayaran,
                    'NilaiPPh' => $NilaiPPh,
                    'PersentasePembayaran' => $item->PersentasePembayaran,
                    'NamaPerusahaan' => $item->NamaPerusahaan
                );
            }
        }
        
        $objek = json_decode(json_encode($dataSementara),false);
        return Response::json($objek);
    }

}