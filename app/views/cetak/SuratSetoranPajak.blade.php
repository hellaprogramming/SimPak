<head>
    <style>
        body{
            margin:0px;
        }
        .sampul{
            width: 720px;
            page-break-before: always;
        }
        .label{
            text-align: left;
            font-family: 'times new roman';
            font-size: 12pt;
            font-weight: bold;
            width: 130px;
        }
        .kotak2{
            font-family: 'times new roman';
            font-size: 11pt;
            width: 19px;
            border:solid windowtext 1.0pt;
            border-right: none;
            text-align: center;
        }
        .kotak2ketetapan{
            font-family: 'times new roman';
            font-size: 11pt;
            width: 22px;
            border:solid windowtext 1.0pt;
            border-right: none;
            text-align: center;
        }
        .kotak2bulan{
            font-family: 'arial';
            font-size: 12pt;
            width: 42px;
            height: 35px;
            border:solid windowtext 1.0pt;
            border-right: none;
            text-align: center;
            vertical-align: top;
        }
    </style>
</head>
{? $i[0]['untuk'] = 'Untuk Wajib Pajak' ?}
{? $i[1]['untuk'] = 'Untuk KPP melalui KPPN' ?}
{? $i[2]['untuk'] = 'Untuk Dilaporkan oleh WP ke KPPN' ?}
{? $i[3]['untuk'] = 'Untuk Bank Persepsi / Kantor Pos & Giro' ?}
{? $i[4]['untuk'] = 'Untuk Arsip Wajib Pungut atau pihak lain' ?}
{? $page = 1; ?}

<body>
    @foreach($i as $j)
    <div class="sampul">
        <!--baris pertama-->
        <div style="margin:0 auto;height: 93px;">
            <!--kolom pertama-->
            <div style="width: 280px;border: 2px solid;float: left;padding-bottom: 10px;">
                <img src="{{ asset('assets/img/kementrianpajak.jpg') }}" style="margin-top:5px;margin-left: 4px;"/>
                <div style="font-family: 'times new roman';font-size: 9pt;margin-left:74px;margin-top: -65px;">
                    KEMENTERIAN KEUANGAN R.I<br/>
                    DIREKTORAT JENDERAL PAJAK<br/>
                    KANTOR PELAYANAN PAJAK<br/><br/><br/>
                    <b style="text-decoration: underline;">........................................................</b>
                </div>
            </div>
            <!--kolom kedua-->
            <div style="text-align: center;height: 100%;padding-top: 25px;width: 241px;border: 2px solid;border-left:none;float:left;">
                <span style="font-family: 'times new roman';font-size: 12pt;font-weight: bold;">
                    SURAT SETORAN PAJAK
                </span>
                <span style="font-family: 'times new roman';font-size:26pt;font-weight: bold;">(SSP)</span>
            </div>
            <!--kolom ketiga-->
            <div style="height: 100%;padding-top: 23px;padding-bottom: 2px;width:191px;border: 2px solid;border-left:none;float: right;">
                <div style="padding:20px 20px 10px 30px;font-family: 'times new roman';font-size:14pt;float: left;">
                    Lembar
                </div>
                <div style="padding:9px 20px 9px 20px;font-family: 'times new roman';font-size:24pt;font-weight: bold;float:left;border:1px solid">
                    {{ $page++ }}
                </div>
                <div style="float: left;width: 100%;padding-top: 5px;font-family: 'times new roman';font-size:10pt;text-align: center;">
                    {{ $j['untuk'] }}
                </div>
            </div>
            <!--kolom tiga end-->
        </div>
        <!--baris pertama end-->

        <!--baris kedua-->
        <div style="margin:0 auto;margin-top: 0px;border:2px solid;border-top:none;padding: 45px 0px 15px 5px;">
            <table cellspacing="0" cellpading="5">
                <tr>
                    <td class="label">NPWP</td>
                    <td style="padding-right: 15px;">:</td>
                    <td class="kotak2">{{ $n[0] }}</td>
                    <td class="kotak2">{{ $n[1] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">.</td>
                    <td class="kotak2">{{ $n[3] }}</td>
                    <td class="kotak2">{{ $n[4] }}</td>
                    <td class="kotak2">{{ $n[5] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">.</td>
                    <td class="kotak2">{{ $n[7] }}</td>
                    <td class="kotak2">{{ $n[8] }}</td>
                    <td class="kotak2">{{ $n[9] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">.</td>
                    <td class="kotak2">{{ $n[11] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                    <td class="kotak2">{{ $n[13] }}</td>
                    <td class="kotak2">{{ $n[14] }}</td>
                    <td class="kotak2">{{ $n[15] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">.</td>
                    <td class="kotak2">{{ $n[17] }}</td>
                    <td class="kotak2">{{ $n[18] }}</td>
                    <td class="kotak2">{{ $n[19] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;width: 60px"></td>
                </tr>
                <tr>
                    <td colspan="23" style="font-family: 'times new roman';font-size: 8pt;"><i>Diisi sesuai dengan Nomor Pokok Wajib Pajak  yang dimiliki</i></td>
                </tr>
                <tr>
                    <td class="label">NAMA WP</td>
                    <td>:</td>
                    <td colspan="21" style="font-family: 'courier new';font-size: 12pt;">{{ $data->NamaPerusahaan }}</td>
                </tr>
                <tr>
                    <td class="label" style="vertical-align: top;">ALAMAT</td>
                    <td style="vertical-align: top;">:</td>
                    <td colspan="21" style="width: 500px;font-family: 'courier new';font-size: 12pt;">{{ $data->Alamat }}</td>
                </tr>
            </table>
        </div>
        <!--baris kedua end-->

        <!--baris ketiga start-->
        <!--kolom pertama start-->
        <div style="height: 110px;width: 280px;border: 2px solid;border-top:none;float: left;padding-bottom: 10px;">
            <div style="font-family: 'times new roman';font-size: 9pt;font-weight: bold;">
                MAP/Kode Jenis Pajak
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Kode Jenis Setoran
            </div>
            <div style="margin-top:20px;">
                <table cellspacing="0" cellpading="5">
                    <tr>
                        <td class="kotak2" style="border-left: none;">{{ $kjp[0] }}</td>
                        <td class="kotak2">{{ $kjp[1] }}</td>
                        <td class="kotak2">{{ $kjp[2] }}</td>
                        <td class="kotak2">{{ $kjp[3] }}</td>
                        <td class="kotak2">{{ $kjp[4] }}</td>
                        <td class="kotak2">{{ $kjp[5] }}</td>
                        <td style="width: 57px;border-left: solid windowtext 1.0pt;"></td>
                        <td class="kotak2">{{ $kjs[0] }}</td>
                        <td class="kotak2">{{ $kjs[1] }}</td>
                        <td class="kotak2">{{ $kjs[2] }}</td>
                        <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;"></td>
                    </tr>
                </table>
            </div>
        </div>
        <!--kolom pertama end-->
        <!--kolom kedua start-->
        <div style="height: 110px;width: 434px;border-right: 2px solid;border-bottom: 2px solid;float: right;padding-bottom: 10px;">
            <div style="width: 100%;font-family: 'times new roman';font-size: 12pt;font-weight: bold;text-align: center;">Untuk Pembayaran</div>
            <div style="font-family: 'times new roman';font-size: 12pt;text-align: justify;margin-top: 3px;padding: 0px 3px 0px 3px;">
                {{ $data->KetPembayaran }}
            </div>
        </div>
        <!--kolom kedua end-->
        <!--baris ketiga end-->

        <!--baris keempat start-->
        <div style="border:2px solid;border-top:none;">
            <table style="width: 100%;text-align: center;font-family: 'times new roman';font-size: 12pt;">
                <tr>
                    <td style="width: 80%;"><b>Masa Pajak</b></td>
                    <td style="width: 20%;"><b>Tahun</b></td>
                </tr>
            </table>
            <div style="float: left;width: 75%;padding: 10px 0px 0px 5px;">
                <table cellspacing="0" cellpading="5">
                    <tr>
                        @if($bln == '01') <td class="kotak2bulan">Jan<br/><b>x</b></td> @else <td class="kotak2bulan">Jan</td> @endif
                        @if($bln == '02') <td class="kotak2bulan">Peb<br/><b>x</b></td> @else <td class="kotak2bulan">Peb</td> @endif
                        @if($bln == '03') <td class="kotak2bulan">Mar<br/><b>x</b></td> @else <td class="kotak2bulan">Mar</td> @endif
                        @if($bln == '04') <td class="kotak2bulan">Apr<br/><b>x</b></td> @else <td class="kotak2bulan">Apr</td> @endif
                        @if($bln == '05') <td class="kotak2bulan">Mei<br/><b>x</b></td> @else <td class="kotak2bulan">Mei</td> @endif
                        @if($bln == '06') <td class="kotak2bulan">Jun<br/><b>x</b></td> @else <td class="kotak2bulan">Jun</td> @endif
                        @if($bln == '07') <td class="kotak2bulan">Jul<br/><b>x</b></td> @else <td class="kotak2bulan">Jul</td> @endif
                        @if($bln == '08') <td class="kotak2bulan">Ags<br/><b>x</b></td> @else <td class="kotak2bulan">Ags</td> @endif
                        @if($bln == '09') <td class="kotak2bulan">Sep<br/><b>x</b></td> @else <td class="kotak2bulan">Sep</td> @endif
                        @if($bln == '10') <td class="kotak2bulan">Okt<br/><b>x</b></td> @else <td class="kotak2bulan">Okt</td> @endif
                        @if($bln == '11') <td class="kotak2bulan">Nop<br/><b>x</b></td> @else <td class="kotak2bulan">Nop</td> @endif
                        @if($bln == '12') <td class="kotak2bulan">Des<br/><b>x</b></td> @else <td class="kotak2bulan">Des</td> @endif
                        <td style="border-left: solid windowtext 1.0pt;"></td>
                    </tr>
                    <tr>
                        <td colspan="13" style="font-family: 'times new roman';font-size: 8pt;">
                            <i>Beri tanda silang pada salah satu kolom bulan untuk masa yang berkenaan </i>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="float: right;width: 21%;height: 61px">
                <table cellspacing="0" cellpading="5">
                    <tr>
                        <td class="kotak2" style="border: none;width: 30px;"></td>
                        <td class="kotak2ketetapan">{{ $thn[0] }}</td>
                        <td class="kotak2ketetapan">{{ $thn[1] }}</td>
                        <td class="kotak2ketetapan">{{ $thn[2] }}</td>
                        <td class="kotak2ketetapan">{{ $thn[3] }}</td>
                        <td style="border-left: solid windowtext 1.0pt;"></td>
                    </tr>
                    <tr><td colspan="6" style="font-family: 'times new roman';font-size: 8pt;"><i>Diisi tahun Terutangnya Pajak </i></td></tr>
                </table>
            </div>
            <div style="padding-left: 5px;">
                <table cellspacing="0" cellpading="5">
                    <tr>
                        <td class="label">No Ketetapan</td>
                        <td style="padding-right: 15px;">:</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan" style="border:none;border-left: solid windowtext 1.0pt;font-size: 14pt;padding: 0px;">/</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan" style="border:none;border-left: solid windowtext 1.0pt;font-size: 14pt;padding: 0px;">/</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan" style="border:none;border-left: solid windowtext 1.0pt;font-size: 14pt;padding: 0px;">/</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan" style="border:none;border-left: solid windowtext 1.0pt;font-size: 14pt;padding: 0px;">/</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td class="kotak2ketetapan">&nbsp;</td>
                        <td style="border-left: solid windowtext 1.0pt;"></td>
                    </tr>
                    <tr>
                        <td colspan="22" style="font-family: 'times new roman';font-size: 8pt;"><i>Diisi sesuai Nomor Ketetapan : STP, SKPKB, SKPKBT</i></td>
                    </tr>
                </table>
            </div>
        </div>
        <!--baris keempat end-->

        <!--baris kelima start-->
        <!--kolom pertama-->
        <div style="height: 80px;width: 240px;border: 2px solid;border-top:none;float: left;padding-bottom: 10px;">
            <span style="font-family: 'times new roman';font-size: 12pt;padding-left: 5px;">Jumlah Pembayaran</span><br/>
            <span style="font-family: 'times new roman';font-size: 8pt;padding-left: 5px;"><i>Diisi dengan rupiah penuh</i></span><br/>
            <table style="width: 99%;font-family: 'Courier New';font-size: 12pt;padding-right: 5px;">
                <tr>
                    <td style="width: 20%">Rp</td><td style="text-align: right">
                        {{ $jumlah_pembayaran }},00
                    </td>
                </tr>
            </table>
        </div>
        <!--kolom kedua-->
        <div style="height: 80px;width: 474px;border-right: 2px solid;border-bottom: 2px solid;float: right;padding-bottom: 10px;">
            <table style="width: 99%;font-family: 'Century Gothic';font-size: 10pt;padding-right: 5px;">
                <tr>
                    <td style="vertical-align: top;width: 18%;font-family: 'times new roman';font-size: 12pt;">Terbilang :</td>
                    <td>{{ $terbilang }} Rupiah</td>
                </tr>
            </table>
        </div>
        <!--baris kelima end-->

        <!--baris keenam start-->
        <!--kolom pertama-->
        <div style="font-family: 'times new roman';font-size: 11pt;height: 150px;width: 360px;border: 2px solid;border-top:none;float: left;padding-bottom: 10px;">
            <div style="text-align: right;padding-right:20px;"><b>Diterima oleh Kantor Penerima Pembayaran</b></div>
            <div style="text-align: right;padding-right:50px;"><b>Tanggal .............................</b></div>
            <div style="font-family: 'times new roman';font-size: 8pt;text-align: right;padding-right:80px;"><i>Cap dan tanda tangan</i></div>
        </div>
        <!--kolom pertama end-->
        <!--kolom kedua-->
        <div style="height: 150px;width: 354px;border-right: 2px solid;border-bottom: 2px solid;float: right;padding-bottom: 10px;">
            <div style="font-family: 'times new roman';font-size: 11pt;padding-left: 50px;"><b>Wajib Pajak/Penyetor</b></div>
            <div style="font-family: 'times new roman';font-size: 12pt;padding-left: 30px;">Sangatta, &nbsp;&nbsp;&nbsp;{{ $TanggalPembayaran }}</div>
            <div style="font-family: 'times new roman';font-size: 9pt;text-align: center">Bendahara Pengeluaran Dinas PU Kab. Kutai Timur</div>
            <div style="padding-top: 60px;text-decoration: underline;font-family: 'times new roman';font-size: 10pt;text-align: center"><b>{{ $data2->Nama }}</b></div>
            <div style="font-family: 'times new roman';font-size: 9pt;text-align: center">{{ $data2->NIP }}</div>
        </div>
        <!--kolom kedua end-->
        <!--baris keenam end-->

        <!--baris ketujuh start-->
        <div style="float: left;border:2px solid;border-top:none;height: 135px;width: 716px;">
            <div style="font-family: 'times new roman';font-size: 12pt;padding-left: 5px;">
                <b>Ruang Validasi Kantor Penerima Pembayaran</b>
            </div>
        </div>
        <!--baris ketujuh end-->
        <span style="font-family: 'times new roman';font-size: 8pt;padding-left: 20px;"><i>Diisi sesuai buku petunjuk pengisian</i></span>
    </div>    
    @endforeach
</body>
