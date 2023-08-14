@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <form action="/admin/bookings" method="POST" class="card-header">
                @csrf
                <br/>
                <div class="d-flex justify-content-start align-items-end">
                  <div>
                    <label class="text-label">Dari</label>
                    <input name="now" id="date-from" type="date" class="form-control"/>
                  </div>
                  <div class="ml-3">
                    <label class="text-label">Hingga</label>
                    <input name="next" type="date" class="form-control"/>
                  </div>

                  <button type="submit" class="btn btn-outline-primary ml-3">Terapkan</button>
                </div>
              </form>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat Lengkap</th>
                        <th>Nomer HP/Whatsap</th>
                        <th>Mobil</th>
                        <th>Harga</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Jumlah Hari</th>
                        <th>Biaya</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->nama_lengkap }}</td>
                                <td>{{ $booking->alamat_lengkap }}</td>
                                <td>
                                    <a href="telp:{{ $booking->nomer_wa }}">{{ $booking->nomer_wa }}</a>
                                </td>
                                <td>{{ $booking->car->nama_mobil }}</td>
                                <td>{{ $booking->car->price }}</td>
                                <td>{{ $booking->penyewaan }}</td>
                                <td>{{ $booking->pengembalian }}</td>
                                <td>{{ $booking->hari }}</td>
                                <td>{{ $booking->biaya }}</td>
                                <td>
                                <div class="btn-group btn-group-sm">
                                    <form onclick="return confirm('are you sure !')" action="{{ route('admin.bookings.destroy', $booking) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" booking="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Kosong !</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('style-alt')
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt') 
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
    $("#data-table").DataTable()
    </script>
@endpush