<?php
use backend\models\KategoriKliping;
use backend\models\Kliping;
?>

    <!-- Contact Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Kategori Kliping</h4>
                        </div>
                        <div class="bg-white p-3">
                            <div class="row">
                                <?php
                                    $getKategori = KategoriKliping::find()->All(); //menemukan dam menampilkan semua isi dari table kategori kliping
                                    foreach ($getKategori as $kat){ //mengubah $getkategori menjadi $kat
                                ?>
                                    <div class="col-md-4">
                                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style=" width: 100px; background: #39569E;">
                                            <i class="fab fa fa-fw fa-th-list text-center py-4 mr-2" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                            <span class="font-weight-medium"> 
                                                <?= $kat->jenis_kategori?>
                                            </span>
                                        </a>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Social Follow End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->