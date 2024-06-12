<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/general.mobile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="For insightful articles on Web Dev & Cybersecurity, ma13w's offers expert advice, helpful tips, and engaging stories. Stay updated and inspired. Visit us today!"> 
</head>
<body >
   <?php include 'php/component/general.php'; ?>
   <?php include 'php/component/navbar.php'; ?>

    <div class="container mobile-admin">
        <?php

        if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= $ATTEMPT_LIMIT) {
            $remainingTime = $TIME_LIMIT - (time() - $_SESSION['block_start_time']);
            if ($remainingTime > 0) {
                echo "You have exceeded the maximum number of login attempts. Please try again after $remainingTime seconds.</div>";
                exit;
            } else {
                unset($_SESSION['login_attempts']);
                unset($_SESSION['block_start_time']);
            }
        }

        if (isset($_POST['code'])) {
            $code = $_POST['code'];

            if ($code === $SECRET_CODE) {
                $_SESSION['logged_in'] = true;
            } else {
                if (!isset($_SESSION['login_attempts'])) {
                    $_SESSION['login_attempts'] = 1;
                    $_SESSION['block_start_time'] = time();
                } else {
                    $_SESSION['login_attempts']++;
                }
            }
        }


        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            // User is logged in -> show the content
            include 'php/component/admin-panel.php';
        } else {
            // User is not logged in -> show the login form
            include 'php/component/login-form.php';
        }
        ?>
    </div>

    <script>
        document.querySelectorAll(".post").forEach(post => {
            post.addEventListener("click", () => {
                window.location.href = "./viewer?name=" + post.getAttribute("id");
            });
        });
    </script>
</body>
</html>