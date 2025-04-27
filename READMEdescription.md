# 🛍️ Sincos — E-commerce Demo App

This is a full-stack demo project simulating an e-commerce platform, built with **Laravel** (backend) and **Tailwind CSS** (frontend).

## ✨ Key Features
- Admin panel for product management (CRUD operations)
- Product listing page with data loaded from DummyJSON API
- Responsive design with Tailwind CSS
- Authentication system (login/logout)
- Dashboard for admins
- Clean project structure and code organization

## 🛠️ Tech Stack
- **Backend:** Laravel (PHP)
- **Frontend:** Blade templates, Tailwind CSS 3
- **External API:** DummyJSON (products data)
- **Authentication:** Laravel Auth (simple starter auth)
- **Version Control:** Git & GitHub

## 🚀 How to Run Locally
1. Clone the repository.
2. Set up your local environment (PHP 8+, Composer, MySQL).
3. Copy `.env.example` to `.env` and set database credentials.
4. Run migrations: `php artisan migrate`
5. Seed dummy users/products if needed.
6. Serve the app: `php artisan serve`
7. Visit `localhost:8000`

---

✅ This project demonstrates full cycle development:  
Backend setup ➔ Frontend integration ➔ Responsive UI ➔ Admin features ➔ External API connection ➔ Authentication.

---


# Task: Create a simplistic e-commerce backend application ##

### Details: ###

***All pages should be authenticated.*** (i.e. you need to log in to view or edit data).
Feel free to use any open-source packages to handle this.

The views in the application should be created using any technology you want, Vue, React, or just plain PHP/Blade. (for simplicity, we recommend using Laravel's Blade).

The application consists of two main entities: `Product` and `Category`. (see existing migration files for details about what they should contain).
These must have eloquent models, and should have a defined relationship between them.

Each Category has many products, and each product has only one category.
You need to ble able to create, read, update, and delete both products and categories.
Focus on making it as user-friendly as possible.

There should be no limit to how many products or categories you can have.

Design/Styling is not an important factor in this task, but it should be functional and easy to use.

***Requests should be validated in Laravel using form requests.***

***All code must be committed to the shared GIT repository.***
Please commit and push code as you go, so we can see your progress.

### Bonus points (these are all optional): ###

- Use Tailwind CSS for styling.
- While product prices are stored in the database in minor units (øre), display them as Kr in the admin.
  (i.e. 1050 should be displayed as 10,50 Kr).
- Demonstrate that you know how to write tests.
- If you have time, create a simple storefront, where you can view the products and categories.
