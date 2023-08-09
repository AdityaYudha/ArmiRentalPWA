@extends('frontend.layout')

@section('content')
<div
        class="hero inner-page"
        style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-5">
              <div class="intro">
                <h1><strong>{{ $car->nama_mobil }}</strong></h1>
                <div class="custom-breadcrumbs">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Section-->
    <section class="py-5">
      <div class="container ">
        <div class="row justify-content-center">
          <div class="col-lg-8 mb-5">
            <div class="card h-100">
              <!-- Product image-->
              <img src="{{ Storage::url($car->image) }}" alt="Image" class="img-fluid" />
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div>
                  <!-- Product name-->
                  <h3 class="fw-bolder text-primary">{{ $car->nama_mobil }}</h3>
                  <p>{{ $car->description }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card">
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                  <!-- Product name-->
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <h5 class="fw-bolder">Harga</h5>
                    <div class="rent-price mb-3">
                      <span style="font-size: 1rem" class="text-primary"
                        >Rp{{ number_format($car->price,0,",",".") }}</span
                      >/hari
                    </div>
                  </div>
                  <ul class="list-unstyled list-style-group">
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Bahan Bakar</span>
                      <span class="capitalize-text" style="font-weight: 600">{{ $car->bahanbakar }}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Jumlah Kursi</span>
                      <span style="font-weight: 600">{{ $car->penumpang }}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Transmisi</span>
                      <span style="font-weight: 600">{{ $car->transmisi }}</span>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Product actions-->
             
              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                  <a
                    class="btn d-flex align-items-center justify-content-center btn-primary mt-auto"
                    href="https://api.whatsapp.com/send?phone=62895701782220&text=Hallo%20kak%20saya%20mau%20booking%20mobil%20 {{ $car->nama_mobil }}" 
                    target="_blank"
                    style="column-gap: 0.4rem"
                    >Sewa Mobil <i class="ri-whatsapp-line"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
@endsection