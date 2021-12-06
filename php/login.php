<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logare</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/subproperties.css">
  <link rel="stylesheet" href="../css/fonts.css">
  <link rel="stylesheet" href="../css/register.css">
  <link rel="stylesheet" href="../css/all.css">
</head>
<body>
  <main>
    <header>
      <ul class="header-main">
        <li class="header-list">
          <a href="index.php" class="link">Pagina principală</a>
        </li>
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
          <a href="../pages/reviews.html" class="link" target="_blank">Recenzii</a>
        </li>
      </ul>
    </header>
    <div class="logform">
      <div class="logform_title">Logare</div>
      <form name="logform" id="logform">
        <div class="logform_div">
          <label for="username" class="logform_label">Username</label>
          <input type="text" name="username" class="logform_input" placeholder="Username" required>
          <label class="msg msg-username"></label>
        </div>
        <div class="logform_div">
          <label for="password" class="logform_label">Parola</label>
          <input type="password" name="password" class="logform_input" placeholder="Parola" required>
          <label class="msg msg-password"></label>
        </div>
        <p class="login-msg form_error"></p>
        <?php 
          if(isset($_SESSION["register-success"])){
              echo '<p class="reg-msg"> ' . $_SESSION["register-success"] . ' </p>';
              unset($_SESSION["register-success"]);
          }elseif(isset($_SESSION["logout"])){
              echo '<p class="out-msg"> ' . $_SESSION["logout"] . ' </p>';
              unset($_SESSION["logout"]);
          }
        ?> 
        <input type="submit" class="logform_button" align=center name="login_user" id="login-btn" value="Logheaza-te"></input>
      </form>
    </div>
    <p class="already">Nu ai cont?<a href="register.php">&nbsp Inregistreaza-te</a></p>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>   
  <script src="../js/form_valid.js"></script>
</body>
</html>