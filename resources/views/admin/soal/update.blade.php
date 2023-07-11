<div class="modal fade" id="modal_show" role="dialog" style="padding:0;">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5><i class="fa fa-edit"></i> Ubah Soal</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="{{ route('admin.soalupdate') }}" id="idForm">
                @csrf
                <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
                    <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label>Kategori Soal</label>
                                <select class="form-control form-control-sm" name="kategori" required>
                                    <option value="" disabled selected>Pilih</option>
                                    @foreach($kategori as $k)
                                    <option value="{{ $k->id }}" {{ ($k->id==$soal->kategori_id) ? "selected" : "" }} >{{ $k->nama_kategori_soal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Soal</label>
                                <textarea name="soal" id="soal_id" class="form-control form-control-sm" placeholder="Soal" autocomplete="off" required>{{ $soal->soal }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban A</label>
                                <textarea id="a_id" name="a" class="form-control form-control-sm" placeholder="A" autocomplete="off" required>{{ $soal->a }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban B</label>
                                <textarea id="b_id" name="b" class="form-control form-control-sm" placeholder="B" autocomplete="off" required>{{ $soal->b }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban C</label>
                                <textarea id="c_id" name="c" class="form-control form-control-sm" placeholder="C" autocomplete="off" required>{{ $soal->c }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban D</label>
                                <textarea id="d_id" name="d" class="form-control form-control-sm" placeholder="D" autocomplete="off" required>{{ $soal->d }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jawaban E</label>
                                <textarea id="e_id" name="e" class="form-control form-control-sm" placeholder="E" autocomplete="off" required>{{ $soal->e }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Kunci</label>
                                <select class="form-control form-control-sm" name="kunci" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="a" {{ ($soal->kunci=='a') ? "selected" : "" }} >A</option>
                                    <option value="b" {{ ($soal->kunci=='b') ? "selected" : "" }} >B</option>
                                    <option value="c" {{ ($soal->kunci=='c') ? "selected" : "" }} >C</option>
                                    <option value="d" {{ ($soal->kunci=='d') ? "selected" : "" }} >D</option>
                                    <option value="e" {{ ($soal->kunci=='e') ? "selected" : "" }} >E</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="{{ $soal->id }}">
                    <button type="submit" class="btn btn-sm btn-primary btn-fill btn-wd"><i class="fa fa-save"></i>
                        Simpan</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                            class="fa fa-times"></i>Tutup</button>
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