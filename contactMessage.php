<?php
require('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./contact.css">

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="homepage.css" />

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </head>
  <style>
    body {
      margin: 0;
    }
    /* Navbar */
    .bg-dark {
      background-color: #1f1f1f !important;
    }
    .btn-outline-success {
      color: #e73137;
      border-color: #e73137;
    }
    .btn-outline-success:hover {
      background-color: #e73137;
      border-color: #e73137;
    }
    #logo {
      height: 3vw;
      margin-left: 1vw;
    }
    .navbar {
      padding: 0 1rem;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="homepage.php">
          <img
            id="logo"
            src="images/logo.png"
            id="logo"
            style="zoom: 0.6; margin: 12px auto;"
          />
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="homepage.php"
              >Home </a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="movies.php">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php if (isset($_SESSION['email']))
          { ?>
            <li class="nav-item">
              <a class="nav-link" href="profilepage.html">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Login/Signup</a>
          </li>
          <?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0 ">
          <input
            class="form-control mr-sm-2 height"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-success my-2 my-sm-0 height text-center" type="submit">
            Search
          </button>
        </form>
      </div>
    </nav>
<?php

      $name = $_POST["name"];
      $email = $_POST["email"];
      $message = $_POST["message"];

      $sql = "INSERT INTO contact (fullName, emailAddress, message) VALUES ('$name', '$email', '$message')";
if($conn->query($sql) === TRUE){
    $msg = "This is what we have received from you.";
} else{
    echo "We could not send the message due to an error. ";
}
  ?>

<div class="contact-container">
    <div class="left-col">
        
    </div>
    <div class="right-col">
      <div class="theme-switch-wrapper">
      
  </div>
      
      <h1>Your Message</h1>
      <p><?php echo $msg ?></p>
      
      <form id="contact-form-result" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="name">Full name</label>
    <input disabled type="text" id="name" name="name" value="<?php echo $name ?>" required>
        <label for="email">Email Address</label>
    <input disabled type="email" id="email" name="email" value="<?php echo $email ?>" required>
        <label for="message">Message</label>
    <input type="text" disabled value="<?php echo $message ?>" id="message" name="message" required>
        <a class="anchorBtn" href="homepage.php">Back to Home</a >
    
  </form>
    </div>
  </div>
  <?php
  $sql = "INSERT INTO contact (fullName, emailAddress, message) VALUES ('$name', '$email', '$message')";
if($conn->query($sql) === TRUE){
    
} else{
    echo ("ERROR: Could not send message. ");
} ?>
</body>
</html>