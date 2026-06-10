<!--famale.blade.php-->
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

  <section id="mahallah-female" class="portfolio section" style="padding-top: 100px;">
    <div class="container section-title" data-aos="fade-up">
      <h2>Mahallah</h2>
      <p>FEMALE MAHALLAH</p>
    </div>
    <div class="container">
      <div class="row gy-4">

         @foreach ([
          'Mahallah Sumayyah'     => 'mahallah/mahallah sumayyah.jpg',
          'Mahallah Aminah'      => 'mahallah/mahallah aminah.jpg',
          'Mahallah Asma'     => 'mahallah/mahallah asma.jpg',
          'Mahallah Nusaibah'      => 'mahallah/mahallah nusaibah.jpg',
          'Mahallah Asiah'        => 'mahallah/mahallah asiah.jpg',
          'Mahallah Hafsah'     => 'mahallah/mahallah hafsah.jpg',
          'Mahallah Maryam'     => 'mahallah/mahallah maryam.jpg',
          'Mahallah Ruqayyah'     => 'mahallah/mahallah ruqayyah.jpg',
          'Mahallah Safiyyah'     => 'mahallah/mahallah safiyyah.jpg',
          'Mahallah Halimatul Sadiah' => 'mahallah/mahallah halimah.jpg'
        ] as $name => $image)
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="portfolio-content h-100">
            <!--<img src="{{ asset('assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="">-->
            <img src="{{ asset('assets/img/' . $image) }}" class="img-fluid mahallah-logo" alt="{{ $name }}">
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