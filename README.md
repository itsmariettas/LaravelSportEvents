# SPORT EVENTS SYSTEM

## Idea
A place where you can find information for the latest sport events as well as search sport events by sport, organizer or start date.

## Get Started
* Run composer install
* Make .env file in root directory & configurate it
* Run migrations
* If you want to seed database - php artisan db:seed

## Seeded Users
1. Admin
    * Email: "admin@admin.admin"
    * Password: "password"

## Project
The project has seeds for all database models.

### Models
1. Organizer
    * ID - int
    * Name - string

2. Sport
    * ID - int
    * Type - string

3. Sport Event
    * ID - int
    * Name - string
    * Start Date - date
    * Duration In Days - int
    * Sport ID - int - a refference to Sport
    * Organizer ID - int - a refference to Organizer

4. User
    * ID - int
    * Name - string
    * Email - string
    * Password - string
    * Email Verified At
    * Remember Token
* All models have Created & Updated at

### Controllers
In the Admin folder we have
* OrganizerCrudController
* SportCrudController
* SportEventCrudController
that have CRUD functionality for operations on models as well as
* OrganizerController
* SportController
* SportEventController
that we use for the public part of the site in order to list models. Moreover, we can search trough sport events by start date, sport type or organizer name in SportEventController.

### Views
In resourses/views we have the following folders
* layouts - app layout
* sport_event - public part of sport_events
* organizer - public part of organizers
* sport - public part of sports

### Routes
All public routes are stored in routes/web.php

### Theme
The theme used in this project is from https://templated.co/industrious