<?php

use function PHPUnit\Framework\isEmpty;

$katalokPerKategori = 5;
$default_thumbnail = "./assets/images/Logo UNIKOM.png";

?>


<div class="dashboard-row">
    <!-- ! MAIN CONTENT -->
    <main class="container mt-4 pb-5">

        <?php if (!empty($model['carousel'])) : ?>
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <?php $carouselCounter = 0;?>
                <?php foreach ($model['carousel'] as $carousel) :?>
                    <?php if ($carouselCounter == 0) : ?>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="<?= $carouselCounter?>" class="active"></button>
                    <?php else :?>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="<?= $carouselCounter?>"></button>
                    <?php endif;?>
                    <?php $carouselCounter++;?>
                <?php endforeach; ?>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <?php $carouselCounterImg = 0;?>
                <?php foreach ($model['carousel'] as $carousel) :?>
                    <?php if ($carouselCounterImg == 0)  : ?>
                        <div class="carousel-item bm-carousel active">
                            <img src="<?= './assets/images/'.$carousel['url_banner']?>" alt="Produk" class="d-block" style="width:100%">
                        </div>
                    <?php else :?>
                        <div class="carousel-item bm-carousel">
                            <img src="<?= './assets/images/'.$carousel['url_banner']?>" alt="Chicago" class="d-block" style="width:100%">
                        </div>
                    <?php endif;?>

                    <?php $carouselCounterImg++;?>
                <?php endforeach; ?>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        <?php endif;?>

        <div class="kategori mt-5">
            <h3>Kategori</h3>

            <div class="
                row
                gap-2
                justify-content-center justify-content-md-start
                mt-4
              ">

                <?php foreach ($model['kategori'] as $kategori) : ?>

                    <a href="<?= "/search?kategori=" . $kategori['id_kategori'] ?>" class="
                  bm-card
                  bg-white
                  col-5 col-md-4 col-lg-3
                  bm-cursor-pointer
                ">
                        <div class="bm-card__inner">
                            <span class="fw-bold"><?= $kategori['nama_kategori'] ?></span>
                        </div>
                    </a>

                <?php endforeach; ?>

            </div>
        </div>
        <hr />
        <div class="produk">
            <h3>Produk Populer</h3>
            <?php $index = 0 ?>
            <?php foreach ($model['katalog'] as $kategori => $katalog) : ?>
                <?php if (!!count($katalog)) : ?>
                    <div class="row mb-4">
                        <h4 class="col-6"><?= $kategori ?></h4>

                        <div class="col-6 text-end align-self-center">
                            <a href="<?= "/search?kategori=" . $model['kategori'][$index]["id_kategori"] ?>" class="bm-link">Lihat Semua</a>
                        </div>
                        <?php $index++ ?>

                        <div class="col-12">
                            <div class="bm-horizontal-scrollable gap-3">
                                <?php foreach ($katalog as $produk) : ?>
                                    <div class="bm-card bm-card-product bg-white">
                                        <img class="bm-img-responsive" src=" <?php echo $produk['primary_foto'] === NULL ? $default_thumbnail : './assets/images/' . $produk['primary_foto'] ?>" alt="<?= $produk['nama_produk'] ?>" />

                                        <div class="bm-card__inner">
                                            <h2 class="bm-card__title"><?= rupiah($produk['harga']) ?></h2>

                                            <a href="<?= "/produk?q=" . generateUrl($produk['id_produk'], $produk['nama_produk']) ?>" class="bm-two-lines-truncate mb-3 text-decoration-none">
                                                <?= $produk['nama_produk'] ?>
                                            </a>
                                            <div class="row align-items-center text-secondary">
                                                <i class="col-1 fas fa-store"></i>
                                                <span class="col"><?= $produk['nama_kelompok'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>



    </main>
    <!-- ! END OF MAIN CONTENT -->
</div>