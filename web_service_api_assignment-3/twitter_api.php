<?php
// ==========================
// Twitter (X) API Settings
// ==========================

//  https://developer.x.com/en
// website 
$bearerToken = "YOUR_TWITTER_BEARER_TOKEN"; // Add your Bearer Token
$tweets = [];
$error = "";

if (isset($_GET['hashtag'])) {
    $hashtag = trim($_GET['hashtag']);

    if ($hashtag != "") {

        // Twitter API v2 search endpoint
        $url = "https://api.twitter.com/2/tweets/search/recent?query=%23{$hashtag}&max_results=10&tweet.fields=created_at,text";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $bearerToken"
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        if (isset($data['data'])) {
            $tweets = $data['data'];
        } else {
            $error = "No tweets found or API error!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Twitter Hashtag Search</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container {
            width: 600px;
            margin: 40px auto;
            background:#fff;
            padding:20px;
            border-radius:5px;
        }
        input, button {
            padding: 8px;
            margin-top: 10px;
        }
        .tweet {
            background:#eef;
            padding:10px;
            margin-top:10px;
            border-radius:4px;
        }
        .error { color:red; text-align:center; }
    </style>
</head>
<body>

<div class="container">
    <h2>🐦 Twitter Hashtag Search</h2>

    <form method="get">
        <input type="text" name="hashtag" placeholder="Enter hashtag (without #)" required>
        <button type="submit">Search Tweets</button>
    </form>

    <?php if ($error) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <?php if ($tweets) { ?>
        <h3>Recent Tweets for #<?php echo htmlspecialchars($hashtag); ?></h3>

        <?php foreach ($tweets as $tweet) { ?>
            <div class="tweet">
                <?php echo htmlspecialchars($tweet['text']); ?><br>
                <small><?php echo $tweet['created_at']; ?></small>
            </div>
        <?php } ?>
    <?php } ?>
</div>

</body>
</html>
