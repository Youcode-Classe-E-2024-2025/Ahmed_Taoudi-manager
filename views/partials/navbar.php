
<nav class="bg-blue-600 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center text-white">
            <a <?php if(isset($_SESSION['userrole']) && $_SESSION['userrole'] =='admin' ) echo 'href="/admin"' ?>  class="text-2xl font-bold">Rento</a>
            
            <div class="space-x-6">
                <a href="/" class="hover:text-gray-300">Home</a>
                <a href="/cars" class="hover:text-gray-300">Cars</a>
                <a href="/#about" class="hover:text-gray-300">About</a>
                <a href="/#contact" class="hover:text-gray-300">Contact</a>
            </div>
           <div>
            <?php if(!isset($_SESSION['username'])) {?>
           <a class=" px-4 py-2 rounded bg-white text-blue-900" href="/connecter?mtd=login">Log In</a>
           <a class=" px-4 py-2 rounded bg-white text-blue-900" href="/connecter?mtd=signup">Sign Up</a>
           <?php }else{ ?>
            <span class="text-white font-semibold mr-4"><?= $_SESSION['username']  ?> </span>
            <a class=" px-4 py-2 rounded bg-white text-blue-900" href="/connecter?mtd=logout">Log Out</a>
            <?php  } ?>
           </div>
        </div>
    </nav>