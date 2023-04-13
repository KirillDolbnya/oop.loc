<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        <?php echo $this->e($title);?>
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="App/views/assets/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="App/views/assets/css/app.bundle.css">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <link id="myskin" rel="stylesheet" media="screen, print" href="App/views/assets/css/skins/skin-master.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="App/views/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="App/views/assets/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="App/views/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="App/views/assets/css/fa-brands.css">
</head>
<body>

<?php echo $this->section('content');?>

<script src="App/views/assets/js/vendors.bundle.js"></script>
<script>
    $("#js-login-btn").click(function(event)
    {

        // Fetch form to apply custom Bootstrap validation
        var form = $("#js-login")

        if (form[0].checkValidity() === false)
        {
            event.preventDefault()
            event.stopPropagation()
        }

        form.addClass('was-validated');
        // Perform ajax submit here...
    });

</script>
</body>
</html>