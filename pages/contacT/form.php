<!doctype html>
<html lang="en">

    <head>
        <title>Sunny Shop</title>
        <?php
        require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/helmet.php')
        ?>
        <link rel="stylesheet" href="/resources/css/header.css">
        <link rel="stylesheet" href="/resources/css/slide.css">
        <link href="fcf-assets/css/fcf.default.css" rel="stylesheet">
      </head>
      <body>
        
      <?php
      require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/header.php');
      ?>

<body>

    <!-- the lines below are needed -->
     <form style="margin-left: 500px" action=""> 
        <div style="max-width:500px;padding:30px">
            <div id="fcf-form">
                <form class="fcf-form-class" id="freeversion" method="post" action="fcf-assets/fcf.process.php">
    
                    <div class="field">
                        <label for="Name" class="label has-text-weight-normal">Your name</label>
                        <div class="control">
                            <input type="text" name="Name" id="Name" class="input is-full-width" maxlength="100"
                                data-validate-field="Name">
                        </div>
                    </div>
                    <div class="field">
                        <label for="Email" class="label has-text-weight-normal">Your email address</label>
                        <div class="control">
                            <input type="email" name="Email" id="Email" class="input is-full-width" maxlength="100"
                                data-validate-field="Email">
                        </div>
                    </div>
                    <div class="field">
                        <label for="Message" class="label has-text-weight-normal">Your message</label>
                        <div class="control">
                            <textarea name="Message" id="Message" class="textarea" maxlength="3000" rows="5" 
                            data-validate-field="Message"></textarea>
                        </div>
                    </div>
                    <div id="fcf-status" class="fcf-status"></div>
                    <div class="field">
                        <div class="buttons">
                            <button id="fcf-button" type="submit" class="button is-link is-medium">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="fcf-thank-you" style="display:none">
                <!-- Thank you message goes below -->
                <strong>Thank you</strong>
                <p>Thanks for contacting us, we will get back in touch with you soon.</p>
                <!-- Thank you message goes above -->
            </div>
        </div>
     </form>
     
     <?php
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/footer.php')
?>
    <script src="fcf-assets/js/fcf.just-validate.min.js"></script>
    <script src="fcf-assets/js/fcf.form.js"></script>
    <!-- the lines above are needed -->


</body>

</html>