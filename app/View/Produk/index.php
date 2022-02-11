 <!-- ! MAIN CONTENT -->
 <main class="container-fluid mt-4 pb-5">
   <h2 class="mb-4">Produk</h2>
   <div class="row align-items-center">
     <div class="col"></div>
     <div class="col-4">
       <div class="bm-input bm-input--outline bm-input--with-icon">
         <input type="text" class="bm-input__field" placeholder="Cari produk" />
         <div class="bm-input__icon">
           <i class="fa fa-search"></i>
         </div>
       </div>
     </div>
   </div>
   <div class="bm-card mt-4 bg-white">
     <table class="bm-table w-100">
       <thead>
         <th>No</th>
         <th>Nama Produk</th>
         <th>Deskripsi</th>
         <th>Harga</th>
         <th>Kategori</th>
         <th>Kelompok</th>
         <th>Aksi</th>
       </thead>
       <tbody>
       <?php $counter = 0; ?>
       <?php foreach ($model['produk'] as $produk ) : ?>
         <tr>
             <?php $counter++; ?>
            <td><?= $counter ?> </td>
           <td><?=  $produk['nama_produk'] ?></td>
           <td class="text-truncate" style="max-width: 240px"><?=  $produk['deskripsi_produk'] ?> </td>
           <td><?=  $produk['harga'] ?> </td>
           <td><?=  $produk['nama_kategori'] ?></td>
           <td><?=  $produk['nama_kelompok'] ?></td>
           <td>
             <a rel="" href="/produk?q=<?= $produk['id_produk']?>" class="bm-link">Lihat</a>&nbsp;&nbsp;&nbsp;&nbsp;
             <a rel="modal:open" href="#edit_modal" class="bm-link"
             data-id="<?= $produk['id_produk']?>"
             data-id="<?= $produk['id_produk']?>"
             data-id="<?= $produk['id_produk']?>"
             >Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
             <a rel="modal:open" href="#delete_modal" class="bm-link text-danger">Hapus</a>
           </td>
         </tr>
       <?php endforeach ?>
       </tbody>
     </table>
   </div>
 </main>
 <!-- ! END OF MAIN CONTENT -->
 </div>
 </div>

 <!-- ! DETAIL MODAL -->
 <div class="bm-modal h-auto bm-modal--scrollable" id="detail_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
   <div class="bm-modal__header">
     <h5 class="bm-modal__title">Detail data produk</h5>
     <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
       <span class="bm-modal__icon-close"></span>
       <span class="bm-sr-only">Batal</span>
     </a>
   </div>

   <div class="bm-modal__body">
     <span class="fw-bold">Nama produk:</span>
     <p>T-shirt Polos</p>

     <span class="fw-bold">Harga:</span>
     <p>Rp 25.000</p>

     <span class="fw-bold">Deskripsi:</span>
     <p>
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo
       soluta, doloremque ullam aspernatur obcaecati accusantium voluptate
       dolorum vitae fugiat iure dolor. Quibusdam soluta rem nostrum vitae
       velit officiis eligendi error!
     </p>

     <span class="fw-bold">Nama kelompok:</span>
     <p>Kupakkai</p>

     <span class="fw-bold">Foto produk:</span>
     <div class="mt-2">
       <div class="row" id="images">
         <img class="bm-img-responsive col-4 bm-cursor-pointer" src="https://placekitten.com/200/300" alt="Picture 1" />
         <img class="bm-img-responsive col-4 bm-cursor-pointer" src="https://placekitten.com/200/300" alt="Picture 1" />
         <img class="bm-img-responsive col-4 bm-cursor-pointer" src="https://placekitten.com/200/300" alt="Picture 1" />
       </div>
     </div>
   </div>

   <div class="bm-modal__footer">
     <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
       <span class="bm-btn__label">Tutup</span>
     </a>
   </div>
 </div>
 <!-- ! END OF DETAIL MODAL -->

 <!-- ! EDIT MODAL -->
 <div class="bm-modal h-auto bm-modal--scrollable" id="edit_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
   <div class="bm-modal__header">
     <h5 class="bm-modal__title">Ubah data produk</h5>
     <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
       <span class="bm-modal__icon-close"></span>
       <span class="bm-sr-only">Batal</span>
     </a>
   </div>

   <div class="bm-modal__body">
     <label class="bm-input-label" for="nama-produk">Nama produk</label>
     <div class="bm-input">
       <input type="text" id="nama-produk" class="bm-input__field" placeholder="Contoh: Seblak Mantap" />
     </div>

     <br />
     <label class="bm-input-label" for="harga">Harga</label>
     <div class="bm-input">
       <input type="text" id="harga" class="bm-input__field" placeholder="Contoh: 20000" />
     </div>

     <br />
     <label class="bm-input-label" for="alamat">Deskripsi produk</label>
     <div class="bm-input">
       <textarea id="alamat" class="bm-input__field" placeholder="Contoh: Seblak dengan menggunakan kerupuk asli"></textarea>
     </div>
     <br />
     <label class="bm-input-label" for="kelompok">Kelompok</label>
     <div class="bm-input">
       <select class="bm-input__field" id="kelompok" required>
         <option value="" disabled selected>Pilih opsi</option>
         <option value="1">Option 1</option>
         <option value="2">Option 2</option>
         <option value="3">Option 3</option>
       </select>
       <span class="bm-input__arrow"></span>
     </div>
     <br />
     <br />

     <label class="bm-input-label" for="foto-produk">Foto produk</label>
     <p class="bm-caption text-secondary">
       Pilih foto untuk dijadikan foto utama
     </p>
     <div class="row">
       <label class="bm-radio col-4">
         <img class="bm-img-responsive" src="https://placekitten.com/400/300" alt="Picture 1" />
         <input type="radio" class="bm-radio__input" name="radio_selected" value="radio" />
         <span class="bm-radio__checkmark"></span>
       </label>
       <label class="bm-radio col-4">
         <img class="bm-img-responsive" src="https://placekitten.com/400/300" alt="Picture 1" />
         <input type="radio" class="bm-radio__input" name="radio_selected" value="radio" />
         <span class="bm-radio__checkmark"></span>
       </label>
     </div>

     <label for="logo" class="bm-input--file mt-4 mx-auto bm-cursor-pointer" id="label-logo">
       <input class="w-100 file-upload" type="file" name="logo" id="logo" accept="image/*" />

       <p class="text-secondary">Tambah foto</p>
       <i class="fas fa-save fs-2 text-secondary"></i>
     </label>
     <label for="logo" class="mx-auto mt-4 mb-2 text-center">
       <img class="w-50 bm-img-responsive bm-cursor-pointer" id="placeholder-logo" src="#" alt="Logo baru" />
     </label>
     <div class="text-center">
       <button type="button" class="bm-btn">
         <span class="bm-btn__label">Upload gambar</span>
       </button>
     </div>
   </div>

   <div class="bm-modal__footer">
     <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
       <span class="bm-btn__label">Batal</span>
     </a>
     <button type="button" class="bm-btn">
       <span class="bm-btn__label">Simpan</span>
     </button>
   </div>
 </div>
 <!-- ! END OF EDIT MODAL -->

 <!-- ! DELETE MODAL -->
 <div class="bm-modal h-auto bm-modal--scrollable" id="delete_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
   <div class="bm-modal__header">
     <h5 class="bm-modal__title">Apakah Anda yakin?</h5>
     <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
       <span class="bm-modal__icon-close"></span>
       <span class="bm-sr-only">Batal</span>
     </a>
   </div>

   <div class="bm-modal__body">
     <p class="bm-body1">
       Anda tidak akan dapat memulihkan data ini jika sudah di hapus
     </p>
   </div>

   <div class="bm-modal__footer">
     <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
       <span class="bm-btn__label">Batal</span>
     </a>
     <button type="button" class="bm-btn bm-btn--danger">
       <span class="bm-btn__label">Ya, hapus data ini!</span>
     </button>
   </div>
 </div>
 <!-- ! END OF DELETE MODAL -->


 <script>
   $(document).ready(function() {
     $('#placeholder-logo').hide();

     $('#menu').click(function() {
       $('#sidebar').toggle();
     });

     $('#logo').change(function() {
       const [logo] = $('#logo')[0].files;
       $('#label-logo').hide();
       $('#placeholder-logo').show();
       $('#placeholder-logo')[0].src = URL.createObjectURL(logo);
     });
   });
 </script>