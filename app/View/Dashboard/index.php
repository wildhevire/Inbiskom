<!-- ! MAIN CONTENT -->
<main class="container-fluid mt-4 pb-5">
    <div class="row gap-3">
        <div class="col-3">
            <div class="bm-card bg-white row">
                <div class="col-4 align-self-center text-center h1 bm-text-primary p-0">
                    <i class="fa fa-user"></i>
                </div>
                <div class="bm-card__inner col-8">
                    <h2 class="bm-card__title"><?= $model['total_penjual'][0]['total_penjual']?></h2>
                    Total Penjual
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="bm-card bg-white row">
                <div class="col-4 align-self-center text-center h1 bm-text-primary">
                    <i class="fa fa-user-friends"></i>
                </div>
                <div class="bm-card__inner col-8">
                    <h2 class="bm-card__title"><?= $model['total_kelompok'][0]['total_kelompok']?></h2>
                    Total Kelompok
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="bm-card bg-white row">
                <div class="col-4 align-self-center text-center h1 bm-text-primary">
                    <i class="fa fa-box-open"></i>
                </div>
                <div class="bm-card__inner col-8">
                    <h2 class="bm-card__title"><?= $model['total_produk'][0]['total_produk']?></h2>
                    Total Produk
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 gap-3">
        <div class="bm-card col-5 bg-white">
            <div class="bm-card__inner">
                <div>
                    <canvas id="totalPendaftar" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="bm-card col-6 bg-white">
            <div class="bm-card__inner">
                <div>
                    <canvas id="produkPerKategori" height="280"></canvas>
                </div>
            </div>
        </div>
        <div class="bm-card col-5 bg-white">
            <div class="bm-card__inner">
                <div>
                    <canvas id="penjualPerTipe" height="320"></canvas>
                </div>
            </div>
        </div>
        <div class="bm-card col-6 bg-white">
            <div class="bm-card__inner" style="height: 100%;">

                <canvas id="kategoriPerTipe" height="280"></canvas>

            </div>
        </div>
    </div>

</main>
<!-- ! END OF MAIN CONTENT -->
</div>
</div>

<script>

    const randomColor = function() {
        const r = Math.floor(Math.random() * 255);
        const g = Math.floor(Math.random() * 255);
        const b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    // CHART PENDAFTAR
    const currentYear = new Date().getFullYear(); // 2020
    const lastFiveYears = currentYear - 5;

    const labelsPendaftar = [];
    // for (let index = lastFiveYears; index <= currentYear; index++) {
    //     labelsPendaftar.push(index)
    // }
    const dataPendaftar = [];
    const colorPendaftar = [];
    <?php foreach ($model["pendaftar_pertahun"]as $pendaftar) :?>
        labelsPendaftar.push(<?= $pendaftar['angkatan']?>);
        dataPendaftar.push(<?= $pendaftar['jml_pendaftar']?>);
    colorPendaftar.push(randomColor());

    <?php endforeach;?>

    const data = {
        labels: labelsPendaftar,
        datasets: [{
            label: 'Total Pendaftar INBISKOM tiap tahun',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data:dataPendaftar,
        }]
    };

    const configPendaftar = {
        type: 'line',
        data: data,
        options: {
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Total Pendaftar INBISKOM tiap tahun',
                    align: "start",
                }
            }
        }
    };
    const totalPendaftar = new Chart(
        document.getElementById('totalPendaftar'),
        configPendaftar
    );


    // CHART TOTAL PRODUK BERDASARKAN KATEGORI
    const labelProdukPerKategori = [];
    const dataProdukPerKategori = [];
    const colorProdukPerKategori = [];
    <?php foreach ($model["produk_perkategori"]as $produk) :?>
    labelProdukPerKategori.push("<?= $produk['nama_kategori']?>");
    dataProdukPerKategori.push(<?= $produk['jml_produk']?>);
    colorProdukPerKategori.push(randomColor());
    <?php endforeach;?>
    const produkPerKategori = new Chart(document.getElementById('produkPerKategori').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labelProdukPerKategori,
            // labels: ['Craft', 'Fashion', 'Foods', "Jasa", "Pertanian & Perkebunan"],
            datasets: [{
                data: dataProdukPerKategori,
                // data: [12, 19, 3, 8, 16, 12],
                // backgroundColor: [
                //     'rgba(255, 99, 132, 1)',
                //     'rgba(54, 162, 235, 1)',
                //     'rgba(255, 206, 86, 1)',
                //     'rgba(75, 192, 192, 1)',
                //     'rgba(153, 102, 255, 1)',
                // ],
                backgroundColor:colorProdukPerKategori
            }, ]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Total produk yang terdaftar berdasarkan kategori',
                    align: "start",
                },
                legend: {
                    display: false,
                },
            },
        }
    });

    // TOTAL PENJUAL BERDASARKAN TIPE
    const labelTipeKelompok = [];
    const dataTipeKelompok = [];
    <?php foreach ($model["penjual_pertipe"]as $item) :?>
    labelTipeKelompok.push("<?= $item['tipe_kelompok']?>");
    dataTipeKelompok.push(<?= $item['jml_penjual']?>);
    <?php endforeach;?>
    const penjualPerTipe = new Chart(document.getElementById('penjualPerTipe').getContext('2d'), {
        type: 'doughnut',
        data: {
            // labels: [
            //     'Mahasiswa',
            //     'Umum'
            // ],
            labels: labelTipeKelompok,
            datasets: [{
                label: 'My First Dataset',
                // data: [80, 20],
                data: dataTipeKelompok,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                hoverOffset: 4
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Total penjual berdasarkan tipe',
                    align: "start",
                },
                legend: {
                    position: "top"
                },
            },
        }
    });

    // Kategori produk berdasarkan tipe penjual

    <?php


    ?>
    const kategoriPerTipe = new Chart(document.getElementById('kategoriPerTipe').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Mahasiswa', 'Umum'], // responsible for how many bars are gonna show on the chart
            // create 12 datasets, since we have 12 items
            // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
            // put 0, if there is no data for the particular bar
            datasets: [{
                label: 'Craft',
                data: [2, 8],
                backgroundColor: 'rgba(255, 99, 132, 1)'
            }, {
                label: 'Fashion',
                data: [4, 2],
                backgroundColor: 'rgba(54, 162, 235, 1)'
            }, {
                label: 'Foods',
                data: [4, 1],
                backgroundColor: 'rgba(255, 206, 86, 1)'
            }, {
                label: 'Pertanian & Perkebunan',
                data: [5, 2],
                backgroundColor: 'rgba(75, 192, 192, 1)'
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Kategori produk berdasarkan tipe penjual',
                    align: "start",
                },
                legend: {
                    position: "right"
                },
            },
            scales: {
                x: {
                    stacked: true // this should be set to make the bars stacked
                },
                y: {
                    stacked: true // this also..
                }
            }
        }
    });
</script>