<div id="right-panel" class="right-panel">
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>메뉴 관리</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">메뉴 관리</a></li>
                        <li><a href="#">메뉴별 상세페이지</a></li>
                        <? if ($_GET['name']) : ?>
                            <li class="active"><?= $_GET['name'] ?></li>
                        <? else : ?>
                            <li class="active">생성</li>
                        <? endif ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">

                    <form id="productUpdateForm" action="<?php echo ($product) ? 'process_update_main.php' : 'process_create_main.php'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                        <input type="hidden" name='id' value="<?= $product['id'] ?>">

                        <div class="card">
                            <!-- 메뉴 기본정보 -->
                            <div class="card-header">
                                <strong>메뉴 기본정보</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">상품 이름</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-3"><label class=" form-control-label">영상 1</label></div>
                                    <div class="col-12 col-md-9">
                                        <video class="video" src="../video/<?= $product['video1'] ?>" alt="" onclick="open_video_input(0)" style="width:100%"></video>
                                        <input type="file" name="video1" class="form-control-file input-video" onchange="change_video(0)">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-3">
                                        <label class=" form-control-label">슬라이드1 </label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <img class="img" src="../image/<?= $product['slide_img_1'] ?>" alt="" onclick="open_image_input(0)">
                                        <input type="file" id="imageInput1" name="slide_img_1" class="form-control-file input-image" onchange="change_image(0)">
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <label class=" form-control-label">설명</label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <textarea name="slide_detail_1" class="form-control" rows="8"><?= $product['slide_detail_1'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-3">
                                        <label class=" form-control-label">슬라이드2 </label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <img class="img" src="../image/<?= $product['slide_img_2'] ?>" alt="" onclick="open_image_input(1)">
                                        <input type="file" name="slide_img_2" class="form-control-file input-image" onchange="change_image(1)">
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <label class=" form-control-label">설명</label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <textarea name="slide_detail_2" class="form-control" rows="8"><?= $product['slide_detail_2'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-3">
                                        <label class=" form-control-label">슬라이드3 </label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <img class="img" src="../image/<?= $product['slide_img_3'] ?>" alt="" onclick="open_image_input(2)">
                                        <input type="file" id="imageInput1" name="slide_img_3" class="form-control-file input-image" onchange="change_image(2)">
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <label class=" form-control-label">설명</label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <textarea name="slide_detail_3" class="form-control" rows="8"><?= $product['slide_detail_3'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-3"><label class=" form-control-label">영상 2</label></div>
                                    <div class="col-12 col-md-9">
                                        <video class="video" src="../video/<?= $product['video2'] ?>" alt="" onclick="open_video_input(1)" style="width:100%"></video>
                                        <input type="file" name="video2" class="form-control-file input-video" onchange="change_video(1)">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">상품 설명 텍스트</label></div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="product_detail0" class="form-control" rows="8"><?= $product['product_detail0'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-3">
                                        <label class=" form-control-label">상품 상세 설명 1 </label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <img class="img" src="../image/<?= $product['product_image1'] ?>" alt="" onclick="open_image_input(3)">
                                        <input type="file" name="product_image1" class="form-control-file input-image" onchange="change_image(3)">
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <label class=" form-control-label">설명</label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <textarea name="product_detail1" class="form-control" rows="8"><?= $product['product_detail1'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-3">
                                        <label class=" form-control-label">상품 상세 설명 2 </label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <img class="img" src="../image/<?= $product['product_image2'] ?>" alt="" onclick="open_image_input(4)">
                                        <input type="file" name="product_image2" class="form-control-file input-image" onchange="change_image(4)">
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <label class=" form-control-label">설명</label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <textarea name="product_detail2" class="form-control" rows="8"><?= $product['product_detail2'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-3">
                                        <label class=" form-control-label">상품 상세 설명 3 </label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <img class="img" src="../image/<?= $product['product_image1'] ?>" alt="" onclick="open_image_input(5)">
                                        <input type="file" name="product_image3" class="form-control-file input-image" onchange="change_image(5)">
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <label class=" form-control-label">설명</label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <textarea name="product_detail3" class="form-control" rows="8"><?= $product['product_detail3'] ?></textarea>
                                    </div>
                                </div>


                            </div>

                            <!-- footer -->
                            <div class="card-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary btn-sm" form="productUpdateForm">
                                    <i class="fa fa-dot-circle-o"></i>
                                    <?php echo $product ? '수정하기' : '추가하기' ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>