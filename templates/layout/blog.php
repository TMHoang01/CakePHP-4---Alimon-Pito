<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hello, world!</title>

    <?= $this->Html->script([
        'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min'
        //,'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js'
    ],['block' => 'js']); ?>

</head>

<body>

<?= $this->element('nav'); ?>


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">A simple Blog Layout</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
</div>

<?= $this->fetch('content'); ?>


<footer class="bg-dark mt-3 text-light p-4 text-center">
    footer
</footer>
<?= $this->fetch('js'); ?>
</body>
</html>
