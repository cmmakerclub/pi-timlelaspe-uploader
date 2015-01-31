<?php
    //$access_token = "145634995501895|1203a0954a93ae0b92c023dd.1-896050346|m0UICVnBlm-wDgSrjybkf4sSHgo";
    $access_token = "CAACEdEose0cBALDnl5CvB5Sfv7h329CxVBYtDTagbkSxGIWSbuB8yuFYkV86PtvuyZAkZBkahCtHtNoyataoJz6Xo0x403QJZBD1SlppLqFoC4EBiMwWGRzE96gdSiOKMZAZAhKnY86Gi6gCyKXrIVWBheoCn8mgsPBJVNBdOUXDhZAZCkVUpvjtfOS5u9nzd4FusRBWL9lESjyD5Ata6k1";
    $url = "https://api.facebook.com/method/photos.upload";
    // $album = "https://api.facebook.com/method/photos.createAlbum?name=Test&uid=141043522655926&access_token=${access_token}&format=json";

    $caption = date("d F Y  h:i:s");
    $uid = "324915744349804";
    // $uid = "896050346";
    //$aid = $uid ."_324916604349718";
		//$aid = "324916604349718";
       $params = array (
          'method' => 'photos.upload',
          'aid' => $aid,
          'caption' => $caption,
          'message' => 'HELLO',
          'uid' => $uid,
          'image' => '@' . realpath("/home/pi/myimage_0001.jpg"),
          'format' => 'json',
        );
    print_r($params);
    $params['access_token'] = $access_token;

    // Start the Graph API call
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $result = curl_exec($ch);
    print_r($result);

?>
