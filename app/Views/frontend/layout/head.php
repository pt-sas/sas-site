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
    
    .nav-item {
        margin-left:1rem;
    }
    
    .jumbotron {
        margin-bottom: 0;
    }

    #contact input, #contact textarea, #contact .btn, #contact select {border-radius:0}

    footer a, footer p, footer small, footer .fa {color: #777;}

    .scroll-to-top {
        position: fixed;
        right: 1rem;
        bottom: 1rem;
        display: none;
        width: 2.75rem;
        height: 2.75rem;
        text-align: center;
        color: #fff;
        background: #106eea;
        line-height: 46px;
    }
    .scroll-to-top:focus, .scroll-to-top:hover {
        color: white;
    }
    .scroll-to-top:hover {
        background: #3284f1;
    }
    

    @media (max-width: 767px) {
        .navbar-collapse {
            position: fixed;
            top: 4.125rem;
            left: 0;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 15px;
            width: 75%;
            height: 100%;
            background: #bccbcc;
        }

        .navbar-collapse.collapsing {
            left: -75%;
            transition: height 0s ease;
        }

        .navbar-collapse.show {
            left: 0;
            transition: left 300ms ease-in-out;
        }

        .navbar-toggler.collapsed ~ .navbar-collapse {
            transition: left 500ms ease-in-out;
        }
    
        .nav-item {
            margin-left:0;
        }
    }
</style>