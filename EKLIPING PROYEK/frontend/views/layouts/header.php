<?php
use yii\helpers\html;
use yii\helpers\Url;

function hariIndo ($hariInggris) {
    switch ($hariInggris) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
    }
}
$hariBahasaInggris = date('l');
$hariIndonesia = hariIndo($hariBahasaInggris);
?>
    
    <!-- Topbar Start -->
	<div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">
                                <?php
                                echo($hariIndonesia.' '.','.' ');
                                echo date('d-m-Y');
                                ?>
                            </a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <?= Html::a('Tentang',['site/tentang'],['class'=>'nav-link text-body small']) ?>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <?= Html::a('Hubungi',['site/hubungi'],['class'=>'nav-link text-body small']) ?>
                        </li>
                        <li class="nav-item">
                            <?= Html::a('Login',['/public/site/'],['class' => 'nav-link text-body small']) ?>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://twitter.com/McPariaman"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.facebook.com/kominfopariamankota/"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.instagram.com/mediacenterkotapariaman/"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://currents.google.com/107848083815316908502"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.youtube.com/channel/UCI_Ouqd5kUvr5065wu_OdVw"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">E-<span class="text-secondary font-weight-normal">KLIPING</span></h1>
					<h5>Pemerintahan Kota Pariaman</h5>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <?= Html::a('BERANDA',['site/index'],['class'=>'nav-item nav-link']) ?>

                    <?= Html::a('E-KLIPING',['site/allkliping'],['class'=>'nav-item nav-link']) ?>

                    <?= Html::a('TENTANG',['site/tentang'],['class'=>'nav-item nav-link']) ?>

                    <?= Html::a('KATEGORI',['site/kategori'],['class'=>'nav-item nav-link']) ?>

                    <?= Html::a('HUBUNGI',['site/hubungi'],['class'=>'nav-item nav-link']) ?>

                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->