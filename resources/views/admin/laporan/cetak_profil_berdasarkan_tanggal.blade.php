<html>

<head>
    <style>
        table,
        td,
        th {
            border: 1px solid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }
    </style>

</head>

<body>
    <h4>Rekap daftar Profil Pendaftar Per Tanggal Daftar {{ $dari }} Sampai {{ $sampai }}</h4>
    <br>
    <table style="border: 1px solid black">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Program Studi</td>
                <td>Waktu Kuliah</td>
                <td>Jalur</td>
                <td>Tanggal Daftar</td>
                <td>Tahun Daftar</td>
                <td>Gelombang</td>
                <td>No KTP</td>
                <td>No KK</td>
                <td>Tempat Lahir</td>
                <td>Tanggal Lahir</td>
                <td>Jenis Kelamin</td>
                <td>Agama</td>
                <td>Alamat</td>
                <td>Email</td>
                <td>No Telepon</td>
                <td>Link Instagram</td>
                <td>Nama Ayah</td>
                <td>Nama Ibu</td>
                <td>Pekerjaan Ayah</td>
                <td>Pekerjaan Ibu</td>
                <td>No Telepon Orang Tua</td>
                <td>Alamat Orang Tua</td>
                <td>No Nisn</td>
                <td>Nama Sekolah</td>
                <td>Jurusan Sekolah</td>
                <td>Nilai Rata rata Sekolah</td>
                <td>Tahun Lulus Sekolah</td>
                <td>Alamat Sekolah</td>
                <td>Tanggal Daftar</td>
                <td>No Va PMB</td>
                <td>Status Pembayaran PMB</td>
                <td>Tanggal Pembayaran PMB</td>
            	<td>Validasi PMB</td>
                <td>No Va Daftar Ulang</td>
                <td>Status Daftar Ulang</td>
                <td>Tanggal Daftar Ulang</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftar as $key)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $key->nama_pendaftar }}</td>
                    <td>{{ $key->program_studi->nama_program_studi }}</td>
                    <td>{{ $key->waktu_kuliah }}</td>
                    <td>{{ $key->jalur->jalur }}</td>
                    <td>{{ $key->tanggal_daftar }}</td>
                    <td>{{ $key->tahun_daftar }}</td>
                    <td>{{ $key->gelombang->gelombang }}</td>
                    <td>'{{ $key->no_ktp }}</td>
                    <td>'{{ $key->no_kk }}</td>
                    <td>{{ $key->tempat_lahir }}</td>
                    <td>{{ $key->tanggal_lahir }}</td>
                    <td>{{ $key->jenis_kelamin }}</td>
                    <td>{{ $key->agama }}</td>
                    <td>{{ $key->alamat_pendaftar }}</td>
                    <td>{{ $key->email }}</td>
                    <td>{{ $key->no_telepon }}</td>
                    <td>{{ $key->link_instagram }}</td>
                    <td>{{ $key->nama_ayah }}</td>
                    <td>{{ $key->nama_ibu }}</td>
                    <td>{{ $key->pekerjaan_ayah }}</td>
                    <td>{{ $key->pekerjaan_ibu }}</td>
                    <td>{{ $key->no_telepon_orang_tua }}</td>
                    <td>{{ $key->alamat_orang_tua }}</td>
                    <td>{{ $key->no_nisn }}</td>
                    <td>{{ $key->nama_sekolah }}</td>
                    <td>{{ $key->jurusan_sekolah }}</td>
                    <td>{{ $key->nilai_rata_rata_sekolah }}</td>
                    <td>{{ $key->tahun_lulus_sekolah }}</td>
                    <td>{{ $key->alamat_sekolah }}</td>
                    <td>{{ $key->tanggal_daftar }}</td>
                    <td>'{{ $key->no_va_pmb }}</td>
                    <td>{{ $key->status_pembayaran_pmb }}</td>
                    <td>{{ $key->tanggal_pembayaran_pmb }}</td>
                	<td>{{ $key->validasi_pembayaran_daftar_pmb }}</td>
                    <td>'{{ $key->no_va_daftar_ulang }}</td>
                    <td>{{ $key->status_pembayaran_daftar_ulang }}</td>
                    <td>{{ $key->tanggal_pembayaran_daftar_ulang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</body>

</html>
