<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('themev2/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('themev2/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('themev2/css/style.css')}}" />



    <title>PADESS</title>
  </head>
  <body>
    <section class="header">
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <div class="top-contact">
                <ul>
                  <li><img class="img-contact" src="{{ asset('themev2/img/Loc.png')}}" alt="adress"> 14, rue aristide ledantec x pierre millon</li>
                  <li><img class="img-contact" src="{{ asset('themev2/img/2x/ph.png')}}" alt="telephone">+221 33 889 25 80</li>
                  <li><img class="img-contact2" src="{{ asset('themev2/img/2x/mail.png')}}" alt="mail">contact@pides.con</li>
                </ul>
              </div>
            </div>
            <div class="col-md-5">
              <div class="social float-right d-sm-flex align-items-center">
                <span>Rester connecter :</span>
                <ul>
                  <li><a href="#"><img class="img-social" src="{{ asset('themev2/img/fb.png')}}" alt="Facebook"></a></li>
                  <li><a href="#"><img class="img-social" src="{{ asset('themev2/img/tw.png')}}" alt="Twitter"></a></li>
                  <li><a href="#"><img class="img-social" src="{{ asset('themev2/img/yt.png')}}" alt="Youtube"></a></li>
                  <li class="divider">|</li>
                  <li><a href="#"><img class="img-social" src="{{ asset('themev2/img/fr.png')}}" alt="Francais"></a></li>
                  <li><a href="#"><img class="img-social" src="{{ asset('themev2/img/eng.png')}}" alt="Englais"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="banner">
        <div class="container">
          <div class="row">
            <div class="col">
              <img
                src="{{ asset('themev2/img/padess-banner.png')}}"
                alt="SYSTEME D’INFORMATION ET DE SUIVI-EVALUATION DU PADESS"
                class="img-fluid"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="navigation">
        <div class="container">
          <div class="row">
            <div class="col">
              <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand logo" href="#">
                  <img src="{{ asset('themev2/img/logo-padess.png')}}" alt="PADESS" />
                </a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-toggle="collapse"
                  data-target="#navbarNavAltMarkup"
                  aria-controls="navbarNavAltMarkup"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#"
                      >ACCUEIL <span class="sr-only">(current)</span></a
                    >
                    <a class="nav-item nav-link" href="#">PROGRAMME</a>
                    <a class="nav-item nav-link" href="#">CONTEXTE</a>
                    <a class="nav-item nav-link" href="#">APPROCHE</a>
                    <a class="nav-item nav-link" href="#">IDENTIFICATION</a>
                    <a class="nav-item nav-link" href="#">OUTILS DE TRAVAIL</a>
                  </div>
                  <a class="btn btn-primary ml-auto" href="{{ route('login') }}"> Se connecter</a>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="slide">
        <div
          id="carouselExampleIndicators"
          class="carousel slide"
          data-ride="carousel"
        >
          <ol class="carousel-indicators">
            <li
              data-target="#carouselExampleIndicators"
              data-slide-to="0"
              class="active"
            ></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('themev2/img/slide1.jpg')}}" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="{{ asset('themev2/img/slide2.jpg')}}" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="{{ asset('themev2/img/slide3.jpg')}}" class="d-block w-100" alt="..." />
            </div>
          </div>
          <a
            class="carousel-control-prev"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a
            class="carousel-control-next"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <section class="body">
      <div class="container">
          <div class="shadow-sm p-3 mb-3 bg-white rounded"> <h1 class="text-center2">ACTUALITÉS PADESS</h1></div>
        <div class="media">
            <img src="{{ asset('themev2/img/logo-padess.png')}}" class="align-self-top mr-3" alt="LOGO DE PADESS">
            <div class="media-body">

              <p>  Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim cupiditate assumenda quae tenetur obcaecati repellendus odio molestiae quia minus vitae aliquid blanditiis rem magnam, officia necessitatibus quos praesentium ut laudantium? dis parturient montes, nascetur ridiculus mus. Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            </div>
          </div>
        <div class="row">
          <div class="col-md-6">
            <div class="actu card">
              <img src="{{ asset('themev2/img/actu5.jpg')}}" alt="" class="card-img-top" />
              <div class="card-body">
                <h4 class="card-title">
                  LOREM IPSUM
                </h4>
                <div class="d-sm-flex">
                  <p class="card-text">
                    Excepturi facilis velit repellendus nam optio, cum,
                    reiciendis modi distinctio aliquid ratione laborum inventore
                    unde. A laboriosam laborum quos rerum consectetur. Incidunt.
                  </p>
                  <a href="#" class="btn btn-primary align-self-end ml-md-3"
                    >Voir&nbsp;plus</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="actu card">
              <img src="{{ asset('themev2/img/actu1.jpg')}}" alt="" class="card-img-top" />
              <div class="card-body">
                <h4 class="card-title">
                  LOREM IPSUM
                </h4>
                <p class="card-text">
                  Excepturi facilis velit repellendus nam optio, cum, reiciendis
                  modi distinctio aliquid ratione laborum inventore unde. A
                  laboriosam laborum quos rerum consectetur. Incidunt.
                </p>
                <a href="#" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="actu card">
              <img src="{{ asset('themev2/img/actu2.jpg')}}" alt="" class="card-img-top" />
              <div class="card-body">
                <h4 class="card-title">
                  LOREM IPSUM
                </h4>
                <p class="card-text">
                  Excepturi facilis velit repellendus nam optio, cum, reiciendis
                  modi distinctio aliquid ratione laborum inventore unde. A
                  laboriosam laborum quos rerum consectetur. Incidunt.
                </p>
                <a href="#" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="actu card">
              <img src="{{ asset('themev2/img/actu6.jpg')}}" alt="" class="card-img-top" />
              <div class="card-body">
                <h4 class="card-title">
                  LOREM IPSUM
                </h4>
                <div class="d-sm-flex">
                  <p class="card-text">
                    Excepturi facilis velit repellendus nam optio, cum,
                    reiciendis modi distinctio aliquid ratione laborum inventore
                    unde. A laboriosam laborum quos rerum consectetur. Incidunt.
                  </p>
                  <a href="#" class="btn btn-primary align-self-end ml-md-3"
                    >Voir&nbsp;plus</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="actu card">
              <img src="{{ asset('themev2/img/actu3.jpg')}}" alt="" class="card-img-top" />
              <div class="card-body">
                <h4 class="card-title">
                  LOREM IPSUM
                </h4>
                <p class="card-text">
                  Excepturi facilis velit repellendus nam optio, cum, reiciendis
                  modi distinctio aliquid ratione laborum inventore unde. A
                  laboriosam laborum quos rerum consectetur. Incidunt.
                </p>
                <a href="#" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="actu card">
              <img src="{{ asset('themev2/img/actu4.jpg')}}" alt="" class="card-img-top" />
              <div class="card-body">
                <h4 class="card-title">
                  LOREM IPSUM
                </h4>
                <p class="card-text">
                  Excepturi facilis velit repellendus nam optio, cum, reiciendis
                  modi distinctio aliquid ratione laborum inventore unde. A
                  laboriosam laborum quos rerum consectetur. Incidunt.
                </p>
                <a href="#" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer-end">
                <div class="container">
                </div>

    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('themev2/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('themev2/js/popper.min.js')}}"></script>
    <script src="{{ asset('themev2/js/bootstrap.min.js')}}"></script>
  </body>
</html>
