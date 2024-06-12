


<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/general.mobile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="For insightful articles on Web Dev & Cybersecurity, ma13w's offers expert advice, helpful tips, and engaging stories. Stay updated and inspired. Visit us today!"> 
</head>
<body >
    <?php require_once 'php/component/general.php'; ?>
    <?php include 'php/component/navbar.php'; ?>

    <div class="container mobile-blog">
        <h1>Posts</h1>
        <form method="POST" class="blog-search" autocomplete="off">
            <input type="text" id="search" name="search" placeholder="Search for posts..." class="blog-search-input-hidden">
            <input type="hidden" name="searched">
            <button type="submit" class="none-search" id="searchBtn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffffde"><path d="M782.87-98.52 526.91-354.48q-29.43 21.74-68.15 34.61Q420.04-307 375.48-307q-114.09 0-193.55-79.46-79.45-79.45-79.45-193.54 0-114.09 79.45-193.54Q261.39-853 375.48-853q114.09 0 193.54 79.46 79.46 79.45 79.46 193.54 0 45.13-12.87 83.28T601-429.7l256.52 257.09-74.65 74.09ZM375.48-413q69.91 0 118.45-48.54 48.55-48.55 48.55-118.46t-48.55-118.46Q445.39-747 375.48-747t-118.46 48.54Q208.48-649.91 208.48-580t48.54 118.46Q305.57-413 375.48-413Z"/></svg>
            </button>
        </form>
        <div class="intro-posts">
            <div class="posts-list">
            <?php
                if(
                    $_SERVER["REQUEST_METHOD"] == "POST" &&
                    isset($_POST["search"])
                ){
                    $search = $_POST["search"];
                    $content = get_request($STORAGE_URL);
                    $data = json_decode($content, true);
                    $names = array_column($data['items'], 'name');
                    $find = false;

                    foreach ($names as $name) {
                        if(strpos(strtolower($name), strtolower($search)) !== false){
                            print_md_tag_blog_style($name, $STORAGE_URL, $DB_URL);
                            $find = true;
                        }else{
                            if(!check_if_filename_exist($STORAGE_URL, $name)){
                                return;
                            }
                            $url = $STORAGE_URL . $name . '?alt=media';
                            $get_content = get_request($url);
                            if (strpos($get_content, "Error") !== false) {
                                echo "Error: File not found. search()<br>";
                                return;
                            }
                            if(strpos(strtolower($get_content), strtolower($search)) !== false){
                                print_md_tag_blog_style($name, $STORAGE_URL, $DB_URL);
                                $find = true;
                            }else{
                                $cname = str_replace(".md", "", $name);
                                $metatag = get_metatag_from_id($cname, "all", $DB_URL);
                                if(strpos(strtolower($metatag["tags"]), strtolower($search)) !== false){
                                    print_md_tag_blog_style($name, $STORAGE_URL, $DB_URL);
                                    $find = true;
                                }
                            }
                        }
                    }

                    if($find == false){
                        echo '<div>No results found.</div>';
                    }
                }

                if(isset($_POST["searched"])){
                    echo "
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('search').value = '".$_POST["search"]."';
                                document.getElementById('search').classList.remove('blog-search-input-hidden');
                                document.getElementById('searchBtn').classList.add('active-search');
                                document.getElementById('search').focus();
                            });
                        </script>
                    ";
                }
            ?>
            
            <?php if($_SERVER["REQUEST_METHOD"] == "GET") get_all_file_name(-1, $STORAGE_URL, $DB_URL); ?>
            </div>
            </div>
        </div>
    </div>

    <?php include 'php/component/footer.php'; ?>

    <script>
        document.querySelectorAll(".post").forEach(post => {
            post.addEventListener("click", () => {
                window.location.href = "./viewer?name=" + post.getAttribute("id");
            });
        });

        let userInput = "";
        document.addEventListener("DOMContentLoaded", function() {
            const search = document.getElementById("search");
            const searchBtn = document.getElementById("searchBtn");

            searchBtn.addEventListener("mouseenter", () => {
                search.style.width = "90%";
                if(search.classList.contains("blog-search-input-hidden")) search.classList.remove("blog-search-input-hidden")
                if(!searchBtn.classList.contains("active-search")) searchBtn.classList.add("active-search")
                if(userInput !== "") search.value = userInput;
            });
            document.addEventListener("click", (e) => {
                if(e.target !== search && e.target !== searchBtn){
                    search.style.width = "0";
                    if(!search.classList.contains("blog-search-input-hidden")) search.classList.add("blog-search-input-hidden")
                    if(searchBtn.classList.contains("active-search")) searchBtn.classList.remove("active-search")
                    userInput = search.value;
                    setTimeout(function() {
                        search.value = "";
                    }, 600); // time taken from the css transition
                }
            });
        });

        // document.addEventListener("DOMContentLoaded", toggleMobileView());
        window.addEventListener("resize", toggleMobileView());

        function toggleMobileView() {
            if(isPhone()) console.log("Mobile detected");
        }
    </script>
</body>
</html>
