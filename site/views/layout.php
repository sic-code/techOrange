<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo/fa_icon.webp">
    <link rel="stylesheet" href="./assets/plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/plugin/font-awesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/user.css">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/css/product-details.css">
    <link rel="stylesheet" media="screen and (max-width: 1140px)" href="./assets/css/responsive-large.css">
    <link rel="stylesheet" media="screen and (max-width: 960px)" href="./assets/css/responsive-tablet.css">
    <link rel="stylesheet" media="screen and (max-width: 540px)" href="./assets/css/responsive-mobile.css">
</head>

<body>
    <?php require_once './site/views/layout/header.php'; ?>
    <article><?php require_once $site_view; ?></article>
    <?php require_once './site/views/layout/footer.php'; ?>
    <script src="./assets/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/javascript.js"></script>
    <script src="./assets/js/cart.js"></script>
</body>

</html>