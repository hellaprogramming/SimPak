<head>
    <style>
        body{
            margin:0px;
        }
        .sampul{
            width: 730px;
            page-break-before: always;
        }
        .label{
            text-align: left;
            width: 160px;
        }
        .kotak2{
            font-family: 'tahoma';
            font-size: 10pt;
            width: 18px;
            border:solid windowtext 1.0pt;
            border-right: none;
            text-align: center;
        }
        .kotak2kedua{
            font-family: 'tahoma';
            font-size: 10pt;
            width: 18px;
            border-top:solid windowtext 1.0pt;
            border-left:solid windowtext 1.0pt;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="sampul">
        <!--baris pertama start-->
        <div style="padding-top:25px;width: 100%;text-align: center;font-family: 'Century Gothic';font-size: 12pt;">
            <b>FAKTUR PAJAK</b>
        </div>
        <!--baris pertama end-->

        <!--baris kedua start-->
        <div style="height: 17px;border:solid windowtext 1.0pt;font-family: 'Tahoma';font-size: 10pt;">
            <div style="padding-left: 15px;float: left">Kode dan Nomor Seri Faktur Pajak :</div>
            <div style="padding-left: 10px;float: left">{{ $data->noFaktur }}</div>
        </div>
        <!--baris kedua end-->

        <!--baris ketiga start-->
        <div style="border:solid windowtext 1.0pt;border-top:none;padding:20px 5px 15px 15px;">
            <b style="font-family: 'Tahoma';font-size: 10pt;">Pengusaha Kena Pajak</b>
            <table style="font-family: 'Tahoma';font-size: 10pt;" cellspacing="0" cellpading="5">
                <tr>
                    <td class="label">Nama</td>
                    <td style="padding-right: 5px;width: 10px">:</td>
                    <td colspan="21">{{ $data->NamaPerusahaan }}</td>                    
                </tr>
                <tr>
                    <td class="label" style="vertical-align: top;">Alamat</td>
                    <td style="padding-right: 5px;vertical-align: top;">:</td>
                    <td colspan="21" style="padding-bottom:15px;width:550px;">{{ $data->Alamat }}</td>
                </tr>
                <tr>
                    <td class="label">NPWP</td>
                    <td style="padding-right: 5px;">:</td>
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
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;width: 90px"></td>
                </tr>
                <tr>
                    <td class="label">Tanggal Pengukuhan PKP</td>
                    <td style="padding-right: 5px;padding-top: 5px;width: 10px">:</td>
                    <td colspan="21"></td>                    
                </tr>
            </table>
        </div>
        <!--baris ketiga end-->

        <!--baris keempat start-->
        <div style="border:solid windowtext 1.0pt;border-top:none;border-bottom: none;padding:20px 5px 0px 15px;">
            <b style="font-family: 'Tahoma';font-size: 10pt;">Pembeli Barang Kena Pajak / Penerima Jasa Kena Pajak</b>
            <table style="font-family: 'Tahoma';font-size: 10pt;" cellspacing="0" cellpading="5">
                <tr>
                    <td class="label">Nama</td>
                    <td style="padding-right: 5px;width: 10px">:</td>
                    <td colspan="21">{{ $data2->NamaPerusahaan }}</td>                    
                </tr>
                <tr>
                    <td class="label" style="vertical-align: top;">Alamat</td>
                    <td style="padding-right: 5px;vertical-align: top;">:</td>
                    <td colspan="21" style="padding-bottom:5px;width:550px;">{{ $data2->Alamat }}</td>
                </tr>
                <tr>
                    <td class="label">NPWP</td>
                    <td style="padding-right: 5px;">:</td>
                    <td class="kotak2">{{ $nb[0] }}</td>
                    <td class="kotak2">{{ $nb[1] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">.</td>
                    <td class="kotak2">{{ $nb[3] }}</td>
                    <td class="kotak2">{{ $nb[4] }}</td>
                    <td class="kotak2">{{ $nb[5] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">.</td>
                    <td class="kotak2">{{ $nb[7] }}</td>
                    <td class="kotak2">{{ $nb[8] }}</td>
                    <td class="kotak2">{{ $nb[9] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">.</td>
                    <td class="kotak2">{{ $nb[11] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">-</td>
                    <td class="kotak2">{{ $nb[13] }}</td>
                    <td class="kotak2">{{ $nb[14] }}</td>
                    <td class="kotak2">{{ $nb[15] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;">.</td>
                    <td class="kotak2">{{ $nb[17] }}</td>
                    <td class="kotak2">{{ $nb[18] }}</td>
                    <td class="kotak2">{{ $nb[19] }}</td>
                    <td class="kotak2" style="border:none;border-left: solid windowtext 1.0pt;width: 90px"></td>
                </tr>
            </table>
        </div>
        <div style="border:solid windowtext 1.0pt;border-top: none;height: 15px;"></div>
        <!--baris keempat end-->

        <!--baris kelima start-->
        <div style="border: solid windowtext 1.0pt;border-top: none;padding: 0px 0px 0px 0px">
            <table style="font-family: 'Tahoma';font-size: 10pt;text-align: center;" cellspacing="0" cellpading="5">
                <tr>
                    <td style="padding:12px 0px 12px 0px;width: 50px;border-right: solid windowtext 1.0pt;">No.<br/>Urut</td>
                    <td style="padding:5px 5px 5px 5px;width: 470px;border-right: solid windowtext 1.0pt;">Nama Barang Kena Pajak /Jasa Kena Pajak</td>
                    <td style="width: 204px;padding: 5px 5px 5px 0px">Harga<br/>Jual/Penggantian/Uang</td>
                </tr>
            </table>
        </div>
        <!--baris kelima end-->

        <!--baris keenam start-->
        {? $NilaiPembayaran = number_format($data->NilaiPembayaran, 0, ',', '.') ?}
        {? $NilaiDasarPengenaan = number_format($data->NilaiDasarPengenaan, 0, ',', '.') ?}
        {? $NilaiPPN = number_format($data->NilaiPPN, 0, ',', '.') ?}
        <div style="border: solid windowtext 1.0pt;border-top: none;padding: 0px 0px 0px 0px;">
            <table style="font-family: 'Tahoma';font-size: 10pt;text-align: center;" cellspacing="0" cellpading="5">
                <tr>
                    <td style="vertical-align: top;height: 205px;padding:5px 0px 5px 0px;width: 50px;border-right: solid windowtext 1.0pt;">01</td>
                    <td style="text-align: left;vertical-align: top;padding:5px 5px 5px 5px;width: 465px;border-right: solid windowtext 1.0pt;">
                        {{ $data->KetPembayaran }}
                    </td>
                    <td style="vertical-align: top;width: 204px;text-align: right;padding: 5px 5px 5px 0px;">
                        {{ $NilaiPembayaran }},00
                    </td>
                </tr>
            </table>
        </div>
        <!--baris keenam end-->

        <!--baris ketujuh sampai dua belas start-->
        <div style="font-family: 'Tahoma';font-size: 10pt;border: solid windowtext 1.0pt;border-top: none;border-bottom: none">
            <!--baris pertama start-->
            <div style="padding-left: 15px;width: 504px;float: left;border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;">Harga Jual/Penggantian/Uang Muka/Termijn</div>
            <div style="padding-right: 5px;width: 203px;float: right;border-bottom:solid windowtext 1.0pt;text-align: right;">{{ $NilaiPembayaran }},00</div>
            <!--baris pertama end-->

            <!--baris kedua start-->
            <div style="padding-left: 15px;width: 504px;float: left;border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;">Dikurangi IMB</div>
            <div style="padding-right: 5px;width: 203px;float: right;border-bottom:solid windowtext 1.0pt;text-align: right;">&nbsp;</div>
            <!--baris kedua end-->

            <!--baris ketiga start-->
            <div style="padding-left: 15px;width: 504px;float: left;border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;">Dikurangi Uang muka yang telah diterima</div>
            <div style="padding-right: 5px;width: 203px;float: right;border-bottom:solid windowtext 1.0pt;text-align: right;">&nbsp;</div>
            <!--baris ketiga end-->

            <!--baris keempat start-->
            <div style="padding-left: 15px;width: 504px;float: left;border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;">
                Dasar Pengenaan Pajak @if($data->MetodeHitung == '1') 100/110 X @endif @if($data->MetodeHitung == '1')<span style="padding-left: 25px;">Rp</span><span style="padding-left: 50px;">{{ $NilaiPembayaran }}</span>@endif
            </div>
            <div style="padding-right: 5px;width: 203px;float: right;border-bottom:solid windowtext 1.0pt;text-align: right;">{{ $NilaiDasarPengenaan }},00</div>
            <!--baris keempat end-->

            <!--baris kelima start-->
            <div style="padding-left: 15px;width: 504px;float: left;border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;">
                Pajak = 10% x <span style="padding-left: 15px;">Rp</span><span style="padding-left: 50px;">{{ $NilaiDasarPengenaan }}</span>
            </div>
            <div style="padding-right: 5px;width: 203px;float: right;border-bottom:solid windowtext 1.0pt;text-align: right;">{{ $NilaiPPN }},00</div>
            <!--baris kelima end-->

            <!--baris keenam start-->
            <div style="padding-left: 15px;width: 504px;float: left;border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;">Pajak Penjualan Atas Barang Mewah</div>
            <div style="padding-right: 5px;width: 203px;float: right;border-bottom:solid windowtext 1.0pt;text-align: right;">&nbsp;</div>
            <!--baris keenam end-->
            <div>&nbsp;</div><div>&nbsp;</div>
        </div>
        <!--baris ketujuh sampai dua belas end-->

        <!--baris ketiga belas start-->
        <div style="height: 150px;font-family: 'Tahoma';font-size: 10pt;border: solid windowtext 1.0pt;border-top: none;padding:0px 0px 0px 15px;">
            <div style="float:left">
                <table style="font-family: 'Tahoma';font-size: 10pt;" cellspacing="0" cellpading="5">
                    <tr>
                        <td style="border: solid windowtext 1.0pt;width: 90px;text-align: center">TARIF</td>
                        <td style="border: solid windowtext 1.0pt;border-left: none;width: 120px;text-align: center">DPP</td>
                        <td style="border: solid windowtext 1.0pt;border-left: none;width: 130px;text-align: center">PPn BM</td>
                    </tr>
                    @for($i=1;$i<=4;$i++)
                    <tr>
                        <td style="border: solid windowtext 1.0pt;border-top: none;">...................%</td>
                        <td style="border: solid windowtext 1.0pt;border-top: none;border-left: none;">Rp. .......................</td>
                        <td style="border: solid windowtext 1.0pt;border-top: none;border-left: none;">Rp. ..........................</td>
                    </tr>
                    @endfor
                    <tr>
                        <td colspan="2" style="border: solid windowtext 1.0pt;border-top: none;padding-left: 20px">JUMLAH</td>
                        <td style="border-bottom: solid windowtext 1.0pt;border-right: solid windowtext 1.0pt;">Rp. ..........................</td>
                    </tr>
                </table>
            </div>

            <div style="float: right;text-align: center;padding-right: 10px;">
                <div>Sangatta, {{ $TanggalPembayaran }}</div>
                <div>Bendahara Pengeluaran Dinas PU Kab. Kutai Timur</div>
                <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
                <div style="text-decoration: underline;">{{ $data3->Nama }}</div>
                <div>{{ $data3->NIP }}</div>
            </div>
        </div>
        <!--baris ketiga belas end-->
    </div>
</body>