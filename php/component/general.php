<?php
session_start();

// DISCLAIMER: It is important to include this file (general.php) into some file in the /php folder. Otherwise, change the path in the include statement.
require_once 'path/Parsedown.php';
require_once 'path/ParsedownExtra.php';
require_once 'configure.php';

function get_all_file_name($type, $STORAGE_URL, $DB_URL){
    $content = get_request($STORAGE_URL);
    $data = json_decode($content, true);

    if ($data !== null) {
        $names = array_column($data['items'], 'name');

        if(is_numeric($type) && $type > count($names)) {while($type > count($names)) {$type -= 1;}}

        foreach ($names as $name) {
            // echo($name);
            if(is_numeric($type) && $type <= count($names) && $type > 0){ // used in index.php
                if($type == 0) {return;}
                print_md_tag_homepage_style($name, $STORAGE_URL, $DB_URL);
                $type -= 1;
            }

            if(is_numeric($type) && $type == -1){ // used in blog.php
                print_md_tag_blog_style($name, $STORAGE_URL, $DB_URL);
            }

            if($type == "admin"){ // used in admin.php
                print_blog_for_admin($name, $STORAGE_URL, $DB_URL);
            }else if($type == "blog"){ // never used, if you want to print all the content of all the files
                print_md_file_content($name, $STORAGE_URL);
            }
        }
    } else {
        echo "Error decoding JSON. Storage can be empty.get_all_file_name()<br>";
    }
}
function check_if_filename_exist($STORAGE_URL, $filename){
    $valid = false;
    $content = get_request($STORAGE_URL);
    $data = json_decode($content, true);

    if(!is_array($data) || !isset($data["items"])){
        echo "Error: Items not found in the data. check_if_filename_exist()<br>";
        return;
    }

    for ($i = 0; $i < count($data["items"]); $i++) {
        if($data["items"][$i]["name"] == $filename){
            $valid = true;
            break;
        }
        // debug -> echo $data["items"][$i]["name"] . "-" . $filename . "<br>";
    }

    return $valid;
}
function print_md_file_content($filename, $STORAGE_URL){
    if(!check_if_filename_exist($STORAGE_URL, $filename)){
        echo "Error: File not found. print_md_file_content()<br>";
        echo '<script>window.location.href = "./blog"</script>';
        return;
    }
    $get_content = get_request($STORAGE_URL .= $filename . '?alt=media');

    if (strpos($get_content, "Error") !== false) {
        echo "Error: File not found. print_md_file_content()<br>";
        return;
    }
    $Extra = new ParsedownExtra();
    $parsedContent = $Extra->text($get_content);
    echo '<div class="blog-content">';
    echo $parsedContent;
    echo '</div>';
}
function print_md_tag_homepage_style($filename, $STORAGE_URL, $DB_URL){  
    if ($filename == ""){
        echo "Error: Empty filename. print_md_tag_homepage_style()<br>";
        echo '<script>window.location.href = "./blog"</script>';
        return;
    }
    $content = get_request($DB_URL .= pathinfo($filename, PATHINFO_FILENAME) . ".json");
    $data = json_decode($content, true);

    if (is_array($data) && isset($data['title']) && isset($data['date'])) {
        $title = htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8');
        $date = htmlspecialchars($data['date'], ENT_QUOTES, 'UTF-8');

        echo '<div class="post" id="'.pathinfo($filename, PATHINFO_FILENAME).'">
        <div class="post-title">'.$title.'</div>
        <div class="post-date">'.$date.'</div>
        </div>';
        
    } else {
        echo "Error: Title or Date not found in the data.print_md_tag_homepage_style()<br>";
    }
}
function print_md_tag_blog_style($filename, $STORAGE_URL, $DB_URL){
    if ($filename == ""){
        echo "Error: Empty filename. print_md_tag_blog_style()<br>";
        echo '<script>window.location.href = "./blog"</script>';
        return;
    }
    if(!check_if_filename_exist($STORAGE_URL, $filename)){
        echo "Error: File not found. print_md_file_content()<br>";
        echo '<script>window.location.href = "./blog"</script>';
        return;
    }
    $content = get_request($DB_URL .= pathinfo($filename, PATHINFO_FILENAME). ".json");
    $data = json_decode($content, true);

    if (is_array($data) && isset($data['title']) && isset($data['date'])) {
        $title = htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8');
        $date = htmlspecialchars($data['date'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($data['description'], ENT_QUOTES, 'UTF-8');

        $year = get_year_from_date($date);
        echo '<script>

        var title = '.'"'.$title.'"'.';
        var date = '.'"'.$date.'"'.';
        var description = '.'"'.$description.'"'.';

        var postDiv = document.createElement("div");
        postDiv.className = "post";
        postDiv.setAttribute("id", "'.pathinfo($filename, PATHINFO_FILENAME).'");

        var postTitleDiv = document.createElement("div");
        postTitleDiv.className = "post-title";
        postTitleDiv.textContent = title; 

        var postDateDiv = document.createElement("div");
        postDateDiv.className = "post-date";
        postDateDiv.textContent = date; 

        postDiv.appendChild(postTitleDiv);
        postDiv.appendChild(postDateDiv);

        var postDescriptionDiv = document.createElement("div");
        postDescriptionDiv.className = "post-description";
        postDescriptionDiv.textContent = description;

        var postList = document.querySelector(".posts-list");
        var domYear = document.getElementById('.'"'.$year.'"'.');
        if(domYear == null){
            var h2 = document.createElement("h2");
            h2.id = '.'"'.$year.'"'.'; 
            h2.textContent = '.'"'.$year.'"'.'; 
            postList.appendChild(h2);
        }
        postList.appendChild(postDiv);
        postList.appendChild(postDiv);
        </script>';
        
        
    } else {
        echo "Error: Title or Date not found in the data.print_md_tag_blog_style()<br>";
    }
}
function print_blog_for_admin($filename, $STORAGE_URL, $DB_URL){
    if ($filename == ""){
        echo "Error: Empty filename. print_md_tag_blog_style()<br>";
        echo '<script>window.location.href = "./blog"</script>';
        return;
    }
    if(!check_if_filename_exist($STORAGE_URL, $filename)){
        echo "Error: File not found. print_md_file_content()<br>";
        echo '<script>window.location.href = "./blog"</script>';
        return;
    }
    $content = get_request($STORAGE_URL .= $filename . '?alt=media');

    $content = get_request($DB_URL .= pathinfo($filename, PATHINFO_FILENAME) . ".json");
    $data = json_decode($content, true);

    if (is_array($data) && isset($data['title']) && isset($data['date']) && isset($data['views'])) {
        $title = htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8');
        $date = htmlspecialchars($data['date'], ENT_QUOTES, 'UTF-8');
        $views = htmlspecialchars($data['views'], ENT_QUOTES, 'UTF-8');

        echo '<div class="post admin-post" id="'.pathinfo($filename, PATHINFO_FILENAME).'">
        <div class="post-title admin-post-title">'.$title.'</div>
        <div class="post-views admin-post-views">'.$views.'</div>
        <div class="post-date admin-post-date">'.$date.'</div>
        </div>';
    } else {
        echo "Error: Title/Date/Views not found in the data.print_blog_for_admin()<br>";
    }
}
function get_request($url){
    $content = file_get_contents($url);
    if ($content === false) {
        echo "Error: Could not retrieve content from Firebase.get_request()<br>";
        return;
    }
    return $content;
}
function put_request($url, $json){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function get_year_from_date($full_date){
    $year = explode(" ", $full_date);
    return $year[2];
}
function get_metatag_from_id($id, $metatag, $DB_URL){
    $content = get_request($DB_URL .= $id.".json");

    $data = json_decode($content, true);

    if (is_array($data)) {
        if(isset($data['title']) && $metatag == "title"){
            return $data['title'];
        }elseif(isset($data['date']) && $metatag == "date"){
            return $data['date'];
        }elseif(isset($data['autohor']) && $metatag == "autohor"){
            return $data['autohor'];
        }elseif(isset($data['description']) && $metatag == "description"){
            return $data['description'];
        }elseif(isset($data['tags']) && $metatag == "tags"){
            return $data['tags'];
        }elseif(isset($data['views']) && $metatag == "views"){
            return $data['views'];
        }elseif($metatag == "all"){
            return $data;
        }
    } else {
        echo "Error: Title not found in the data. get_metatag_from_id()<br>";
    }
}
function update_metatag_from_id($id, $metatag, $DB_URL, $value, $STORAGE_URL){
    if(!check_if_filename_exist($STORAGE_URL, $id.".md")){
        echo "Error: File not found. update_metatag_from_id()<br>";
        return;
    }

    $data = get_metatag_from_id($id, "all", $DB_URL);
    $DB_URL .= $id.".json";

    $data["views"] = intval($data["views"]) + $value;
    $json = json_encode($data);

    $response = put_request($DB_URL, $json);
}
?>