    <div class="table-responsive mt-3">
        <table id="dataTables" class="table table-sm table-bordered table-striped nowrap" width="100%">
            <thead>
                <tr style="background-color:#a51c30; color:#fff;">
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center" width="5%">Aksi</th>
                    <th class="text-center">Telp/WA</th>
                    <th class="text-center">Nama Pendaftar</th>
                    <th class="text-center">Program Studi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPendaftar as $key)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-list"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="javascript:;" data-id="{{ $key->id }}"
                                    class="dropdown-item bg-primary btn-ubah"><i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.pendaftar.resetPassword', $key->user_id) }}"
                                    id="form-reset-{{ $key->user_id }}" role="form" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="dropdown-item bg-warning" name="reset" type="submit"
                                        title="Reset Password" onclick="resetFunction({{ $key->user_id }})">
                                        <i class="fa fa-key"></i> Reset Password
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="text-center">{{ $key->no_telepon }}</td>
                        <td class="text-wrap">
                            {{ $key->nama_pendaftar }}
                        </td>
                        <td class="text-center">{{ $key->program_studi->nama_program_studi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="place-modal"></div>
    @push('js')
        <script>
            $(function() {
                $('#dataTables').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": false,
                });
            });
        </script>
    @endpush
