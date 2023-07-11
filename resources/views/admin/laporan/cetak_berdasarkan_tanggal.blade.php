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
    <h4>Rekap daftar Per Tanggal Daftar {{ $dari }} Sampai {{ $sampai }}</h4>
    <br>
    <table style="border: 1px solid black">
        <thead>
            <tr>
                <th rowspan="3" class="text-center">Program Studi</th>
                <th colspan="9" class="text-center">Jalur Pendaftaran</th>
                <th rowspan="3" class="text-center">Total</th>

                <th colspan="6" class="text-center">Status Pembayaran PMB</th>
                <th colspan="6" class="text-center">Status Pembayaran Daftar Ulang</th>
            </tr>
            <tr>
                <th colspan="3" class="text-center">Reguler Pagi</th>
                <th colspan="3" class="text-center">Reguler Sore</th>
                <th colspan="3" class="text-center">Kelas Karyawan</th>

                <th colspan="2" class="text-center">Reguler Pagi</th>
                <th colspan="2" class="text-center">Reguler Sore</th>
                <th colspan="2" class="text-center">Kelas Karyawan</th>

                <th colspan="2" class="text-center">Reguler Pagi</th>
                <th colspan="2" class="text-center">Reguler Sore</th>
                <th colspan="2" class="text-center">Kelas Karyawan</th>
            </tr>
            <tr>
                @foreach ($jalur as $key)
                    <th class="text-center">Jalur {{ $key->jalur }} </th>
                @endforeach
                <th class="text-center">Total</th>
                @foreach ($jalur as $key)
                    <th class="text-center">Jalur {{ $key->jalur }} </th>
                @endforeach
                <th class="text-center">Total</th>
                @foreach ($jalur as $key)
                    <th class="text-center">Jalur {{ $key->jalur }} </th>
                @endforeach
                <th class="text-center">Total</th>

                {{-- pmb --}}
                <th class="text-center">Belum Bayar</th>
                <th class="text-center">Sudah Bayar</th>

                <th class="text-center">Belum Bayar</th>
                <th class="text-center">Sudah Bayar</th>

                <th class="text-center">Belum Bayar</th>
                <th class="text-center">Sudah Bayar</th>

                {{-- daftar ulang --}}
                <th class="text-center">Belum Bayar</th>
                <th class="text-center">Sudah Bayar</th>

                <th class="text-center">Belum Bayar</th>
                <th class="text-center">Sudah Bayar</th>

                <th class="text-center">Belum Bayar</th>
                <th class="text-center">Sudah Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fakultas as $row)
                @foreach ($row->program_studi as $row_prodi)
                    <tr>
                        <td>{{ $row_prodi->nama_program_studi }}</td>
                        {{-- jalur --}}
                        @foreach ($jalur as $key)
                            <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Pagi')->where('jalur_id', $key->id)->count() }}
                            </td>
                        @endforeach
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Pagi')->count() }}
                        </td>

                        @foreach ($jalur as $key)
                            <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Sore')->where('jalur_id', $key->id)->count() }}
                            </td>
                        @endforeach
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Sore')->count() }}
                        </td>

                        @foreach ($jalur as $key)
                            <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Kelas Karyawan')->where('jalur_id', $key->id)->count() }}
                            </td>
                        @endforeach
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Kelas Karyawan')->count() }}
                        </td>

                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->count() }} </td>

                        {{-- pmb --}}
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Pagi')->where('status_pembayaran_pmb', 'belum bayar')->count() }}
                        </td>
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Pagi')->where('status_pembayaran_pmb', 'sudah bayar')->count() }}
                        </td>

                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Sore')->where('status_pembayaran_pmb', 'belum bayar')->count() }}
                        </td>
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Sore')->where('status_pembayaran_pmb', 'sudah bayar')->count() }}
                        </td>


                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Kelas Karyawan')->where('status_pembayaran_pmb', 'belum bayar')->count() }}
                        </td>
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Kelas Karyawan')->where('status_pembayaran_pmb', 'sudah bayar')->count() }}
                        </td>


                        {{-- daftar ulang --}}
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Pagi')->where('status_pembayaran_daftar_ulang', 'belum bayar')->count() }}
                        </td>
                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Pagi')->where('status_pembayaran_daftar_ulang', 'sudah bayar')->count() }}
                        </td>

                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Sore')->where('status_pembayaran_daftar_ulang', 'belum bayar')->count() }}
                        </td>

                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Reguler Sore')->where('status_pembayaran_daftar_ulang', 'sudah bayar')->count() }}
                        </td>


                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Kelas Karyawan')->where('status_pembayaran_daftar_ulang', 'belum bayar')->count() }}
                        </td>

                        <td>{{ $pendaftar->where('prodi_id', $row_prodi->id)->where('waktu_kuliah', 'Kelas Karyawan')->where('status_pembayaran_daftar_ulang', 'sudah bayar')->count() }}
                        </td>

                    </tr>
                @endforeach
            @endforeach
            <tr>
                <td>Total</td>
                {{-- jalur --}}
                @foreach ($jalur as $key)
                    <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Pagi')->where('jalur_id', $key->id)->count() }}
                    </td>
                @endforeach
                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Pagi')->count() }}
                </td>

                @foreach ($jalur as $key)
                    <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Sore')->where('jalur_id', $key->id)->count() }}
                    </td>
                @endforeach
                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Sore')->count() }}
                </td>

                @foreach ($jalur as $key)
                    <td>{{ $pendaftar->where('waktu_kuliah', 'Kelas Karyawan')->where('jalur_id', $key->id)->count() }}
                    </td>
                @endforeach
                <td>{{ $pendaftar->where('waktu_kuliah', 'Kelas Karyawan')->count() }}
                </td>

                <td>{{ $pendaftar->count() }} </td>

                {{-- pmb --}}
                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Pagi')->where('status_pembayaran_pmb', 'belum bayar')->count() }}
                </td>
                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Pagi')->where('status_pembayaran_pmb', 'sudah bayar')->count() }}
                </td>

                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Sore')->where('status_pembayaran_pmb', 'belum bayar')->count() }}
                </td>
                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Sore')->where('status_pembayaran_pmb', 'sudah bayar')->count() }}
                </td>


                <td>{{ $pendaftar->where('waktu_kuliah', 'Kelas Karyawan')->where('status_pembayaran_pmb', 'belum bayar')->count() }}
                </td>
                <td>{{ $pendaftar->where('waktu_kuliah', 'Kelas Karyawan')->where('status_pembayaran_pmb', 'sudah bayar')->count() }}
                </td>


                {{-- daftar ulang --}}
                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Pagi')->where('status_pembayaran_daftar_ulang', 'belum bayar')->count() }}
                </td>
                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Pagi')->where('status_pembayaran_daftar_ulang', 'sudah bayar')->count() }}
                </td>

                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Sore')->where('status_pembayaran_daftar_ulang', 'belum bayar')->count() }}
                </td>

                <td>{{ $pendaftar->where('waktu_kuliah', 'Reguler Sore')->where('status_pembayaran_daftar_ulang', 'sudah bayar')->count() }}
                </td>


                <td>{{ $pendaftar->where('waktu_kuliah', 'Kelas Karyawan')->where('status_pembayaran_daftar_ulang', 'belum bayar')->count() }}
                </td>

                <td>{{ $pendaftar->where('waktu_kuliah', 'Kelas Karyawan')->where('status_pembayaran_daftar_ulang', 'sudah bayar')->count() }}
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    {{-- <table>
        <tr>
            <td>Pendaftar untuk {{ $sampai }}</td>
            <td>{{ $pendaftar->count() }}</td>
        </tr>
        <tr>
            <td>Pendaftar Belum Bayar SPMB untuk {{ $sampai }}</td>
            <td>{{ $pendaftar->where('status_pembayaran_pmb', 'belum bayar')->count() }}</td>
        </tr>
        <tr>
            <td>Pendaftar Sudah Bayar SPMB untuk {{ $sampai }}</td>
            <td>{{ $pendaftar->where('status_pembayaran_pmb', 'sudah bayar')->count() }}</td>
        </tr>
        <tr>
            <td>Pendaftar Belum Bayar Daftar Ulang untuk {{ $sampai }}</td>
            <td>{{ $pendaftar->where('status_pembayaran_daftar_ulang', 'belum bayar')->count() }}</td>
        </tr>
        <tr>
            <td>Pendaftar Sudah Bayar Daftar Ulang untuk {{ $sampai }}</td>
            <td>{{ $pendaftar->where('status_pembayaran_daftar_ulang', 'sudah bayar')->count() }}</td>
        </tr>
    </table> --}}
</body>

</html>
