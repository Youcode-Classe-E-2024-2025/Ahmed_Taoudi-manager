<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>Document</title>
</head>

<body class="bg-blue-100">
    <!-- Navbar -->
    <?php require('views/partials/navbar.php') ?>
    <main class="min-h-screen">
    

    <div class="max-w-4xl mx-auto p-6 mt-10 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Car Booking Form</h1>

    <form id="reservation-form" action="/book" method="POST" class="space-y-6">
        <div class="bg-blue-100 p-4 rounded-lg">
            <h2 class="text-2xl font-semibold text-blue-700 mb-4">Car Info</h2>
            <!--voiture_id -->
            <input type="hidden" name="voiture_id" value="<?= $car['id']?> ">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <img class="h-52 rounded-lg" src="<?= $car['image_url']?>" alt="<?= $car['marque'] . " " .$car['modele'] ?>">
                <div>
                    <p class="text-xl font-semibold text-blue-700 "> marque : <span class="text-blue-900"><?= $car['marque']?> </span> </p>   
                    <p class="text-xl font-semibold text-blue-700 "> modele : <span class="text-blue-900"><?= $car['modele']?> </span> </p> 
                    <p class="text-xl font-semibold text-blue-700 "> Price Per Day : <span class="text-blue-900"><?= $car['prix_par_jour']?> Dh </span> </p> 
                </div>
            </div>
        </div>

        <!-- Reservation Dates Section -->
        <div class="bg-blue-100 p-4 rounded-lg">
            <h2 class="text-2xl font-semibold text-blue-700 mb-4">Reservation Dates</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-blue-600">Start Date</label>
                    <input type="date" id="start_date" name="start_date" required
                           class="w-full px-4 py-2 border border-blue-300 rounded-md focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-blue-600">End Date</label>
                    <input type="date" id="end_date" name="end_date" required
                           class="w-full px-4 py-2 border border-blue-300 rounded-md focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>
        <!-- Error message  -->
        <div id="error-message" class="hidden text-red-600 mt-4 text-center"></div>

        <!-- Submit Section -->
        <div class="flex justify-center">
            <button type="submit" name="submit-booking" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Book Now
            </button>
        </div>
    </form>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById('reservation-form');
        const errorMessageDiv = document.getElementById('error-message');
 
        const today = new Date();
        const maxDate = new Date();
        maxDate.setFullYear(today.getFullYear() + 1); 

        // YYYY-MM-DD
        const maxDateString = maxDate.toISOString().split('T')[0];

        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        // min
        startDateInput.min = today.toISOString().split('T')[0];  
        endDateInput.min = today.toISOString().split('T')[0];  
        // max
        // startDateInput.max = maxDateString;  
        // endDateInput.max = maxDateString;  
 
        form.addEventListener('submit', function (event) { 
            errorMessageDiv.innerHTML = '';
            errorMessageDiv.classList.add('hidden');

            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const startDateObj = new Date(startDate);
            const endDateObj = new Date(endDate);

            if (!startDate || isNaN(startDateObj.getTime())) {
                errorMessageDiv.innerHTML = 'Please select a valid start date.';
                errorMessageDiv.classList.remove('hidden');
                event.preventDefault(); 
                return;
            }

            if (!endDate || isNaN(endDateObj.getTime())) {
                errorMessageDiv.innerHTML = 'Please select a valid end date.';
                errorMessageDiv.classList.remove('hidden');
                event.preventDefault(); 
                return;
            }

            if (startDateObj < today) {
                errorMessageDiv.innerHTML = 'Start date cannot be in the past.';
                errorMessageDiv.classList.remove('hidden');
                event.preventDefault(); 
                return;
            }

            if (endDateObj <= startDateObj) {
                errorMessageDiv.innerHTML = 'End date must be after the start date.';
                errorMessageDiv.classList.remove('hidden');
                event.preventDefault(); 
                return;
            }

            if (endDateObj > maxDate) {
                errorMessageDiv.innerHTML = 'End date cannot be later than one year from today.';
                errorMessageDiv.classList.remove('hidden');
                event.preventDefault(); 
                return;
            }
        });
    });
</script>


    </main>
    <footer class="bg-blue-600 text-white py-8">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Rento. All rights reserved.</p>
        </div>
    </footer>
    

</body>


</html>