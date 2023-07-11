<div class="modal fade" id="modal_show" role="dialog" style="padding:0;">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5><i class="fa fa-edit"></i> Tambah Soal</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="{{ route('admin.soalstore') }}" enctype="multipart/form-data" id="idForm">
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
                                <label>Soal</label>
                                <textarea name="soal" id="soal_id" class="form-control form-control-sm" placeholder="Soal" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban A</label>
                                <textarea name="a" id="a_id" class="form-control form-control-sm" placeholder="A" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban B</label>
                                <textarea name="b" id="b_id" class="form-control form-control-sm" placeholder="B" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban C</label>
                                <textarea name="c" id="c_id" class="form-control form-control-sm" placeholder="C" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban D</label>
                                <textarea name="d" id="d_id" class="form-control form-control-sm" placeholder="D" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban E</label>
                                <textarea name="e" id="e_id" class="form-control form-control-sm" placeholder="E" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kunci</label>
                                <select class="form-control form-control-sm" name="kunci" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                    <option value="e">E</option>
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

<script>
    CKEDITOR.replace('soal_id');
    CKEDITOR.replace('a_id');
    CKEDITOR.replace('b_id');
    CKEDITOR.replace('c_id');
    CKEDITOR.replace('d_id');
    CKEDITOR.replace('e_id');
</script>