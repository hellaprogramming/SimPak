<head>
    <style>
        body{
            margin:0px;
        }
        .sampul{
            width: 730px;
            page-break-before: always;
        }
        .tabel-daftar-potong thead {
            font-family: 'arial';
            font-size: 9pt;
        }
        .tabel-daftar-potong tbody {
            font-family: 'arial';
            font-size: 9pt;
            text-align: center;
        }
        .kotak2{
            text-align: center;
            font-family: 'arial';
            font-size: 10pt;
            width: 16px;
            border:solid windowtext 1.0pt;
            border-right: none;
        }
        .kotak2nd{
            font-family: 'Tahoma';
            font-size: 8pt;
            text-align: center;
            width: 16px;
            border:solid windowtext 1.0pt;
            border-right: none;
        }
    </style>
</head>
<body>
    <div class="sampul">
        <div style="border:solid windowtext 2.0pt;border-right: none;float: left;padding: 2px 4px 2px 4px;padding-bottom: 1px;">
            <img src="{{ asset('assets/img/kementrianpajak.jpg') }}" style="height: 64px;"/>
        </div>
        <div style="font-family: 'Tahoma';font-size: 7pt;border:solid windowtext 2.0pt;float: left;padding: 6px 7px 6px 7px;text-align: center">
            <b>KEMENTERIAN<br/>KEUANGAN R.I.<br/><br/>DIREKTORAT<br/>JENDERAL PAJAK</b>
        </div>
        <div style="padding:20px 0px 21px 0px;width: 376px;text-align: center;border:solid windowtext 2.0pt;border-left: none;font-family: 'Tahoma';font-size: 8pt;float: left">
            <b>{{ $judul }}</b>
        </div>
        <div style="padding: 16px 19px 15px 20px;float: left;text-align: center;border:solid windowtext 2.0pt;border-left: none;font-family: 'arial';font-size: 10pt;">
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
        <div style="height: 17px;padding-top: 71px;"></div>
        <table cellspacing="0" cellpading="5" class="tabel-daftar-potong">
            <thead>
                <tr>
                    <th rowspan="2" style="border: solid windowtext 1.0pt;vertical-align: middle;text-align: center;">No.</th>
                    <th rowspan="2" style="border: solid windowtext 1.0pt;border-left: none;vertical-align: middle;text-align: center;">NPWP</th>
                    <th rowspan="2" style="border: solid windowtext 1.0pt;border-left: none;vertical-align: middle;text-align: center;">Nama</th>
                    <th colspan="2"style="border: solid windowtext 1.0pt;border-left: none;text-align: center;">{{ $judul_kolom }}</th>
                    <th rowspan="2" style="border: solid windowtext 1.0pt;border-left: none;vertical-align: middle;text-align: center;">Nilai Obyek Pajak<br/>(Rp)</th>
                    <th rowspan="2" style="border: solid windowtext 1.0pt;border-left: none;vertical-align: middle;text-align: center;">PPh yang<br/>Dipungut (Rp)</th>
                </tr>
                <tr>
                    <th style="text-align: center;border: solid windowtext 1.0pt;border-left: none;border-top: none;">Nomor</th>
                    <th style="text-align: center;border: solid windowtext 1.0pt;border-left: none;border-top: none;">Tanggal</th>
                </tr>
                <tr style="background: #cccccc;">
                    <th style="text-align: center;border: solid windowtext 1.0pt;border-top: none;border-bottom: none;">(1)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(2)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(3)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(4)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(5)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(6)</th>
                    <th style="text-align: center;border-right: solid windowtext 1.0pt;">(7)</th>
                </tr>
            </thead>
            <tbody>
                <!--daftar potong-->
                {? $no = 1 ?}
                @foreach($item as $item)
                <tr>
                    {? $TanggalPembayaran = new \DateTime($item->TanggalPembayaran) ?}
                    <td style="border: solid windowtext 1.0pt;border-bottom: none;">{{ $no++ }}.</td>
                    <td style="width: 138px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;">{{ $item->NPWP }}</td>
                    <td style="width: 153px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;">@if($item->id_rekanan == 1) Bend Rutin DPU Kab.Kutim @else {{ $item->NamaPerusahaan }} @endif</td>
                    <td style="width: 145px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;">{{ $item->NomorPemotongan }}</td>
                    <td style="width: 72px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;">{{ $TanggalPembayaran->format('d-m-Y') }}</td>
                    <td style="text-align: right;width: 107px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;">{{ number_format($item->NilaiPembayaran, 0, ',', '.') }}</td>
                    <td style="text-align: right;width: 80px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;">{{ number_format($item->NilaiPPh, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                @if($no <= 41)
                    @for($i=$no; $i<=40; $i++)
                    <tr>
                        <td style="border: solid windowtext 1.0pt;border-bottom: none;">{{ $i }}.</td>
                        <td style="width: 138px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;"></td>
                        <td style="width: 153px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;"></td>
                        <td style="width: 145px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;"></td>
                        <td style="width: 72px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;"></td>
                        <td style="text-align: right;width: 107px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;"></td>
                        <td style="text-align: right;width: 80px;border: solid windowtext 1.0pt;border-left: none;border-bottom: none;"></td>
                    </tr>
                    @endfor
                @endif
                <!--daftar potong end-->
                <!--jumlah start-->
                <tr>
                    <td style="border: solid windowtext 2.0pt;border-left: solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;" colspan="5"><b>JUMLAH</b></td>
                    <td style="text-align: right;border: solid windowtext 2.0pt;border-left: none;border-right: solid windowtext 1.0pt;">{{ number_format($jumlah_pembayaran, 0, ',', '.') }}</td>
                    <td style="text-align: right;border: solid windowtext 2.0pt;border-left: none;border-right: solid windowtext 1.0pt;">{{ number_format($jumlah_pph, 0, ',', '.') }}</td>
                </tr>
                <!--jumlah end-->
            </tbody>
        </table>
        <div style="height: 17px;"></div>
        
        <!--baris penandatangan start -->
        <div style="padding: 5px 15px 33px 15px;border:solid windowtext 2.0pt;float: left;">
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
                    @for($i=0; $i<23; $i++)
                    @if($i <20)
                    <td class="kotak2nd">{{ $penandatangan[$i] }}</td>
                    @else
                    <td class="kotak2nd"></td>
                    @endif
                    @endfor
                    <td class="kotak2" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;"></td>
                </tr>
                <tr><td colspan="23"></td></tr>
                <tr>
                    <td colspan="2" style="padding-right: 8px;vertical-align: bottom">NPWP</td>
                    @for($i=0; $i<20; $i++)
                    @if($i==2 || $i==6 || $i==10 || $i==12 || $i==16)
                        <td class="kotak2nd" style="border:none;border-left: solid windowtext 1.0pt;">{{ $npwp[$i] }}</td>
                    @else
                        <td class="kotak2nd">{{ $npwp[$i] }}</td>
                    @endif
                    @endfor
                    <td class="kotak2nd" style="width: 0px;border:none;border-left: solid windowtext 1.0pt;"></td>
                </tr>
            </table>
        </div>
        <div style="padding: 5px 10px 3px 3px;border:solid windowtext 2.0pt;border-bottom:solid windowtext 1.0pt;border-left: none;float: left;">
            <table cellspacing="0" cellpading="5" style="font-family: 'Tahoma';font-size: 8pt;">
                <tr>
                    <td style="padding: 0px 10px 0px 0px;vertical-align: bottom">Tanggal</td>
                    <td class="kotak2nd">{{ $tgl_cetak[0] }}</td>
                    <td class="kotak2nd">{{ $tgl_cetak[1] }}</td>
                    <td class="kotak2nd">{{ $tgl_cetak[3] }}</td>
                    <td class="kotak2nd">{{ $tgl_cetak[4] }}</td>
                    <td class="kotak2nd">{{ $tgl_cetak[6] }}</td>
                    <td class="kotak2nd">{{ $tgl_cetak[7] }}</td>
                    <td class="kotak2nd">{{ $tgl_cetak[8] }}</td>
                    <td class="kotak2nd">{{ $tgl_cetak[9] }}</td>
                    <td style="border-left: solid windowtext 1.0pt;"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2" style="border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>tanggal</i></td>
                    <td colspan="2" style="border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>bulan</i></td>
                    <td colspan="4" style="border-left: solid windowtext 1.0pt;font-size: 7pt;text-align: center"><i>tahun</i></td>
                    <td style="border-left: solid windowtext 1.0pt;"></td>
                </tr>
            </table>
        </div>
        <div style="padding:4px 0px 38px 3px;width: 213px;float: left;border:solid windowtext 2.0pt;border-top: none;border-left: none;">
            <span style="font-size: 8pt;font-family: 'Tahoma';">Tanda Tangan & Cap</span>
        </div>
        <!--baris penandatangan end -->
    </div>
</body>