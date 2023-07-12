<div class="modal fade" id="modal_show" role="dialog" style="padding:0;">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5><i class="fa fa-edit"></i> Import Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="{{ url('admin/pendaftar/import-data') }}" id="idForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
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

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Browse File <em>(File Type *.xlsx)</em></label>
                                <input type="file" class="form-control form-control-sm" name="file" required>
                                <p><a href="{{ asset('format-upload.xlsx') }}">Format Upload</a></p>
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
