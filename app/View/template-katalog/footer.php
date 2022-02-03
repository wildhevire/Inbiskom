<!-- ! FOOTER -->
<div class="container">
  <footer class="row gap-5 py-5 my-5 border-top justify-content-center justify-content-lg-between">
    <div class="col-12 col-lg-4 px-4">
      <p class="fw-bold">Divisi Inkubator Bisnis dan KUMKM (INBISKOM)</p>
      <span><?= $model["konfigurasi"]["nama_ketua"] ?></span>
      <p>NIP: <?= $model["konfigurasi"]["nip"] ?></p>
      <p><?= $model["konfigurasi"]["alamat_inbiskom"] ?></p>
      <div class="row align-content-start">
        <div class="col-12">
          <a href="#" type="button" class="bm-btn bm-btn--ghost">
            <span class="bm-btn__icon">
              <i class="fas fa-phone"></i>
            </span>
            <span class="bm-btn__label"><?= $model["konfigurasi"]["no_hp"] ?></span>
          </a>
        </div>
        <div class="col-12">
          <?php $wa = "62".substr($model["konfigurasi"]["no_wa"], 1) ?>
          <a href="<?= "https://wa.me/".$wa?>" type="button" class="bm-btn bm-btn--ghost">
            <span class="bm-btn__icon">
              <i class="fab fa-whatsapp"></i>
            </span>
            <span class="bm-btn__label"><?= $model["konfigurasi"]["no_wa"] ?></span>
          </a>
        </div>
        <div class="col-12">
          <a href="mailto:<?= $model["konfigurasi"]["email"] ?>" type="button" class="bm-btn bm-btn--ghost">
            <span class="bm-btn__icon">
              <i class="fas fa-envelope"></i>
            </span>
            <span class="bm-btn__label"><?= $model["konfigurasi"]["email"] ?></span>
          </a>
        </div>
        <div class="col-12">
          <a href="<?= "https://www.instagram.com/".$model["konfigurasi"]["username_ig"] ?>" type="button" class="bm-btn bm-btn--ghost" target="_blank">
            <span class="bm-btn__icon">
              <i class="fab fa-instagram"></i>
            </span>
            <span class="bm-btn__label"><?= $model["konfigurasi"]["username_ig"] ?></span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-8 col-lg-3">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <img class="bm-img-responsive" src=" <?php echo './assets/images/'.$model["konfigurasi"]["url_logo"] ?>"
                                alt="Logo INBISKOM" />
      </a>
      <p class="text-muted" id="year"></p>
    </div>
  </footer>
</div>

<!-- ! END OF FOOTER -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.easytabs/3.2.0/jquery.easytabs.min.js"></script>
<script>
  $('.xzoom, .xzoom-gallery').xzoom({
    tint: '#333',
    Xoffset: 15
  });
</script>
<script>
      $('#tab-container').easytabs();

      $('.bm-accordion__header').on('click', function () {
        $(this).parent().toggleClass('bm-accordion__item--active');
      });

      const d = new Date();
      let year = d.getFullYear();
      document.getElementById(
        'year',
      ).innerHTML = `&copy ${year}, Divisi INBISKOM UNIKOM`;
    </script>
</body>

</html>