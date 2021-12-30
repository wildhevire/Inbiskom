<h2 class="mb-4">Pengguna</h2>
<div class="row align-items-center">
    <div class="col">
        <a rel="modal:open" href="#add_modal" class="bm-btn"
        ><span class="bm-btn__icon">
                  <i class="fas fa-plus"></i>
                </span>
            <span class="bm-btn__label">Tambah pengguna</span></a
        >
    </div>
    <div class="col-4">
        <div class="bm-input bm-input--outline bm-input--with-icon">
            <input
                    type="text"
                    class="bm-input__field"
                    placeholder="Cari pengguna"
            />
            <div class="bm-input__icon">
                <i class="fa fa-search"></i>
            </div>
        </div>
    </div>
</div>
<!-- ! SUCCESS ALERT -->
<div class="bm-alert bm-alert--success mt-4" role="alert">
    <div class="bm-alert__icon">
        <i class="fas fa-check-circle"></i>
    </div>
    <div class="bm-alert__content">Success message</div>
</div>
<!-- ! END OF SUCCESS ALERT -->

<!-- ! ERROR ALERT -->
<div class="bm-alert bm-alert--error mt-4" role="alert">
    <div class="bm-alert__icon">
        <i class="fas fa-exclamation-circle"></i>
    </div>
    <div class="bm-alert__content">Error message</div>
</div>
<!-- ! END OF ERROR ALERT -->

<div class="bm-card mt-4 bg-white">
    <table class="bm-table w-100">
        <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Tahun aktif</th>
        <th>Hak akses</th>
        <th>Status</th>
        <th>Aksi</th>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Benno Alif</td>
            <td>benno_alif</td>
            <td>2021</td>
            <td>Kepala Divisi</td>
            <td>Aktif</td>
            <td>
                <a rel="modal:open" href="#edit_modal" class="bm-link"
                >Ubah</a
                >&nbsp;&nbsp;&nbsp;&nbsp;
                <a
                        rel="modal:open"
                        href="#delete_modal"
                        class="bm-link text-danger"
                >Ubah status</a
                >
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Wildan</td>
            <td>wildan</td>
            <td>2021</td>
            <td>Sekretaris</td>
            <td>Aktif</td>
            <td>
                <a rel="modal:open" href="#edit_modal" class="bm-link"
                >Ubah</a
                >&nbsp;&nbsp;&nbsp;&nbsp;
                <a
                        rel="modal:open"
                        href="#delete_modal"
                        class="bm-link text-danger"
                >Ubah status</a
                >
            </td>
        </tr>
        </tbody>
    </table>
</div>



<!-- ! TAMBAH MODAL -->
<div
        class="bm-modal h-auto bm-modal--scrollable"
        id="add_modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-label"
        tabindex="-1"
>
    <div class="bm-modal__header">
        <h5 class="bm-modal__title">Tambah data pengguna</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
            <span class="bm-modal__icon-close"></span>
            <span class="bm-sr-only">Batal</span>
        </a>
    </div>
    <form action="/AddPengguna" method="POST">

        <div class="bm-modal__body">
            <label class="bm-input-label" for="nama">Nama</label>
            <div class="bm-input">
                <input name="nama_pengguna"
                        type="text"
                        id="nama"
                        class="bm-input__field"
                        placeholder="Contoh: John Doe"
                />
            </div>

            <br />
            <label class="bm-input-label" for="username">Username</label>
            <div class="bm-input">
                <input name="username"
                        type="text"
                        id="username"
                        class="bm-input__field"
                        placeholder="Contoh: john_doe"
                />
            </div>

            <br />

            <label class="bm-input-label" for="password">Password</label>
            <div class="bm-input">
                <input name="password"
                        type="password"
                        id="password"
                        class="bm-input__field"
                        placeholder="Minimal 8 karakter"
                />
            </div>

            <br />

            <label class="bm-input-label" for="tahun-aktif">Tahun aktif</label>
            <div class="bm-input">
                <input name="tahun_aktif"
                        type="number"
                        id="tahun-aktif"
                        class="bm-input__field"
                        placeholder="Contoh: 2021"
                />
            </div>

            <br />

            <label class="bm-input-label">Hak akses</label>
            <div class="row px-5">
                <label class="bm-radio col-6">
                    Ketua divisi
                    <input
                            type="radio"
                            class="bm-radio__input"
                            id="hak-akses"
                            name="hak_akses"
                            value="ketua-divisi"
                    />
                    <span class="bm-radio__checkmark"></span>
                </label>
                <label class="bm-radio col-6">
                    Sekretaris
                    <input
                            type="radio"
                            class="bm-radio__input"
                            id="hak-akses"
                            name="hak_akses"
                            value="sekretaris"
                    />
                    <span class="bm-radio__checkmark"></span>
                </label>
            </div>
        </div>

        <div class="bm-modal__footer">
            <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
                <span class="bm-btn__label">Batal</span>
            </a>
            <button type="submit" class="bm-btn">
                <span class="bm-btn__label">Simpan</span>
            </button>
        </div>
    </form>
</div>
<!-- ! END OF TAMBAH MODAL -->

<!-- ! EDIT MODAL -->
<div
        class="bm-modal h-auto bm-modal--scrollable"
        id="edit_modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-label"
        tabindex="-1"
>
    <div class="bm-modal__header">
        <h5 class="bm-modal__title">Ubah data pengguna</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
            <span class="bm-modal__icon-close"></span>
            <span class="bm-sr-only">Batal</span>
        </a>
    </div>

    <div class="bm-modal__body">
        <label class="bm-input-label" for="nama">Nama</label>
        <div class="bm-input">
            <input
                    type="text"
                    id="nama"
                    class="bm-input__field"
                    placeholder="Contoh: John Doe"
            />
        </div>

        <br />
        <label class="bm-input-label" for="username">Username</label>
        <div class="bm-input">
            <input
                    type="text"
                    id="username"
                    class="bm-input__field"
                    placeholder="Contoh: john_doe"
            />
        </div>

        <br />

        <label class="bm-input-label" for="password">Password</label>
        <div class="bm-input">
            <input
                    type="password"
                    id="password"
                    class="bm-input__field"
                    placeholder="Minimal 8 karakter"
            />
        </div>

        <br />

        <label class="bm-input-label" for="tahun-aktif">Tahun aktif</label>
        <div class="bm-input">
            <input
                    type="number"
                    id="tahun-aktif"
                    class="bm-input__field"
                    placeholder="Contoh: 2021"
            />
        </div>

        <br />

        <label class="bm-input-label">Hak akses</label>
        <div class="row px-5">
            <label class="bm-radio col-6">
                Ketua divisi
                <input
                        type="radio"
                        class="bm-radio__input"
                        id="hak-akses"
                        name="hak-akses"
                        value="ketua-divisi"
                />
                <span class="bm-radio__checkmark"></span>
            </label>
            <label class="bm-radio col-6">
                Sekretaris
                <input
                        type="radio"
                        class="bm-radio__input"
                        id="hak-akses"
                        name="hak-akses"
                        value="sekretaris"
                />
                <span class="bm-radio__checkmark"></span>
            </label>
        </div>
    </div>

    <div class="bm-modal__footer">
        <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
            <span class="bm-btn__label">Batal</span>
        </a>
        <button type="button" class="bm-btn">
            <span class="bm-btn__label">Simpan</span>
        </button>
    </div>
</div>
<!-- ! END OF EDIT MODAL -->

<!-- ! DELETE MODAL -->
<div
        class="bm-modal h-auto bm-modal--scrollable"
        id="delete_modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-label"
        tabindex="-1"
>
    <div class="bm-modal__header">
        <h5 class="bm-modal__title">Apakah Anda yakin?</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
            <span class="bm-modal__icon-close"></span>
            <span class="bm-sr-only">Batal</span>
        </a>
    </div>

    <div class="bm-modal__body">
        <p class="bm-body1">
            Anda tidak akan dapat memulihkan data ini jika sudah di hapus
        </p>
    </div>

    <div class="bm-modal__footer">
        <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
            <span class="bm-btn__label">Batal</span>
        </a>
        <button type="button" class="bm-btn bm-btn--danger">
            <span class="bm-btn__label">Ya, hapus data ini!</span>
        </button>
    </div>
</div>
<!-- ! END OF DELETE MODAL -->

