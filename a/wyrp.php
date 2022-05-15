<?php
header('Content-type: text/json;charset=utf-8');
$format =$_GET['format'];;
$post = 'params=RWWaVrwvMRFMFc6r%2BrKTq66XIh8o1s%2BP%2BebgYma%2FWimi6K5F3KtWHtpXfC%2Fgh77TtCtc3rmpHuknSe%2BDi%2FNBycqi9m7nISKeQx9Z46RmucLioCQeGmOKJ%2FJJ2FFquMvqj0U2NAoD%2BmN1zc7l39CKLQm4A%2Bz4yt2r9n2EJPc4XZpGorDx7fvTY4ulvRg93keo5r4cpfihdIAara8uU1k3IW6ohE%2BLuguCMstPnzQJgDU%3D&encSecKey=0be524c8f3210f9fe781abc2682012b97d13f843e74b92b42955ab0ddb0964ffdf7c8a01138342307bfc0d2544f8a1131c9dc72c95b8fae31dc603bf5c00d090f730428b9d73eb151d563bf7b816518d1a1c5ad4a37f4fffa1700469151025f2fc282edbb70d6217d3054c2cb90649aa2b645ad38baaccbfb90eb28e720ef56a';
$music = get_music_list($post);
if($format == 'text') {
  $result  =  $music['content'].PHP_EOL;
  $result  .=  '来自@'. $music['nickname'];
  $result  .=  '在「'.$music['name'].'」'.PHP_EOL;
  $result  .=  '歌曲下方的评论'.PHP_EOL;
  $result  .=  $music['copyright'];  
  print_r($result);
}else{
  $result  =  json_encode(array(
    'code'  =>  1,
    'data'  =>  $music
  ),320);
  print_r($result);
}
function get_music_list($post){
  $rel = G163_curl('https://music.163.com/weapi/playlist/detail', $post);
  $arr = json_decode($rel,true)['result']['tracks'];
  $music = $arr[array_rand($arr,1)];
  $rel = G163_curl('https://music.163.com/weapi/v1/resource/comments/R_SO_4_'.$music['id'], $post);
  $arr = json_decode($rel,true)['hotComments'];
  $hotComments = $arr[array_rand($arr,1)];
    $data = array(
      'name'      =>  $music['name']
      ,'url'      =>  'http://music.163.com/song/media/outer/url?id='.$music['id'].'.mp3'
      ,'picurl'    =>  $music['album']['picUrl']
      ,'artistsname'  =>  $music['artists'][0]['name']
    ,'avatarurl'  =>  $hotComments['user']['avatarUrl']
    ,'nickname'    =>  $hotComments['user']['nickname']
    ,'content'    =>  $hotComments['content']
    ,'copyright'    =>  '路羽博客luyuz.cn'
    );
  return $data;
}
function G163_curl($url, $post=0, $referer=0, $cookie=0, $header=0, $ua=0, $nobaody=0){
  $ch = curl_init();
  $ip = rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255) ;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  $httpheader[] = "Accept:application/json";
  $httpheader[] = "Accept-Encoding:gzip, deflate, br";
  $httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
  $httpheader[] = "Accept-Type:application/x-www-form-urlencoded";
  $httpheader[] = "Origin:https://music.163.com";
  $httpheader[] = "Origin:https://music.163.com";
  $httpheader[] = 'X-FORWARDED-FOR:'.$ip;
  $httpheader[] = 'CLIENT-IP:'.$ip;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
  if ($post) {
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  }
  if ($header) {
    curl_setopt($ch, CURLOPT_HEADER, true);
  }
  if ($cookie) {
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
  }
  if($referer){
    if($referer==1){
      curl_setopt($ch, CURLOPT_REFERER, 'https://music.163.com/outchain/player?type=0&id=2250011882&auto=1');
    }else{
      curl_setopt($ch, CURLOPT_REFERER, $referer);
    }
  }
  if ($ua) {
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  }
  else {
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1");
  }
  if ($nobaody) {
    curl_setopt($ch, CURLOPT_NOBODY, 1);
  }
  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  curl_setopt($ch, CURLOPT_ENCODING, "gzip");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_INTERFACE, '172.21.0.'.rand(10,27));
  $ret = curl_exec($ch);
  //$Headers = curl_getinfo($ch);
  curl_close($ch);
  return $ret;
}