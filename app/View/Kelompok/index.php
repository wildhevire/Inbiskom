
        <!-- ! MAIN CONTENT -->
        <main class="container-fluid mt-4 pb-5">
          <h2 class="mb-4">Kelompok</h2>
          <div class="row align-items-center">
            <div class="col">
              <a rel="modal:open" href="#add_modal" class="bm-btn"
                ><span class="bm-btn__icon">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="bm-btn__label">Tambah kelompok</span></a
              >
            </div>
            <div class="col-4">
              <div class="bm-input bm-input--outline bm-input--with-icon">
                <input
                  type="text"
                  class="bm-input__field"
                  placeholder="Cari kelompok"
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
                <th>Nama Kelompok</th>
                <th>Tipe</th>
                <th>Jumlah Anggota</th>
                <th>Jumlah Produk</th>
                <th>Kategori</th>
                <th>Angkatan</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Kupakkai</td>
                  <td>Mahasiswa</td>
                  <td>4</td>
                  <td>3</td>
                  <td>Pakaian</td>
                  <td>2020</td>
                  <td>
                    <a
                      rel="modal:open"
                      href="#detail_modal"
                      class="bm-link"
                      >Lihat</a
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    <a rel="modal:open" 
                    href="#edit_modal" 
                    class="bm-link"
                      >Ubah</a
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    <a
                      rel="modal:open"
                      href="#delete_modal"
                      class="bm-link text-danger"
                      >Hapus</a
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    <a
                      rel="modal:open"
                      href="#delete_modal"
                      class="bm-link"
                      >Buka</a
                    >
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </main>
        <!-- ! END OF MAIN CONTENT -->
      </div>
    </div>

<!-- ! DETAIL MODAL -->
<div
      class="bm-modal h-auto bm-modal--scrollable"
      id="detail_modal"
      role="dialog"
      aria-modal="true"
      aria-labelledby="modal-label"
      tabindex="-1"
    >
      <div class="bm-modal__header">
        <h5 class="bm-modal__title">Detail data kelompok</h5>
        <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
          <span class="bm-modal__icon-close"></span>
          <span class="bm-sr-only">Batal</span>
        </a>
      </div>

      <div class="bm-modal__body">
        <span class="fw-bold">Nama kelompok:</span>
        <p>Kupakkai</p>

        <span class="fw-bold">Angkatan:</span>
        <p>2021</p>

        <span class="fw-bold">Deskripsi:</span>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo
          soluta, doloremque ullam aspernatur obcaecati accusantium voluptate
          dolorum vitae fugiat iure dolor. Quibusdam soluta rem nostrum vitae
          velit officiis eligendi error!
        </p>

        <span class="fw-bold">Kategori:</span>
        <p>Pakaian</p>

        <span class="fw-bold">Anggota:</span>
        <p>Ivan, Beno, Wildan</p>

        <span class="fw-bold">Produk:</span>
        <p>T-shirt polos, Celana panjang, Boba</p>

        <span class="fw-bold">Foto produk:</span>
        <div class="mt-2">
          <div class="row" id="images">
            <img
              class="bm-img-responsive col-4 bm-cursor-pointer"
              src="https://placekitten.com/200/300"
              alt="Picture 1"
            />
          </div>
        </div>
      </div>

      <div class="bm-modal__footer">
        <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
          <span class="bm-btn__label">Tutup</span>
        </a>
      </div>
    </div>
    <!-- ! END OF DETAIL MODAL -->

    <!-- ! EDIT MODAL -->
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