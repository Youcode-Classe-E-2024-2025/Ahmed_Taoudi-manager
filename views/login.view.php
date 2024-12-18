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
                    <h3 class="pt-4 text-2xl text-center">Welcome Back!</h3>
                    <form method="POST" action="" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="useremail">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="useremail"
                                name="useremail"
                                type="email"
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
                                
                                placeholder="************" /> <p id="password-error"  class="hidden text-xs italic text-red-500">Please choose a password.</p>
                        </div>
                        <div class="mb-4">
                            <input class="mr-2 leading-tight" type="checkbox" id="checkbox_id" />
                            <label class="text-sm" for="checkbox_id">
                                Remember Me
                            </label>
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                                name="login">
                                Log In
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="?mtd=signup">
                                Create an Account!
                            </a>
                        </div>
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="#">
                                Forgot Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.querySelector('form').addEventListener('submit',(event)=>{

        let formIsValid = true;

        // Clear all previous error messages
        document.querySelectorAll('.error').forEach(function(element) {
            element.classList.add('hidden');
        });

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
        if(!formIsValid){
            event.preventDefault();
        }
    });
</script>

</html>