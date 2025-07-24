# 🚗 Washing Task Management

A web-based application for managing daily car washing tasks for rental fleets, built with [Laravel](https://laravel.com/) and [Filament](https://filamentphp.com/).

## ✨ Features

- ✅ Manage washing tasks for each vehicle
- 🚘 Track wash status (`Washed` / `Not Washed`)
- 📅 Record washing date, notes, and history
- 🧼 Assign each task to a specific fleet
- 🔒 Multi-tenant architecture with role-based access
- 📊 Admin panel powered by Filament (Livewire-based)

---

## 🛠 Tech Stack

- **Framework**: Laravel 12
- **Admin Panel**: FilamentPHP 3.3
- **Database**: MySQL
- **Auth**: Laravel Sanctum (optional)
- **UI**: Filament default (Tailwind-based)

---

## 🚀 Getting Started

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
```


### 2. Install Dependencies
composer install
npm install && npm run build


### 3. Set Up Environment
cp .env.example .env
php artisan key:generate


### 4. Run Migrations
php artisan migrate


### 5. Seed Admin User (Optional)
php artisan db:seed

---

🔐 Accessing Admin Panel
http://your-domain.test/admin

---

📁 Project Structure Highlights
| Folder / File                     | Description                     |
| --------------------------------- | ------------------------------- |
| `app/Models/Asset/Fleet.php`      | Fleet model with features/UUID  |
| `app/Models/Task/WashingTask.php` | Washing task with washed status |
| `app/Filament/Resources`          | Filament admin resources        |
| `routes/web.php`                  | Web routes (admin panel)        |

---

🧪 Testing
php artisan test

---

📦 Deployment
- Set APP_ENV=production
- Run php artisan config:cache, route:cache, etc.
- Ensure file permissions for storage/ and bootstrap/cache/

---

📄 License
This project is open-sourced under the MIT license.

---

🙏 Credits
Built with ❤️ using Laravel & FilamentPHP
