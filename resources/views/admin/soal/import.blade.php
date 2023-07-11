<div class="modal fade" id="modal_show" role="dialog" style="padding:0;">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5><i class="fa fa-cloud-upload"></i> Import Soal</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="{{ route('admin.soalimportprocess') }}" id="idForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kategori Soal</label>
                                <select class="form-control form-control-sm" name="kategori" required>
                                    <option value="" disabled selected>Pilih</option>
                                    @foreach($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori_soal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>File <em>(Tipe: .xlsx)</em></label>
                                <input type="file" name="file" class="form-control form-control-sm" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary btn-fill btn-wd"><i class="fa fa-cloud-upload"></i>
                        Import</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                            class="fa fa-times"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>