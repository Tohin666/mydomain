<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testimonials</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="name"><br>
    <textarea name="testimonial" id="" cols="30" rows="10"></textarea>
    <input type="submit">
</form>
<?php foreach ($testimonials as $testimonial): ?>
<h2><?= $testimonial['name'] ?></h2>
<p><?= $testimonial['testimonial'] ?></p>
<?php endforeach;?>
</body>
</html>