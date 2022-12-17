<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="/">
      <img src="/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?= url_is('dashboard') ? 'active' : '' ?>" href="/dashboard">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= url_is('dashboard/orders*') ? 'active' : '' ?>" href="/dashboard/orders">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-list-ul text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= url_is('dashboard/cars*') ? 'active' : '' ?>" href="/dashboard/cars">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-car text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Cars</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= url_is('dashboard/types*') ? 'active' : '' ?>" href="/dashboard/types">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-server text-secondary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Types</span>
        </a>
      </li>
    </ul>
  </div>
</aside>