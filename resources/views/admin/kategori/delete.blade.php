<div class="modal fade" id="modal_show" role="dialog" style="padding:0;">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5>Hapus Kategori Soal</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                @csrf
                <div class="modal-body">
                    <div class="table">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5>Yakin ingin menghapus data ini?</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('admin.kategoridestroy') }}" id="idForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $kategori->id }}">
                        <button type="submit" class="btn btn-xs btn-primary btn-fill btn-wd"><i class="fa fa-trash"></i> Hapus</button>
                        <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tidak</button>
                    </form>
                </div>
        </div>
    </div>
</div>
