<?php
$produk = $model['produk'][0];
$foto = $model['fotoPelengkap'];
?>
<!-- ! MAIN CONTENT -->
<main class="container mt-4 pb-5">
    <div class="row">
        <div class="col-12 col-lg-4 text-center">

            <img
                    class="xzoom mb-4 thumbnail-primary-photo"
                    src="<?= "./assets/images/".$model['fotoPrimary']['url']; ?>"
                    xoriginal="<?= "./assets/images/".$model['fotoPrimary']['url']; ?>"
            />

            <div class="xzoom-thumbs bm-horizontal-scrollable">
            <a href="<?= "./assets/images/".$model['fotoPrimary']['url']; ?>">
                    <img
                            class="xzoom-gallery mini-thumbnail-photo"
                            src="<?= "./assets/images/".$model['fotoPrimary']['url']; ?>"
                            xpreview="<?= "./assets/images/".$model['fotoPrimary']['url']; ?>"
                    />
                </a>
                <?php foreach ($foto as $item) :?>
                <a href="<?= "./assets/images/".$item['url']; ?>">
                    <img
                            class="xzoom-gallery mini-thumbnail-photo"
                            src="<?= "./assets/images/".$item['url']; ?>"
                            xpreview="<?= "./assets/images/".$item['url']; ?>"
                    />
                </a>

                <?php endforeach;?>
            </div>
            
        </div>
        <div class="col-12 col-lg-5 mb-5">
            <h4>
                <?= $produk['nama_produk']?>
            </h4>
            <p class="text-secondary">
                <i class="far fa-eye"></i> <?= $produk['view_count']?> kali dilihat
            </p>
            <h4><?= rupiah($produk['harga'])?></h4>
            <p class="text-decoration-underline fw-bold">Detail produk</p>
            <span class="bm-body1 multiline"><?= $produk['deskripsi_produk']?></span>
        </div>
        <div class="col-12 col-lg-3">
            <div class="bm-card">
                <div class="bm-card__inner">
                    <div class="row align-items-center">
                        <div class="col-4 text-center">
                            <img
                                class="bm-img-responsive rounded-photo photo-40"
                                src=" <?= "./assets/images/".$produk['url_logo_toko'] ?> "
                                alt="Logo toko"
                            />
                        </div>
                        <div class="col-8 p-0">
                            <div class="row">
                                <span class="fw-bold"><?= $produk['nama_kelompok']?></span>
                                <span class="text-secondary"> <?= $produk['total_produk'] ?> Produk • <?= $produk['angkatan']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row gap-2 mt-3 px-2">
                        <a href="/toko?q=<?= $produk['id_kelompok']?>" class="col-12 bm-btn bm-btn--tertiary">
                      <span class="bm-btn__icon">
                        <i class="fa fa-store"></i>
                      </span>
                            <span class="bm-btn__label">Lihat toko</span>
                        </a>
                        <a href="#" class="col-12 bm-btn"
                        ><span class="bm-btn__icon">
                        <i class="fab fa-whatsapp"></i>
                      </span>
                            <span class="bm-btn__label">Hubungi INBISKOM</span></a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ! END OF MAIN CONTENT -->
