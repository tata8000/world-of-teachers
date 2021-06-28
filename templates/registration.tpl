<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/registration.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/image/icon.png" type="image/png">
    <title><?= $title ?></title>
</head>
<body>
    <container class="container">
        <form action='' method='post'>
            <div class="container_top">
                <div class="back_block">
                    <img class="ago" src="../image/ago.png" name="back" type="image" onclick="<?= $location ?>">
                </div>
                <div class="text">
                    <?= $registration_text ?>
                </div>
            </div>
            <div class="container_bottom">
                <div class="container_bottom_block">
                    <?= $registration ?>
                </div>
            </div>
        </form>
    </container>
</body>
</html>