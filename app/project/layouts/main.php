<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>design blog - free css template</title>
    <meta name="keywords" content="free css templates, blog design, 2-column, web design, CSS, HTML" />
    <meta name="description" content="Design Blog - free css template, 2-column blog layout" />
    <link href="<?php echo "/app/project/src/css/templatemo_style.css"; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo "/app/project/src/css/forms.css"; ?>" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="templatemo_body_wrapper">
    <div id="templatemo_wrapper">

        <div id="templatemo_header">

            <div id="site_title">
                <a href="http://www.templatemo.com/page/1" target="_parent">Design
                    <span>Blog</span>
                </a>
            </div> <!-- end of site_title -->
            <div class="cleaner"></div>

        </div> <!-- end of header -->

        <div id="templatemo_menu">
            <ul>
                <li><a href="#" class="current"><span></span>Головна</a></li>
                <li><a href="#"><span></span>Власні статті</a></li>
            </ul>

            <div id="register_box">
                Already Registered? Click <a href="/registration" class="new_reg">Register</a>
            </div>
        </div> <!-- end of templatemo_menu -->
        <div id="templatemo_main">
            <div id="templatemo_content">

                <div id="content">
                    <?= $content ?>
                </div>
            </div>
            <div class="cleaner"></div>
        </div>
    </div>
    <div class="cleaner"></div>
</div>
<div id="templatemo_copyright">
    Copyright © 2048 <a href="#">Your Company Name</a> |
    <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
</div>
</body>
</html>