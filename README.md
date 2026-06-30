Loyalty Points Dashboard

A full-stack loyalty rewards platform built with Laravel, where members earn points, track their balance, and redeem rewards from a catalogue, with a dedicated admin panel for managing members and crediting points.
This project was built as a hands-on way to learn Laravel and PHP from the ground up, with a focus on clean architecture, defensive coding, and a fully containerized development environment.

Features:

Authentication — registration, login, logout, and email verification via Laravel Breeze
Member Dashboard — real-time points balance and paginated transaction history
Rewards Catalogue — browse and redeem rewards, with validation to prevent overspending
Admin Panel — role-protected area to view all members and manually credit points
Responsive UI — built with Tailwind CSS, works cleanly on mobile and desktop
Fully Dockerized — PHP, Nginx, and MySQL run as isolated containers, so the entire environment spins up identically on any machine


Tech Stack:

Backend: PHP 8.4, Laravel 13
Frontend: Blade templates, Tailwind CSS, Vite
Database: MySQL 8.0
Infrastructure: Docker, Docker Compose, Nginx
Auth: Laravel Breeze

Getting Started:

This project runs entirely in Docker, so no local PHP or MySQL installation is required.

Prerequisites:

Docker Desktop
Node.js (for building frontend assets)


Setup:

bashgit clone https://github.com/jessicamalvaro-projects/LoyaltyPointsDashboard.git
cd LoyaltyPointsDashboard
cp .env.example .env
docker compose up -d --build
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
npm install
npm run build

Visit http://localhost:8080 and register a new account to explore the dashboard.

Making yourself an admin:

To access the admin panel, promote your account via Tinker:

bashdocker compose exec app php artisan tinker
php\App\Models\User::where('email', 'your@email.com')->update(['is_admin' => true]);

Project Structure:

app/
  Http/Controllers/    → DashboardController, RewardController, AdminController
  Models/               → User, PointTransaction, Reward
database/
  migrations/           → schema for users, point_transactions, rewards
  seeders/              → demo data for transactions and rewards
resources/views/
  dashboard.blade.php
  rewards/index.blade.php
  admin/index.blade.php
docker-compose.yml      → app, nginx, and db containers
Dockerfile               → PHP 8.4-fpm application image

What I'd Build Next:

Email notifications when points are earned or a reward is redeemed
A points expiry system for inactive accounts
An audit log on the admin panel showing which admin credited which user, and when
API endpoints so a mobile app could plug into the same backend

About This Project
I built this in a week as a self-directed way to get hands-on with Laravel, having come from a background in C#/.NET, Java, and Kotlin. The goal was to demonstrate that I can pick up a new framework quickly and ship something functional, well-structured, and properly containerized — not just follow a tutorial, but actually understand the decisions behind authentication, data modeling, and defensive validation.
I built this in a week as a self-directed way to get hands-on with Laravel, having come from a background in C#/.NET, Java, and Kotlin. The goal was to demonstrate that I can pick up a new framework quickly and ship something functional, well-structured, and properly containerized — not just follow a tutorial, but actually understand the decisions behind authentication, data modeling, and defensive validation.
