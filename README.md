<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Attention: Do you want to explore the world? Map Vibes is the perfect app for you!

Interest: Map Vibes is a Direction App that brings you the opportunity to explore new destinations in the world, and also take you on a new adventure and experience in your own backyard.

Desire: Explore breathtaking routes and places with Map Vibes to make your vacation more memorable. Book your flight now!

## Packages

You need **[Composer](https://getcomposer.org/download/)** & **[Node.js](https://nodejs.org/en/download/)** to download the required packages for Map Vibes to function, on the parent directory you have to run composer install & npm install.

## Requirements 
- We recommend using Laragon 
- SIA won’t run with PHP versions that are lower than 8.0  
- SIA uses MySql as database, version of MySql should be higher than 5.7 
- SIA uses TAILWIND CSS framework, for UI 



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

- To enable Tailwind CSS for SIA run: 
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

- [Ardit Xhaferi](https://www.linkedin.com/in/ardit-xhaferi/)
- [Ben Gorani](https://www.linkedin.com/in/ben-gorani-405b06212/)
- [Denis Hoti](https://www.linkedin.com/in/denishoti/)
- [Leon Hajdari](mailto:leonhajdari832@gmail.com)
- [Olt Gjaka](mailto:oltigjaka1@gmail.com)
