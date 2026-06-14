REPORT WEB APP GROUP LARVA
# Royalty-Free World

# Royalty-Free World (Royalty Free Assets Website)

## Group Information

**Group Name**: G
**Section**: 

**Group Members** :
- WAN MOHAMED NAZRIN BIN WAN ROSHDAN - 2218629
- MUHAMMAD AZRI BIN MOHD FUAD - 2413927
- MUHAMMAD SYAHIRAN AFFANDI BIN AZLI - 2418369
- MUHAMMAD SAFIYAN BIN HAMZAH - 2417743
- WAN MUHAMMAD TAUFIQ BIN WAN SHUBLYE SHAH - 2413943


## Project Overview

Introduction :
Royalty-Free World is a web-based platform developed using Laravel framework. The system provides users with easy access to royalty free digital content. The website allows users to browse, search, and download royalty-free music and sound effects for personal and commercial projects. Artists can upload and manage their content while promoting their creative work through the platform. Besides, the system includes an e-commerce module that enables artists to sell merchandise.

## Project Objectives

- Primary Goal: Create an efficient digital platform that enables users to find royalty-free media assets.
- Technical Goal: Implement Laravel MVC architecture with full CRUD operations.
- User Experience Goal: Provide an intuitive and responsive interface for both users and artists.
- Business Goal: Enable easy merchandise selling platform for artists.

## Target Users

- Users: Individuals who need royalty-free media assets for personal creative projects. 
- Artists: Digital creators who want to upload, manage, promote, and distribute their content while selling merchandise through the platform. 
- Administrators: System managers who oversee the platform.


## Features and Functionalities

** Core Features**

Music, Sounds and Merchandise - It provides the audio, sounds, music 
Easy and Clear Navigation. - It allows users to search a sound, music or merchandise easily 
Security - It allows users and artists to register and log in to the website 
Music and Artist List Features- Users can find their own music or sound that they want to download 
File Upload and Downloads - It allows artists to upload their own music and users to download the music 
Database management -  Database system design to store and manage user, music, album, and merchandise 

**Support Features**

Customer Service. - Users can get help or assistance from the customer service through contact, email or automated help features. 
About Us and Social Media. - Provide the website’s information, purpose and background. It allows users to access and follow the official social media for updates, promotions and notifications.

## Technical Implementation

**Technology Stack**

- Backend Framework: Laravel 12.61
- Frontend: Blade Templates with Bootstrap 5
- Database: MySQL 8.0
- Authentication: Laravel Jetstream
- Image Storage: Laravel File Storage
- Development Environment: XAMPP

**Database Design**

Database Schema Overview
Our database consists of [X] main tables designed to handle users, music, merchandise and related data:

Core Tables:

- users - User and Artist information
- music - Stores music lists details including title, description, file path, and genre. 
- merchandise - Stores merchandise list details, including name, description, price and image.

## Entity Relationship Diagram (ERD)

[https://docs.google.com/document/d/18rczbQheCK7rOXeqAOYAZJ0g2cdwwROmLwwKiR3rSP0/edit?usp=sharing](https://docs.google.com/document/d/18rczbQheCK7rOXeqAOYAZJ0g2cdwwROmLwwKiR3rSP0/edit?usp=sharing)

Key Relationships:

- Users can have multiple Orders (One-to-Many)
- Restaurants can have multiple Menu Items (One-to-Many)
- Orders can have multiple Order Items (One-to-Many)
- Menu Items belong to Categories (Many-to-One)

## Laravel Components Implementation

- Routes (Web.php)

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\MerchandiseController;

Route::get('/', function () {
    return view('mainpage');
});

//Authentication middleware
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

//All music part
Route::get('/music', [MusicController::class, 'index']) ->name('music.index') ;
Route::get('/music/create', [MusicController::class, 'create']);
Route::get('/music/{music}/edit', [MusicController::class, 'edit']);
Route::post('/music', [MusicController::class, 'store']);

//All merchandise part
Route::get('/merchandise', [MerchandiseController::class, 'index']) ->name('merchandise.index');
Route::get('/merchandise/create', [MerchandiseController::class, 'create']);
Route::post('/merchandise', [MerchandiseController::class, 'store']);
Route::get('/merchandise/{merchandise}/edit', [MerchandiseController::class, 'edit']);

//Music Update and Delete
Route::put('/music/{music}', [MusicController::class, 'update']);
Route::delete('/music/{music}', [MusicController::class, 'destroy']);

//Merchandise Update and Delete
Route::put('/merchandise/{merchandise}', [MerchandiseController::class, 'update']);
Route::delete('/merchandise/{merchandise}', [MerchandiseController::class, 'destroy']);

//All other page
    Route::get('/home', function () {
        return view('home');
        });
    
    Route::get('/about', function () {
        return view('about'); 
    });

    Route::get('/contact', function () {
        return view('contact'); 
    });

});

Controllers

Main Controllers Implemented are below :

MusicController: Manages CRUD for music section.

MerchandiseController: Manages CRUD for merchandise section.

Models and Relationships

// Music Model
class music extends Model
{
    protected $table = 'music';
    protected $fillable = [
        'user_id',
        'title',
        'artist',
        'genre',
        'music_file',
        'image_file',
    ];
}

// Merchandise Model
class merchandise extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'description',
        'stock',
        'image_file'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// User Model 
class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;
    // Attributes that can be filled via forms
    protected $fillable = [
        'name',
        'email',
        'role', // Used for role-based access control
        'password',
    ];
    // Sensitive attributes hidden from API/JSON responses
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Casting attributes to proper data types
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

Views and User Interface

Blade Templates Structure:
layouts/app.blade - Provides the structural layout for the creation and editing of pages.
layouts/home_layout - Stores the design layout for the Home, About and Contact pages.
layouts/index_layout.blade - Manages the main index layout for browsing music and merchandise.
music/create.blade - Interface for adding a new music/sounds/soundfx/assets list.
music/edit.blade - Interface for editing music/sounds/soundfx/assests listings.
music/index.blade - The primary dashboard for viewing the music catalog.
merchandise/create.blade - Interface for adding a new merchandise list.
merchandise/edit.blade - Interface for editing merchandise list.
Mainpage.blade - The initial landing page displayed before a user or artist logs in.
Home.blade - The main dashboard presented after a successful login.
About.blade - About us and our website.
Contact.blade - Informational page detailing the website’s customer service contact options.

Design Features:
Responsive Design: Built using Bootstrap components from Kelly and Sarab to ensure cross-device compatibility.
Color Scheme: Utilises a clean pallet of Cream, Blue and White to maintain a professional and creative aesthetic design.
Background Image: Includes scenes from music festivals to give the vibe of music, sound and arts.
Navigation: Features an intuitive navigation bar and an integrated search bar specifically on the music and merchandise pages for every asset discovery.

User Authentication System
 Authentication Features
Registration System: Email, password confirmation, role selection.

Login System: Login with a registered account.

Role-Based Access: Different features for users and artists.

Security Measures
Password encryption using Laravel's built-in hashing

CSRF protection on all forms

Input validation and sanitization

Middleware protection for authenticated routes

Installation and Setup Instructions
Prerequisites :
PHP = 8.2 or latest

Composer - Node.js & NPM

MySQL 8.0 and XAMPP ### Step-by-Step Installation

1. Clone the Repository
Open your terminal and run the following commands to clone the project:

git clone https://github.com/.....
cd GroupLarva_Royalty-FreeWorld

2. Install Dependencies
Install both backend (PHP) and frontend (JavaScript) dependencies:

composer install 
npm install

3. Environment Configuration
Create your local environment file and generate the application secure key:

cp .env.example .env
php artisan key:generate

4. Database Setup

Create a new database named it in your phpMyAdmin / MySQL Server.

Update the .env file with your database credentials

Run the migrations and seeders to set up the tables:

php artisan migrate 
php artisan db:seed

5. Start Development Server
Run these commands to launch the application:
php artisan serve
npm run dev

Testing and Quality Assurance
Functionality Testing
Authentication & Roles: Verified artist and standard user registration, login security, and dashboard access separation.
Media Catalog: Tested uploading, rendering, and filtering of the music track listings based on genres.
CRUD Module: Validated the CRUD operations (Add, View, Edit, Delete) for artist merchandise and music lists.
Media Storage Integrity: Checked successful file path mapping for uploaded music and merchandise images.
UI/UX Responsiveness: Conducted layout testing across Desktop.

Browser Compatibility
Google Chrome (Latest)
Microsoft Edge (Latest)

Performance Testing
Load Speed: Optimized assets for sub-2.5s page loading.
Database Efficiency: Optimized queries for faster data retrieval.
Asset Optimization: Implemented compression for images and media files.
Compatibility: Verified performance across Chrome and Edge.

Challenges Faced and Solutions
Challenge 1: Website Design Consistency
Problem: Managing website background image and visual theme across all web pages.

Solution: Used Laravel Blade templates and a shared CSS file to centralize the background image and styling, ensuring a consistent design across all pages.

Challenge 2: Database Synchronization
Problem: Changes made in one module were not always reflected correctly.

Solution: Laravel Eloquent models and database relationships were implemented.

Challenge 3: Role-based Authentication
Problem: Different user types requiring different access levels.

Solution: Implemented middleware to check user roles and redirect appropriately.

Future Enhancements
Phase 2 Features (Potential Improvements)
Real-time Notifications: Push notifications for order updates

Payment Integration: Stripe or PayPal payment processing

GPS Tracking : Real-time delivery tracking with maps

Rating System : Customer reviews and restaurant ratings

Advanced Analytics : Detailed sales reports and customer insights

Mobile App : Native mobile application for iOS and Android

Scalability Considerations
Database optimization for larger datasets

Caching implementation for improved performance

API development for mobile app integration

Load balancing for high traffic scenarios

Learning Outcomes
Technical Skills Gained
Laravel Framework: Understanding of MVC architecture and Eloquent ORM

Database Design: Creating efficient database schemas and relationships

Authentication: Implementing secure user authentication systems

Frontend Development: Building responsive interfaces with Bootstrap

Version Control: Using Git and GitHub for project management

Soft Skills Developed
Team Collaboration : Working effectively in a group environment

Project Management : Planning and executing a complex web application

Problem Solving : Debugging and resolving technical challenges

Documentation : Creating comprehensive project documentation

References
Laravel Documentation. (2024). Laravel 10.x Documentation. Retrieved from https://laravel.com/docs/10.x

Bootstrap Documentation. (2024). Bootstrap 5.3 Documentation. Retrieved from https://getbootstrap.com/docs/5.3/

MySQL Documentation. (2024). MySQL 8.0 Reference Manual. Retrieved from https://dev.mysql.com/doc/refman/8.0/en/

MDN Web Docs. (2024). Web Development Resources. Retrieved from https://developer.mozilla.org/

Stack Overflow. (2024). Programming Q&A Platform. Retrieved from https://stackoverflow.com/

Conclusion
Royalty-Free World successfully demonstrates the implementation of a comprehensive royalty-free media downloading system using Laravel framework. The project showcases proficiency in web development fundamentals including MVC architecture, database design, user authentication, and responsive web design.

Key Achievements
Successfully implemented core Laravel components (Routes, Controllers, Models, and Views) to support music, sound, and merchandise management.

Built a functional platform allowing artists to upload and manage content while enabling users to browse and download royalty-free assets.

Integrated an e-commerce module that allows artists to sell merchandise alongside their creative work.

Implemented role-based authentication to separate user and artist functionalities.

Designed a clean, responsive interface using Bootstrap with a consistent visual theme across all pages.

Project Impact
This project provided the team with hands-on experience in building a real-world web application from the ground up. Working through the design, development, and testing process gave the team practical exposure to challenges that arise in professional web development, from database structuring to UI consistency and access control; skills that are directly transferable to future projects.

Project Completion Date: 12/6/2026

Course: Web Application Development

Lecturer: Dr. Nor Azura Binti Kamarulzaman