<!--male.blade.php-->
@extends('layouts.app')

@section('content')

  <section id="mahallah-male" class="portfolio section" style="padding-top: 100px;">
    <div class="container section-title" data-aos="fade-up">
      <h2>Mahallah</h2>
      <p>MALE MAHALLAH</p>
    </div>
    <div class="container">
      <div class="row gy-4">

        @foreach ([
          'Mahallah Faruq', 'Mahallah Siddiq', 'Mahallah Uthman',
          'Mahallah Ali', 'Mahallah Bilal', 'Mahallah Zubair',
          'Mahallah Salahuddin'
        ] as $name)
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="portfolio-content h-100">
            <img src="{{ asset('assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $name }}</h4>
              <p>Explore food options in {{ $name }}</p>
              <a href="{{ route('stall', ['mahallah' => strtolower(str_replace('Mahallah ', '', $name))]) }}" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>

@endsection