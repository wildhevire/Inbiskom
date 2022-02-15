<!-- ! MAIN CONTENT -->
<main class="container-fluid mt-4 pb-5">
  <h2 class="mb-4">Kelompok</h2>
  <div class="row align-items-center">
    <div class="col">
      <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
        <a rel="modal:open" href="#add_modal" class="bm-btn"><span class="bm-btn__icon">
            <i class="fas fa-plus"></i>
          </span>
          <span class="bm-btn__label">Tambah kelompok</span></a>
      <?php endif; ?>
    </div>
    <!-- <div class="col-4">
      <div class="bm-input bm-input--outline bm-input--with-icon">
        <input type="text" class="bm-input__field" placeholder="Cari kelompok" />
        <div class="bm-input__icon">
          <i class="fa fa-search"></i>
        </div>
      </div>
    </div> -->
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
        <th>Nama Kelompok</th>
        <th>Tipe</th>
        <th>Jumlah Anggota</th>
        <th>Jumlah Produk</th>
        <th>Kategori</th>
        <th>Angkatan</th>
        <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
          <th>Aksi</th>
        <?php endif; ?>
      </thead>
      <tbody>
        <?php $counter = 0; ?>
        <?php foreach ($model['data']['kelompok'] as $kelompok) : ?>
          <tr>
            <?php $counter++; ?>
            <td><?= $counter ?> </td>
            <td><?= $kelompok['nama_kelompok'] ?></td>
            <td><?= $kelompok['tipe_kelompok'] ?></td>
            <td><?= $kelompok['jumlah_anggota'] ?></td>
            <td><?= $kelompok['jumlah_produk'] ?></td>
            <td><?= $kelompok['kategori'] ?></td>
            <td><?= $kelompok['angkatan'] ?></td>
            <?php if (isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris") : ?>
              <td>
                <!--            <a rel="modal:open" href="#detail_modal" class="bm-link"-->
                <!--            >Lihat</a>&nbsp;&nbsp;&nbsp;&nbsp;-->

              <a href="/dashboard-detail-kelompok?q=<?= $kelompok['id_kelompok'] ?>" class="bm-link">Detail</a>&nbsp;&nbsp;&nbsp;&nbsp;


                <a rel="modal:open" href="#edit_modal" class="bm-link btn_update" id="btn_update" data-deskripsi="<?= $kelompok['deskripsi_kelompok'] ?>" data-id="<?= $kelompok['id_kelompok'] ?>" data-nama="<?= $kelompok['nama_kelompok'] ?>" data-tipe="<?= $kelompok['tipe_kelompok'] ?>" data-jumlah_anggota="<?= $kelompok['jumlah_anggota'] ?>" data-jumlah_produk="<?= $kelompok['jumlah_produk'] ?>" data-kategori="<?= $kelompok['id_kategori'] ?>" data-angkatan="<?= $kelompok['angkatan'] ?>" data-url_logo_toko="<?= $kelompok['url_logo_toko'] ?>">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a rel="modal:open" id="btn_delete" href="#delete_modal" class="bm-link text-danger btn_delete" data-id="<?= $kelompok['id_kelompok'] ?>">Hapus</a>

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

<!-- ! ADD MODAL -->
<div class="bm-modal h-auto" id="add_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
  <div class="bm-modal__header">
    <h5 class="bm-modal__title">Tambah data kelompok</h5>
    <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
      <span class="bm-modal__icon-close"></span>
      <span class="bm-sr-only">Batal</span>
    </a>
  </div>

  <div class="bm-modal__body">
    <form action="/TambahKelompok" method="POST" enctype="multipart/form-data">
      <label class="bm-input-label">Tipe</label>
      <div class="row px-5">
        <label class="bm-radio col-6">
          Mahasiswa
          <input type="radio" class="bm-radio__input" id="tipe-mahasiswa" name="tipe_kelompok" value="Mahasiswa" />
          <span class="bm-radio__checkmark"></span>
        </label>
        <label class="bm-radio col-6">
          Umum
          <input type="radio" class="bm-radio__input" id="tipe-umum" name="tipe_kelompok" value="Umum" />
          <span class="bm-radio__checkmark"></span>
        </label>
      </div>
      <label class="bm-input-label" for="nama-kelompok">Nama kelompok</label>
      <div class="bm-input">
        <input name="nama_kelompok" id="nama-kelompok" type="text" class="bm-input__field" placeholder="Contoh: Kupakkai" />
      </div>
      <br />
      <label class="bm-input-label" for="angkatan">Angkatan</label>
      <div class="bm-input">
        <select class="bm-input__field" id="angkatan" name="angkatan">
          <option value="" disabled selected>Tahun</option>
          <?php for ($i = 2017; $i <= date("Y"); $i++) : ?>
            <option value="<?= $i ?>"><?= $i ?></option>
          <?php endfor; ?>
        </select>
        <span class="bm-input__arrow"></span>
      </div>
      <br />
      <label class="bm-input-label" for="deskripsi">Deskripsi</label>
      <div class="bm-input">
        <textarea name="deskripsi_kelompok" id="deskripsi" class="bm-input__field" placeholder="Contoh: Jual berbagai macam t-shirt"></textarea>
      </div>
      <br />
      <label class="bm-input-label" for="kategori">Kategori</label>
      <div class="bm-input">
        <select name="id_kategori" class="bm-input__field" id="kategori" required>
          <option value="" disabled selected>Pilih kategori</option>
          <?php foreach ($model['data']['kategori'] as $kategori) : ?>
            <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
          <?php endforeach; ?>
        </select>
        <span class="bm-input__arrow"></span>
      </div>
      <br />
      <label class="bm-input-label" for="logo-kelompok">Logo kelompok</label>
      <label for="logo" class="bm-input--file mt-4 mx-auto bm-cursor-pointer" id="label-logo">
        <input class="w-100 file-upload" type="file" name="url_logo_toko" id="logo" accept="image/*" />

        <p class="text-secondary">Tambah foto</p>
        <i class="fas fa-image fs-2 text-secondary"></i>
      </label>
      <label for="logo" class="mx-auto mt-4 mb-2 text-center">
        <img class="w-50 bm-img-responsive bm-cursor-pointer" id="placeholder-logo" src="#" alt="Logo baru" />
      </label>
      <div class="bm-modal__footer">
        <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
          <span class="bm-btn__label">Batal</span>
        </a>
        <button type="Submit" class="bm-btn">
          <span class="bm-btn__label">Simpan</span>
        </button>
      </div>
    </form>
  </div>


</div>
<!-- ! END OF ADD MODAL -->

<!-- ! EDIT MODAL -->
<div class="bm-modal h-auto" id="edit_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
  <div class="bm-modal__header">
    <h5 class="bm-modal__title">Ubah data kelompok</h5>
    <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
      <span class="bm-modal__icon-close"></span>
      <span class="bm-sr-only">Batal</span>
    </a>
  </div>

  <div class="bm-modal__body">
    <form action="/UpdateKelompok" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_kelompok" id="update_id_kelompok" class="bm-input__field" placeholder="Contoh: John Doe" />

      <label class="bm-input-label" for="nama">Nama Kelompok</label>
      <div class="bm-input">
        <input type="text" name="nama_kelompok" id="nama" class="bm-input__field" placeholder="Contoh: John Doe" />
      </div>

      <br />
      <label class="bm-input-label" for="update_angkatan">Angkatan</label>
      <div class="bm-input">
        <select class="bm-input__field" id="update_angkatan" name="angkatan">
          <?php for ($i = 2017; $i <= date("Y"); $i++) : ?>
            <option value="<?= $i ?>"><?= $i ?></option>
          <?php endfor; ?>
        </select>
        <span class="bm-input__arrow"></span>
      </div>

      <br />

      <label class="bm-input-label" for="edit_tipe_kelompok">Tipe Kelompok</label>
      <div class="bm-input">
        <select name="tipe_kelompok" class="bm-input__field" id="edit_tipe_kelompok" required>
          <option value="" disabled selected>Pilih </option>
          <option value="mahasiswa">Mahasiswa</option>
          <option value="umum">Umum</option>

        </select>
        <span class="bm-input__arrow"></span>
      </div>

      <br />

      <label class="bm-input-label" for="deskripsi_kelompok">Deskripsi produk</label>
      <div class="bm-input">
        <textarea name="deskripsi_kelompok" id="deskripsi_kelompok" class="bm-input__field" placeholder="Contoh: T-shirt berwarna hitam dengan bahan katun"></textarea>
      </div>
      <br />
      <label class="bm-input-label" for="edit_kategori">Kategori</label>
      <div class="bm-input">
        <select name="id_kategori" class="bm-input__field" id="edit_kategori" required>
          <option value="" disabled selected>Pilih kategori</option>
          <?php foreach ($model['data']['kategori'] as $kategori) : ?>
            <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
          <?php endforeach; ?>
        </select>
        <span class="bm-input__arrow"></span>
      </div>
      <br />

      <label class="bm-input-label" for="url_logo_toko">Logo</label>
      <label for="url_logo_toko" class="mb-4">
        <img class="w-50 bm-img-responsive" id="placeholder-logo-toko" src="#" alt="Logo baru" />
      </label>
      <label for="url_logo_toko" class="bm-input--file" id="label-logo">
        <input class="w-100 file-upload" type="file" name="url_logo_toko" id="url_logo_toko" accept="image/*" />

        <p class="text-secondary">Upload image</p>
        <i class="fas fa-save fs-2 text-secondary"></i>
      </label>

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
</div>
<!-- ! END OF EDIT MODAL -->

<!-- ! DELETE MODAL -->
<div class="bm-modal h-auto " id="delete_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">

  <form action="/DeleteKelompok" method="POST">
    <input type="hidden" name="id_kelompok" id="delete_id_kelompok" />
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
      console.log(index);
      $(`#placeholder-foto-produk-1-${index}`).hide();
      $(`#label-image-foto-produk-1-${index}`).hide();
      $(`#foto-produk-1-${index}`).change(function() {
        const [logo] = $(`#foto-produk-1-${index}`)[0].files;
        $(`#label-foto-produk-1-${index}`).hide();
        $(`#placeholder-foto-produk-1-${index}`).show();
        $(`#label-image-foto-produk-1-${index}`).show();
        $(`#placeholder-foto-produk-1-${index}`)[0].src = URL.createObjectURL(logo);
      });
    }

    let i = 1;
    $("#hapus-anggota").hide()
    $("#hapus-produk").hide()

    $("#tambah-anggota").click(() => {
      i++;
      $("#detail_kelompok_count").val(i)
      $("#form-anggota").append(`<div class="anggota" id="anggota-${i}">
              <label class="bm-input-label" for="no-identitas-${i}">No. Identitas ${i}</label>
              <div class="bm-input">
                <input name="no_identitas-${i}" id="no-identitas-${i}" type="text" class="bm-input__field" placeholder="Contoh: 12355212129900001" />
              </div>
              <br />
              <label class="bm-input-label" for="nama-anggota-${i}">Nama anggota ${i}</label>
              <div class="bm-input">
                <input name="nama_penjual-${i}" id="nama-anggota-${i}" type="text" class="bm-input__field" placeholder="Contoh: John Doe" />
              </div>
              <hr />
            </div>`)
      if ($(".anggota").length === 3) {
        $("#tambah-anggota").prop('disabled', true);
      }

      if ($(".anggota").length !== 1) {
        $("#hapus-anggota").show()
      }
    })
    $("#hapus-anggota").click(() => {
      $("#tambah-anggota").prop('disabled', false);
      $(`#anggota-${i}`).remove()
      i--
      $("#detail_kelompok_count").val(i)
      if (i === 1) {
        $("#hapus-anggota").hide()
      }
    })

    $("#hapus-produk").click(() => {
      $(`#produk-${produkIterator}`).remove()
      produkIterator--
      $("#produk_count").val(produkIterator)
      $("#tambah-produk").prop('disabled', false);
      if (produkIterator === 1) {
        $("#hapus-produk").hide()
      }
    })

    let produkIterator = 1;

    $("#tambah-produk").click(() => {
      produkIterator++;


      $("#produk_count").val(produkIterator)

      if (produkIterator !== 1) {
        $("#hapus-produk").show()
      }

      if (produkIterator === 2) {
        // $("#tambah-produk").prop('disabled', true);
      }


      $("#produk-container").append(
        `<div class="produk-wrapper" id="produk-${produkIterator}">
            <p class="fw-bold">Produk ${produkIterator}</p>
            <label class="bm-input-label" for="nama-produk-${produkIterator}">Nama produk</label>
            <div class="bm-input">
              <input name="nama_produk-${produkIterator}" id="nama-produk-${produkIterator}" type="text" class="bm-input__field" placeholder="Contoh: T-shirt hitam manis" />
            </div>
            <br />
            <label class="bm-input-label" for="harga-${produkIterator}">Harga</label>
            <div class="bm-input">
              <input name="harga-${produkIterator}" id="harga-${produkIterator}" type="number" class="bm-input__field" placeholder="Contoh: 30000" />
            </div>
            <br />
            <label class="bm-input-label" for="deskripsi-produk-${produkIterator}">Deskripsi produk</label>
            <div class="bm-input">
              <textarea name="deskripsi_produk-${produkIterator}" id="deskripsi-peroduk-${produkIterator}" class="bm-input__field" placeholder="Contoh: T-shirt berwarna hitam dengan bahan katun"></textarea>
            </div>
            <br />
            <label class="bm-input-label" for="foto-produk-${produkIterator}">Foto produk</label>
            <input name="foto_count-${produkIterator}" hidden id="foto_count-${produkIterator}" type="number" value="0" />
            <p class="bm-caption text-secondary">
              Pilih foto untuk dijadikan foto utama
            </p>
            <div class="row" id="foto-produk-wrapper-${produkIterator}">
                  <span class="col-12 bm-caption text-secondary">
                    Foto utama produk
                  </span>
                  <div class="col-3 mb-4">
                    <label for="foto-produk-${produkIterator}-1" id="label-foto-produk-${produkIterator}-1" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
                      <input class="file-upload" type="file" name="foto-produk-${produkIterator}-1" id="foto-produk-${produkIterator}-1" accept="image/*" />

                      <span class="text-secondary">Tambah foto</span>
                      <i class="fas fa-image fs-2 text-secondary"></i>
                    </label>
                    <label for="foto-produk-${produkIterator}-1" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-${produkIterator}-1">
                      <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-${produkIterator}-1" src="#" alt="Foto produk" />
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
                    <label for="foto-produk-${produkIterator}-2" id="label-foto-produk-${produkIterator}-2" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
                      <input class="file-upload" type="file" name="foto-produk-${produkIterator}-2" id="foto-produk-${produkIterator}-2" accept="image/*" />

                      <span class="text-secondary">Tambah foto</span>
                      <i class="fas fa-image fs-2 text-secondary"></i>
                    </label>
                    <label for="foto-produk-${produkIterator}-2" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-${produkIterator}-2">
                      <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-${produkIterator}-2" src="#" alt="Foto produk" />
                      <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
                        <span class="bm-btn-circle__icon">
                          <i class="fas fa-times"></i>
                        </span>
                      </button>
                    </label>
                  </div>
                  <div class="col-3">
                    <label for="foto-produk-${produkIterator}-3" id="label-foto-produk-${produkIterator}-3" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
                      <input class="file-upload" type="file" name="foto-produk-${produkIterator}-3" id="foto-produk-${produkIterator}-3" accept="image/*" />

                      <span class="text-secondary">Tambah foto</span>
                      <i class="fas fa-image fs-2 text-secondary"></i>
                    </label>
                    <label for="foto-produk-${produkIterator}-3" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-${produkIterator}-3">
                      <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-${produkIterator}-3" src="#" alt="Foto produk" />
                      <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
                        <span class="bm-btn-circle__icon">
                          <i class="fas fa-times"></i>
                        </span>
                      </button>
                    </label>
                  </div>
                  <div class="col-3">
                    <label for="foto-produk-${produkIterator}-4" id="label-foto-produk-${produkIterator}-4" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
                      <input class="file-upload" type="file" name="foto-produk-${produkIterator}-4" id="foto-produk-${produkIterator}-4" accept="image/*" />

                      <span class="text-secondary">Tambah foto</span>
                      <i class="fas fa-image fs-2 text-secondary"></i>
                    </label>
                    <label for="foto-produk-${produkIterator}-4" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-${produkIterator}-4">
                      <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-${produkIterator}-4" src="#" alt="Foto produk" />
                      <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
                        <span class="bm-btn-circle__icon">
                          <i class="fas fa-times"></i>
                        </span>
                      </button>
                    </label>
                  </div>
                  <div class="col-3">
                    <label for="foto-produk-${produkIterator}-5" id="label-foto-produk-${produkIterator}-5" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
                      <input class="file-upload" type="file" name="foto-produk-${produkIterator}-5" id="foto-produk-${produkIterator}-5" accept="image/*" />

                      <span class="text-secondary">Tambah foto</span>
                      <i class="fas fa-image fs-2 text-secondary"></i>
                    </label>
                    <label for="foto-produk-${produkIterator}-5" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-${produkIterator}-5">
                      <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-${produkIterator}-5" src="#" alt="Foto produk" />
                      <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
                        <span class="bm-btn-circle__icon">
                          <i class="fas fa-times"></i>
                        </span>
                      </button>
                    </label>
                  </div>
                </div>

            <hr />

          </div>`
      )

      for (let index = 1; index < 6; index++) {
        console.log(index);
        $(`#placeholder-foto-produk-${produkIterator}-${index}`).hide();
        $(`#label-image-foto-produk-${produkIterator}-${index}`).hide();
        $(`#foto-produk-${produkIterator}-${index}`).change(function() {
          const [logo] = $(`#foto-produk-${produkIterator}-${index}`)[0].files;
          $(`#label-foto-produk-${produkIterator}-${index}`).hide();
          $(`#placeholder-foto-produk-${produkIterator}-${index}`).show();
          $(`#label-image-foto-produk-${produkIterator}-${index}`).show();
          $(`#placeholder-foto-produk-${produkIterator}-${index}`)[0].src = URL.createObjectURL(logo);
        });
      }

      // $(`#foto-produk-${produkIterator}`).change(function() {
      //   const [logo] = $(`#foto-produk-${produkIterator}`)[0].files;
      //   let fotoProdukCount = document.getElementsByClassName(`foto-produk-${produkIterator}`).length
      //   fotoProdukCount += 1
      //   $(`#foto_count-${produkIterator}`).val(fotoProdukCount)
      //   $(`#foto-produk-wrapper-${produkIterator}`).append(`
      //   <input type="file" name="input-foto-produk-${produkIterator}" id="input-foto-produk-${produkIterator}" value="${logo}" />
      //   <label class="bm-radio col-4">
      //           <img class="bm-img-responsive foto-produk-${produkIterator}" src="${URL.createObjectURL(logo)}" alt="Picture 1" />
      //           <input type="radio" class="bm-radio__input" name="radio_selected" value="radio" />
      //           <span class="bm-radio__checkmark"></span>
      //           <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
      //             <span class="bm-btn-circle__icon">
      //               <i class="fas fa-times"></i>
      //             </span>
      //           </button>
      //         </label>
      //   `)
      // });

      $(`#foto-produk-wrapper-${produkIterator}`).on("click", '#delete-foto', (e) => {
        e.preventDefault()
        let fotoProdukCount = document.getElementsByClassName(`foto-produk-${produkIterator}`).length
        fotoProdukCount--
        $(`#foto_count-${produkIterator}`).val(fotoProdukCount)
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
    })

    // $(`#foto-produk-1`).change(function() {
    //   const [logo] = $(`#foto-produk-1`)[0].files;
    //   console.log(logo.name);
    //   let fotoProdukCount = document.getElementsByClassName("foto-produk-1").length
    //   fotoProdukCount += 1
    //   $("#foto_count-1").val(fotoProdukCount)
    //   $(`#foto-produk-wrapper-1`).append(`
    //   <input type="file" name="input-foto-produk-1" id="input-foto-produk-1" value="${logo}" />
    //     <label class="bm-radio col-4">
    //             <img class="bm-img-responsive foto-produk-1" src="${URL.createObjectURL(logo)}" alt="Picture 1" />
    //             <input type="radio" class="bm-radio__input" name="radio_selected" value="${logo.name}" />
    //             <span class="bm-radio__checkmark"></span>
    //             <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
    //               <span class="bm-btn-circle__icon">
    //                 <i class="fas fa-times"></i>
    //               </span>
    //             </button>
    //           </label>
    //     `)
    // });

    $('#foto-produk-wrapper-1').on("click", '#delete-foto', (e) => {
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
    var tipe = $(this).data("tipe");
    var jumlah_anggota = $(this).data("jumlah_anggota");
    var jumlah_produk = $(this).data("jumlah_produk");
    var kategori = $(this).data("kategori");
    var angkatan = $(this).data("angkatan");
    var deskripsi = $(this).data("deskripsi");
    var url_logo_toko = $(this).data("url_logo_toko");

    $("#placeholder-logo-toko").attr("src", "/assets/images/" + url_logo_toko);
    $("#update_id_kelompok").val(id);
    $("#nama").val(nama);
    $("#update_nama_kategori").val(jumlah_anggota);
    $("#update_nama_kategori").val(jumlah_produk);
    $("#update_nama_kategori").val(kategori);
    $("#update_angkatan").val(angkatan);
    $("#deskripsi_kelompok").val(deskripsi);
    $("#edit_tipe_kelompok").val(tipe);
    $("#edit_kategori").val(kategori);
  });

  $('#url_logo_toko').change(function() {
    const [logo] = $('#url_logo_toko')[0].files;
    $('#label-logo').hide();
    $('#placeholder-logo-toko').show();
    $('#placeholder-logo-toko')[0].src = URL.createObjectURL(logo);
  });

  $(".btn_delete").click(function() {
    var id = $(this).data("id");

    $("#delete_id_kelompok").val(id);
  });
  //
</script>