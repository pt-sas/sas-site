<meta charset="UTF-8">
<title>Sahabat Abadi Sejahtera</title>
<meta name="description" content="The small framework with powerful features">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" type="image/png" href="/images/favicon.ico" />

<!-- Bootstrap -->
<script src="<?php echo base_url('js/jquery-1.12.0.min.js') ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" crossorigin="anonymous" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

<!-- STYLES -->
<style {csp-style-nonce}>
    html {
        scroll-behavior: smooth;
    }
    body {
        margin-top:4.125rem;
        font-family: 'Open Sans', sans-serif;
    }
    p {
        font-family: 'Montserrat', sans-serif;
    }
    a {
        color: inherit;
        text-decoration: none !important;
    }

    .navbar-collapse .navbar-nav .nav-item .nav-link {
        font-weight: bold;
        text-transform: uppercase;
        font-size:12px
    }
    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }
    .nav-scroller .nav {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        color: rgba(255, 255, 255, .75);
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    .nav-underline .nav-link {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: .875rem;
        color: var(--secondary);
    }
    .nav-underline .nav-link:hover {
        color: var(--blue);
    }
    .nav-underline .active {
        font-weight: 500;
        color: var(--gray-dark);
    }

    .featurette-heading {
        line-height: 2;
    }


    

    .section {
        padding-top:3rem;
        padding-bottom: 3rem;
    }
    .section-row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
        padding-top:3rem;
        padding-bottom: 3rem;
    }
    .section-heading {
        padding-bottom: 2rem;
    }
    .section-heading-center {
        text-align:center;
        padding-bottom: 2rem;
    }
    
    .jumbotron {
        margin-bottom: 0;
    }

    #contact input, #contact textarea, #contact .btn, #contact select {border-radius:0}

    footer {
        background-color: #2d3e50;
    }
    footer {
        background-color: #2d3e50;
    }
    .footer-heading {
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        color: #75808a;
        font-size: 14px;
        font-weight: bold;
    }
    footer a, footer p, footer small, footer .fa {
        color: #fff;
        text-decoration: aliceblue;
    }

    .whatsapp {
        position: fixed;
        left: 1rem;
        bottom: 1rem;
        border-radius: 1.5rem;
        width: 3rem;
        height: 3rem;
        text-align: center;
        color: #fff;
        background: #25D366;
        line-height: 60px;
    }
    .whatsapp:hover {
        color: white;
        background: #50e086;
    }
    .scroll-to-top {
        position: fixed;
        right: 1rem;
        bottom: 1rem;
        display: none;
        border-radius: 5px;
        width: 2.5rem;
        height: 2.5rem;
        text-align: center;
        color: #fff;
        background: #106eea;
        line-height: 36px;
    }
    .scroll-to-top:focus, .scroll-to-top:hover {
        color: white;
        background: #3284f1;
    }

    @media (max-width: 768px) {
        .column:last-child {
            margin-bottom: 0!important;
        }
        .offcanvas-collapse {
            position: fixed;
            top: 4.125rem; /* Height of navbar */
            bottom: 0;
            width: 100%;
            padding-right: 1rem;
            padding-left: 1rem;
            overflow-y: auto;
            background-color: var(--light);
            transition: -webkit-transform .3s ease-in-out;
            transition: transform .3s ease-in-out;
            transition: transform .3s ease-in-out, -webkit-transform .3s ease-in-out;
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
        }
        .offcanvas-collapse.open {
            -webkit-transform: translateX(-1rem);
            transform: translateX(-1rem); /* Account for horizontal padding on navbar */
        }
    }
</style>