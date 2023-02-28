<?php

/** @var yii\web\View $this */

use backend\models\Jurnalis;
use backend\models\KategoriKliping;
use backend\models\Kliping;
use backend\models\Media;

// $this->title = 'My Yii Application';
$this->title = 'Dashboard';
?>
<div class="site-index">

    <!-- <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Dashboard</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

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

    <!-- <div class="body-content"> DASHBOARD 2
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-clone" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Data Kliping</span>
                        <span class="info-box-number">11</span>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm-block"></div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Jurnalis</span>
                            <span class="info-box-number">3</span>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-fw fa-newspaper-o" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Media</span>
                            <span class="info-box-number">1</span>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-th-list" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Kategori Kliping</span>
                            <span class="info-box-number">13</span>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


        <!-- <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div> -->
</div>

