<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
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
          <a href="about.html" class="link">Despre</a>
        </li>
        <li class="header-list">
          <a href="resume.html" class="link">Rezumat</a>
        </li>
        <li class="header-list">
          <a href="author.html" class="link">Autorul</a> 
        </li>
        <li class="header-list">
          <a href="reviews.html" class="link" target="_blank">Recenzii</a>
        </li>
      </ul>
    </header>
    <div class="logform">
      <div class="logform_title">Contact</div>
      <form id="contactform">
        <div class="logform_div">
          <label for="name" class="logform_label">Nume</label>
          <input type="text" name="name" class="logform_input" placeholder="Nume"  required>
          <label class="msg-name msg"></label>   
        </div>
        <div class="logform_div">
          <label for="email" class="logform_label">E-mail</label>
          <input type="text" name="email" class="logform_input" placeholder="E-mail" required>
          <label class="msg-email msg"></label>
        </div>
        <div class="logform_div">
          <label for="phone" class="logform_label">Telefon</label>
          <input type="text" name="phone" class="logform_input" placeholder="Telefon" required>
          <label class="msg-phone msg"></label>
        </div>
        <div class="logform_div">
          <label for="subject" class="logform_label">Subiect</label>
          <input type="text" name="subject" class="logform_input" placeholder="Subiect" required>
          <label class="msg-subject msg"></label>
        </div>
        <div class="logform_div">
          <label for="message" class="logform_label">Mesaj</label>
          <textarea type="text" name="message" class="logform_text" placeholder="Mesaj" rows="4" cols="2" required></textarea>
          <label class="msg-message msg"></label>
        </div>
        <p class="msg_success logform_div"></p>        
        <p class="msg_fail logform_div"></p>
        <input type="submit" class="logform_button" align=center id="contact-btn" value="Trimite"></input>
      </form>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>    
  <script src="../js/contact_valid.js"></script>
</body>
</html>