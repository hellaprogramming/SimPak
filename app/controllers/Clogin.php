<?php

class Clogin extends BaseController {
   
    public function login() {
        if (Request::isMethod('get')) {
            if(Auth::check()){
                return Redirect::to('beranda');
            }else{
                return View::make('v_login');
            }
        } else if (Request::isMethod('post')) {
            $input = Input::all();
            $rules = array('username' => 'required', 'password' => 'required');
            $messages = array('username.required' => 'username tidak boleh kosong',
                        'password.required' => 'password tidak boleh kosong');
            $validasi = BaseController::validasi($input, $rules, $messages);
            if($validasi->validator->fails()){
                return Redirect::to('login')->with('error', $validasi->PesanError);
            }else{
                if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
                    return Redirect::intended('beranda');
                }else{
                    return Redirect::to('login')->with('error', 'kombinasi username dan password salah');
                }
            }
        }
    }
    
    
    public function logout(){
        Auth::logout();
        return Redirect::to('login');
    }
    

}
