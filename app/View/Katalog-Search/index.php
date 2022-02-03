<!-- ! MAIN CONTENT -->
<main class="container mt-4 pb-5">
  <div class="produk row gap-1">
    <ul class="bm-accordion p-0 col-12 col-lg-2">
      <li class="bm-accordion__item bm-accordion__item--active">
        <button class="bm-accordion__header">
          <div class="bm-accordion__title">Filter</div>
          <span class="bm-accordion__arrow"></span>
        </button>
        <div class="bm-accordion__content">
          <form action="search" method="GET">
            <input type="hidden" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : ''?>">
            <label class="bm-input-label text-secondary" for="kategori">Kategori</label>
            <div class="bm-input">
            <?php foreach ($model["kategori"] as $kategori) :?>
              <label class="bm-radio">
                <?= $kategori["nama_kategori"] ?>
                <input type="radio" class="bm-radio__input" name="kategori" value="<?= $kategori["id_kategori"] ?>" <?= isset($_GET['kategori'] ) && $kategori["id_kategori"] == $_GET['kategori'] ? 'checked' : '' ?> />
                <span class="bm-radio__checkmark"></span>
              </label>
              <?php endforeach;?>
            </div>

            <label class="bm-input-label text-secondary" for="angkatan">Tahun</label>
            <div class="bm-input">
              <select class="bm-input__field" id="angkatan" name="angkatan">
                <option value="" disabled <?= isset($_GET['angkatan']) ? '' : 'selected'?>>Tahun</option>
                <?php for ($i = 2017; $i < date("Y"); $i++) : ?>
                <option value="<?= $i?>" <?= isset($_GET['angkatan']) && $_GET['angkatan'] == $i ? 'selected' : ''?>><?= $i?></option>
                <?php endfor; ?>
              </select>
              <span class="bm-input__arrow"></span>
            </div>

            <br />

            <label class="bm-input-label text-secondary" for="harga-minimum">Harga</label>
            <div class="bm-input">
              <input type="number" name="min" id="harga-minimum" class="bm-input__field" placeholder="Contoh: 20000" value="<?= isset($_GET["min"]) ? $_GET["min"] : '' ?>" />
            </div>
            <br />
            <div class="bm-input">
              <input type="number" name="max" id="harga-maximum" class="bm-input__field" placeholder="Contoh: 50000" value="<?= isset($_GET["max"]) ? $_GET["max"] : '' ?>"/>
            </div>
            <br />
            <button class="bm-btn w-100">Terapkan</button>
          </form>
        </div>
      </li>
    </ul>

    <div class="bm-tab-menu col-12 col-lg-9" id="tab-container">
      <ul class="bm-tab-menu__tab-list">
        <li class="bm-tab-menu__tab">
          <a href="#produk" class="bm-tab-menu__tab-link">Produk</a>
        </li>
        <li class="bm-tab-menu__tab">
          <a href="#toko" class="bm-tab-menu__tab-link">Toko</a>
        </li>
      </ul>
      <div id="produk" class="bm-tab-menu__tab-panel" id="tab-1">
        <div class="row">
        <?php if (empty($model["searchProduct"])) { ?>
          <div class="col-12">
            <p class="text-center">Produk yang dicari tidak ditemukan.</p>
          </div>
          <?php } ?>
        <?php foreach ($model["searchProduct"] as $product) :?>
          <!-- ! CARD PRODUCT -->
          <div class="col-6 col-md-3 col-lg-3 mb-3">
            <div class="bm-card bm-card-product__small bg-white">
              <img class="bm-img-responsive" src=" <?php echo $product['primary_foto'] === NULL ? $default_thumbnail : './assets/images/'.$product['primary_foto'] ?>"
                                alt="<?= $product['nama_produk'] ?>" />
              <div class="bm-card__inner">
                <h2 class="bm-card__title"><?= rupiah($product["harga"]) ?></h2>

                <a href="<?= "/produk?q=".$product['id_produk'] ?>" class="bm-two-lines-truncate mb-3 text-decoration-none">
                <?= $product["nama_produk"] ?>
                </a>
                <div class="row align-items-center text-secondary">
                  <i class="col-1 fas fa-store"></i>
                  <span class="col text-truncate"><?= $product["nama_kelompok"] ?></span>
                </div>
              </div>
            </div>
          </div>
          <!-- ! END OF CARD PRODUCT -->
          <?php endforeach;?>
        </div>
      </div>
      <div id="toko" class="bm-tab-menu__tab-panel" id="tab-2">
        <div class="row">
        <?php if (empty($model["searchToko"])) { ?>
          <div class="col-12">
            <p class="text-center">Toko yang dicari tidak ditemukan.</p>
          </div>
          <?php } ?>
        <?php foreach ($model["searchToko"] as $toko) :?>
          <!-- ! CARD TOKO -->
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="bm-card">
              <div class="bm-card__inner">
                <!-- <div class="row mb-3">
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                </div> -->
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img class="bm-img-responsive rounded-photo photo-40" src=" <?php echo $toko['url_logo_toko'] === NULL ? $default_thumbnail : './assets/images/'.$toko['url_logo_toko'] ?>"
                                alt="<?= $product['nama_kelompok'] ?>" />
                  </div>
                  <div class="col-8 p-0">
                    <div class="row">
                      <span class="fw-bold"><?= $toko["nama_kelompok"] ?></span>
                      <span class="text-secondary"><?= $toko["total_produk"] ?> produk • <?= $toko["angkatan"] ?></span>
                    </div>
                  </div>
                </div>
                <div class="row gap-2 mt-3 px-2">
                  <a href="<?= "/toko?q=".$toko['id_kelompok'] ?>" class="col-12 bm-btn bm-btn--tertiary">
                    <span class="bm-btn__icon">
                      <i class="fa fa-store"></i>
                    </span>
                    <span class="bm-btn__label">Lihat toko</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- ! END OF CARD TOKO -->
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- ! END OF MAIN CONTENT -->