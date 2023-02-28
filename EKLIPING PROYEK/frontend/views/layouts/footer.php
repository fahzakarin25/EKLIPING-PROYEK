<?php
use backend\models\KategoriKliping;
use backend\models\Kliping;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Media;
?>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">DISKOMINFO KOTA PARIAMAN</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Jl. Imam Bonjol No 44 Pariaman, Desa Cimparuah, Kecamatan Pariaman Tengah Kota Pariaman, 25511</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>(0751) 92202</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>diskominfo@pariamankota.go.id</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://twitter.com/McPariaman"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.facebook.com/kominfopariamankota/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.instagram.com/mediacenterkotapariaman/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://currents.google.com/107848083815316908502"><i class="fab fa-google-plus-g"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="https://www.youtube.com/channel/UCI_Ouqd5kUvr5065wu_OdVw"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                <div class="mb-3">
                    <?php 
                        $no = 1;
                        $getKliping = Kliping::find()
                                    ->orderBy(['id_kliping' => SORT_DESC])
                                    ->limit(3)
                                    ->all();

                        foreach ($getKliping as $row ){
                    ?>
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href=""><?php echo $row->jenisKategori->jenis_kategori ?></a>
                            <a class="text-body" href=""><small><?= $row->tglIndo($row->tanggal) ?></small></a>
                        </div>
                        <?= Html::a(' '.$row->judul, ['print-kliping', 'id_kliping' => $row->id_kliping], ['class' => 'small text-body text-uppercase font-weight-medium']) ?>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Kategori</h5>
                <div class="m-n1">
                    <?php
                        $getKategori = KategoriKliping::find()->All(); 
                        foreach ($getKategori as $kat){
                    ?>
                        <a href="" class="btn btn-sm btn-secondary m-1"><?= $kat->jenis_kategori?></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Pemerintahan Kota Pariaman</h5>
                <div class="row">
                    <div class="col-md-12" style="padding-top: 10px;  padding-left: 50px;">
                        <a href=""><img class="img-responsive" src="<?= Url::Base().'/images/pariaman.png' ?>" style="width: 150px; height: 200px; object-fit: auto; " alt=""></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Diskominfo Kota Pariaman</a>. All Rights Reserved. 
		
		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
		Design by <a href="https://htmlcodex.com">HTML Codex</a></p>
    </div>
    <!-- Footer End -->