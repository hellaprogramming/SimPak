<head>
    <style>
        .sampul{
            width: 755px;
            page-break-before: always;
        }
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
            width: 190px;
            text-align: left;
        }
        .uraianAngka{
            font-family: "Tahoma","sans-serif";
            font-size: 10pt;
            text-align: right;
            width: 161px;
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
    <div class="sampul">
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
                        BUKTI PEMUNGUTAN PPh PASAL 22<br/>
                        (OLEH BADAN USAHA INDUSTRI/EKSPORTIR TERTENTU)
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
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">&nbsp;</td>
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
        <!--tabel utama start-->
        <table cellspacing="0" cellpading="5" class="tabel-utama">
            <thead>
                <tr class="head1">
                    <th style="width: 35px;height: 40px;">No.</th>
                    <th style="width: 192px;">Uraian</th>
                    <th style="width: 165px;">Harga (Rp)</th>
                    <th style="width: 80px;font-size: 9pt;">Tarif Lebih<br/>Tinggi<br/>100% (Tdk<br/>ber-NPWP)</th>
                    <th style="width: 60px">Tarif<br/>(%)</th>
                    <th style="width: 165px;border-right:solid windowtext 1.0pt;">Pajak yang Dipungut (Rp)</th>
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
                <tr class="bodi">
                    <td class="nomor">&nbsp;</td>
                    <td class="uraian">Jenis Industri:</td>
                    <td class="uraianAngka" style="font-family: 'Arial';font-size: 9pt;text-align: left;background: #cccccc"><b>Penjualan Bruto:</b></td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td style="width: 80px;background: #cccccc">&nbsp;</td>
                    <td class="uraianAngka" style="background: #cccccc;border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <!--baris 1 semen start-->
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">1</td>
                    <td class="uraian" style="border-top: none;">Semen</td>
                    <td class="uraianAngka">200.000</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>1,5%</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">200.000</td>
                </tr>
                <!--baris 1 semen end-->
                <!--baris 2 Kertas start-->
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">2</td>
                    <td class="uraian" style="border-top: none;">Kertas</td>
                    <td class="uraianAngka">200.000</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>1,5%</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">200.000</td>
                </tr>
                <!--baris 2 Kertas end-->
                <!--baris 3 Baja start-->
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">3</td>
                    <td class="uraian" style="border-top: none;">Baja</td>
                    <td class="uraianAngka">200.000</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>1,5%</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">200.000</td>
                </tr>
                <!--baris 3 Baja end-->
                <!--baris 4 Otomotif start-->
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">4</td>
                    <td class="uraian" style="border-top: none;">Otomotif</td>
                    <td class="uraianAngka">200.000</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>1,5%</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">200.000</td>
                </tr>
                <!--baris 4 Otomotif end-->
                <!--baris 5, 6 yang lain start-->
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">5</td>
                    <td class="uraian" style="border-top: none;">.........................................</td>
                    <td class="uraianAngka">200.000</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>1,5%</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">200.000</td>
                </tr>
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">6</td>
                    <td class="uraian" style="border-top: none;">.........................................</td>
                    <td class="uraianAngka">&nbsp;</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>&nbsp;</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <!--baris 5, 6 yang lain end-->
                <!--baris penjualan barang tergolong sangat mewah start-->
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;"><b>Penjualan Barang yang Tergolong Sangat Mewah</b></td>
                    <td class="uraianAngka" style="font-family: 'Arial';font-size: 9pt;background: #cccccc;vertical-align: bottom;text-align: left;"><b>Harga Jual:</b></td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td style="background: #cccccc;border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">7</td>
                    <td class="uraian" style="border-top: none;">.........................................</td>
                    <td class="uraianAngka">&nbsp;</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>&nbsp;</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <!--baris penjualan barang tergolong mewah end-->
                <!--baris Industri/eksportir start-->
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;"><b>Industri/Eksportir :</b></td>
                    <td class="uraianAngka" style="font-family: 'Arial';font-size: 9pt;background: #cccccc;vertical-align: bottom;text-align: left;"><b>Pembelian Bruto:</b></td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td style="background: #cccccc;border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">8</td>
                    <td class="uraian" style="border-top: none;">Sektor   .........................................</td>
                    <td class="uraianAngka">&nbsp;</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>&nbsp;</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">9</td>
                    <td class="uraian" style="border-top: none;">Sektor   .........................................</td>
                    <td class="uraianAngka">&nbsp;</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>&nbsp;</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <!--baris Industri/eksportir end-->
                <!--baris badan tertentu lainnya start-->
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">&nbsp;</td>
                    <td class="uraian" style="border-top: none;"><b>badan Tertentu Lainnya :</b></td>
                    <td class="uraianAngka" style="font-family: 'Arial';font-size: 9pt;background: #cccccc;vertical-align: bottom;text-align: left;">&nbsp;</td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td style="background: #cccccc;border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">10</td>
                    <td class="uraian" style="border-top: none;">.........................................</td>
                    <td class="uraianAngka">&nbsp;</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>&nbsp;</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <tr class="bodi">
                    <td class="nomor" style="border-top: none;">11</td>
                    <td class="uraian" style="border-top: none;">.........................................</td>
                    <td class="uraianAngka">&nbsp;</td>
                    <td><div class="kotakTarif"></div></td>
                    <td>&nbsp;</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;">&nbsp;</td>
                </tr>
                <!--baris badan tertentu lainnya end-->
                <!--baris jumlah dan terbilang start-->
                <tr class="bodi">
                    <td colspan="2" style="text-align: center;font-weight: bold;font-family: 'Arial';font-size: 10pt;">JUMLAH</td>
                    <td>&nbsp;</td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td style="background: #cccccc">&nbsp;</td>
                    <td class="uraianAngka" style="border-right:solid windowtext 1.0pt;text-align: right;padding-right: 5px;">@{{ $NilaiPPh }}</td>
                </tr>
                <tr class="bodi">
                    <td class="uraian" colspan="6" style="border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding-right: 5px;">
                        <div style="float: left;padding-right: 10px">Terbilang : </div>
                        <div style="float: left;width: 670px;"> {{ $terbilang }} Rupiah</div>
                    </td>
                </tr>
                <!--baris jumlah dan terbilang end-->
            </tbody>
        </table>
        <!--tabel utama end-->
        <br/>
        <div style="text-align: center;width: 500px;
             font-family: 'arial';font-size: 10pt;
             float: left;padding-left: 255px;">
            <div>Sangatta, {{ $TanggalPembayaran }}</span></div>
            <div style="padding-top: 5px;"><b>Pemungut Pajak</b></div><br/>
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
        <div style="float: left;margin-top:5px">
            <table cellspacing="0" style="font-family: 'Arial';font-size: 8pt;width: 250px;border: solid windowtext 1.0pt;">
                <tr>
                    <td colspan="2" style="text-align: left;"><i>Perhatian :</i></td>
                </tr>
                <tr style="text-align: left;">
                    <td style="vertical-align: top;padding-right: 10px;padding-left: 3px;padding-bottom: 0px;">1.</td>
                    <td style="padding-bottom: 0px;">Jumlah PPh Pasal 22 yang dipungut di atas 
                        <br/>merupakan pembayaran di muka atas PPh<br/>yang terutang untuk tahun pajak yang<br/>
                        bersangkutan. Simpanlah bukti Pemungutan<br/>
                        ini baik-baik untuk diperhitungkan sebagai<br/>kredit pajak dalam Surat Pemberitahuan<br/>
                        (SPT) Tahunan PPh.
                    </td>
                </tr>
                <tr style="text-align: left;">
                    <td style="vertical-align: top;padding-right: 10px;padding-left: 3px">2.</td>
                    <td>Bukti Pemungutan ini dianggap sah apabila<br/>diisi dengan lengkap dan benar</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 30px;font-family: 'Arial';font-size: 10pt;float: left;width: 500px;text-align: center;padding-left: 5px;">
            <b>Tanda Tangan, Nama dan Cap</b>
            <br/><br/><br/><br/><br/><br/>
            <b>{{ $data2->Nama }}</b>
        </div>
    </div>
</body>