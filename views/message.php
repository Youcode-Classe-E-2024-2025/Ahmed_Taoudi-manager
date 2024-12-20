<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>message</title>
</head>
<body class= " flex items-center justify-center bg-blue-200 h-screen w-screen">
   <div class="py-6 px-10 text-center text-blue-900  bg-white  rounded-lg">
   <!-- <p class="text-2xl mb-3 font-bold  ">:(</p> -->
   <p class="text-2xl font-bold my-4  "><?= $message ?></p>
   <a href="/connecter" class="hover:underline ">login page</a><br>
   <a href="/" class="hover:underline">home page</a>
   </div>
  
</body>
</html>