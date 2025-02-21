<?php
require_once '../app/includes/includes.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Invoice Management System - Simplify your invoicing process with our powerful and user-friendly platform. Manage contacts, create invoices, track payments, and more."
    />
    <meta
      name="keywords"
      content="Invoice Management, Invoicing Software, Payment Tracking, Contact Management, PWA, PHP, MySQL, Tailwind CSS"
    />
    <meta name="author" content="y-note" />
    <meta name="theme-color" content="#4F46E5" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"
    />
    <meta name="apple-mobile-web-app-title" content="Invoice Management" />
    <meta name="msapplication-TileColor" content="#4F46E5" />
    <meta name="msapplication-TileImage" content="./assets/images/logo.png" />
    <meta name="application-name" content="Invoice Management" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="robots" content="index, follow" />

    <!-- Open Graph Meta Tags for Social Sharing -->
    <meta property="og:title" content="Invoice Management System" />
    <meta
      property="og:description"
      content="Simplify your invoicing process with our powerful and user-friendly platform."
    />
    <meta property="og:image" content="./assets/images/logo.png" />
    <meta property="og:url" content="https://y-note.cm" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Invoice Management System" />
    <meta
      name="twitter:description"
      content="Simplify your invoicing process with our powerful and user-friendly platform."
    />
    <meta name="twitter:image" content="./assets/images/logo.png" />

    <title>Invoice Management System</title>

    <!-- Tailwind CSS CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />

    <!-- FontAwesome Icons -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Animate.css for Animations -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
      rel="stylesheet"
    />

    <!-- PWA Manifest -->
    <link rel="manifest" href="./manifest.json" />

    <!-- Favicon -->
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="./assets/images/logo.png" />
  </head>
  <body class="bg-gray-100 text-gray-800">
    <!-- Header Section -->
    <header class="bg-white shadow-md">
      <div
        class="container mx-auto px-4 py-6 flex justify-between items-center"
      >
        <a href="/" class="text-2xl font-bold text-blue-600"
          >Invoice<span class="text-gray-800">Manager</span></a
        >
        <nav class="md:block hidden">
          <ul class="flex space-x-6">
            <li>
              <a href="#features" class="hover:text-blue-600">Features</a>
            </li>
            <li><a href="#about" class="hover:text-blue-600">About</a></li>
            <li><a href="#contact" class="hover:text-blue-600">Contact</a></li>
            <a href="/login" class="bg-blue-500 text-white px-4 py-2 rounded">Login</a>
            <a href="/register" class="bg-green-500 text-white px-4 py-2 rounded">Sign Up</a>
          </ul>
        </nav>
        <!-- Mobile Menu Button -->
        <button
          id="mobile-menu-button"
          class="md:hidden text-gray-800 focus:outline-none"
        >
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </header>

    <!-- Mobile Menu -->
    <div
      id="mobile-menu"
      class="md:hidden bg-white shadow-md absolute w-full hidden"
    >
      <ul class="flex flex-col space-y-4 p-4">
        <li>
          <a href="#features" class="hover:text-blue-600">Features</a>
        </li>
        <li><a href="#about" class="hover:text-blue-600">About</a></li>
        <li><a href="#contact" class="hover:text-blue-600">Contact</a></li>
        <li>
          <a href="/login" class="bg-blue-500 text-white px-4 py-2 rounded"
            >Login</a
          >
        </li>
        <li>
          <a href="/register" class="bg-green-500 text-white px-4 py-2 rounded"
            >Sign Up</a
          >
        </li>
      </ul>
    </div>

    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
      <div class="container mx-auto px-4 text-center">
        <h1
          class="text-4xl md:text-6xl font-bold animate__animated animate__fadeInDown"
        >
          Simplify Your Invoicing Process
        </h1>
        <p class="mt-4 text-lg md:text-xl animate__animated animate__fadeInUp">
          Manage contacts, create invoices, track payments, and more with our
          powerful platform.
        </p>
        <div class="mt-8">
          <a
            href="#features"
            class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-gray-100 animate__animated animate__fadeInUp"
          >
            Get Started
          </a>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">
          Key Features
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Feature 1 -->
          <div
            class="bg-gray-50 p-6 rounded-lg shadow-md animate__animated animate__fadeInUp"
          >
            <i class="fas fa-users text-4xl text-blue-600 mb-4"></i>
            <h3 class="text-xl font-bold">Contact Management</h3>
            <p class="mt-2 text-gray-600">
              Easily manage your contacts and keep track of interactions.
            </p>
          </div>
          <!-- Feature 2 -->
          <div
            class="bg-gray-50 p-6 rounded-lg shadow-md animate__animated animate__fadeInUp"
          >
            <i
              class="fas fa-file-invoice-dollar text-4xl text-blue-600 mb-4"
            ></i>
            <h3 class="text-xl font-bold">Invoicing</h3>
            <p class="mt-2 text-gray-600">
              Create and manage invoices with ease. Support for recurring
              invoices.
            </p>
          </div>
          <!-- Feature 3 -->
          <div
            class="bg-gray-50 p-6 rounded-lg shadow-md animate__animated animate__fadeInUp"
          >
            <i class="fas fa-credit-card text-4xl text-blue-600 mb-4"></i>
            <h3 class="text-xl font-bold">Payment Tracking</h3>
            <p class="mt-2 text-gray-600">
              Track payments and integrate with payment gateways like Stripe and
              PayPal.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-100">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">
          About Us
        </h2>
        <p class="text-lg text-center leading-relaxed">
          Our mission is to simplify the invoicing process for businesses of all
          sizes. With our user-friendly platform, you can manage contacts,
          create invoices, track payments, and generate reports effortlessly.
          Built with modern technologies like PHP, MySQL, and Tailwind CSS, our
          system is optimized for performance and scalability.
        </p>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">
          Contact Us
        </h2>
        <form class="max-w-lg mx-auto">
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2"
              >Name</label
            >
            <input
              type="text"
              id="name"
              name="name"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            />
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2"
              >Email</label
            >
            <input
              type="email"
              id="email"
              name="email"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            />
          </div>
          <div class="mb-4">
            <label for="message" class="block text-gray-700 font-bold mb-2"
              >Message</label
            >
            <textarea
              id="message"
              name="message"
              rows="4"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            ></textarea>
          </div>
          <div class="text-center">
            <button
              type="submit"
              class="bg-blue-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-blue-700"
            >
              Send Message
            </button>
          </div>
        </form>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
      <div class="container mx-auto px-4 text-center">
        <p>&copy; 2023 Invoice Management System. All rights reserved.</p>
      </div>
    </footer>

    <!-- Service Worker Registration -->
    <script>
      if ("serviceWorker" in navigator) {
        window.addEventListener("load", () => {
          navigator.serviceWorker
            .register("./service-worker.js")
            .then((registration) => {
              console.log(
                "Service Worker registered with scope:",
                registration.scope
              );
            })
            .catch((error) => {
              console.error("Service Worker registration failed:", error);
            });
        });
      }

      // Mobile Menu Toggle
      const mobileMenuButton = document.getElementById("mobile-menu-button");
      const mobileMenu = document.getElementById("mobile-menu");

      mobileMenuButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
      });
    </script>
  </body>
</html>