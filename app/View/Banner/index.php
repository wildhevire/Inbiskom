 <h2 class="mb-4">Banner Slideshow</h2>
 <div class="row align-items-center">
     <div class="col">
         <a rel="modal:open" href="#add_modal" class="bm-btn"><span class="bm-btn__icon">
                 <i class="fas fa-plus"></i>
             </span>
             <span class="bm-btn__label">Tambah banner</span></a>
     </div>
 </div>

 <?php if (isset($model['success'])) { ?>
     <!-- ! SUCCESS ALERT -->
     <div class="bm-alert bm-alert--success mt-4" role="alert">
         <div class="bm-alert__icon">
             <i class="fas fa-check-circle"></i>
         </div>
         <div class="bm-alert__content"><?= $model['success'] ?></div>
     </div>
     <!-- ! END OF SUCCESS ALERT -->
 <?php } ?>

 <?php if (isset($model['error'])) { ?>
     <!-- ! ERROR ALERT -->
     <div class="bm-alert bm-alert--error mt-4" role="alert">
         <div class="bm-alert__icon">
             <i class="fas fa-exclamation-circle"></i>
         </div>
         <div class="bm-alert__content"><?= $model['error'] ?></div>
     </div>
     <!-- ! END OF ERROR ALERT -->
 <?php } ?>

 <?php if(!empty($model['data'])) :?>
     <div class="bm-card mt-4 bg-white">
         <table class="bm-table w-100">

             <thead>
                 <th>No</th>
                 <th>Gambar</th>
                 <th>Status</th>
                 <th>Aksi</th>
             </thead>
             <tbody>
                 <?php $counter = 0 ?>
                 <?php foreach ($model['data'] as $data) : ?>
                     <tr>
                         <?php $counter++; ?>
                         <td><?= $counter ?></td>
                         <td><img height="80" src="<?= "./assets/images/".$data['url_banner'] ?>" alt="XPS, Designed to be the best" /></td>
                         <td><?php echo $data['status'] == 1 ? "Aktif" : "Tidak Aktif" ?></td>
                         <td>
                             <!-- <a rel="modal:open" href="#edit_modal" class="bm-link btn_update" id="btn_update" data-id="<?= $data['id']; ?>" data-nama="<?= $data['nama_pengguna']; ?>" data-username="<?= $data['username']; ?>" data-tahun-aktif="<?= $data['tahun_aktif']; ?>" data-hak-akses="<?= $data['hak_akses']; ?>">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp; -->
                             <a rel="modal:open" href="#delete_modal" class="bm-link text-danger btn_delete" data-id="<?= $data['id']; ?>">Ubah status</a>
                         </td>
                     </tr>
                 <?php endforeach; ?>

             </tbody>
         </table>
     </div>
 <?php else :?>
     <p>Tidak ada data</p>
 <?php endif;?>


 <!-- ! TAMBAH MODAL -->
 <div class="bm-modal h-auto" id="add_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
     <div class="bm-modal__header">
         <h5 class="bm-modal__title">Tambah gambar banner</h5>
         <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
             <span class="bm-modal__icon-close"></span>
             <span class="bm-sr-only">Batal</span>
         </a>
     </div>
     <form action="/AddBanner" method="POST" enctype="multipart/form-data">

         <div class="bm-modal__body">
             <!-- <label class="bm-input-label" for="logo-kelompok">Gambar</label> -->
             <label for="logo" class="bm-input--file mt-4 mx-auto bm-cursor-pointer" id="label-logo">
                 <input class="w-100 file-upload" type="file" name="banner" id="logo" accept="image/*" />

                 <p class="text-secondary">Tambah foto</p>
                 <i class="fas fa-image fs-2 text-secondary"></i>
             </label>
             <label for="logo" class="mx-auto mt-4 mb-2 text-center">
                 <img class="w-50 bm-img-responsive bm-cursor-pointer" id="placeholder-logo" src="#" alt="Logo baru" />
             </label>
         </div>

         <div class="bm-modal__footer">
             <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
                 <span class="bm-btn__label">Batal</span>
             </a>
             <button type="submit" class="bm-btn">
                 <span class="bm-btn__label">Simpan</span>
             </button>
         </div>
     </form>
 </div>
 <!-- ! END OF TAMBAH MODAL -->

 <!-- ! DELETE MODAL -->
 <div class="bm-modal h-auto" id="delete_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
     <form action="/DeactivateBanner" method="POST">
         <input type="text" hidden name="id_banner" id="delete_id_pengguna" />
         <div class="bm-modal__header">
             <h5 class="bm-modal__title">Apakah Anda yakin?</h5>
             <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
                 <span class="bm-modal__icon-close"></span>
                 <span class="bm-sr-only">Batal</span>
             </a>
         </div>

         <div class="bm-modal__body">
             <p class="bm-body1">
                 Apakah Anda yakin ingin mengubah status?
             </p>
         </div>

         <div class="bm-modal__footer">
             <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
                 <span class="bm-btn__label">Batal</span>
             </a>
             <button type="submit" class="bm-btn bm-btn--danger">
                 <span class="bm-btn__label">Ya, ubah data ini!</span>
             </button>
         </div>
     </form>
 </div>
 <!-- ! END OF DELETE MODAL -->

 <script>
     $('#placeholder-logo').hide();

     $('#logo').change(function() {
      const [logo] = $('#logo')[0].files;
      $('#label-logo').hide();
      $('#placeholder-logo').show();
      $('#placeholder-logo')[0].src = URL.createObjectURL(logo);
    });

     $(".btn_delete").click(function() {
         var id = $(this).data("id");

         $("#delete_id_pengguna").val(id);
     });
 </script>