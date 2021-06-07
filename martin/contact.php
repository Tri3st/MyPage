<?php

    include 'includes/head.php';

    include 'includes/header.php';

?>

<!-- above is the head and header of the page -->



<!-- The actual content of the webpage .. -->

<div>

<h1>Contact</h1>

<p class="contact">

Please fill in the fields.

</p>

<form class="contact" action="contact2.php" method="post">

  <input class="contact" type="text" name="name" placeholder="Full name">

  <input class="contact" type="text" name="email" placeholder="Email adres">

  <input class="contact" type="text" name="subject" placeholder="Subject">

  <textarea class="contact" name="message" placeholder="Enter message"></textarea>

  <button class="contactbtn" type="submit" name="submit">SEND EMAIL</button>

</form>

</div> 



<!-- and the footer -->

<?php

    include 'includes/footer.php';

?>