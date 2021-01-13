@include('layouts.app')
<!-- Jumbotron-->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3">Niechorze</h1>
      <p class="lead">Najlepsze miejsce na wypoczynek.</p>
      <p class="lead">
        <div class="text-center">
          <a class="btn button-custom btn-lg" href="/add" role="button">Rezerwacja</a>
        </div>
      </p>
    </div>
  </div>
  <div id="ofertaHeader" class="text-center">
      <h1 class="display-3 naglowki">Nasza oferta</h1>
      <p class="lead">Zapoznaj się z naszymi jedynymi swoim rodzaju domkami!</p>
  </div>
<div id="cards">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="card-flyer">
                        <div class="text-box">
                            <div class="image-box">
                                <img src="{{ asset('img/purple_house.jpg') }}" alt="" />
                                <span>Fioletowa Chatka <br /> {{ $domki[0]->cena_za_noc }} PLN za noc</span>
                            </div>
                            <div class="text-container">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="card-flyer">
                        <div class="text-box">
                            <div class="image-box">
                                <img src="{{ asset('img/hobbitt.jpg') }}" alt="" />
                                <span>Domek Hobbita <br /> {{ $domki[1]->cena_za_noc }} PLN za noc</span>
                            </div>
                            <div class="text-container">                                    
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="card-flyer">
                    <div class="text-box">
                        <div class="image-box">
                            <img src="{{ asset('img/woods.jpg') }}" alt="" />
                            <span>Leśny Szałas <br /> {{ $domki[2]->cena_za_noc }} PLN za noc</span>
                        </div>
                        <div class="text-container">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <h4 class="custom-heading">Znajdź nas</h4>
            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Niechorze&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://piratebayproxy.net/">piratebay</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
        </div>
    </div>
</div>
<footer id="stopka" class="navbar-fixed-bottom footer">
    <div id="stopkaa" class="container">
        <p id="footer-text">&copy; Stanisław Konarski, Bartosz Stajkowski</p>
    </div>
</footer>
</body>
</html>
