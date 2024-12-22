<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>User Profile</title>
</head>
<body class="bg-blue-200 h-screen w-screen">

    <!-- Navbar -->
    <?php require('views/partials/navbar.php'); ?>


 <!-- Profile Container -->
 <div class="max-w-7xl mx-auto p-8">

<div class="bg-white shadow-md rounded-lg p-6">
    <!-- Profile Header -->
    <div class="flex items-center space-x-6">

        <div>
            <h2 class="text-3xl font-semibold text-gray-800"><?= htmlspecialchars($user['name']) ?></h2>
            <p class="text-gray-600"><?= htmlspecialchars($user['email']) ?></p>
            <p class="text-gray-500">Member since <?= htmlspecialchars($user['date_inscription']) ?></p>
        </div>
    </div>

    <!-- Rental History Section -->
    <div class="mt-10">
        <h3 class="text-xl font-semibold text-gray-800">Rental History</h3>
        <table class="min-w-full mt-4 table-auto">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Car</th>
                    <th class="px-6 py-3 text-left">Rental Period</th>
                    <th class="px-6 py-3 text-left">Price per Day</th>
                    <th class="px-6 py-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userReservations as $reservation) : ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <div class="flex items-center space-x-4">
                                <img src="<?= htmlspecialchars($reservation['car_image']) ?>" alt="Car Image" class="w-16 h-16 rounded-lg">
                                <span><?= htmlspecialchars($reservation['car_brand']) ?> <?= htmlspecialchars($reservation['car_model']) ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-3"><?= htmlspecialchars($reservation['start_date']) ?> - <?= htmlspecialchars($reservation['end_date']) ?></td>
                        <td class="px-6 py-3"><?= htmlspecialchars($reservation['price_per_day']) ?> USD</td>
                        <td class="px-6 py-3 text-red-500">
                            <span class="inline-flex px-2 text-xs font-semibold leading-5 
                                            <?= $reservation['status'] === 'confirmed' ? 'text-green-800 bg-green-100' : ($reservation['status'] === 'cancelled' ? 'text-red-800 bg-red-100' : 'text-yellow-800 bg-yellow-100') ?>">
                                            <?= ucfirst($reservation['status']) ?>
                                        </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</body>
</html>
