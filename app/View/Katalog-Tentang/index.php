<!-- ! MAIN CONTENT -->
<main class="container mt-4 pb-5">
  <div class="row">
    <div class="col-12 col-lg-4 text-center">
      <img class="mb-4 thumbnail-primary-photo" src=" <?php echo $model['konfigurasi']["url_logo"] === NULL ? $default_thumbnail : './assets/images/' . $model['konfigurasi']["url_logo"] ?>" alt="Logo INBISKOM" />
    </div>
    <div class="col-12 col-lg-6">
      <h4>
        Divisi Inkubator Bisnis dan KUMKM (INBISKOM)
      </h4>
      <span class="fw-bold">Nama ketua:</span>
      <span class="bm-body1"><?= $model["konfigurasi"]["nama_ketua"] ?></span>
      <p>NIP: <?= $model["konfigurasi"]["nip"] ?></p>

      <span class="fw-bold">Alamat:</span>
      <p class="bm-body1"><?= $model["konfigurasi"]["alamat_inbiskom"] ?></p>

      <span class="fw-bold">No. Telepon:</span>
      <p class="bm-body1"><?= $model["konfigurasi"]["no_hp"] ?></p>

      <span class="fw-bold">No. WhatsApp:</span>
      <p class="bm-body1"><?= $model["konfigurasi"]["no_wa"] ?></p>

      <span class="fw-bold">Alamat E-mail:</span>
      <p class="bm-body1"><?= $model["konfigurasi"]["email"] ?></p>

      <span class="fw-bold">Username Instagram:</span>
      <p class="bm-body1">@<?= $model["konfigurasi"]["username_ig"] ?></p>
    </div>
  </div>
</main>
<!-- ! END OF MAIN CONTENT -->