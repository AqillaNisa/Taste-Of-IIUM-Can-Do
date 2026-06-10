<!--male.blade.php-->
@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <style>
        body {
            background: #c2e1ff !important; /* Letak !important supaya warna biru ni override background default theme */
        }

        .page-title {
            text-align: center;
            margin: 40px 0;
        }

        .mahallah-card {
            border-radius: 15px;
            transition: all 0.4s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            /*background: #ffffff; Add a white background so that the card appears raised against the blue body color */
        }

        .mahallah-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.2);
        }

        .mahallah-logo {
            width: 100px;
            height: 200px;
            object-fit: cover;
            display: block;
            margin: 10px 10px 0 0;
        }
    </style>
@endpush

@section('content')
  
  <section id="mahallah-male" class="portfolio section" style="padding-top: 100px;">
    <div class="container section-title" data-aos="fade-up">
      <h2>Mahallah</h2>
      <p>MALE MAHALLAH</p>
    </div>

    <div class="back-nav">
    <div class="container-fluid container-xl">
      <a href="{{ url('/') }}" class="btn-back">
        <i class="bi bi-arrow-left-circle-fill" style="font-size: 20px;"></i> Back
      </a>
    </div>
  </div>

    <div class="container">
      <div class="row gy-4">

        @foreach ([
          'Mahallah Uthman'     => 'mahallah/mahallah uthman.jpg',
          'Mahallah Faruq'      => 'mahallah/mahallah faruq.jpg',
          'Mahallah Siddiq'     => 'mahallah/mahallah siddiq.jpg',
          'Mahallah Bilal'      => 'mahallah/mahallah bilal.jpg',
          'Mahallah Ali'        => 'mahallah/mahallah ali.jpg',
          'Mahallah Zubair'     => 'mahallah/mahallah zubair.jpg',
          'Mahallah Salahuddin' => 'mahallah/mahallah salahuddin.jpg'
        ] as $name => $image)

        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="portfolio-content h-100">
            <!--<img src="{{ asset('assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="">-->
            <img src="{{ asset('assets/img/' . $image) }}" class="img-fluid mahallah-logo" alt="Mahallah {{ $name }}">
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

