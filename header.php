<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Colin" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <meta name="rating" content="General" />
    <meta HTTP-EQUIV="pragma" CONTENT="no-cache"> 
	<meta HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate"> 
	<meta HTTP-EQUIV="expires" CONTENT="0">

    <base target="_self" />
    <title>順益電子賀卡系統</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

    <link rel="stylesheet" href="css/style.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />
</head>
<body>

<header>
    <div class="mobile-nav-row">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">電子賀卡系統</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link active" href="index.php">首頁
                        <span class="visually-hidden">(current)</span>
                    </a>
                    </li>


                    <?
                    if(isset($_SESSION['level']))
                    {
                        if($_SESSION['level'] >=5)
                        {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">後台管理</a>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="changecard.php">替換圖片</a>
                            <a class="dropdown-item" href="manageUser.php">權限設定</a>
                            </div>
                        </li>
                        <?
                        }
                    }
                    ?>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">登出</a>
                    </li>

                </ul>

                <span class="navbar-text" id="userid">
                    使用者: <?= (!empty($_SESSION['userid'])? trim($_SESSION['userid']):"") ?>
                </span>
            </div>
        </div>
        </nav>
        
    </div>
</header>