<!-- ! NAVBAR -->
<header class="navbar row justify-content-between text-white px-3">
    <div class="col-2" id="menu">
        <i class="fa fa-bars"></i>
    </div>
    <div class="col-2 text-end" id="logout">
        <a class="text-white" href="/auth-logout"><i class="fa fa-sign-out-alt"></i></a>
    </div>
</header>
<!-- ! END OF NAVBAR -->

<div class="dashboard-row">
    <!-- ! SIDEBAR -->
    <nav class="sidebar row bm-bg-primary-darker" id="sidebar">
        <ul>
            <li class="bm-nav-link <?php if(isset($model['page_type']) && $model['page_type'] == 'dashboard'){ echo 'bm-nav-link--active'; } else echo "" ?> ">
                <a href="/dashboard-home">
                    <i class="fa fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="bm-nav-link <?php if(isset($model['page_type']) && $model['page_type'] == 'penjual'){ echo 'bm-nav-link--active'; } else echo "" ?> ">
                <a href="/dashboard-penjual">
                    <i class="fa fa-user"></i>
                    Penjual
                </a>
            </li>
            <li class="bm-nav-link <?php if(isset($model['page_type']) && $model['page_type'] == 'kelompok'){ echo 'bm-nav-link--active'; } else echo "" ?> ">
                <a href="/dashboard-kelompok">
                    <i class="fa fa-user-friends"></i>
                    Kelompok
                </a>
            </li>
            <li class="bm-nav-link <?php if(isset($model['page_type']) && $model['page_type'] == 'produk'){ echo 'bm-nav-link--active'; } else echo "" ?> ">
                <a href="/dashboard-produk">
                    <i class="fa fa-box-open"></i>
                    Produk
                </a>
            </li>
            <li class="bm-nav-link <?php if(isset($model['page_type']) && $model['page_type'] == 'kategori'){ echo 'bm-nav-link--active'; } else echo "" ?> ">
                <a href="/dashboard-kategori">
                    <i class="fa fa-tags"></i>
                    Kategori
                </a>
            </li>
            <?php if(isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris" ) :?>
            <li class="bm-nav-link <?php if(isset($model['page_type']) && $model['page_type'] == 'pengguna'){ echo 'bm-nav-link--active'; } else echo "" ?> ">
                <a href="/dashboard-pengguna">
                    <i class="fa fa-user-shield"></i>
                    Pengguna
                </a>
            </li>
            <?php endif;?>
            <?php if(isset($model["hak_akses"]) && $model["hak_akses"] == "sekretaris" ) :?>
            <li class="bm-nav-link <?php if(isset($model['page_type']) && $model['page_type'] == 'konfigurasi'){ echo 'bm-nav-link--active'; } else echo "" ?> ">
                <a href="/dashboard-konfigurasi">
                    <i class="fa fa-cog"></i>
                    Konfigurasi
                </a>
            </li>
            <?php endif;?>
        </ul>
    </nav>
    <!-- ! END OF SIDEBAR -->
    <main class="container-fluid mt-4 pb-5">