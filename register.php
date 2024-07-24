<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
  <meta http-equiv="refresh" content="5;url=index.html">
  <title>WeBooks - Registration</title>
</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
        <span class="fs-4 serif-font text-white"><span class="webooks-text-yellow">WE</span>BOOKS</span>
      </a>
    </header>

    <?php
    include './includes/config.php';
    $tmp = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO t_user (first_name, last_name, email, password, birthdate, phone, address) VALUES 
      ('$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '" . $tmp . "','$_POST[birthdate]', '$_POST[phone]', '$_POST[address]')";
    if ($conn->query($sql) === TRUE) {
      echo "<div class='text-center mb-5'>
      <h3>Account Successfully Registered!</h3>
      </div>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    ?>
    <div class="text-center">
      <h4>You will be redirected</h4>
      <h4>Click <a href="index.html" target="_self">here</a> if you don't get automatically redirected.</h4>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>