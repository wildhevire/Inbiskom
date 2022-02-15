<!-- ! MAIN CONTENT -->
<main class="container-fluid mt-4 pb-5">
  <h2 class="mb-4">Detail Kelompok - <?= $model['data']['kelompok']->nama_kelompok ?></h2>
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
  <h3 class="mb-4">Data Anggota</h3>
  <div class="row align-items-center">
    <div class="col">
      <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
        <a rel="modal:open" href="#add_anggota_modal" class="bm-btn"><span class="bm-btn__icon">
            <i class="fas fa-plus"></i>
          </span>
          <span class="bm-btn__label">Tambah Anggota</span></a>
      <?php endif; ?>
    </div>
  </div>
  <div class="bm-card mt-4 bg-white">
    <table class="bm-table w-100">
      <thead>
        <th>No</th>
        <th>No. Identitas</th>
        <th>Nama</th>
        <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
          <th>Aksi</th>
        <?php endif; ?>
      </thead>
      <tbody>
        <?php $counter = 0 ?>
        <?php foreach ($model['data']['penjual'] as $penjual) : ?>
          <tr>
            <?php $counter++ ?>
            <td><?= $counter ?></td>
            <td><?= $penjual['no_identitas'] ?></td>
            <td><?= $penjual['nama_penjual'] ?></td>
            <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
              <td>
                <a rel="modal:open" href="#edit_anggota_modal" class="bm-link btn_update" id="btn_update" data-id="<?= $penjual['id_detail_kelompok']; ?>" data-no_id="<?= $penjual['no_identitas']; ?>" data-nama_penjual="<?= $penjual['nama_penjual']; ?>" data-id_kelompok="<?= $_GET['q'] ?>">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a rel="modal:open" href="#delete_anggota_modal" class="bm-link text-danger btn_delete" id="btn_delete" data-id_detail_kelompok="<?= $penjual['id_detail_kelompok'] ?>">Hapus</a>
              </td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <hr />
  <h3 class="mb-4">Data Produk</h3>
  <div class="row align-items-center">
    <div class="col">
      <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
        <a rel="modal:open" href="#add_produk_modal" class="bm-btn"><span class="bm-btn__icon">
            <i class="fas fa-plus"></i>
          </span>
          <span class="bm-btn__label">Tambah Produk</span></a>
      <?php endif; ?>
    </div>
  </div>

  <div class="bm-card mt-4 bg-white">
    <table class="bm-table w-100">
      <thead>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
          <th>Aksi</th>
        <?php endif; ?>
      </thead>
      <tbody>
        <?php $counter = 0; ?>
        <?php foreach ($model['data']['produk'] as $produk) : ?>
          <tr>
            <?php $counter++; ?>
            <td><?= $counter ?> </td>
            <td><?= $produk['nama_produk'] ?></td>
            <td class="text-truncate" style="max-width: 240px"><?= $produk['deskripsi_produk'] ?> </td>
            <td><?= rupiah($produk['harga']) ?></td>
            <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
              <td>
                <!--            <a rel="modal:open" href="#detail_modal" class="bm-link"-->
                <!--            >Lihat</a>&nbsp;&nbsp;&nbsp;&nbsp;-->

                <a target="_blank" href="/produk?q=<?= $produk['id_produk'] ?>" class="bm-link">Buka</a>&nbsp;&nbsp;&nbsp;&nbsp;


                <a rel="modal:open" href="#edit_modal" class="bm-link btn_update" data-id="<?= $produk['id_produk'] ?>" data-nama="<?= $produk['nama_produk'] ?>" data-harga="<?= $produk['harga'] ?>" data-id_kelompok="<?= $produk['id_kelompok'] ?>" data-deskripsi="<?= $produk['deskripsi_produk'] ?>" <?php $fotoCounter = 0; ?> <?php foreach ($model['data']['foto'] as $foto) : ?> <?php if (strcmp($produk['id_produk'], $foto['id_produk'])) : ?> <?php if ($foto['is_primary'] == 1) : ?> data-id_primary_foto="<?= $foto['id_foto'] ?>" data-url_primary_foto="<?= $foto['url'] ?>" <?php else : ?> <?php $fotoCounter++; ?> data-id_foto_<?= $fotoCounter ?>="<?= $foto['id_foto'] ?>" data-url_foto_<?= $fotoCounter ?>="<?= $foto['url'] ?>" <?php endif; ?> <?php endif; ?> <?php endforeach ?>>Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a rel="modal:open" id="btn_delete" href="#delete_modal" class="bm-link text-danger btn_delete" data-id="<?= $produk['id_produk'] ?>">Hapus</a>

              </td>
            <?php endif; ?>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>
<!-- ! END OF MAIN CONTENT -->
</div>
</div>

<!-- ! ADD ANGGOTA MODAL -->
<div class="bm-modal h-auto" id="add_anggota_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
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
        <input name="no_identitas" type="text" id="no_identitas" class="bm-input__field" placeholder="Contoh: 12345678" />
      </div>

      <br />
      <label class="bm-input-label" for="nama_penjual">Nama</label>
      <div class="bm-input">
        <input name="nama_penjual" type="text" id="nama_penjual" class="bm-input__field" placeholder="Contoh: John Doe" />
      </div>

      <br />

      <input hidden type="text" name="kelompok" value="<?= $_GET['q'] ?>">
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
<!-- ! END OF ADD ANGGOTA MODAL -->

<!-- ! ADD PRODUK MODAL -->
<div class="bm-modal h-auto " id="add_produk_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
  <div class="bm-modal__header">
    <h5 class="bm-modal__title">Tambah data produk</h5>
    <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
      <span class="bm-modal__icon-close"></span>
      <span class="bm-sr-only">Batal</span>
    </a>
  </div>

  <form action="/AddProduk" method="POST" enctype="multipart/form-data">
    <div class="bm-modal__body">

      <label class="bm-input-label" for="nama-produk">Nama produk</label>
      <div class="bm-input">
        <input type="text" name="nama_produk" id="nama-produk" class="bm-input__field" placeholder="Contoh: Seblak Mantap" />
      </div>

      <br />
      <label class="bm-input-label" for="harga">Harga</label>
      <div class="bm-input">
        <input type="text" name="harga" id="harga" class="bm-input__field" placeholder="Contoh: 20000" />
      </div>

      <br />
      <label class="bm-input-label" for="deskripsi-add">Deskripsi produk</label>
      <div class="bm-input">
        <textarea id="deskripsi-add" name="deskripsi_produk" class="bm-input__field" placeholder="Contoh: Seblak dengan menggunakan kerupuk asli"></textarea>
      </div>
      <br />
      <input type="text" hidden name="id_kelompok" value="<?= $_GET['q'] ?>">


      <label class="bm-input-label" for="foto-produk-1">Foto produk</label>
      <input name="foto_count-1" hidden id="foto_count-1" type="number" value="0" />
      <div class="row" id="foto-produk-wrapper-1">
        <span class="col-12 bm-caption text-secondary">
          Foto utama produk
        </span>
        <div class="col-3 mb-4">
          <label for="foto-produk-1-1" id="label-foto-produk-1-1" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-produk-1-1" id="foto-produk-1-1" accept="image/*" />

            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-produk-1-1" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-1">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-1" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
        </div>
        <span class="col-12 bm-caption text-secondary">
          Foto produk
        </span>
        <div class="col-3">
          <label for="foto-produk-1-2" id="label-foto-produk-1-2" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-produk-1-2" id="foto-produk-1-2" accept="image/*" />

            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-produk-1-2" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-2">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-2" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
        </div>
        <div class="col-3">
          <label for="foto-produk-1-3" id="label-foto-produk-1-3" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-produk-1-3" id="foto-produk-1-3" accept="image/*" />

            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-produk-1-3" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-3">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-3" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
        </div>
        <div class="col-3">
          <label for="foto-produk-1-4" id="label-foto-produk-1-4" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-produk-1-4" id="foto-produk-1-4" accept="image/*" />

            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-produk-1-4" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-4">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-4" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
        </div>
        <div class="col-3">
          <label for="foto-produk-1-5" id="label-foto-produk-1-5" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-produk-1-5" id="foto-produk-1-5" accept="image/*" />

            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-produk-1-5" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-5">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-5" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
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
<!-- ! END OF ADD PRODUK MODAL -->

<!-- ! EDIT ANGGOTA MODAL -->
<div class="bm-modal h-auto" id="edit_anggota_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
  <div class="bm-modal__header">
    <h5 class="bm-modal__title">Ubah data penjual</h5>
    <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
      <span class="bm-modal__icon-close"></span>
      <span class="bm-sr-only">Batal</span>
    </a>
  </div>
  <form action="/UpdatePenjual" method="POST">
    <input type="hidden" name="id_penjual" id="id_pengguna" />
    <div class="bm-modal__body">
      <label class="bm-input-label" for="no-identitas">No. Identitas</label>
      <div class="bm-input">
        <input type="text" id="no-identitas" class="bm-input__field" placeholder="Masukkan NIM atau NIK penjual" name="no_identitas" />
      </div>

      <br />
      <label class="bm-input-label" for="nama">Nama</label>
      <div class="bm-input">
        <input type="text" id="nama" class="bm-input__field" placeholder="Nama lengkap anda" name="nama_penjual" />
      </div>

      <br />
      <input type="text" name="kelompok" value="<?= $_GET['q'] ?>" />
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
<!-- ! END OF EDIT ANGGOTA MODAL -->

<!-- ! EDIT PRODUK MODAL -->
<div class="bm-modal h-auto " id="edit_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
  <div class="bm-modal__header">
    <h5 class="bm-modal__title">Ubah data produk</h5>
    <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
      <span class="bm-modal__icon-close"></span>
      <span class="bm-sr-only">Batal</span>
    </a>
  </div>

  <div class="bm-modal__body">
    <form action="/UpdateProduk" method="POST" enctype="multipart/form-data">
      <input type="text" hidden name="id_produk" id="update-id-produk" />
      <label class="bm-input-label" for="add-nama-produk">Nama produk</label>
      <div class="bm-input">
        <input type="text" name="nama_produk" id="add-nama-produk" class="bm-input__field" placeholder="Contoh: Seblak Mantap" />
      </div>

      <br />
      <label class="bm-input-label" for="add-harga">Harga</label>
      <div class="bm-input">
        <input type="text" name="harga" id="add-harga" class="bm-input__field" placeholder="Contoh: 20000" />
      </div>

      <br />
      <label class="bm-input-label" for="add-alamat">Deskripsi produk</label>
      <div class="bm-input">
        <textarea id="add-alamat" name="deskripsi_produk" class="bm-input__field" placeholder="Contoh: Seblak dengan menggunakan kerupuk asli"></textarea>
      </div>

      <input type="text" hidden name="id_kelompok" value="<?= $_GET['q'] ?>">
      <br>
      <label class="bm-input-label" for="foto-produk-1">Foto produk</label>
      <input name="foto_count-1" hidden id="foto_count-1" type="number" value="0" />
      <div class="row" id="foto-produk-wrapper-2">
        <span class="col-12 bm-caption text-secondary">
          Foto utama produk
        </span>
        <div class="col-3 mb-4">
          <label for="foto-ubah-produk-1-1" id="label-foto-ubah-produk-1-1" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-ubah-produk-1-1" id="foto-ubah-produk-1-1" accept="image/*" />
            <input type="text" id="id_primary_foto" name="id_foto_1" />

            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-ubah-produk-1-1" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-ubah-produk-1-1">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-ubah-produk-1-1" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
        </div>
        <span class="col-12 bm-caption text-secondary">
          Foto produk
        </span>
        <div class="col-3">
          <label for="foto-ubah-produk-1-2" id="label-foto-ubah-produk-1-2" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-ubah-produk-1-2" id="foto-ubah-produk-1-2" accept="image/*" />
            <input type="text" id="id_foto_1" name="id_foto_2" />
            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-ubah-produk-1-2" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-ubah-produk-1-2">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-ubah-produk-1-2" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
        </div>
        <div class="col-3">
          <label for="foto-ubah-produk-1-3" id="label-foto-ubah-produk-1-3" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-ubah-produk-1-3" id="foto-ubah-produk-1-3" accept="image/*" />
            <input type="text" id="id_foto_2" name="id_foto_3" />
            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-ubah-produk-1-3" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-ubah-produk-1-3">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-ubah-produk-1-3" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
        </div>
        <div class="col-3">
          <label for="foto-ubah-produk-1-4" id="label-foto-ubah-produk-1-4" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-ubah-produk-1-4" id="foto-ubah-produk-1-4" accept="image/*" />
            <input type="text" id="id_foto_3" name="id_foto_4" />
            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-ubah-produk-1-4" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-ubah-produk-1-4">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-ubah-produk-1-4" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
        </div>
        <div class="col-3">
          <label for="foto-ubah-produk-1-5" id="label-foto-ubah-produk-1-5" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
            <input class="file-upload" type="file" name="foto-ubah-produk-1-5" id="foto-ubah-produk-1-5" accept="image/*" />
            <input type="text" id="id_foto_4" name="id_foto_5" />
            <span class="text-secondary">Tambah foto</span>
            <i class="fas fa-image fs-2 text-secondary"></i>
          </label>
          <label for="foto-ubah-produk-1-5" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-ubah-produk-1-5">
            <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-ubah-produk-1-5" src="#" alt="Foto produk" />
            <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
              <span class="bm-btn-circle__icon">
                <i class="fas fa-times"></i>
              </span>
            </button>
          </label>
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
<!-- ! END OF EDIT PRODUK MODAL -->

<!-- ! DELETE ANGGOTA MODAL -->
<div class="bm-modal h-auto" id="delete_anggota_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
  <div class="bm-modal__header">
    <h5 class="bm-modal__title">Apakah Anda yakin?</h5>
    <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
      <span class="bm-modal__icon-close"></span>
      <span class="bm-sr-only">Batal</span>
    </a>
  </div>
  <form action="/DeletePenjual" method="POST">
    <input hidden name="id_kelompok" type="text" id="delete_id_anggota">
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
<!-- ! END OF DELETE ANGGOTA MODAL -->

<!-- ! DELETE MODAL -->
<div class="bm-modal h-auto " id="delete_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">

  <form action="/DeleteProduk" method="POST">
    <input type="hidden" name="id_produk" id="delete_id_produk" />
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
  $(document).ready(function() {

    $('.bm-accordion__header').on('click', function() {
      $(this).parent().toggleClass('bm-accordion__item--active')
    });
    $('#placeholder-logo').hide();

    $('#logo').change(function() {
      const [logo] = $('#logo')[0].files;
      $('#label-logo').hide();
      $('#placeholder-logo').show();
      $('#placeholder-logo')[0].src = URL.createObjectURL(logo);
    });

    for (let index = 1; index < 6; index++) {

      $(`#placeholder-foto-produk-1-${index}`).hide();
      $(`#label-image-foto-produk-1-${index}`).hide();
      $(`#foto-produk-1-${index}`).change(function() {
        const [logo] = $(`#foto-produk-1-${index}`)[0].files;
        $(`#label-foto-produk-1-${index}`).hide();
        $(`#placeholder-foto-produk-1-${index}`).show();
        $(`#label-image-foto-produk-1-${index}`).show();
        $(`#placeholder-foto-produk-1-${index}`)[0].src = URL.createObjectURL(logo);
      });
      $(`#placeholder-foto-ubah-produk-1-${index}`).hide();
      $(`#label-image-foto-ubah-produk-1-${index}`).hide();
      $(`#foto-ubah-produk-1-${index}`).change(function() {
        const [logo] = $(`#foto-ubah-produk-1-${index}`)[0].files;
        $(`#label-foto-ubah-produk-1-${index}`).hide();
        $(`#placeholder-foto-ubah-produk-1-${index}`).show();
        $(`#label-image-foto-ubah-produk-1-${index}`).show();
        $(`#placeholder-foto-ubah-produk-1-${index}`)[0].src = URL.createObjectURL(logo);
      });
    }

    $('#foto-produk-wrapper-1').on("click", '#delete-foto', (e) => {
      e.preventDefault()
      let fotoProdukCount = document.getElementsByClassName("foto-produk-1").length
      fotoProdukCount--;
      $("#foto_count-1").val(fotoProdukCount)
      if (e.target.parentElement.tagName === "SPAN") {
        let elId = e.target.parentElement.parentElement.parentElement.parentElement.children[0].children[0].id
        $(`#${elId}`).val('')
        $(`#placeholder-${elId}`).hide();
        $(`#label-image-${elId}`).hide();
        $(`#label-${elId}`).show();
      } else {
        let elId = e.target.parentElement.parentElement.children[0].children[0].id
        $(`#${elId}`).val('')
        $(`#placeholder-${elId}`).hide();
        $(`#label-image-${elId}`).hide();
        $(`#label-${elId}`).show();
      }
    })
    $('#foto-produk-wrapper-2').on("click", '#delete-foto', (e) => {
      e.preventDefault()
      let fotoProdukCount = document.getElementsByClassName("foto-produk-1").length
      fotoProdukCount--;
      $("#foto_count-1").val(fotoProdukCount)
      if (e.target.parentElement.tagName === "SPAN") {
        let elId = e.target.parentElement.parentElement.parentElement.parentElement.children[0].children[0].id
        console.log(elId);
        $(`#${elId}`).val('')
        $(`#placeholder-${elId}`).hide();
        $(`#label-image-${elId}`).hide();
        $(`#label-${elId}`).show();
      } else {
        let elId = e.target.parentElement.parentElement.children[0].children[0].id
        $(`#${elId}`).val('')
        $(`#placeholder-${elId}`).hide();
        $(`#label-image-${elId}`).hide();
        $(`#label-${elId}`).show();
      }
    })
  });

  $(".btn_update").click(function() {
    var id = $(this).data("id");
    var nama = $(this).data("nama");
    var harga = $(this).data("harga");
    var deskripsi = $(this).data("deskripsi");
    var id_kategori = $(this).data("id_kategori");


    var no_id = $(this).data("no_id");
    var nama_penjual = $(this).data("nama_penjual");

    var id_primary_foto = $(this).data("id_primary_foto");
    var url_primary_foto = $(this).data("url_primary_foto");

    var id_foto_1 = $(this).data("id_foto_1");
    var url_foto_1 = $(this).data("url_foto_1");

    var id_foto_2 = $(this).data("id_foto_2");
    var url_foto_2 = $(this).data("url_foto_2");

    var id_foto_3 = $(this).data("id_foto_3");
    var url_foto_3 = $(this).data("url_foto_3");

    var id_foto_4 = $(this).data("id_foto_4");
    var url_foto_4 = $(this).data("url_foto_4");

    $("#update-id-produk").val(id);
    $("#add-nama-produk").val(nama);
    $("#add-harga").val(harga);
    $("#add-alamat").val(deskripsi);
    $("#id_pengguna").val(id);
    $("#no-identitas").val(no_id);
    $("#nama").val(nama_penjual);

    $("#id_primary_foto").val("");
    $("#id_foto_1").val("");
    $("#id_foto_2").val("");
    $("#id_foto_3").val("");
    $("#id_foto_4").val("");

    $("#label-image-foto-ubah-produk-1-1").hide();
    $("#placeholder-foto-ubah-produk-1-1").hide();
    $("#label-image-foto-ubah-produk-1-2").hide();
    $("#placeholder-foto-ubah-produk-1-2").hide();
    $("#label-image-foto-ubah-produk-1-3").hide();
    $("#placeholder-foto-ubah-produk-1-3").hide();
    $("#label-image-foto-ubah-produk-1-4").hide();
    $("#placeholder-foto-ubah-produk-1-4").hide();
    $("#label-image-foto-ubah-produk-1-5").hide();
    $("#placeholder-foto-ubah-produk-1-5").hide();

    if (id_primary_foto) {
      $("#id_primary_foto").val(id_primary_foto);
      $("#label-image-foto-ubah-produk-1-1").show();
      $("#placeholder-foto-ubah-produk-1-1").show()
      $("#placeholder-foto-ubah-produk-1-1")[0].src = "./assets/images/" + url_primary_foto;
    }

    if (id_foto_1) {
      $("#id_foto_1").val(id_foto_1);
      $("#label-image-foto-ubah-produk-1-2").show();
      $("#placeholder-foto-ubah-produk-1-2").show()
      $("#placeholder-foto-ubah-produk-1-2")[0].src = "./assets/images/" + url_foto_1;
    }
    if (id_foto_2) {
      $("#id_foto_2").val(id_foto_2);
      $("#label-image-foto-ubah-produk-1-3").show();
      $("#placeholder-foto-ubah-produk-1-3").show()
      $("#placeholder-foto-ubah-produk-1-3")[0].src = "./assets/images/" + url_foto_2;
    }
    if (id_foto_3) {
      $("#id_foto_3").val(id_foto_3);
      $("#label-image-foto-ubah-produk-1-4").show();
      $("#placeholder-foto-ubah-produk-1-4").show()
      $("#placeholder-foto-ubah-produk-1-4")[0].src = "./assets/images/" + url_foto_3;
    }
    if (id_foto_4) {
      $("#id_foto_4").val(id_foto_4);
      $("#label-image-foto-ubah-produk-1-5").show();
      $("#placeholder-foto-ubah-produk-1-5").show()
      $("#placeholder-foto-ubah-produk-1-5")[0].src = "./assets/images/" + url_foto_4;
    }


  });

  $('#url_logo_toko').change(function() {
    const [logo] = $('#url_logo_toko')[0].files;
    $('#label-logo').hide();
    $('#placeholder-logo-toko').show();
    $('#placeholder-logo-toko')[0].src = URL.createObjectURL(logo);
  });

  $(".btn_delete").click(function() {
    var id = $(this).data("id");
    var id_anggota = $(this).data("id_detail_kelompok");

    $("#delete_id_produk").val(id);
    $("#delete_id_anggota").val(id_anggota);
  });
  //
</script>