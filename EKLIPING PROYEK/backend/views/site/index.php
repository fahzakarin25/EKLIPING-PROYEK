<?php

/** @var yii\web\View $this */

use backend\models\Jurnalis;
use backend\models\KategoriKliping;
use backend\models\Kliping;
use backend\models\Media;


$this->title = 'Dashboard';
?>
<div class="site-index">
    <div class="row">
        <?php
            $total_kliping = Kliping::find()->count();
            $total_media = Media::find()->count();
            $total_jurnalis = Jurnalis::find()->count();
            $total_kategori = KategoriKliping::find()->count();
        ?>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $total_kliping ?></h3>
                    <p>Total Data Kliping</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-clone"></i>
                </div>
                <a href="/ekliping/public/kliping" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $total_jurnalis ?></h3>
                    <p>Total Jurnalis</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="/ekliping/public/jurnalis" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $total_media ?></h3>
                    <p>Total Media</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-newspaper-o"></i>
                </div>
                <a href="/ekliping/public/media" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= $total_kategori ?></h3>
                    <p>Total Kategori Kliping</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-th-list"></i>
                </div>
                <a href="/ekliping/public/kategori-kliping" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    
    <!-- <div class="box" style="background-color: pink;"> -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Simple Full Width Table</h3>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
        <div class="box-body no-padding">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Judul</th>
                        <th>Media</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        $getKliping = Kliping::find()
                                    ->limit(5)
                                    ->all();

                        foreach ($getKliping as $row ){
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->judul ?></td>
                        <td>
                            <?php  
                                $getMedia = Media::find() 
                                            ->where(['id_media' => $row->media])
                                            ->All(); 
                                foreach ($getMedia as $med){
                            ?>
                            <?= $med->nama_media ?>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                            <?php  
                                $getKategori = KategoriKliping::find() 
                                            ->where(['id_kategori' => $row->kategori]) 
                                            ->All(); 
                                foreach ($getKategori as $ket){
                            ?>
                            <?= $ket->jenis_kategori ?>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                            <?php  
                                $getJurnalis = Jurnalis::find() 
                                            ->where(['id_pers' => $row->jurnalis]) 
                                            ->All(); 
                                foreach ($getJurnalis as $jur){
                            ?>
                            <?= $jur->nama_jurnalis ?>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

