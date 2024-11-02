<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nishat">
    <meta name="keywords" content="Admin Dashboard Nishat">
    <meta name="author" content="pixelstrap">
    <link rel="shortcut icon" href="./assets/images/favicon-my.png" type="image/x-icon">
    <title>Abu Hammad Portfolio Dashboard</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/date-range-picker/flatpickr.min.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link id="color" rel="stylesheet" href="./assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/responsive.css">
</head>

<body>
    <div class="loader-wrapper">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner-1"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-header row">
            <div class="header-logo-wrapper col-auto">
                <div class="logo-wrapper"><a href="index.php"><img class="img-fluid for-light"
                            src="assets/images/logo/logo.png" alt="" /><img class="img-fluid for-dark"
                            src="assets/images/logo/logo_light.png" alt="" /></a></div>
            </div>
            <div class="col-4 col-xl-4 page-title">
                <h4 class="f-w-700">Default dashboard</h4>
                <nav>
                    <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                        <li class="breadcrumb-item"><a href="index.php"> <i data-feather="home"> </i></a></li>
                        <li class="breadcrumb-item f-w-400">Dashboard</li>
                        <li class="breadcrumb-item f-w-400 active">Default</li>
                    </ol>
                </nav>
            </div>
            <!-- Page Header Start-->
            <div class="header-wrapper col m-0">
                <div class="row">
                    <form class="form-inline search-full col" action="#" method="get">
                        <div class="form-group w-100">
                            <div class="Typeahead Typeahead--twitterUsers">
                                <div class="u-posRelative">
                                    <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                        placeholder="Search Mofi .." name="q" title="" autofocus>
                                    <div class="spinner-border Typeahead-spinner" role="status"><span
                                            class="sr-only">Loading...</span>
                                    </div><i class="close-search" data-feather="x"></i>
                                </div>
                                <div class="Typeahead-menu"></div>
                            </div>
                        </div>
                    </form>
                    <div class="header-logo-wrapper col-auto p-0">
                        <div class="logo-wrapper"><a href="index.php"><img class="img-fluid"
                                    src="assets/images/logo/logo.png" alt=""></a></div>
                        <div class="toggle-sidebar">
                            <svg class="stroke-icon sidebar-toggle status_toggle middle">
                                <use href="assets/svg/icon-sprite.svg#toggle-icon"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="nav-right col-xxl-8 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                        <ul class="nav-menus">
                            <li> <span class="header-search">
                                    <svg>
                                        <use href="assets/svg/icon-sprite.svg#search"></use>
                                    </svg></span></li>
                            <li>
                                <div class="form-group w-100">
                                    <div class="Typeahead Typeahead--twitterUsers">
                                        <div class="u-posRelative d-flex align-items-center">
                                            <svg class="search-bg svg-color">
                                                <use href="assets/svg/icon-sprite.svg#search"></use>
                                            </svg>
                                            <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100"
                                                type="text" placeholder="Search Mofi .." name="q" title="">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="fullscreen-body"> <span>
                                    <svg id="maximize-screen">
                                        <use href="assets/svg/icon-sprite.svg#full-screen"></use>
                                    </svg></span></li>
                            <li class="onhover-dropdown">
                                <div class="notification-box">
                                    <svg>
                                        <use href="assets/svg/icon-sprite.svg#notification"></use>
                                    </svg><span class="badge rounded-pill badge-primary">4 </span>
                                </div>
                                <div class="onhover-show-div notification-dropdown">
                                    <h5 class="f-18 f-w-600 mb-0 dropdown-title">Notifications </h5>
                                    <ul class="notification-box">
                                        <li class="toast default-show-toast align-items-center border-0 fade show"
                                            aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                            <div class="d-flex justify-content-between">
                                                <div class="toast-body d-flex p-0">
                                                    <div class="flex-shrink-0 bg-light-primary"><img class="w-auto"
                                                            src="assets/images/dashboard/icon/wallet.png" alt="Wallet">
                                                    </div>
                                                    <div class="flex-grow-1"> <a href="private-chat.php">
                                                            <h6 class="m-0">Daily offer added</h6>
                                                        </a>
                                                        <p class="m-0">User-only offer added</p>
                                                    </div>
                                                </div>
                                                <button class="btn-close btn-close-white shadow-none" type="button"
                                                    data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                        </li>
                                        <li class="toast default-show-toast align-items-center border-0 fade show"
                                            aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                            <div class="d-flex justify-content-between">
                                                <div class="toast-body d-flex p-0">
                                                    <div class="flex-shrink-0 bg-light-info"><img class="w-auto"
                                                            src="assets/images/dashboard/icon/shield-dne.png"
                                                            alt="Shield-dne"></div>
                                                    <div class="flex-grow-1"> <a href="private-chat.html">
                                                            <h6 class="m-0">Product Review</h6>
                                                        </a>
                                                        <p class="m-0">Changed to a workflow</p>
                                                    </div>
                                                </div>
                                                <button class="btn-close btn-close-white shadow-none" type="button"
                                                    data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                        </li>
                                        <li class="toast default-show-toast align-items-center border-0 fade show"
                                            aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                            <div class="d-flex justify-content-between">
                                                <div class="toast-body d-flex p-0">
                                                    <div class="flex-shrink-0 bg-light-warning"><img class="w-auto"
                                                            src="assets/images/dashboard/icon/graph.png" alt="Graph">
                                                    </div>
                                                    <div class="flex-grow-1"> <a href="private-chat.html">
                                                            <h6 class="m-0">Return Products</h6>
                                                        </a>
                                                        <p class="m-0">52 items were returned</p>
                                                    </div>
                                                </div>
                                                <button class="btn-close btn-close-white shadow-none" type="button"
                                                    data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                        </li>
                                        <li class="toast default-show-toast align-items-center border-0 fade show"
                                            aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                            <div class="d-flex justify-content-between">
                                                <div class="toast-body d-flex p-0">
                                                    <div class="flex-shrink-0 bg-light-tertiary"><img class="w-auto"
                                                            src="assets/images/dashboard/icon/ticket-star.png"
                                                            alt="Ticket-star"></div>
                                                    <div class="flex-grow-1"> <a href="private-chat.html">
                                                            <h6 class="m-0">Recently Paid</h6>
                                                        </a>
                                                        <p class="m-0">Card payment of $343 </p>
                                                    </div>
                                                </div>
                                                <button class="btn-close btn-close-white shadow-none" type="button"
                                                    data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="mode">
                                    <svg>
                                        <use href="assets/svg/icon-sprite.svg#moon"></use>
                                    </svg>
                                </div>
                            </li>
                            <li class="onhover-dropdown">
                                <div class="notification-box">
                                    <svg>
                                        <use href="assets/svg/icon-sprite.svg#header-message"></use>
                                    </svg><span class="badge rounded-pill badge-info">3 </span>
                                </div>
                                <div class="onhover-show-div notification-dropdown">
                                    <h5 class="f-18 f-w-600 mb-0 dropdown-title">Messages </h5>
                                    <ul class="messages">
                                        <li class="d-flex b-light1-primary gap-2">
                                            <div class="flex-shrink-0"><img src="assets/images/dashboard-2/user/1.png"
                                                    alt="Graph"></div>
                                            <div class="flex-grow-1"> <a href="private-chat.html">
                                                    <h6 class="font-primary f-w-600">Hackett Yessenia</h6>
                                                </a>
                                                <p>Hello Miss...&#128522;</p>
                                            </div><span>2 hours</span>
                                        </li>
                                        <li class="d-flex b-light1-secondary gap-2">
                                            <div class="flex-shrink-0"><img src="assets/images/dashboard-2/user/2.png"
                                                    alt="Graph"></div>
                                            <div class="flex-grow-1"> <a href="private-chat.html">
                                                    <h6 class="font-secondary f-w-600">schneider Adan</h6>
                                                </a>
                                                <p>Wishing You a Happy Birthday Dear.. 🥳&#127882;</p>
                                            </div><span>3 hours</span>
                                        </li>
                                        <li class="d-flex b-light1-success gap-2">
                                            <div class="flex-shrink-0"><img src="assets/images/dashboard-2/user/3.png"
                                                    alt="Graph"></div>
                                            <div class="flex-grow-1"> <a href="private-chat.html">
                                                    <h6 class="font-success f-w-600">Mahdi Gholizadeh</h6>
                                                </a>
                                                <p>Hello Dear!! This Theme Is Very beautiful</p>
                                            </div><span>5 hours</span>
                                        </li>
                                        <li class="bg-transparent"><a class="f-w-700 btn btn-primary w-100"
                                                href="letter-box.html">View
                                                all</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="profile-nav onhover-dropdown px-0 py-0">
                                <div class="d-flex profile-media align-items-center"><img class="img-30"
                                        src="assets/images/user/user.png" alt="">
                                    <div class="flex-grow-1"><span>Hammad</span>
                                        <p class="mb-0 font-outfit">Developer<i class="fa fa-angle-down"></i></p>
                                    </div>
                                </div>
                                <ul class="profile-dropdown onhover-show-div">
                                    <li><a href="profile.php"><i data-feather="user"></i><span>Account </span></a>
                                    </li>
                                    <li><a href="logout.php"><i data-feather="log-in"> </i><span>Log out</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <script class="result-template" type="text/x-handlebars-template">
              <div class="ProfileCard u-cf">                        
              <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
              <div class="ProfileCard-details">
              <div class="ProfileCard-realName">{{name}}</div>
              </div>
              </div>
            </script>
                    <script class="empty-template"
                        type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
                </div>
            </div>
            <!-- Page Header Ends                              -->
        </div>
        <!-- Page Body Start-->
        <div class="page-body-wrapper">