@section('title', 'Profil - WAPALA Telkom University')

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
        background-color: rgba(0, 0, 0, 0.5);
    }

    .wrap .jumbotron {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      text-align: center;
    }

    /* Memastikan ukuran bulatan tetap konsisten */
    .stat-circle {
        width: 70px;
        height: 70px;
        flex-shrink: 0;
    }
    </style>
@endsection

@section('jumbotron')
<div class="jumbotron mt-5 pt-5">
    <h1 class="display-3 fw-bold">Profil</h1>
    <p><em>Beranda > Profil</em></p>
</div>
<div class="banner"></div>
@endsection

@include('template.header')

<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Visi</h3>
                <p style="text-align: justify;">
                    WAPALA Telkom University sebagai organisasi yang memiliki kepedulian tinggi terhadap alam dan lingkungan sekitar serta dapat meningkatkan intelektualitas, jasmani, rohani, dan jiwa ksatria anggotanya.
                </p>
                <h3>Misi</h3>
                <p style="text-align: justify;">
                    <ol class="m-0 ps-3">
                        <li>Memperluas hubungan kerjasama dan mempererat rasa kekeluargaan yang harmonis serta saling menguntungkan dengan organisasi eksternal.</li>
                        <li>Menyelenggarakan kegiatan yang dapat membantu masyarakat dan turut serta dalam usaha pelestarian alam dan lingkungan hidup.</li>
                        <li>Membentuk anggota WAPALA Telkom University yang mampu berpikir dan bertindak kritis, bertanggung jawab, berwawasan luas yang berlandaskan nilai-nilai kekeluargaan.</li>
                        <li>Mengembangkan kegiatan dalam rangka peningkatan kualitas tata kelola organisasi.</li>
                    </ol>
                </p>
            </div>

            <div class="col-md-6">
                <div style="display: flex; align-items: center; margin-bottom: 25px;">
                    <div id="total" class="stat-circle"></div>
                    <div style="margin-left: 20px;">
                        <h5 style="margin: 0;">Total Keseluruhan Anggota</h5>
                        <small>Total seluruh anggota yang ada di WAPALA Telkom University</small>
                    </div>
                </div>

                <div style="display: flex; align-items: center; margin-bottom: 25px;">
                    <div id="ak" class="stat-circle"></div>
                    <div style="margin-left: 20px;">
                        <h5 style="margin: 0;">Anggota Kehormatan</h5>
                        <small>Total seluruh Anggota Kehormatan</small>
                    </div>
                </div>

                <div style="display: flex; align-items: center; margin-bottom: 25px;">
                    <div id="alb" class="stat-circle"></div>
                    <div style="margin-left: 20px;">
                        <h5 style="margin: 0;">Anggota Luar Biasa</h5>
                        <small>Total seluruh Anggota Luar Biasa</small>
                    </div>
                </div>

                <div style="display: flex; align-items: center;">
                    <div id="ab" class="stat-circle"></div>
                    <div style="margin-left: 20px;">
                        <h5 style="margin: 0;">Anggota Biasa</h5>
                        <small>Total seluruh Anggota Biasa</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="row">
        <div class="col text-center">
            <img src="{{ asset('arti logo WAPALA.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach ($angkatan as $a)
                <div class="col">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/foto-angkatan/' . $a->foto) }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $a->nama_angkatan }}</h5>
                            <p class="card-text">WAPALA {{ numberToRomanRepresentation($loop->iteration) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="{{ asset('js/progressbar.js') }}"></script>
<script>
    function drawCircle(id, value, label) {
        var bar = new ProgressBar.Circle(id, {
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            duration: 1400,
            easing: 'bounce',
            strokeWidth: 6,
            from: {color: '#FFEA82', a:0},
            to: {color: '#ED6A5A', a:1},
            step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.setText(label);
                circle.text.style.color = state.color;
            }
        });
        bar.animate(value);
    }

    drawCircle('#total', 1.0, "{{ $total }}");
    drawCircle('#ak', 1.0, "{{ $ak }}");
    drawCircle('#alb', 1.0, "{{ $alb }}");
    drawCircle('#ab', 1.0, "{{ $ab }}");
</script>

@php
    function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
@endphp

@include('template.footer')