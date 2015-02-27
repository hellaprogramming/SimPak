<?php

class Crekanan extends BaseController {

    public function index() {
        $data['db'] = Rekanan::orderBy('id_rekanan', 'desc')->get();
        return View::make('v_rekanan', $data);
    }

    public function TambahRekanan() {
        $input = array(
            'NamaPerusahaan' => Input::get('NamaPerusahaan'),
            'NPWP' => Input::get('NPWP'),
            'NamaDirektur' => Input::get('NamaDirektur'),
            'Alamat' => Input::get('Alamat')
        );
        $rules = array(
                'NamaPerusahaan' => 'required',
                'NPWP' =>'required|min:20|unique:rekanan,NPWP',
                'NamaDirektur' => 'required',
                'Alamat' => 'required'
            );
        $messages = array(
            'NamaPerusahaan.required' => 'Baris <b>Nama rekanan Atau Wajib Pajak</b> tidak boleh kosong',
            'NPWP.required' => 'Baris <b>NPWP</b> tidak boleh kosong',
            'NPWP.min' => 'Baris <b>NPWP</b> minimal 20 karakter',
            'NPWP.unique' => 'Rekanan dengan NPWP <b>'.Input::get('NPWP').'</b> sudah terdaftar.',
            'NamaDirektur.required' => 'Baris <b>Nama Direktur</b> tidak boleh kosong.',
            'Alamat.required' => 'Baris <b>Alamat</b> tidak boleh kosong.'
        );
        $validasi = BaseController::validasi($input, $rules, $messages);
        if ($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            Rekanan::create($input);
            $result['success'] = Redirect::back()->with('success', 'Data Rekanan Berhasil ditambahkan.');
        }
        return $result;
    }

    public function EditRekanan() {
        $input = array(
            'NamaPerusahaan' => Input::get('NamaPerusahaan'),
            'NPWP' => Input::get('NPWP'),
            'NamaDirektur' => Input::get('NamaDirektur'),
            'Alamat' => Input::get('Alamat')
        );
        $rules = array(
                    'NamaPerusahaan' => 'required',
                    'NPWP' =>'required|min:20|unique:rekanan,NPWP,'.Input::get('id').',id_rekanan',
                    'NamaDirektur' => 'required',
                    'Alamat' => 'required'
                );
        $messages = array(
            'NamaPerusahaan.required' => 'Baris <b>Nama rekanan Atau Wajib Pajak</b> tidak boleh kosong',
            'NPWP.required' => 'Baris <b>NPWP</b> tidak boleh kosong',
            'NPWP.min' => 'Baris <b>NPWP</b> minimal 20 karakter',
            'NPWP.unique' => 'Rekanan dengan NPWP <b>'.Input::get('NPWP').'</b> sudah terdaftar.',
            'NamaDirektur.required' => 'Baris <b>Nama Direktur</b> tidak boleh kosong.',
            'Alamat.required' => 'Baris <b>Alamat</b> tidak boleh kosong.'
        );
        $validasi = BaseController::validasi($input, $rules, $messages);
        if ($validasi->validator->fails()){
            $result['error'] = $validasi->PesanError;
        }else{
            $id = Input::get('id');
            Rekanan::where('id_rekanan', $id)->update($input);
            $result['success'] = Redirect::back()->with('success', 'Data Rekanan Berhasil diupdate.');
        }        
        return $result;
    }

    public function HapusRekanan($id) {
        Rekanan::where('id_rekanan', $id)->delete();
        $result['success'] = Redirect::to('/profil/rekanan')->with('success', 'Data Rekanan Berhasil Dihapus.');
        return $result;
    }

}
