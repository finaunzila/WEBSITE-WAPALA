@section('title', 'Album - WAPALA IT Telkom')

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

/* FILTER BUTTON */
.portfolio-menu ul{
    padding: 0;
    margin: 0;
}

.portfolio-menu ul li{
    list-style: none;
    display: inline-block;
    margin: 5px;
    border-radius: 30px;
    padding: 8px 18px;
    transition: .3s;
    cursor: pointer;
}

.portfolio-menu ul li.active,
.portfolio-menu ul li:hover{
    background: #2d6a4f !important;
    border-color: #2d6a4f !important;
}

/* CARD */
.gallery-card{
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 5px 18px rgba(0,0,0,0.08);
    transition: all .3s ease;
    height: 100%;
}

.gallery-card:hover{
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.15);
}

/* IMAGE */
.gallery-img{
    width: 100%;
    height: 240px;
    overflow: hidden;
}

.gallery-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}

.gallery-card:hover .gallery-img img{
    transform: scale(1.05);
}

/* CONTENT */
.gallery-content{
    padding: 15px;
    text-align: center;
}

.gallery-content p{
    margin: 0;
    font-size: 14px;
    color: #555;
    line-height: 1.7;
    white-space: normal;
}
</style>
@endsection


@section('jumbotron')
<div class="jumbotron mt-5 pt-5">
    <h1 class="display-3 fw-bold">Album</h1>
    <p><em>Beranda > Album</em></p>
</div>

<div class="banner"></div>
@endsection


@include('template.header')


<section class="my-5">

    <div class="container">

        {{-- FILTER --}}
        <div class="portfolio-menu mb-4 text-center">

            <ul>

                <li class="btn btn-primary btn-sm active"
                    data-filter="*">

                    Semua

                </li>

                @foreach ($kategori as $k)

                    <li class="btn btn-primary btn-sm"
                        data-filter=".{{ $k->id }}">

                        {{ $k->nama_kategori }}

                    </li>

                @endforeach

            </ul>

        </div>


        {{-- GALLERY --}}
        <div class="portfolio-item row">

            @foreach ($galeri as $g)

                @php
                    $fotos = json_decode($g->foto, true);

                    // Support data lama (single image)
                    if (!$fotos) {
                        $fotos = [$g->foto];
                    }
                @endphp

                <div class="item {{ $g->id_kategori }} col-lg-3 col-md-4 col-6 mb-4">

                    <div class="gallery-card">

                        {{-- FOTO --}}
                        <a href="{{ asset('storage/galeri/' . $fotos[0]) }}"
                           class="popup-btn">

                            <div class="gallery-img">

                                <img src="{{ asset('storage/galeri/' . $fotos[0]) }}"
                                     alt="{{ $g->deskripsi }}">

                            </div>

                        </a>


                        {{-- DESKRIPSI --}}
                        <div class="gallery-content">

                            <p>
                                {!! nl2br(e($g->deskripsi)) !!}
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<script>
    // FILTER ISOTOPE
    $('.portfolio-menu ul li').click(function(){

        $('.portfolio-menu ul li').removeClass('active');

        $(this).addClass('active');

        var selector = $(this).attr('data-filter');

        $('.portfolio-item').isotope({
            filter: selector
        });

        return false;
    });


    // POPUP IMAGE
    $(document).ready(function() {

        $('.popup-btn').magnificPopup({

            type : 'image',

            gallery : {
                enabled : true
            }

        });

    });
</script>


@include('template.footer')