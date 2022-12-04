<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="/" class="logo">
            <img src="assets/images/logo.png" alt="" style="max-width: 112px;">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
            <li class="scroll-to-section"><a href="#services">Services</a></li>
            <li class="scroll-to-section"><a href="#projects">Projects</a></li>
            <?php if (session()->has('is_login')) : ?>
              <li class="has-sub">
                <a href="javascript:void(0)"><?= session()->get('username') ?></a>
                <ul class="sub-menu">
                  <li class="scroll-to-section"><a href="/logout">Logout</a></li>
                </ul>
              </li>
            <?php else : ?>
              <li class="scroll-to-section"><a href="/login">Login</a></li>
              <li class="scroll-to-section"><a href="/register">Register</a></li>
            <?php endif ?>
          </ul>
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>