<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/general.mobile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="For insightful articles on Web Dev & Cybersecurity, ma13w's offers expert advice, helpful tips, and engaging stories. Stay updated and inspired. Visit us today!"> 
</head>
<body>
   <?php include 'php/component/general.php'; ?>
   <?php include 'php/component/navbar.php'; ?>

    <div class="container mobile-about">
        <h1>About</h1>
        <div style="padding: 0 100px" class="about-text"><?php echo $ABOUT_TEXT ?></div>
    </div>

    <?php include 'php/component/footer.php'; ?>
</body>
</html>