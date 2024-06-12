<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="css/github-markdown-dark.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/viewer.css">
    <link rel="stylesheet" href="css/general.mobile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="For insightful articles on Web Dev & Cybersecurity, ma13w's offers expert advice, helpful tips, and engaging stories. Stay updated and inspired. Visit us today!"> 
</head>
<body >
   <?php include "php/component/general.php"; ?>
   <?php include 'php/component/navbar.php'; ?>
   
   <div class="container markdown-body mobile-viewer">
    <?php
        if(isset($_GET["name"])){
            $filename = $_GET["name"] . ".md";
            print_md_file_content($filename, $STORAGE_URL);
            $metatag = get_metatag_from_id($_GET["name"], "all", $DB_URL);

            if(!isset($_SESSION[$filename])) {
                $_SESSION[$filename] = round(microtime(true) * 1000);
                update_metatag_from_id($_GET["name"], "views", $DB_URL, 1, $STORAGE_URL);
            }else{
                $data = round(microtime(true) * 1000);
                $hours = 3;
                if($data - $_SESSION[$filename] > $hours * 60 * 60 * 1000){;
                    $_SESSION[$filename] = $data;
                }
            }
        }else{
            echo 'Redirecting to the blog...';
            echo '<div>If nothing happens, click <a href="./blog">here</a></div>';
            echo '<script>window.location.href = "./blog"</script>';
            exit();
        }
    ?>
   </div>

    <?php include 'php/component/footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const newAuthor = document.createElement('div');
            newAuthor.className = 'blog-author';
            newAuthor.textContent = 'Created by <?php echo $metatag["autohor"] ?>';

            const heading = document.querySelector('h1');
            const nextSibling = heading.nextElementSibling;
            if (nextSibling) heading.parentNode.insertBefore(newAuthor, nextSibling); 
            else heading.parentNode.appendChild(newAuthor);
        });

        document.addEventListener("DOMContentLoaded", function() {
            const newDate = document.createElement('div');
            newDate.className = 'blog-date';
            newDate.textContent = '<?php echo $metatag["date"] ?>';

            const blogAuthor = document.querySelector('.blog-author');
            const nextSibling = blogAuthor.nextElementSibling;
            if (nextSibling) blogAuthor.parentNode.insertBefore(newDate, nextSibling); 
            else blogAuthor.parentNode.appendChild(newDate);
        });


        document.addEventListener("DOMContentLoaded", function() {
            const tags_str = "<?php echo $metatag["tags"] ?>";
            const tags = tags_str.split(",").map(item => item.trim());

            const tagList = document.createElement('div');
            tagList.className = 'blog-tags';

            tags.forEach(tag => {
                const newTag = document.createElement('div');
                newTag.className = 'blog-tag';
                newTag.textContent = tag;
                tagList.appendChild(newTag);
            });

            const blogDate = document.querySelector('.blog-date');
            const nextSibling = blogDate.nextElementSibling;
            if (nextSibling) blogDate.parentNode.insertBefore(tagList, nextSibling); 
            else blogDate.parentNode.appendChild(tagList);
        });

        document.addEventListener("DOMContentLoaded", function() {
            const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6');
            headings.forEach(heading => {
                heading.id = heading.textContent.toLowerCase();
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const headings = document.querySelectorAll('h2, h3');
            const menu = document.createElement('div');
            menu.classList.add('blog-menu');
            headings.forEach(heading => {
                const newHeading = document.createElement('a');
                newHeading.textContent = heading.innerText;
                newHeading.setAttribute("href", "#" + heading.textContent.toLowerCase());
                if(heading.tagName === 'H2') newHeading.className = 'blog-menu-h2';
                else newHeading.className = 'blog-menu-h3';
                menu.appendChild(newHeading);
            });
            document.querySelector('.markdown-body').appendChild(menu);
        });

        document.addEventListener('scroll', function() {
            const offset = 200;
            const topSideElement = document.querySelector('h1');
            const menu = document.querySelector('.blog-menu');

            if (window.scrollY >= topSideElement.offsetHeight + offset) {
                menu.classList.add('blog-menu-ontop');
            } else {
                menu.classList.remove('blog-menu-ontop');
            }
        });
    </script>
</body>
</html>