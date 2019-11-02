<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>iOS Distributor</title>
    <meta name="description" content="Simple tool to distribute iOS Apps">
    <meta name="author" content="Digitalfabrik gGmbH">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>

        <form action="select.php" method="post">
            URL to IPA: <input type="string" name="ipa_url"><br>
            <input type="submit">
        </form>

        <?php
        $ipa_url = $_POST['ipa_url'] || $_GET['ipa_url'];

        if (!empty($ipa_url)) :
            ?>
            <a href="itms-services://?action=download-manifest&url=<?php $BASE_URL ?>/manifest.plist.php?ipa_url=<?php echo $ipa_url ?>">
                Install Integreat
            </a>
        <?php endif ?>
    </div>
</body>

</html>