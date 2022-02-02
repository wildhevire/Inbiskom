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
          <form action="#" method="post">
            <label class="bm-input-label text-secondary" for="kategori">Kategori</label>
            <div class="bm-input">
              <label class="bm-radio">
                Craft
                <input type="radio" class="bm-radio__input" name="kategori" value="craft" />
                <span class="bm-radio__checkmark"></span>
              </label>
              <label class="bm-radio">
                Fashion
                <input type="radio" class="bm-radio__input" name="kategori" value="fashion" />
                <span class="bm-radio__checkmark"></span>
              </label>
              <label class="bm-radio">
                Jasa
                <input type="radio" class="bm-radio__input" name="kategori" value="jasa" />
                <span class="bm-radio__checkmark"></span>
              </label>
            </div>

            <label class="bm-input-label text-secondary" for="tahun">Tahun</label>
            <div class="bm-input">
              <select class="bm-input__field" id="tahun" name="tahun" required>
                <option value="" disabled selected>Tahun</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
              </select>
              <span class="bm-input__arrow"></span>
            </div>

            <br />

            <label class="bm-input-label text-secondary" for="harga-minimum">Harga</label>
            <div class="bm-input">
              <input type="number" id="harga-minimum" class="bm-input__field" placeholder="Contoh: 20000" />
            </div>
            <br />
            <div class="bm-input">
              <input type="number" id="harga-maximum" class="bm-input__field" placeholder="Contoh: 50000" />
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
          <!-- ! CARD PRODUCT -->
          <div class="col-6 col-md-3 col-lg-3 mb-3">
            <div class="bm-card bm-card-product__small bg-white">
              <img class="bm-img-responsive" src="https://placekitten.com/200/500" alt="XPS, Designed to be the best" />
              <div class="bm-card__inner">
                <h2 class="bm-card__title">Rp 25.000</h2>

                <a href="#" class="bm-two-lines-truncate mb-3 text-decoration-none">
                  Logitech G304 Lightspeed Wireless Gaming Mouse
                </a>
                <div class="row align-items-center text-secondary">
                  <i class="col-1 fas fa-store"></i>
                  <span class="col text-truncate">Logitech Geming</span>
                </div>
              </div>
            </div>
          </div>
          <!-- ! END OF CARD PRODUCT -->
          <!-- ! CARD PRODUCT -->
          <div class="col-6 col-md-3 col-lg-3 mb-3">
            <div class="bm-card bm-card-product__small bg-white">
              <img class="bm-img-responsive" src="https://placekitten.com/200/500" alt="XPS, Designed to be the best" />
              <div class="bm-card__inner">
                <h2 class="bm-card__title">Rp 25.000</h2>

                <a href="#" class="bm-two-lines-truncate mb-3 text-decoration-none">
                  Logitech G304 Lightspeed Wireless Gaming Mouse
                </a>
                <div class="row align-items-center text-secondary">
                  <i class="col-1 fas fa-store"></i>
                  <span class="col text-truncate">Logitech Geming</span>
                </div>
              </div>
            </div>
          </div>
          <!-- ! END OF CARD PRODUCT -->
          <!-- ! CARD PRODUCT -->
          <div class="col-6 col-md-3 col-lg-3 mb-3">
            <div class="bm-card bm-card-product__small bg-white">
              <img class="bm-img-responsive" src="https://placekitten.com/200/500" alt="XPS, Designed to be the best" />
              <div class="bm-card__inner">
                <h2 class="bm-card__title">Rp 25.000</h2>

                <a href="#" class="bm-two-lines-truncate mb-3 text-decoration-none">
                  Logitech G304 Lightspeed Wireless Gaming Mouse
                </a>
                <div class="row align-items-center text-secondary">
                  <i class="col-1 fas fa-store"></i>
                  <span class="col text-truncate">Logitech Geming</span>
                </div>
              </div>
            </div>
          </div>
          <!-- ! END OF CARD PRODUCT -->
          <!-- ! CARD PRODUCT -->
          <div class="col-6 col-md-3 col-lg-3 mb-3">
            <div class="bm-card bm-card-product__small bg-white">
              <img class="bm-img-responsive" src="https://placekitten.com/200/500" alt="XPS, Designed to be the best" />
              <div class="bm-card__inner">
                <h2 class="bm-card__title">Rp 25.000</h2>

                <a href="#" class="bm-two-lines-truncate mb-3 text-decoration-none">
                  Logitech G304 Lightspeed Wireless Gaming Mouse
                </a>
                <div class="row align-items-center text-secondary">
                  <i class="col-1 fas fa-store"></i>
                  <span class="col text-truncate">Logitech Geming</span>
                </div>
              </div>
            </div>
          </div>
          <!-- ! END OF CARD PRODUCT -->
        </div>
      </div>
      <div id="toko" class="bm-tab-menu__tab-panel" id="tab-2">
        <div class="row">
          <!-- ! CARD TOKO -->
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="bm-card">
              <div class="bm-card__inner">
                <div class="row mb-3">
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img class="bm-img-responsive rounded-photo photo-40" src="https://placekitten.com/400/400" alt="Logo toko" />
                  </div>
                  <div class="col-8 p-0">
                    <div class="row">
                      <span class="fw-bold">Toko Sepatu</span>
                      <span class="text-secondary">3 produk • 2018</span>
                    </div>
                  </div>
                </div>
                <div class="row gap-2 mt-3 px-2">
                  <a href="#" class="col-12 bm-btn bm-btn--tertiary">
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
          <!-- ! CARD TOKO -->
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="bm-card">
              <div class="bm-card__inner">
                <div class="row mb-3">
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img class="bm-img-responsive rounded-photo photo-40" src="https://placekitten.com/400/400" alt="Logo toko" />
                  </div>
                  <div class="col-8 p-0">
                    <div class="row">
                      <span class="fw-bold">Toko Sepatu</span>
                      <span class="text-secondary">3 produk • 2018</span>
                    </div>
                  </div>
                </div>
                <div class="row gap-2 mt-3 px-2">
                  <a href="#" class="col-12 bm-btn bm-btn--tertiary">
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
          <!-- ! CARD TOKO -->
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="bm-card">
              <div class="bm-card__inner">
                <div class="row mb-3">
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img class="bm-img-responsive rounded-photo photo-40" src="https://placekitten.com/400/400" alt="Logo toko" />
                  </div>
                  <div class="col-8 p-0">
                    <div class="row">
                      <span class="fw-bold">Toko Sepatu</span>
                      <span class="text-secondary">3 produk • 2018</span>
                    </div>
                  </div>
                </div>
                <div class="row gap-2 mt-3 px-2">
                  <a href="#" class="col-12 bm-btn bm-btn--tertiary">
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
          <!-- ! CARD TOKO -->
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="bm-card">
              <div class="bm-card__inner">
                <div class="row mb-3">
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                  <div class="col-4">
                    <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img class="bm-img-responsive rounded-photo photo-40" src="https://placekitten.com/400/400" alt="Logo toko" />
                  </div>
                  <div class="col-8 p-0">
                    <div class="row">
                      <span class="fw-bold">Toko Sepatu</span>
                      <span class="text-secondary">3 produk • 2018</span>
                    </div>
                  </div>
                </div>
                <div class="row gap-2 mt-3 px-2">
                  <a href="#" class="col-12 bm-btn bm-btn--tertiary">
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
        </div>
      </div>
    </div>
  </div>
</main>
<!-- ! END OF MAIN CONTENT -->