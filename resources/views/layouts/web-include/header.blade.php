<!-- Sidebar Menu-->
<div class="menu"> 
    <span class="close-menu icon-cross2 right-boxed"></span>
    <ul class="menu-list right-boxed">
      <li  data-menuanchor="home">
        <a  href="{{ route('home') }}">Home</a>
      </li>
      <li  data-menuanchor="about">
        <a href="{{ route('home') }}#about">About</a>
      </li>
      <li  data-menuanchor="projects">
        <a href="{{ route('home') }}#projects">Projects</a>
      </li>
      @if(is_have_testimonial())
      <li  data-menuanchor="testimonial">
        <a href="{{ route('home') }}#testimonial">Testimonial</a>
      </li>
      @endif
      <li  data-menuanchor="clients">
        <a href="{{ route('home') }}#clients">Clients</a>
      </li>
      @if(is_have_blog())
      <li  data-menuanchor="blogs">
        <a href="{{ route('home') }}#blogs">Blog</a>
      </li>
      @endif
      <li  data-menuanchor="contact">
        <a href="{{ route('home') }}#contact">Contact</a>
      </li>
    </ul>
  </div>

  <!-- Navbar -->

  <header class="navbar navbar-2 navbar-white boxed">
      <div class="navbar-bg"></div>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>

      <div class="row">
          <div class="col-md-1 col-xs-2">
              <a class="brand" href="{{ route('home') }}">
              <img class="brand-img" alt="" src="{{ asset('assets/site-asset/images/logo1.png') }}">
              </a>
          </div>
          <div class="col-md-8">
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item" data-menuanchor="home">
                  <a class="nav-link active" aria-current="page" href="{{ route('home') }}#home">Home</a>
                  </li>
                  <li class="nav-item" data-menuanchor="about">
                  <a class="nav-link" href="{{ route('home') }}#about">About</a>
                  </li>
                  <li class="nav-item" data-menuanchor="projects">
                  <a class="nav-link" href="{{ route('home') }}#projects">Project</a>
                  </li>
                  @if(is_have_testimonial())
                  <li class="nav-item" data-menuanchor="testimonial">
                  <a class="nav-link " href="{{ route('home') }}#testimonial">Testimonial</a>
                  </li>
                  @endif
                  <li class="nav-item" data-menuanchor="clients">
                  <a class="nav-link " href="{{ route('home') }}#clients">Clients</a>
                  </li>
                  @if(is_have_blog())
                  <li class="nav-item" data-menuanchor="blogs">
                  <a class="nav-link " href="{{ route('home') }}#blogs">Blog</a>
                  </li>
                  @endif
                  {{-- <li class="nav-item" data-menuanchor="store">
                    <a class="nav-link " href="{{ route('home') }}#store">Store</a>
                  </li> --}}
                  <li class="nav-item" data-menuanchor="contact">
                  <a class="nav-link " href="{{ route('home') }}#contact">Contact</a>
                  </li>
              </ul>
              </div>
          </div>
      
      </div>

      <!-- <div class="social-list hidden-xs">
          <a href="#" class="icon ion-social-twitter"></a>
          <a href="#" class="icon ion-social-facebook"></a>
          <a href="#" class="icon ion-social-instagram"></a>
      </div> -->
      <div class="vlt-fixed-socials">
          <a class="vlt-social-icon vlt-social-icon--style-1" href="https://www.instagram.com/mrsatyam.io/profilecard/?igsh=MTJpZWFjdzducWh0MA==" target="_blank">
              <i class="fab fa-instagram"></i>
          </a>
          <a class="vlt-social-icon vlt-social-icon--style-1" href=" https://www.linkedin.com/in/satyam-mukherjee3426a6275?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app " target="_blank">
              <i class="fab fa-linkedin-in"></i>
          </a>
          <a class="vlt-social-icon vlt-social-icon--style-1" href=" https://www.facebook.com/satyam.mukherjee.733 " target="_blank">
              <i class="fab fa-facebook-square"></i>
          </a>
          <a class="vlt-social-icon vlt-social-icon--style-1" href="https://www.youtube.com/@mrsatyam-io" target="_blank">
            <i class="fab fa-youtube"></i>
        </a>
      </div>
  </header>