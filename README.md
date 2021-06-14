<p align="center"><img src="https://firebasestorage.googleapis.com/v0/b/myway-86cfb.appspot.com/o/logotransparant.png?alt=media&token=e10c1620-7f9f-4caa-aafd-ac8c142aa37b" width="400"></p>

## MY WAY

Dit project bevat een webapplicatie die de mogelijkheid biedt aan de gebruikers om 
in een heel korte tijd een portfoliopagina aan te maken. Daarnaast heeft deze 
webapplicatie ook een platform waar men creatieve geesten kunnen opzoeken.


## Technologieën

* Vue.js 2.6.14
* Laravel 8.39.0
* npm 6.13.4

## Getting started

* Als je op windows bent heb je XAMPP nodig, dit kan je downloaden op deze url: 
https://www.apachefriends.org/download.html
* Maak via XAMPP een MySQL database en noem dit myway (Carachter collation 
staat standaart op utf8mb4_unicode_ci, wijzig dit anders).
* Download composer om met laravel te werken via deze url: 
https://getcomposer.org/download/
* Open het project in een gewenste editor.
* Verwijder het oude .env bestand en hernoem .env.example naar .env. Voer hier de 
gegevens van jouw database tabel (indien dit niet lukt open kladblok in 
administrator en open hierin de .env bestand en sla op).
* Start een nieuwe project op firebase via https://firebase.google.com/.
(Deze stap mag je skippen, ik laat mijn firebase storage credentials in het project).
* Ga naar app.js onder de folder resources\ en wijzig hier de gegevens.* Start een nieuwe terminal en cd naar de hoofdmap.
* Voer het commando “composer install” uit.
* Voer het commando “php artisan migrate” uit.
* Voer het commando “php artisan db:seed” uit.
* Voer het commando “npm install” uit.
* Open en nieuwe terminal.
* Voer het commando “php artisan serve” uit.
Ga naar jouw browser en navigeer naar http://localhost:8000/

## Waar kan ik hulp vinden?

Waar kan ik hulp vinden?
* **https://laravel.com/**
* **https://cli.vuejs.org/guide/**
* **https://axios-http.com/docs/intro**
* **https://vuetifyjs.com/en/getting-started/upgrade-guide/**
* **https://firebase.google.com/docs/guides**

## Project status

Status: werkend

## Auteurs

Tayyip_yildirimer@hotmail.com
