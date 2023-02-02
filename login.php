<?php
    $showError = false;
   $login = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'partials/_db.php';
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"];
    $sql = "Select * from users where username='$username' AND password='$password'";
    $result =  mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: admin.php?username=".$username);

    }
    else{
      $showError = "Invalid username or password";
    }

  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/login.css"> -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <title>Document</title>
</head>

<body>

<?php
if ($showError) {
  echo '<div class="bg-red-500 border-t-4 border-yellow-400 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">ERROR! IN LOGIN SYSTEM</p>
      <p class="text-sm">Username or Password is invalid</p>
    </div>
  </div>
</div>';
}

?>



  <section class="h-mobile ml-24 gradient-form bg-gray-200 md:h-screen">
    <div class="container py-12 px-6 h-full">
      <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
        <div class="xl:w-10/12">
          <div class="block bg-white shadow-lg rounded-lg">
            <div class="lg:flex lg:flex-wrap g-0">
              <div class="lg:w-6/12 px-4 md:px-0">
                <div class="md:p-12 md:mx-6">
                  <div class="text-center">
                    <img class="mx-auto w-48" src="images/logo.png" alt="logo" />
                    <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">We are The Lotus Team</h4>
                  </div>
                  <form action="login.php" method="post">
                    <p class="mb-4">Please login to your account</p>
                    <div class="mb-4">
                      <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="loginusername" name="loginusername" placeholder="Username" />
                    </div>
                    <div class="mb-4">
                      <input type="password" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="loginpassword" name="loginpassword" placeholder="Password" />
                    </div>
                    <div class="text-center pt-1 mb-12 pb-1">
                      <button class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3" type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light" style="
                        background: linear-gradient(
                          to right,
                          #ee7724,
                          #d8363a,
                          #dd3675,
                          #b44593
                        );
                      ">
                        Log in
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none" style="
                background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
              ">
                <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                  <h4 class="text-xl font-semibold mb-6">We are more than just a company</h4>
                  <p class="text-sm">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>








</body>

</html>