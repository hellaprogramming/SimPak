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
            font-size: 8pt;
        }
        .tabel-objek-pajak tbody {
            font-family: 'Tahoma';
            font-size: 8pt;
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
            width: 290px;
        }
        .kjp{
            width: 75px;
        }
        .NOP{
            width: 170px;
        }
        .tarif{
            width: 35px;
        }
        .PPh{
            width: 159px;
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
                <b>SURAT PEMBERITAHUAN (SPT) MASA<div style="height: 7px;"></div>PAJAK PENGHASILAN PASAL 22</b>
            </div>
            <div style="padding-top: 4px;font-size: 8pt;font-family: 'Tahoma';">
                Formulir ini digunakan untuk melaporkan Pemungutan<br/>
                Pajak Penghasilan Pasal 22
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
        <div style="font-family: 'Tahoma';font-size: 9pt;padding: 91px 0px 3px 0px;">
            <b>BAGIAN A. IDENTITAS PEMUNGUT PAJAK/WAJIB PAJAK</b>
        </div>
        <div style="border: solid windowtext 2.0pt;padding: 6px 0px 6px 14px;">
            <table cellspacing="0" cellpading="5">
                <tr>
                    <td class="label" style="font-size: 8pt;"><b>NPWP</b></td>
                    <td style="padding-right: 15px;padding-top: 1px;padding-bottom: 1px;">:</td>
                    @for($i=0; $i<20; $i++)
                    @if($i==2 || $i==6 || $i==10 || $i==12 || $i==16)
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                    @else
                    <td class="kotak2">{{ $NPWP[$i] }}</td>
                    @endif
                    @endfor
                    <td class="kotak2" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
            </table>
            <table cellspacing="0" cellpading="5" style="margin-top:2px;">
                <tr>
                    <td class="label" ><b>Nama</b></td>
                    <td style="padding-right: 15px;">:</td>
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
                    <td class="label"><b>Alamat</b></td>
                    <td style="padding-right: 15px;">:</td>
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
        
        <div style="font-family: 'Tahoma';font-size: 9pt;padding: 2px 0px 3px 0px;">
            <b>BAGIAN B. OBJEK PAJAK</b>
        </div>
        <table cellspacing="0" cellpading="5" class="tabel-objek-pajak">
            <thead>
                <tr>
                    <th colspan="2" style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;">Uraian</th>
                    <th style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;">KAP/KJS</th>
                    <th style="border: solid windowtext 1.0pt;border-top: none;border-left: none;vertical-align: middle;text-align: center;padding-top: 3px;padding-bottom: 3px;">Nilai Objek Pajak <br/>(Rp)</th>
                    <th style="border-bottom: solid windowtext 1.0pt;vertical-align: middle;text-align: center;">PPh yang Dipungut<br/>(Rp)</th>
                </tr>
                <tr style="background: #cccccc;">
                    <th colspan="2" style="text-align: center;border-right: solid windowtext 1.0pt;">(1)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(2)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(3)</th>
                    <th style="text-align: center;">(4)</th>
                </tr>
            </thead>
            <tbody>
                
                <!--tabel utama start-->
                <tr>
                    <td class="nomor" style="border-right: none;">1.</td>
                    <td class="uraian">Badan Usaha Industri/Eksportir</td>
                    <td class="kjp">411122/100</td>
                    <td class="NOP" style="">{{ $IndustriNOP }}</td>
                    <td class="PPh" style="border-right: none;">{{ $IndustriPPh }}</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">2.</td>
                    <td class="uraian" style="border-top: none;">Penjualan Barang yang tergolong Sangat Mewah</td>
                    <td class="kjp" style="border-top: none;">411122/403</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">3.</td>
                    <td class="uraian" style="border-top: none;">Pembelian Barang Oleh Bendaharawan/Badan</td>
                    <td class="kjp" style="border-top: none;">&nbsp;</td>
                    <td class="NOP" style="background: #cccccc;">&nbsp;</td>
                    <td class="PPh" style="border-right: none;background: #cccccc">&nbsp;</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;">Tertentu Yang Ditunjuk</td>
                    <td class="kjp" style="border-top: none;">411122/100</td>
                    <td class="NOP" style="">{{ $BendaharaNOP }}</td>
                    <td class="PPh" style="border-right: none;">{{ $BendaharaPPh }}</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">4.</td>
                    <td class="uraian" style="border-top: none;">Nilai Impor <u>Bank Devisa/Ditjen Bea dan Cukai</u> *)</td>
                    <td class="kjp" style="border-top: none;">&nbsp;</td>
                    <td class="NOP" style="background: #cccccc;"></td>
                    <td class="PPh" style="border-right: none;background: #cccccc"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;">a.&nbsp;&nbsp;&nbsp;&nbsp;API</td>
                    <td class="kjp" style="border-top: none;">411122/100</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;">a.&nbsp;&nbsp;&nbsp;&nbsp;Non API</td>
                    <td class="kjp" style="border-top: none;">411122/100</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">5.</td>
                    <td class="uraian" style="border-top: none;">Hasil Lelang (Ditjen Bea dan Cukai)</td>
                    <td class="kjp" style="border-top: none;">411122/100</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">6.</td>
                    <td class="uraian" style="border-top: none;">Penjualan Migas Oleh Pertamina/Badan Usaha</td>
                    <td rowspan="2" class="kjp" style="border-top: none;">&nbsp;</td>
                    <td rowspan="2" class="NOP" style="background: #cccccc;"></td>
                    <td rowspan="2" class="PPh" style="border-right: none;background: #cccccc"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;">Selain Pertamina</td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;">a.&nbsp;&nbsp;&nbsp;&nbsp;SPBU/Agen/Penyalur(Final)</td>
                    <td class="kjp" style="border-top: none;">411122/401</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;">a.&nbsp;&nbsp;&nbsp;&nbsp;Pihak lain (Tidak Final)</td>
                    <td class="kjp" style="border-top: none;">411122/100</td>
                    <td class="NOP" style=""></td>
                    <td class="PPh" style="border-right: none;"></td>
                </tr>
                <tr>
                    <td class="nomor" style="border-right: none;border-top: none;">7.</td>
                    <td class="uraian" style="border-top: none;">@for($i=0;$i<32;$i++). @endfor</td>
                    <td class="kjp" style="border-top: none;">&nbsp;</td>
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
                        <div style="float: left;width: 660px;">{{ $terbilang }} Rupiah</div>
                    </td>
                </tr>
                <!--tabel utama end-->
                
            </tbody>
        </table>
        <div style="padding: 2px 0px 3px 5px;font-family: 'Tahoma';font-size: 8pt;font-style: italic;">
            <i>*Coret yang tidak perlu</i>    
        </div>
        
        <div style="font-family: 'Tahoma';font-size: 9pt;padding: 2px 0px 3px 0px;">
            <b>BAGIAN C. LAMPIRAN</b>
        </div>
        <!--lampiran start-->
        <div style="border: solid windowtext 2.0pt;padding: 6px 0px 6px 5px;">
            <table cellspacing="0" cellpading="5" style="font-size: 8pt;font-family: 'Tahoma';">
                <tr>
                    <td class="nomor">1.</td>
                    <td class="kotak2">&nbsp;</td>
                    <td colspan="5" style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">
                        Daftar Surat Setoran Pajak PPh Pasal 22 (Khususn untuk Bank Devisa, Bendaharawan/Badan Tertentu Yang Ditunjuk dan
                    </td>
                </tr>
                <tr><td colspan="7"></td></tr>
                <tr>
                    <td colspan="2" class="nomor">&nbsp;</td>
                    <td colspan="5" style="padding-left: 8px;padding-right: 5px;">
                        Pertamina/Badam Usaha selain Pertamina).
                    </td>
                </tr>
                <tr><td colspan="7"></td></tr>
                <tr>
                    <td class="nomor">2.</td>
                    <td class="kotak2">&nbsp;</td>
                    <td colspan="3" style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">
                        Surat Setoran Pajak (SSP) yang disetor oleh importir atau Pembeli Barang sebanyak : 
                    </td>
                    <td class="kotak2" style="width: 80px;border-right:solid windowtext 1.0pt;">&nbsp;</td>
                    <td style="padding-left: 7px;width: 118px;">lembar</td>
                </tr>
                <tr><td colspan="7"></td></tr>
                <tr>
                    <td colspan="2" class="nomor">&nbsp;</td>
                    <td colspan="5" style="padding-left: 8px;padding-right: 5px;">
                        (Khusus untuk Bank Devisa, Bendaharawan/Badan Tertentu Yang Ditunjuk dan Pertamina/Badan Usaha Selain Pertamina).
                    </td>
                </tr>
                <tr><td colspan="7"></td></tr>
                <tr>
                    <td class="nomor">3.</td>
                    <td class="kotak2">&nbsp;</td>
                    <td style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">
                        SSP yang disetor oleh Pemungut Pajak sebanyak : 
                    </td>
                    <td class="kotak2" style="width: 80px;border-right:solid windowtext 1.0pt;">&nbsp;</td>
                    <td colspan="3" style="padding-left: 7px;width: 118px;">lembar</td>
                </tr>
                <tr><td colspan="7"></td></tr>
                <tr>
                    <td colspan="2" class="nomor">&nbsp;</td>
                    <td colspan="5" style="padding-left: 8px;padding-right: 5px;">
                        (Khusus untuk Badan Usaha Industri/Eksportir Tertentu, Ditjen Bea dan Cukai).
                    </td>
                </tr>
                <tr><td colspan="7"></td></tr>
                <tr>
                    <td class="nomor">4.</td>
                    <td class="kotak2">&nbsp;</td>
                    <td colspan="5" style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">
                        Daftar Bukti Pemungutan PPh Pasal 22 (Khusus untuk Badan Usaha Industri/Importir Tertentu dan Ditjen Bea dan Cukai).
                    </td>
                </tr>
                <tr><td colspan="7" style="height: 5px;"></td></tr>
                <tr>
                    <td class="nomor">5.</td>
                    <td class="kotak2">&nbsp;</td>
                    <td colspan="5" style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">
                        Bukti Pemungutan PPh Pasal 22 (Khusus untuk Badan Usaha Industri/Importir Tertentu dan Ditjen Bea dan Cukai).
                    </td>
                </tr>
                <tr><td colspan="7" style="height: 5px;"></td></tr>
                <tr>
                    <td class="nomor">6.</td>
                    <td class="kotak2">&nbsp;</td>
                    <td colspan="5" style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">
                        Daftar rincian penjualan dan retur penjualan (dalam hal ada penjualan retur).
                    </td>
                </tr>
                <tr><td colspan="7" style="height: 5px;"></td></tr>
                <tr>
                    <td class="nomor">7.</td>
                    <td class="kotak2">&nbsp;</td>
                    <td colspan="5" style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">
                        Risalah lelang (dalam hal pelaksanaan lelang).
                    </td>
                </tr>
                <tr><td colspan="7" style="height: 5px;"></td></tr>
                <tr>
                    <td class="nomor">8.</td>
                    <td class="kotak2">&nbsp;</td>
                    <td colspan="5" style="border-left:solid windowtext 1.0pt;padding-left: 7px;padding-right: 5px;">
                        Surat Kuasa Khusus.
                    </td>
                </tr>
            </table>
        </div>
        <!--lampiran end-->
        
        
        <!--bagian penandatangan start-->
        <div style="font-family: 'Tahoma';font-size: 9pt;padding: 2px 0px 3px 0px;">
            <b>BAGIAN D. PERNYATAAN DAN TANDA TANGAN</b>
        </div>
        <div style="border:solid windowtext 2.0pt;border-bottom: solid windowtext 1.0pt;font-family: 'Tahoma';font-size: 8pt;">
            <!--posisi kanan start-->
            <div style="float: right;width: 186px;">
                <div style="border-bottom: solid windowtext 1.0pt;text-align: center;background:#cccccc;"><b>Diisi Oleh Petugas</b></div>
                <div style="border-bottom:solid windowtext 1.0pt;padding-left: 3px;padding-bottom: 4px;padding-top: 2px;">
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
            <div style="width: 535px;border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 2.0pt;padding: 5px 0px 5px 3px;">
                Dengan menyadari sepenuhnya akan segala akibatnya termasuk sanksi-sanksi sesuai dengan<br/>
                ketentuan perundang-undangan yang berlaku, saya menyatakan bahwa apa yang telah saya<br/>
                beritahukan di atas beserta lampiran-lampirannya adalah benar, lengkap dan jelas.
            </div>
            <div style="width: 535px;border-right: solid windowtext 2.0pt;padding: 5px 0px 7px 3px;">
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