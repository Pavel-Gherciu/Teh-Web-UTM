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
      <?php include('validation.php') ?>
      <form method ="post" name="contactForm" enctype="multipart/form-data">
        <div class="logform_div">
          <label for="name" class="logform_label">Nume</label>
          <input type="text" name="name" class="logform_input" placeholder="Nume"  required>
          <?php if(isset($name_error)) {?>
            <p class="form_error"><?php echo $name_error ?></p>
          <?php } ?>
        </div>
        <div class="logform_div">
          <label for="email" class="logform_label">E-mail</label>
          <input type="text" name="email" class="logform_input" placeholder="E-mail" required>
          <?php if(isset($email_error)) {?>
            <p class="form_error"><?php echo $email_error ?></p>
          <?php } ?>
        </div>
        <div class="logform_div">
          <label for="phone" class="logform_label">Telefon</label>
          <input type="text" name="phone" class="logform_input" placeholder="Telefon" required>
          <?php if(isset($phone_error)) {?>
            <p class="form_error"><?php echo $phone_error ?></p>
          <?php } ?>
        </div>
        <div class="logform_div">
          <label for="subject" class="logform_label">Subiect</label>
          <input type="text" name="subject" class="logform_input" placeholder="Subiect" required>
          <?php if(isset($subject_error)) {?>
            <p class="form_error"><?php echo $subject_error ?></p>
          <?php } ?>
        </div>
        <div class="logform_div">
          <label for="message" class="logform_label">Mesaj</label>
          <textarea type="text" name="message" class="logform_text" placeholder="Mesaj" rows="4" cols="2" required></textarea>
          <?php if(isset($message_error)) {?>
            <p class="form_error"><?php echo $message_error ?></p>
          <?php } ?>
        </div>
        <?php
          include('contact_form.php');
        ?>
        <?php if(!empty($response)) {?>
          <div class="logform_div <?php echo $response['status']; ?>" role="alert">
            <?php 
            if(count($errors) == 0) {
              echo $response['message'];
            }?>
          </div>
        <?php }?>
        <button type="submit" class="logform_button" align=center name="send" value="Send">Trimite</button>
      </form>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
  <script src="../js/contact_valid.js"></script>
</body>
</html>