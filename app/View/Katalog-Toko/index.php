<!-- ! MAIN CONTENT -->
        <main class="container mt-4 pb-5">
          <div class="produk">
            <div class="row detail-toko">
              <div class="col-8 col-md-5 row">
                <div class="col-4 col-md-4 col-lg-2">
                  <img
                    class="bm-img-responsive rounded-photo photo-40"
                    src="<?= "./assets/images/".$model["tokoDescription"][0]["url_logo_toko"] ?>"
                    alt="Logo <?php echo $model["tokoDescription"][0]["nama_kelompok"] ?>"
                  />
                </div>
                <div class="col-8 col-md-8 col-lg-10">
                  <h4><?php echo $model["tokoDescription"][0]["nama_kelompok"] ?></h4>
                  <?php echo $model["tokoDescription"][0]["angkatan"] ?>
                </div>
              </div>
              <div class="col-4 col-md-3 bm-border-left mb-4">
                <h4><?php echo $model["tokoDescription"][0]["total_produk"] ?></h4>
                Total produk
              </div>
              <div class="col-12 col-md-4 text-center text-sm-start">
                <?php foreach ($model["tokoMember"] as $tokoMember) :?>
                  <div class="bm-subtitle1"><?= $tokoMember["nama_penjual"] ?></div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="bm-tab-menu" id="tab-container">
              <ul class="bm-tab-menu__tab-list">
                <li class="bm-tab-menu__tab">
                  <a href="#produk" class="bm-tab-menu__tab-link">Produk</a>
                </li>
              </ul>
              <div id="produk" class="bm-tab-menu__tab-panel" id="tab-1">
                <div class="row">
                  <?php foreach ($model["tokoProducts"] as $tokoProduct) :?>
                  <!-- ! CARD PRODUCT -->
                  <div class="col-6 col-md-3 col-lg-3 col-xl-3 col-xxl-2 mb-3">
                    <div class="bm-card bm-card-product__small bg-white">
                      <img
                        class="bm-img-responsive"
                        src="<?= "./assets/images/".$tokoProduct["primary_foto"] ?>"
                        alt="<?= $tokoProduct["nama_produk"] ?>"
                      />
                      <div class="bm-card__inner">
                        <h2 class="bm-card__title"><?= rupiah($tokoProduct["harga"]) ?></h2>

                        <a
                          href="<?= "/produk?q=".$tokoProduct["id_produk"] ?>"
                          class="bm-two-lines-truncate mb-3 text-decoration-none"
                        >
                          <?= $tokoProduct["nama_produk"] ?>
                        </a>
                        <div class="row align-items-center text-secondary">
                          <i class="col-1 fas fa-store"></i>
                          <span class="col text-truncate"><?= $tokoProduct["nama_kelompok"] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ! END OF CARD PRODUCT -->
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- ! END OF MAIN CONTENT -->