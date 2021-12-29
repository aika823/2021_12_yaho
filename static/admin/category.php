<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once(ROOT . "/admin/common/check_session.php");

$sql = "
SELECT product.*, category.category as category_name 
FROM soapypaper.product 
LEFT JOIN soapypaper.category
ON product.category = category.id
WHERE category.id = '{$_GET['category']}'
";
$product_list = sql_to_list($conn, $sql);
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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">메뉴 관리</a></li>
                            <li><a href="#">카테고리별</a></li>
                            <li class="active"><?= $_GET['category'] ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Bordered Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">이름</th>
                                            <th scope="col">카테고리</th>
                                            <th scope="col">설명</th>
                                            <th scope="col">삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($product_list as $product) : ?>
                                            <tr>
                                                <td><?= $product['id'] ?></td>
                                                <th scope="row">
                                                    <a href="detail.php?name=<?= $product['name'] ?>"><?= $product['name'] ?></a>
                                                </th>
                                                <td><?= $product['category_name'] ?></td>
                                                <td><?= $product['detail'] ?></td>
                                                <td><button class="btn btn-danger" onclick=delete_product(<?= $product['id'] ?>)> 삭제하기 </button></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <form action="./process_delete.php" id="menuDeleteForm" method="POST">
        <input type="hidden" name="id" id="menuID">
    </form>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>