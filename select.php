<?php
include('config.php');
$ipa_url = $_POST['ipa_url'] ?: $_GET['ipa_url'];
?>

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
            URL to IPA: <input type="text" name="ipa_url"><br>
            <input type="submit">
        </form>

        <?php
        if (!empty($ipa_url)) :
            $ipa_query = http_build_query(array(
                'ipa_url' => $ipa_url
            ));

            $itunes_query = http_build_query(array(
                'action' => "download-manifest",
                'url' => $BASE_URL . "/manifest.plist.php?" . $ipa_query
            ));
            ?>

            <a class="install-link" href="itms-services://?<?php echo $itunes_query; ?>">
                Install Integreat
            </a>
        <?php endif ?>
    </div>
</body>

</html>