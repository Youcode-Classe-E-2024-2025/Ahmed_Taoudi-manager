
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-medium text-gray-700">Reservations</h3>

        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                     ID</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    User</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Car</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Start Date</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    End Date</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Status</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php foreach ($list as $reservation) : ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm font-medium leading-5 text-gray-900"><?= $reservation['id'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm font-medium leading-5 text-gray-900"><?= $reservation['user_name'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <img class="h-28 " src="<?= $reservation['car_image'] ?>" alt="<?= $reservation['car_marque'] .' ' .$reservation['car_modele']?>">
                                        <div class="text-sm font-medium leading-5 text-gray-900"><?= $reservation['car_marque'] .' ' .$reservation['car_modele']?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm font-medium leading-5 text-gray-500"><?= $reservation['date_debut'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm font-medium leading-5 text-gray-500"><?= $reservation['date_fin'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 
                                            <?= $reservation['statut'] === 'confirmed' ? 'text-green-800 bg-green-100' : ($reservation['statut'] === 'cancelled' ? 'text-red-800 bg-red-100' : 'text-yellow-800 bg-yellow-100') ?>">
                                            <?= ucfirst($reservation['statut']) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                       <?php if($reservation['statut'] == 'pending'){ ?> 
                                        <button type="button" data-id="<?= $reservation['id'] ?>" data-action="<?= $reservation['statut'] ?>" onclick="openModelReservation(event,'cancelled')" class="bg-rose-600 text-white rounded py-1 px-3 font-semibold hover:bg-rose-900">cancel</button>
                                        <button type="button" data-id="<?= $reservation['id'] ?>" data-action="<?= $reservation['statut'] ?>" onclick="openModelReservation(event,'confirmed')" class="bg-indigo-500 text-white rounded py-1 px-3 font-semibold hover:bg-indigo-700">confirme</button>
                                      
                                        <?php }else{?> 
                                          <?php }?>
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
<section id="reservation_message-model" class="hidden absolute h-screen w-screen top-0 left-0 z-50 backdrop-blur bg-[#0000006c] ">
        <div class="flex justify-center items-center h-full w-full ">
            <form action="/manage_reservations" method="POST" class="bg-white rounded-lg py-10 px-10 text-center ">
                <p id="submit_message2">
                    
                </p>

                <!-- CSRF -->
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                <input type="hidden" name="selected_id" id="selected_id2"  value="-1">
                <input type="hidden" name="_action" id="_action2"  value="-1">
                <button type="button" onclick="closeModel(event)" class="px-4 py-1 rounded text-white bg-red-600 ">Cancel</button>
                <button type="submit" name="change_reservation_status"  class="px-4 py-1 rounded text-white bg-blue-600 ">Submit</button>
            </form>
        </div>
    </section>