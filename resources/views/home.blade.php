@extends('layouts.app')

@section('content')

  {{-- Hero --}}
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('assets/img/portfolio/iium.jpg') }}" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">Taste of IIUM</h2>
      <p data-aos="fade-up" data-aos-delay="200">Discover food menus and cafe locations across IIUM Mahallahs easily and quickly.</p>
      <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
        <a href="#about" class="btn-get-started me-3">Explore Food</a>
        <a href="#about" class="btn-get-started">View Mahallah</a>
      </div>
    </div>
  </section>

  {{-- About --}}
  <section id="about" class="about section">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <h3>About Taste of IIUM</h3>
          <img src="{{ asset('assets/img/beautifuliium.jpeg') }}" class="img-fluid rounded-4 mb-4" alt="">
          <p>Taste of IIUM is a web-based platform developed to help IIUM students and visitors explore food menus and cafe locations available in different Mahallahs.</p>
          <p>The system allows users to search food items, browse stalls, and identify food locations easily within the IIUM campus.</p>
        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
          <div class="content ps-0 ps-lg-5">
            <p class="fst-italic">Our platform is designed to improve accessibility and convenience, helping you easily explore food options across all Mahallah cafes in IIUM.</p>
            <ul>
              <li><i class="bi bi-check-circle-fill"></i> <span>Comprehensive Food Menus: View detailed menus, prices, and food descriptions for stalls across every Mahallah.</span></li>
              <li><i class="bi bi-check-circle-fill"></i> <span>Interactive Maps & Locations: Easily pinpoint the exact coordinates of your desired food locations.</span></li>
              <li><i class="bi bi-check-circle-fill"></i> <span>Smart Search & Browsing: Quickly search for specific food items, browse available stalls, and check operating hours.</span></li>
            </ul>
            <div class="position-relative mt-4">
              <img src="{{ asset('assets/img/food1.jpeg') }}" class="img-fluid rounded-4" alt="">
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Stats --}}
  <section id="stats" class="stats section light-background">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <div class="col-lg-3 col-md-6">
          <div class="stats-item d-flex align-items-center w-100 h-100">
            <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Students</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="stats-item d-flex align-items-center w-100 h-100">
            <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
              <p>Food Stalls</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="stats-item d-flex align-items-center w-100 h-100">
            <i class="bi bi-headset color-green flex-shrink-0"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="300" data-purecounter-duration="1" class="purecounter"></span>
              <p>Menu Items</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="stats-item d-flex align-items-center w-100 h-100">
            <i class="bi bi-people color-pink flex-shrink-0"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="1" class="purecounter"></span>
              <p>Mahallahs Covered</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Services --}}
  <section id="services" class="services section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Features</h2>
      <p>System Features</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-5">
        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item">
            <div class="img"><img src="{{ asset('assets/img/food.jpg') }}" class="img-fluid" alt=""></div>
            <div class="details position-relative">
              <div class="icon"><i class="bi bi-activity"></i></div>
              <a href="#" class="stretched-link"><h3>Search Food</h3></a>
              <p>Users can search food items, stalls, and Mahallah cafes easily.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
          <div class="service-item">
            <div class="img"><img src="{{ asset('assets/img/stall.jpg') }}" class="img-fluid" alt=""></div>
            <div class="details position-relative">
              <div class="icon"><i class="bi bi-broadcast"></i></div>
              <a href="#" class="stretched-link"><h3>Browse Stalls</h3></a>
              <p>Users can browse stall information, operating hours, and food images.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="service-item">
            <div class="img"><img src="{{ asset('assets/img/map.jpg') }}" class="img-fluid" alt=""></div>
            <div class="details position-relative">
              <div class="icon"><i class="bi bi-easel"></i></div>
              <a href="#" class="stretched-link"><h3>Mahallah Map</h3></a>
              <p>The system helps users locate Mahallah cafes across the IIUM campus.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Team --}}
  <section id="team" class="team section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>Team</h2>
      <p>CHECK OUR TEAM</p>
    </div>
    <div class="container">
      <div class="row gy-5">
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="pic"><img src="{{ asset('assets/img/team/marui.jpg') }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>MA RUI</h4>
              <span>System Analyst</span>
              <div class="social">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <div class="pic"><img src="{{ asset('assets/img/team/me.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>NURUL NISA AQILLA BINTI MOHD NAJIB</h4>
              <span>Frontend Developer</span>
              <div class="social">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <div class="pic"><img src="{{ asset('assets/img/humaiyira.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>SITI HUMAIRAH BINTI MOHAMAD SAUFE</h4>
              <span>Backend Developer</span>
              <div class="social">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="member">
            <div class="pic"><img src="{{ asset('assets/img/thilahh.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>WAN NURATHILAH BINTI KHAIRUL NIZAAM</h4>
              <span>Manager</span>
              <div class="social">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="member">
            <div class="pic"><img src="{{ asset('assets/img/hana.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>HANNA BATRISYIA BINTI MOHD SHAHRIR</h4>
              <span>Supervisor</span>
              <div class="social">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Contact --}}
  <section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Contact</h2>
      <p>Get in touch with us</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <div class="col-lg-6">
          <div class="row gy-4">
            <div class="col-lg-12">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>IIUM Gombak, KL, Malaysia 53100</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+60 5589 55488 55</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@tasteofiium.com</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <form action="#" method="post" class="php-email-form">
            @csrf
            <div class="row gy-4">
              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="col-md-12">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
              </div>
              <div class="col-md-12">
                <textarea name="message" class="form-control" rows="4" placeholder="Message" required></textarea>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection
  