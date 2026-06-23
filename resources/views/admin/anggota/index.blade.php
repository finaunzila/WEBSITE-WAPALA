@section('title', 'Anggota')
@include('admin.template.header')
@include('admin.template.sidebar')
@if(session('success'))
<div id="alertt" class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3" role="alert" style="z-index: 999;">
    <i class="bi bi-check-circle me-1"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 m-3" role="alert">
    <i class="bi bi-exclamation-octagon me-1"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Anggota</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Anggota</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Anggota</h5>
                <a href="{{ route('user.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i> Tambah</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>NIA</th>
                    <th>JK</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $u)
                  <?php
                    $prodi = \App\Models\Prodi::find($u->id_prodi);
                    $status = \App\Models\Status::find($u->id_status);
                  ?>
                    <tr>
                        <td>{{ $u->nama }}</td>
                        <td>{{ $u->prodi->nama_prodi ?? '-' }} - {{ $u->tahun }}</td>
                        <td>{{ $u->nia }}</td>
                        @if ($u->jenis_kelamin === 'L')
                        <td><i class="bx bx-male-sign"></i> ( {{ $u->jenis_kelamin }} )</td>
                        @else
                        <td><i class="bx bx-female-sign"></i> ( {{ $u->jenis_kelamin }} )</td>
                        @endif
                        <td>{{ $u->status->nama_status ?? '-' }}</td>
                        <td>
                            <a href="{{ route('user.edit', $u->id) }}" class="btn btn-sm btn-warning text-white me-2 mb-2 mt-2"><i class="ri-edit-box-line"></i></a>
                            <form action="{{ route('user.destroy', $u->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button href="{{ route('user.destroy', $u->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapusnya ?');"><i class="ri-delete-bin-2-line"></i></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@include('admin.template.footer')
