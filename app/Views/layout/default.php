<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <title>JustBookStore <?= isset($pageTitle) ? $pageTitle : '' ?></title> -->
        <title><?=  $title; ?></title>
        <link rel="stylesheet" href="<?= base_url() ?>css/style.css?v=1.0">
        <link rel="stylesheet" href="<?= base_url() ?>css/my-style.css">
        <link rel="shortcut icon" type="image/png" href="/bookicon.png">
    </head>

<body class="bg-[#E5E9F0]">
    <?= $this->renderSection('content') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!-- <script src="<?= base_url() ?>js/navbar.js"></script> -->
</body>

</html>