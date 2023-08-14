@extends('frontend.layout')

@section('content')
<div
        class="hero inner-page"
        style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-5">
              <div class="intro">
                <h2><strong>{{ $car->nama_mobil }}</strong></h2>
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

              @if(session('success'))
              <div class="card-body card-body-custom pt-4">
                <h5>Pemesanan Berhasil</h5>
                <p>Untuk mengkonfirmasi pemesanan silahkan konfirmasi melalui whatsapp Admin</p>
              </div>

              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                  <a
                    class="btn d-flex align-items-center justify-content-center btn-success mt-auto"
                    href="https://api.whatsapp.com/send?phone=62895701782220&text=Hallo%20kak%20saya%20{{ session("success") }}%20mau%20booking%20mobil%20 {{ $car->nama_mobil }}" 
                    target="_blank"
                    style="width: 100%;color: white;"
                    >
                    Konfirmasi
                    <i class="ri ri-whatsapp-line ml-2"></i>
                  </a>
                </div>
              </div>
              @else
              <!-- Product actions-->
              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                  <button
                    class="btn d-flex align-items-center justify-content-center btn-primary mt-auto"
                    target="_blank"
                    style="width: 100%;"
                    data-bs-toggle="modal" data-bs-target="#modalSewa"
                    >Sewa Mobil</button>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- modal pemesanan --}}
    <div class="modal fade" id="modalSewa" tabindex="-1" aria-labelledby="modalSewaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="/booking" method="POST" class="modal-content">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title fs-5" id="modalSewaLabel">Isi Data Diri</h5>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
          </div>
          <div class="modal-body">

            <input type="hidden" name="car" value="<?= $car->id ?>"/>
            {{-- nama lengkap --}}
            <label class="form-label" for="#nama">Nama Lengkap</label>
            <input type="text" id='nama' placeholder="Masukan nama lengkap Anda" class="form-control mb-2" name="nama"/>

            {{-- nohp --}}
            <label class="form-label" for="#nohp">Nomor Telepon / Whatsapp</label>
            <input type="text" id='nohp' placeholder="Masukan Telepon atau Whatsapp Anda" class="form-control mb-2" name="nohp"/>

            {{-- alamat --}}
            <label class="form-label" for="#alamat">Alamat Lengkap</label>
            <textarea class="form-control mb-2" placeholder="Masukan alamat lengkap Anda" id="alamat" name="alamat"></textarea>

            <hr/>
            <label class="form-label" for="#sewa">Tanggal Penyewaan</label>
            <input type="date" id='sewa' placeholder="Pilih Tanggal Penyewaan" class="form-control mb-2" name="sewa"/>

            <label class="form-label" for="#pengembalian">Tanggal Pengembalian</label>
            <input type="date" id='pengembalian' placeholder="Pilih Tanggal Pengembalian" class="form-control mb-2" name="pengembalian"/>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info">Pesan Sekarang</button>
          </div>
        </form>
      </div>
    </div>
    {{--  --}}
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
@endsection