<?php

use function PHPUnit\Framework\isEmpty;

$katalokPerKategori = 5;
$default_thumbnail = "./assets/images/Logo UNIKOM.png";

?>


<div class="dashboard-row">
    <!-- ! MAIN CONTENT -->
    <main class="container mt-4 pb-5">
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item bm-carousel active">
                    <img src="https://placekitten.com/500/200" alt="Los Angeles" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item bm-carousel">
                    <img src="https://placekitten.com/500/300" alt="Chicago" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item bm-carousel">
                    <img src="https://placekitten.com/500/400" alt="New York" class="d-block" style="width:100%">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
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

                                            <a href="<?= "/produk?q=" . $produk['id_produk'] ?>" class="bm-two-lines-truncate mb-3 text-decoration-none">
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