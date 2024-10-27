  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/index" class="brand-link">

      <img src="/assets/img/logos/brave_point.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Brave Point</span>
    </a>


 <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="/dashboard" class="nav-link   {{ Route::is('dashboard') ? 'active' : '' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity="0.3"/><path fill="currentColor" d="M3 13h8V3H3zm2-8h4v6H5zm8 16h8V11h-8zm2-8h4v6h-4zM13 3v6h8V3zm6 4h-4V5h4zM3 21h8v-6H3zm2-4h4v2H5z"/></svg>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

          @if(Auth::user()->user_type=="Admin")
          <li class="nav-item">
            <a href="/admin/notifications" class="nav-link {{ Route::is('notifications') ? 'active' : '' }} ">
             <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5" opacity="0.3"/><path fill="currentColor" d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2m6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5z"/></svg>
              <p>
                 Notifications
                  <span class="badge badge-danger  count_notifications"></span>
                
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="/admin/category" class="nav-link {{ Route::is('category') ? 'active' : '' }} ">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 6h12M9 12h12M9 18h8M4 7a1 1 0 1 0 0-2a1 1 0 0 0 0 2Zm0 6a1 1 0 1 0 0-2a1 1 0 0 0 0 2Zm0 6a1 1 0 1 0 0-2a1 1 0 0 0 0 2Z"/></svg>
              <p>
                 Category
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/product" class="nav-link {{ Route::is('product') ? 'active' : '' }} ">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 1024 1024"><path fill="currentColor" fill-rule="evenodd" d="M160 144h304c8.837 0 16 7.163 16 16v304c0 8.837-7.163 16-16 16H160c-8.837 0-16-7.163-16-16V160c0-8.837 7.163-16 16-16m564.314-25.333l181.019 181.02c6.248 6.248 6.248 16.378 0 22.627l-181.02 181.019c-6.248 6.248-16.378 6.248-22.627 0l-181.019-181.02c-6.248-6.248-6.248-16.378 0-22.627l181.02-181.019c6.248-6.248 16.378-6.248 22.627 0M160 544h304c8.837 0 16 7.163 16 16v304c0 8.837-7.163 16-16 16H160c-8.837 0-16-7.163-16-16V560c0-8.837 7.163-16 16-16m400 0h304c8.837 0 16 7.163 16 16v304c0 8.837-7.163 16-16 16H560c-8.837 0-16-7.163-16-16V560c0-8.837 7.163-16 16-16"/></svg>
              <p>
                Product
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/delivery" class="nav-link {{ Route::is('delivery') ? 'active' : '' }} ">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><g fill="currentColor"><path d="M13 3H2v14a2 2 0 0 0 2 2a2 2 0 1 1 4 0h5z" opacity="0.16"/><path d="M2 3V2a1 1 0 0 0-1 1zm11 0h1a1 1 0 0 0-1-1zm0 6V8a1 1 0 0 0-1 1zM2 4h11V2H2zm10-1v16h2V3zM3 17V3H1v14zm10-7h5V8h-5zm8 3v4h2v-4zm-7 6V9h-2v10zm4.707.707a1 1 0 0 1-1.414 0l-1.414 1.414a3 3 0 0 0 4.242 0zm-1.414-1.414a1 1 0 0 1 1.414 0l1.414-1.414a3 3 0 0 0-4.242 0zM6.707 19.707a1 1 0 0 1-1.414 0l-1.414 1.414a3 3 0 0 0 4.242 0zm-1.414-1.414a1 1 0 0 1 1.414 0l1.414-1.414a3 3 0 0 0-4.242 0zm13.414 0c.196.195.293.45.293.707h2c0-.766-.293-1.536-.879-2.121zM19 19a1 1 0 0 1-.293.707l1.414 1.414A3 3 0 0 0 21 19zm-3-1h-3v2h3zm1.293 1.707A1 1 0 0 1 17 19h-2c0 .766.293 1.536.879 2.121zM17 19a1 1 0 0 1 .293-.707l-1.414-1.414A3 3 0 0 0 15 19zm-11.707.707A1 1 0 0 1 5 19H3c0 .766.293 1.536.879 2.121zM5 19a1 1 0 0 1 .293-.707l-1.414-1.414A3 3 0 0 0 3 19zm8-1H8v2h5zm-6.293.293c.196.195.293.45.293.707h2c0-.766-.293-1.536-.879-2.121zM7 19a1 1 0 0 1-.293.707l1.414 1.414A3 3 0 0 0 9 19zm14-2a1 1 0 0 1-1 1v2a3 3 0 0 0 3-3zm-3-7a3 3 0 0 1 3 3h2a5 5 0 0 0-5-5zM1 17a3 3 0 0 0 3 3v-2a1 1 0 0 1-1-1z"/></g></svg>
              <p>
              Delivery Fee           
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/orders" class="nav-link  {{ Route::is('orders') ? 'active' : '' }}">
             <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M20.756 5.345A1 1 0 0 0 20 5H6.181l-.195-1.164A1 1 0 0 0 5 3H2.75a1 1 0 1 0 0 2h1.403l1.86 11.164l.045.124l.054.151l.12.179l.095.112l.193.13l.112.065a1 1 0 0 0 .367.075H18a1 1 0 1 0 0-2H7.847l-.166-1H19a1 1 0 0 0 .99-.858l1-7a1 1 0 0 0-.234-.797M18.847 7l-.285 2H15V7zM14 7v2h-3V7zm0 3v2h-3v-2zm-4-3v2H7l-.148.03L6.514 7zm-2.986 3H10v2H7.347zM15 12v-2h3.418l-.285 2z"></path><circle cx="8.5" cy="19.5" r="1.5" fill="currentColor"></circle><circle cx="17.5" cy="19.5" r="1.5" fill="currentColor"></circle></svg>
              <p>
                Orders
                
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="/admin/transactions" class="nav-link  {{ Route::is('transactions') ? 'active' : '' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M4.58 8.607L2 8.454C3.849 3.704 9.158 1 14.333 2.344c5.513 1.433 8.788 6.918 7.314 12.25c-1.219 4.411-5.304 7.337-9.8 7.406"/><path d="M12 22C6.5 22 2 17 2 11m11.604-1.278c-.352-.37-1.213-1.237-2.575-.62c-1.361.615-1.577 2.596.482 2.807c.93.095 1.537-.11 2.093.47c.556.582.659 2.198-.761 2.634s-2.341-.284-2.588-.509m1.653-6.484v.79m0 6.337v.873"/></g></svg>
              <p>
                Transactions
                
              </p>
            </a>
          </li>
          
        
          <li class="nav-item">
            <a href="/admin/blog" class="nav-link  ">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M3 3v18h18V3zm15 15H6v-1h12zm0-2H6v-1h12zm0-4H6V6h12z"/></svg>
              <p>
                Blog
                
              </p>
            </a>
          </li>
         
           <li class="nav-item {{ Route::is('settings') ? 'menu-is-opening menu-open' : '' }}{{ Route::is('blog_settings') ? 'menu-is-opening menu-open' : ''}}{{ Route::is('home_page_settings') ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
             <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M19.14 12.94c.04-.3.06-.61.06-.94c0-.32-.02-.64-.07-.94l2.03-1.58a.49.49 0 0 0 .12-.61l-1.92-3.32a.49.49 0 0 0-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54a.484.484 0 0 0-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58a.49.49 0 0 0-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6s3.6 1.62 3.6 3.6s-1.62 3.6-3.6 3.6"/></svg>
              <p>
                Configurations
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/settings" class="nav-link  {{ Route::is('settings') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>App Configurations</p>
                </a>
              </li>
              <li class="nav-item">
               <a href="/admin/blog/blog_settings" class="nav-link  {{ Route::is('blog_settings') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Page Settings</p>
                </a>
              </li>
               <li class="nav-item">
               <a href="/admin/home_page_settings" class="nav-link  {{ Route::is('home_page_settings') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Page Settings</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item {{ Route::is('admins') ? 'menu-is-opening menu-open' : '' }}{{ Route::is('clients') ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="/admin/users/admins/" class="nav-link {{ Route::is('admins') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="/admin/users/clients/" class="nav-link {{ Route::is('clients') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client</p>
                </a>
              </li>
              
            </ul>
          </li>


          @else
          <li class="nav-item">
            <a href="/client/notifications" class="nav-link {{ Route::is('notifications') ? 'active' : '' }} ">
             <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5" opacity="0.3"/><path fill="currentColor" d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2m6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5z"/></svg>
              <p>
                 Notifications
                  <span class="badge badge-danger  count_notifications"></span>
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/client/orders" class="nav-link  {{ Route::is('orders') ? 'active' : '' }}">
             <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M20.756 5.345A1 1 0 0 0 20 5H6.181l-.195-1.164A1 1 0 0 0 5 3H2.75a1 1 0 1 0 0 2h1.403l1.86 11.164l.045.124l.054.151l.12.179l.095.112l.193.13l.112.065a1 1 0 0 0 .367.075H18a1 1 0 1 0 0-2H7.847l-.166-1H19a1 1 0 0 0 .99-.858l1-7a1 1 0 0 0-.234-.797M18.847 7l-.285 2H15V7zM14 7v2h-3V7zm0 3v2h-3v-2zm-4-3v2H7l-.148.03L6.514 7zm-2.986 3H10v2H7.347zM15 12v-2h3.418l-.285 2z"></path><circle cx="8.5" cy="19.5" r="1.5" fill="currentColor"></circle><circle cx="17.5" cy="19.5" r="1.5" fill="currentColor"></circle></svg>
              <p>
                Orders
                
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="/client/transactions" class="nav-link  {{ Route::is('transactions') ? 'active' : '' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M4.58 8.607L2 8.454C3.849 3.704 9.158 1 14.333 2.344c5.513 1.433 8.788 6.918 7.314 12.25c-1.219 4.411-5.304 7.337-9.8 7.406"/><path d="M12 22C6.5 22 2 17 2 11m11.604-1.278c-.352-.37-1.213-1.237-2.575-.62c-1.361.615-1.577 2.596.482 2.807c.93.095 1.537-.11 2.093.47c.556.582.659 2.198-.761 2.634s-2.341-.284-2.588-.509m1.653-6.484v.79m0 6.337v.873"/></g></svg>
              <p>
                Transactions
                
              </p>
            </a>
          </li>



          @endif
          <li class="nav-item">
            <a href="/auth/verify_token/{{Auth::user()->remember_token}}" class="nav-link  ">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M12.63 2c5.53 0 10.01 4.5 10.01 10s-4.48 10-10.01 10c-3.51 0-6.58-1.82-8.37-4.57l1.58-1.25C7.25 18.47 9.76 20 12.64 20a8 8 0 0 0 8-8a8 8 0 0 0-8-8C8.56 4 5.2 7.06 4.71 11h2.76l-3.74 3.73L0 11h2.69c.5-5.05 4.76-9 9.94-9m2.96 8.24c.5.01.91.41.91.92v4.61c0 .5-.41.92-.92.92h-5.53c-.51 0-.92-.42-.92-.92v-4.61c0-.51.41-.91.91-.92V9.23c0-1.53 1.25-2.77 2.77-2.77c1.53 0 2.78 1.24 2.78 2.77zm-2.78-2.38c-.75 0-1.37.61-1.37 1.37v1.01h2.75V9.23c0-.76-.62-1.37-1.38-1.37"/></svg>
              <p>
                Change Password
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/sign_out" class="nav-link  ">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M5 5h7V3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h7v-2H5zm16 7l-4-4v3H9v2h8v3z"/></svg>
              <p>
               Log Out
                
              </p>
            </a>
          </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>