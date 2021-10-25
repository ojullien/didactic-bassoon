# didactic-bassoon

## Installation

1. Créer une base de données (nom: laravel) sous MariaDB 10.6
2. Copier .env.example en .env
3. Editer le fichier .env et
  3.1 Mettre à jour APP_API_KEY avec une clé Leroy M
  3.2 Mettre à jour DB_* avec les paramètres de connection à la base de données.
4. Executer les commandes suivantes:

```bash
composer self-update
composer install
npm install
npm run dev
php artisan migrate
php artisan leroy:fetchdb
php artisan serve
```

5. Créer un utilisateur
6. Naviguer sur le site

## Sources

Je ne connaissais pas Laravel.
Je me suis appuyé sur les docs et les sources de Laravel, Jetstream et livewire
Je me suis perdu dans livewire et tailwindcss.
Sino, Je le trouve sympa ce framework.
J'ai commencé la formation 'PHP with Laravel for beginners - Become a Master in Laravel' sur udemy
