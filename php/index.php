<?php
session_start();

if (!isset($_SESSION["info"]["username"])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HCA</title>
  <link rel="stylesheet" href="../css/properties.css">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/fonts.css">
  <link rel="stylesheet" href="../css/all.css">
</head>
<body>
  <div class="load-text">0%</div>
  <main id = "main-body">
    <header>
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" align=center>
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
            echo '<p class="time"> ' . $_SESSION['time'] . ' </p>';
            unset($_SESSION['time']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <?php  if (isset($_SESSION["info"]["username"])) : ?>
      <div class="logging">
        <p>Salut, <strong><?php echo $_SESSION["info"]["username"]; ?></strong></p>
    	  <p class="logout"> <a href="index.php?logout='1'">Log out</a> </p>
      </div>
    <?php endif ?>
      <ul class="header-main">
        <li class="header-list">
          <a href="../pages/about.html" class="link">Despre</a>
        </li>
        <li class="header-list">
          <a href="../pages/resume.html" class="link">Rezumat</a>
        </li>
        <li class="header-list">
          <a href="../pages/author.html" class="link">Autorul</a> 
        </li>
        <li class="header-list">
          <a href="contact.php" class="link">Contact</a>
        </li>
        <li class="header-list">
          <a href="../pages/reviews.html" class="link">Recenzii</a>
        </li>
      </ul>
    </header>
    <div class="book-section">
      <img src="../images/book.png" alt="book" class="book-image">
      <div class="info">
        <div class="info-title">
          Soldățelul de plumb
        </div>
        <div class="info-text">
          Poveste pentru copii de Hans Christian Andersen despre drama iubirii dintre un soldăţel de plumb şi o dansatoare de hârtie.
        </div>
        <a href="../pages/about.html" class="info-button link2 raise">
          Citește mai mult
        </a>
      </div>
    </div>
  </main>
  <script src="../js/landing.js"></script>
</body>
</html>