<!-- ********** Carousel Inicio ********** -->
<div id="carouselwithimages" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselwithimages" data-slide-to="0" class="active"></li>
        <li data-target="#carouselwithimages" data-slide-to="1"></li>
        <li data-target="#carouselwithimages" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active" data-interval="3000">
            <img src="{{ asset('img/banner1080.jpg') }}" class="d-block w-100" alt="Primera imagen carrusel">
        </div>
        <div class="carousel-item" data-interval="3000">
            <img src="{{ asset('img/escroomvr1080.jpg') }}" class="d-block w-100" alt="Segunda imagen carrusel">
        </div>
        <div class="carousel-item" data-interval="3000">
            <img src="{{ asset('img/banner-alquiler1080.jpg') }}" class="d-block w-100" alt="Tercera imagen carrusel">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselwithimages" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselwithimages" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- ********** Carousel Fin ********** -->
