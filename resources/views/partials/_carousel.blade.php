<div id="myCarousel" class="carousel slide mx-md-5 rounded overflow-hidden mt-2" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">

            <img src="{{ asset('images/sli1.png') }}" class="img-fluid w-100 h-100 object-fit-cover " alt="slide1" />

            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Renkli, Canlı ve Kültür dolu.</h1>
                    <p>Afrika modası koleksiyonumuzla renkli, canlı ve kültür dolu bir dünyaya adım atın.</p>
                    <p><a class="btn btn btn-danger" href="#">Alışverişe başla</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/sli4.png') }}" class="img-fluid w-100 h-100 object-fit-cover " alt="slide1" />

            <div class="container">
                <div class="carousel-caption text-end">
                    <h1>Afrika modasının kalbi</h1>
                    <p>Koleksiyonumuz, kıtanın en yetenekli tasarımcılarından gelen kıyafetleri içerir.</p>
                    <p><a class="btn btn-danger" href="/signup">Hesap oluştur</a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
