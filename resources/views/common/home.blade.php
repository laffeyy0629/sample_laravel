@extends('layout.main-master')

@section('content')

<style>
    body {
        background-color: #0d1f4b; 
        background-image: url('{{URL('images/1344914.jpeg')}}'); /* For some reason nage-error even tho tama naman */
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
        color: #ffffff; 
    }

    .carousel-inner img {
        border-radius: 10px;
        border: 2px solid #00aaff; 
    }

    .carousel-caption h5, 
    .carousel-caption p {
        background-color: rgba(0, 0, 0, 0.6); 
        padding: 10px;
        border-radius: 8px;
        color: #80d6ff;
    }

    .accordion-button {
        background-color: #0d1f4b; /
        color: #80d6ff; 
        border: 1px solid #00aaff; 
    }

    .accordion-button:not(.collapsed) {
        background-color: #00aaff; 
        color: #ffffff;
    }

    .accordion-body {
        background-color: #000000; 
        color: #ffffff; 
    }

    .img-thumbnail {
        border-color: #00aaff; 
    }

    .img-thumbnail:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
        border-color: #80d6ff; 
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #00aaff;
        border-radius: 50%;
    }
</style>

<div class="container">
<div class="row">
        <!-- Carousel Section -->
        <div class="col-lg-12 mb-4">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{URL('images/makoto.jpg')}}" class="d-block w-100" alt="Makoto Yuki Splash Art">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Makoto Yuki</h5>
                            <p>The protagonist of Persona 3, is a transfer student enrolling in Gekkoukan High School in Iwatodai City. He is an orphan whose parents died on the Moonlight Bridge in their car during a fatal incident a decade prior to the game. </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{URL('images/mitsuru.jpg')}}" class="d-block w-100" alt="Mitsuru Kirijo Splash Art">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Mitsuru Kirijo</h5>
                            <p>Mitsuru is the heiress of the Kirijo Group, a very wealthy family run conglomerate. She is a founding member of S.E.E.S. and was one of the first to awaken to a Persona. Despite managing S.E.E.S., being student council president, and part of the fencing club, Mitsuru maintains excellent grades and graduates as valedictorian of her class.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{URL('images/yukari.jpg')}}" class="d-block w-100" alt="Yukari Takeba Splash Art">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Yukari Takeba</h5>
                            <p>Yukari is a normal and well-adjusted girl, very social and empathetic, with an interest in fashion. She is generally popular at school and is known for kindness and extroversion. Yukari has a sibling-like relationship with Junpei, and is initially jealous and suspicious of Mitsuru for being the popular student council president and for her ties with the Kirijo Group.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Accordion Section -->
        <div class="col-lg-4">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Persona 3
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Persona 3 follows a group of high school students trying to cope with, understand and accept death in a world surrounded by it, as well as find their own reasons for living. They form a group called SEES in order to investigate the Dark Hour, a mysterious time period between one day and the next that few people are aware of.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            S.E.E.S.
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            The Specialized Extracurricular Execution Squad, (特別課外活動部, Tokubetsu Kagai Katsudou-bu)?, known as the Special Extracurricular Execute Sector in the Japanese version and ultimately shortened to SEES, is an extracurricular after-school club for Persona users at Gekkoukan High School in Persona 3. 
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            The Dark Hour
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            The Dark Hour (影時間, Kage-jikan)? is a phenomenon that occurs in Persona 3. The Dark Hour occurs for an hour every night as a time anomaly that takes place during 12:00 AM, and serves as the 25th hour hidden between one day and the next. As the phenomenon takes place, non-Persona users are transmogrified into coffins and remember nothing that happens during the Dark Hour once they awaken. Because of this, the general public is unaware of its existence. 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Cards Section -->
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{URL('images/aigis.jpg')}}" class="img-thumbnail">
                </div>
                <div class="col-lg-4">
                    <img src="{{URL('images/junpei.jpg')}}" class="img-thumbnail">
                </div>
                <div class="col-lg-4">
                    <img src="{{URL('images/fuuka.jpg')}}" class="img-thumbnail">
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col-lg-4">
                    <img src="{{URL('images/Shinjiro.jpg')}}" class="img-thumbnail">
                </div>
                <div class="col-lg-4">
                    <img src="{{URL('images/koromaru.jpg')}}" class="img-thumbnail">
                </div>
                <div class="col-lg-4">
                    <img src="{{URL('images/ken.jpg')}}" class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
