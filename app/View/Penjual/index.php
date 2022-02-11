
<!-- ! MAIN CONTENT -->
<main class="container-fluid mt-4 pb-5">
    <h2 class="mb-4">Penjual</h2>
    <div class="row align-items-center">
        <div class="col">
            <a rel="modal:open" href="#add_modal" class="bm-btn"><span class="bm-btn__icon">
          <i class="fas fa-plus"></i>
        </span>
                <span class="bm-btn__label">Tambah Penjual</span></a>
        </div>
        <div class="col-4">
            <div class="bm-input bm-input--outline bm-input--with-icon">
                <input
                        type="text"
                        class="bm-input__field"
                        placeholder="Cari penjual"
                />
                <div class="bm-input__icon">
                    <i class="fa fa-search"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="bm-card mt-4 bg-white">
        <table class="bm-table w-100">
            <thead>
            <th>No</th>
            <th>No. Identitas</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Kelompok</th>
            <th>Aksi</th>
            </thead>
            <tbody>
            <?php $counter = 0?>
            <?php foreach ($model['penjual'] as $penjual) :?>
            <tr>
                <?php $counter++ ?>
                <td><?= $counter?></td>
                <td><?= $penjual['no_identitas']?></td>
                <td><?= $penjual['nama_penjual']?></td>
                <td><?= $penjual['tipe_kelompok']?></td>
                <td><?= $penjual['nama_kelompok']?></td>
                <td>
                    <a rel="modal:open" href="#edit_modal" class="bm-link btn_update"
                       id="btn_update"
                       data-id="<?= $penjual['id_detail_kelompok']; ?>"
                       data-no_id="<?= $penjual['no_identitas']; ?>"
                       data-nama_penjual = "<?= $penjual['nama_penjual']; ?>"
                       data-nama_tipe = "<?= $penjual['tipe_kelompok']; ?>"
                       data-nama_kelompok="<?= $penjual['nama_kelompok']; ?>"
                       data-id_kelompok"<?= $penjual['id_kelompok']; ?>"
                    >Ubah</a
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    <a

                            rel="modal:open"
                            href="#delete_modal"
                            class="bm-link text-danger btn_delete"

                            id="btn_delete"
                            data-id_detail_kelompok="<?= $penjual['id_detail_kelompok'] ?>"


                    >Hapus</a
                    >
                </td>
            </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    </div>
</main>
<!-- ! END OF MAIN CONTENT -->
</div>
</div>

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
        <h5 class="bm-modal__title">Ubah data penjual</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
            <span class="bm-modal__icon-close"></span>
            <span class="bm-sr-only">Batal</span>
        </a>
    </div>
    <form action="/UpdatePenjual" method="POST">
        <input type="hidden" name="id_penjual" id="id_pengguna"/>
    <div class="bm-modal__body">
        <label class="bm-input-label" for="no-identitas">No. Identitas</label>
        <div class="bm-input">
            <input
                    type="text"
                    id="no-identitas"
                    class="bm-input__field"
                    placeholder="Masukkan NIM atau NIK penjual"
                    name="no_identitas"
            />
        </div>

        <br />
        <label class="bm-input-label" for="nama">Nama</label>
        <div class="bm-input">
            <input
                    type="text"
                    id="nama"
                    class="bm-input__field"
                    placeholder="Nama lengkap anda"
                    name="nama_penjual"
            />
        </div>

        <br />
<!--        <label class="bm-input-label" for="jenis">Jenis</label>-->
<!--        <div class="bm-input">-->
<!--            <select class="bm-input__field"  name="tipe_kelompok" id="jenis" required>-->
<!--                <option disabled selected>Pilih opsi</option>-->
<!--                <option value="Mahasiswa" >Mahasiswa</option>-->
<!--                <option value="Umum">Umum</option>-->
<!--            </select>-->
<!--            <span class="bm-input__arrow"></span>-->
<!--        </div>-->
<!--        <br />-->
        <label class="bm-input-label" for="kelompok">Kelompok</label>
        <div class="bm-input">
            <select class="bm-input__field" name="kelompok" id="kelompok" required>
<!--                <option value="4" disabled selected>Pilih opsi</option>-->
<!--                <option value="1">Option 1</option>-->
<!--                <option value="2">Option 2</option>-->
<!--                <option value="3">Option 3</option>-->
                <?php foreach ($model['kelompok'] as $kelompok) :?>
                <option value="<?= $kelompok['id_kelompok'] ?>"><?= $kelompok['nama_kelompok'] ?></option>
                <?php endforeach;?>
            </select>
            <span class="bm-input__arrow"></span>
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
    <div class="bm-modal__header">
        <h5 class="bm-modal__title">Apakah Anda yakin?</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
            <span class="bm-modal__icon-close"></span>
            <span class="bm-sr-only">Batal</span>
        </a>
    </div>
    <form action="/DeletePenjual" method="POST">
        <input name="id_kelompok" type="text" id="delete_id_Kelompok">
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
        <h5 class="bm-modal__title">Tambah Penjual</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
            <span class="bm-modal__icon-close"></span>
            <span class="bm-sr-only">Close</span>
        </a>
    </div>

    <form action="/AddPenjual" method="POST">
        <div class="bm-modal__body">
            <label class="bm-input-label" for="no_identitas">No. Identitas</label>
            <div class="bm-input">
                <input name="no_identitas"
                       type="text"
                       id="no_identitas"
                       class="bm-input__field"
                       placeholder="Contoh: 12345678"
                />
            </div>

            <br/>
            <label class="bm-input-label" for="nama_penjual">Nama</label>
            <div class="bm-input">
                <input name="nama_penjual"
                       type="text"
                       id="nama_penjual"
                       class="bm-input__field"
                       placeholder="Contoh: John Doe"
                />
            </div>

            <br/>
            <label class="bm-input-label" for="id_kelompok">Kelompok</label>

            <div class="bm-input">

                <select class="bm-input__field" name="kelompok" id="kelompok" required>
                                    <option  disabled selected>Pilih Kelompok</option>
                    <!--                <option value="1">Option 1</option>-->
                    <!--                <option value="2">Option 2</option>-->
                    <!--                <option value="3">Option 3</option>-->
                    <?php foreach ($model['kelompok'] as $kelompok) :?>
                        <option value="<?= $kelompok['id_kelompok'] ?>"><?= $kelompok['nama_kelompok'] ?></option>
                    <?php endforeach;?>
                </select>
<!--                <input list="id_kelompok"-->
<!--                       name="id_kelompok" id="kelompok"-->
<!--                       class="bm-input__field">-->
<!---->
<!--                <datalist id="id_kelompok">-->
<!--                    <option value="12">Kelompok</option>-->
<!--                    <option value="Firefox"></option>-->
<!--                    <option value="Chrome"></option>-->
<!--                    <option value="Opera"></option>-->
<!--                    <option value="Safari"></option>-->
<!--                </datalist>-->

            </div>

            <br/>
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

<script>
    $(".btn_update").click(function (){
        var id = $(this).data("id");
        var no_id = $(this).data("no_id");
        var nama_penjual = $(this).data("nama_penjual");
        var nama_tipe = $(this).data("nama_tipe");
        var nama_kelompok = $(this).data("nama_kelompok");
        var id_kelompok = $(this).data("id_kelompok");

        $("#id_pengguna").val(id);
        $("#no-identitas").val(no_id);
        $("#nama").val(nama_penjual);
        $("#jenis").val(nama_tipe);
        $("#kelompok").val(nama_kelompok);
        // $("#kelompok").val(nama_kelompok);
    });

    $(".btn_delete").click(function (){
        var id = $(this).data("id_detail_kelompok");

        $("#delete_id_Kelompok").val(id);
    });

</script>