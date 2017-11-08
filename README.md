# deploy document

##Vereisten

Php versie 7.0

composer

##Installatie op een server

###Open de cli 

###Ga naar de map waar je het project wilt hebben

Cd route-to-map

###Haal het project af github

Git clone https://github.com/jonasvanloey/webdev.git

###Installeer de composer in de map van het project

Cd map-vh-project

Composer install

###maak een databank aan

Gegevens in .env bestand aanpassen

###Voer migrations uit

Php artisan migrate

###Setup databank & wedstrijd

Voer de roles in in de databank

Php artisan db:seed	

###registreer je op de website

pas de role_id van deze user aan naar 1 dit word de admin

ga naar het admin panel en druk op start de wedstrijd

geef de periode in die elke wedstrijd moet duren en het email adres van de verantwoordelijke.

###Maak een cronjob:

* * * * * php /pad/naar/workspace/artisan schedule:run >> /dev/null 2>&1

##Functionaliteiten

###Admin

De admin kan op de admin pagina de wedstrijd starten, hij kan deelnemers 
verwijderen(disqualificeren) en hij kan een excel met een overzicht van de 
deelnemers downloaden.

###Users

Users krijgen toegang tot de pagina om te stemmen op inzendingen. Een User kan zich registreren door op de knop stem op inzendingen te klikken dan gaat hij automatisch naar de login pagina waar hij zich kan registreren

###Guests

Een guest kan deelnemen aan de wedstrijd en een inzending inzenden door te drukken op neem deel en erna zijn gegevens in te geven.


