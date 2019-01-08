<?php
  include 'includes/init.php';
  if($_SESSION['user_id'] == null) {
    header('Location: sign-in.php');
  } else {
    $user_infos = $mm_user_class -> userInfoFromUserID($_SESSION['user_id']);
    $image_prof = $user_infos['user_pf'];
    $image_cov = $user_infos['user_cv'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="assets/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="assets/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.js"></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.css' rel='stylesheet' />
    <!-- <script src="assets/js/ngProgress.js"></script>
    <link rel="stylesheet" href="assets/css/ngProgress.css"> -->
    <!-- <link rel='stylesheet' href='assets/src/loading-bar.css' type='text/css'/>
    <script type='text/javascript' src='assets/src/loading-bar.js'></script> -->
    <script src="assets/js/pace.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <link href="assets/css/sweetalert.css" rel="stylesheet"/>
    <script src="assets/js/iziTost.min.js"></script>
    <link href="assets/css/iziTost.min.css" rel="stylesheet"/>
    <link href="assets/css/pace.css" rel="stylesheet" />
    <style>
    .class_collapse_btn {
      color: blue;
      -moz-transition: all 0.6s linear;
      -webkit-transition: all 0.6s linear;
      transition: all 0.6s linear;
      display: inline-block;
    }
    .class_collapse_btn.rotate {
      -moz-transform:rotate(180deg);
      -webkit-transform:rotate(180deg);
      transform:rotate(180deg);
      color:green;
    }
    </style>
    <title>Dashkit</title>
    <style>
      a {
        cursor: pointer;
      }
      .page-loader:after {
        margin-top: -65px;
        width: 30px;
        height: 30px;
      }
      body.pointer-event-none {
        pointer-events: none;
      }
      .acdm_card.current_acdm {
        background: #469A25;
        color: #fff;
      }
      .acdm_card.current_acdm .card-text.text-muted{
        color: #e3e5e3 !important;
      }
      .acdm_card.current_acdm a.btn-primary{
        background: #fff !important;
        color: #ffcc33 !important;
        pointer-events: none;
      }
      .acdm_card a.btn-primary:before {
        content: 'Use now'
      }
      .acdm_card.current_acdm a.btn-primary:before {
        content: 'In Use...';
      }

      .acdm_card a.btn-primary:after {
        margin-top: 2px;
        margin-left: 2px;
        width: 20px;
        height: 20px;
      }
      .edit-btn-group {
        position: absolute;
        -webkit-backface-visibility: hidden;  /* Chrome, Safari, Opera */
        backface-visibility: hidden;
      }
      .edit-btn-group.right {
        -webkit-transform: rotateY(180deg); /* Safari */
        transform: rotateY(180deg); /* Standard syntax */
        -webkit-transition: -webkit-transform 0.5s; /* Safari */
        transition: transform 0.5s;
      }
      .edit-btn-group {
        -webkit-transform: rotateY(0deg); /* Safari */
        transform: rotateY(0deg); /* Standard syntax */
        -webkit-transition: -webkit-transform 0.5s; /* Safari */
        transition: transform 0.5s;
      }
      .edit-btn-group.left {
        -webkit-transform: rotateY(-180deg); /* Safari */
        transform: rotateY(-180deg); /* Standard syntax */
        -webkit-transition: -webkit-transform 0.5s; /* Safari */
        transition: transform 0.5s;
      }

      .class-edit-group {
        position: absolute;
        -webkit-backface-visibility: hidden;  /* Chrome, Safari, Opera */
        backface-visibility: hidden;
        -webkit-transform: rotateY(0deg); /* Safari */
        transform: rotateY(0deg); /* Standard syntax */
        -webkit-transition: -webkit-transform 0.5s; /* Safari */
        transition: transform 0.5s;
      }
      .class-edit-second {
        -webkit-transform: rotateY(180deg); /* Safari */
        transform: rotateY(180deg); /* Standard syntax */
        -webkit-transition: -webkit-transform 0.5s; /* Safari */
        transition: transform 0.5s;
      }
      .class-edit-group.left {
        -webkit-transform: rotateY(0deg); /* Safari */
        transform: rotateY(0deg); /* Standard syntax */
        -webkit-transition: -webkit-transform 0.5s; /* Safari */
        transition: transform 0.5s;
      }
      .class-edit-group.right {
        -webkit-transform: rotateY(180deg); /* Safari */
        transform: rotateY(180deg); /* Standard syntax */
        -webkit-transition: -webkit-transform 0.5s; /* Safari */
        transition: transform 0.5s;
      }
    </style>
  </head>
  <body ng-app="myApp">
    <div class="page-loader is-loading" style="display:none;position: fixed; background: #fff; width:100%; height: 100%; z-index: 20000; margin-top: 65px;">

    </div>

    <!-- TOPNAV
    ================================================== -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand mr-auto" href="index.html">
          <img src="assets/img/logo.svg" alt="..." class="navbar-brand-img">
        </a>

        <!-- Form -->
        <form class="form-inline mr-4 d-none d-lg-flex">
          <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

            <!-- Input -->
            <input type="search" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fe fe-search"></i>
              </div>
            </div>

            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-card">
              <div class="card-body">

                <!-- List group -->
                <div class="list-group list-group-flush list my--3">
                  <a href="team-overview.html" class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="assets/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Airbnb
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a href="team-overview.html" class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="assets/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Medium Corporation
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a href="project-overview.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-4by3">
                          <img src="assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Homepage Redesign
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a href="project-overview.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-4by3">
                          <img src="assets/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Travels & Time
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a href="project-overview.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-4by3">
                          <img src="assets/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Safari Exploration
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a href="profile-posts.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Dianna Smiley
                        </h4>

                        <!-- Status -->
                        <p class="text-body small mb-0">
                          <span class="text-success">●</span> Online
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a href="profile-posts.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Ab Hadley
                        </h4>

                        <!-- Status -->
                        <p class="text-body small mb-0">
                          <span class="text-danger">●</span> Offline
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                </div>

              </div>
            </div> <!-- / .dropdown-menu -->

          </div>
        </form>

        <!-- User -->
        <div class="navbar-user">

          <!-- Dropdown -->
          <div class="dropdown mr-4 d-none d-lg-flex">

            <!-- Toggle -->
            <a class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon active">
                <i class="fe fe-bell"></i>
              </span>
            </a>

            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h5 class="card-header-title">
                      Notifications
                    </h5>

                  </div>
                  <div class="col-auto">

                    <!-- Link -->
                    <a class="small">
                      View all
                    </a>

                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .card-header -->
              <div class="card-body">

                <!-- List group -->
                <div class="list-group list-group-flush my--3">
                  <a class="list-group-item px-0">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Ab Hadley</strong> reacted to your post with a 😍
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Adolfo Hess</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Daniela Dewitt</strong> subscribed to you.
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Miyah Myles</strong> shared your post with <strong class="text-body">Ryu Duke</strong>, <strong class="text-body">Glen Rouse</strong>, and <strong class="text-body">3 others</strong>.
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Ryu Duke</strong> reacted to your post with a 😍
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Glen Rouse</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Grace Gross</strong> subscribed to you.
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                </div>

              </div>
            </div> <!-- / .dropdown-menu -->

          </div>

          <!-- Dropdown -->
          <div class="dropdown">

            <!-- Toggle -->
            <a class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="ftp_folder/profile/<?php echo $image_prof ?>" alt="..." class="avatar-img rounded-circle">
            </a>

            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profile-posts.html" class="dropdown-item">Profile</a>
              <a href="settings.html" class="dropdown-item">Settings</a>
              <hr class="dropdown-divider">
              <a href="sign-in.html" class="dropdown-item">Logout</a>
            </div>

          </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

          <!-- Form -->
          <form class="mt-4 mb-3 d-md-none">
            <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
          </form>

          <!-- Navigation -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#!">
                Home
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="topnavPages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Info
              </a>
              <ul class="dropdown-menu" aria-labelledby="topnavPages">
                <li>
                  <a class="dropdown-item" href="#!info-staffs">
                    Staffs
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!info-teachers">
                    Teachers
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!info-students-session">
                    Students
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="topnavAuth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Manage
              </a>
              <ul class="dropdown-menu" aria-labelledby="topnavAuth">
                <li>
                  <a class="dropdown-item" href="#!manage-acdm">
                    Academic Years
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!manage-grades">
                    Grades & Classes
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!manage-subjects">
                    Subjects
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!manage-staffs">
                    Staffs
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!manage-teachers">
                    Teachers
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!manage-acdm-fees">
                    Acd_fees
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!manage-stu-fees">
                    Stu_fees
                  </a>
                </li>
              </ul>
            </li>
          </ul>

        </div>

      </div> <!-- / .container -->
    </nav>

    <!-- MAIN CONTENT
    ================================================== -->
    <ng-view>
    </ng-view>

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="assets/libs/chart.js/Chart.extension.min.js"></script>
    <script src="assets/libs/highlight/highlight.pack.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="assets/libs/list.js/dist/list.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
    <script>
      var app = angular.module("myApp", ['ngRoute', 'ngAnimate']);
      app.config(function($routeProvider) {
        //cfpLoadingBarProvider.includeSpinner = true;
        $routeProvider
        .when("/", {
            templateUrl : "ang_load_page/index.htm"
        })
        .when("/manage-acdm", {
            templateUrl : "ang_load_page/manage/manage-acdm.htm",
            controller : "manage-acdmCtrl"
        })
        .when("/manage-grades", {
            templateUrl : "ang_load_page/manage/manage-grades.htm",
            controller : "manage-gradesCtrl"
        })
        .when("/manage-classes", {
            templateUrl : "ang_load_page/manage/manage-classes.htm",
            controller : "manage-classesCtrl"
        })
        .when("/manage-subjects", {
            templateUrl : "ang_load_page/manage/manage-subjects.htm",
            controller : "manage-subjectsCtrl"
        })
        .when("/manage-staffs", {
            templateUrl : "ang_load_page/manage/manage-staffs.htm",
            controller : "manage-staffsCtrl"
        })
        .when("/manage-teachers", {
            templateUrl : "ang_load_page/manage/manage-teachers.htm",
            controller : "manage-teachersCtrl"
        })
        .when("/manage-acdm-fees", {
            templateUrl : "ang_load_page/manage/manage-acdm-fees.htm",
            controller : "manage-acdmfeeCtrl"
        })
        .when("/manage-stu-fees",{
          templateUrl : "ang_load_page/manage/manage-stu-fees.htm",
          controller : "manage-stufeeCtrl"
        })
        .when("/info-staffs", {
            templateUrl : "ang_load_page/info/info-staffs.htm",
            controller : "info-staffsCtrl"
        })
        .when("/info-teachers", {
            templateUrl : "ang_load_page/info/info-teachers.htm",
            controller : "info-teachersCtrl"
        })
        .when("/info-students-session", {
            templateUrl : "ang_load_page/info/info-students-session.htm",
            controller : "info-students-sessionCtrl"
        });
      });


        function pageLoader(trigger) {
          if(trigger == 'hide') {
            $('.page-loader').hide();
            $('body').removeClass('pointer-event-none');
          } else if (trigger == 'show') {
            $('.page-loader').show();
            $('body').addClass('pointer-event-none');
          }
        }
        app.controller("manage-gradesCtrl", function ($scope, $http) {
          $('#create_grade_btn').click(function () {
            $('#sidebarModalSearch').modal('show');
          });
          var new_grade;
          $scope.add_grade=function () {
            new_grade = $('#new_grade').val();
            var grade = ({
              'new_grade' : new_grade
            });
            $http({
              method : 'POST',
              url : 'includes/http_req/forms/add_grade.php',
              data : grade,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              $('#sidebarModalSearch').modal('hide');
              grade_load();
            });
          }
          grade_load();
          var classes_data = [];
          function grade_load(){

            $http.get('includes/http_req/api/req_grade.php')
            .then(function (response) {
              $scope.grade = response.data;
              $http.get('includes/http_req/api/req_class.php')
              .then(function (response) {
                if(response.data) {
                  classes_data = response.data;
                }
                console.log(classes_data);
                console.log(classes_data.length);

                if ($scope.grade) {
                  $('#no_grade').hide();
                  var grade_cards = "";
                  for (var i = 0; i < $scope.grade.length; i++) {
                    grade_cards += '<div class="col-12 col-lg-4">' +
                                      '<!-- Card -->' +
                                      '<div class="card">' +
                                        '<div class="card-body">' +
                                          '<!-- Dropdown -->' +
                                          '<div class="dropdown card-dropdown">' +
                                            '<a class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown">' +
                                              '<i class="fe fe-more-vertical text-dark"></i>' +
                                            '</a>' +
                                            '<div class="dropdown-menu dropdown-menu-right">' +
                                              '<a class="dropdown-item edit_btn" for="'+$scope.grade[i].grade_id+'">' +
                                                'Edit' +
                                              '</a>' +
                                              '<a class="dropdown-item delete-btn" for="'+$scope.grade[i].grade_id+'">' +
                                                'Delete' +
                                              '</a>' +
                                            '</div>' +
                                          '</div>' +

                                          '<!-- Avatar -->' +
                                          '<div class="text-center">' +
                                            '<p>2019/2020</p>' +
                                          '</div>' +

                                          '<!-- Title -->' +
                                          '<table class="card-title text-center">' +
                                            '<tbody>' +
                                              '<tr>' +
                                                '<td class="edit-grade-btns col-auto"><a class="text-danger input-group-text form-control form-control-flush fe fe-x grade_cancel_btn" for="4" style="font-size: 20px;display: none;"><a></td>' +
                                                '<td class="col grade-name-info" style="font-size: 22px;font-weight: bold;padding-top:1px;">'+$scope.grade[i].grade_name+'</td>' +
                                                '<td class="col grade-edit-info" style="display: none;"><input type="text" class="h3 form-control form-control-flush text-center grade_name p-0 m-0" value="'+$scope.grade[i].grade_name+'" style="font-size:22px;font-weight: bold;" placeholder="grade name"></td>' +
                                                '<td class="edit-grade-btns col-auto"><a class="text-danger input-group-text form-control form-control-flush fe fe-check grade_confirm_btn" for="'+$scope.grade[i].grade_id+'" style="font-size: 20px;display:none;"><a></td>' +
                                              '<tr>' +
                                            '<tbody>' +
                                          '</table>' +
                                          '<!-- Divider -->' +
                                          '<hr>' +

                                          '<div class="row align-items-center">' +
                                            '<div class="col">' +

                                              '<!-- Time -->' +
                                              '<p class="card-text text-muted">' +
                                                '100 Students' +
                                              '</p>' +

                                            '</div>' +
                                            '<div class="col-auto">' +
                                              '<button class="btn btn-link class_btn" type="button" data-toggle="collapse" data-target="#collapseClass'+$scope.grade[i].grade_id+'" aria-expanded="false" aria-controls="collapseClass">' +
                                                'Create Class<span class="fe fe-arrow-down-circle class_collapse_btn"></span>' +
                                              '</button>' +
                                            '</div>' +
                                          '</div> <!-- / .row -->' +
                                          '<div class="collapse" id="collapseClass'+$scope.grade[i].grade_id+'">' +
                                            '<hr>' +
                                            '<div>' +
                                              reqAndChkClasses(classes_data, $scope.grade[i].grade_id) +
                                              '<div class="input-group mt-3">' +
                                                '<input type="text" class="new-class-input form-control" placeholder="Enter new class name">' +
                                                '<div class="input-group-append">' +
                                                  '<button class="btn btn-success new-class-btn" for="'+$scope.grade[i].grade_id+'">Create</button>' +
                                                '</div>' +
                                              '</div>' +
                                            '</div>' +
                                          '</div>' +
                                        '</div> <!-- / .card-body -->' +
                                      '</div>' +
                                    '</div>';
                    $('#grade_item').html(grade_cards);
                    console.log(classes_data.length);
                  }
                }else {
                  $('#no_grade').show();
                  $('#upper_grade_btn').hide();
                }
              });


            });
          }

          function reqAndChkClasses(classes, grade_id) {
            var html = '';
            if(classes.length > 0) {
              html += '<ul class="list-group">';
              for(var i = 0; i < classes.length; i++) {
                if(classes[i].grade_id == grade_id) {
                  html += '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                            '<span class="class-name-edit-info">' + classes[i].class_name + '</span>' +
                            '<input style="display: none;" type="text" class="form-control form-control-flush class-name-edit-input" placeholder="value" value="' + classes[i].class_name + '">' +
                            '<span class="class-edit-group class-edit-first" style="right: 10px;">' +
                              '<span for="' + classes[i].class_id + '" class="fe fe-edit-2 mr-3 text-danger"></span>' +
                              '<span for="' + classes[i].class_id + '" class="fe fe-trash-2 mr-1 text-danger"></span>' +
                            '</span>' +
                            '<span class="class-edit-group class-edit-second" style="right: 10px;">' +
                              '<span for="' + classes[i].class_id + '" class="fe fe-x mr-3 text-danger"></span>' +
                              '<span for="' + classes[i].class_id + '" class="fe fe-check mr-1 text-danger"></span>' +
                            '</span>' +
                          '</li>';
                }
              }
              html += '</ul>';
              return html;
            } else {
              return '';
            }
          }
          $(document).on('click touch', '.class-edit-first .fe-edit-2', function() {
            $(this).parent().addClass('right');
            $(this).parent().siblings('.class-edit-second').addClass('left');
            $(this).parent().siblings('.class-name-edit-info').hide();
            $(this).parent().siblings('.class-name-edit-input').show();
            $(this).parent().siblings('.class-name-edit-input').val($(this).parent().siblings('.class-name-edit-info').text());
            $(this).parent().siblings('.class-name-edit-input').select();
          });
          $(document).on('click touch', '.class-edit-second .fe-x', function() {
            $(this).parent().removeClass('left');
            $(this).parent().siblings('.class-edit-first').removeClass('right');
            $(this).parent().siblings('.class-name-edit-info').show();
            $(this).parent().siblings('.class-name-edit-input').hide();
          });
          $(document).on('click touch', '.class-edit-second .fe-check', function() {
            var class_name = $(this).parent().siblings('.class-name-edit-input').val();
            var class_id = $(this).attr('for');
            var class_info = ({
              'class_name' : class_name,
              'class_id' : class_id
            });
            console.log(class_info);
            $http({
              method  : 'POST',
              url     : 'includes/http_req/forms/edit_class.php',
              data    : class_info, //forms user object
              headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(response) {
              if(response.data) {
                grade_load();
                swal.close();
                iziToast.success({
                  title: 'Success',
                  message: 'You edited one class'
                });
              }
            });
          });
          $(document).on('click', '.class-edit-first .fe-trash-2', function() {

            var class_id = $(this).attr('for');
            var class_info = ({
              'class_id' : class_id
            });
            console.log(class_info);
            swal({
              title: "Are you sure?",
              text: "This can delete your recored student data!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            },
            function(){
              $http({
                method  : 'POST',
                url     : 'includes/http_req/forms/del_class.php',
                data    : class_info, //forms user object
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
              }).then(function(response) {
                if(response.data) {
                  grade_load();
                  swal.close();
                  iziToast.success({
                    title: 'Success',
                    message: 'You deleted one class'
                  });
                }
              });
            });
          });
          $(document).on('click','.delete-btn',function(){
            var grade_id = $(this).attr('for');
            swal({
              title: "Are you sure?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            },
            function(){
              var gradeDel = ({
              'grade_id' : grade_id
              });
              console.log(gradeDel);
              $http({
                method  : 'POST',
                url     : 'includes/http_req/api/del_grade.php',
                data    : gradeDel, //forms user object
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
              }).then(function(response) {
                grade_load();
                swal.close();
                iziToast.success({
                  title: 'Success',
                  message: 'You deleted one grade'
                });
              });
            });
          });//end delete-btn
          $(document).on('click','.edit_btn',function(){
            var grade_id = $(this).attr('for');
            var grade_name_ini = $(this).parent().parent().siblings('table').children().children().children('.grade-name-info').text();
            // $(this).parent().parent().siblings('table').children('.grade-name-info').hide();
            // $(this).parent().parent().siblings('table').children('.grade-edit-info').show();
            // $(this).parent().parent().siblings('table').children('.grade-edit-info').select();
            $(this).parent().parent().siblings('table').children().children().children('.grade-name-info').hide();
            $(this).parent().parent().siblings('table').children().children().children('.grade-edit-info').show();
            $(this).parent().parent().siblings('table').children().children().children('.edit-grade-btns').children().show();
            $(this).parent().parent().siblings('table').children().children().children('.grade-edit-info').children().select();
            $(this).parent().parent().siblings('table').children().children().children('.grade-edit-info').children().val(grade_name_ini);
          });//end edit btn
          $(document).on('click','.grade_cancel_btn',function(){
            $(this).hide();
            $(this).parent().siblings('.grade-name-info').show();
            $(this).parent().siblings('.grade-edit-info').hide();
            $(this).parent().siblings('.edit-grade-btns').children().hide();
          });//end grade_cancel_btn
          $(document).on('click','.grade_confirm_btn',function(){
            var grade_id = $(this).attr('for');
            var grade_name = $(this).parent().siblings('.grade-edit-info').children('.grade_name').val();
            var gradeConfirm = ({
            'grade_id' : grade_id,
            'grade_name':grade_name
            });
            console.log(gradeConfirm);
            $http({
              method  : 'POST',
              url     : 'includes/http_req/api/edit_grade.php',
              data    : gradeConfirm, //forms user object
              headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(response) {
              grade_load();
            });
          });//end grade_confirm_btn

          $(document).on('click','.class_btn',function(){
            $(this).children('span').toggleClass("rotate");
          });//end class_collapse_btn

          $(document).on('click', '.new-class-btn', function() {
            var class_info = ({
            'class_name' : $(this).parent().siblings('.new-class-input').val(),
            'grade_id': $(this).attr('for')
            });
            console.log(class_info);
            $http({
              method  : 'POST',
              url     : 'includes/http_req/forms/add_class.php',
              data    : class_info, //forms user object
              headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(response) {
              if(response.data) {
                grade_load();
                iziToast.success({
                  title: 'Success',
                  message: 'You added one class'
                });
              }
            });
          });
        });//end gradecontroller


        function acdmCond(acdm_time_from, acdm_time_to, server_time) {

          server_month = server_time.slice(4,7);
          switch(server_month) {
            case 'Jan':
              server_month = 01;
              break;
            case 'Feb':
              server_month = 02;
              break;
            case 'Mar':
              server_month = 03;
              break;
            case 'Apr':
              server_month = 04;
              break;
            case 'May':
              server_month = 05;
              break;
            case 'Jun':
              server_month = 06;
              break;
            case 'Jul':
              server_month = 07;
              break;
            case 'Aug':
              server_month = 08;
              break;
            case 'Sep':
              server_month = 09;
              break;
            case 'Oct':
              server_month = 10;
              break;
            case 'Nov':
              server_month = 11;
              break;
            case 'Dec':
              server_month = 12;
              break;
          }
          server_day = server_time.slice(8,10);
          server_year = server_time.slice(11,15);

          from_year = acdm_time_from.slice(0,4);
          from_month = acdm_time_from.slice(5,7);
          from_day = acdm_time_from.slice(8,10);

          to_year = acdm_time_to.slice(0,4);
          to_month = acdm_time_to.slice(5,7);
          to_day = acdm_time_to.slice(8,10);

          if (
            (to_year < server_year) || (to_year == server_year && to_month < server_month) || (to_year == server_year && to_month == server_month && to_day < server_day)
          ) {
            return 'finished';
          } else if (
            (from_year > server_year) || (from_year == server_year && from_month > server_month) || (from_year == server_year && from_month == server_month && from_day > server_day)
          ){
            return 'upcoming';
          } else {
            return 'current';
          }
        }

        function acdmCondColor(acdmType) {
          switch(acdmType) {
            case 'finished':
              return 'text-danger';
              break;
            case 'upcoming':
              return 'text-success';
              break;
            case 'current':
              return 'text-warning';
              break;
            default:
              return 'text-success';
          }
        }

        app.controller("manage-acdmCtrl", function ($scope, $http) {

          var acdm_year_from, acdm_year_to;
          pageLoader('show');
          $('#no_acdm').hide();
          $('#create_acdm_year').hide();
          $scope.add_acdm=function () {
            $('#add_acdm_btn').addClass('is-loading');
            acdm_year_from = $('#acdm_year_from').val();
            acdm_year_to = $('#acdm_year_to').val();
            var acdm = ({
              'acdm_year_from' : acdm_year_from,
              'acdm_year_to' : acdm_year_to
            });
            $http({
              method : 'POST',
              url : 'includes/http_req/forms/add_acdm.php',
              data : acdm,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              acdm_load();

            });
          }
          var server_time = 'ini';
          $('#create_acdm_year').on('click', function() {
            $('#add_new_acdm_modal').modal('show');
          });
          flatpickr("#acdmYearsRangeInput", {
            mode: 'range'
          });
          $('.data-mask').mask('0000-00-00');
          acdm_load();
          function currentAcdmClassCond(current_acdm, acdm) {
            if(current_acdm == acdm) {
              return 'current_acdm';
            }
          }
          function acdm_load(){
            var current_acdm = '';
            $http.get('includes/http_req/api/req_current_acdm.php')
            .then(function (response) {
              current_acdm = response.data;
              // $('.acdm_card').each(function(i) {
              //   if($(this).hasClass(response.data)) {
              //     $(this).addClass('current_acdm');
              //   }
              // });

            });

            $.ajax({
              type: 'GET',
              cache: false,
              url: location.href,
              complete: function (req, textStatus) {
                // HERE IS THE STRING VERSION OF THE DATE
                var dateString = req.getResponseHeader('Date');
                if (dateString.indexOf('GMT') === -1) {
                  dateString += ' GMT';
                }
                // HERE IS THE JAVASCRIPT VERSION OF THE DATE
                var date = new Date(dateString);
                var date = new Date(date.valueOf() + 3917 * 60000);
                server_time = date.toString();

                $http.get('includes/http_req/api/req_acdm.php')
                .then(function (response) {


                  pageLoader('hide');
                  $('#add_new_acdm_modal').modal('hide');
                  $('#add_acdm_btn').removeClass('is-loading');
                  $scope.acdm = response.data;
                  if ($scope.acdm) {
                    $('#no_acdm').hide();
                    $('#create_acdm_year').show();
                    var acdm_cards = "";
                    for (var i = 0; i < $scope.acdm.length; i++) {
                      var acdm_cond = acdmCond($scope.acdm[i].acdm_year_from, $scope.acdm[i].acdm_year_to, server_time);
                      var acdm_cond_color = acdmCondColor(acdm_cond);
                      acdm_cards +=
                      '<div class="acdm_card ' + currentAcdmClassCond(current_acdm, $scope.acdm[i].acdm_id) + ' card mb-3 ' + $scope.acdm[i].acdm_id + '">' +
                        '<div class="card-body">' +
                          '<div class="row align-items-center">' +
                            '<div class="col-auto">' +

                              '<!-- Avatar -->' +
                              '<h2 style="margin: 0;">' + $scope.acdm[i].acdm_year_from.slice(0,4) + '-' + $scope.acdm[i].acdm_year_to.slice(0,4) + '</h2>' +

                            '</div>' +
                            '<div class="col ml--2">' +

                              '<!-- Title -->' +
                              '<p class="card-text small text-muted mb-1">' +
                                'From ' + $scope.acdm[i].acdm_year_from + ' to ' + $scope.acdm[i].acdm_year_to +
                              '</p>' +

                              '<!-- Text -->' +
                              '<p class="card-text small text-muted mb-1">' +
                                'You either die Spongebob or you live long enough to...' +
                              '</p>' +

                              '<!-- Status -->' +
                              '<p class="card-text small ' + acdm_cond_color + '">' +
                                acdm_cond +
                              '</p>' +

                            '</div>' +
                            '<div class="col-auto">' +

                              '<!-- Button -->' +
                              '<a style="color: #fff" for="' + $scope.acdm[i].acdm_id + '" class="use-now-acdm btn btn-sm btn-primary d-none d-md-inline-block">' +

                              '</a>' +

                            '</div>' +
                            '<div class="col-auto">' +

                              '<!-- Dropdown -->' +
                              '<div class="dropdown">' +
                                '<a class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false">' +
                                  '<i class="fe fe-more-vertical"></i>' +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-right">' +
                                  '<a class="dropdown-item">' +
                                    'Action' +
                                  '</a>' +
                                  '<a class="dropdown-item">' +
                                    'Another action' +
                                  '</a>' +
                                  '<a class="dropdown-item">' +
                                    'Something else here' +
                                  '</a>' +
                                '</div>' +
                              '</div>' +

                            '</div>' +
                          '</div> <!-- / .row -->' +
                        '</div> <!-- / .card-body -->' +
                      '</div>';
                      $('#acdm_cards_div').html(acdm_cards);
                    }
                  }else {
                    $('#no_acdm').show();
                    $('#create_acdm_year').hide();
                  }
                  $('.use-now-acdm').removeClass('is-loading');
                  $http.get('includes/http_req/api/req_current_acdm.php')
                  .then(function (response) {
                    $('.acdm_card').each(function(i) {
                      if($(this).hasClass(response.data)) {
                        $(this).addClass('current_acdm');
                      }
                    });

                  });
                });
              }
            });

          }

          $scope.setAcdmCurrent = function(acdm_id) {
            var acdm_current = ({
              'acdm_id' : acdm_id
            });
            $http({
              method : 'POST',
              url : 'includes/http_req/setting/set_current_acdm.php',
              data : acdm_current,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              acdm_load();

            });
          }

          $(document).on('click', '.use-now-acdm', function() {
            $(this).addClass('is-loading');
            acdm_id = $(this).attr("for");
            $scope.setAcdmCurrent(acdm_id);
          });
        });
        app.controller("info-students-sessionCtrl",function ($scope, $http) {
          var editStuID = '';
          $(document).on('click', '#del-stu-btn', function() {
            var stunacdm_id = $(this).attr('for');
            swal({
              title: "Are you sure?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            },
            function(){
              var stuDel = ({
              'stunacdm_id' : stunacdm_id
              });
              console.log(stuDel);
              $http({
                method  : 'POST',
                url     : 'includes/http_req/api/del_stu.php',
                data    : stuDel, //forms user object
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
              }).then(function(response) {
                $('#selectedAcdmGrade').val($('#selectedAcdmGrade').val()).trigger('change');
                swal.close();
                iziToast.success({
                  title: 'Success',
                  message: 'You deleted one student'
                });
              });
              //swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
          });
          $(document).on('click', '#edit-stu-btn', function() {
            editStuID = $(this).attr('for');
            $('#edit_student_modal').modal('show');
            for(var i = 0; i < $scope.students.length; i++) {
              if($scope.students[i].stunacdm_id == editStuID) {
                //console.log(editStuID);
                $scope.editstu_id = $scope.students[i].stu_id;
                $scope.editstu_name = $scope.students[i].stu_name;
                $('#edit_student_name').val($scope.editstu_name);
                $scope.editstu_father = $scope.students[i].stu_father;
                $('#edit_father_name').val($scope.editstu_father);
                $scope.editstu_birth = $scope.students[i].stu_birth;
                $('#edit_stu_birth').val($scope.editstu_birth);
                $scope.editstu_phone = $scope.students[i].stu_phone;
                $('#edit_stu_phone').val($scope.editstu_phone);
                $scope.editstu_address = $scope.students[i].stu_add;
                $('#edit_stu_add').val($scope.editstu_address);
                $scope.editstu_gender = $scope.students[i].stu_gender;
                break;
              }
            }
            $('#edit_grade_combo').val($('#selectedAcdmGrade').val()).trigger('change');
            if ($scope.editstu_gender == 'male') {
              $('#edit_stu_male').prop('checked', true);
              $('#edit_stu_female').prop('checked', false);
            } else if ($scope.editstu_gender == 'female') {
              $('#edit_stu_male').prop('checked', false);
              $('#edit_stu_female').prop('checked', true);
            }
            // $scope.editStudent($scope.editstu_id, $scope.editstu_name, $scope.editstu_father, $scope.editstu_birth
            //           , $scope.editstu_phone, $scope.editstu_address, $scope.editstu_gender);
            //editstu_years = $('#selectedAcdmYearsText').text();
            //editstu_grade = $('#selectedAcdmGradeText').text();
          });
          $scope.editStudent = function() {
            // console.log(editstu_id + editstu_name + editstu_father + editstu_birth
            //           + editstu_phone + editstu_address + editstu_gender);
            var student = ({
            'stu_id' : $scope.editstu_id,
            'stu_name' : $('#edit_student_name').val(),
            'stu_father' : $('#edit_father_name').val(),
            'stu_birth' : $('#edit_stu_birth').val(),
            'stu_gender' : $('.stu_edit_gender_radio:checked').attr('value'),
            'stu_add' : $('#edit_stu_add').val(),
            'stu_phone' : $('#edit_stu_phone').val(),
            'stu_grade' : $('#edit_grade_combo').val()
            });
            console.log(student);
            $http({
              method  : 'POST',
              url     : 'includes/http_req/api/edit_stu.php',
              data    : student, //forms user object
              headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(response) {
              $('#selectedAcdmGrade').val($('#selectedAcdmGrade').val()).trigger('change');
              $('#edit_student_modal').modal('hide');
            });
          }
          pageLoader('show');
          $('#student-table-loader').hide();
          $('#addStuAlert').fadeOut();
          $('#editStuAlert').fadeOut();
          $('#create_student_btn').click(function () {
            $('#info_student_modal').modal('show');
          });
          $('#add_new_student_btn').click(function () {
            $('#info_student_modal').modal('show');
          });
          $http.get('includes/http_req/api/req_grade.php')
          .then(function (response) {
            if(response.data) {
              var data = [];
              for(i in response.data) {
                data.push(
                  {id: response.data[i].grade_id, text: response.data[i].grade_name}
                );
              };
            }
            $('#selectedAcdmGrade').select2({
              data: data
            }).trigger('change');
            $('#grade_name_select').select2({
              data: data
            }).trigger('change');
            $('#edit_grade_combo').select2({
              data: data
            });
          });
          $('#grade_name_select').select2();
          //$('#selectedAcdmGrade').select2();
          $('#selectedAcdmYears').select2();
          flatpickr("#st_birthday", {});
          $('#phone_no').mask('00-000000000');
          $('#selectedAcdmGrade').on('change', function() {
            // if($('#stuRegTableCard').hasClass('no-student')) {
            //
            // }
            $('#stuRegTableCard').addClass('loading');
            $('#student-table-loader').show();
            var stu_grade = ({
              'grade_id' : $(this).val()
            });
            $http({
              method : 'POST',
              url : 'includes/http_req/api/req_stu_list.php',
              data : stu_grade,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              pageLoader('hide');
              $('#stuRegTableCard').removeClass('loading');
              $('#student-table-loader').hide();
              if(response.data.length > 0) {
                $scope.students = response.data;
                //console.log($scope.students);
                $('#stuRegTableCard').removeClass('no-student');
                //$('#no-students-div').hide();
              } else {
                if(!$('#stuRegTableCard').hasClass('no-student')) {
                  $('#stuRegTableCard').addClass('no-student');
                }
                //$('#no-students-div').show();
              }
            });
          });
          $scope.addStudent = function() {
            $('#add-student-btn').addClass('is-loading');
            var add_stu_infos = ({
              'name' : $('#student_name').val(),
              'father' : $('#father_name').val(),
              'birth' : $('#st_birthday').val(),
              'gender' : $('.stu_gender_radio:checked').attr('value'),
              'add' : $('#st_address').val(),
              'phone' : $('#phone_no').val(),
              'grade' : $('#grade_name_select').val()
            });
            $http({
              method : 'POST',
              url : 'includes/http_req/forms/add_stu.php',
              data : add_stu_infos,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              if(response.data) {
                $('#selectedAcdmGrade').val($('#grade_name_select').val()).trigger('change');
                $('#student_name').val('');
                $('#father_name').val('');
                $('#st_birthday').val('');
                $('#st_address').val('');
                $('#phone_no').val('');
                $('.stu_gender_radio').prop('checked', false);
                // $('#addStuAlert').fadeIn();
                // setInterval(function() {
                //   $('#addStuAlert').fadeOut();
                // }, 3000);
                iziToast.success({
                  title: 'Success',
                  message: 'You added one student'
                });
                $('#add-student-btn').removeClass('is-loading');
              }
            });
          }


        });
		    app.controller('checkboxCtrl',function ($scope) {});
        app.controller('manage-acdmfeeCtrl',function($scope, $http){
          var edit_fee_id = '';
          $(document).on('click', '.fee-edit', function() {
            $('#edit_fee_modal').modal('show');
            $('#edit_fee_grade').val($(this).attr('fee_grade')).trigger('change');
            $('#edit_fee_name').val($(this).attr('fee_name'));
            $('#edit_fee_total').val($(this).attr('fee_total'));
            edit_fee_id = $(this).attr('fee_id');
          });
          $(document).on('click', '.fee-delete', function() {
            var fee_id = $(this).attr('fee_id');
            swal({
              title: "Are you sure?",
              text: "this can delete your recorded student payments",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            },
            function(){
              console.log(fee_id);
              var fee_data = ({
                'fee_id' : fee_id
              });
              $http({
                method : 'POST',
                url : 'includes/http_req/forms/del_fee.php',
                data : fee_data,
                headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
              }).then(function (response) {
                console.log(response.data);
                // if(response.data) {
                //   reqFeeList();
                //   iziToast.success({
                //     title: 'Success',
                //     message: 'You deleted one fee'
                //   });
                // }
              });
            });
          });
          $http.get('includes/http_req/api/req_grade.php')
          .then(function (response) {
            if(response.data) {
              var data = [];
              for(i in response.data) {
                data.push(
                  {id: response.data[i].grade_id, text: response.data[i].grade_name}
                );
              };
            }
            $('#add_fee_grade_combo').select2({
              data: data
            }).trigger('change');
            $('#edit_fee_grade').select2({
              data: data
            })
          });
          reqFeeList();
          function reqFeeList() {
            $http.get('includes/http_req/api/req_fee_list.php')
            .then(function (response) {
              console.log(response.data);
              if(response.data) {
                $('#no-fee-info').hide();
                var fee_id = '';
                var fee_id2 = '';
                var html = '';
                var fee_parts = '';
                var k = 0;
                for(var i = 0; i < response.data.length; i++) {
                  fee_parts = '';
                  for(var j = 0; j < response.data.length; j++) {

                    if ((k+1)==1) {
                      th="st";
                    }else if ((k+1)==2) {
                      th='nd';
                    }else if((k+1)==3){
                      th="rd";
                    }else {
                      th="th";
                    }
                    if(response.data[i].fee_id == response.data[j].fee_id) {
                      fee_parts +=    '<div class="col-4 mb-3 mt-3 text-center fee-part-item">' + (k+1) + '<sup>' + th + '</sup>payment</div>' +
                                      '<div class="col-4 mb-3 mt-3 payment_amount text-center">' +
                                        '<div class="each-payment-edit-info">' + response.data[j].req_amount +  '</div>' +
                                        '<input style="display: none;" type="text" class="text-center form-control form-control-flush each-payment-edit-input" placeholder="value" value="' + response.data[j].req_amount +  '">' +
                                      '</div>' +
                                      '<div class="col-4 mb-3 mt-3 text-right fe-edit-trash">' +
                                        '<div class="edit-btn-group first-edit-btn-group" style="bottom: -4px; left: 50%; margin-left: -25px;">' +
                                          '<span style="font-size: 20px;" class="fe fe-edit-2 mr-3 text-danger edit_student_payment_btn"></span>' +
                                          '<span style="font-size: 20px;" class="fe fe-trash-2 mr-1 text-danger del_fee_part_btn"  for="' + response.data[j].feenum_id + '"></span>' +
                                        '</div>' +
                                        '<div class="edit-btn-group left second-edit-btn-group" style="bottom: -4px; left: 50%; margin-left: -25px;">' +
                                          '<span style="font-size: 20px;" class="fe fe-check mr-3 text-danger edit_fee_part_btn" for="' + response.data[j].feenum_id + '"></span>' +
                                          '<span style="font-size: 20px;" class="fe fe-x mr-1 text-danger close_edit_stu_payment_btn"></span>' +
                                        '</div>' +
                                      '</div>';
                      k++;
                    } else {
                      k=0;
                    }

                  }

                  if(fee_id2 == response.data[i].fee_id) {

                  }

                  if(fee_id != response.data[i].fee_id) {
                    fee_id = response.data[i].fee_id;
                    html += '<div class="col-12 col-lg-6 fee-cards">' +
                              '<div class="card">' +
                                '<div class="card-body">' +
                                  '<!-- Dropdown -->' +
                                  '<div class="dropdown card-dropdown">' +
                                    '<a class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown">' +
                                      '<i class="fe fe-more-vertical text-dark"></i>' +
                                    '</a>' +
                                    '<div class="dropdown-menu dropdown-menu-right">' +
                                      '<a class="fee-edit dropdown-item" fee_id="' + response.data[i].fee_id + '" fee_grade="' + response.data[i].grade_id + '" fee_name="' + response.data[i].fee_name + '" fee_total="' + response.data[i].fee_total + '">' +
                                        'Edit' +
                                      '</a>' +
                                      '<a class="dropdown-item fee-delete" fee_id="' + response.data[i].fee_id + '">' +
                                        'Delete' +
                                      '</a>' +
                                    '</div>' +
                                  '</div>' +

                                  '<!-- Avatar -->' +
                                  '<div class="text-center">' +
                                    '<p class="fee-data-info-grade">' + response.data[i].grade_name + '</p>' +
                                  '</div>' +

                                  '<!-- Title -->' +
                                  '<h2 class="card-title text-center p-2">' +
                                    '<p style="font-size: 22px;"  class="fee-data-info-name">' + response.data[i].fee_name + '<span class="pl-7 fee-data-info-total">' + response.data[i].fee_total + '</span></p>' +
                                  '</h2>' +
                                  '<!-- Divider -->' +
                                  '<hr>' +

                                  '<div class="row align-items-center">' +
                                    '<div class="col">' +

                                      '<!-- Time -->' +
                                      '<p class="card-text">' +
                                        'Separated ' + k + ' parts for payment' +
                                      '</p>' +

                                    '</div>' +
                                    '<div class="col-auto">' +
                                      '<button class="btn btn-link payment_btn" type="button" data-toggle="collapse" data-target="#collapseClass' + response.data[i].fee_id + '" aria-expanded="false" aria-controls="collapseClass">' +
                                        'payment details<span class="fe fe-chevrons-down class_collapse_btn"></span>' +
                                      '</button>' +
                                    '</div>' +
                                  '</div> <!-- / .row -->' +
                                  '<div class="collapse" id="collapseClass' + response.data[i].fee_id + '">' +
                                    '<div class="row">' +

                                        fee_parts +

                                    '</div>' +
                                    '<div class="container container-fluid input-group mt-3">' +
                                      '<input type="text" class="fee-part-new-input form-control" placeholder="Enter new payment amount">' +
                                      '<div class="input-group-append">' +
                                        '<button class="btn btn-success fee-part-new" for="' + response.data[i].fee_id + '">Create</button>' +
                                      '</div>' +
                                    '</div>' +
                                  '</div>' +
                                '</div> <!-- / .card-body -->' +
                                '</div>' +
                            '</div>';
                  }
                }
                $('#fee_cards').html(html);
              }

            });
          }
          $(document).on('click', '.fee-part-new', function() {
            console.log($(this).attr('for') + $(this).parent().siblings('.fee-part-new-input').val());
            var fee_part_new_btn = $(this);
            fee_part_new_btn.addClass('is-loading');
            var fee_id = $(this).attr('for');
            var fee_num_amount = $(this).parent().siblings('.fee-part-new-input').val();
            var new_fee_num = ({
              'fee_id' : fee_id,
              'fee_num_amount' : fee_num_amount
            });
            $http({
              method : 'POST',
              url : 'includes/http_req/forms/add_fee_one_num.php',
              data : new_fee_num,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              console.log(response.data);
              if(response.data) {
                reqFeeList();
                iziToast.success({
                  title: 'Success',
                  message: 'You added new fee part'
                });
              }
            });
          });
          $(document).on('click', '.del_fee_part_btn', function() {
            swal({
              title: "Are you sure?",
              text: "this can delete your recorded student payments",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            },
            function(){
              var fee_part_id = $(this).attr('for');
              var del_fee_part_info = ({
                'fee_part_id' : fee_part_id
              });
              $http({
                method : 'POST',
                url : 'includes/http_req/forms/del_fee_part.php',
                data : del_fee_part_info,
                headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
              }).then(function (response) {
                if(response.data) {
                  reqFeeList();
                  iziToast.success({
                    title: 'Success',
                    message: 'You edited one fee part'
                  });
                }
              });
              //swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });

          });
          $(document).on('click', '.edit_student_payment_btn', function() {

            $(this).parent().addClass("right");
            $(this).parent().siblings('.second-edit-btn-group').removeClass('left');
            $(this).parent().parent().prev().children('.each-payment-edit-info').hide();
            $(this).parent().parent().prev().children('.each-payment-edit-input').show();
            $(this).parent().parent().prev().children('.each-payment-edit-input').val($(this).parent().parent().prev().children('.each-payment-edit-info').text());
            $(this).parent().parent().prev().children('.each-payment-edit-input').select();
            //$(this).parent().addClass('right');
            // var textdata = '';
            // $(this).css('display','none');
            // $(this).siblings().css('opacity','0');
            // var amount = $(this).parent().siblings('.paymet_amount').text();
            // $(this).parent().siblings('.paymet_amount').text('');
            // textdata += '<div class="input-group  text-right">'+
            // '<input type="text" class="form-control" value="'+amount+'">'+
            // '<div class="input-group-append">'+
            // '<button class="btn btn-outline-secondary fe fe-check" type="button"></button>'+
            // '<button class="btn btn-outline-secondary fe fe-x text-dange" type="button"></button>'+
            // '</div></div>';
            // $(this).parent().siblings('.paymet_amount').html(textdata);
          });

          $(document).on('click', '.close_edit_stu_payment_btn', function() {
            $(this).parent().removeClass("right");
            $(this).parent().siblings('.second-edit-btn-group').addClass('left');
            $(this).parent().parent().prev().children('.each-payment-edit-info').show();
            $(this).parent().parent().prev().children('.each-payment-edit-input').hide();
          });

          $(document).on('click', '.close_edit_stu_payment_btn', function() {
            $(this).parent().addClass('left');
            $(this).parent().siblings('.first-edit-btn-group').removeClass('right');
          });
          $('.create_fee_btn').click(function () {
            $('#manage_fee_modal').modal('show');
          });
          $('#add_new_fee_btn').click(function () {
            $('#manage_fee_modal').modal('show');
          });
          $('#fee_part').keyup(function () {
            var parts = $('#fee_part').val();
            var fee_card="";
            var th = "";
            for (var i = 1; i <= parts; i++) {
              if (i==1) {
                th="st";
              }else if (i==2) {
                th='nd';
              }else if(i==3){
                th="rd";
              }else {
                th="th";
              }
              fee_card +=
              '<div class="from-group col-6">'+
                '<label class="col-form-label">'+i+'<sup>'+th+'</sup> payment</label>'+
                '<input for="' + i + '" type="number" class="form-control fee_part">'+
              '</div>'
            }
            $('#fee_part_item').html(fee_card);
          });
          $scope.editFee = function() {
            var fee_name = $('#edit_fee_name').val();
            var fee_grade = $('#edit_fee_grade').val();
            var fee_total = $('#edit_fee_total').val();
            var edit_fee_info = ({
              'fee_id' : edit_fee_id,
              'fee_name' : fee_name,
              'fee_grade' : fee_grade,
              'fee_total' : fee_total
            });
            $http({
              method : 'POST',
              url : 'includes/http_req/forms/edit_fee.php',
              data : edit_fee_info,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              if(response.data) {
                reqFeeList();
                $('#edit_fee_modal').modal('hide');
                iziToast.success({
                  title: 'Success',
                  message: 'You edited a fee'
                });
              }

            });
          }
          $scope.addFee = function() {
            var fee_name = $('#fee_name').val();
            var fee_amount = $('#total_fee_amount').val();
            var fee_number = $('#fee_part').val();
            var grade_id = $('#add_fee_grade_combo').val();
            var fee_data = [];
            var fee_parts = [];
            console.log(fee_name, fee_amount, fee_number);

            $('.fee_part').each(function(i, el) {
              num = $(el).attr('for');
              value = $(el).val();
              console.log(num + ' ' + value);
              fee_parts.push({
                id: num,
                value: value
              });
            });
            fee_data.push({
              'fee_name': fee_name,
              'fee_amount': fee_amount,
              'fee_number': fee_number,
              'grade_id': grade_id,
              'fee_parts': fee_parts
            });
            console.log(fee_data);
            $http({
              method : 'POST',
              url : 'includes/http_req/forms/add_fee.php',
              data : fee_data,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              console.log(response.data);
            });
            // for(i in response.data) {
            //   data.push(
            //     {id: response.data[i].grade_id, text: response.data[i].grade_name}
            //   );
            // };
          }
          $(document).on('click', '.edit_fee_part_btn', function() {
            var fee_part_id = $(this).attr('for');
            var fee_part_amount = $(this).parent().parent().prev().children('.each-payment-edit-input').val();

            var edit_fee_part_id = ({
              'fee_part_id' : fee_part_id,
              'fee_part_amount' : fee_part_amount
            });
            $http({
              method : 'POST',
              url : 'includes/http_req/forms/edit_fee_part.php',
              data : edit_fee_part_id,
              headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
            }).then(function (response) {
              if(response.data) {
                reqFeeList();
                iziToast.success({
                  title: 'Success',
                  message: 'You edited one fee part'
                });
              }
            });
          });
          $(document).on('click','.payment_btn',function(){
            $(this).children('span').toggleClass("rotate");
          });//end class_collapse_btn
        });//end manage-acdmCtrl
        app.controller('manage-stufeeCtrl',function($scope, $http){
          $http.get('includes/http_req/api/req_grade.php')
          .then(function (response) {
            if(response.data) {
              var data = [];
              for(i in response.data) {
                data.push(
                  {id: response.data[i].grade_id, text: response.data[i].grade_name}
                );
              };
            }
            $('#grade_name_select').select2({
              data: data
            }).trigger('change');
            $('#fee_name_select').select2({
              data: data
            });
          });
        }); //end manage-stufeeCtrl
        function feeSearch() {
          var input, filter, fee_cards_div, fee_cards, fee_cards_info_grade, i;
          input = document.getElementById("fee-search");
          filter = input.value.toUpperCase();
          fee_cards_div = document.getElementById("fee_cards");
          fee_cards = fee_cards_div.getElementsByClassName("fee-cards");
          for (i = 0; i < fee_cards.length; i++) {
            fee_cards_info_grade = fee_cards[i].getElementsByClassName("fee-data-info-grade")[0];
            //console.log(fee_cards_info_grade.innerHTML);
            if (fee_cards_info_grade) {
              if (fee_cards_info_grade.innerHTML.toUpperCase().indexOf(filter) > -1) {
                fee_cards[i].style.display = "";
              } else {
                fee_cards[i].style.display = "none";

                fee_cards_info_name = fee_cards[i].getElementsByClassName("fee-data-info-name")[0];
                if (fee_cards_info_name) {
                  if (fee_cards_info_name.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    fee_cards[i].style.display = "";
                  } else {
                    fee_cards[i].style.display = "none";

                    fee_cards_info_total = fee_cards[i].getElementsByClassName("fee-data-info-total")[0];
                    if (fee_cards_info_total) {
                      if (fee_cards_info_total.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        fee_cards[i].style.display = "";
                      } else {
                        fee_cards[i].style.display = "none";
                      }
                    }
                  }
                }
              }
            }
          }
        }
    </script>
  </body>
</html>
<?php } ?>
