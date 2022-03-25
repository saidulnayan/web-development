<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="http://127.0.0.1:8000/teachers/home"><i class="mdi mdi-view-grid" style="color: white;"></i></a>
          <a class="sidebar-brand brand-logo-mini" href="http://127.0.0.1:8000/teachers/home"><i class="mdi mdi-view-grid" style="color: white;"></i></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src={{asset("backend/images/faces/face15.jpg")}} alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Teacher</h5>
                  <span>CSE </span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="http://127.0.0.1:8000/user/profile" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Social connect</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="http://facebook.com" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Work Session</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://127.0.0.1:8000/teachers/home">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Notice Board</span>
              {{-- <i class="menu-arrow"></i> --}}
            </a>
            {{-- <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href={{asset("backend/pages/ui-features/buttons.html")}}>Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href={{asset("backend/pages/ui-features/dropdowns.html")}}>Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href={{asset("backend/pages/ui-features/typography.html")}}>Typography</a></li>
              </ul>
            </div> --}}
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/teachers/results')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Submit Results</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href={{asset("backend/pages/tables/basic-table.html")}}>
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Class Schedule</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href={{asset("backend/pages/charts/chartjs.html")}}>
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Account</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/teachers/materials')}}">
              <span class="menu-icon">
                <i class="mdi mdi-glass-tulip"></i>
              </span>
              <span class="menu-title">Upload Materials</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/reservations')}}">
              <span class="menu-icon">
                <i class="mdi mdi-glass-tulip"></i>
              </span>
              <span class="menu-title">Feedback</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/users')}}">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Class Link</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/teachers/attendance')}}">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Give Attendance</span>
              {{-- <i class="menu-arrow"></i> --}}
            </a>
            {{-- <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pages/home">Home Slider</a></li>
                <li class="nav-item"> <a class="nav-link" href="/pages/about">About Page</a></li>
                <li class="nav-item"> <a class="nav-link" href="/pages/menu">Menu Page</a></li>
                <li class="nav-item"> <a class="nav-link" href="/pages/chefs">Chefs Page</a></li>
                <li class="nav-item"> <a class="nav-link" href="/pages/contacts">Contact Page</a></li>
                
              </ul>
            </div> --}}
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Exam Routine</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Contacts</span>
            </a>
          </li>
        </ul>
      </nav>