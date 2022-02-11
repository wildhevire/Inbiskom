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

<?php if (isset($model['success'])) { ?>
    <!-- ! SUCCESS ALERT -->
    <div class="bm-alert bm-alert--success mt-4" role="alert">
        <div class="bm-alert__icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="bm-alert__content"><?= $model['success'] ?></div>
    </div>
    <!-- ! END OF SUCCESS ALERT -->
<?php } ?>

<?php if (isset($model['error'])) { ?>
    <!-- ! ERROR ALERT -->
    <div class="bm-alert bm-alert--error mt-4" role="alert">
        <div class="bm-alert__icon">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="bm-alert__content"><?= $model['error'] ?></div>
    </div>
    <!-- ! END OF ERROR ALERT -->
<?php } ?>

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
        <?php $counter = 0 ?>
        <?php foreach ($model['data'] as $data) : ?>
            <tr>
                <?php $counter++; ?>
                <td><?= $counter ?></td>
                <td><?= $data['nama_pengguna'] ?></td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['tahun_aktif'] ?></td>
                <td><?= $data['hak_akses'] ?></td>
                <td><?php echo $data['status'] == 1 ? "Aktif" : "Tidak Aktif" ?></td>
                <td>
                    <a rel="modal:open" href="#edit_modal" class="bm-link btn_update"
                       id="btn_update" data-id="<?= $data['id_pengguna']; ?>" data-nama="<?= $data['nama_pengguna']; ?>"
                       data-username="<?= $data['username']; ?>" data-tahun-aktif="<?= $data['tahun_aktif']; ?>"
                       data-hak-akses="<?= $data['hak_akses']; ?>"
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
        <?php endforeach; ?>

        </tbody>
    </table>
</div>


<!-- ! TAMBAH MODAL -->
<div
        class="bm-modal h-auto"
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

            <br/>
            <label class="bm-input-label" for="username">Username</label>
            <div class="bm-input">
                <input name="username"
                       type="text"
                       id="username"
                       class="bm-input__field"
                       placeholder="Contoh: john_doe"
                />
            </div>

            <br/>

            <label class="bm-input-label" for="password">Password</label>
            <div class="bm-input">
                <input name="password"
                       type="password"
                       id="password"
                       class="bm-input__field"
                       placeholder="Minimal 8 karakter"
                />
            </div>

            <br/>

            <label class="bm-input-label" for="tahun-aktif">Tahun aktif</label>
            <div class="bm-input">
                <input name="tahun_aktif"
                       type="number"
                       id="tahun-aktif"
                       class="bm-input__field"
                       placeholder="Contoh: 2021"
                />
            </div>

            <br/>

            <label class="bm-input-label">Hak akses</label>
            <div class="row px-5">
                <label class="bm-radio col-6">
                    Ketua divisi
                    <input
                            type="radio"
                            class="bm-radio__input"
                            id="hak-akses-kepala"
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
                            id="hak-akses-sekretaris"
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
        class="bm-modal h-auto"
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
    <form action="/update-pengguna" method="POST">
        <div class="bm-modal__body">

            <input type="hidden" name="id_pengguna" id="id_pengguna">
            <label class="bm-input-label" for="nama">Nama</label>
            <div class="bm-input">
                <input name="nama_pengguna"
                        type="text"
                        id="update_nama"
                        class="bm-input__field"
                        placeholder="Contoh: John Doe"
                />
            </div>

            <br/>
            <label class="bm-input-label" for="username">Username</label>
            <div class="bm-input">
                <input name="username"
                        type="text"
                        id="update_username"
                        class="bm-input__field"
                        placeholder="Contoh: john_doe"
                />
            </div>

            <br/>

            <label class="bm-input-label" for="password">Password</label>
            <div class="bm-input">
                <input name="password"
                        type="password"
                        id="update_password"
                        class="bm-input__field"
                        placeholder="Minimal 8 karakter"
                />
            </div>

            <br/>

            <label class="bm-input-label" for="tahun-aktif">Tahun aktif</label>
            <div class="bm-input">
                <input name="tahun_aktif"
                        type="number"
                        id="update_tahun-aktif"
                        class="bm-input__field"
                        placeholder="Contoh: 2021"
                />
            </div>

            <br/>

            <label class="bm-input-label">Hak akses</label>
            <div class="row px-5">
                <label class="bm-radio col-6">
                    Ketua divisi
                    <input
                            type="radio"
                            class="bm-radio__input"
                            id="update_hak-akses-kepala"
                            name="hak_akses"
                            value="ketua_divisi"
                    />
                    <span class="bm-radio__checkmark"></span>
                </label>
                <label class="bm-radio col-6">
                    Sekretaris
                    <input
                            type="radio"
                            class="bm-radio__input"
                            id="update_hak-akses-sekretaris"
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


<!-- ! END OF EDIT MODAL -->

<!-- ! DELETE MODAL -->
<div
        class="bm-modal h-auto"
        id="delete_modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-label"
        tabindex="-1"
>
    <form action="/delete-pengguna" method="POST">
        <input type="hidden" name="id_pengguna" id="delete_id_pengguna"/>
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
    </form>
</div>
<!-- ! END OF DELETE MODAL -->

<script>
    $(".btn_update").click(function () {
        var id_pengguna = $(this).data("id");
        var nama = $(this).data("nama");
        var username = $(this).data("username");
        var tahun_aktif = $(this).data("tahunAktif");
        var hak_akses = $(this).data("hakAkses");
        console.log($(this).data())

        $("#id_pengguna").val(id_pengguna);
        $("#update_nama").val(nama);
        $("#update_username").val(username);
        $("#update_tahun-aktif").val(tahun_aktif);
        hak_akses === "sekretaris" ? console.log(true) :console.log(false);
        hak_akses === "sekretaris" ? $("#update_hak-akses-sekretaris").prop('checked', true) : $("#update_hak-akses-kepala").prop('checked', true);
    });

    $(".btn_delete").click(function () {
        var id = $(this).data("id_pengguna");

        $("#delete_id_pengguna").val(id);
    });

</script>