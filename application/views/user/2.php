    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">Detail Masalah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Loading bar animasi -->
                                        <div id="loading-bar"></div>
                                        <div class="form-group row center">
                                            <div class="col-sm-10">
                                                <label for="masalah" class="col-form-label">Masalah<sup style="color: red;">*</sup></label>
                                                <textarea id="fullKeterangan" name="fullKeterangan"></textarea>
                                                <?= form_error('masalah', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>


                                        <!-- Textarea untuk CKEditor -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>