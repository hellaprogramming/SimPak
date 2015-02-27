<?php
Route::group(array('before' => 'auth'), function () {
    Route::get('user/ganti-password', function() {
            return View::make('v_ganti_password');
        });
    Route::post('user/proses-ganti-password', function() {
            $hashedPassword = Input::get('hashed');
            $oldPassword = Input::get('PasswordLama');
            $newPassword = Hash::make(Input::get('PasswordBaru'));
            if (Hash::check($oldPassword, $hashedPassword)) {
                $user = User::find(Input::get('id'));
                $user->password = $newPassword;
                $user->save();
                return Redirect::to('user/ganti-password')
                                ->with('success', 'Berhasil Mengganti Password !!');
            } else {
                return Redirect::to('user/ganti-password')
                                ->with('error', 'Password Lama Tidak Valid !!');
            }
        });
    Route::get('user', function() {
            $dataUser = User::join('Pegawai', 'Users.id_pegawai', '=', 'Pegawai.id_pegawai')
                    ->where('Users.id_pegawai', Auth::user()->id_pegawai )->first();
            return View::make('v_profile_pengguna')->with('data', $dataUser);
        });
    Route::get('user/edit-user/{id}', function($id){
        $getUser = User::join('Pegawai', 'Users.id_pegawai', '=', 'Pegawai.id_pegawai')
                    ->where('Users.id_pegawai', $id )->first();
        return View::make('v_profile_pengguna_edit')->with('data', $getUser);
    });
    Route::post('user/update-user', function(){
        $id = Input::get('id');
        $input = Input::all();
        $rules = array(
                'nama' => 'required',
                'email' => 'required|email',
                'nip' => 'required|unique:pegawai,NIP,'.Auth::user()->id_pegawai.',id_pegawai',
                'telepon' => 'required|numeric',    
                'alamat' => 'required'                
            );
        $messages = array(
            'nama.required' => 'Baris <b>Nama</b> Harus diisi.',
            'email.required' => 'Baris <b>Email</b> Harus diisi',
            'email.email' => 'Baris <b>Email</b> Harus valid',
            'nip.required' => 'baris <b>NIP</b> Harus diisi',
            'nip.unique' => '<b>NIP</b> sudah terdaftar.',
            'telepon.required' => 'Baris <b>Telepon</b> Harus diisi.',
            'alamat.required' => 'Baris <b>Alamat</b> Harus diisi.'            
        );
        $basecontroll = new BaseController();
        $validasi = $basecontroll->validasi($input, $rules, $messages);
        if ($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            $inputData = array(
                'Nama' => Input::get('nama'),
                'NIP' => Input::get('nip'),
                'Alamat' => Input::get('alamat'),
                'Telepon' => Input::get('telepon'),
                'Email' => Input::get('email')
                    );
            Pegawai::where('id_pegawai',$id)->update($inputData);
            $result['success'] = Redirect::back()->with('success', 'Data Anda Berhasi diupdate.');
        }
        return $result;
    });

});