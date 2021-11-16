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
      <?php include('validation.php') ?>
      <?php include('server.php') ?>
      <form action="login.php" method ="post" name="logform">
        <div class="logform_div">
          <label for="username" class="logform_label">Username</label>
          <input type="text" name="username" class="logform_input" placeholder="Username" required>
          <?php if(isset($username_error)) {?>
            <p class="form_error"><?php echo $username_error ?></p>
          <?php } ?>
        </div>
        <div class="logform_div">
          <label for="password" class="logform_label">Parola</label>
          <input type="password" name="password" class="logform_input" placeholder="Parola" required>
          <?php if(isset($password_error)) {?>
            <p class="form_error"><?php echo $password_error ?></p>
          <?php } ?>
        </div>
        <?php include('errors.php') ?>
        <button type="submit" class="logform_button" align=center name="login_user">Logheaza-te</button>
      </form>
    </div>
    <p class="already">Nu ai cont?<a href="register.php">&nbsp Inregistreaza-te</a></p>
  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
  <script src="../js/form_valid.js"></script>
</body>
</html>