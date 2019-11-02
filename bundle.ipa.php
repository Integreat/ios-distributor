<?php

include('config.php');

if (!isset($_GET['ipa_url'])) {
        http_response_code(500);
        echo "You need to supply a GET parameter called ipa_url!";
        return;
}

$ipaUrl = $_GET["ipa_url"];

$components = parse_url($ipaUrl);

if ($components['scheme'] !== 'https' || 
	$components['host'] !== BUNDLE_HOST) {
        http_response_code(500);
        echo "ipa_url is not allowed!";
        return;
}	


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Integreat.ipa");

$auth = base64_encode("$BUNDLE_USER:$BUNDLE_PASSWORD");
$context = stream_context_create([
    "http" => [
        "header" => "Authorization: Basic $auth"
    ]
]);

echo file_get_contents($ipaUrl, false, $context);
