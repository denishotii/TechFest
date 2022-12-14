![Logo](https://cdn.discordapp.com/attachments/1032681097764536403/1033699563535597649/logo165.png)  

## About Map Vibe

Attention: Do you want to explore the world? Map Vibes is the perfect app for you!

Interest: Map Vibes is a Direction App that brings you the opportunity to explore new destinations in the world, and also take you on a new adventure and experience in your own backyard.

Desire: Explore breathtaking routes and places with Map Vibes to make your vacation more memorable. Book your flight now!

## Packages

You need **[Composer](https://getcomposer.org/download/)** & **[Node.js](https://nodejs.org/en/download/)** to download the required packages for Map Vibes to function, on the parent directory you have to run composer install & npm install.

## APIs used

[Mapbox API](https://www.mapbox.com/)

[Google Places API](https://developers.google.com/maps/documentation/places/web-service/overview)

## Requirements 
- We recommend using Laragon 
- Map Vibes won’t run with PHP versions that are lower than 8.0  
- Map Vibes uses MySql as database, version of MySql should be higher than 5.7 
- Map Vibes uses TAILWIND CSS framework, for UI


## Commands

- First of all we have to install all dependencies needed for the project using this composer command: 
composer install 

- To generate a new .env file for SIA, you should run this command: 
mv .env.example .env 

- To clear your application cache: 
php artisan cache:clear   

- For a faster load of application we recommend you run this command: 
composer dump-autoload 

- To set the APP_KEY value in your .env file: 
php artisan key:generate  

- To enable Tailwind CSS for Map Vibes run: 
composer require laravel-frontend-presets tailwindcss 

- You have to run these four commands to install node required dependencies: 
npm install  
npm install --save --legacy-peer-deps  
npm install laravel-mix@latest --save-dev  
npm run dev 

- To create e link into storage directory to save files run: 
php artisan storage:link 

- To install tables into your database run:To install tables into your database run: 
php artisan migrate 


## Collaborators

- [Ardit Xhaferi](https://github.com/arditxhaferi)
- [Ben Gorani](https://www.linkedin.com/in/ben-gorani-405b06212/)
- [Denis Hoti](https://www.linkedin.com/in/denishoti/)
- [Leon Hajdari](mailto:leonhajdari832@gmail.com)
- [Olt Gjaka](mailto:oltigjaka1@gmail.com)
