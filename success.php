<?php
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : "User";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Success</title>
</head>
<body style="font-family:Arial, sans-serif; text-align:center; padding:50px;">
  <h2>✅ Registration Successful!</h2>
  <p>Thank you, <strong><?php echo $name; ?></strong>, your details have been recorded.</p>
  <a href="index.html">Go Back</a>
</body>
</html>
