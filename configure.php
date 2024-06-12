<?php

/*
- SETUP FIREBASE
    create a simple project in firebase
    create a realtime database with the following rules
    create a storage with the following rules
    
- SETUP FIREBASE STORAGE RULES
    rules_version = '2';

    service firebase.storage {
        match /b/{bucket}/o {
            match /{allPaths=**} {
                allow read: if true;
                allow write: if false;
            }
        }
    }
    
- SETUP FIREBASE REALTIME DATABASE RULES
    {
        "rules": {
            ".read": true,
            ".write": true
        }
    }

- HOW FIREBASE WILL BE USED
    Firebase will be used by the app to store blog posts and related data.
    The Realtime Database will store the metadata of the blog posts. The admin panel is available for updating this metadata.
    The storage will hold the content of the blog posts, specifically the file named "name.md.". There is a section in the Firebase console for uploading this file. 
    The views will be calculated automatically by the app and stored in the Realtime Database.
    There is also a stats section in the Realtime Database that tracks the total views of the blog and the website. Additionally, it logs all website activity, including which pages have been visited and when.
*/

// Blog upload settings (if it doesn't work, try changing the entire URL)
$FIREBASE_PROJECT_ID = "redacted"; // change this with your firebase project id
$DB_URL = "https://".$FIREBASE_PROJECT_ID."-default-rtdb.europe-west1.firebasedatabase.app/blog/";
$STORAGE_URL = "https://firebasestorage.googleapis.com/v0/b/".$FIREBASE_PROJECT_ID.".appspot.com/o/";
$CONSOLE_URL = "https://console.firebase.google.com/u/0/project/".$FIREBASE_PROJECT_ID."/storage/".$FIREBASE_PROJECT_ID.".appspot.com/files";

// Admin login settings
$SECRET_CODE = '123456';
$TIME_LIMIT = 60; // if the password is wrong, after five attempts, the user will be blocked for 60 seconds
$ATTEMPT_LIMIT = 5;

// Homepage settings
$HOMEPAGE_POSTS = 5;
$NICKNAME = "ma13w";
$YOUR_JOB = "Web Dev & Cybersecurity";
$IMG_NAME = "ma13w.webp"; // put the image into /assets folder

// Add only the url of your social media
// If you don't have a social media, leave the field empty
$GITHUB_URL = "https://github.com/ma13w";
$LINKEDIN_URL = "https://www.linkedin.com/in/matteo-cali";
$INSTAGRAM_URL = "https://www.instagram.com/__teuz/";
$YOUTUBE_URL = "";
$TELEGRAM_URL = "";
$EMAIL_URL = "";
$PHONE_NUMBER_URL = "";
$X_URL = "";
$FACEBOOK_URL = "";
$SNAPCHAT_URL = "";
$REDDIT_URL = "";

// About settings
$ABOUT_TEXT = "Hi, I'm Matteo, now I'm studying computer science in Milan. I am currently pursuing my passion for web development and on cybersecurity. My passion for programming has led me to explore the world of frontend and backend web development.";

// 404 settings 
// If you want to customize the 404 page, edit manually the 404.php file
$ERROR_TEXT = "ERROR 404 <br> <a href='./'>HOMEPAGE</a>";

/* 

For editing the color palette of the website, go to "/css/general.css" and modify the colors in the root section, here is an example:
:root{
    --black-color: #121212;
    --white-color: rgba(255, 255, 255, 0.87);
    --purple-color: #bb86fc;
    --gray-color: rgba(255, 255, 255, 0.38);
}

*/

?>