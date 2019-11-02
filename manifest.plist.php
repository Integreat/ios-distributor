<?php

if(!isset($_GET['ipa_url'])) {
	http_response_code(500);
	echo "You need to supply a GET parameter called ipa_url!";
	return;
}

$ipaUrl = $_GET["ipa_url"];

$proxiedIpaUrl = "https://download.integreat-app.de/ios/Integreat.ipa" . "?" . http_build_query(array('ipa_url' => $ipaUrl));

header("Content-type: application/xml");

echo '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>items</key>
	<array>
	<dict>
		<key>assets</key>
		<array>
			<dict>
				<key>kind</key>
				<string>software-package</string>
				<key>url</key>
				<string>' . $proxiedIpaUrl . '</string>
			</dict>
			<dict>
				<key>kind</key>
				<string>display-image</string>
				<key>url</key>
				<string>https://integreat-app.de/wp-content/uploads/2016/03/integreat-app-logo.png</string>
			</dict>
			<dict>
				<key>kind</key>
				<string>full-size-image</string>
				<key>url</key>
				<string>https://integreat-app.de/wp-content/uploads/2016/03/integreat-app-logo.png</string>
			</dict>
		</array>
		<key>metadata</key>
		<dict>
			<key>bundle-identifier</key>
			<string>de.integreat-app</string>
			<key>bundle-version</key>
			<string>3.0-rc1</string>
			<key>kind</key>
			<string>software</string>
			<key>title</key>
			<string>Integreat</string>
		</dict>
	</dict>
	</array>
</dict>
</plist>';

?>