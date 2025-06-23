<div class="header @@classList">
    <!-- navbar -->
    <nav class="navbar-classic navbar navbar-expand-lg">
      <a id="nav-toggle" href="#"><i
          data-feather="menu"
  
          class="nav-icon me-2 icon-xs"></i></a>
      <div class="ms-lg-3 d-none d-md-none d-lg-block">
        <!-- Form -->
        <form class="d-flex align-items-center">
          <input type="search" class="form-control" placeholder="Search" />
        </form>
      </div>
      <!--Navbar nav -->
      <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
        <li class="dropdown stopevent">
          {{-- <a class="btn btn-light btn-icon rounded-circle indicator
            indicator-primary text-muted" href="#" role="button"
            id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="icon-xs" data-feather="bell"></i>
          </a> --}}
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"
            aria-labelledby="dropdownNotification">
            <div>
              <div class="border-bottom px-3 pt-2 pb-3 d-flex
                justify-content-between align-items-center">
                <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>
                <a href="#" class="text-muted">
                  <span>
                    <i class="me-1 icon-xxs" data-feather="settings"></i>
                  </span>
                </a>
              </div>
              <!-- List group -->
              <ul class="list-group list-group-flush notification-list-scroll">
                <!-- List group item -->
                <li class="list-group-item bg-light">
  
  
                  <a href="#" class="text-muted">
                      <h5 class=" mb-1">Rishi Chopra</h5>
                      <p class="mb-0">
                        Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.
                      </p>
                  </a>
  
  
  
            </li>
               <!-- List group item -->
               <li class="list-group-item">
  
  
                <a href="#" class="text-muted">
                    <h5 class=" mb-1">Neha Kannned</h5>
                    <p class="mb-0">
                      Proin at elit vel est condimentum elementum id in ante. Maecenas et sapien metus.
                    </p>
                </a>
  
  
  
          </li>
                <!-- List group item -->
                <li class="list-group-item">
  
  
                  <a href="#" class="text-muted">
                      <h5 class=" mb-1">Nirmala Chauhan</h5>
                      <p class="mb-0">
                        Morbi maximus urna lobortis elit sollicitudin sollicitudieget elit vel pretium.
                      </p>
                  </a>
  
  
  
            </li>
                <!-- List group item -->
                <li class="list-group-item">
  
  
                      <a href="#" class="text-muted">
                          <h5 class=" mb-1">Sina Ray</h5>
                          <p class="mb-0">
                            Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu diam.
                          </p>
                      </a>
  
  
  
                </li>
              </ul>
              <div class="border-top px-3 py-2 text-center">
                <a href="#" class="text-inherit fw-semi-bold">
                  View all Notifications
                </a>
              </div>
            </div>
          </div>
        </li>
        <!-- List -->
        <li class="dropdown ms-2">
          <a class="rounded-circle" href="#" role="button" id="dropdownUser"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-md avatar-indicators avatar-online">
              <img alt="avatar" src="{{ asset('tourism/images/cropped-logo.png') }}"
                class="rounded-circle" />
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end"
            aria-labelledby="dropdownUser">
            {{-- <div class="px-4 pb-0 pt-2">
  
  
              <div class="lh-1 ">
                <h5 class="mb-1"> John E. Grainger</h5>
                <a href="#" class="text-inherit fs-6">View my profile</a>
              </div>
              <div class=" dropdown-divider mt-3 mb-2"></div>
            </div> --}}
  
            <ul class="list-unstyled">
  
              {{-- <li>
                <a class="dropdown-item" href="#">
                  <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>Edit
                  Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item"
                  href="#">
                  <i class="me-2 icon-xxs dropdown-item-icon"
                    data-feather="activity"></i>Activity Log
                </a>
  
  
              </li>
  
              <li>
                <a class="dropdown-item text-primary" href="#">
                  <i class="me-2 icon-xxs text-primary dropdown-item-icon"
                    data-feather="star"></i>Go Pro
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="me-2 icon-xxs dropdown-item-icon"
                    data-feather="settings"></i>Account Settings
                </a>
              </li> --}}
              <li>
                <a class="dropdown-item" href="{{route('admin.logout')}}">
                  <i class="me-2 icon-xxs dropdown-item-icon"
                    data-feather="power"></i>Sign Out
                </a>
              </li>
            </ul>
  
          </div>
        </li>
      </ul>
    </nav>
  </div>


{{-- <header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
         
            <div class="navbar-brand-box">
                <a href="/admin-part" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('frontend/images/logo.png')}}" alt="logo-sm" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('frontend/images/logo.png')}}" alt="logo-dark" height="40">
                    </span>
                </a>

                <a href="/admin-part" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('frontend/images/logo.png')}}" alt="logo-sm-light" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('frontend/images/logo.png')}}" alt="logo-light" height="40">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
        
                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primaray" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-apps-2-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="px-lg-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/github.png" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                    <span>Mail Chimp</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/slack.png" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                      data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="ri-shopping-cart-line"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="assets/images/users/avatar-3.jpg"
                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="flex-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="assets/images/users/avatar-4.jpg"
                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="flex-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('admin-dashboard/assets/images/logo-icon.png')}}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                   
                    <a class="dropdown-item text-danger" href="{{route('admin.logout')}}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="ri-settings-2-line"></i>
                </button>
            </div>

        </div>
    </div>
</header> --}}