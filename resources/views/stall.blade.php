<!--Stall.php-->
@extends('layouts.app')

@section('content')

@if($stalls->count() > 0 || request('search'))
<section class="section" style="padding-top:100px;">

    <div class="container">

        <div class="text-center mb-5">
            <h1 class="fw-bold">
                {{ ucfirst($mahallah) }}
            </h1>
        </div>

        <form method="GET" action="">   
            <div class="row justify-content-center mb-5">
                <div class="col-lg-5 d-flex">
                    <input type="text"
                           name="search"
                           class="form-control rounded-pill shadow-sm"
                           placeholder="Find your food craving..."
                           value="{{ trim(request('search')) }}">

                    <button type="submit" class="btn btn-primary ms-2">
                        Search
                    </button>
                </div>
            </div>
        </form> 

        @if($stalls->count() > 0)
        <div class="row gy-4">

            @foreach($stalls as $stall)

            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <img src="{{ asset('assets/img/foodpic/' . ($stall->image_path ?? 'default.jpg')) }}"
                         class="card-img-top"
                         alt="{{ $stall->name }}"
                         style="height:220px; object-fit:cover;">

                    <div class="card-body d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0">
                                {{ $stall->name }}
                            </h5>
                        </div>

                        <hr class="mt-1 mb-3">

                        <p class="text-muted mb-3 small">
                             {{ $stall->opening_hours }}
                        </p>

                       <a href="javascript:void(0);" 
   class="text-decoration-none fw-semibold btn-see-details mt-auto" 
   style="color: #305fc4;"
   data-name="{{ $stall->name }}"
   data-menu="{{ json_encode($stall->menu_items) }}"> See more details →
</a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>
        @else

        <div class="text-center my-5">
            <h3>No Stall Found</h3>
            <p class="text-muted">
                 No stall matches "{{ request('search') }}"
            </p>
        </div>

        @endif

    </div>
</section>

@else

<section class="section">
    <div class="container text-center">
        <h2>Mahallah Not Found</h2>
    </div>
</section>

@endif

<div class="modal fade" id="stallMenuModal" tabindex="-1" aria-labelledby="popupStallName" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border: 3px solid #040b1a; border-radius: 15px; overflow: hidden;">
      
      <div class="modal-header" style="background-color: #040b1a; color: #ffffff;">
        <h5 class="modal-title fw-bold" id="popupStallName">Stall Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body p-4" style="background-color: #ffffff;">
        <h6 class="fw-bold mb-3 text-secondary">Available Food & Drinks:</h6>
        <ul class="list-group list-group-flush" id="popupMenuList">
             </ul>
      </div>
      
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-sm text-white" data-bs-dismiss="modal" style="background-color: #040b1a; border-radius: 20px; padding: 5px 20px;">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const detailLinks = document.querySelectorAll('.btn-see-details');
    const myModal = new bootstrap.Modal(document.getElementById('stallMenuModal'));
    const popupStallName = document.getElementById('popupStallName');
    const popupMenuList = document.getElementById('popupMenuList');

    detailLinks.forEach(link => {
        link.addEventListener('click', function () {
            const stallName = this.getAttribute('data-name');
            const menuRaw = this.getAttribute('data-menu');
            
            popupStallName.textContent = stallName;
            popupMenuList.innerHTML = '';

            // Bersihkan teks daripada tanda petikan "
            let cleanedMenu = menuRaw.replace(/["']/g, '');

            if (cleanedMenu && cleanedMenu.trim() !== "" && cleanedMenu !== "null") {
                const items = cleanedMenu.split(',');
                items.forEach(item => {
                    if (item.trim() !== '') {
                        popupMenuList.innerHTML += `
                            <li class="list-group-item py-2" style="border: none; border-bottom: 1px solid #f0f0f0;">
                                <i class="bi bi-dot"></i> ${item.trim()}
                            </li>
                        `;
                    }
                });
            } else {
                popupMenuList.innerHTML = `<li class="list-group-item text-muted text-center">No menu items listed for this stall yet.</li>`;
            }

            myModal.show();
        });
    });
});
</script>
@endsection

