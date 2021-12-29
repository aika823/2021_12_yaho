<?php
# get config setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once(ROOT . "/admin/common/check_session.php");

# MySQL query commit
$roll_list = sql_to_list($conn, "SELECT * FROM roll");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include_once('./common/head.php'); ?>
</head>

<body>
    <!-- Left Panel -->
    <?php include_once('./common/navbar.php'); ?>
    <!-- Right Panel -->
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

                    <!-- roll 추가 -->
                    <div class="col-lg-6">
                        <form id="rollUpdateForm" action="process_create_sub.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="table" value="roll">
                            <div class="card">

                                <div class="card-header">
                                    <strong>Roll 추가</strong>
                                </div>
                                <div class="card-body card-block">

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Product</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="product_name" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Width (cm)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="width_cm" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">length (cm)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="length_cm" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Width (inch)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="width_inch" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Length (ft)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="length_ft" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Quantity per Case</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="quantity_per_case" class="form-control" required>
                                        </div>
                                    </div>


                                </div>

                                <!-- footer -->
                                <div class="card-footer" style="text-align: right;">
                                    <button type="submit" class="btn btn-primary btn-sm" form="rollUpdateForm">
                                        <i class="fa fa-dot-circle-o"></i>
                                        추가하기
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Roll 목록 -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Roll 목록</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Width (cm)</th>
                                            <th scope="col">Length (cm)</th>
                                            <th scope="col">Width (inch)</th>
                                            <th scope="col">Length (ft)</th>
                                            <th scope="col">Quantity per Case</th>
                                            <th scope="col">수정/삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($roll_list as $roll) : ?>


                                            <form id="deleteRollForm<?= $roll['id'] ?>" action="process_delete_sub.php" method="post">
                                                <input type="hidden" name="table" value="roll">
                                                <input type="hidden" name="id" value="<?= $roll['id'] ?>">
                                            </form>

                                            <tr>

                                                <form action="process_update_sub.php" method="post">
                                                    <input type="hidden" name="table" value="roll">
                                                    <input type="hidden" name="id" value="<?= $roll['id'] ?>">
                                                    <td><input type="text" name="product_name" value="<?= $roll['product_name'] ?>"> </td>
                                                    <td><input type="text" name="width_cm" value="<?= $roll['width_cm'] ?>"> </td>
                                                    <td><input type="text" name="length_cm" value="<?= $roll['length_cm'] ?>"> </td>
                                                    <td><input type="text" name="width_inch" value="<?= $roll['width_inch'] ?>"> </td>
                                                    <td><input type="text" name="length_ft" value="<?= $roll['length_ft'] ?>"> </td>
                                                    <td><input type="text" name="quantity_per_case" value="<?= $roll['quantity_per_case'] ?>"> </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-outline-success">수정</button>
                                                        <button type="submit" class="btn btn-outline-danger" form="deleteRollForm<?= $roll['id'] ?>">삭제</button>
                                                    </td>
                                                </form>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Javascripts -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <script src="./vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="./vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>
    <script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/input_media.js"></script>
</body>

</html>