<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include_once('./common/head.php')?>
</head>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="process_login.php" method="post">
                        <div class="form-group">
                            <label>관리자 아이디</label>
                            <input name="name" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>관리자 비밀번호</label>
                            <input name="password" type="password" class="form-control" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">로그인</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>