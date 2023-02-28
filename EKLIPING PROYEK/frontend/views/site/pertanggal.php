<?php
use yii\helpers\html;
use yii\helpers\Url;
use backend\models\Kliping;
use backend\models\Media;
use yii\helpers\StringHelper;
use yii\data\Sort;

?>
    
    <!-- Featured News Slider Start -->
	<div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Kliping Per-Tanggal</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                <?php
                    $getMedia= Media::find()-> all(); //menemukan dan menampilkan semua isi table kliping

                    foreach ($getMedia as $med ){ //$getmedia dirubah menjadi $med
                ?>
                    <?php
                        $getKliping= Kliping::find() //menemukan semua isi table kliping
                                    ->where(['media' => $med->id_media]) //menampilkan kliping sesuai field media dengan table media yang id_media
                                    ->select('tanggal') //menampilkan hanya 1 tanggal yang sama 
                                    ->orderBy(['tanggal' => SORT_DESC]) //ORDER BYkunci digunakan untuk mengurutkan kumpulan hasil dalam urutan menaik atau menurun. dan SORT_DESCdigunakan dengan array_multisort() untuk mengurutkan dalam urutan menurun.
                                    ->distinct('true') // SELECT DISTINCTdigunakan untuk mengembalikan hanya nilai yang berbeda (berbeda).
                                    ->all(); //membaca dan menampilkan semua isi table kliping

                        foreach ($getKliping as $row ){ //$getkliping dirubah menjadi $row
                    ?>
                        <div class="position-relative overflow-hidden" style="height: 300px;">
                            <img class="img-fluid h-100" src="<?= Url::Base().'/images/cover-kliping.png' ?> " style="max-height: 50px; min-height: 360px; width: auto; object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                <?= Html::a(' '.$row->tglIndo($row->tanggal) ,['site/pdf-kliping', 'tanggal' => $row->tanggal ,'media' => $med->id_media],['class' => 'badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-3']) ?> 
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->