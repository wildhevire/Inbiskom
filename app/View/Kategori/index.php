<h2 class="mb-4">Kategori</h2>
<div class="row align-items-center">
    <div class="col">
        <a rel="modal:open" href="#contoh_modal" class="bm-btn"
        ><span class="bm-btn__icon">
                  <i class="fas fa-plus"></i>
                </span>
            <span class="bm-btn__label">Tambah kategori</span></a
        >
    </div>
    <div class="col-4">
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
    </div>
</div>
<div class="bm-card mt-4 bg-white">
    <table class="bm-table w-100">
        <thead>
        <th>No</th>
        <th>Nama kategori</th>
        <th>Aksi</th>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Craft</td>
            <td>
                <a href="/" class="bm-link">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/" class="bm-link">Hapus</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Fashion</td>
            <td>
                <a href="/" class="bm-link">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/" class="bm-link">Hapus</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Jasa</td>
            <td>
                <a href="/" class="bm-link">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/" class="bm-link">Hapus</a>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Makanan & Minuman</td>
            <td>
                <a href="/" class="bm-link">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/" class="bm-link">Hapus</a>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Pertanian & Perkebunan</td>
            <td>
                <a href="/" class="bm-link">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/" class="bm-link">Hapus</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<!-- ! MODAL -->
<div
        class="bm-modal h-auto bm-modal--scrollable"
        id="contoh_modal"
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

    <div class="bm-modal__body">
        <label class="bm-input-label" for="nama-kategori">Nama Kategori</label>
        <div class="bm-input bm-input--outline bm-input--with-icon">
            <input
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
            <span class="bm-btn__label">Close</span>
        </a>
        <button type="button" class="bm-btn">
            <span class="bm-btn__label">Save</span>
        </button>
    </div>
</div>
<!-- ! END OF MODAL -->