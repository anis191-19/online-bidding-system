# 🛒 Online Bidding System

An advanced web-based platform that allows users to create, manage, and participate in online bidding for various products. Built with **Laravel**.

## 👨‍💻 Contributors

- Anisul Alam
- Sanjukta Mishraw  
- Ataul Karim  
- Miraj Uddin

---

## 🚀 Features

- User authentication and role-based access control
- Product listing and bidding system
- Real-time bidding updates (via Pusher or polling)
- Admin dashboard to manage products and users
- Email notifications for bidding activities
- Responsive and mobile-friendly interface

---

## 🛠️ Built With

- [Laravel](https://laravel.com/)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Bootstrap](https://getbootstrap.com/) / [Tailwind CSS](https://tailwindcss.com/)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

---

## 📦 Installation

Follow these steps to set up the project locally:

```bash
# Clone the repository
git clone https://github.com/yourusername/online-bidding-system.git

# Go into the project directory
cd online-bidding-system

# Install PHP dependencies
composer install

# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Set up your database and update .env accordingly, then run:
php artisan migrate

# Start the local development server
php artisan serve
