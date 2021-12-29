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

                    <div class="card">

                        <form id="productDeleteForm" action="process_delete_sub.php" method="post">
                            <input type="hidden" name="table" value="product">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        </form>

                        <form id="productUpdateForm" action="<?php echo ($product) ? 'process_update.php' : 'process_create.php'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name='id' value="<?= $product['id'] ?>">
                            <!-- 메뉴 기본정보 -->
                            <div class="card-header">
                                <strong>메뉴 기본정보</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">이름</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">구분</label></div>
                                    <div class="col-12 col-md-9">
                                        <input list="category-list" name="category" value="<?= $product_category ?>" />
                                        <datalist id="category-list">
                                            <?php foreach ($category_list as $category) : ?>
                                                <option value="<?= $category['category'] ?>">
                                                <?php endforeach; ?>
                                        </datalist>
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">설명</label></div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="detail" class="form-control"><?= $product['detail'] ?></textarea>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <img id="productImage1" src="../image/<?= $product['image1'] ?>" alt="" onclick="open_image_input(1)">
                                        <label for="imageInput1" class=" form-control-label">사진1</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="imageInput1" name="image1" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <img id="productImage2" src="../image/<?= $product['image2'] ?>" alt="" onclick="open_image_input(2)">
                                        <label for="imageInput2" class=" form-control-label">사진2</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="imageInput2" name="image2" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <img id="productImage3" src="../image/<?= $product['image3'] ?>" alt="" onclick="open_image_input(3)">
                                        <label for="imageInput3" class=" form-control-label">사진3</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="imageInput3" name="image3" class="form-control-file">
                                    </div>
                                </div>


                            </div>

                            <!-- footer -->
                            <div class="card-footer" style="text-align: right;">

                                <button type="submit" class="btn btn-outline-primary btn-sm" form="productUpdateForm">
                                    <i class="fa fa-dot-circle-o"></i>
                                    <?php echo $product ? '수정하기' : '추가하기' ?>
                                </button>

                                <?php if ($product) : ?>
                                    <button type="submit" class="btn btn-outline-danger btn-sm" form="productDeleteForm">삭제하기</button>
                                <?php endif ?>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>