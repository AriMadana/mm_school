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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link href="assets/css/pace.css" rel="stylesheet" />
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
                  <a class="dropdown-item" href="#!info-students">
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
                  <a class="dropdown-item" href="#!manage-acd_fees">
                    Acd_fees
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
        .when("/manage-acd_fees", {
            templateUrl : "ang_load_page/manage/manage-acd_fees.htm",
            controller : "manage-acdmfeeCtrl"
        })
        .when("/info-staffs", {
            templateUrl : "ang_load_page/info/info-staffs.htm",
            controller : "info-staffsCtrl"
        })
        .when("/info-teachers", {
            templateUrl : "ang_load_page/info/info-teachers.htm",
            controller : "info-teachersCtrl"
        })
        .when("/info-students", {
            templateUrl : "ang_load_page/info/info-students.htm",
            controller : "info-studentsCtrl"
        });
      });



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
          function grade_load(){
            $http.get('includes/http_req/api/req_grade.php')
            .then(function (response) {
              $scope.grade = response.data;
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
                            '<a class="dropdown-item">' +
                              'Edit' +
                            '</a>' +
                            '<a class="dropdown-item">' +
                              'Delete' +
                            '</a>' +
                          '</div>' +
                        '</div>' +

                        '<!-- Avatar -->' +
                        '<div class="text-center">' +
                          '<p>2019/2020</p>' +
                        '</div>' +

                        '<!-- Title -->' +
                        '<h2 class="card-title text-center p-3">' +
                          '<p style="font-size: 28px;">'+$scope.grade[i].grade_name+'</p>' +
                        '</h2>' +
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
                            '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseClass'+$scope.grade[i].grade_id+'" aria-expanded="false" aria-controls="collapseClass">' +
                              'Create Class<span class="fe fe-chevrons-down"></span>' +
                            '</button>' +
                          '</div>' +
                        '</div> <!-- / .row -->' +
                        '<div class="collapse" id="collapseClass'+$scope.grade[i].grade_id+'">' +
                          '<hr>' +
                          '<div>' +
                            '<ul class="list-group">' +
                              '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                                'Grade-8A' +
                                '<span>' +
                                  '<span class="fe fe-edit-2 mr-3 text-danger"></span>' +
                                  '<span class="fe fe-trash-2 mr-1 text-danger"></span>' +
                                '</span>' +
                              '</li>' +
                              '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                                'Grade-8B' +
                                '<span>' +
                                  '<span class="fe fe-edit-2 mr-3 text-danger"></span>' +
                                  '<span class="fe fe-trash-2 mr-1 text-danger"></span>' +
                                '</span>' +
                              '</li>' +
                            '</ul>' +
                            '<div class="input-group mt-3">' +
                              '<input type="text" class="form-control" placeholder="Enter new class name">' +
                              '<div class="input-group-append">' +
                                '<button class="btn btn-success">Create</button>' +
                              '</div>' +
                            '</div>' +
                          '</div>' +
                        '</div>' +
                      '</div> <!-- / .card-body -->' +
                    '</div>' +
                  '</div>';
                  $('#grade_item').html(grade_cards);
                }
              }else {
                $('#no_grade').show();
                $('#upper_grade_btn').hide();
              }
            });
          }

        });

        function acdmCond(acdm_year_from, server_year) {


          if (acdm_year_from.slice(0,4) < server_year) {
            return 'finished';
          } else if (acdm_year_from.slice(0,4) > server_year) {
            return 'upcoming';
          } else if (acdm_year_from.slice(0,4) == server_year) {
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
          $('.page-loader').show();
          $('body').addClass('pointer-event-none');
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
          function acdm_load(){
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
                server_time = date.toString().slice(11,15);


                $http.get('includes/http_req/api/req_acdm.php')
                .then(function (response) {
                  $('.page-loader').hide();
                  $('body').removeClass('pointer-event-none');
                  $('#add_new_acdm_modal').modal('hide');
                  $('#add_acdm_btn').removeClass('is-loading');
                  $scope.acdm = response.data;
                  if ($scope.acdm) {
                    $('#no_acdm').hide();
                    $('#create_acdm_year').show();
                    var acdm_cards = "";
                    for (var i = 0; i < $scope.acdm.length; i++) {
                      var acdm_cond = acdmCond($scope.acdm[i].acdm_year_from, server_time);
                      var acdm_cond_color = acdmCondColor(acdm_cond);
                      acdm_cards +=
                      '<div class="card mb-3">' +
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
                              '<a style="color: #fff" class="btn btn-sm btn-primary d-none d-md-inline-block">' +
                                'Activties' +
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
                });
              }
            });

          }
        });
        app.controller("info-studentsCtrl",function ($scope, $http) {
          $('#create_student_btn').click(function () {
            $('#info_student_modal').modal('show');
          });
          $('#add_new_student_btn').click(function () {
            $('#info_student_modal').modal('show');
          });
          $('#grade_name_select').select2();
          $('#selectedAcdmGrade').select2();
          $('#selectedAcdmYears').select2();
          flatpickr("#st_birthday", {});
          $('#phone_no').mask('00-000000000');
          var selected_grade = $('#grade_name_select').children("option:selected").val();
          var submit_btn = $('#submit_btn');
          var student_name = $('#student_name');
          toggle_invalid(student_name,submit_btn);
          var father_name = $('#father_name');
          toggle_invalid(father_name,submit_btn);
          var st_birthday = $('#st_birthday');
          toggle_invalid(st_birthday,submit_btn);
          var gender = $("input[name='gender']");
          gender.click(function () {
            gender.removeClass('is-invalid');
          });
          var st_address = $('#st_address');
          toggle_invalid(st_address,submit_btn);
          var phone_no = $('#phone_no');
          toggle_invalid(phone_no,submit_btn);
          function toggle_invalid(item,subtn) {
            item.keyup(function () {
              item.removeClass('is-invalid');
            });//end keyup
            item.change(function () {
              item.removeClass('is-invalid');
            });//end change
            subtn.click(function(){
                if (item.val()) {
                  console.log(item.val());
                }else {
                  item.addClass('is-invalid');
                }
            });//end subtn
          }//end toggle_invalid
          submit_btn.click(function(){
            var gender_val = $("input[name='gender']:checked").val();
            if (gender_val) {
              console.log(gender_val);
            }else {
              gender.addClass('is-invalid');
            }
            if (selected_grade && student_name.val() && father_name.val() && st_birthday.val() && gender_val && st_address.val() && phone_no.val()) {
              $('#student_name').val() = "";
              $('#info_student_modal').modal('hide');
            }
          });//end subtn
        });
		    app.controller('checkboxCtrl',function ($scope) {});
        app.controller("info-teachersCtrl",function ($scope, $http) {
          $('#create_teacher_btn').click(function () {
            $('#info_teacher_modal').modal('show');
          });
          $('#add_new_teacher_btn').click(function () {
            $('#info_teacher_modal').modal('show');
          });
          $('#grade_name_select').select2();
          $('#selectedAcdmGrade').select2();
          $('#selectedAcdmYears').select2();
          flatpickr("#tr_birthday", {});
          $('#phone_no').mask('00-000000000')
        });//end info-teachersCtrl
        app.controller('manage-acdmfeeCtrl',function($scope){
          $('#create_fee_btn').click(function () {
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
                '<input type="number" class="form-control" id="fee_part">'+
              '</div>'
            }
            $('#fee_part_item').html(fee_card);
          });

          $('.edit_student_payment_btn').click(function(){
            var textdata = '';
            $(this).css('display','none');
            $(this).siblings().css('opacity','0');
            var amount = $(this).parent().siblings('.paymet_amount').text();
            $(this).parent().siblings('.paymet_amount').text('');
            textdata += '<div class="input-group  text-right">'+
            '<input type="text" class="form-control" value="'+amount+'">'+
            '<div class="input-group-append">'+
            '<button class="btn btn-outline-secondary fe fe-check" type="button"></button>'+
            '<button class="btn btn-outline-secondary fe fe-x text-dange" type="button"></button>'+
            '</div></div>';
            $(this).parent().siblings('.paymet_amount').html(textdata);
          });
        });//end manage-acdmCtrl
    </script>
  </body>
</html>
<?php } ?>
