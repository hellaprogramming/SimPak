<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
        
        public function validasi($input, $rules, $messages){
            $validator = Validator::make(
                $input,
                $rules,
                $messages
            );
            $result = '';
            if ($validator->fails()){
                $pesan = $validator->messages();
                $pesanerror = '';
                foreach($pesan->all() as $pesan){
                    $pesanerror .= '- '.$pesan.'<br/>';
                };
                $result = $pesanerror;
            }
            $return = array( 'PesanError' => $result,
                        'validator' => $validator);
            $return = (object) $return;
            return $return;
        }
        public function buatNoPotong($idPajak){
            $JenisPajak = '';
            $tanggal = new \DateTime();
            $tanggalX = '01-'.$tanggal->format('m').'-'.$tanggal->format('Y');
            $tanggal1 = new \DateTime($tanggalX);
            $tanggal2 = clone $tanggal1;
            $tanggal2->add(DateInterval::createFromDateString('1 month'));
            $tanggal2->add(DateInterval::createFromDateString('-1 day'));
            if($idPajak == 1){$JenisPajak = '/PPh22-DPU/';}elseif($idPajak == 2){$JenisPajak = '/PPh23-DPU/';}elseif($idPajak == 3){$JenisPajak = '/PPh42-DPU/';}
            $digitPotong = DB::select('select MAX(LEFT(Pembayaran.NomorPemotongan, 3)) as digitTerakhir
                from Pembayaran
                LEFT JOIN Pekerjaan on Pekerjaan.id_pekerjaan = Pembayaran.id_pekerjaan
                LEFT JOIN Jenissetoran on Jenissetoran.id_JenisSetoran = Pekerjaan.id_JenisSetoran
                LEFT JOIN Jenispajak on Jenispajak.KodeJenisPajak = Jenissetoran.KodeJenisPajak
                where Jenispajak.id = ? and Pembayaran.TanggalPembayaran Between ? and ?', array($idPajak, $tanggal1, $tanggal2));
            $digitFaktur = DB::select('select MAX(LEFT(Pembayaran.noFaktur, 3)) as digitTerakhir
                from Pembayaran
                where Pembayaran.TanggalPembayaran Between ? and ?', array($tanggal1, $tanggal2));
            $nomorPotong = "";
            $nomorFaktur = "";
            if(count($digitPotong)){
                foreach ($digitPotong as $item){
                    $no = ((int) $item->digitTerakhir) + 1;
                    $nomorPotong = sprintf("%03s", $no);
                }
            }  else {
                $nomorPotong = '001';
            }
            if(count($digitFaktur)){
                foreach ($digitFaktur as $item){
                    $no = ((int) $item->digitTerakhir) + 1;
                    $nomorFaktur = sprintf("%03s", $no);
                }
            }  else {
                $nomorFaktur = '001';
            }
            $bulanRomawi = $this->romawiBulan($tanggal->format('m')).'/'.$tanggal->format('Y');
            $result = array('noPotong' => $nomorPotong.$JenisPajak.$bulanRomawi, 'noFaktur' => $nomorFaktur.'/PPN-DPU/'.$bulanRomawi);
            $result = (object) $result;
            return $result;
        }
        
        public function selisihTanggal($tanggalPertama, $tanggalKedua){
            $input = array('TanggalKedua' => $tanggalKedua);
            $rules = array('TanggalKedua' => 'required|date_format:d-m-Y');
            $validator = Validator::make($input, $rules);
            if($validator->fails()){
                $selisih = 0;
            }else{
                $pecah1 = explode("-", $tanggalPertama);
                $pecah2 = explode("-", $tanggalKedua);
                $date1 = $pecah1[0]; $month1 = $pecah1[1]; $year1 = $pecah1[2];
                $date2 = $pecah2[0]; $month2 = $pecah2[1]; $year2 = $pecah2[2];
                $jd1 = gregoriantojd($month1, $date1, $year1);
                $jd2 = gregoriantojd($month2, $date2, $year2);
                $selisih = $jd2 - $jd1; 
            }
            return $selisih;
        }
        
        public function terbilang($n) {
            $callfunction = new BaseController;
            $dasar = array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas');
            $satuan = array('Belas', 'Puluh', 'Seratus', 'Ratus', 'Seribu', 'Ribu', 'Juta', 'Milyar');
            switch ($n) {
                case $n < 12 : return $dasar[$n];
                    break;
                case $n < 20 : return $callfunction->terbilang($n - 10) . ' ' . $satuan[0];
                    break;
                case $n < 100 : return $callfunction->terbilang($n / 10) . ' ' . $satuan[1] . ' ' . $callfunction->terbilang($n % 10);
                    break;
                case $n < 200 : return $satuan[2] . ' ' . $callfunction->terbilang($n - 100);
                    break;
                case $n < 1000 : return $callfunction->terbilang($n / 100) . ' ' . $satuan[3] . ' ' . $callfunction->terbilang($n % 100);
                    break;
                case $n < 2000 : return $satuan[4] . ' ' . $callfunction->terbilang($n - 1000);
                    break;
                case $n < 1000000 : return $callfunction->terbilang($n / 1000) . ' ' . $satuan[5] . ' ' . $callfunction->terbilang($n % 1000);
                    break;
                case $n < 1000000000 : return $callfunction->terbilang($n / 1000000) . ' ' . $satuan[6] . ' ' . $callfunction->terbilang($n % 1000000);
                    break;
                case $n < 1000000000000 : return $callfunction->terbilang($n / 1000000000) . ' ' . $satuan[7] . ' ' . $callfunction->terbilang($n % 1000000000);
                    break;
            }
        }
        public function bulan($n){
            if($n === '01'){ $bln = 'Januari'; }else if($n === '02'){$bln = 'Februari';}
            else if($n === '03'){$bln = 'Maret';}else if($n === '04'){$bln = 'April';}
            else if($n === '05'){$bln = 'Mei';}else if($n === '06'){$bln = 'Juni';}
            else if($n === '07'){$bln = 'Juli';}else if($n === '08'){$bln = 'Agustus';}
            else if($n === '09'){$bln = 'September';}else if($n === '10'){$bln = 'Oktober';}
            else if($n === '11'){$bln = 'Nopember';}else if($n === '12'){$bln = 'Desember';}
            return $bln;
        }
        public function romawiBulan($n){
            if($n === '01'){ $bln = 'I'; }else if($n === '02'){$bln = 'II';}
            else if($n === '03'){$bln = 'III';}else if($n === '04'){$bln = 'IV';}
            else if($n === '05'){$bln = 'V';}else if($n === '06'){$bln = 'VI';}
            else if($n === '07'){$bln = 'VII';}else if($n === '08'){$bln = 'VIII';}
            else if($n === '09'){$bln = 'IX';}else if($n === '10'){$bln = 'X';}
            else if($n === '11'){$bln = 'XI';}else if($n === '12'){$bln = 'XII';}
            return $bln;
        }
}
