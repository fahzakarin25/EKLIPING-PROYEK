<?php
use backend\models\Kliping;
use backend\models\Media;
use yii\helpers\html;
use yii\helpers\Url;


?>
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <?php
                $getMedia= Media::find()-> all(); //menemukan dan menampilkan semua isi table media

                foreach ($getMedia as $med ){ //$getmedia dirubah menjadi $med
            ?>
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">Media : <?= $med->nama_media ?> </h4> 
                </div>
                <div class="position-relative mb-3">
                    <div class="row">
                        <?php
                            $getKliping= Kliping::find() //menemukan semua isi table kliping
                                    ->select('tanggal')  //menampilkan hanya 1 tanggal yang sama 
                                    ->where(['media' => $med->id_media]) //menampilkan kliping sesuai field media dengan table media yang id_media
                                    ->distinct('true') //SELECT DISTINCTdigunakan untuk mengembalikan hanya nilai yang berbeda (berbeda).
                                    ->all(); //membaca dan menampilkan semua isi table kliping

                            foreach ($getKliping as $row ){ //$getkliping dirubah menjadi $row
                        ?>
                            <div class="col-lg-3">
                                <img class="img-fluid w-100" src="<?= Url::Base().'/images/cover-kliping.png' ?> " style=" max-height: 50px; min-height: 395px; width: auto; object-fit: cover;">
                                <div class="bg-white p-4">
                                    <div class="mb-2">
                                        <?= Html::a('EDISI :'.' '.' '.$row->tglIndo($row->tanggal) ,['site/pdf-kliping', 'tanggal' => $row->tanggal ,'media' => $med->id_media],['class' => 'badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2']) ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            <?php 
                }
            ?>
        </div>
    </div>