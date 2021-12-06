<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inregistrare</title>
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
      <div class="logform_title">Inregistrare</div>
      <form name="regform" id="regform">
        <div class="logform_div">
          <label for="username" class="logform_label">Username</label>
          <input type="text" name="username" class="logform_input" placeholder="Username">
          <label class="msg msg-username"></label>
        </div>
        <div class="logform_div">
          <label for="email" class="logform_label">E-mail</label>
          <input type="text" name="email" class="logform_input" placeholder="E-mail">
          <label class="msg msg-email"></label>
        </div>
        <div class="logform_div">
          <label for="password_1" class="logform_label">Parola</label>
          <input type="password" name="password_1" class="logform_input" id="password" placeholder="Parola" >
          <label class="msg msg-password_1"></label>
        </div>
        <div class="logform_div">
          <label for="password" class="logform_label">Confirma Parola</label>
          <input type="password" name="password_2" class="logform_input" placeholder="Parola">
          <label class="msg msg-password_2"></label>
        </div>
        <div class="logform_div form_error">
        </div>
        <input type="submit" class="logform_button" align=center id="register_btn" value="Inregistreaza-te"></input>
      </form>
    </div>
    <p class="already">Deja esti inregistrat?<a href="login.php">&nbsp Conecteaza-te</a></p>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
  <script src="../js/form_valid.js"></script>
</body>
</html>