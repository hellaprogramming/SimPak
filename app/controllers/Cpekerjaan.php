<?php
class Cpekerjaan extends BaseController {

//    public function index() {
//        //$arrayDB = json_decode(json_encode($data['db']),true); //konversi objek ke array
//        //$data['db'] = Paginator::make($dataSementara, count($dataSementara), '2');
//        //$data['db'] = json_decode(json_encode($paginator),false); // konversi array ke objek
//       //echo var_dump($data);
//        return View::make('v_pekerjaan');
//    }
    public function index22() {
        $data['page_header'] = 'Pekerjaan PPh Pasal 22';
        $data['jenis_pajak'] = 'PPh Pasal 22';
        $data['kategori'] = Jenissetoran::join('Jenispajak', 'Jenispajak.KodeJenisPajak', '=', 'Jenissetoran.KodeJenisPajak')
                ->where('Jenispajak.id', 1)->get();
        return View::make('v_pekerjaan_pasal', $data);
    }
    public function index23() {
        $data['page_header'] = 'Pekerjaan PPh Pasal 23';
        $data['jenis_pajak'] = 'PPh Pasal 23';
        $data['kategori'] = Jenissetoran::join('Jenispajak', 'Jenispajak.KodeJenisPajak', '=', 'Jenissetoran.KodeJenisPajak')
                ->where('Jenispajak.id', 2)->get();
        return View::make('v_pekerjaan_pasal', $data);
    }
    public function index4() {
        $data['page_header'] = 'Pekerjaan PPh Pasal 4';
        $data['jenis_pajak'] = 'PPh Pasal 4 ayat(2) Jasa Konstruksi';
        $data['kategori'] = Jenissetoran::join('Jenispajak', 'Jenispajak.KodeJenisPajak', '=', 'Jenissetoran.KodeJenisPajak')
                ->where('Jenispajak.id', 3)->get();
        return View::make('v_pekerjaan_pasal', $data);
    }
    
    public function TambahPekerjaan() {
        $input = Input::all();
        $rules = array(
                    'TanggalKontrak' => 'required|date_format:d-m-Y',
                    'NamaPekerjaan' => 'required',
                    'pilihan-jenis-setoran' => 'required',
                    'NilaiKontrak' => 'required',
                    'MetodeHitung' => 'required',
                    'id_rekanan' => 'required'
                );
        $messages = array(
                        'TanggalKontrak.required' => 'Baris <b>Tanggal Pekerjaan</b> harus diisi.',
                        'TanggalKontrak.date_format' => 'Baris <b>Tanggal Pekerjaan</b> harus sesuai format tgl-bln-thn (xx-xx-xxxx).',
                        'NamaPekerjaan.required' => 'Baris <b>Nama Pekerjaan</b> harus diisi.',
                        'pilihan-jenis-setoran.required' => 'Baris <b>Jenis Setoran</b> harus dipilih.',
                        'NilaiKontrak.required' => 'Baris <b>Nilai Pekerjaan</b> harus diisi.',
                        'MetodeHitung.required' => 'Silahkan pilih <b>Include Pajak</b> atau tidak.',
                        'id_rekanan.required' => 'Silahkan pilih <b>Rekanan</b> berdasarkan autocomplete.'
                    );
        if(Input::get('jenis_pajak') == 'Pekerjaan PPh Pasal 4'){
            $rules = array(
                    'TanggalKontrak' => 'required|date_format:d-m-Y',
                    'NamaPekerjaan' => 'required',
                    'pilihan-jenis-setoran' => 'required',
                    'pilihan-kategori-pelaksana' => 'required',
                    'NilaiKontrak' => 'required',
                    'MetodeHitung' => 'required',
                    'id_rekanan' => 'required'
                );
            $messages = array(
                        'TanggalKontrak.required' => 'Baris <b>Tanggal Pekerjaan</b> harus diisi.',
                        'TanggalKontrak.date_format' => 'Baris <b>Tanggal Pekerjaan</b> harus sesuai format tgl-bln-thn (xx-xx-xxxx).',
                        'NamaPekerjaan.required' => 'Baris <b>Nama Pekerjaan</b> harus diisi.',
                        'pilihan-jenis-setoran.required' => 'Baris <b>Jenis Setoran</b> harus dipilih.',
                        'pilihan-kategori-pelaksana.required' => 'Baris <b>Kategori Pelaksana</b> harus dipilih.',
                        'NilaiKontrak.required' => 'Baris <b>Nilai Pekerjaan</b> harus diisi.',
                        'MetodeHitung.required' => 'Silahkan pilih <b>Include Pajak</b> atau tidak.',
                        'id_rekanan.required' => 'Silahkan pilih <b>Rekanan</b> berdasarkan autocomplete.'
                    );
        }
        $validasi = BaseController::validasi($input, $rules, $messages);
        if($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            $tanggalKontrak = new \DateTime(Input::get('TanggalKontrak'));
            $inputdb = array(
                    'id_rekanan' => Input::get('id_rekanan'),
                    'id_JenisSetoran' => Input::get('pilihan-jenis-setoran'),
                    'NamaPekerjaan' => Input::get('NamaPekerjaan'),
                    'NilaiKontrak' => Input::get('NilaiKontrak'),
                    'PersentasePekerjaan' => 0,
                    'MetodeHitung' => Input::get('MetodeHitung'),
                    'tanggalKontrak' => $tanggalKontrak
                );
            if(Input::get('jenis_pajak') == 'Pekerjaan PPh Pasal 4'){
                $array = array('KategoriPelaksana' => Input::get('pilihan-kategori-pelaksana'));
                $inputdb = array_merge($inputdb, $array);
            }
            Pekerjaan::create($inputdb);
            $result['success'] = 'Data Pekerjaan Berhasil ditambahkan.';
        }
        return $result;
    }
    
    public function EditPekerjaan(){
        $input = Input::all();
        $rules = array(
                    'TanggalKontrak' => 'required|date_format:d-m-Y',
                    'NamaPekerjaan' => 'required',
                    'pilihan-setoran-pajak' => 'required',
                    'NilaiKontrak' => 'required',
                    'MetodeHitung' => 'required',
                    'id_rekanan' => 'required'
                );
        $messages = array(
                        'TanggalKontrak.required' => 'Baris <b>Tanggal Pekerjaan</b> harus diisi.',
                        'TanggalKontrak.date_format' => 'Baris <b>Tanggal Pekerjaan</b> harus sesuai format tgl-bln-thn (xx-xx-xxxx).',
                        'NamaPekerjaan.required' => 'Baris <b>Nama Pekerjaan</b> harus diisi.',
                        'pilihan-setoran-pajak.required' => 'Baris <b>Jenis Setoran</b> harus dipilih.',
                        'NilaiKontrak.required' => 'Baris <b>Nilai Pekerjaan</b> harus diisi.',
                        'MetodeHitung.required' => 'Silahkan pilih <b>Include Pajak</b> atau tidak.',
                        'id_rekanan.required' => 'Silahkan pilih <b>Rekanan</b> berdasarkan autocomplete.'
                    );
        if(Input::get('jenis_pajak') == 'PPh Pasal 4 Ayat (2)'){
            $rules2 = array(
                    'pilihan-kategori-pelaksana' => 'required',
                );
            $rules = array_merge($rules, $rules2);
            $messages2 = array(
                        'pilihan-kategori-pelaksana.required' => 'Baris <b>Kategori Pelaksana</b> harus dipilih.',
                    );
            $messages = array_merge($messages, $messages2);
        }
        $validasi = BaseController::validasi($input, $rules, $messages);
        if($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            $tanggalKontrak = new \DateTime(Input::get('TanggalKontrak'));
            $inputdb = array(
                    'id_rekanan' => Input::get('id_rekanan'),
                    'id_JenisSetoran' => Input::get('pilihan-setoran-pajak'),
                    'NamaPekerjaan' => Input::get('NamaPekerjaan'),
                    'NilaiKontrak' => Input::get('NilaiKontrak'),
                    'PersentasePekerjaan' => Input::get('PersentasePekerjaan'),
                    'MetodeHitung' => Input::get('MetodeHitung'),
                    'tanggalKontrak' => $tanggalKontrak
                );
            if(Input::get('jenis_pajak') == 'PPh Pasal 4 Ayat (2)'){
                $array = array('KategoriPelaksana' => Input::get('pilihan-kategori-pelaksana'));
                $inputdb = array_merge($inputdb, $array);
            }
            Pekerjaan::where('id_pekerjaan', Input::get('id_pekerjaan'))->update($inputdb);
            $result['success'] = Redirect::back()->with('success', 'Data Pekerjaan Berhasil diupdate.');
        }
        return $result;
    }
    
    
    public function DaftarPekerjaan22(){
        $data['page_header'] = 'Daftar Pekerjaan PPh Pasal 22';
        $data['item'] = DB::table('Pekerjaan')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=', 'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->where('Pekerjaan.PersentasePekerjaan', '!=', '100')
                ->where('Jenispajak.id', 1)
                ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                ->get();
        $data['id_JenisPajak'] = 1;
        return View::make('v_pekerjaan_daftar', $data);
    }
    
    public function DaftarPekerjaan23(){
        $data['page_header'] = 'Daftar Pekerjaan PPh Pasal 23';
        $data['item'] = DB::table('Pekerjaan')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->join('Jenissetoran', 'Pekerjaan.id_Jenissetoran', '=', 'Jenissetoran.id_Jenissetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->where('Pekerjaan.PersentasePekerjaan', '!=', '100')
                ->where('Jenispajak.id', 2)
                ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                ->get();
        $data['id_JenisPajak'] = 2;
        return View::make('v_pekerjaan_daftar', $data);
    }
    
    public function DaftarPekerjaan4(){
        $data['page_header'] = 'Daftar Pekerjaan PPh Pasal 4 Ayat (2)';
        $data['item'] = DB::table('Pekerjaan')
                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=', 'Jenissetoran.id_JenisSetoran')
                ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->where('Pekerjaan.PersentasePekerjaan', '!=', '100')
                ->where('Jenispajak.id', 3)
                ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                ->get();
        $data['id_JenisPajak'] = 3;
        return View::make('v_pekerjaan_daftar', $data);
    }
    
    public function HapusPekerjaan($id){
        $getIdPembayaran = Pembayaran::where('id_pekerjaan', $id)->get();
        if(count($getIdPembayaran)){
            $idPembayaran = array();
            foreach ($getIdPembayaran as $i => $item){
                $idPembayaran[$i] = $item->id_pembayaran;
            }
//            Fakturpajak::whereIn('id_pembayaran', $idPembayaran)->delete();
            Pembayaran::where('id_pekerjaan', $id)->delete();
            Pekerjaan::where('id_pekerjaan', $id)->delete();
            return Redirect::back()->with('success', 'Data Pekerjaan Berhasil dihapus dan menghapus '.count($getIdPembayaran).' data Pembayaran.');
        }else{
            Pekerjaan::where('id_pekerjaan', $id)->delete();
            return Redirect::back()
                            ->with('success', 'Data Pekerjaan Berhasil dihapus.');
        }
    }

//    public function DaftarPekerjaan(){
//        date_default_timezone_set('Asia/Jakarta');
//        $hariini = date('Y-m-d');
//        $data = DB::table('Pekerjaan')
//                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
//                ->where('Pekerjaan.tanggalKontrak', $hariini)
//                ->where('Pekerjaan.PersentasePekerjaan', '!=', '100')
//                ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
//                ->get();
//        $dataSementara = array();
//        foreach ($data as $i => $item){
//            $tanggal = new \DateTime($item->tanggalKontrak);
//            $dataSementara[$i] = array(
//                'id_pekerjaan' => $item->id_pekerjaan,//$i['id_pekerjaan'],
//                'NamaPekerjaan' => $item->NamaPekerjaan,//$i['NamaPekerjaan'],
//                'tanggalKontrak' => $tanggal->format('d-m-Y'),
//                'PersentasePekerjaan' => $item->PersentasePekerjaan,//$i['PersentasePekerjaan'],
//                'NamaPerusahaan' => $item->NamaPerusahaan//$i['NamaPerusahaan']
//            );
//        }
//        $data = json_decode(json_encode($dataSementara),false);
//        return Response::json($data);
//    }
    
    public function CariPekerjaan(){
        $post = Input::get('data');
        $idJenisPajak = Input::get('id_JenisPajak');
        $berdasarkan = Input::get('berdasarkan');
        $input = array('berdasarkan' => $berdasarkan);
        $rules = array(  'berdasarkan' => 'required' );
        $messages = array('berdasarkan.required' => 'Silahkan Pilih Cari Berdasarkan.');
        if($berdasarkan == '1'){
            $input = array('data' => $post);
            $rules = array( 'data' => 'required' );
            $messages = array('data.required' => 'Baris Nama Pekerjaan tidak boleh kosong.');
        }else if($berdasarkan == '2'){
            $input = array('data' => $post);
            $rules = array( 'data' => 'required|date_format:d-m-Y' );
            $messages = array('data.required' => 'Baris Tanggal Pekerjaan tidak boleh kosong.',
                'data.date_format' => 'Format Tanggal Pekerjaan harus tgl-bln-thn (xx-xx-xxx)');
        }else if($berdasarkan == '3'){
            $input = array('data' => $post);
            $rules = array( 'data' => 'required' );
            $messages = array('data.required' => 'Baris Rekanan tidak boleh kosong.');
        }
        
        $validasi = BaseController::validasi($input, $rules, $messages);
        if ($validasi->validator->fails()){
            $dataSementara['error'] = $validasi->PesanError;
        }else{
            if($berdasarkan == '1'){
                $input = '%' . $post . '%';
                $data = DB::table('Pekerjaan')
                    ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                    ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=', 'Jenissetoran.id_JenisSetoran')
                    ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                    ->where('Jenispajak.id', $idJenisPajak)
                    ->where('Pekerjaan.NamaPekerjaan', 'like', $input)
                    ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                    ->get();
            }else if($berdasarkan == '2'){
                $tanggal = new \DateTime($post);
                $data = DB::table('Pekerjaan')
                    ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                    ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=', 'Jenissetoran.id_JenisSetoran')
                    ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                    ->where('Jenispajak.id', $idJenisPajak)
                    ->whereBetween('Pekerjaan.tanggalKontrak', array($tanggal, $tanggal))
                    ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                    ->get();
            }else if($berdasarkan == '3'){
                $input = '%' . $post . '%';
                $data = DB::table('Pekerjaan')
                    ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                    ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=', 'Jenissetoran.id_JenisSetoran')
                    ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                    ->where('Jenispajak.id', $idJenisPajak)
                    ->where('Rekanan.NamaPerusahaan', 'like', $input)
                    ->orderBy('Pekerjaan.id_pekerjaan', 'desc')
                    ->get();
            }
            $dataSementara = array();
            foreach ($data as $i => $item){
                $tanggal = new \DateTime($item->tanggalKontrak);
                $dataSementara[$i] = array(
                    'id_pekerjaan' => $item->id_pekerjaan,
                    'NamaPekerjaan' => $item->NamaPekerjaan,
                    'tanggalKontrak' => $tanggal->format('d-m-Y'),
                    'PersentasePekerjaan' => $item->PersentasePekerjaan,
                    'NamaPerusahaan' => $item->NamaPerusahaan
                );
            }
        }        
        $data = json_decode(json_encode($dataSementara),false);
        return Response::json($data);
    }
    
    public function DetailPekerjaan($id){
        $data['pekerjaan'] = DB::table('Pekerjaan')
                        ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                        ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=', 'Jenissetoran.id_JenisSetoran')
                        ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                        ->where('Pekerjaan.id_pekerjaan', $id)->first();
        $data['pembayaran'] = DB::table('Pembayaran')
                ->where('Pembayaran.id_pekerjaan', $id)
                ->get();
        return View::make('v_pekerjaan_details', $data);
    }

}
