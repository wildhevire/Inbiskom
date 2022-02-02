<!-- ! FOOTER -->

<div class="container">
  <footer class="row gap-5 py-5 my-5 border-top justify-content-center justify-content-lg-between">
    <div class="col-12 col-lg-4 px-4">
      <p class="fw-bold">Divisi Inkubator Bisnis dan KUMKM (INBISKOM)</p>
      <p>
        Jl. Ir. H. Juanda No.162, Lebakgede, Kecamatan Coblong, Kota
        Bandung, Jawa Barat 40132
      </p>
      <div class="row align-content-start">
        <div class="col-12">
          <a href="#" type="button" class="bm-btn bm-btn--ghost">
            <span class="bm-btn__icon">
              <i class="fas fa-phone"></i>
            </span>
            <span class="bm-btn__label">+6281223990355</span>
          </a>
        </div>
        <div class="col-12">
          <a href="#" type="button" class="bm-btn bm-btn--ghost">
            <span class="bm-btn__icon">
              <i class="fab fa-whatsapp"></i>
            </span>
            <span class="bm-btn__label">+6281223990355</span>
          </a>
        </div>
        <div class="col-12">
          <a href="#" type="button" class="bm-btn bm-btn--ghost">
            <span class="bm-btn__icon">
              <i class="fas fa-envelope"></i>
            </span>
            <span class="bm-btn__label">inbiskom@email.unikom.ac.id</span>
          </a>
        </div>
        <div class="col-12">
          <a href="#" type="button" class="bm-btn bm-btn--ghost">
            <span class="bm-btn__icon">
              <i class="fab fa-instagram"></i>
            </span>
            <span class="bm-btn__label">inbiskom</span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-8 col-lg-3">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <img class="bm-img-responsive" src="https://placekitten.com/500/500" alt="XPS, Designed to be the best" />
      </a>
      <p class="text-muted" id="year">© 2021, Divisi INBISKOM</p>
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
      ).innerHTML = `&copy ${year} Inkubator Bisnis Unikom`;
    </script>
</body>

</html>