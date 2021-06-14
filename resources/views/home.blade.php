@extends('layouts.app')

@section('content')
<div style="overflow:hidden;padding-bottom:0;">
  <div class="container" style="padding-bottom:0;">
      <v-row class="home-row" style=" height: 90vh;">
          <v-col class="home-col"style="margin:auto 0">
              <h3>
                  Maak jouw eigen <br><span
                      style="color:#2BA9E1;text-transform:uppercase;font-weight:700;text-shadow: 1px 1px 4px rgb(43 169 225 / 25%);">portfolio</span> pagina
              </h3>
              <ul class="home-list">
                  <li><i class="fas fa-check small"></i> Perfect voor creatievelingen</li>
                  <li><i class="fas fa-check small"></i> Vereist geen voorkennis</li>
                  <li><i class="fas fa-check small"></i> Beveiligd betalingsysteem</li>
              </ul>
              <v-btn href="{{ route('login') }}" elevation="2" color="#2BA9E1"
                  style="color:white;text-transform:inherit;padding:2.2em 0;border-radius:8px;text-decoration:none;min-width: 75%;">
                  Begin nu
              </v-btn>
          </v-col>
          <v-col class="home-img home-hide" style="margin:auto 0"><a href="http://"></a>
              <img style="max-width:568px;" src="{{url('/images/home_img_Laptop.png')}}" alt="Image" />
          </v-col>
      </v-row>

      <v-row class="home-platform" style="height: 100vh;margin:160px 0 80px">
        <v-col class="home-hide">
        <img src="/images/home_portfolio.png" class="home-platform-img">
        </v-col>
        <v-col style="margin:auto 0" class="home-col">
          <v-card
            style="padding:1.5em; box-shadow:0;"
            class="mx-auto"
            max-width="370"
          >
            <v-card-text>
              <h3 style="font-weight: 400;font-size: 23px;" class="text--primary">
                Vind nu verschillende Creatieve professionals met MY WAY
              </h3>
              <br>
              <ul style="margin:0 !important;" class="home-list">
                <li><span style="font-weight:300:font-size:90%">Volgens hun</span></li>
                <li><span class="home-list-item">Beroep</span></li>
                <li><span class="home-list-item">Emoties</span></li>
                <li><span class="home-list-item">Ervaring</span></li>
              </ul>
            </v-card-text>
            <v-card-actions>
            <v-btn href="{{ route('search') }}" elevation="2" color="#2BA9E1"
                  style="color:white;text-transform:inherit;padding:2.2em 0;border-radius:8px;text-decoration:none;min-width: 100%;">
                  Zoek op
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>

      <div style="position:relative">
        <div class="home-cards">
        <!-- TEST-->
        </div>
        <v-row style="padding-top: 3.5em;">
          <v-col class="home-col">
            <v-card
              style="padding:1.5em; box-shadow:0;"
              class="mx-auto home-box-shadow"
              max-width="100%"
              min-height="230"
            >
              <v-card-text>
                <span class="home-icon"><i style="margin-bottom: 0.5em;" class="fas fa-shield-alt"></i></span>
                <h3 style="font-weight: 400;font-size: 20px;margin-bottom:-0.5em;" class="text--primary">
                  Beveiligd online
                </h3>
                <br>
                  <span style="font-weight:700;font-size: 115%;">
                  Alle website-data zijn beveiligd met HTTPS-encryptie</span>
                </ul>
              </v-card-text>
            </v-card>
          </v-col>
          <v-col class="home-col">
            <v-card
              style="padding:1.5em; box-shadow:0;"
              class="mx-auto home-box-shadow"
              max-width="100%"
              min-height="230"
            >
              <v-card-text>
                <span class="home-icon"><i style="margin-bottom: 0.5em;" class="fas fa-question-circle"></i></span>
                <h3 style="font-weight: 400;font-size: 20px;margin-bottom:-0.5em;" class="text--primary">
                  Klantenservice die je snapt
                </h3>
                <br>
                  <span style="font-weight:700;font-size: 115%;">
                  Onze support teams geven antwoorden in begrijpelijke taal</span>
                </ul>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
        <v-row  style="padding-bottom: 3.5em;">
          <v-col class="home-col">
            <v-card
              style="padding:1.5em; box-shadow:0;"
              class="mx-auto home-box-shadow"
              max-width="100%"
              min-height="230"
            >
              <v-card-text>
                <span class="home-icon"><i style="margin-bottom: 0.5em;" class="fas fa-map-marker-alt"></i></span>
                <h3 style="font-weight: 400;font-size: 20px;margin-bottom:-0.5em;" class="text--primary">
                  Klanten in heel vlaanderen
                </h3>
                <br>
                  <span style="font-weight:700;font-size: 115%;">
                  Beschikbaar voor alle vlaamse creatieve professionals</span>
                </ul>
              </v-card-text>
            </v-card>
          </v-col>
          <v-col class="home-col">
            <v-card
              style="padding:1.5em; box-shadow:0;"
              class="mx-auto home-box-shadow"
              max-width="100%"
              min-height="230"
            >
              <v-card-text>
                <span class="home-icon"><i style="margin-bottom: 0.5em;" class="fas fa-heart"></i></span>
                <h3 style="font-weight: 400;font-size: 20px;margin-bottom:-0.5em;" class="text--primary">
                  Makkelijk te gebruiken
                </h3>
                <br>
                  <span style="font-weight:700;font-size: 115%;">
                  Vraagt geen voorkennis, alles spreekt vanzelf</span>
                </ul>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </div>

      <div id="home-footer-div" style="position:relative">
        <div class="home-footer">
        </div>
        <v-row style="padding-top: 3.5em; color:white;">
          <v-col cols="5" class="home-col">
            <ul class="home-list">
              <li><h3 style="text-transform:uppercase">My way</h3>
              </li>
              <li style="margin-top:1em !important;">Een portfolio hebben? <br>
              Dat kan jij ook! Met <span style="uppercase">my way</span>
              </li>
            </ul>
          </v-col>
          <v-col md="2" class="home-col home-footer-col">
          <ul class="home-list">
              <li style="margin-top:1em !important;"><a href="#" class="home-footer-item">Product</a>
              </li>
              <li style="margin-top:1em !important;"><a href="#" class="home-footer-item">Prijzen</a>
              </li>
              <li style="margin-top:1em !important;"><a href="#" class="home-footer-item">Platform</a>
              </li>
            </ul>
          </v-col>
          <v-col md="2" class="home-col home-footer-col">
          <ul class="home-list">
              <li style="margin-top:1em !important;"><a href="#" class="home-footer-item">Over ons</a>
              </li>
              <li style="margin-top:1em !important;"><a href="#" class="home-footer-item">Over MY WAY</a>
              </li>
              <li style="margin-top:1em !important;"><a href="#" class="home-footer-item">Partner</a>
              </li>
            </ul>
          </v-col>
          <v-col md="2" class="home-col home-footer-col">
          <ul class="home-list">
              <li style="margin-top:1em !important;"><a href="#" class="home-footer-item">Service</a>
              </li>
              <li style="margin-top:1em !important;"><a href="#" class="home-footer-item">Contact</a>
              </li>
            </ul>
          </v-col>
        </v-row>
      </div>
      <div style="position:relative">
        <div class="home-footer-copyright">
        </div>
        <v-col style="color:white;text-align:center;font-size:10px !important;padding:1em 0;">
        <i class="fas fa-copyright 2" style="margin-right:0.3em;"></i> Copyright 2021 - <span style="text-transform:uppercase;">My way</span></v-col>
      </div>
  </div>
</div>
@endsection

<style>
@media only screen and (max-width: 870px) {
  .home-col{
    text-align:center;
    margin-top:2em;
  }
  .home-row{
    height: 384px !important;
  }
  .home-hide{
    display:none;
  }
}
@media only screen and (max-width: 500px) {
  .home-footer-col{
    display:none;
  }
  #home-footer-div.row.col{
    width:100%;
    min-width:100%;
  }
}
  .home-list {
    margin: 2em 0;
  }
  .home-list-item{
    font-weight:700;
    font-size: 115%;
  }
  .home-list li {
    list-style-type: none;
    margin: 0.5em 0;
  }
  .home-list li i {
    size: 1px;
  }
  .home-img {
    background-image:url({{url('images/home_img_Stroke.png')}});
    background-position: center;
    background-size: contain;
  }
  .home-platform {
    /**background-image:url({{url('images/test2.jpg')}});
    background-position: center;
    background-size: contain;**/
  }
  .home-hide{
    padding:0 !important;
  }
  .home-platform-img{
    margin-left:50px;
    background-color:white;
    width:125%;
    border-radius: 6px;
    -webkit-box-shadow: 5px -5px 0px 0px rgba(43,169,225,0.32); 
    box-shadow: 5px -5px 0px 0px rgba(43,169,225,0.32); 
  }
  .home-cards{
    height:100%;
    position:absolute;
    margin-left: -25em !important;
    width: 350% !important;
    background-color: white;
  }
  .home-icon{
    font-size: 2.5em;
    color:#62E882;
  }
  .home-box-shadow{
    box-shadow: 0px 0px 4px 3px rgba(0,0,0,0.05) !important;
    -webkit-box-shadow: 0px 0px 4px 3px rgba(0,0,0,0.05) !important;
    -moz-box-shadow: 0px 0px 4px 3px rgba(0,0,0,0.05) !important;
  }
  .home-footer{
    height:100%;
    position:absolute;
    margin-left: -25em !important;
    width: 350% !important;
    background-color: rgba(43,169,225,1);
  }
  .home-footer-col{
    padding-bottom: 3em !important;
  }
  .home-footer-copyright{
    height:100%;
    position:absolute;
    margin-left: -25em !important;
    width: 350% !important;
    background-color: #005377;
  }
  .home-footer-item, .home-footer-item:hover{
    color: white;
    text-decoration: none;
  }
</style>
