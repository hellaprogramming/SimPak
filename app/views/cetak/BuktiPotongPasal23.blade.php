<head>
    <style>
        .tabel-utama thead{
            font-family: "Arial";
            font-size: 10pt;
            font-weight: bold;
            background: #ebe7e7;
        }
        .head1 th{
            border:solid windowtext 1.0pt;
            border-right: none;
            border-bottom: none;
        }
        tbody {
            text-align: center;
        }
        .bodi td{
            border:solid windowtext 1.0pt;
            border-right: none;
            border-bottom: none;
            font-family: "Arial";
            font-size: 9pt;
        }
        .nomor{
            font-family: "Arial";
            font-size: 9pt;
            padding: 3px;
            vertical-align: top;
        }
        .uraian{
            font-family: "Arial";
            font-size: 9pt;
            padding: 3px;
            padding-right: 15px;
            width: 179px;
            text-align: left;
        }
        .uraianAngka{
            font-family: "Tahoma","sans-serif";
            font-size: 10pt;
            text-align: right;
            width: 160px;
            padding-right: 5px;
        }
        .label{
            text-align: left;
            font-family: 'arial';
            font-size: 9pt;
            font-weight: bold;
            width: 90px;
        }
        .kotak2{
            font-family: 'arial';
            font-size: 10pt;
            width: 19px;
            border:solid windowtext 1.0pt;
            border-right: none;
        }
        .kotakTarif{
            margin: 2px auto;
            width:15px;
            height: 15px;
            border:solid windowtext 1.0pt;
        }
    </style>
</head>
<body>
    <img src="{{ asset('assets/img/kementrianpajak.jpg') }}"/>
    <div style="font-family: 'times new roman';font-size: 8pt;font-weight: bold;text-align: center;width: 300px;margin-left:70px;margin-top: -62px;">
        KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
        DIREKTORAT JENDERAL PAJAK<br/>
        KANTOR PELAYANAN PAJAK<br/>
        ...................................................................
    </div>
    <br/>
    <div style="width: 777px;">
        <table style="background: #cccccc;margin:0 auto;" cellspacing="0" cellpading="5">
            <tr>
                <td style="font-family: 'times new roman';font-size: 11pt;font-weight: bold;
                    padding: 10px 50px 10px 50px;
                    border:solid windowtext 1.0pt;
                    text-align: center;">
                    BUKTI PEMOTONGAN PPh PASAL 23
                </td>
            </tr>
            <tr>
                <td style="font-family: 'times new roman';font-size: 11pt;font-weight: bold;
                    padding: 7px 50px 7px 50px;
                    border:solid windowtext 1.0pt;border-top:none;
                    text-align: center;">
                    Nomor: {{ $data->NomorPemotongan }}</td>
            </tr>
        </table>
    </div>
    <div style="height: 10px;">&nbsp;</div>
    <div style="width: 777px;">
        <table cellspacing="0" cellpading="5">
            <tr>
                <td class="label">NPWP</td>
                <td style="padding-right: 15px;">:</td>
                @for($i=0; $i<20; $i++)
                @if($i==2 || $i==6 || $i==10 || $i==12 || $i==16)
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                @else
                <td class="kotak2">{{ $n[$i] }}</td>
                @endif
                @endfor
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;"></td>
            </tr>
        </table>
        <table cellspacing="0" cellpading="5" style="margin-top:5px;">
            <tr>
                <td class="label">Nama</td>
                <td style="padding-right: 15px;">:</td>
                {? $count = count($NamaPerusahaan) ?}
                @if( $count > 29 )
                {? $count = 29 ?}
                @endif
                {? $jNama = 29 - $count ?}
                @for ($i = 0; $i < $count; $i++)
                <td class="kotak2">{{ $NamaPerusahaan[$i] }}</td>
                @endfor
                @for ($i = 0; $i < $jNama; $i++)
                <td class="kotak2"></td>
                @endfor
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;"></td>
            </tr>
        </table>
        <table cellspacing="0" cellpading="5" style="margin-top:5px;">
            <tr>
                <td class="label">Alamat</td>
                <td style="padding-right: 15px;">:</td>
                {? $count = count($Alamat) ?}
                {? $count2 = $count ?}
                @if( $count > 29 )
                {? $count2 = 29 ?}
                @endif
                {? $jAlamat = 29 - $count2 ?}
                @for ($i = 0; $i < $count2; $i++)
                <td class="kotak2">{{ $Alamat[$i] }}</td>
                @endfor
                @for ($i = 0; $i < $jAlamat; $i++)
                <td class="kotak2"></td>
                @endfor
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;"></td>
            </tr>
        </table>
        @if($count > 29)
        <table cellspacing="0" cellpading="5" style="margin-top:5px;">
            <tr>
                <td class="label">&nbsp;</td>
                <td style="padding-right: 14px;">&nbsp;</td>
                {? $count3 = $count ?}
                @if( $count > 58 )
                {? $count3 = 58 ?}
                @endif
                {? $jAlamat = 58 - $count3 ?}
                @for ($i = 29; $i < $count3; $i++)
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
    <br/>
    {? $NilaiPembayaran = number_format($data->NilaiPembayaran, 0, ',', '.') ?}
    {? $NilaiPPh = number_format($data->NilaiPPh, 0, ',', '.') ?}
    <!--tabel utama start-->
    <table cellspacing="0" cellpading="5" class="tabel-utama">
        <thead>
            <tr class="head1">
                <th style="width: 35px;height: 40px;">No.</th>
                <th style="width: 192px;">Jenis Penghasilan</th>
                <th style="width: 165px;">Jumlah Penghasilan<br/>Bruto (Rp)</th>
                <th style="width: 110px;font-size: 9pt;">Tarif Lebih Tinggi<br/>100% (Tdk ber-<br/>NPWP)</th>
                <th style="width: 60px">Tarif<br/>(%)</th>
                <th style="width: 165px;border-right:solid windowtext 1.0pt;">PPh yang Dipotong/<br/>Dipungut (Rp)</th>
            </tr>
            <tr class="head1">
                <th style="height: 25px;">(1)</th>
                <th>(2)</th>
                <th>(3)</th>
                <th>(4)</th>
                <th>(5)</th>
                <th style="border-right:solid windowtext 1.0pt;">(6)</th>
            </tr>
        </thead>
        <tbody>
            <!--baris 1 dividen start-->
            <tr class="bodi">
                <td class="nomor">1</td>
                <td class="uraian">Dividen *)</td>
                <td class="uraianAngka"></td>
                <td><div class="kotakTarif"></div></td>
                <td>15%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <!--baris 1 dividen end-->
            <!--baris 2 bunga start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;">2</td>
                <td class="uraian" style="border-top: none;">Bunga **)</td>
                <td class="uraianAngka"></td>
                <td><div class="kotakTarif"></div></td>
                <td>15%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <!--baris 2 bunga end-->
            <!--baris 3 Royalti start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;">3</td>
                <td class="uraian" style="border-top: none;">Royalti</td>
                <td class="uraianAngka"></td>
                <td><div class="kotakTarif"></div></td>
                <td>15%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <!--baris 3 Royalti end-->
            <!--baris 4 hadiah dan penghargaan start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;">4</td>
                <td class="uraian" style="border-top: none;">Hadiah dan penghargaan</td>
                <td class="uraianAngka"></td>
                <td><div class="kotakTarif"></div></td>
                <td>15%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <!--baris 4 hadiah dan penghargaan end-->
            <!--baris 5 sewa start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;">5</td>
                <td class="uraian" style="border-top: none;">Sewa dan Penghasilan lain</td>
                <td rowspan="2" style="background: #cccccc"></td>
                <td rowspan="2" style="background: #cccccc"></td>
                <td rowspan="2" style="background: #cccccc"></td>
                <td rowspan="2" style="background: #cccccc;border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">sehubungan dengan</td>
            </tr>
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">penggunaan harta</td>
                <td class="uraianAngka">@if( $data->id_JenisSetoran == "5" ) {{ $NilaiPembayaran }} @else &nbsp; @endif</td>
                <td><div class="kotakTarif"></div></td>
                <td>2%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">@if( $data->id_JenisSetoran == "5" ) {{ $NilaiPPh }} @else &nbsp; @endif</td>
            </tr>
            <!--baris 5 sewa end-->
            <!--baris 6 jasa start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;">6</td>
                <td class="uraian" style="border-top: none;">Jasa Teknik, Jasa Manajemen,</td>
                <td rowspan="3" style="background: #cccccc"></td>
                <td rowspan="3" style="background: #cccccc"></td>
                <td rowspan="3" style="background: #cccccc"></td>
                <td rowspan="3" style="background: #cccccc;border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">Jasa Konsultansi dan Jasa Lain</td>
            </tr>
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">sesuai PMK-244/PMK.03/2008:</td>
            </tr>
            <!--baris a.Jasa Teknik start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">a. Jasa Teknik</td>
                <td class="uraianAngka">@if( $data->id_JenisSetoran == "6" ) {{ $NilaiPembayaran }} @else &nbsp; @endif</td>
                <td><div class="kotakTarif"></div></td>
                <td>2%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">@if( $data->id_JenisSetoran == "6" ) {{ $NilaiPPh }} @else &nbsp; @endif</td>
            </tr>
            <!--baris a.Jasa Teknik end-->
            <!--baris b.Jasa Manajemen Start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">b. Jasa Manajemen</td>
                <td class="uraianAngka">@if( $data->id_JenisSetoran == "7" ) {{ $NilaiPembayaran }} @else &nbsp; @endif</td>
                <td><div class="kotakTarif"></div></td>
                <td>2%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">@if( $data->id_JenisSetoran == "7" ) {{ $NilaiPPh }} @else &nbsp; @endif</td>
            </tr>
            <!--baris b.Jasa Manajemen end-->
            <!--baris c. Jasa Konsultan start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">c. Jasa Konsultan</td>
                <td class="uraianAngka">@if( $data->id_JenisSetoran == "8" ) {{ $NilaiPembayaran }} @else &nbsp; @endif</td>
                <td><div class="kotakTarif"></div></td>
                <td>2%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">@if( $data->id_JenisSetoran == "8" ) {{ $NilaiPPh }} @else &nbsp; @endif</td>
            </tr>
            <!--baris c. Jasa Konsultan end-->
            <!--baris d. Jasa Lain start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">d. Jasa lain :</td>
                <td class="uraianAngka" style="background: #cccccc"></td>
                <td style="background: #cccccc"></td>
                <td style="background: #cccccc"></td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;background: #cccccc"></td>
            </tr>
            <!--baris d. Jasa Lain end-->
            <!--baris 1) ........ start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;padding-left: 15px;">1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.......................................</td>
                <td class="uraianAngka"></td>
                <td><div class="kotakTarif"></div></td>
                <td>2%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <!--baris 1) ........ end-->
            <!--baris 2) ........ start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;padding-left: 15px;">2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.......................................</td>
                <td class="uraianAngka"></td>
                <td><div class="kotakTarif"></div></td>
                <td>2%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <!--baris 2) ........ end-->
            <!--baris 3) ........ start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;padding-left: 15px;">3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.......................................</td>
                <td class="uraianAngka"></td>
                <td><div class="kotakTarif"></div></td>
                <td>2%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <!--baris 3) ........ end-->
            <!--baris 4) ........ start-->
            <tr class="bodi">
                <td class="nomor" style="border-top: none;"></td>
                <td class="uraian" style="border-top: none;">****)</td>
                <td class="uraianAngka"></td>
                <td></td>
                <td></td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <!--baris 4) ........ end-->
            <!--baris 6 jasa end-->
            <!--baris jumlah dan terbilang start-->
            <tr class="bodi">
                <td colspan="2" style="text-align: center;font-weight: bold;font-family: 'Arial';font-size: 10pt;">JUMLAH</td>
                <td style="border-left: none;"></td>
                <td style="background: #cccccc"></td>
                <td style="background: #cccccc"></td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;text-align: right;padding-right: 5px;">{{ $NilaiPPh }}</td>
            </tr>
            <tr class="bodi">
                <td class="uraian" colspan="6" style="border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding-right: 5px;">
                    <div style="float: left;padding-right: 10px">Terbilang : </div>
                    <div style="float: left;width: 680px;"> {{ $terbilang }} Rupiah</div>
                </td>
            </tr>
            <!--baris jumlah dan terbilang end-->
        </tbody>
    </table>
    <!--tabel utama end-->
    <br/>
    <div style="float: left;margin-top: -5px">
        <table cellspacing="0" style="font-family: 'Arial';font-size: 8pt;width: 250px;border: solid windowtext 1.0pt;">
            <tr>
                <td colspan="2" style="text-align: left;">Perhatian :</td>
            </tr>
            <tr style="text-align: left;">
                <td style="vertical-align: top;padding-right: 15px;padding-bottom: 0px;">1.</td>
                <td style="padding-bottom: 0px;">Jumlah Pajak Penghasilan Pasal 23 
                    <br/>yang dipotong diatas merupakan<br/>angsuran atas Pajak Penghasilan yang<br/>
                    terutang untuk tahun pajak yang<br/>bersangkutan. Simpanlah bukti<br/>
                    pemotongan ini baik-baik untuk<br/>diperhitungkan sebagai kredit pajak
                </td>
            </tr>
            <tr style="text-align: left;">
                <td style="vertical-align: top;padding-right: 15px;padding-top: 0px;">2.</td>
                <td>Bukti Pemotongan ini dianggap sah<br/>apabila diisi dengan lengkap dan<br/>benar</td>
            </tr>
        </table>
    </div>
    <div style="text-align: center;width: 505px;
         font-family: 'arial';font-size: 10pt;
         float: left;padding-left: 14px;padding-top: 10px;">
        <div>Sangatta, {{ $TanggalPembayaran }}</span></div>
        <div style="padding-top: 5px;"><b>Pemotong Pajak</b></div><br/>
        <table cellspacing="0">
            <tr>
                <td class="label" style="width: 38px;font-weight: normal"><b>NPWP</b></td>
                <td style="padding-right: 5px;">:</td>
                @for($i=0; $i<20; $i++)
                @if($i==2 || $i==6 || $i==10 || $i==12 || $i==16)
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                @else
                <td class="kotak2">{{ $nd[$i] }}</td>
                @endif
                @endfor
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;width: 1px;"></td>
            </tr>
        </table>
        <table cellspacing="0" style="margin-top:5px;">
            <tr>
                <td class="label" style="width: 38px;font-weight: normal"><b>Nama</b></td>
                <td style="padding-right: 5px;">:</td>
                @for ($i = 0; $i < 20; $i++)
                <td class="kotak2">{{ $anDinas[$i] }}</td>
                @endfor
                <td style="border:none;border-left: solid windowtext 1.0pt;"></td>
            </tr>
        </table>
        <table cellspacing="0" style="margin-top:5px;">
            <tr>
                <td class="label" style="width: 38px;font-weight: normal">&nbsp;</td>
                <td style="padding-right: 5px;">&nbsp;</td>
                @for ($i = 20; $i < 35; $i++)
                <td class="kotak2">{{ $anDinas[$i] }}</td>
                @endfor
                @for ($i = 0; $i < 5; $i++)
                <td class="kotak2"></td>
                @endfor
                <td style="border:none;border-left: solid windowtext 1.0pt;"></td>
            </tr>
        </table>
    </div>
    <br/><br/>
    <div style="margin-top: 10px;font-family: 'Arial';font-size: 10pt;float: right;width: 505px;text-align: center;">
        <b>Tanda Tangan, Nama dan Cap</b>
        <br/><br/><br/><br/><br/>
        <b>{{ $data2->Nama }}</b>
    </div>
    <!--<div style="float: left;width: 600px;">&nbsp;</div><br/>-->
    <div style="float: left;width: 350px;margin-top: -55px;">
        <table cellspacing="0" style="font-family: 'Arial';font-size: 8pt;text-align: left;">
            <tr>
                <td style="text-align: right;padding-right: 5px">*)</td>
                <td style="text-align: left;"><i>Tidak termasuk dividen kepada WP Orang Pribadi Dalam Negeri.</i></td>
            </tr>
            <tr>
                <td style="text-align: right;vertical-align: top;padding-right: 5px">**)</td>
                <td style="text-align: left;"><i>Tidak termasuk bunga simpanan yang dibayarkan oleh koperasi kepada anggota WP Orang Pribadi.</i></td>
            </tr>
            <tr>
                <td style="text-align: right;padding-right: 5px">***)</td>
                <td style="text-align: left;"><i>Kecuali sewa tanah dan bangunan.</i></td>
            </tr>
            <tr>
                <td style="text-align: right;padding-right: 5px">****)</td>
                <td style="text-align: left;"><i>Apabila kurang harap diisi sendiri.</i></td>
            </tr>
        </table>
    </div>
    
</body>