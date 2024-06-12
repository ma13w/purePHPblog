<?php
if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['id']) &&
    isset($_POST['title']) &&
    isset($_POST['autohor']) &&
    isset($_POST['description'])
    ) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = isset($_POST['date']) ? $_POST['date'] : date("gg-mm-yyyy"); // Default date
    $autohor = $_POST['autohor'];
    $description = $_POST['description'];
    $tags = isset($_POST['tags']) ? $_POST['tags'] : ""; // Default tags

    $id = str_replace(' ', '', $id); // Remove spaces
    $id = pathinfo($id, PATHINFO_FILENAME); // Get filename without extension
    $date = date("d F, Y", strtotime($date)); // Format date

    $data = [ 
        "title" => $title,
        "date" => $date,
        "autohor" => $autohor,
        "description" => $description,
        "tags" => $tags,
        "views" => 0
    ];

    $json = json_encode($data);

    $firebase_db_url = "https://admin-ctf-default-rtdb.europe-west1.firebasedatabase.app/blog/".$id.".json";
    $ch = curl_init($firebase_db_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    echo $response;

    header("Location:  admin.php?resp=".$response);
    exit();
}
?>