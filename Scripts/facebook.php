<?php
session_start();
require 'src/config.php';
require 'src/facebook.php';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
    'appId'  => $config[''],
    'secret' => $config[''],
    'cookie' => true
));



if(isset($_POST['status']))
{
    $group_id = $_POST['group'];

    $publish = $facebook->api('/'.$group_id.'/feed', 'post',
        array('access_token' => $_SESSION['token'],
            'message'=> 'Testing',
            'from' => $config['App_ID'],
            'to' => $group_id,
            'caption' => 'PHP Gang',
            'name' => 'PHP Gang',
            'link' => 'https://www.phpgang.com/',
            'picture' => 'https://www.phpgang.com/wp-content/themes/PHPGang_v2/img/logo.png',
            'description' => 'Testing with PHPGang.com Demo'
        ));
    $publish = $facebook->api('/'.$group_id.'/feed', 'post',
        array('access_token' => $_SESSION['token'],'message'=>$_POST['status'] .'   via PHPGang.com Demo',
            'from' => $config['App_ID']
        ));
    $message = 'Status updated.<br>';
    $graph_url_groups = "https://graph.facebook.com/v2.1/me/groups?access_token=".$_SESSION['token'];

    $groups = json_decode(file_get_contents_curl($graph_url_groups)); // get all groups information from above url.

    $dropdown = "";
    for($i=0;$i<count($groups->data);$i++)
    {
        $dropdown .= "<option value='".$groups->data[$i]->access_token."-".$groups->data[$i]->id."'>".$groups->data[$i]->name."</option>";
    }

    $content = '
    <style>
    #status
    {
        width: 357px;
        height: 28px;
        font-size: 15px;
    }
    </style>
    '.$message.'
    <form action="index.php" method="post">
    Select Group on which you want to post status: <br><select name="group" id="status">'.$dropdown.'</select><br><br>
    <input type="text" name="status" id="status" placeholder="Write a comment...." />
    <input type="submit" value="Post On My Group!" style="padding: 5px;" />
    <form>';
}
elseif(isset($_GET['fbTrue']))
{
    $token_url = "https://graph.facebook.com/v2.1/oauth/access_token?"
        . "client_id=".$config['App_ID']."&redirect_uri=" . urlencode($config['callback_url'])
        . "&client_secret=".$config['App_Secret']."&code=" . $_GET['code'];

    $response = file_get_contents_curl($token_url);   // get access token from url
    $params = null;
    parse_str($response, $params);

    $graph_url = "https://graph.facebook.com/v2.1/me?access_token="
        . $params['access_token'];
    $_SESSION['token'] = $params['access_token'];
    $user = json_decode(file_get_contents_curl($graph_url)); // Get user information from given url


    $graph_url_groups = "https://graph.facebook.com/v2.1/me/groups?access_token=".$_SESSION['token'];
    $groups = json_decode(file_get_contents_curl($graph_url_groups)); // get all groups information from above url.


    $dropdown = "";
    for($i=0;$i<count($groups->data);$i++)
    {
        $dropdown .= "<option value='".$groups->data[$i]->id."'>".$groups->data[$i]->name."</option>";
    }

    $content = '
    <style>
    #status
    {
        width: 357px;
        height: 28px;
        font-size: 15px;
    }
    </style>
    '.$message.'
    <form action="index.php" method="post">
    Select Group on which you want to post status: <br><select name="group" id=status>'.$dropdown.'</select><br><br>
    <input type="text" name="status" id="status" placeholder="Write a comment...." />
    <input type="submit" value="Post On My Group!" style="padding: 5px;" />
    <form>';
}
else
{
    $content = '<a href="https://www.facebook.com/dialog/oauth?client_id='.$config['App_ID'].'&redirect_uri='.$config['callback_url'].'&scope=email,publish_stream,publish_actions,user_groups"><img src="./images/login-button.png" alt="Sign in with Facebook"/></a>';
}

echo $content;

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
?>