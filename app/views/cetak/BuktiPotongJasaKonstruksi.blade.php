<head>
    <style>
        .tabel-utama thead{
            font-family: "sans-serif";
            font-size: 11pt;
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
        }
        .nomor{
            font-family: "Tahoma","sans-serif";
            font-size: 10pt;
            padding: 3px;
            padding-top: 5px;
            vertical-align: top;
        }
        .uraian{
            font-family: "Tahoma","sans-serif";
            font-size: 10pt;
            padding: 1px 15px 0px 3px;
            width: 310px;
            text-align: left;
        }
        .uraianAngka{
            font-family: "Tahoma","sans-serif";
            font-size: 10pt;
        }
        .label{
            text-align: left;
            font-family: 'arial';
            font-size: 9pt;
            font-weight: bold;
            width: 115px;
        }
        .kotak2{
            font-family: 'arial';
            font-size: 10pt;
            width: 19px;
            border:solid windowtext 1.0pt;
            border-right: none;
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
                    BUKTI PEMOTONGAN/PEMUNGUTAN PPh FINAL PASAL 4 AYAT (2)<br/>
                    ATAS PENGHASILAN DARI USAHA JASA KONSTRUKSI
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
    <br/>
    {? $NilaiPembayaran = number_format($data->NilaiPembayaran, 0, ',', '.') ?}
    {? $NilaiPPh = number_format($data->NilaiPPh, 0, ',', '.') ?}
    <div style="width: 777px;">
        <table cellspacing="0" cellpading="5">
            <tr>
                <td class="label">NPWP</td>
                <td style="padding-right: 15px;">:</td>
                <td class="kotak2">{{ $n[0] }}</td>
                <td class="kotak2">{{ $n[1] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $n[3] }}</td>
                <td class="kotak2">{{ $n[4] }}</td>
                <td class="kotak2">{{ $n[5] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $n[7] }}</td>
                <td class="kotak2">{{ $n[8] }}</td>
                <td class="kotak2">{{ $n[9] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $n[11] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $n[13] }}</td>
                <td class="kotak2">{{ $n[14] }}</td>
                <td class="kotak2">{{ $n[15] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $n[17] }}</td>
                <td class="kotak2">{{ $n[18] }}</td>
                <td class="kotak2">{{ $n[19] }}</td>
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
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;width: 0px;"></td>
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
                {? $jAlamat = 29 - $count ?}
                @for ($i = 0; $i < $count2; $i++)
                <td class="kotak2">{{ $Alamat[$i] }}</td>
                @endfor
                @for ($i = 0; $i < $jAlamat; $i++)
                <td class="kotak2"></td>
                @endfor
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;width: 0px;"></td>
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
    <table cellspacing="0" cellpading="5" class="tabel-utama">
        <thead>
            <tr class="head1">
                <th style="width: 40px;height: 40px;">No.</th>
                <th style="width: 310px;">Uraian</th>
                <th style="width: 170px;">Jumlah Nilai Bruto<br/>(Rp)</th>
                <th style="width: 40px">Tarif<br/>(%)</th>
                <th style="width: 185px;border-right:solid windowtext 1.0pt;">PPh yang Dipotong/<br/>Dipungut (Rp)</th>
            </tr>
            <tr class="head1">
                <th style="height: 25px;">(1)</th>
                <th>(2)</th>
                <th>(3)</th>
                <th>(4)</th>
                <th style="border-right:solid windowtext 1.0pt;">(5)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bodi">
                <td rowspan="2" class="nomor">1</td>
                <td class="uraian">Jasa pelaksanaan konstruksi oleh penyedia jasa</td>
                <td style="height: 50%;background: #cccccc">&nbsp;</td>
                <td style="background: #cccccc"></td>
                <td style="background: #cccccc;border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <tr class="bodi">
                <td class="uraian" style="border-top: none;padding-top: 0px;">dengan kualifikasi usaha kecil</td>
                @if($data->id_JenisSetoran == 9)
                <td class="uraianAngka">{{ $NilaiPembayaran }}</td>
                <td>2%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">{{ $NilaiPPh }}</td>
                @else
                <td></td>
                <td>2%</td>
                <td style="border-right:solid windowtext 1.0pt;"></td>
                @endif
            </tr>

            <tr class="bodi">
                <td rowspan="2" class="nomor"  style="border-top: none;">2</td>
                <td class="uraian" style="border-top: none;">Jasa pelaksanaan konstruksi oleh penyedia jasa</td>
                <td style="height: 50%;background: #cccccc">&nbsp;</td>
                <td style="background: #cccccc"></td>
                <td style="background: #cccccc;border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <tr class="bodi">
                <td class="uraian" style="border-top: none;padding-top: 0px;">yang tidak memiliki kualifikasi usaha</td>
                @if($data->id_JenisSetoran == 11)
                <td class="uraianAngka">{{ $NilaiPembayaran }}</td>
                <td>4%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">{{ $NilaiPPh }}</td>
                @else
                <td></td>
                <td>4%</td>
                <td style="border-right:solid windowtext 1.0pt;"></td>
                @endif
            </tr>

            <tr class="bodi">
                <td rowspan="2" class="nomor" style="border-top: none;">3</td>
                <td class="uraian" style="border-top: none;">Jasa pelaksanaan konstruksi oleh penyedia jasa</td>
                <td style="height: 50%;background: #cccccc">&nbsp;</td>
                <td style="background: #cccccc"></td>
                <td style="background: #cccccc;border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <tr class="bodi">
                <td class="uraian" style="border-top: none;padding-top: 0px;">selain angka 1 dan angka 2 di atas</td>
                @if($data->id_JenisSetoran == 10)
                <td class="uraianAngka">{{ $NilaiPembayaran }}</td>
                <td>3%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">{{ $NilaiPPh }}</td>
                @else
                <td></td>
                <td>3%</td>
                <td style="border-right:solid windowtext 1.0pt;"></td>
                @endif
            </tr>

            <tr class="bodi">
                <td rowspan="2" class="nomor" style="border-top: none;">4</td>
                <td class="uraian" style="border-top: none;">Jasa perencanaan atau pengawasan konstruksi</td>
                <td style="height: 50%;background: #cccccc">&nbsp;</td>
                <td style="background: #cccccc"></td>
                <td style="background: #cccccc;border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <tr class="bodi">
                <td class="uraian" style="border-top: none;padding-top: 0px;">oleh penyedia jasa yang memiliki kualifikasi usaha</td>
                @if($data->id_JenisSetoran == 12)
                <td class="uraianAngka">{{ $NilaiPembayaran }}</td>
                <td>4%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">{{ $NilaiPPh }}</td>
                @else
                <td></td>
                <td>4%</td>
                <td style="border-right:solid windowtext 1.0pt;"></td>
                @endif
            </tr>

            <tr class="bodi">
                <td rowspan="3" class="nomor" style="border-top: none;padding-top: 2px;">5</td>
                <td class="uraian" style="border-top: none;">Jasa perencanaan atau pengawasan konstruksi</td>
                <td rowspan="2" style="height: 50%;background: #cccccc">&nbsp;</td>
                <td rowspan="2" style="background: #cccccc">&nbsp;</td>
                <td rowspan="2" style="background: #cccccc;border-right:solid windowtext 1.0pt;"></td>
            </tr>
            <tr class="bodi">
                <td class="uraian" style="border-top: none;">oleh penyedia jasa yang tidak memiliki kualifikasi</td>
            </tr>
            <tr class="bodi">
                <td class="uraian" style="border-top: none;padding-top: 0px;">usaha</td>
                @if($data->id_JenisSetoran == 13)
                <td class="uraianAngka">{{ $NilaiPembayaran }}</td>
                <td>6%</td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">{{ $NilaiPPh }}</td>
                @else
                <td></td>
                <td>6%</td>
                <td style="border-right:solid windowtext 1.0pt;"></td>
                @endif
            </tr>

            <tr class="bodi">
                <td colspan="2" style="text-align: center;font-weight: bold;font-family: 'sans-serif';font-size: 11pt;">JUMLAH</td>
                <td></td>
                <td style="background: #cccccc"></td>
                <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;text-align: right;padding-right: 5px;">{{ $NilaiPPh }}</td>
            </tr>

            <tr class="bodi">
                <td class="uraian" colspan="5" style="border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding-right: 5px;">
                    <div style="float: left;padding-right: 10px">Terbilang : </div>
                    <div style="float: left;width: 690px;">{{ $terbilang }} Rupiah</div>
                </td>
            </tr>
        </tbody>
    </table>
    <br/>
    <div style="text-align: center;width: 526px;
         font-family: 'arial';font-size: 10pt;
         margin-left: 260px;">
        <div>Sangatta, {{ $TanggalPembayaran }}</span></div>
        <div style="padding-top: 5px;"><b>Pemotong/Pemungut Pajak</b></div><br/>
        <table cellspacing="0">
            <tr>
                <td class="label" style="width: 55px;font-weight: normal">NPWP</td>
                <td style="padding-right: 10px;">:</td>
                <td class="kotak2">{{ $nd[0] }}</td>
                <td class="kotak2">{{ $nd[1] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $nd[3] }}</td>
                <td class="kotak2">{{ $nd[4] }}</td>
                <td class="kotak2">{{ $nd[5] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $nd[7] }}</td>
                <td class="kotak2">{{ $nd[8] }}</td>
                <td class="kotak2">{{ $nd[9] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $nd[11] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $nd[13] }}</td>
                <td class="kotak2">{{ $nd[14] }}</td>
                <td class="kotak2">{{ $nd[15] }}</td>
                <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                <td class="kotak2">{{ $nd[17] }}</td>
                <td class="kotak2">{{ $nd[18] }}</td>
                <td class="kotak2">{{ $nd[19] }}</td>
                <td style="border:none;border-left: solid windowtext 1.0pt;"></td>
            </tr>
        </table>
        <table cellspacing="0" style="margin-top:5px;">
            <tr>
                <td class="label" style="width: 55px;font-weight: normal">Nama</td>
                <td style="padding-right: 10px;">:</td>
                @for ($i = 0; $i < 20; $i++)
                <td class="kotak2">{{ $anDinas[$i] }}</td>
                @endfor
                <td style="border:none;border-left: solid windowtext 1.0pt;"></td>
            </tr>
        </table>
        <table cellspacing="0" style="margin-top:5px;">
            <tr>
                <td class="label" style="width: 55px;font-weight: normal">&nbsp;</td>
                <td style="padding-right: 10px;">&nbsp;</td>
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
    <table cellspacing="0" style="margin-top:25px;">
        <tr>
            <td colspan="2" style="width:220px;font-family: 'Tahoma','sans-serif';font-size: 10pt;
                border: solid windowtext 1.0pt;border-bottom: none;text-align: left;
                padding-left:5px;">
                <i>Perhatian :</i>
            </td>
            <td style="width: 550px;text-align: center;font-weight: bold;">
            </td>
        </tr>
        <tr>
            <td style="width:5px;font-family: 'Tahoma','sans-serif';font-size: 10pt;padding-left:5px;
                border-left: solid windowtext 1.0pt;text-align: left;vertical-align: top;">
                1.
            </td>
            <td style="width:220px;font-family: 'Tahoma','sans-serif';font-size: 10pt;
                border-right: solid windowtext 1.0pt;text-align: justify;padding-right:10px;">
                Jumlah Pajak Penghasilan dan Jasa Konstruksi yang dipotong/dipungut
                di atas bukan merupakan kredit pajak dalam Surat Pemberitahuan (SPT)
                Tahunan PPh.
            </td>
            <td style="text-align: center;vertical-align: top;
                font-weight: bold;font-family: 'arial';font-size: 10pt;">
                Tanda Tangan, Nama dan Cap
            </td>
        </tr>
        <tr>
            <td style="width:5px;font-family: 'Tahoma','sans-serif';font-size: 10pt;padding-left:5px;
                border-bottom:solid windowtext 1.0pt;border-left: solid windowtext 1.0pt;text-align: left;vertical-align: top;">
                2.
            </td>
            <td style="width:220px;font-family: 'Tahoma','sans-serif';font-size: 10pt;
                border-bottom:solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;text-align: justify;padding-right:10px;">
                Bukti Pemotongan/Pemungutan ini dianggap sah apabila diisi dengan lengkap dan benar.
            </td>
            <td style="text-align: center;
                font-weight: bold;font-family: 'arial';font-size: 10pt;">
                {{ $data2->Nama }}
            </td>
        </tr>
    </table>
</body>