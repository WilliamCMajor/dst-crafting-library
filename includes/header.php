<?php include("mysql_connect.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SEO -->
    <meta name="description" content="An ultimate crafting guide and libray for players in Don't starve together.">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title><?php echo APP_NAME; ?></title>

    <!-- Custom styles -->
    <link href="<?php echo BASE_URL ?>css/reset.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>css/styles.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QFZB39BE57"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-QFZB39BE57');
    </script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo BASE_URL ?>index.php">DST Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>admin/insert.php">Insert</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>admin/edit.php">Edit</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Craft Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>tools.php">Tools</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>light.php">Light</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>survival.php">Survival</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>food.php">Food</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>science.php">Science</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>fight.php">Fight</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL ?>magic.php">Magic</a></li>
                </ul>
            </li>
        </ul>
        <form class="d-flex">
            <?php if(!(isset($_SESSION["dwq2as1sa"])))
              {
                echo "<button class=\"btn btn-primary\"><a href=\"admin/login.php\">Log in</a></button>";
              }else{
                $tmpPage = BASE_URL . "admin/logout.php";
                echo "<button class=\"btn btn-primary\"><a href=\"$tmpPage\">Log out</a></button>";
              }
            ?>
        </form>
        </div>
    </div>
    </nav>
  <main role="main" class="container">
