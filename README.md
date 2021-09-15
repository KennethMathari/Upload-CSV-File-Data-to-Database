# Upload-CSV-File-Data-to-Database

This web application uploads large-size CSV file to MySQL Database.
This repo is functionally complete — PRs and issues are welcome!

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

Clone the repository

    git clone git@github.com:KennethMathari/Upload-CSV-File-Data-to-Database.git

Switch to the repo folder

    cd Upload-CSV-File-Data-to-Database

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git@github.com:KennethMathari/Upload-CSV-File-Data-to-Database.git
    cd Upload-CSV-File-Data-to-Database
    composer install
    cp .env.example .env

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Video Walkthrough of CSV File Upload

<img src="UploadCSV.gif">
