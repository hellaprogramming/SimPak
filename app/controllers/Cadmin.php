<?php
class Cadmin extends BaseController {
    
    public function getAllUser(){
        $getAllUser = User::join('Pegawai', 'Users.id_pegawai', '=', 'Pegawai.id_pegawai')->get();
//        echo var_dump($getAllUser);
        return View::make('admin.v_daftar_user')->with('data', $getAllUser);
    }
    
    public function resetPassword($id){
        $user = User::find($id);
        $user->password = Hash::make(1234);
        $user->save();
        return Redirect::back()
                        ->with('success', 'Berhasil Mereset Ulang Password.');
    }
    
    public function detailUser($id){
        $user = User::join('Pegawai', 'Users.id_pegawai', '=', 'Pegawai.id_pegawai')
                ->where('Users.id', $id)->first();
        return View::make('admin.v_detail_user')->with('data', $user);
    }

    public function hapusUser($id, $username){
        User::where('id_pegawai',$id)->delete();
        Pegawai::where('id_pegawai', $id)->delete();
        return Redirect::to('daftar-user')
                        ->with('success', 'User dengan Username <b>'.$username.'</b> Berhasil dihapus.');
    }
    
    public function tambahUser(){
        $input = Input::all();
        $rules = array(
                    'username' => 'required|min:5|unique:users,username',
                    'email' => 'required|email',
                    'jenisuser' => 'required',
                    'nama' => 'required',
                    'nip' => 'required|numeric|unique:pegawai,NIP',
                    'alamat' => 'required',
                    'telepon' => 'required'
                );
        $messages = array(
                    'username.required' => 'Baris <b>Username</b> Harus diisi.',
                    'username.min' => 'Baris <b>Username</b> Minimal 5 Karakter.',
                    'username.unique' => 'User dengan username <b>'.Input::get('username').'</b> sudah terdaftar.',
                    'email.required' => 'Baris <b>Email</b> Harus diisi',
                    'email.email' => '<b>Email</b> Harus valid',
                    'jenisuser.required' => 'baris <b>Jenis User</b> Harus dipilih.',
                    'nama.required' => 'Baris <b>Nama Lengkap</b> Harus diisi.',
                    'nip.required' => 'Baris <b>NIP</b> Harus diisi.',
                    'nip.numeric' => 'Baris <b>NIP</b> Harus berupa angka.',
                    'nip.unique' => 'User dengan NIP <b>'.Input::get('nip').'</b> sudah terdaftar.',
                    'alamat.required' => 'Baris <b>Alamat</b> Harus diisi.',
                    'telepon.required' => 'Baris <b>Telepon</b> Harus diisi.'
                );
        if( Input::get('npwpX') == 1){
            $rules = array(
                    'username' => 'required|min:5|unique:users,username',
                    'email' => 'required|email',
                    'jenisuser' => 'required',
                    'nama' => 'required',
                    'npwp' => 'required|unique:pegawai,Npwp',
                    'nip' => 'required|numeric|unique:pegawai,NIP',
                    'alamat' => 'required',
                    'telepon' => 'required|numeric'
                );
            $messages = array(
                    'username.required' => 'Baris <b>Username</b> Harus diisi.',
                    'username.min' => 'Baris <b>Username</b> Minimal 5 Karakter.',
                    'username.unique' => 'User dengan username <b>'.Input::get('username').'</b> sudah terdaftar.',
                    'email.required' => 'Baris <b>Email</b> Harus diisi',
                    'email.email' => '<b>Email</b> Harus valid',
                    'jenisuser.required' => 'baris <b>Jenis User</b> Harus dipilih.',
                    'nama.required' => 'Baris <b>Nama Lengkap</b> Harus diisi.',
                    'npwp.required' => 'Baris <b>NPWP</b> Harus diisi.',
                    'npwp.unique' => 'User dengan NPWP <b>'.Input::get('npwp').'</b> sudah terdaftar.',
                    'nip.required' => 'Baris <b>NIP</b> Harus diisi.',
                    'nip.numeric' => 'Baris <b>NIP</b> Harus berupa angka.',
                    'nip.unique' => 'User dengan NIP <b>'.Input::get('nip').'</b> sudah terdaftar.',
                    'alamat.required' => 'Baris <b>Alamat</b> Harus diisi.',
                    'telepon.required' => 'Baris <b>Telepon</b> Harus diisi.'
                );
        }
        $validasi = BaseController::validasi($input, $rules, $messages);
        if ($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
                $inputPegawai = array(
                            'Nama' => Input::get('nama'),
                            'NpwpDinas' => '89.090.295.0-724.000',
                            'NIP' => Input::get('nip'),
                            'Alamat' => Input::get('alamat'),
                            'Telepon' => Input::get('telepon'),
                            'Email' => Input::get('email')
                        );
                if( Input::get('npwpX') == 1){
                    $inputPegawai = array(
                            'Nama' => Input::get('nama'),
                            'Npwp' => Input::get('npwp'),
                            'NpwpDinas' => '89.090.295.0-724.000',
                            'NIP' => Input::get('nip'),
                            'Alamat' => Input::get('alamat'),
                            'Telepon' => Input::get('telepon'),
                            'Email' => Input::get('email')
                        );
                }
                
                $sql = DB::table('Pegawai')->insertGetId($inputPegawai);
                $lastInsertedId = $sql;
                
                $user = new User;
                $user->id_pegawai = $lastInsertedId;
                $user->username = Input::get('username');
                $user->password = Hash::make(1234);
                $user->jenis_user = Input::get('jenisuser');
                $user->save();
                $result['success'] = Redirect::back()->with('success', 'User Baru Berhasil ditambahkan.');  
        }
        return $result;
    }
    
    public function getAllDataPajak(){
        $getAllJenisPajak = Jenispajak::join('Jenissetoran', 'Jenispajak.KodeJenisPajak', '=', 'Jenissetoran.KodeJenisPajak')
            ->get();
        return View::make('admin.v_data_pajak')->with('data', $getAllJenisPajak);
    }
    
    public function getEditPajak($id){
        $getEditPajak = Jenispajak::
            join('Jenissetoran', 'Jenispajak.KodeJenisPajak', '=', 'Jenissetoran.KodeJenisPajak')
            ->where('Jenissetoran.id_JenisSetoran', $id)->first();
        return View::make('admin.v_edit_data_pajak')->with('data', $getEditPajak);
    }
    
    public function updatePajak(){
        $idsetoran = Input::get('idjenissetoran');
        $idpajak = Input::get('idjenispajak');
        $input = array(
                    'KodeJenisPajak' => Input::get('kodejenispajak'),
                    'KodeJenisSetoran' => Input::get('kodejenissetoran'),
                    'Tarif' => Input::get('tarif')
                );
        $rules = array(
                    'KodeJenisPajak' => 'required|min:6',
                    'KodeJenisSetoran' => 'required|min:3',
                    'Tarif' => 'required|numeric|max:100'
                );
        $messages = array(
                    'KodeJenisPajak.required' => 'Baris <b>Kode Jenis Pajak</b> tidak boleh kosong.',
                    'KodeJenisPajak.min' => 'Baris <b>Kode Jenis Pajak</b> harus 6 digit.',
                    'KodeJenisSetoran.required' => 'Baris <b>Kode Jenis Setoran</b> tidak boleh kosong.',
                    'KodeJenisSetoran.min' => 'Baris <b>Kode Jenis Setoran</b> harus 3 digit.',
                    'Tarif.required' => 'Baris <b>Tarif</b> tidak boleh kosong.',
                    'Tarif.numeric' => 'Baris <b>Tarif</b> harus berupa angka dan koma menggunakan <b>.</b> (titik).',
                    'Tarif.max' => 'Baris <b>Tarif</b> tidak boleh melebihi 100.'
                );
        $validasi = BaseController::validasi($input, $rules, $messages);
        if ($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            $tarif = Input::get('tarif') / 100;
            $inputsetoran = array(
                    'KodeJenisSetoran' => Input::get('kodejenissetoran'),
                    'Tarif' => $tarif
                );
            $inputpajak = array(
                'KodeJenisPajak' => Input::get('kodejenispajak')
            );
            Jenispajak::where('KodeJenisPajak', $idpajak)->update($inputpajak);
            Jenissetoran::where('id_JenisSetoran', $idsetoran)->update($inputsetoran);
            Jenissetoran::where('KodeJenisPajak', $idpajak)->update($inputpajak);
            $result['success'] = Redirect::to('data-pajak')->with('success', 'Data Pajak Berhasil diupdate.'); 
        }
        return $result;
    }
    
    public function getAllInformasiPajak(){
        $data = Informasipajak::all();
        return View::make('admin.v_informasi_pajak')->with('data', $data);
    }
    
    public function getEditInformasi($id){
        $data = Informasipajak::find($id);
        return View::make('admin.v_edit_informasi_pajak')->with('data', $data);
    }
    
    public function updateInformasi(){
        $id = Input::get('id');
        $input = array(
                    'Judul' => Input::get('judul'),
                    'Konten' => input::get('konten')
                );
        $rules = array(
                    'Judul' => 'required',
                    'Konten' => 'required'
                );
        $messages = array(
                    'Judul.required' => 'Baris <b>Judul</b> tidak boleh kosong.',
                    'Konten.required' => 'Baris <b>Konten</b> tidak boleh kosong.'
                );
        $validasi = BaseController::validasi($input, $rules, $messages);
        if($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            Informasipajak::find($id)->update($input);
            $result['success'] = Redirect::back()->with('success', 'Data Master Informasi Pajak berhasil diupdate.');
        }
        return $result;
    }
    
}
