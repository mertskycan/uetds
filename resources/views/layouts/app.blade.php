<!doctype html>
<html lang="en">

<!-- Mirrored from iqonic.design/themes/xray/html/dashboard-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Dec 2020 16:52:01 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>XRay - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('css/typography.css')}}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
       <!-- Full calendar -->
      <link href='{{asset('fullcalendar/core/main.css')}}' rel='stylesheet' />
      <link href='{{asset('fullcalendar/daygrid/main.css')}}' rel='stylesheet' />
      <link href='{{asset('fullcalendar/timegrid/main.css')}}' rel='stylesheet' />
      <link href='{{asset('fullcalendar/list/main.css')}}' rel='stylesheet' />
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @yield('css')
      <link href='{{asset('css/select2-bootstrap4.min.css')}}' rel='stylesheet' />
      <meta name="csrf-token" content="{{ csrf_token() }}" />


   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">

         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="index-2.html">
               <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="">
               <span>XRay</span>
               </a>
               <div class="iq-menu-bt-sidebar">
                     <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                           <div class="main-circle"><i class="ri-more-fill"></i></div>
                           <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                        </div>
                     </div>
                  </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li><a href="{{ route('home')}}"><i class="ri-home-8-fill"></i>Dashboard</a></li>
                    <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Yük & Sefer</span></li>
                    <!--<li>
                        <a href="#sefer" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-truck-fill"></i><span>Sefer</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="sefer" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{ route('sefer.create')}}"><i class="ri-add-fill"></i>Sefer Ekle</a></li>
                           <li><a href="{{ route('sefer.index')}}"><i class="ri-edit-2-fill"></i>Sefer Listesi</a></li>
                        </ul>
                     </li>  --> <li>
                        <a href="#yuk" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-truck-fill"></i><span>Yük</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="yuk" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{ route('yuk.create')}}"><i class="ri-add-fill"></i>Yük Ekle</a></li>
                           <li><a href="{{ route('yuk.index')}}"><i class="ri-edit-2-fill"></i>Yük Listesi</a></li>
                        </ul>
                     </li>

                     <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Şöför & Plaka</span></li>
                     <li>
                        <a href="#plaka" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-numbers-fill"></i><span>Plaka</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="plaka" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{ route('plaka.create')}}"><i class="ri-add-fill"></i>Plaka Ekle</a></li>
                           <li><a href="{{ route('plaka.index')}}"><i class="ri-edit-2-fill"></i>Plaka Listesi</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#sofor" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-file-fill"></i><span>Şöför</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="sofor" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{ route('sofor.create')}}"><i class="ri-add-fill"></i>Şöför Ekle</a></li>
                           <li><a href="{{ route('sofor.index')}}"><i class="ri-edit-2-fill"></i>Şöför Listesi</a></li>
                        </ul>
                     </li>
                     <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Firma & Kullanıcı</span></li>
                     <li>
                        <a href="#company" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-building-fill"></i><span>Firma</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="company" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{ route('company.create')}}"><i class="ri-add-fill"></i>Firma Ekle</a></li>
                           <li><a href="{{ route('company.index')}}"><i class="ri-edit-2-fill"></i>Firma Listesi</a></li>
                        </ul>
                     </li>





                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>

         <!-- Page Content  -->
         <div id="content-page" class="content-page">
             @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
             <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index-2.html" class="logo">
                     <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="">
                     <span>XRay</span>
                     </a>
                  </div>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-search-bar">
                     <form action="#" class="searchbox">
                        <input type="text" class="text search-input" placeholder="Type here to search...">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                     </form>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-more-fill"></i></div>
                           <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item">
                           <a class="search-toggle iq-waves-effect language-title" href="#"><img src="{{asset('images/small/flag-01.png')}}" alt="img-flaf" class="img-fluid mr-1" style="height: 16px; width: 16px;" /> English <i class="ri-arrow-down-s-line"></i></a>
                           <div class="iq-sub-dropdown">
                              <a class="iq-sub-card" href="#"><img src="{{asset('images/small/flag-02.png')}}" alt="img-flaf" class="img-fluid mr-2" />French</a>
                              <a class="iq-sub-card" href="#"><img src="{{asset('images/small/flag-03.png')}}" alt="img-flaf" class="img-fluid mr-2" />Spanish</a>
                              <a class="iq-sub-card" href="#"><img src="{{asset('images/small/flag-04.png')}}" alt="img-flaf" class="img-fluid mr-2" />Italian</a>
                              <a class="iq-sub-card" href="#"><img src="{{asset('images/small/flag-05.png')}}" alt="img-flaf" class="img-fluid mr-2" />German</a>
                              <a class="iq-sub-card" href="#"><img src="{{asset('images/small/flag-06.png')}}" alt="img-flaf" class="img-fluid mr-2" />Japanese</a>

                           </div>
                        </li>
                        <li class="nav-item iq-full-screen">
                           <a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="search-toggle iq-waves-effect">
                                 <i class="ri-notification-3-fill"></i>
                                 <span class="bg-danger dots"></span>
                              </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                                    </div>

                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/01.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Emma Watson Bini</h6>
                                             <small class="float-right font-size-12">Just Now</small>
                                             <p class="mb-0">95 MB</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/02.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">New customer is join</h6>
                                             <small class="float-right font-size-12">5 days ago</small>
                                             <p class="mb-0">Jond Bini</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/03.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Two customer is left</h6>
                                             <small class="float-right font-size-12">2 days ago</small>
                                             <p class="mb-0">Jond Bini</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/04.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">New Mail from Fenny</h6>
                                             <small class="float-right font-size-12">3 days ago</small>
                                             <p class="mb-0">Jond Bini</p>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="nav-item dropdown">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <i class="ri-mail-open-fill"></i>
                              <span class="bg-primary count-mail"></span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                                    </div>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/01.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Bini Emma Watson</h6>
                                             <small class="float-left font-size-12">13 Jun</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/02.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                             <small class="float-left font-size-12">20 Apr</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/03.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Why do we use it?</h6>
                                             <small class="float-left font-size-12">30 Jun</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/04.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Variations Passages</h6>
                                             <small class="float-left font-size-12">12 Sep</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{asset('images/user/05.jpg')}}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                             <small class="float-left font-size-12">5 Dec</small>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>

                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                           <img src="{{asset('images/user/1.jpg')}}" class="img-fluid rounded mr-3" alt="user">
                           <div class="caption">
                              <h6 class="mb-0 line-height">  {{ Auth::user()->name }}</h6>
                              <span class="font-size-12">Available</span>
                           </div>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello   {{ Auth::user()->name }}</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-profile-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Edit Profile</h6>
                                          <p class="mb-0 font-size-12">Modify your personal details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-account-box-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Account settings</h6>
                                          <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-lock-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Privacy Settings</h6>
                                          <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                       </div>
                                    </div>
                                 </a>

                             <div class="d-inline-block w-100 text-center p-3">
                                <a class="bg-primary iq-sign-btn"  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                             </div>



                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                             @csrf
                                         </form>


                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>

            </div>
         </div>
         @endguest
    @section('sidebar')

    @show

        @yield('content')

      <!-- Footer -->
      <footer class="bg-white iq-footer">
        <div class="container-fluid">
           <div class="row">
              <div class="col-lg-6">
                 <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                 </ul>
              </div>
              <div class="col-lg-6 text-right">
                 Copyright 2020 <a href="#">XRay</a> All Rights Reserved.
              </div>
           </div>
        </div>
     </footer>
  <!-- Footer END -->
     </div>
  </div>
  <!-- Wrapper END -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- Appear JavaScript -->
  <script src="{{asset('js/jquery.appear.js')}}"></script>
  <!-- Countdown JavaScript -->
  <script src="{{asset('js/countdown.min.js')}}"></script>
  <!-- Counterup JavaScript -->
  <script src="{{asset('js/waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
  <!-- Wow JavaScript -->
  <script src="{{asset('js/wow.min.js')}}"></script>
  <!-- Apexcharts JavaScript -->
  <script src="{{asset('js/apexcharts.js')}}"></script>
  <!-- Slick JavaScript -->
  <script src="{{asset('js/slick.min.js')}}"></script>
  <!-- Select2 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <!-- Owl Carousel JavaScript -->
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <!-- Magnific Popup JavaScript -->
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Smooth Scrollbar JavaScript -->
  <script src="{{asset('js/smooth-scrollbar.js')}}"></script>
  <!-- lottie JavaScript -->
  <script src="{{asset('js/lottie.js')}}"></script>
  <!-- am core JavaScript -->
  <script src="{{asset('js/core.js')}}"></script>
  <!-- am charts JavaScript -->
  <script src="{{asset('js/charts.js')}}"></script>
  <!-- am animated JavaScript -->
  <script src="{{asset('js/animated.js')}}"></script>
  <!-- am kelly JavaScript -->
  <script src="{{asset('js/kelly.js')}}"></script>
  <!-- Flatpicker Js -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <!-- Chart Custom JavaScript -->
  <script src="{{asset('js/chart-custom.js')}}"></script>

  <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

  <!-- Custom JavaScript -->
  <script src="{{asset('js/custom.js')}}"></script>
  @yield('script')
</body>

<!-- Mirrored from iqonic.design/themes/xray/html/dashboard-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Dec 2020 16:52:11 GMT -->
</html>
