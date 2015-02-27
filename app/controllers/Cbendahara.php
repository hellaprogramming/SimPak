<?php

class Cbendahara extends BaseController {

    protected $layout = "layouts.master";

    public function index() {
        $data['db'] = Pegawai::where('id_pegawai', 1)->first();
        return View::make('v_bendahara', $data);
    }

    public function EditBendahara() {
        $id = Input::get('id');
        $input = array(
                    'Nama' => Input::get('Nama'),
                    'Npwp' => Input::get('NPWP2'),
                    'NpwpDinas' => Input::get('NPWP'),
                    'NIP' => Input::get('NIP'),
                    'Alamat' => Input::get('Alamat'),
                    'Telepon' => Input::get('Telepon'),
                    'Email' => Input::get('Email')
                );
        $rules = array(
                    'NpwpDinas' => 'required|min:20|max:20',
                    'Nama' => 'required',
                    'NIP' => 'required|unique:pegawai,NIP,'.$id.',id_pegawai',
                    'Alamat' => 'required',
                    'Telepon' => 'required',
                    'Email' => 'required|email',
                    'Npwp' => 'required|min:20|max:20|unique:pegawai,Npwp,'.$id.',id_pegawai'
                );
        $messages = array(
                    'NpwpDinas.required' => 'Baris <b>NPWP</b> tidak boleh kosong.',
                    'NpwpDinas.min' => 'Baris <b>NPWP</b> harus 20 karakter.',
                    'NpwpDinas.max' => 'Baris <b>NPWP</b> harus 20 karakter.',
                    'Nama.required' => 'Baris <b>Nama</b> tidak boleh kosong.',
                    'NIP.required' => 'Baris <b>NIP</b> tidak boleh kosong.',
                    'NIP.unique' => 'NIP <b>'.Input::get('NIP').'</b> sudah terdaftar',
                    'Alamat.required' => 'Baris <b>ALAMAT</b> tidak boleh kosong.',
                    'Telepon.required' => 'Baris <b>No. Telepon</b> tidak boleh kosong.',
                    'Email.required' => 'Baris <b>Email</b> tidak boleh kosong.',
                    'Email.email' => '<b>Email</b> harus valid.',
                    'Npwp.required' => 'Baris <b>NPWP Penandatangan</b> tidak boleh kosong.',
                    'Npwp.min' => 'Baris <b>NPWP Penandatangan</b> harus 20 karakter.',
                    'Npwp.max' => 'Baris <b>NPWP Penandatangan</b> harus 20 karakter.',
                    'Npwp.unique' => 'NPWP <b>'.Input::get('NPWP2').'</b> sudah terdaftar.'
                );
        $validasi = BaseController::validasi($input, $rules, $messages);
        if ($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            Pegawai::where('id_pegawai', $id)->update($input);
            $result['success'] = 'Data Bendahara Berhasil diupdate.';  
        }
        return $result;
    }

}