@section('title', 'WAPALA Telkom University')
@section('css')
    <style>
        .wrap{
            background-image:url('{{ asset('jumbotron2.jpg') }}');
            width:100%;
            height:100vh;
            background-size:cover;
            position: relative;
            background-position: center; /* Center the background image */
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
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            padding: 20px; /* Add padding to avoid text touching edges on small screens */
        }

        .parallax-window {
        min-height: 315px;
        background: transparent;
        }

        .divisi{
            width: 200px;
            height: 500px;
        }
         .btn-primary {
        background-color: #0b5ed7;
        border-color: #0b5ed7;
        transition: 0.25s ease;
        }

        .btn-primary:hover {
        background-color: #084298;
        border-color: #084298;
        }
    </style>
@endsection
@section('jumbotron')
<div class="jumbotron m-0">
                <h1 class="display-3 fw-bold">WAPALA Telkom University</h1>
                <p><em>~ Hamemayu Hayuning Bawana ~</em></p>
                @if (true)
                    <small class="text-muted">Tertarik ? Daftar Sekarang Juga! </small><br>
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary mt-1">Open Recruitment {{ now()->year }}</a>
                @endif
            </div>
            <div class="banner"></div>
@endsection
@include('template.header')
@if (session('success'))
    <script>
        alertify
        .alert("{!! session('message') !!}", function(){
            alertify.success("{!! session('success') !!}");
        }).setHeader("{!! session('title') !!}");
    </script>
@endif
<section class="mt-3 mb-1">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('siapakami2.png') }}" class="img-fluid mx-auto" alt="">
            </div>
            <div class="col mt-5 pt-3">
                <h2 class="mb-4">Siapa Kami ?</h2>
                <p>
                    Kami adalah WAPALA (Wahana Pencinta Alam) dibentuk pada 28 September 2004 dengan nama Wapala Akatel
                </p>
                <ul>
                    <li> ⁠28 September 2013 : WAPALA STT TELEMATIKA TELKOM</li>
                    <li> ⁠16 September 2017 : WAPALA IT Telkom</li>
                    <li> ⁠04 Oktober 2024 : WAPALA Telkom University</li>
                </ul>
                <small class="mt-5 text-italic text-danger">
                    Ragu-ragu harap kembali!
                </small>
                <br>
                <a href="/profil" class="btn btn-primary btn-small mt-3">
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>
<section class="mt-1">
    <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('tes.png') }}">
        <div class="container text-center py-5 my-5">
            <
        </div>
    </div>
</section>
@include('template.footer')
