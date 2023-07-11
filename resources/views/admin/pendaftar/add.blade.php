<div class="modal fade" id="modal_show" role="dialog" style="padding:0;">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5><i class="fa fa-edit"></i> Tambah Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="{{ url('admin/pendaftar/store') }}" id="idForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No. Telp / WhatsApp</label>
                                <input type="text" name="telp"
                                    class="form-control form-control-sm form-control form-control-sm-sm"
                                    autocomplete="off" required placeholder="No.Telp/WhatsApp">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Pendaftar</label>
                                <input type="text" name="nama" class="form-control form-control-sm"
                                    placeholder="Nama Pendaftar" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Studi</label>
                                <select name="prodi" class="form-control form-control-sm" required>
                                    <option value="" selected disabled>Pilih</option>
                                    @foreach ($prodi as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_program_studi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary btn-fill btn-wd"><i class="fa fa-save"></i>
                        Simpan</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                            class="fa fa-times"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
