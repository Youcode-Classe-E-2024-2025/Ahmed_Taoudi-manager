<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>Document</title>
</head>
<body>
 <!-- Navbar -->
 <?php require('views/partials/navbar.php') ?>
<main class="min-h-screen">
    <section class="bg-cover bg-center h-96 text-white flex items-center justify-center" style="background-image: url('/assets/img/bg_image.webp');">
        <div class="text-center backdrop-blur-md p-3 rounded-xl">
            <h1 class="text-5xl font-bold mb-4">Rent Your Dream Car Today!</h1>
            <p class="text-xl mb-6">Find the perfect car for your next adventure</p>
            <a href="/cars" class="bg-blue-600 px-6 py-3 text-xl inline-block font-semibold rounded-lg hover:bg-blue-700 transition">Browse Cars</a>
        </div>
    </section>

    <!-- Cars -->
    <section id="cars" class="py-16">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8 inline-block px-3">Available Cars for Rent</h2><a class="text-blue-900 hover:underline" href="/cars"> more cars</a>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                
<?php foreach($cars as $car ) :?>

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <!-- w-full h-64 object-cover rounded-lg mb-4 -->
        <img class="p-8 w-full h-72 object-cover  rounded-t-lg" src="<?= $car['image_url'] ?>" alt="<?= $car['marque'] ?> <?= $car['modele'] ?> " />
    </a>
    <div class="px-5 pb-5">
        <div >
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $car['marque'] ?>  </h5>
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $car['modele'] ?> </h5>
</div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white"><?= $car['prix_par_jour']?><span class="text-lg"> DH/day</span></span>
            <a href="/book?id=<?= $car['id'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">book now</a>
        </div>
    </div>
</div>
<?php endforeach ;?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">About Rento</h2>
            <p class="text-xl text-gray-700 max-w-3xl mx-auto">At Rento, we aim to provide high-quality, reliable, and affordable cars for all your rental needs. Whether you're planning a road trip or need a car for a business trip, we've got you covered.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">Contact Us</h2>
            <form class="max-w-lg mx-auto">
                <div class="mb-4">
                    <input type="text" placeholder="Your Name" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
                <div class="mb-4">
                    <input type="email" placeholder="Your Email" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
                <div class="mb-4">
                    <textarea placeholder="Your Message" class="w-full px-4 py-2 border border-gray-300 rounded-lg h-32"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Send Message</button>
            </form>
        </div>
    </section>
    </main> 
    <footer class="bg-blue-600 text-white py-8">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Rento. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
