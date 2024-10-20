<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

    <!-- Container -->
    <div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">

        <!-- Login component -->
        <div class="flex shadow-md">
            <!-- Login form -->
            <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white"
                style="width: 24rem; height: 32rem;">
                <div class="w-72">
                    <!-- Heading -->
                    <h1 class="text-xl font-semibold italic">Welcome To My Point Of Sale</h1>

                    <small class="text-gray-400">Please enter your details!</small>

                    <!-- Form -->
                    <form class="mt-4" action="/project_akhir/response_input.php?modul=login" method="POST">
                        <div class="mb-3">
                            <label class="mb-2 block text-xs font-semibold">Username</label>
                            <input type="username" name="username_login" placeholder="Enter your Username" required
                                class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                        </div>

                        <div class="mb-3">
                            <label class="mb-2 block text-xs font-semibold">Password</label>
                            <input type="password" name="password_login" placeholder=" *****" required
                                class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                        </div>

                        <div class="mb-3 flex flex-wrap content-center">
                            <input id="remember" name="remember_me" type="checkbox"
                                class="mr-1 checked:bg-purple-700" />
                            <label for="remember" class="mr-auto text-xs font-semibold">Remember for 1 days</label>
                            <a href="#" class="text-xs font-semibold text-purple-700">Forgot password?</a>
                        </div>


                        <div class="mb-3">
                            <button
                                class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md">Sign
                                in</button>
                            <!-- <button
                        class="flex flex-wrap justify-center w-full border border-gray-300 hover:border-gray-500 px-2 py-1.5 rounded-md">
                        <img class="w-5 mr-2"
                            src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA">
                        Sign in with Google
                    </button> -->
                        </div>
                    </form>

                    <!-- Footer -->
                    <!-- <div class="text-center">
                <span class="text-xs text-gray-400 font-semibold">Don't have account?</span>
                <a href="#" class="text-xs font-semibold text-purple-700">Sign up</a>
            </div> -->
                </div>
            </div>

            <!-- Login banner -->
            <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
                <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md"
                    src="https://i.imgur.com/9l1A4OS.jpeg">
            </div>

        </div>

        <!-- Credit -->
        <!-- <div class="mt-3 w-full">
<p class="text-center">Made by <a target="_blank" href="https://www.instagram.com/_inubayuaji/"
      class="text-purple-700">Inu Bayu Aji</a> and ispired by <a target="_blank"
      href="https://dribbble.com/shots/17564792-Log-in-page-Untitled-UI" class="text-purple-700">this</a>.
</p>
</div> -->
    </div>
</body>

</html>