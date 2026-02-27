<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
    <title>CMU | SOMS</title>

    <!-- ===============================================--><!--    Favicons--><!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('falcon/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('falcon/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('falcon/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('falcon/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('falcon/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('falcon/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('falcon/assets/js/config.js') }}"></script>
    <script src="{{ asset('falcon/vendors/simplebar/simplebar.min.js') }}"></script>

    <!-- ===============================================--><!--    Stylesheets--><!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('falcon/vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('falcon/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid p-5 pb-0 pt-0" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg"
                data-double-top-nav="data-double-top-nav" style="display: none;">
                <div class="w-100">
                    <div class="d-flex flex-between-center">
                        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarDoubleTop" aria-controls="navbarDoubleTop"
                            aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                    class="toggle-line"></span></span></button>
                        <a class="navbar-brand me-1 me-sm-3" href="index.html">
                            <div class="d-flex align-items-center"><img class="me-2"
                                    src="assets/img/icons/spot-illustrations/falcon.png" alt=""
                                    width="40" /><span class="font-sans-serif text-primary">falcon</span></div>
                        </a>

                        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

                            <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="avatar avatar-xl">
                                        <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt="" />
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0"
                                    aria-labelledby="navbarDropdownUser">
                                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                        <a class="dropdown-item fw-bold text-warning" href="#!"><span
                                                class="fas fa-crown me-1"></span><span>Go Pro</span></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Set status</a>
                                        <a class="dropdown-item" href="pages/user/profile.html">Profile &amp;
                                            account</a>
                                        <a class="dropdown-item" href="#!">Feedback</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="pages/user/settings.html">Settings</a>
                                        <a class="dropdown-item"
                                            href="pages/authentication/card/logout.html">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
            <nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
                <script>
                    var navbarStyle = localStorage.getItem("navbarStyle");
                    if (navbarStyle && navbarStyle !== 'transparent') {
                        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                    }
                </script>
                <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">
                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span
                                class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    </div><a class="navbar-brand" href="index.html">
                        <div class="d-flex align-items-center py-3"><img class="me-2"
                                src="assets/img/icons/spot-illustrations/falcon.png" alt=""
                                width="40" /><span class="font-sans-serif text-primary">falcon</span></div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                    <div class="navbar-vertical-content scrollbar">
                        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">

                            <li class="nav-item">
                                <a class="nav-link" href="app/calendar.html" role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-calendar-alt"></span></span><span
                                            class="nav-link-text ps-1">Calendar</span></div>
                                </a>
                                <a class="nav-link" href="app/chat.html" role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-comments"></span></span><span
                                            class="nav-link-text ps-1">Chat</span></div>
                                </a>
                                <a class="nav-link dropdown-indicator" href="#email" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-envelope-open"></span></span><span
                                            class="nav-link-text ps-1">Email</span></div>
                                </a>
                                <ul class="nav collapse" id="email">
                                    <li class="nav-item">
                                        <a class="nav-link" href="app/email/inbox.html">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text ps-1">Inbox</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="app/email/inbox.html">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text ps-1">Inbox</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;">
            </nav>
            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false"
                        aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="index.html">
                        <div class="d-flex align-items-center"><img class="me-2"
                                src="assets/img/icons/spot-illustrations/falcon.png" alt=""
                                width="40" /><span class="font-sans-serif text-primary">falcon</span></div>
                    </a>

                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

                        <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt="" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0"
                                aria-labelledby="navbarDropdownUser">
                                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                    <a class="dropdown-item fw-bold text-warning" href="#!"><span
                                            class="fas fa-crown me-1"></span><span>Go Pro</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Set status</a>
                                    <a class="dropdown-item" href="pages/user/profile.html">Profile &amp;
                                        account</a>
                                    <a class="dropdown-item" href="#!">Feedback</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="pages/user/settings.html">Settings</a>
                                    <a class="dropdown-item" href="pages/authentication/card/logout.html">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>


                <div class="row g-3 mb-3">
                    <div class="col-md-6 col-xxl-3">
                        <div class="card h-md-100 ecommerce-card-min-width">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales<span
                                        class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Calculated according to last week's sales"><span
                                            class="far fa-question-circle" data-fa-transform="shrink-1"></span></span>
                                </h6>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end">
                                <div class="row">
                                    <div class="col">
                                        <p class="font-sans-serif lh-1 mb-1 fs-5">$47K</p><span
                                            class="badge badge-subtle-success rounded-pill fs-11">+3.5%</span>
                                    </div>
                                    <div class="col-auto ps-0">
                                        <div class="echart-bar-weekly-sales h-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-3">
                        <div class="card h-md-100">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2">Total Order</h6>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end">
                                <div class="row justify-content-between">
                                    <div class="col-auto align-self-end">
                                        <div class="fs-5 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div>
                                        <span class="badge rounded-pill fs-11 bg-200 text-primary"><span
                                                class="fas fa-caret-up me-1"></span>13.6%</span>
                                    </div>
                                    <div class="col-auto ps-0 mt-n4">
                                        <div class="echart-default-total-order"
                                            data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","Week 6","Week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                            data-echart-responsive="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-3">
                        <div class="card h-md-100">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2">Total Order</h6>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end">
                                <div class="row justify-content-between">
                                    <div class="col-auto align-self-end">
                                        <div class="fs-5 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div>
                                        <span class="badge rounded-pill fs-11 bg-200 text-primary"><span
                                                class="fas fa-caret-up me-1"></span>13.6%</span>
                                    </div>
                                    <div class="col-auto ps-0 mt-n4">
                                        <div class="echart-default-total-order"
                                            data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","Week 6","Week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                            data-echart-responsive="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-3">
                        <div class="card h-md-100">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2">Total Order</h6>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end">
                                <div class="row justify-content-between">
                                    <div class="col-auto align-self-end">
                                        <div class="fs-5 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div>
                                        <span class="badge rounded-pill fs-11 bg-200 text-primary"><span
                                                class="fas fa-caret-up me-1"></span>13.6%</span>
                                    </div>
                                    <div class="col-auto ps-0 mt-n4">
                                        <div class="echart-default-total-order"
                                            data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","Week 6","Week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                            data-echart-responsive="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                  <div class="card">
                    <div class="card-body">
                        asdaszxcasd
                    </div>
                  </div>

                </div>
                <div class="row g-0">
                  
                </div>
                <div class="row g-0">
                    
                </div>
                <div class="row g-0">
                    
                </div>
                <footer class="footer">
                    <div class="row g-0 justify-content-between fs-10 mt-4 mb-3">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">Thank you for creating with Falcon <span
                                    class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2023 &copy;
                                <a href="https://themewagon.com">Themewagon</a>
                            </p>
                        </div>
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">v3.19.0</p>
                        </div>
                    </div>
                </footer>
            </div>
           
        </div>
    </main>
    <!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->


    <!-- ===============================================--><!--    JavaScripts--><!-- ===============================================-->
    <script src="{{ asset('falcon/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('falcon/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('falcon/assets/js/theme.js') }}"></script>

    <script>
        var navbarPosition = localStorage.getItem('navbarPosition');
        var navbarVertical = document.querySelector('.navbar-vertical');
        var navbarTopVertical = document.querySelector('.content .navbar-top');
        var navbarTop = document.querySelector('[data-layout] .navbar-top:not([data-double-top-nav');
        var navbarDoubleTop = document.querySelector('[data-double-top-nav]');
        var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

        if (localStorage.getItem('navbarPosition') === 'double-top') {
            document.documentElement.classList.toggle('double-top-nav-layout');
        }

        if (navbarPosition === 'top') {
            navbarTop.removeAttribute('style');
            navbarTopVertical.remove(navbarTopVertical);
            navbarVertical.remove(navbarVertical);
            navbarTopCombo.remove(navbarTopCombo);
            navbarDoubleTop.remove(navbarDoubleTop);
        } else if (navbarPosition === 'combo') {
            navbarVertical.removeAttribute('style');
            navbarTopCombo.removeAttribute('style');
            navbarTop.remove(navbarTop);
            navbarTopVertical.remove(navbarTopVertical);
            navbarDoubleTop.remove(navbarDoubleTop);
        } else if (navbarPosition === 'double-top') {
            navbarDoubleTop.removeAttribute('style');
            navbarTopVertical.remove(navbarTopVertical);
            navbarVertical.remove(navbarVertical);
            navbarTop.remove(navbarTop);
            navbarTopCombo.remove(navbarTopCombo);
        } else {
            navbarVertical.removeAttribute('style');
            navbarTopVertical.removeAttribute('style');
            navbarTop.remove(navbarTop);
            navbarDoubleTop.remove(navbarDoubleTop);
            navbarTopCombo.remove(navbarTopCombo);
        }
    </script>
</body>

</html>
