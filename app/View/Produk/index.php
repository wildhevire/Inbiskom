 <!-- ! MAIN CONTENT -->
 <main class="container-fluid mt-4 pb-5">
   <h2 class="mb-4">Produk</h2>
   <div class="row align-items-center">
     <div class="col">
       <a rel="modal:open" href="#add_modal" class="bm-btn"><span class="bm-btn__icon">
           <i class="fas fa-plus"></i>
         </span>
         <span class="bm-btn__label">Tambah Produk</span></a>
     </div>
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
         <?php foreach ($model['produk'] as $produk) : ?>
           <tr>
             <?php $counter++; ?>
             <td><?= $counter ?> </td>
             <td><?= $produk['nama_produk'] ?></td>
             <td class="text-truncate" style="max-width: 240px"><?= $produk['deskripsi_produk'] ?> </td>
             <td><?= $produk['harga'] ?> </td>
             <td><?= $produk['nama_kategori'] ?></td>
             <td><?= $produk['nama_kelompok'] ?></td>
             <td>
               <a target="_blank" href="/produk?q=<?= $produk['id_produk'] ?>" class="bm-link">Lihat</a>&nbsp;&nbsp;&nbsp;&nbsp;
               <a rel="modal:open" href="#edit_modal" class="bm-link btn_update"
                  data-id="<?= $produk['id_produk'] ?>"
                  data-nama="<?= $produk['nama_produk'] ?>"
                  data-harga="<?= $produk['harga'] ?>"
                  data-id_kelompok="<?= $produk['id_kelompok'] ?>"
                  data-deskripsi="<?= $produk['deskripsi_produk'] ?>"


               >Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;
               <a rel="modal:open" href="#delete_modal" class="bm-link text-danger btn_delete"
                  data-id="<?= $produk['id_produk'] ?>"
               >Hapus</a>
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
 <div class="bm-modal h-auto " id="detail_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
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


 <!-- ! ADD MODAL -->
 <div class="bm-modal h-auto " id="add_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
   <div class="bm-modal__header">
     <h5 class="bm-modal__title">Tambah data produk</h5>
     <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
       <span class="bm-modal__icon-close"></span>
       <span class="bm-sr-only">Batal</span>
     </a>
   </div>

     <form action="/AddProduk" method="POST" enctype="multipart/form-data">
   <div class="bm-modal__body">

       <label class="bm-input-label" for="nama-produk">Nama produk</label>
       <div class="bm-input">
         <input type="text" name="nama_produk" id="nama-produk" class="bm-input__field" placeholder="Contoh: Seblak Mantap" />
       </div>

       <br />
       <label class="bm-input-label" for="harga">Harga</label>
       <div class="bm-input">
         <input type="text" name="harga" id="harga" class="bm-input__field" placeholder="Contoh: 20000" />
       </div>

       <br />
       <label class="bm-input-label" for="deskripsi-add">Deskripsi produk</label>
       <div class="bm-input">
         <textarea id="deskripsi-add" name="deskripsi_produk" class="bm-input__field" placeholder="Contoh: Seblak dengan menggunakan kerupuk asli"></textarea>
       </div>
       <br />
       <label class="bm-input-label" for="kelompok">Kelompok</label>
       <div class="bm-input">
         <select class="bm-input__field" id="kelompok" name="id_kelompok" required>
           <option value="" disabled selected>Pilih opsi</option>
             <?php foreach ($model['kelompok'] as $kelompok) :?>
                 <option value="<?= $kelompok['id_kelompok'] ?>"><?= $kelompok['nama_kelompok'] ?></option>
             <?php endforeach;?>
         </select>
         <span class="bm-input__arrow"></span>
       </div>
       <br />
       <br />

       <label class="bm-input-label" for="foto-produk-1">Foto produk</label>
       <input name="foto_count-1" hidden id="foto_count-1" type="number" value="0" />
       <div class="row" id="foto-produk-wrapper-1">
         <span class="col-12 bm-caption text-secondary">
           Foto utama produk
         </span>
         <div class="col-3 mb-4">
           <label for="foto-produk-1-1" id="label-foto-produk-1-1" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
             <input class="file-upload" type="file" name="foto-produk-1-1" id="foto-produk-1-1" accept="image/*" />

             <span class="text-secondary">Tambah foto</span>
             <i class="fas fa-image fs-2 text-secondary"></i>
           </label>
           <label for="foto-produk-1-1" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-1">
             <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-1" src="#" alt="Foto produk" />
             <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
               <span class="bm-btn-circle__icon">
                 <i class="fas fa-times"></i>
               </span>
             </button>
           </label>
         </div>
         <span class="col-12 bm-caption text-secondary">
           Foto produk
         </span>
         <div class="col-3">
           <label for="foto-produk-1-2" id="label-foto-produk-1-2" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
             <input class="file-upload" type="file" name="foto-produk-1-2" id="foto-produk-1-2" accept="image/*" />

             <span class="text-secondary">Tambah foto</span>
             <i class="fas fa-image fs-2 text-secondary"></i>
           </label>
           <label for="foto-produk-1-2" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-2">
             <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-2" src="#" alt="Foto produk" />
             <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
               <span class="bm-btn-circle__icon">
                 <i class="fas fa-times"></i>
               </span>
             </button>
           </label>
         </div>
         <div class="col-3">
           <label for="foto-produk-1-3" id="label-foto-produk-1-3" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
             <input class="file-upload" type="file" name="foto-produk-1-3" id="foto-produk-1-3" accept="image/*" />

             <span class="text-secondary">Tambah foto</span>
             <i class="fas fa-image fs-2 text-secondary"></i>
           </label>
           <label for="foto-produk-1-3" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-3">
             <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-3" src="#" alt="Foto produk" />
             <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
               <span class="bm-btn-circle__icon">
                 <i class="fas fa-times"></i>
               </span>
             </button>
           </label>
         </div>
         <div class="col-3">
           <label for="foto-produk-1-4" id="label-foto-produk-1-4" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
             <input class="file-upload" type="file" name="foto-produk-1-4" id="foto-produk-1-4" accept="image/*" />

             <span class="text-secondary">Tambah foto</span>
             <i class="fas fa-image fs-2 text-secondary"></i>
           </label>
           <label for="foto-produk-1-4" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-4">
             <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-4" src="#" alt="Foto produk" />
             <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
               <span class="bm-btn-circle__icon">
                 <i class="fas fa-times"></i>
               </span>
             </button>
           </label>
         </div>
         <div class="col-3">
           <label for="foto-produk-1-5" id="label-foto-produk-1-5" class="bm-input--file bm-input--file__small mt-4 mx-auto bm-cursor-pointer">
             <input class="file-upload" type="file" name="foto-produk-1-5" id="foto-produk-1-5" accept="image/*" />

             <span class="text-secondary">Tambah foto</span>
             <i class="fas fa-image fs-2 text-secondary"></i>
           </label>
           <label for="foto-produk-1-5" class="mx-auto my-4 text-center bm-relative" id="label-image-foto-produk-1-5">
             <img class="bm-img-responsive bm-cursor-pointer" id="placeholder-foto-produk-1-5" src="#" alt="Foto produk" />
             <button class="bm-btn-circle bm-btn-circle--small bm-close-btn" id="delete-foto">
               <span class="bm-btn-circle__icon">
                 <i class="fas fa-times"></i>
               </span>
             </button>
           </label>
         </div>
       </div>

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
 <!-- ! END OF ADD MODAL -->

 <!-- ! EDIT MODAL -->
 <div class="bm-modal h-auto " id="edit_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
   <div class="bm-modal__header">
     <h5 class="bm-modal__title">Ubah data produk</h5>
     <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
       <span class="bm-modal__icon-close"></span>
       <span class="bm-sr-only">Batal</span>
     </a>
   </div>

   <div class="bm-modal__body">
     <form action="/UpdateProduk" method="POST" enctype="multipart/form-data">
         <input type="text" hidden name="id_produk" id="update-id-produk"/>
       <label class="bm-input-label" for="add-nama-produk">Nama produk</label>
       <div class="bm-input">
         <input type="text" name="nama_produk" id="add-nama-produk" class="bm-input__field" placeholder="Contoh: Seblak Mantap" />
       </div>

       <br />
       <label class="bm-input-label" for="add-harga">Harga</label>
       <div class="bm-input">
         <input type="text" name="harga" id="add-harga" class="bm-input__field" placeholder="Contoh: 20000" />
       </div>

       <br />
       <label class="bm-input-label" for="add-alamat">Deskripsi produk</label>
       <div class="bm-input">
         <textarea id="add-alamat" name="deskripsi_produk" class="bm-input__field" placeholder="Contoh: Seblak dengan menggunakan kerupuk asli"></textarea>
       </div>
       <br />
       <label class="bm-input-label" for="edit_kelompok">Kelompok</label>
       <div class="bm-input">
         <select class="bm-input__field" id="edit_kelompok" name="id_kelompok" required>
           <option value="" disabled selected>Pilih opsi</option>
             <?php foreach ($model['kelompok'] as $kelompok) :?>
                 <option value="<?= $kelompok['id_kelompok'] ?>"><?= $kelompok['nama_kelompok'] ?></option>
             <?php endforeach;?>
         </select>
         <span class="bm-input__arrow"></span>
       </div>
       <br />
       <br />

       <!-- <label class="bm-input-label" for="foto-produk">Foto produk</label>
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
       </div> -->

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
 <!-- ! END OF EDIT MODAL -->

 <!-- ! DELETE MODAL -->
 <div class="bm-modal h-auto " id="delete_modal" role="dialog" aria-modal="true" aria-labelledby="modal-label" tabindex="-1">
   <div class="bm-modal__header">
     <h5 class="bm-modal__title">Apakah Anda yakin?</h5>
     <a class="bm-modal__button-close" aria-label="close" rel="modal:close">
       <span class="bm-modal__icon-close"></span>
       <span class="bm-sr-only">Batal</span>
     </a>
   </div>
     <form action="/DeleteProduk" method="POST">
         <input name="id_produk" type="hidden" id="delete_id_produk">
   <div class="bm-modal__body">
     <p class="bm-body1">
       Anda tidak akan dapat memulihkan data ini jika sudah di hapus
     </p>
   </div>

   <div class="bm-modal__footer">
     <a type="button" class="bm-btn bm-btn--secondary" rel="modal:close">
       <span class="bm-btn__label">Batal</span>
     </a>
     <button type="submit" class="bm-btn bm-btn--danger">
       <span class="bm-btn__label">Ya, hapus data ini!</span>
     </button>
   </div>
     </form>
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

     for (let index = 1; index < 6; index++) {
       $(`#placeholder-foto-produk-1-${index}`).hide();
       $(`#label-image-foto-produk-1-${index}`).hide();
       $(`#foto-produk-1-${index}`).change(function() {
         const [logo] = $(`#foto-produk-1-${index}`)[0].files;
         $(`#label-foto-produk-1-${index}`).hide();
         $(`#placeholder-foto-produk-1-${index}`).show();
         $(`#label-image-foto-produk-1-${index}`).show();
         $(`#placeholder-foto-produk-1-${index}`)[0].src = URL.createObjectURL(logo);
       });
     }
     $('#foto-produk-wrapper-1').on("click", '#delete-foto', (e) => {
       e.preventDefault()
       let fotoProdukCount = document.getElementsByClassName("foto-produk-1").length
       fotoProdukCount--;
       $("#foto_count-1").val(fotoProdukCount)
       if (e.target.parentElement.tagName === "SPAN") {
         let elId = e.target.parentElement.parentElement.parentElement.parentElement.children[0].children[0].id
         console.log(elId);
         $(`#${elId}`).val('')
         $(`#placeholder-${elId}`).hide();
         $(`#label-image-${elId}`).hide();
         $(`#label-${elId}`).show();
       } else {
         let elId = e.target.parentElement.parentElement.children[0].children[0].id
         $(`#${elId}`).val('')
         $(`#placeholder-${elId}`).hide();
         $(`#label-image-${elId}`).hide();
         $(`#label-${elId}`).show();
       }
     })

   });

   $(".btn_delete").click(function (){
       var id = $(this).data("id");

       $("#delete_id_produk").val(id);
   });

   $(".btn_update").click(function (){
       var id = $(this).data("id");
       var nama = $(this).data("nama");
       var harga = $(this).data("harga");
       var deskripsi = $(this).data("deskripsi");
       var id_kategori = $(this).data("id_kategori");
       var id_kelompok = $(this).data("id_kelompok");

       $("#update-id-produk").val(id);
       $("#add-nama-produk").val(nama);
       $("#add-harga").val(harga);
       $("#add-alamat").val(deskripsi);
       $("#edit_kelompok").val(id_kelompok);
   });
 </script>