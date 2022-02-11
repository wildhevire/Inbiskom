<h2 class="mb-4">Kategori</h2>
<div class="row align-items-center">
    <div class="col">
        <a rel="modal:open" href="#add_modal" class="bm-btn"
        ><span class="bm-btn__icon">
                  <i class="fas fa-plus"></i>
                </span>
            <span class="bm-btn__label">Tambah kategori</span></a
        >
    </div>
    <!-- <div class="col-4">
        <div class="bm-input bm-input--outline bm-input--with-icon">
            <input
                    type="text"
                    class="bm-input__field"
                    placeholder="Cari kategori"
            />
            <div class="bm-input__icon">
                <i class="fa fa-search"></i>
            </div>
        </div>
    </div> -->
</div>

<?php if(isset($model['success'])) {?>
    <!-- ! SUCCESS ALERT -->
    <div class="bm-alert bm-alert--success mt-4" role="alert">
        <div class="bm-alert__icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="bm-alert__content"><?= $model['success'] ?></div>
    </div>
    <!-- ! END OF SUCCESS ALERT -->
<?php } ?>

<?php if(isset($model['error'])) {?>
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
        <th>Nama kategori</th>
        <th>Aksi</th>
        </thead>
        <tbody>
        <?php $counter = 0; ?>
        <?php foreach ($model['data'] as $data) : ?>
        <tr>
            <?php $counter++; ?>
            <td> <?= $counter ?> </td>
            <td><?= $data['nama_kategori'] ?></td>
            <td>
                <a rel="modal:open" href="#update_modal" class="bm-link btn_update"
                   id="btn_update" data-id="<?= $data['id_kategori']; ?>" data-nama="<?= $data['nama_kategori']; ?>"
                >Ubah</a
                >&nbsp;&nbsp;&nbsp;&nbsp;
                <a
                        rel="modal:open"
                        href="#delete_modal"
                        class="bm-link text-danger btn_delete"
                        id="btn_delete" data-id_kategori="<?= $data['id_kategori'] ?>" data-nama_kategori="<?= $data['nama_kategori'] ?>"
                >Hapus</a
                >
            </td>
        </tr>
        <?php endforeach; ?>

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
        <h5 class="bm-modal__title">Tambah Kategori</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
            <span class="bm-modal__icon-close"></span>
            <span class="bm-sr-only">Close</span>
        </a>
    </div>

    <form action="/AddKategori" method="POST">
        <div class="bm-modal__body">
            <label class="bm-input-label" for="nama-kategori">Nama Kategori</label>
            <div class="bm-input bm-input--with-icon">
                <input name="nama_kategori"
                       id="nama-kategori"
                       type="text"
                       class="bm-input__field"
                       placeholder="Contoh: Makanan & Minuman"
                />
                <div class="bm-input__icon">
                    <i class="fa fa-tags"></i>
                </div>
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
        id="update_modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-label"
        tabindex="-1"
>
    <div class="bm-modal__header">
        <h5 class="bm-modal__title">Edit Kategori</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
            <span class="bm-modal__icon-close"></span>
            <span class="bm-sr-only">Close</span>
        </a>
    </div>

    <form action="/UpdateKategori" method="POST">
        <div class="bm-modal__body">
            <input type="hidden" name="id_kategori" id="id_kategori"/>
            <label class="bm-input-label" for="nama-kategori">Nama Kategori</label>
            <div class="bm-input bm-input--with-icon">
                <input name="nama_kategori"
                       id="update_nama_kategori"
                       type="text"
                       class="bm-input__field"
                       placeholder="Contoh: Makanan & Minuman"
                />
                <div class="bm-input__icon">
                    <i class="fa fa-tags"></i>
                </div>
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
        class="bm-modal h-auto bm-modal--scrollable"
        id="delete_modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-label"
        tabindex="-1"
>
    <form action="/DeleteKategori" method="POST">
        <input type="hidden" name="id_kategori" id="delete_id_kategori"/>
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
            <button type="submit" class="bm-btn bm-btn--danger">
                <span class="bm-btn__label">Ya, hapus data ini!</span>
            </button>
        </div>
    </form>

</div>
<!-- ! END OF DELETE MODAL -->
<script>
    $(".btn_update").click(function (){
        var id = $(this).data("id");
        var nama = $(this).data("nama");

        $("#id_kategori").val(id);
        $("#update_nama_kategori").val(nama);
    });

    $(".btn_delete").click(function (){
        var id = $(this).data("id_kategori");

        $("#delete_id_kategori").val(id);
    });

</script>