<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // continue
} else {
    header("Location:  admin");
    exit();
}

if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['id']) &&
    isset($_POST['title']) &&
    isset($_POST['autohor']) &&
    isset($_POST['description']) &&
    $_POST['id'] != "" &&
    $_POST['title'] != "" &&
    $_POST['autohor'] != "" &&
    $_POST['description'] != ""
    ) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $autohor = $_POST['autohor'];
    $description = $_POST['description'];
    $tags = isset($_POST['tags']) ? $_POST['tags'] : ""; // default tags

    if( $_POST['id'] == "" ||
    $_POST['title'] == "" ||
    $_POST['autohor'] == "" ||
    $_POST['description'] == ""){
        echo '<script>window.location.href = "./admin?resp=Please compile all the form."</script>';
    }

    $id = str_replace(' ', '', $id); // remove spaces
    $id = pathinfo($id, PATHINFO_FILENAME); // get filename without extension

    $date = isset($_POST['date']) ? $_POST['date'] : date("d-m-Y"); // default date
    $timestamp = strtotime($date);
    if ($timestamp === false) {
        $timestamp = time();
    }
    $date = date("j F, Y", $timestamp);

    $data = [ 
        "title" => $title,
        "date" => $date,
        "autohor" => $autohor,
        "description" => $description,
        "tags" => $tags,
        "views" => 0
    ];

    $json = json_encode($data);

    $DB_URL .= $id.".json";
    $ch = curl_init($DB_URL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    // debug -> echo $response;
    echo 'Sending data to the database...';
    echo '<script>window.location.href = "./admin?resp='.urlencode($response).'";</script>';
}elseif($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["first"])){
    echo '<script>window.location.href = "./admin?resp=Please compile all the form."</script>';
}elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])){
    echo "LOGGING OUT";
    echo '<script>window.location.reload()</script>';
    $_SESSION['logged_in'] = false; 
}


?>
<div class="container mobile-admin-panel">
    <h1>Admin Panel</h1>
    <?php 
        if(isset($_GET['resp']) && $_GET['resp'] != ""){
            echo '
            <div class="admin-new">
                <h2>Added Post</h2>
                <div class="response">'.htmlspecialchars($_GET["resp"], ENT_QUOTES, "UTF-8").'</div>
            </div>
            ';
        }
    ?>
    <div class="admin-new">
        <h2>New post</h2>
        <form method="post" action="">
            <div class="input-container">
                <label for="id" class="input-label">File Name (with .md)</label>
                <input type="text" name="id" id="id" class="secret-code-input" require>
            </div>

            <div class="input-container">
                <label for="title" class="input-label">Title</label>
                <input type="text" name="title" id="title" class="secret-code-input" require>
            </div>

            <div class="input-container">
                <label for="date" class="input-label">Date</label>
                <input type="date" name="date" id="date" class="secret-code-input"> 
            </div>

            <div class="input-container">
                <label for="autohor" class="input-label">Author</label>
                <input type="text" name="autohor" id="autohor" class="secret-code-input" require> 
            </div>

            <div class="input-container">
                <label for="description" class="input-label">Description</label>
                <textarea name="description" id="description" class="secret-code-input" maxlength="300"></textarea require>
            </div>

            <div class="input-container">
                <label for="Tags" class="input-label">Tags</label>
                <input type="text" name="tags" id="tags" class="secret-code-input" placeholder="ctf, web, pwn..." require> 
            </div>

            <div class="input-container">
                <span>Upload .md file here: <a href="<?php echo $CONSOLE_URL ?>">Firebase Storage URL</a></span>
            </div>

            <button type="submit" class="login-button">SUBMIT</button>
        </form>
    </div>
    <div class="admin-stats">
        <h2>Dashboard</h2>
        <div class="posts-list admin-panel-post-list">
            <div class="post admin-post" style="margin-bottom: 20px">
                <div class="post-title admin-post-title">Title</div>
                <div class="post-views admin-post-views">Views</div>
                <div class="post-date admin-post-date">Date</div>
            </div>
            <?php get_all_file_name("admin", $STORAGE_URL, $DB_URL); ?>
        </div>
    </div>
    <div class="admin-new">
        <h2></h2>
        <form method="post" action="./logout">
            <input type="hidden" name="logout" id="logout" require>
            <button type="submit" class="login-button">LOGOUT</button>
        </form>  
    </div>
</div>