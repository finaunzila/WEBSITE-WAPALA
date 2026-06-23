@section('title', 'Kontak - WAPALA IT Telkom')
@section('css')
    <style>
    .wrap{
        background-image:url('{{ asset('jumbotron2.jpg') }}');
        width:100%;
        height:40vh;
        background-size:cover;
        background-position: center 60%;
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Ubah nilai alpha (0.5) sesuai dengan kebutuhan Anda */
    }

    .wrap .jumbotron {
      position: absolute; /* Absolute positioning for text */
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white; /* Adjust color for visibility */
      text-align: center; /* Center align text */
    }
    </style>
@endsection
@section('jumbotron')
<div class="jumbotron mt-5 pt-5">
    <h1 class="display-3 fw-bold">Kontak</h1>
        <p><em>Beranda > Kontak</em></p>
                {{-- <small class="text-muted">Tertarik ?</small><br>
                <a href="" class="btn btn-primary">Daftar Sekarang</a> --}}
</div>
<div class="banner"></div>
@endsection
@include('template.header')
        <section class="my-4">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d628.2003014704519!2d109.25150756388865!3d-7.434758635348436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655fb1bb70aa4b%3A0xd22ea5eae1b5aeda!2sDSP%20Institut%20Teknologi%20Telkom%20Purwokerto!5e0!3m2!1sid!2sid!4v1719768373035!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-6">
                        <h4>Hubungi Kami :</h4>
                        <hr>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label for="nama_lengkap" class="form-label">Instagram</label>
                            </div>
                            <div class="col-md-9">
                                <p>: wapalatelkomuniversity</p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label for="tempat_lahir" class="form-label">TikTok</label>
                            </div>
                            <div class="col-md-9">
                                <p>: wapalatelkomuniversity</p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="col-md-9">
                                <p>: wapalaittelkom@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('template.footer')
