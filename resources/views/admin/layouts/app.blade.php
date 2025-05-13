<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <style>
        /* Profil fotoğrafını yuvarlak yapmak için */
        .user-img-radious-style {
            border-radius: 50%; /* Fotoğrafı yuvarlak yapar */
            width: 50px;        /* Fotoğrafın genişliğini ayarla */
            height: 50px;       /* Fotoğrafın yüksekliğini ayarla */
            object-fit: cover;  /* Resmin yuvarlak alana düzgün bir şekilde yerleşmesini sağlar */
        }

    </style>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('panel2/assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('panel2/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('panel2/assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('panel2/assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />



    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">


</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">

            </div>
            <ul class="navbar-nav navbar-right">


                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{asset('img.png')}}" class="user-img-radious-style">
                        <span class="d-sm-none d-lg-inline-block"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">{{ Auth::user()->adsoyad }}</div>
                        <div class="dropdown-divider"></div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>


            </ul>
        </nav>

        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.html"> <img alt="image" src="{{asset('panel2/assets/img/logo.png')}}" class="header-logo" /> <span
                            class="logo-name">Otika</span>
                    </a>
                </div>

                <ul class="sidebar-menu">
                    <li class="menu-header"></li>
                    <li class="dropdown active">
                        <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Home</span></a>
                    </li>

                    <li class="dropdown ">
                        <a href="{{route('about.index')}}" class="nav-link"><i data-feather="monitor"></i><span>About</span></a>
                    </li>
                    <li class="dropdown ">
                        <a href="{{route('certificate.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Certificate</span></a>
                    </li>
                    <li class="dropdown ">
                        <a href="{{ route('project.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Projects</span></a>
                    </li>
                    <li class="dropdown ">
                        <a href="{{ route('blog.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Blogs</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="briefcase"></i><span>Hobbies</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('films.index') }}">Films</a></li>
                            <li><a class="nav-link" href="{{ route('series.index') }}">Series</a></li>
                            <li><a class="nav-link" href="{{ route('books.index') }}">Books</a></li>
                            <li><a class="nav-link" href="{{ route('music.index') }}">Musics</a></li>
                        </ul>
                    </li>

                    <li class="dropdown ">
                        <a href="{{ route('contact.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Contact</span></a>
                    </li>








                </ul>
            </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
          @yield('content')
            </section>
            <div class="settingSidebar">
                <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                </a>
                <div class="settingSidebar-body ps-container ps-theme-default">
                    <div class=" fade show active">
                        <div class="setting-panel-header">Setting Panel
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Select Layout</h6>
                            <div class="selectgroup layout-color w-50">
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                                    <span class="selectgroup-button">Light</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                    <span class="selectgroup-button">Dark</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Sidebar Color</h6>
                            <div class="selectgroup selectgroup-pills sidebar-color">
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                          data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                          data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Color Theme</h6>
                            <div class="theme-setting-options">
                                <ul class="choose-theme list-unstyled mb-0">
                                    <li title="white" class="active">
                                        <div class="white"></div>
                                    </li>
                                    <li title="cyan">
                                        <div class="cyan"></div>
                                    </li>
                                    <li title="black">
                                        <div class="black"></div>
                                    </li>
                                    <li title="purple">
                                        <div class="purple"></div>
                                    </li>
                                    <li title="orange">
                                        <div class="orange"></div>
                                    </li>
                                    <li title="green">
                                        <div class="green"></div>
                                    </li>
                                    <li title="red">
                                        <div class="red"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                           id="mini_sidebar_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Mini Sidebar</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                           id="sticky_header_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Sticky Header</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                <i class="fas fa-undo"></i> Restore Default
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                <a href="templateshub.net">Templateshub</a></a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
    </div>
</div>
<!-- General JS Scripts -->
<script src="{{asset('panel2/assets/js/app.min.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('panel2/assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{asset('panel2/assets/js/page/index.js')}}'"></script>
<!-- Template JS File -->
<script src="{{asset('panel2/assets/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{asset('panel2/assets/js/custom.js')}}"></script>


<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#Table').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json'
            },
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100],
        });
    });
</script>

</body>



</html>
