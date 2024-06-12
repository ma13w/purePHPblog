<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/general.mobile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="For insightful articles on Web Dev & Cybersecurity, ma13w's offers expert advice, helpful tips, and engaging stories. Stay updated and inspired. Visit us today!"> 
</head>
<body >
   <?php include "php/component/general.php"; ?>
   <?php include 'php/component/navbar.php'; ?>

    <div class="container mobile-blog">
        <div class="container-introduction">
            <div class="intro-header">
                <div class="intro-img">
                    <img src="assets/<?php echo $IMG_NAME?>" alt="My personal photo when I program">
                </div>
                </div>
                <h1><?php echo $NICKNAME?></h1>
            </div>
            <div class="intro-description">
                <!--<h3>I am into </h3>-->
                <!-- TODO: Decide which h3 to use -->
                <h3><?php echo $YOUR_JOB?></h3>
                <div class="social-icons">
                    <?php 
                    if($GITHUB_URL != "") echo '<a href="'.$GITHUB_URL.'" aria-label="My public profile on github"  target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" alt="The Github white logo">
                            <g clip-path="url(#clip0_4_106)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9642 0C5.34833 0 0 5.38776 0 12.0531C0 17.3811 3.42686 21.8912 8.18082 23.4874C8.77518 23.6074 8.9929 23.2281 8.9929 22.909C8.9929 22.6296 8.97331 21.6718 8.97331 20.6738C5.64514 21.3923 4.95208 19.237 4.95208 19.237C4.41722 17.8401 3.62473 17.4811 3.62473 17.4811C2.53543 16.7427 3.70408 16.7427 3.70408 16.7427C4.91241 16.8225 5.54645 17.9799 5.54645 17.9799C6.61592 19.8157 8.33927 19.297 9.03257 18.9776C9.13151 18.1993 9.44865 17.6606 9.78539 17.3613C7.13094 17.0819 4.33812 16.0442 4.33812 11.4144C4.33812 10.0974 4.81322 9.01984 5.56604 8.1818C5.44727 7.88253 5.03118 6.64506 5.68506 4.98882C5.68506 4.98882 6.69527 4.66947 8.97306 6.22604C9.94827 5.9622 10.954 5.82799 11.9642 5.82686C12.9744 5.82686 14.0042 5.96669 14.9552 6.22604C17.2332 4.66947 18.2434 4.98882 18.2434 4.98882C18.8973 6.64506 18.481 7.88253 18.3622 8.1818C19.1349 9.01984 19.5904 10.0974 19.5904 11.4144C19.5904 16.0442 16.7976 17.0618 14.1233 17.3613C14.5592 17.7404 14.9353 18.4587 14.9353 19.5962C14.9353 21.2126 14.9158 22.5098 14.9158 22.9087C14.9158 23.2281 15.1337 23.6074 15.7278 23.4877C20.4818 21.8909 23.9087 17.3811 23.9087 12.0531C23.9282 5.38776 18.5603 0 11.9642 0Z"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_4_106">
                            <rect width="24" height="23.5102" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </a>
                    ';

                    if($LINKEDIN_URL != "") echo '<a href="'.$LINKEDIN_URL.'" target="_blank" aria-label="My public profile on linkedin">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" alt="The Linkedin white logo">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                    ';

                    if($INSTAGRAM_URL != "") echo '<a href="'.$INSTAGRAM_URL.'" target="_blank" aria-label="My public profile on instagram"><?xml version="1.0" ?><!DOCTYPE svg  PUBLIC "-//W3C//DTD SVG 1.1//EN"  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-193.446,81c-47.527,0 -53.487,0.201 -72.152,1.053c-18.627,0.85 -31.348,3.808 -42.48,8.135c-11.508,4.472 -21.267,10.456 -30.996,20.184c-9.729,9.729 -15.713,19.489 -20.185,30.996c-4.326,11.132 -7.284,23.853 -8.135,42.48c-0.851,18.665 -1.052,24.625 -1.052,72.152c0,47.527 0.201,53.487 1.052,72.152c0.851,18.627 3.809,31.348 8.135,42.48c4.472,11.507 10.456,21.267 20.185,30.996c9.729,9.729 19.488,15.713 30.996,20.185c11.132,4.326 23.853,7.284 42.48,8.134c18.665,0.852 24.625,1.053 72.152,1.053c47.527,0 53.487,-0.201 72.152,-1.053c18.627,-0.85 31.348,-3.808 42.48,-8.134c11.507,-4.472 21.267,-10.456 30.996,-20.185c9.729,-9.729 15.713,-19.489 20.185,-30.996c4.326,-11.132 7.284,-23.853 8.134,-42.48c0.852,-18.665 1.053,-24.625 1.053,-72.152c0,-47.527 -0.201,-53.487 -1.053,-72.152c-0.85,-18.627 -3.808,-31.348 -8.134,-42.48c-4.472,-11.507 -10.456,-21.267 -20.185,-30.996c-9.729,-9.728 -19.489,-15.712 -30.996,-20.184c-11.132,-4.327 -23.853,-7.285 -42.48,-8.135c-18.665,-0.852 -24.625,-1.053 -72.152,-1.053Zm0,31.532c46.727,0 52.262,0.178 70.715,1.02c17.062,0.779 26.328,3.63 32.495,6.025c8.169,3.175 13.998,6.968 20.122,13.091c6.124,6.124 9.916,11.954 13.091,20.122c2.396,6.167 5.247,15.433 6.025,32.495c0.842,18.453 1.021,23.988 1.021,70.715c0,46.727 -0.179,52.262 -1.021,70.715c-0.778,17.062 -3.629,26.328 -6.025,32.495c-3.175,8.169 -6.967,13.998 -13.091,20.122c-6.124,6.124 -11.953,9.916 -20.122,13.091c-6.167,2.396 -15.433,5.247 -32.495,6.025c-18.45,0.842 -23.985,1.021 -70.715,1.021c-46.73,0 -52.264,-0.179 -70.715,-1.021c-17.062,-0.778 -26.328,-3.629 -32.495,-6.025c-8.169,-3.175 -13.998,-6.967 -20.122,-13.091c-6.124,-6.124 -9.917,-11.953 -13.091,-20.122c-2.396,-6.167 -5.247,-15.433 -6.026,-32.495c-0.842,-18.453 -1.02,-23.988 -1.02,-70.715c0,-46.727 0.178,-52.262 1.02,-70.715c0.779,-17.062 3.63,-26.328 6.026,-32.495c3.174,-8.168 6.967,-13.998 13.091,-20.122c6.124,-6.123 11.953,-9.916 20.122,-13.091c6.167,-2.395 15.433,-5.246 32.495,-6.025c18.453,-0.842 23.988,-1.02 70.715,-1.02Zm0,53.603c-49.631,0 -89.865,40.234 -89.865,89.865c0,49.631 40.234,89.865 89.865,89.865c49.631,0 89.865,-40.234 89.865,-89.865c0,-49.631 -40.234,-89.865 -89.865,-89.865Zm0,148.198c-32.217,0 -58.333,-26.116 -58.333,-58.333c0,-32.217 26.116,-58.333 58.333,-58.333c32.217,0 58.333,26.116 58.333,58.333c0,32.217 -26.116,58.333 -58.333,58.333Zm114.416,-151.748c0,11.598 -9.403,20.999 -21.001,20.999c-11.597,0 -20.999,-9.401 -20.999,-20.999c0,-11.598 9.402,-21 20.999,-21c11.598,0 21.001,9.402 21.001,21Z"/></svg>
                    </a>';

                    if($YOUTUBE_URL != "") echo '<a href="'.$YOUTUBE_URL.'" target="_blank" aria-label="My public profile on youtube"><?xml version="1.0" ?><!DOCTYPE svg  PUBLIC "-//W3C//DTD SVG 1.1//EN"  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M501.303,132.765c-5.887,-22.03 -23.235,-39.377 -45.265,-45.265c-39.932,-10.7 -200.038,-10.7 -200.038,-10.7c0,0 -160.107,0 -200.039,10.7c-22.026,5.888 -39.377,23.235 -45.264,45.265c-10.697,39.928 -10.697,123.238 -10.697,123.238c0,0 0,83.308 10.697,123.232c5.887,22.03 23.238,39.382 45.264,45.269c39.932,10.696 200.039,10.696 200.039,10.696c0,0 160.106,0 200.038,-10.696c22.03,-5.887 39.378,-23.239 45.265,-45.269c10.696,-39.924 10.696,-123.232 10.696,-123.232c0,0 0,-83.31 -10.696,-123.238Zm-296.506,200.039l0,-153.603l133.019,76.802l-133.019,76.801Z" style="fill-rule:nonzero;"/>
                        </svg>
                    </a>';

                    if($TELEGRAM_URL != "") echo '<a href="'.$TELEGRAM_URL.'" target="_blank" aria-label="My public profile on telegram">
                        <?xml version="1.0" ?><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="telegram social media network chat" id="telegram_social_media_network_chat"><path d="M28.59,4.29a2.23,2.23,0,0,0-2.27-.36L3.41,13.1a1.83,1.83,0,0,0,0,3.38l1.48.61a1,1,0,0,0,1.31-.53,1,1,0,0,0-.54-1.31L4.56,14.8l22.51-9a.22.22,0,0,1,.23,0,.24.24,0,0,1,.08.23L23.27,25.21a.4.4,0,0,1-.26.3.39.39,0,0,1-.39-.06l-8-6.24,7.83-7.91a1,1,0,0,0-1.22-1.56L9.75,16.54a1,1,0,1,0,1,1.72l4.83-2.85L13.23,17.8a2,2,0,0,0,.2,3.08l8,6.15a2.4,2.4,0,0,0,1.47.5,2.47,2.47,0,0,0,.83-.15,2.37,2.37,0,0,0,1.52-1.75L29.33,6.47A2.23,2.23,0,0,0,28.59,4.29Z"/></g></svg></a>';
                    
                    if($EMAIL_URL != "") echo '<a href="'.$EMAIL_URL.'" target="_blank" aria-label="My public profile on email"><?xml version="1.0" ?>
                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="mail email e-mail letter" id="mail_email_e-mail_letter"><path d="M28,13a1,1,0,0,0-1,1v8a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V14a1,1,0,0,0-2,0v8a3,3,0,0,0,.88,2.12A3,3,0,0,0,6,25H26a3,3,0,0,0,2.12-.88A3,3,0,0,0,29,22V14A1,1,0,0,0,28,13Z"/><path d="M15.4,18.8a1,1,0,0,0,1.2,0L28.41,9.94a1,1,0,0,0,.3-1.23,3.06,3.06,0,0,0-.59-.83A3,3,0,0,0,26,7H6a3,3,0,0,0-2.12.88,3.06,3.06,0,0,0-.59.83,1,1,0,0,0,.3,1.23ZM6,9H26a.9.9,0,0,1,.28,0L16,16.75,5.72,9A.9.9,0,0,1,6,9Z"/></g>
                    </svg></a>';   
                    
                    if($PHONE_NUMBER_URL != "") echo '<a href="'.$PHONE_NUMBER_URL.'" target="_blank" aria-label="My public profile on whatsapp">
                        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC "-//W3C//DTD SVG 1.1//EN"  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M373.295,307.064c-6.37,-3.188 -37.687,-18.596 -43.526,-20.724c-5.838,-2.126 -10.084,-3.187 -14.331,3.188c-4.246,6.376 -16.454,20.725 -20.17,24.976c-3.715,4.251 -7.431,4.785 -13.8,1.594c-6.37,-3.187 -26.895,-9.913 -51.225,-31.616c-18.935,-16.89 -31.72,-37.749 -35.435,-44.126c-3.716,-6.377 -0.397,-9.824 2.792,-13c2.867,-2.854 6.371,-7.44 9.555,-11.16c3.186,-3.718 4.247,-6.377 6.37,-10.626c2.123,-4.252 1.062,-7.971 -0.532,-11.159c-1.591,-3.188 -14.33,-34.542 -19.638,-47.298c-5.171,-12.419 -10.422,-10.737 -14.332,-10.934c-3.711,-0.184 -7.963,-0.223 -12.208,-0.223c-4.246,0 -11.148,1.594 -16.987,7.969c-5.838,6.377 -22.293,21.789 -22.293,53.14c0,31.355 22.824,61.642 26.009,65.894c3.185,4.252 44.916,68.59 108.816,96.181c15.196,6.564 27.062,10.483 36.312,13.418c15.259,4.849 29.145,4.165 40.121,2.524c12.238,-1.827 37.686,-15.408 42.995,-30.286c5.307,-14.882 5.307,-27.635 3.715,-30.292c-1.592,-2.657 -5.838,-4.251 -12.208,-7.44m-116.224,158.693l-0.086,0c-38.022,-0.015 -75.313,-10.23 -107.845,-29.535l-7.738,-4.592l-80.194,21.037l21.405,-78.19l-5.037,-8.017c-21.211,-33.735 -32.414,-72.726 -32.397,-112.763c0.047,-116.825 95.1,-211.87 211.976,-211.87c56.595,0.019 109.795,22.088 149.801,62.139c40.005,40.05 62.023,93.286 62.001,149.902c-0.048,116.834 -95.1,211.889 -211.886,211.889m180.332,-392.224c-48.131,-48.186 -112.138,-74.735 -180.335,-74.763c-140.514,0 -254.875,114.354 -254.932,254.911c-0.018,44.932 11.72,88.786 34.03,127.448l-36.166,132.102l135.141,-35.45c37.236,20.31 79.159,31.015 121.826,31.029l0.105,0c140.499,0 254.87,-114.366 254.928,-254.925c0.026,-68.117 -26.467,-132.166 -74.597,-180.352" id="WhatsApp-Logo"/>
                    </svg></a>';
                    
                    if($X_URL != "") echo '<a href="'.$X_URL.'" target="_blank" aria-label="My public profile on x">
                        <?xml version="1.0" ?><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" width="24px" height="24px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve"><path d="M14.095479,10.316482L22.286354,1h-1.940718l-7.115352,8.087682L7.551414,1H1l8.589488,12.231093L1,23h1.940717  l7.509372-8.542861L16.448587,23H23L14.095479,10.316482z M11.436522,13.338465l-0.871624-1.218704l-6.924311-9.68815h2.981339  l5.58978,7.82155l0.867949,1.218704l7.26506,10.166271h-2.981339L11.436522,13.338465z"/></svg>
                    </a>';
                    
                    if($FACEBOOK_URL != "") echo '<a href="'.$FACEBOOK_URL.'" target="_blank" aria-label="My public profile on facebok">
                        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC "-//W3C//DTD SVG 1.1//EN"  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z"/></svg>
                    </a>';

                    if($SNAPCHAT_URL != "") echo '<a href="'.$SNAPCHAT_URL.'" target="_blank" aria-label="My public profile on snapchat"><?xml version="1.0" ?><!DOCTYPE svg  PUBLIC "-//W3C//DTD SVG 1.1//EN"  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-88.659,240.361l-0.008,0c-6.736,-0.257 -9.718,-3.13 -10.09,-3.508c0.173,-3.184 0.381,-6.509 0.596,-9.93l0.065,-1.068c1.551,-24.565 3.474,-55.137 -4.305,-72.583c-23.324,-52.294 -72.863,-56.363 -87.492,-56.363l-0.864,0.004c0,0 -6.024,0.064 -6.398,0.064c-14.595,0 -64.028,4.061 -87.339,56.327c-7.778,17.436 -5.859,47.983 -4.31,72.567c0.24,3.793 0.475,7.467 0.663,10.986c-0.396,0.41 -3.639,3.532 -11.07,3.532c-5.378,0 -11.61,-1.64 -18.525,-4.88c-1.189,-0.556 -2.603,-0.84 -4.207,-0.84c-5.856,0 -13.096,3.775 -14.127,9.193c-0.603,3.18 0.677,9.417 16.049,15.495c1.409,0.556 3.196,1.12 5.08,1.716c7.705,2.444 19.344,6.141 22.911,14.55c1.948,4.589 1.325,10.188 -1.857,16.637c-0.03,0.062 -0.058,0.122 -0.084,0.184c-0.969,2.257 -24.286,55.403 -76.284,63.966c-1.919,0.313 -3.295,2.029 -3.185,3.97c0.041,0.718 0.214,1.441 0.521,2.164c2.158,5.055 11.839,12.18 45.665,17.403c2.903,0.447 3.975,4.705 5.487,11.629c0.587,2.692 1.197,5.474 2.039,8.345c0.97,3.315 3.203,3.76 5.264,3.76c1.971,0 4.566,-0.506 7.574,-1.094c4.948,-0.968 11.727,-2.294 20.32,-2.294c4.771,0 9.707,0.417 14.666,1.237c10.162,1.692 18.787,7.79 27.928,14.247c13.236,9.36 26.925,19.037 48.252,19.037c0.608,0 1.215,-0.027 1.797,-0.071l0.002,0c0.912,0.043 1.823,0.071 2.751,0.071c21.333,0 35.019,-9.677 48.283,-19.056c9.123,-6.45 17.742,-12.536 27.894,-14.228c4.961,-0.82 9.9,-1.237 14.672,-1.237c8.172,0 14.595,1.032 20.324,2.152c3.23,0.634 5.778,0.955 7.572,0.955l0.421,0c2.583,0 4.119,-1.153 4.839,-3.617c0.836,-2.839 1.443,-5.539 2.043,-8.288c1.65,-7.554 2.721,-11.156 5.485,-11.58c33.838,-5.229 43.511,-12.345 45.657,-17.363c0.312,-0.714 0.489,-1.448 0.532,-2.176c0.105,-1.945 -1.266,-3.656 -3.187,-3.974c-52.02,-8.572 -75.319,-61.703 -76.285,-63.958c-0.025,-0.066 -0.057,-0.126 -0.087,-0.188c-3.181,-6.453 -3.805,-12.048 -1.855,-16.635c3.565,-8.407 15.201,-12.1 22.912,-14.548c1.893,-0.599 3.68,-1.167 5.077,-1.716c13.489,-5.329 16.238,-10.744 16.171,-14.345c-0.073,-3.826 -3.494,-7.487 -8.718,-9.337l-0.111,-0.046c-1.839,-0.767 -4.055,-1.189 -6.24,-1.189c-1.43,0 -3.532,0.185 -5.424,1.069c-6.457,3.024 -12.341,4.656 -17.46,4.852Z"/>
                    </svg></a>';
                    
                    if($REDDIT_URL != "") echo '<a href="'.$REDDIT_URL.'" target="_blank" aria-label="My public profile on reddit">
                        <?xml version="1.0" ?><svg height="56.6934px" id="Layer_1" style="enable-background:new 0 0 56.6934 56.6934;" version="1.1" viewBox="0 0 56.6934 56.6934" width="56.6934px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M28.3467,4.0423c-13.6144,0-24.6511,11.0366-24.6511,24.6511s11.0367,24.6511,24.6511,24.6511    c13.6145,0,24.6511-11.0366,24.6511-24.6511S41.9612,4.0423,28.3467,4.0423z M42.8709,31.8262    c0.0613,0.3643,0.0958,0.7339,0.0958,1.1089c0,5.4205-6.5707,9.8308-14.6479,9.8308c-8.0773,0-14.6479-4.4103-14.6479-9.8308    c0-0.3862,0.037-0.7666,0.1019-1.1414c-1.0677-0.6891-1.7271-1.8701-1.7271-3.1509c0-2.0707,1.6848-3.7554,3.7554-3.7554    c0.9107,0,1.7702,0.3252,2.4523,0.9155c2.4941-1.5862,5.8183-2.5818,9.4824-2.6794l2.6357-9.0018l6.6173,1.2294    c0,0,0.0012,0.0007,0.002,0.0009c0.3861-0.6873,1.1003-1.1713,1.9441-1.2142c1.3068-0.0668,2.4241,0.9421,2.4908,2.249    c0.0667,1.3068-0.9422,2.4242-2.2491,2.4908s-2.4242-0.9423-2.4909-2.2491c-0.0023-0.0449,0.0064-0.0876,0.0067-0.1322    l-5.4913-1.0204l-2.2365,7.6498c3.6552,0.1079,6.9689,1.1093,9.4523,2.6984c0.6858-0.6033,1.5543-0.9365,2.4755-0.9365    c2.0707,0,3.7554,1.6847,3.7554,3.7554C44.6477,29.9438,43.968,31.1424,42.8709,31.8262z"/></g></g><g><path d="M32.9098,36.6217c-0.0142,0.0135-1.4175,1.3959-4.618,1.3959c-3.1459,0-4.4017-1.3351-4.4355-1.3719   c-0.2126-0.2439-0.5819-0.2709-0.8283-0.0609c-0.2476,0.2114-0.2765,0.5845-0.0645,0.832c0.062,0.0725,1.5667,1.7805,5.3282,1.7805   c3.7424,0,5.3983-1.6847,5.4672-1.7566c0.2236-0.2341,0.215-0.6028-0.0166-0.8289C33.5094,36.3852,33.1365,36.3907,32.9098,36.6217   z"/></g><g><circle cx="33.2996" cy="31.1989" r="2.3076"/></g><g><circle cx="23.6654" cy="31.1989" r="2.3076"/></g></svg>
                    </a>';

                    ?>
                </div>
            </div>

            <div class="intro-posts">
                <h2>Recent Posts</h2>
                <div class="posts-list">
                    <?php get_all_file_name(5, $STORAGE_URL, $DB_URL); ?>
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

        // animation -> is not entirely beautiful
        // document.addEventListener("DOMContentLoaded", function() {
        //     const h1 = document.querySelector(".container-introduction h1");
        //     h1.addEventListener("mouseenter", () => {
        //         h1.style.letterSpacing = Math.floor(Math.random() * (35 - 15 + 1)) + 10 + "px";
        //     });
        //     h1.addEventListener("mouseleave", () => {
        //         h1.style.letterSpacing = "0px";
        //     });

        //     const h3Element = document.querySelector(".intro-description h3");
        //     const newH3 = document.createElement("h3");

        //     h3Element.innerText.split('').forEach((char) => {
        //         const span = document.createElement("span");
        //         span.innerText = char;
        //         span.style.transition = "margin 0.3s";
        //         span.addEventListener("mouseenter", () => {
        //             span.style.margin = "5px";
        //         });
        //         span.addEventListener("mouseleave", () => {
        //             span.style.margin = "0px";
        //         });
        //         newH3.appendChild(span);
        //     });

        //     h3Element.innerHTML = '';
        //     h3Element.appendChild(newH3);
        //     console.log(document.querySelector(".intro-description h3").innerHTML);
        // });

        document.addEventListener("DOMContentLoaded", function() {
            const h1 = document.querySelector(".container-introduction h1");
            h1.addEventListener("mouseenter", () => {
                h1.classList.add("outer-glow");
            });
            h1.addEventListener("mouseleave", () => {
                h1.classList.remove("outer-glow");
            });
        })

        const text = ["Web Developer", "Cybersecuirity enthusiast"];
        const textElement = document.querySelector(".intro-description h3");
        const typingSpeed = 100;
        const erasingSpeed = 50; 
        const pauseDuration = 1000; 

        let index = 0;
        let currentText = 0;
        let isTyping = true;

        const loopAnimation = () => {
            if (isTyping) {
                if (index < text[currentText%text.length].length) {
                    textElement.textContent += text[currentText%text.length][index];
                    index++;
                    setTimeout(loopAnimation, typingSpeed)
                } else {
                    setTimeout(() => {
                        isTyping = false;
                        loopAnimation();
                    }, pauseDuration);
                }
            } else {
                if (index > 0) {
                    textElement.textContent = textElement.textContent.slice(0, -1);
                    index--;
                    setTimeout(loopAnimation, erasingSpeed);
                } else {
                    setTimeout(() => {
                        isTyping = true;
                        currentText++;
                        loopAnimation();
                    }, pauseDuration);
                }
            }
        };

        //loopAnimation(); 
    </script>
    </script>
</body>
</html>