<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container px-6 py-8 mx-auto">
        <div class="flex w-full justify-between">
        <h3 class="text-3xl font-medium text-gray-700 ">Cars</h3>
        <button onclick="openModelAddCar(event)" class="px-6 py-2  bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add New Car</button>
        </div>

        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Name</th>
                                    <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    photo</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    disponible</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    day price</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">

                        <?php foreach ($list as $car) : ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <!--  -->

                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900">marque : <?= $car['marque'] ?>
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500">modele : <?= $car['modele'] ?></div>
                                                <div class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full">matricule : <?= $car['matricule'] ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <img class="h-28" src="<?= $car['image_url'] ?>" alt="<?= $car['marque'] .' ' .$car['modele']?>">
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5<?= $car['disponible']?" text-green-800 bg-green-100":" text-rose-800 bg-red-100" ?> text-green-800 bg-green-100 rounded-full">
                                            <?= $car['disponible']?"available":"not available" ?></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full"><?= $car['matricule'] ?></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full"><?= $car['prix_par_jour'] . ' Dh' ?></span>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                        <button data-carid="<?= $car['id'] ?>" onclick="openModelEditCar(event)" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<section id="edit-car-model" class="hidden absolute h-screen w-screen top-0 left-0 z-50 backdrop-blur bg-[#0000006c] ">
        <<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Edit Car Information</h2>
        
        <form id="form-edit-car" action="/manage_car" method="POST" >
            <!-- id -->
            <input type="hidden" name="id" value="-1">
            
            <!-- Marque -->
            <div class="mb-4">
                <label for="marque" class="block text-gray-700 font-medium">Car Marque</label>
                <input type="text" name="marque" id="marque" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
            </div>
            
            <!-- Modele -->
            <div class="mb-4">
                <label for="modele" class="block text-gray-700 font-medium">Car Model</label>
                <input type="text" name="modele" id="modele" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
            </div>
            
            <!-- Matricule -->
            <div class="mb-4">
                <label for="matricule" class="block text-gray-700 font-medium">Car  Matricule</label>
                <input type="text" name="matricule" id="matricule" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
            </div>

            <!-- Prix par Jour -->
            <div class="mb-4">
                <label for="prix_par_jour" class="block text-gray-700 font-medium">Price per Day </label>
                <input type="number" step="0.01" name="prix_par_jour" id="prix_par_jour" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<!-- Existing Price -->" required>
            </div>

            <!-- disponible -->
            <div class="mb-4">
                <label for="disponible" class="block text-gray-700 font-medium">Available </label>
                <select name="disponible" id="disponible" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="1" >Yes</option>
                    <option value="0" >No</option>
                </select>
            </div>

            <!-- Image URL -->
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700 font-medium">Car Image URL</label>
                <input type="text" name="image_url" id="image_url" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<!-- Existing Image URL -->">
            </div>
            
            <!-- CSRF -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="flex justify-center">
                <button type="submit" name="submit-edit-car" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Car Info</button>
                <button type="button" onclick="closeModel(event)" class="px-6 mx-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" >Cancel</button>
            </div>
        </form>
    </div>
    </section>
    <section id="add-car-model" class="hidden absolute h-screen w-screen top-0 left-0 z-50 backdrop-blur bg-[#0000006c] ">
        <<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Edit Car Information</h2>
        
        <form id="form-add-car" action="/manage_car" method="POST" >
           
            
            <!-- Marque -->
            <div class="mb-4">
                <label for="marque" class="block text-gray-700 font-medium">Car Marque</label>
                <input type="text" name="marque" id="marque" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
            </div>
            
            <!-- Modele -->
            <div class="mb-4">
                <label for="modele" class="block text-gray-700 font-medium">Car Model</label>
                <input type="text" name="modele" id="modele" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
            </div>
            
            <!-- Matricule -->
            <div class="mb-4">
                <label for="matricule" class="block text-gray-700 font-medium">Car  Matricule</label>
                <input type="text" name="matricule" id="matricule" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
            </div>

            <!-- Prix par Jour -->
            <div class="mb-4">
                <label for="prix_par_jour" class="block text-gray-700 font-medium">Price per Day </label>
                <input type="number" step="0.01" name="prix_par_jour" id="prix_par_jour" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<!-- Existing Price -->" required>
            </div>

            <!-- disponible -->
            <div class="mb-4">
                <label for="disponible" class="block text-gray-700 font-medium">Available </label>
                <select name="disponible" id="disponible" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="1" >Yes</option>
                    <option value="0" >No</option>
                </select>
            </div>

            <!-- Image URL -->
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700 font-medium">Car Image URL</label>
                <input type="url" name="image_url" id="image_url" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="http://....">
            </div>

            <!-- CSRF -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="flex justify-center">
                <button type="submit" name="submit-add-car" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">add Car</button>
                <button type="button" onclick="closeModel(event)" class="px-6 mx-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" >Cancel</button>
            </div>
        </form>
    </div>
    </section>