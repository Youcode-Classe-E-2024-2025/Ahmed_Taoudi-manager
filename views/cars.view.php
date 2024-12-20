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
    <!-- <section class="bg-cover bg-center h-96 text-white flex items-center justify-center" style="background-image: url('https://via.placeholder.com/1500x900');">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-4">Rent Your Dream Car Today!</h1>
            <p class="text-xl mb-6">Find the perfect car for your next adventure</p>
            <a href="/cars" class="bg-blue-600 px-6 py-3 text-xl font-semibold rounded-lg hover:bg-blue-700 transition">Browse Cars</a>
        </div>
    </section> -->

    <!-- Cars -->
    <section id="cars" class="py-16">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">Available Cars for Rent</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                
<?php foreach($cars as $car ) :?>

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <!-- w-full h-64 object-cover rounded-lg mb-4 -->
        <img class="p-8 w-full h-72 object-cover  rounded-t-lg" src="<?= $car['image_url'] ?>" alt="<?= $car['marque'] ?> <?= $car['modele'] ?> " />
    </a>
    <div class="px-5 pb-5">
        <a href="/details?id=<?= $car['id']  ;?>">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $car['marque'] ?>  </h5>
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $car['modele'] ?> </h5>
        </a>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white"><?= $car['prix_par_jour'] ?></span>
            <a href="/book" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">book now</a>
        </div>
    </div>
</div>
<?php endforeach ;?>
            </div>
        </div>
    </section>

    </main> 
    <footer class="bg-blue-600 text-white py-8">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Rento. All rights reserved.</p>
        </div>
    </footer>

</body>

