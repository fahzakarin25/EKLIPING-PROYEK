<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\BeritaOnline;
use backend\models\KategoriKliping;
use backend\models\Kliping;
use backend\models\Media;
?>	
    <!-- Main News Slider Start -->
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="<?= Url::Base().'/img/koran kliping 2.jpg' ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">KLIPING DIGITAL DINAS KOMUNIKASI DAN INFORMATIKA KOTA PARIAMAN</a>
                        </div> 
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="<?= Url::Base().'/img/koran kliping 3.jpg' ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">KLIPING DIGITAL DINAS KOMUNIKASI DAN INFORMATIKA KOTA PARIAMAN</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="<?= Url::Base().'/img/koran kliping 1.jpg' ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">KLIPING DIGITAL DINAS KOMUNIKASI DAN INFORMATIKA KOTA PARIAMAN</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    <?php 
                        $no = 1; //dimulai dari nomor 1
                        $getKliping = Kliping::find() //menemukan isi dari table kliping
                                    ->orderBy(['id_kliping' => SORT_DESC]) ////ORDER BYkunci digunakan untuk mengurutkan kumpulan hasil dalam urutan menaik atau menurun. dan SORT_DESCdigunakan dengan array_multisort() untuk mengurutkan dalam urutan menurun.
                                    ->limit(4) //kliping dibatasi dan hanya menampilkan 4 saja
                                    ->all(); //menampilkan semua isi dari table kliping
                        foreach ($getKliping as $row ){ //$getkliping diganti menjadi $row
                    ?>
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <div>
                                    <?php
                                    $root_folder = Yii::getAlias('@root'); //mengambil data dari root
                                    $gambar = Html::img($root_folder . $row->lokasi_upload, ['class' => 'img-fluid w-100 h-100', 'style' => 'object-fit: cover;']); //field lokasi_upload = berisikan gambar yang sudah diupload
                                    echo $gambar;
                                    ?>
                                </div>
                                <div class="overlay">
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""><?= $row->judul ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

	<!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    
                    <div class="d-flex justify-content-between">
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            <?php
                                $getberita= BeritaOnline::find() //menemukan isi dari table berita online
                                        ->all(); //menampilkan semua isi dari table berita online
                                foreach ($getberita as $row ){ //$getberita dirubah jadi $row
                            ?>
                                <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="<?= $row->url_berita //ketika kita tekan judul akan membawa ke pada url berita masing2 judul sesuai id nya?>">
                                <?= $row->judul_berita //menampilkan judul berita sesuai id nya?> 
                                </a></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->
