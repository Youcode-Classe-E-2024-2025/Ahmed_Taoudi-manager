<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">

<div class="mt-4">
            <div class="flex flex-wrap -mx-6">
                <div class="w-full px-6 mt-6 sm:w-1/3 ">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-yellow-400 bg-opacity-75 rounded-full">
                            
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700"><?= $pending_account ?></h4>
                            <div class="text-gray-500">pending account</div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-6 mt-6 sm:w-1/3  ">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-green-400 bg-opacity-75 rounded-full">
                            
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700"><?= $active_account ?></h4>
                            <div class="text-gray-500">active account</div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-6 mt-6 sm:w-1/3 ">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-rose-600 bg-opacity-75 rounded-full">

                                
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700"><?= $archived_account ?></h4>
                            <div class="text-gray-500">archived account</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-medium text-gray-700">Users</h3>

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
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    date inscription</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                </th>

                            </tr>

                        </thead>

                        <tbody class="bg-white">

                            <?php foreach ($list as $user) : ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <!--  -->

                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900"><?= $user['name'] ?>
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500"><?= $user['email'] ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 <?= $user['userstatus']=='pending'? 'text-yellow-800 bg-yellow-100':($user['userstatus']=='active'?'text-green-800 bg-green-100':'text-red-800 bg-red-100') ?>   rounded-full"><?= $user['userstatus'] ?></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full"><?= $user['date_inscription'] ?></span>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                        <?php if($user['userstatus'] !== 'active'){ ?> 
                                        <button type="button" data-id="<?= $user['id'] ?>" data-action="<?= $user['userstatus'] ?>" onclick="openModel(event,'active')" class="bg-indigo-600 text-white rounded py-1 px-3 font-semibold hover:bg-indigo-900">active</button>
                                        <?php }else{?> 
                                        <button type="button" data-id="<?= $user['id'] ?>" data-action="<?= $user['userstatus'] ?>" onclick="openModel(event,'archived')" class="bg-rose-500 text-white rounded py-1 px-3 font-semibold hover:bg-rose-700">archive</button>
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