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

        <form action="index.php" method="post">
            URL to IPA: <input type="string" name="ipa_url"><br>
            <input type="submit">
        </form>

        <?php
            $ipa_url=$_POST['ipa_url'] || $_GET['ipa_url'];

        if (!empty($ipa_url)) :
            ?>
            <a href="itms-services://?action=download-manifest&url=https://download.integreat-app.de/ios/manifest.plist.php?ipa_url=https://build.integreat-app.de/job/integreat-react-native-app/job/develop/<?php echo $ipa_url ?>/artifact/output/export/Integreat.ipa">
                Install Integreat
            </a>egreat-react-native-app/job/develop/
        <?php endif ?>
    </div>
</body>

</html>