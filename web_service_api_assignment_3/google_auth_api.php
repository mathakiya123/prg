<?php
/* google auth api*/


//https://console.cloud.google.com/welcome/new
//website



session_start();

// Google OAuth credentials
$client_id = "YOUR_GOOGLE_CLIENT_ID";
$client_secret = "YOUR_GOOGLE_CLIENT_SECRET";
$redirect_uri = "http://localhost/social_login/index.php";

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Step 2: Handle Google callback
if (isset($_GET['code'])) {

    // Exchange code for access token
    $token_url = "https://oauth2.googleapis.com/token";

    $postData = [
        'code' => $_GET['code'],
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    ];

    $ch = curl_init($token_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    $tokenResponse = curl_exec($ch);
    curl_close($ch);

    $tokenData = json_decode($tokenResponse, true);

    if (isset($tokenData['access_token'])) {

        // Get user info
        $userInfo = file_get_contents(
            "https://www.googleapis.com/oauth2/v2/userinfo?access_token=" . $tokenData['access_token']
        );

        $_SESSION['user'] = json_decode($userInfo, true);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Social Login</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .box {
            width: 400px;
            margin: 50px auto;
            background:#fff;
            padding:20px;
            text-align:center;
            border-radius:5px;
        }
        a { text-decoration:none; }
        img { border-radius:50%; }
    </style>
</head>
<body>

<div class="box">

<?php if (!isset($_SESSION['user'])) { ?>

    <h2>Login with Google</h2>

    <?php
    $auth_url = "https://accounts.google.com/o/oauth2/auth?" . http_build_query([
        'client_id' => $client_id,
        'redirect_uri' => $redirect_uri,
        'response_type' => 'code',
        'scope' => 'email profile'
    ]);
    ?>

    <a href="<?php echo $auth_url; ?>">
        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
    </a>

<?php } else { ?>

    <h2>Welcome</h2>
    <img src="<?php echo $_SESSION['user']['picture']; ?>" width="80"><br><br>
    <b><?php echo $_SESSION['user']['name']; ?></b><br>
    <?php echo $_SESSION['user']['email']; ?><br><br>

    <a href="?logout=true">Logout</a>

<?php } ?>

</div>

</body>
</html>
