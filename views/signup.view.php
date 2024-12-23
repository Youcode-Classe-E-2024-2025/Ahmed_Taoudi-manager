<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>Document</title>
</head>

<body class=" bg-blue-100">
    <!-- Navbar -->
    <?php require('views/partials/navbar.php') ?>
    <!-- Container -->
    <div class="container mx-auto h-screen">
        <div class="flex justify-center items-center h-full px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-gray-400 bg-center hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                    style="background-image: url('/assets/img/login.jpg')"></div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Join Us!</h3>
                    <form method="POST" action="" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                    <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                                Username
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="username"
                                name="username"
                                type="text"
                                required
                                placeholder="Username" />
                                <p id="username-error" class="error hidden text-xs italic text-red-500">Username is required.</p>
                                </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="useremail">
                            Useremail
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="useremail"
                                name="useremail"
                                type="email"
                                required
                                placeholder="welcometo@rento.car" />
                                <p id="email-error" class="error hidden text-xs italic text-red-500">Please enter a valid email.</p>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Password
                            </label>
                            <!--  border-red-500  -->
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="password"
                                type="password"
                                name="password"
                                required
                                placeholder="************" />
                            <p id="password-error"  class="hidden text-xs italic text-red-500">Please choose a password.</p>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Confirm Password
                            </label>
                            <!--  border-red-500  -->
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="password2"
                                type="password"
                                name="password2"
                                placeholder="************" />
                                <p id="password2-error" class="error hidden text-xs italic text-red-500">Passwords do not match.</p>
                                </div>
                        <div class="mb-4">
                            <input class="mr-2 leading-tight" type="checkbox" id="checkbox_id" />
                            <label class="text-sm" for="checkbox_id">
                                Remember Me
                            </label>
                        </div>
                        <!-- CSRF -->
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                                name="signup">
                                Sign In
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="?mtd=login">
                                already have an account?
                            </a>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        // Initially assume the form is valid
        let formIsValid = true;

        // Clear all previous error messages
        document.querySelectorAll('.error').forEach(function(element) {
            element.classList.add('hidden');
        });

        // Validate Username
        const username = document.getElementById('username').value;
        if (username.trim() === "") {
            document.getElementById('username-error').classList.remove('hidden');
            formIsValid = false;
        }

        // Validate Email
        const email = document.getElementById('useremail').value;
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailRegex.test(email)) {
            document.getElementById('email-error').classList.remove('hidden');
            formIsValid = false;
        }


        // Validate Password
        const password = document.getElementById('password').value;
        if (password.length < 6) {
            document.getElementById('password-error').classList.remove('hidden');
            formIsValid = false;
        }
        

        // Validate Confirm Password
        const password2 = document.getElementById('password2').value;
        if (password !== password2) {
            document.getElementById('password2-error').classList.remove('hidden');
            formIsValid = false;
        }

        // Prevent form submission if any validation failed
        if (!formIsValid) {
            event.preventDefault(); // Prevent the form from submitting
        }
    });
</script>



</html>