<?php
/* github Api */

$userData = null;
$repos = [];
$error = "";

if (isset($_GET['username'])) {
    $username = trim($_GET['username']);

    if ($username != "") {

        // GitHub User API
        $userUrl = "https://api.github.com/users/$username";
        $repoUrl = "https://api.github.com/users/$username/repos";

        // GitHub requires User-Agent header
        $options = [
            "http" => [
                "header" => "User-Agent: PHP-App\r\n"
            ]
        ];
        $context = stream_context_create($options);

        $userResponse = @file_get_contents($userUrl, false, $context);
        $repoResponse = @file_get_contents($repoUrl, false, $context);

        if ($userResponse && $repoResponse) {
            $userData = json_decode($userResponse, true);
            $repos = json_decode($repoResponse, true);
        } else {
            $error = "GitHub user not found!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GitHub User Search</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container {
            width: 700px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        input, button {
            padding: 8px;
            margin-top: 10px;
        }
        button { cursor: pointer; }
        .repo {
            background: #eef;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
        }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <h2>🐙 GitHub User Search</h2>

    <form method="get">
        <input type="text" name="username" placeholder="Enter GitHub username" required>
        <button type="submit">Search</button>
    </form>

    <?php if ($error) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <?php if ($userData) { ?>
        <hr>
        <h3><?php echo $userData['login']; ?></h3>
        <p><b>Public Repositories:</b> <?php echo $userData['public_repos']; ?></p>
        <p><a href="<?php echo $userData['html_url']; ?>" target="_blank">View Profile</a></p>

        <h3>Repositories</h3>

        <?php foreach ($repos as $repo) { ?>
            <div class="repo">
                <b><?php echo $repo['name']; ?></b><br>
                <?php echo $repo['description'] ?? 'No description'; ?><br>
                 Stars: <?php echo $repo['stargazers_count']; ?><br>
                <a href="<?php echo $repo['html_url']; ?>" target="_blank">View Repo</a>
            </div>
        <?php } ?>
    <?php } ?>
</div>

</body>
</html>
