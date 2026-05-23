<!-- ===================================================== -->
<!-- FLEXSLIDER -->
<!-- ===================================================== -->

<?php if($slider_row > 0): ?>

<div class="row">

    <div class="col-sm-12">

        <div class="flexslider home-flexslider">

            <ul class="slides">

                <?php foreach($slider_beranda as $slide): ?>

                    <li>

                        <div class="slider-item">

                            <img
                                src="<?= site_url($slide->konten_background);?>"
                                alt="<?= $slide->konten_teks; ?>"
                            >

                            <div class="flex-caption">

                                <h2>
                                    <?= $slide->konten_teks; ?>
                                </h2>

                                <!-- <p>
                                    <?= $slide->konten_teks; ?>
                                </p> -->

                            </div>

                        </div>

                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    </div>

</div>

<?php endif; ?>


<!-- ===================================================== -->
<!-- OWL CAROUSEL -->
<!-- ===================================================== -->

<?php if($slider_row > 0): ?>

<div class="row">

    <div class="col-sm-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">
                    Galeri Slider Carousel
                </h3>

            </div>

            <div class="panel-body">

                <div class="owl-carousel carousel">

                    <?php foreach($slider_beranda as $slide): ?>

                        <div class="item">

                            <div class="carousel-item-box">

                                <img
                                    src="<?= site_url($slide->konten_logo); ?>"
                                    class="img-responsive"
                                    alt="<?= $slide->konten_teks; ?>"
                                >

                                <div class="carousel-caption-custom">

                                    <h4>
                                        <?= $slide->konten_teks; ?>
                                    </h4>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php endif; ?>


<!-- ===================================================== -->
<!-- BERITA -->
<!-- ===================================================== -->

<h1>Home / Beranda</h1>

<legend></legend>

<div class="row">

<?php foreach($berita as $row): ?>

    <?php

        $idberita  = $row->id_berita;
        $judul     = $row->judul_berita;
        $gbr       = $row->gambar;
        $isi       = $row->isi_berita;

        $tempWaktu = date(
            "d-m-Y H:i",
            strtotime($row->waktu)
        );

        $nama      = $row->nama_pengguna;

    ?>

    <div class="col-sm-4">

        <a
            href="<?=
                site_url(
                    'web/c_berita/get_detail_berita/'.$idberita
                );
            ?>"
            class="link-berita"
        >

            <div class="bg berita-content">

                <div class="berita-content-img">

                    <img
                        class="img-responsive berita-img"
                        src="<?= site_url($gbr); ?>"
                        alt="<?= $judul; ?>"
                    >

                </div>

                <div class="berita-content-text">

                    <h3>
                        <?= $judul; ?>
                    </h3>

                    <div class="meta-berita">

                        <i class="fa fa-user"></i>
                        <?= $nama; ?>

                        <br>

                        <i class="fa fa-clock-o"></i>
                        <?= $tempWaktu; ?>

                    </div>

                    <div class="text-berita">

                        <?= word_limiter(strip_tags($isi), 20); ?>

                    </div>

                    <h6>
                        Selanjutnya &raquo;
                    </h6>

                </div>

            </div>

        </a>

    </div>

<?php endforeach; ?>


<div class="col-sm-12 text-center">

    <?= $this->pagination->create_links(); ?>

</div>

</div>


<!-- ===================================================== -->
<!-- STYLE -->
<!-- ===================================================== -->

<style>

/* ========================================= */
/* FLEXSLIDER */
/* ========================================= */

.home-flexslider{
    margin-bottom:30px;
    border:0;
    box-shadow:none;
}

.home-flexslider img{
    width:100%;
    height:500px;
    object-fit:cover;
}

.slider-item{
    position:relative;
}

.flex-caption{
    position:absolute;
    left:40px;
    bottom:40px;
    background:rgba(0,0,0,0.6);
    color:#fff;
    padding:20px;
    max-width:500px;
}

.flex-caption h2{
    margin-top:0;
}

/* ========================================= */
/* OWL CAROUSEL */
/* ========================================= */

.carousel-item-box{
    position:relative;
    padding:5px;
}

.carousel-item-box img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.carousel-caption-custom{
    background:rgba(0,0,0,0.7);
    color:#fff;
    padding:10px;
}

.owl-buttons{
    margin-top:15px;
}

/* ========================================= */
/* BERITA */
/* ========================================= */

.link-berita{
    text-decoration:none !important;
    color:#333;
}

.berita-content{
    background:#fff;
    border:1px solid #ddd;
    margin-bottom:30px;
    transition:0.3s;
    min-height:450px;
}

.berita-content:hover{
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

.berita-img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.berita-content-text{
    padding:15px;
}

.meta-berita{
    margin-bottom:15px;
    color:#777;
}

.text-berita{
    line-height:24px;
}

/* ========================================= */
/* MOBILE */
/* ========================================= */

@media(max-width:768px){

    .home-flexslider img{
        height:250px;
    }

    .flex-caption{
        left:15px;
        right:15px;
        bottom:15px;
        padding:10px;
    }

    .flex-caption h2{
        font-size:20px;
    }

}

</style>


<!-- ===================================================== -->
<!-- JAVASCRIPT -->
<!-- ===================================================== -->

<script>

function nav_active(){

    $('#nav-home').removeClass('active');

    $('#nav-berita').addClass('active');

}

$(document).ready(function(){

    nav_active();

});


$(window).load(function(){

    $('.home-flexslider').flexslider({

        animation: "fade",
        slideshow: true,
        slideshowSpeed: 4000,
        animationSpeed: 600,
        controlNav: true,
        directionNav: true,
        keyboard: true

    });

});

</script>