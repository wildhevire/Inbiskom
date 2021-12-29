<h2 class="mb-4">Konfigurasi</h2>

<div class="bm-card mt-4 bg-white">
    <div class="bm-card__inner row">
        <div class="col">
            <label class="bm-input-label" for="nama-ketua"
            >Nama ketua</label
            >
            <div class="bm-input">
                <input
                        type="text"
                        id="nama-ketua"
                        class="bm-input__field"
                        placeholder="Masukkan nama lengkap ketua"
                />
            </div>

            <br />
            <label class="bm-input-label" for="nip-ketua">NIP ketua</label>
            <div class="bm-input">
                <input
                        type="text"
                        id="nip-ketua"
                        class="bm-input__field"
                        placeholder="Masukkan NIP ketua"
                />
            </div>

            <br />

            <label class="bm-input-label" for="alamat"
            >Alamat INBISKOM</label
            >
            <div class="bm-input">
                  <textarea
                          id="alamat"
                          class="bm-input__field"
                          placeholder="Contoh: Jl. Dipatiukur"
                  ></textarea>
            </div>

            <br />

            <label class="bm-input-label" for="logo">Logo</label>
            <label for="logo" class="bm-input--file" id="label-logo">
                <input
                        class="w-100 file-upload"
                        type="file"
                        name="logo"
                        id="logo"
                        accept="image/*"
                />

                <p class="text-secondary">Upload image</p>
                <i class="fas fa-save fs-2 text-secondary"></i>
            </label>
            <label for="logo" class="mb-4">
                <img
                        class="w-50 bm-img-responsive"
                        id="placeholder-logo"
                        src="#"
                        alt="Logo baru"
                />
            </label>

            <br />
        </div>
        <div class="col">
            <label class="bm-input-label" for="no-hp">No. Handphone</label>
            <div class="bm-input">
                <input
                        type="text"
                        id="no-hp"
                        class="bm-input__field"
                        placeholder="Contoh: 081234567890"
                />
            </div>

            <br />

            <label class="bm-input-label" for="no-wa">No. WhatsApp</label>
            <div class="bm-input">
                <input
                        type="text"
                        id="no-wa"
                        class="bm-input__field"
                        placeholder="Contoh: 081234567890"
                />
            </div>

            <br />

            <label class="bm-input-label" for="email">Email</label>
            <div class="bm-input">
                <input
                        type="email"
                        id="email"
                        class="bm-input__field"
                        placeholder="Contoh: contoh@mail.com"
                />
            </div>

            <br />

            <label class="bm-input-label" for="username-ig"
            >Username IG</label
            >
            <div class="bm-input">
                <input
                        type="text"
                        id="username-ig"
                        class="bm-input__field"
                        placeholder="Contoh: pengguna_ig (tidak perlu menggunakan @)"
                />
            </div>

            <br />
        </div>
        <hr />
        <div class="text-end">
            <button type="button" class="bm-btn">
                  <span class="bm-btn__icon">
                    <i class="fas fa-save"></i>
                  </span>
                <span class="bm-btn__label">Simpan konfigurasi</span>
            </button>
        </div>
    </div>
</div>