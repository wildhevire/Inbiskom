<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inkubator Bisnis Unikom | Login</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./assets/css/bima-0.1.18.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>
<body class="bg-color login-container">
<div class="container-fluid">
    <header class="row justify-content-center mt-5">
        <div
            class="
            col-10 col-md-6 col-lg-4 col-xl-3 col-xxl-2
            bm-card
            bg-white
            px-3
            py-2
          "
        >
            <div class="row align-items-center">
                <div class="col-4 col-md-3">
                    <img
                        class="bm-img-responsive"
                        src="./assets/images/Logo UNIKOM.png"
                        alt="Logo unikom"
                    />
                </div>
                <div class="col-8 col-md-9">
                    <h1 class="bm-h3-headline fw-bold bm-text-primary text-center">
                        INBISKOM
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <main class="row justify-content-center mt-4">
        <div
            class="
            col-10 col-md-6 col-lg-4 col-xl-3 col-xxl-2
            bm-card
            bg-white
            p-4
          "
        >
            <form method="post" action="/AddPengguna">

                <div class="bm-input bm-input--outline bm-input--with-icon mb-3">
                    <input name="nama_pengguna"
                        type="text"
                        class="bm-input__field"
                        placeholder="Nama Penggunas"
                    />
                    <div class="bm-input__icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="bm-input bm-input--outline bm-input--with-icon mb-3">
                    <input name="username"
                           type="text"
                           class="bm-input__field"
                           placeholder="Username"
                    />
                    <div class="bm-input__icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="bm-input bm-input--outline bm-input--with-icon mb-3">
                    <input name="password"
                        type="password"
                        class="bm-input__field"
                        placeholder="Masukkan password"
                    />
                    <div class="bm-input__icon">
                        <i class="fa fa-key"></i>
                    </div>
                </div>

                <div class="bm-input bm-input--outline bm-input--with-icon mb-3">
                    <input name="tahun_aktif"
                           type="password"
                           class="bm-input__field"
                           placeholder="Tahun Aktif"
                    />
                    <div class="bm-input__icon">
                        <i class="fa fa-key"></i>
                    </div>
                </div>
                <label class="bm-input-label">Hak akses</label>
                <div class="row px-5">
                    <label class="bm-radio col-6">
                        Ketua divisi
                        <input
                                type="radio"
                                class="bm-radio__input"
                                id="hak-akses"
                                name="hak_akses"
                                value="ketua-divisi"
                        />
                        <span class="bm-radio__checkmark"></span>
                    </label>
                    <label class="bm-radio col-6">
                        Sekretaris
                        <input
                                type="radio"
                                class="bm-radio__input"
                                id="hak-akses"
                                name="hak_akses"
                                value="sekretaris"
                        />
                        <span class="bm-radio__checkmark"></span>
                    </label>


                <div class="text-end">
                    <button class="bm-btn text-end">Login</button>
                </div>
            </form>

        </div>
    </main>
</div>
</body>
</html>
