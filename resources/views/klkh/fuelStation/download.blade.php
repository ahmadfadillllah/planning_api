<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
        @page {
            size: A4 Potrait;
            margin: 5mm;
            /* orientation: landscape; */
        }
        @media print {
            body {
                margin: 0.2in;
                padding: 0;
                font-size: xx-small;
            }
            table {
                page-break-inside: avoid;
            }

        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: xx-small;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 0.8px;
            text-align: center;
        }
        td{
            width:20pt;
            height:12pt;
            padding:.5em;
        }
        th {
            background-color: #f2f2f2;
        }
        th[rowspan="3"] {
            vertical-align: middle;
        }
        th[colspan="2"] {
            background-color: #e0e0e0;
        }
        tr{
          height: 5mm;
        }
        tr td:nth-child(2){
            text-align: left;
        }
        .left{
            text-align:left
        }
        .right{
            text-align: right;
        }
        .no_border{
            border-left: none;
            border-right: none;
        }
        .header{
            display:flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #000;
        }
        .container{
            width: 100%;
            margin: 0 auto;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <td colspan="4" style="text-align: right;border-top:none;border-left:none;border-right:none;text-align: left;"><img src="" alt="Logo disini"></td>
                <td colspan="4" style="text-align: right;border-top:none;border-left:none;border-right:none;text-align: right;">FM-SHE-85/02/18/06/22</td>
            </tr>
            <tr style="border-top:2px solid #000">
                <td colspan="8" style="border:none;"><strong>Pemahaman JSA</strong></td>
            </tr>
            <tr>
                <td colspan="8" style="border:none;">
                    <p style="text-align: justify;">
                        Form ini untuk menjelaskan bahwa nama-nama yang tercantum dibawah ini adalah sebagai pelaksana pekerjaan yang sudah dibacakan urutan proses kerja, bahayanya serta penanggulangannya sebagaimana tertera di dalam JSA pekerjaan terkait, dan sudah memahaminya dengan jelas.
                    </p>
                </td>
            </tr>
            <tr >
                <td colspan="2" style="text-align: left; border:none;">Nama Pekerjaan</td>
                <td colspan="6" style="text-align: left;border:none;">:</td>
            </tr>
            <tr >
                <td colspan="2" style="text-align: left; border:none;">Lokasi Kerja</td>
                <td colspan="6" style="text-align: left;border:none;">:</td>
            </tr>
            <tr >
                <td colspan="2" style="text-align: left; border:none;">Tanggal dan Jam</td>
                <td colspan="6" style="text-align: left;border:none;">:</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;">Pengawas</td>
                <td colspan="2" style="text-align: left;">:</td>
                <td colspan="2" style="text-align: left;">Tanda Tangan</td>
                <td colspan="2" style="text-align: left;"></td>
            </tr>
            <tr>
                <td colspan="2">Nama Pekerja</td>
                <td colspan="2">Tanda Tangan</td>
                <td colspan="2">Nama Pekerja</td>
                <td colspan="2">Tanda Tangan</td>
            </tr>
            <tr>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">1</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">1</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">6</td>
                <td colspan="2" style="border:none;border-right:1px solid #000;text-align: left;border-left:1px solid #000;">6</td>
            </tr>
            <tr>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">2</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">2</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">7</td>
                <td colspan="2" style="border:none;border-right:1px solid #000;text-align: left;border-left:1px solid #000;">7</td>
            </tr>
            <tr>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">3</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">3</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">8</td>
                <td colspan="2" style="border:none;border-right:1px solid #000;text-align: left;border-left:1px solid #000;">8</td>
            </tr>
            <tr>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">4</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">4</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;">9</td>
                <td colspan="2" style="border:none;border-right:1px solid #000;text-align: left;border-left:1px solid #000;">9</td>
            </tr>
            <tr>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;border-bottom:1px solid #000;">5</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;border-bottom:1px solid #000;">5</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;border-bottom:1px solid #000;">5</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;text-align: left;border-bottom:1px solid #000;border-right:1px solid #000;">10</td>
            </tr>
            <tr>
                <td colspan="8" style="border:none;text-align: left;">Penjelasan Tambahan:</td>
            </tr>
            <tr>
                <td colspan="8" style="border:none;">
                    <p style="text-align: justify;">
                        Penjelasan ini diperlukan manakala ada Sub-sub pekerjaan tambahan yang belum tercantum dalam JSA yang sudah ditetapkan.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">Urutan Langkah Pekerjaan</td>
                <td colspan="2">Sumber / Unsur Bahaya</td>
                <td colspan="2">Risiko</td>
                <td colspan="2">Pengendalian / Rekomendasi Cara Kerja yang aman</td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
                <td colspan="2" style="border-top:none; border-bottom:none;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:none;"></td>
                <td colspan="2" style="border-top:none;"></td>
                <td colspan="2" style="border-top:none;"></td>
                <td colspan="2" style="border-top:none;"></td>
            </tr>

        </table>
    </div>
</body>
</html>
