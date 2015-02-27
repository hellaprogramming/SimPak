<head>
    <style>
        body{
            margin:0px;
        }
        .sampul{
            width: 730px;
            page-break-before: always;
        }
        .tabel-objek-pajak{
            border:solid windowtext 2.0pt;
        }
        .tabel-objek-pajak thead {
            font-family: 'Tahoma';
            font-size: 7pt;
        }
        .tabel-objek-pajak tbody {
            font-family: 'Tahoma';
            font-size: 7pt;
            text-align: center;
        }
        .tabel-objek-pajak tbody tr td{
            border-top:solid windowtext 1.0pt;
            border-right:solid windowtext 1.0pt;
        }
        .nomor{
            width: 15px;
            text-align: left;
            padding-left: 5px;
        }
        .uraian{
            text-align: left;
            width: 310px;
        }
        .uraian2{
            text-align: left;
            width: 280px;
        }
        .kjp{
            width: 54px;
        }
        .NOP{
            width: 160px;
        }
        .NOP2{
            width: 110px;
        }
        .tarif{
            width: 35px;
        }
        .PPh{
            width: 170px;
        }
        .PPh2{
            width: 130px;
        }
        .label{
            text-align: left;
            font-family: 'Tahoma';
            font-size: 8pt;
            width: 72px;
            padding-top: 1px;
            padding-bottom: 1px;
        }
        .kotak2{
            text-align: center;
            font-family: 'Tahoma';
            font-size: 8pt;
            width: 16px;
            border:solid windowtext 1.0pt;
            border-right: none;
            padding-top: 1px;
            padding-bottom: 1px;
        }
        .kotak2nd{
            font-family: 'Tahoma';
            font-size: 8pt;
            text-align: center;
            width: 16px;
            border:solid windowtext 1.0pt;
            border-right: none;
        }
        .vertical-text{
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
        }
    </style>
</head>
<body>
    <div class="sampul">
        <div style="border:solid windowtext 2.0pt;border-right: none;float: left;padding: 11px 4px 10px 4px;">
            <img src="{{ asset('assets/img/kementrianpajak.jpg') }}" style="height: 64px;vertical-align: middle;"/>
        </div>
        <div style="font-family: 'Tahoma';font-size: 8pt;border:solid windowtext 2.0pt;border-right:solid windowtext 1.0pt;border-left:solid windowtext 1.0pt;float: left;padding: 10px 5px 10px 5px;text-align: center">
            <b>KEMENTERIAN<br/>KEUANGAN R.I.<br/><br/>DIREKTORAT<br/>JENDERAL PAJAK</b>
        </div>
        <div style="padding:6px 0px 6px 0px;width: 376px;text-align: center;border:solid windowtext 2.0pt;border-left: none;border-right:solid windowtext 1.0pt;font-family: 'Tahoma';font-size: 9pt;float: left">
            <div style="border-bottom: solid windowtext 1.0pt;padding-bottom: 7px;">
                <b>SURAT PEMBERITAHUAN (SPT) MASA<div style="height: 7px;"></div>PAJAK PENGHASILAN PASAL 23 DAN/ATAU PASAL 26</b>
            </div>
            <div style="padding-top: 4px;font-size: 8pt;font-family: 'Tahoma';">
                Formulir ini digunakan untuk melaporkan Pemotongan<br/>
                Pajak Penghasilan Pasal 23 dan/atau Pasal 26
            </div>
        </div>
        <div style="padding: 6px 0px 0px 0px;float: left;text-align: center;border:solid windowtext 2.0pt;border-left: none;font-family: 'Tahoma';font-size: 8pt;">
            <div style="padding: 0px 0px 6px 13px;border-bottom: solid windowtext 1.0pt;">
                <table cellspacing="0" cellpading="5">
                    <tr>
                        <td class="kotak2" style="border-right: solid windowtext 1.0pt;">&nbsp;</td>
                        <td style="width: 0px;"></td>
                        <td style="font-family: 'Tahoma';font-size: 8pt;"><b>SPT Normal</b></td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                    <tr>
                        <td class="kotak2" style="border-right: solid windowtext 1.0pt;">&nbsp;</td>
                        <td style="width: 0px;"></td>
                        <td style="font-family: 'Tahoma';font-size: 8pt;"><b>SPT Pembetulan Ke- </line></b></td>
                    </tr>
                </table>
            </div>
            <div style="padding: 2px 29px 4px 13px;">
                <b>Masa Pajak</b>
                <table cellspacing="0" cellpading="5">
                    <tr>
                        <td class="kotak2">{{ $masa_bulan[0] }}</td>
                        <td class="kotak2">{{ $masa_bulan[1] }}</td>
                        <td class="kotak2" style="text-align: center;font-weight: bold;border:none;border-left: solid windowtext 1.0pt;">/</td>
                        <td class="kotak2">{{ $masa_tahun[0] }}</td>
                        <td class="kotak2">{{ $masa_tahun[1] }}</td>
                        <td class="kotak2">{{ $masa_tahun[2] }}</td>
                        <td class="kotak2">{{ $masa_tahun[3] }}</td>
                        <td class="kotak2" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;"></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <!--identitas start-->
        <div style="font-family: 'Tahoma';font-size: 8pt;padding: 90px 0px 2px 0px;">
            <b>BAGIAN A. IDENTITAS PEMOTONG PAJAK/WAJIB PAJAK</b>
        </div>
        <div style="border: solid windowtext 2.0pt;padding: 3px 0px 3px 14px;">
            <table cellspacing="0" cellpading="5">
                <tr>
                    <td class="label" style="font-size: 8pt;"><b>NPWP</b></td>
                    <td style="font-size: 8pt;padding-right: 15px;padding-top: 1px;padding-bottom: 1px;">:</td>
                    @for($i=0; $i<20; $i++)
                    @if($i==2 || $i==6 || $i==10 || $i==12 || $i==16)
                    <td class="kotak2" style="font-size: 8pt;border:none;border-left: solid windowtext 1.0pt;">-</td>
                    @else
                    <td class="kotak2">{{ $NPWP[$i] }}</td>
                    @endif
                    @endfor
                    <td class="kotak2" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
            </table>
            <table cellspacing="0" cellpading="5" style="margin-top:2px;">
                <tr>
                    <td class="label" style="font-size: 8pt;"><b>Nama</b></td>
                    <td style="padding-right: 15px;font-size: 8pt;">:</td>
                    {? $count = count($NamaPerusahaan) ?}
                    @if( $count > 32 )
                    {? $count = 32 ?}
                    @endif
                    {? $jNama = 32 - $count ?}
                    @for ($i = 0; $i < $count; $i++)
                    <td class="kotak2">{{ $NamaPerusahaan[$i] }}</td>
                    @endfor
                    @for ($i = 0; $i < $jNama; $i++)
                    <td class="kotak2"></td>
                    @endfor
                    <td class="kotak2" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;"></td>
                </tr>
            </table>
            <table cellspacing="0" cellpading="5" style="margin-top:2px;">
                <tr>
                    <td class="label" style="font-size: 8pt;"><b>Alamat</b></td>
                    <td style="padding-right: 15px;font-size: 8pt;">:</td>
                    {? $count = count($Alamat) ?}
                    {? $count2 = $count ?}
                    @if( $count > 32 )
                    {? $count2 = 32 ?}
                    @endif
                    {? $jAlamat = 32 - $count2 ?}
                    @for ($i = 0; $i < $count2; $i++)
                    <td class="kotak2">{{ $Alamat[$i] }}</td>
                    @endfor
                    @for ($i = 0; $i < $jAlamat; $i++)
                    <td class="kotak2"></td>
                    @endfor
                    <td class="kotak2" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;"></td>
                </tr>
            </table>
            @if($count > 32)
        <table cellspacing="0" cellpading="5" style="margin-top:2px;">
            <tr>
                <td class="label" style="font-size: 8pt;">&nbsp;</td>
                <td style="padding-right: 15px;font-size: 8pt;">&nbsp;</td>
                {? $count3 = $count ?}
                @if( $count > 64 )
                {? $count3 = 64 ?}
                @endif
                {? $jAlamat = 64 - $count3 ?}
                @for ($i = 32; $i < $count3; $i++)
                <td class="kotak2">{{ $Alamat[$i] }}</td>
                @endfor
                @for ($i = 0; $i < $jAlamat; $i++)
                <td class="kotak2"></td>
                @endfor
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;width: 0px;"></td>
            </tr>
        </table>
        @endif
        </div>
        <!--identitas end-->
        
        <div style="font-family: 'Tahoma';font-size: 8pt;padding: 1px 0px 2px 0px;">
            <b>BAGIAN B. OBJEK PAJAK<br/>1.&nbsp;&nbsp;&nbsp;PPh Pasal 23 yang telah Dipotong</b>
        </div>
        <table cellspacing="0" cellpading="5" class="tabel-objek-pajak">
            <thead>
                <tr>
                    <th colspan="2" style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;">Uraian</th>
                    <th style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;">KAP/KJS</th>
                    <th style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;padding-top: 3px;padding-bottom: 3px;">Jumlah Penghasilan Bruto (Rp)</th>
                    <th style="border-bottom: solid windowtext 1.0pt;vertical-align: middle;text-align: center;">PPh yang Dipotong (Rp)</th>
                </tr>
                <tr style="background: #cccccc;">
                    <th colspan="2" style="text-align: center;border-right: solid windowtext 1.0pt;">(1)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(2)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(3)</th>
                    <th style="text-align: center;">(4)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="nomor" style="border-right: none;">1.</td>
                    <td class="uraian">Dividen *)</td>
                    <td class="kjp">411124/101</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">2.</td>
                    <td class="uraian">Bunga **)</td>
                    <td class="kjp">411124/102</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">3.</td>
                    <td class="uraian">Royalti</td>
                    <td class="kjp">411124/103</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">4.</td>
                    <td class="uraian">Hadiah dan penghargaan</td>
                    <td class="kjp">411124/100</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                
                
                <!--tabel utama start-->
                <tr>
                    <td class="nomor" style="border-right: none;">5.</td>
                    <td class="uraian">Sewa dan Penghasilan lain sehubungan dengan penggunaan harta ***)</td>
                    <td class="kjp">411124/100</td>
                    <td class="NOP" style="">{{ $SewaNOP }}</td>
                    <td class="PPh" style="border-right: none;">{{ $SewaPPh }}</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">6.</td>
                    <td class="uraian">Jasa Teknik, Jasa Manajemen, Jasa Konsultasi dan jasa lain sesuai</td>
                    <td class="kjp">&nbsp;</td>
                    <td class="NOP" rowspan="2" style="background: #cccccc"></td>
                    <td class="PPh" rowspan="2" style="border-right: none;background: #cccccc"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">&nbsp;</td>
                    <td class="uraian">dengan PMK-244/PMK.03/2008 :</td>
                    <td class="kjp">&nbsp;</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">&nbsp;</td>
                    <td class="uraian">a.&nbsp;&nbsp;&nbsp;Jasa Teknik</td>
                    <td class="kjp">411124/104</td>
                    <td class="NOP" style="">{{ $Teknik1NOP }}</td>
                    <td class="PPh" style="border-right: none;">{{ $Teknik1PPh }}</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">&nbsp;</td>
                    <td class="uraian">b.&nbsp;&nbsp;&nbsp;Jasa Manajemen</td>
                    <td class="kjp">411124/104</td>
                    <td class="NOP" style="">{{ $Teknik2NOP }}</td>
                    <td class="PPh" style="border-right: none;">{{ $Teknik2PPh }}</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">&nbsp;</td>
                    <td class="uraian">c.&nbsp;&nbsp;&nbsp;Jasa Konsultan</td>
                    <td class="kjp">411124/104</td>
                    <td class="NOP" style="">{{ $Teknik3NOP }}</td>
                    <td class="PPh" style="border-right: none;">{{ $Teknik3PPh }}</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">&nbsp;</td>
                    <td class="uraian">d.&nbsp;&nbsp;&nbsp;Jasa lain ****)</td>
                    <td class="kjp"></td>
                    <td class="NOP" style="background: #cccccc"></td>
                    <td class="PPh" style="border-right: none;background: #cccccc"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">&nbsp;</td>
                    <td class="uraian">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1)&nbsp;&nbsp;&nbsp;@for($i=0;$i<40;$i++). @endfor</td>
                    <td class="kjp"></td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;">&nbsp;</td>
                    <td class="uraian">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2)&nbsp;&nbsp;&nbsp;@for($i=0;$i<40;$i++). @endfor</td>
                    <td class="kjp"></td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td colspan="2" >JUMLAH</td>
                    <td class="kjp" style="background: #cccccc">&nbsp;</td>
                    <td class="NOP" >{{ $JumlahNOP }}</td>
                    <td class="PPh" style="border-right: none;">{{ $JumlahPPh }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border-right: none;text-align: left;padding-left: 5px">
                        <div style="float: left;padding-right: 5px">Terbilang : </div>
                        <div style="float: left;width: 665px;"> {{ $terbilang }} Rupiah</div>
                    </td>
                </tr>
                <!--tabel utama end-->
                
                
            </tbody>
        </table>
        <div style="font-family: 'Tahoma';font-size: 8pt;padding: 1px 0px 2px 0px;">
            <b>2.&nbsp;&nbsp;&nbsp;PPh Pasal 26 yang telah Dipotong</b>
        </div>
        <table cellspacing="0" cellpading="5" class="tabel-objek-pajak">
            <thead>
                <tr>
                    <th colspan="2" style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;">Uraian</th>
                    <th style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;">KAP/KJS</th>
                    <th style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;padding-top: 3px;padding-bottom: 3px;">Jumlah Penghasilan<br/>Bruto (Rp)</th>
                    <th style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;">Perkiraan Penghasilan<br/>Netto (%)</th>
                    <th style="border-bottom: solid windowtext 1.0pt;vertical-align: middle;text-align: center;">PPh yang Dipotong (Rp)</th>
                </tr>
                <tr style="background: #cccccc;">
                    <th colspan="2" style="text-align: center;border-right: solid windowtext 1.0pt;">(1)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(2)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(3)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(4)</th>
                    <th style="text-align: center;">(5)</th>
                </tr>
            </thead>
            {? $PPh26[1] = array('uraian' => 'Dividen', 'kjp' => '411127/101')?}
            {? $PPh26[2] = array('uraian' => 'Bunga', 'kjp' => '411127/102')?}
            {? $PPh26[3] = array('uraian' => 'Royalti', 'kjp' => '411127/103')?}
            {? $PPh26[4] = array('uraian' => 'Sewa dan Penghasilan lain sehubungan penggunaan harta', 'kjp' => '411127/100')?}
            {? $PPh26[5] = array('uraian' => 'Imbalan sehubungan dengan jasa, pekerjaan dan kegiatan', 'kjp' => '411127/104')?}
            
            {? $PPh26[6] = array('uraian' => 'Hadiah dan penghargaan', 'kjp' => '411127/100')?}
            {? $PPh26[7] = array('uraian' => 'Pensiun dan pembayaran berkala', 'kjp' => '411127/100')?}
            {? $PPh26[8] = array('uraian' => 'Premi swap dan transaksi lindung nilai', 'kjp' => '411127/102')?}
            {? $PPh26[9] = array('uraian' => 'Keuntungan karena pembebasan utang', 'kjp' => '411127/100')?}
            {? $PPh26[10] = array('uraian' => 'Penjualan harta di indonesia', 'kjp' => '411127/100')?}
            
            {? $PPh26[11] = array('uraian' => 'Premi asuransi/reasuransi', 'kjp' => '411127/100')?}
            {? $PPh26[12] = array('uraian' => 'Penghasilan dan pengalihan saham', 'kjp' => '411127/100')?}
            {? $PPh26[13] = array('uraian' => 'Penghasilan Kena Pajak BUT setelah pajak', 'kjp' => '411127/105')?}
            
            
            <tbody>
                @for($i=1;$i<=13;$i++)
                <tr>
                    <td class="nomor" style="border-right: none;">{{ $i }}.</td>
                    <td class="uraian2">{{ $PPh26[$i]['uraian'] }}</td>
                    <td class="kjp">{{ $PPh26[$i]['kjp'] }}</td>
                    <td class="NOP2" style="">&nbsp;</td>
                    @if($i == 10 || $i == 11 || $i == 12)
                        <td style="width: 117px;">&nbsp;</td>
                    @else
                    <td style="width: 117px;background: #cccccc;">&nbsp;</td>
                    @endif
                    <td class="PPh2" style="border-right: none;">&nbsp;</td>
                </tr>
                @endfor
                <tr>
                    <td colspan="2" >JUMLAH</td>
                    <td class="kjp" style="background: #cccccc">&nbsp;</td>
                    <td class="NOP2" ></td>
                    <td style="background: #cccccc;"></td>
                    <td class="PPh2" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td colspan="6" style="border-right: none;text-align: left;padding-left: 5px">
                        <div style="float: left;padding-right: 5px">Terbilang : </div>
                        <div style="float: left;width: 665px;"> @for($i=0;$i<111;$i++). @endfor</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="padding: 3px 0px 3px 5px;font-family: 'Tahoma';font-size: 7pt;font-style: italic;">
            <div style="float: right;width: 350px;">
                &nbsp;&nbsp;***) Kecuali sewa tanah dan bangunan<br/>****) Apabila kurang harap dibuat lampiran tersendiri
            </div>
            <div style="width: 353px;">
                &nbsp;&nbsp;*) Tidak teramasuk dividen kepada WP Orang Pribadi Dalam Negeri<br/>
                **) Tidak termasuk bunga simpanan yang dibayarkan oleh koperasi kepada WP OP
            </div>
        </div>
        <div style="font-family: 'Tahoma';font-size: 8pt;padding: 1px 0px 2px 0px;">
            <b>BAGIAN C. LAMPIRAN</b>
        </div>
        <!--lampiran start-->
        <div style="border: solid windowtext 2.0pt;padding: 3px 0px 3px 5px;">
            <div style="float: right;width: 350px;">
                <table cellspacing="0" cellpading="5" style="font-size: 8pt;font-family: 'Tahoma';">
                    <tr>
                        <td class="nomor">4.</td>
                        <td class="kotak2">&nbsp;</td>
                        <td style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">Surat Kuasa Khusus</td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                    <tr>
                        <td class="nomor">5.</td>
                        <td class="kotak2">&nbsp;</td>
                        <td style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">Legalisasi fotocopy Surat Keterangan Domisili yang masih</td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                    <tr>
                        <td class="nomor">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td style="padding-left: 7px;padding-right: 5px;">berlaku, dalam hal PPh Pasal 26 dihitung berdasarkan tarif</td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                    <tr>
                        <td class="nomor">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td style="padding-left: 7px;padding-right: 5px;">Perjanjian Penghindaran Pajak Berganda (P3B)</td>
                    </tr>
                </table>
            </div>
            <div style="width: 350px;">
                <table cellspacing="0" cellpading="5" style="font-size: 8pt;font-family: 'Tahoma';">
                    <tr>
                        <td class="nomor">1.</td>
                        <td class="kotak2">&nbsp;</td>
                        <td style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">Surat Setoran Pajak : </td>
                        <td class="kotak2" style="width: 80px;border-right:solid windowtext 1.0pt;">&nbsp;</td>
                        <td style="padding-left: 7px;width: 100px;">lembar.</td>
                    </tr>
                    <tr><td colspan="5"></td></tr>
                    <tr>
                        <td class="nomor">2.</td>
                        <td class="kotak2">&nbsp;</td>
                        <td colspan="3" style="border-left:solid windowtext 1.0pt;padding-left: 7px;">Daftar Bukti Pemotongan PPh Pasal 23 dan/atau Pasal 26.</td>
                    </tr>
                    <tr><td colspan="5"></td></tr>
                    <tr>
                        <td class="nomor">3.</td>
                        <td class="kotak2">&nbsp;</td>
                        <td colspan="3" style="border-left:solid windowtext 1.0pt;padding-left: 7px;">Bukti Pemotongan PPh Pasal 23.</td>
                    </tr>
                    <tr><td colspan="5"></td></tr>
                    <tr>
                        <td class="nomor">&nbsp</td>
                        <td>&nbsp;</td>
                        <td style="padding-left: 7px;padding-right: 5px;">dan/atau Pasal 26 : </td>
                        <td class="kotak2" style="width: 80px;border-right:solid windowtext 1.0pt;">&nbsp;</td>
                        <td style="padding-left: 7px;">lembar.</td>
                    </tr>  
                </table>
            </div>
        </div>
        <!--lampiran end-->
        
        <!--bagian penandatangan start-->
        <div style="font-family: 'Tahoma';font-size: 8pt;padding: 1px 0px 2px 0px;">
            <b>BAGIAN D. PERNYATAAN DAN TANDA TANGAN</b>
        </div>
        <div style="border:solid windowtext 2.0pt;border-bottom: solid windowtext 1.0pt;font-family: 'Tahoma';font-size: 8pt;">
            <!--posisi kanan start-->
            <div style="float: right;width: 186px;">
                <div style="border-bottom: solid windowtext 1.0pt;text-align: center;background:#cccccc;"><b>Diisi Oleh Petugas</b></div>
                <div style="border-bottom:solid windowtext 1.0pt;padding-left: 3px;padding-bottom: 3px;">
                    SPT Masa Diterima:
                    <table cellspacing="0" cellpading="5" style="font-size: 8pt;font-family: 'Tahoma';">
                        <tr>
                            <td style="width: 15px;">&nbsp;</td>
                            <td class="kotak2" style="border-right:solid windowtext 1.0pt;">&nbsp;</td>
                            <td style="padding-left: 8px;">Langsung dari WP</td>
                        </tr>
                        <tr><td colspan="3"></td></tr>
                        <tr>
                            <td style="width: 15px;">&nbsp;</td>
                            <td class="kotak2" style="border-right:solid windowtext 1.0pt;">&nbsp;</td>
                            <td style="padding-left: 8px;">Melalui Pos</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <div style="float: left">&nbsp;</div>
                    <div class="vertical-text" style="width: 13px;margin-top: 25px;float: left;">tanggal</div>
                    <div style="float: left;padding-top: 3px;padding-left: 8px;">
                        <table cellspacing="0" cellpading="5" style="font-family: 'Tahoma';font-size: 8pt;">
                            <tr>
                                <td class="kotak2nd">&nbsp;</td>
                                <td class="kotak2nd">&nbsp;</td>
                                <td class="kotak2nd">&nbsp;</td>
                                <td class="kotak2nd">&nbsp;</td>
                                <td class="kotak2nd">2</td>
                                <td class="kotak2nd">0</td>
                                <td class="kotak2nd">&nbsp;</td>
                                <td class="kotak2nd">&nbsp;</td>
                                <td style="border-left: solid windowtext 1.0pt;"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="height: 20px;border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>tanggal</i></td>
                                <td colspan="2" style="height: 20px;border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>bulan</i></td>
                                <td colspan="4" style="height: 20px;border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>tahun</i></td>
                                <td style="border-left: solid windowtext 1.0pt;"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!--posisi kanan end-->
            <div style="width: 535px;border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 2.0pt;padding: 3px 0px 5px 3px;">
                Dengan menyadari sepenuhnya akan segala akibatnya termasuk sanksi-sanksi sesuai dengan ketentuan<br/>
                perundang-undangan yang berlaku, saya menyatakan bahwa apa yang telah saya beritahukan di atas beserta<br/>
                lampiran-lampirannya adalah benar, lengkap dan jelas.
            </div>
            <div style="width: 535px;border-right: solid windowtext 2.0pt;padding: 3px 0px 5px 3px;">
                <table cellspacing="0" cellpading="5" style="font-family: 'Tahoma';font-size: 8pt;">
                    <tr>
                        <td class="kotak2nd">x</td>
                        <td colspan="10" style="border-left: solid windowtext 1.0pt;padding-left: 8px;">PEMUNGUT PAJAK/PIMPINAN</td>
                        <td class="kotak2">&nbsp;</td>
                        <td colspan="11" style="border-left: solid windowtext 1.0pt;padding-left: 8px;">KUASA WAJIB PAJAK</td>

                    </tr>
                    <tr><td colspan="23"></td></tr>
                    <tr>
                        <td colspan="2" style="padding-right: 8px;vertical-align: bottom">Nama</td>
                        {? $count = count($NamaBendahara) ?}
                        @if($count > 24)
                            {? $count = 24 ?}
                        @endif
                        {? $jCount = 24 - $count ?}
                        @for($i=0; $i<$count; $i++)
                        <td class="kotak2nd">{{ $NamaBendahara[$i] }}</td>
                        @endfor
                        @for($j=0;$j<$jCount;$j++)
                        <td class="kotak2nd"></td>
                        @endfor
                        <td class="kotak2" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;"></td>
                    </tr>
                    <tr><td colspan="23"></td></tr>
                    <tr>
                        <td colspan="2" style="padding-right: 8px;vertical-align: bottom">NPWP</td>
                        @for($i=0; $i<20; $i++)
                        @if($i==2 || $i==6 || $i==10 || $i==12 || $i==16)
                            <td class="kotak2nd" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                        @else
                            <td class="kotak2nd">{{ $NpwpBendahara[$i] }}</td>
                        @endif
                        @endfor
                        <td class="kotak2nd" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="font-family: 'Tahoma';font-size: 8pt;width: 262px;border-left: solid windowtext 2.0pt;border-bottom: solid windowtext 2.0pt;border-right: solid windowtext 1.0pt;padding: 3px 0px 24px 3px;float: left;">
            Tanda Tangan & Cap
        </div>
        <div style="width: 269px;border-right: solid windowtext 2.0pt;border-bottom: solid windowtext 2.0pt;padding: 3px 0px 0px 3px;float: left;">
            <table cellspacing="0" cellpading="5" style="font-family: 'Tahoma';font-size: 8pt;">
                <tr>
                    <td style="padding: 0px 10px 0px 0px;vertical-align: bottom">Tanggal</td>
                    <td class="kotak2nd">&nbsp;</td>
                    <td class="kotak2nd">&nbsp;</td>
                    <td class="kotak2nd">&nbsp;</td>
                    <td class="kotak2nd">&nbsp;</td>
                    <td class="kotak2nd">2</td>
                    <td class="kotak2nd">0</td>
                    <td class="kotak2nd">&nbsp;</td>
                    <td class="kotak2nd">&nbsp;</td>
                    <td style="border-left: solid windowtext 1.0pt;"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2" style="height: 20px;border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>tanggal</i></td>
                    <td colspan="2" style="height: 20px;border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>bulan</i></td>
                    <td colspan="4" style="height: 20px;border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>tahun</i></td>
                    <td style="border-left: solid windowtext 1.0pt;"></td>
                </tr>
            </table>
        </div>
        <div style="width: 183px;border-bottom: solid windowtext 2.0pt;border-right: solid windowtext 2.0pt;padding: 3px 0px 24px 3px;float: left;font-family: 'Tahoma';font-size: 8pt;">
            Tanda Tangan
        </div>
        <!--bagian penandatangan end-->
        
    </div>
</body>