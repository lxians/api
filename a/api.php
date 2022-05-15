<?php

header('content-type:application/json;charset=utf8');

class Dahai {
	
   static public function qsy($url) {
    
        preg_match('/([\w-]+\.)+\w+(\:\d{2,6})?/', $url, $domain);
        switch ($domain[0]) {
            case '':
                return self::result(500, '请传入解析url参数！');
            break;
            case 'v.douyin.com':
                return self::douyin($url);
            break;
            case 'v.kuaishou.com':
                return self::kuaishou($url);
            break;
             case 'v.ixigua.com':
                return self::xigua($url);
            break;
            default:
                return self::result(500, '不支持您输入的链接！');
        }
    }
  
  
  
    static public function douyin($url) {
    
        $url = self::httpRequest($url, 'GET');
        preg_match('/video\/(.*)\?/', $url['location'], $matches);
        $item_ids = $matches[1];
        $vidoUrl = 'https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids=' . $item_ids;
        $result = self::httpRequest($vidoUrl, 'GET');
        $vid = $result['response']['item_list'][0]['video']['vid'];
		
        if (isset($vid)) {
            $video_url = 'https://aweme.snssdk.com/aweme/v1/play/?video_id=' . $vid . '&ratio=720p&line=0';
            
		
		//echo $video_url;
			
            $return = [			
                'code' => 200,
                'msg'  => '解析成功',
                'data' => [
                    'title' => $result['response']['item_list'][0]['share_info']['share_title'],
                    'author' => $result['response']['item_list'][0]['author']['nickname'],
                    'url' => $video_url, 
                    //'url' => $url,
                    'like'   => $result['response']['item_list'][0]['statistics']['digg_count'],
                    'cover'  => $result['response']['item_list'][0]['video']['origin_cover']['url_list'][0],
                    //'test' => $vid,
                    'music'  => [
                        'author' => $result['response']['item_list'][0]['music']['author'],
                        'avatar' => $result['response']['item_list'][0]['music']['cover_large']['url_list'][0],
                        'url'    => $result['response']['item_list'][0]['music']['play_url']['url_list'][0],
					]			
				]
			
			];
			
			$Json = str_replace("\\/", "/", json_encode($return,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
			
			
			return $Json;
        } else {
            return self::result(500, '解析出错！');
        }
    }
  
    static public function kuaishou($url)
    {
        $loc = get_headers($url, true)["Location"][0];
        $text = self::curl($loc);
        preg_match('/{\"title\":\"(.*?)\",\"desc/', $text, $video_title);
        preg_match('/poster=\"(.*?)\"/', $text, $video_cover);
        preg_match('/srcNoMark\":\"(.*?)\"/', $text, $video_url);
        preg_match('/<div class=\"auth-name\">(.*?)<\/div>/', $text, $video_author);
        preg_match('/<div class=\"auth-avatar\" style=\"background-image:url\((.*?)\)/', $text, $video_avatar);
        preg_match('/timestamp\":(.*?),\"/', $text, $video_time);
        if ($video_url[1]) {
            $arr = [
                'code' => 200,
                'msg'  => '解析成功',
                'data' => [
                    'author' => $video_author[1],
                    'avatar' => $video_avatar[1],
                    'time'   => $video_time[1],
                    "title"  => $video_title[1],
                    "cover"  => $video_cover[1],
                    "url"    => $video_url[1],
                ]
            ];
			
			$Json = json_encode($arr, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			
            return $Json;
        }
    }
	
	
  static public function xigua($url) {
          $vurl = self::httpRequest($url, 'GET');
          preg_match('/video\/(.*)\//', $loc, $id);
          $url = 'https://www.ixigua.com/' . $id[1];
            $headers = [
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36 ",
            "cookie:你的cookie"
        ];
        $text = $this->curl($url, $headers);
        preg_match('/<script id=\"SSR_HYDRATED_DATA\">window._SSR_HYDRATED_DATA=(.*?)<\/script>/', $text, $jsondata);
        $data = json_decode(str_replace('undefined', 'null', $jsondata[1]), 1);
        $result = $data["anyVideo"]["gidInformation"]["packerData"]["video"];
        $video = $result["videoResource"]["dash"]["dynamic_video"]["dynamic_video_list"][2]["main_url"];
        preg_match('/(.*?)=&vr=/', base64_decode($video), $video_url);
        $music = $result["videoResource"]["dash"]["dynamic_video"]["dynamic_audio_list"][0]["main_url"];
        preg_match('/(.*?)=&vr=/', base64_decode($music), $music_url);
        $video_author = $result['user_info']['name'];
        $video_avatar = str_replace('300x300.image', '300x300.jpg', $result['user_info']['avatar_url']);
        $video_cover = $result ["poster_url"];
        $video_title = $result["title"];
        if ($url) {
            $arr = [
                'code' => 200,
                'msg'  => '解析成功',
                'data' => [
                    'author' => $video_author,
                    'avatar' => $video_avatar,
                    'like'   => $result['video_like_count'],
                    'time'   => $result['video_publish_time'],
                    'title'  => $video_title,
                    'cover'  => $video_cover,
                    'url'    => $video_url[0],
                    'music'  => [
                        'url' => $music_url[0]
                    ]
                ]
            ];
            return $arr;
        }
    }
  
    static public function httpRequest($url, $method = 'POST', $postfields = null, $headers = array()) {
    
        $method = strtoupper($method);
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ci, CURLOPT_TIMEOUT, 30);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
        switch ($method) {
            case "POST":
                curl_setopt($ci, CURLOPT_POST, true);
                if (!empty($postfields)) {
                    $tmpdatastr = is_array($postfields) ? http_build_query($postfields) : $postfields;
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $tmpdatastr);
                }
            break;
            default:
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method);
            break;
        }
        $ssl = preg_match('/^https:\/\//i', $url) ? TRUE : FALSE;
        curl_setopt($ci, CURLOPT_URL, $url);
        if ($ssl) {
            curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ci, CURLOPT_MAXREDIRS, 2);
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLINFO_HEADER_OUT, true);
        $response = json_decode(curl_exec($ci), true);
        $requestinfo = curl_getinfo($ci);
        $http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        $location = curl_getinfo($ci, CURLINFO_EFFECTIVE_URL);
        curl_close($ci);
        return array('location' => $location, 'response' => $response, 'requestinfo' => $requestinfo);
    }
  
    static public function result($errno = 0, $data = '') {
    
        header("Content-type: application/json;charset=utf-8");
        $errno = intval($errno);
        $result = array('code' => $errno, 'message' => $data);
        return json_encode($result, 320);
    }
    static public function curl($url, $headers = []) {
    $header = ['User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'];
        $con = curl_init((string)$url);
        curl_setopt($con, CURLOPT_HEADER, false);
        curl_setopt($con, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
        if (!empty($headers)) {
            curl_setopt($con, CURLOPT_HTTPHEADER, $headers);
        } else {
            curl_setopt($con, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($con, CURLOPT_TIMEOUT, 5000);
        $result = curl_exec($con);
        return $result;
       
    }
	
	

	static public function url_Get($url2){
		
	$header = get_headers($url2,1);
		if (strpos($header[0],'301') || strpos($header[0],'302')) {
			if(is_array($header['Location'])) {
				$info = $header['Location'][count($header['Location'])-1];
			}else{
				$info = $header['Location'];
			}
		}		
		echo $info;
		return $info;		
	}
}