<?php

header('content-type:application/json;charset=utf8');
/*
* File：快手手机壁纸无水印下载保存
* Author：By孤独的疯子
* url：www.chahash.com
*/
 
//echo GET_CURL('https://v.kuaishou.com/iBwKB0');
echo CheckUrl($_GET['url']);
 
//检测域名格式  
function CheckUrl($C_url){  
    $str="/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/";  
    if (!preg_match($str,$C_url)){  
        echo "域名格式不正确";  
    }else{  
        echo GET_CURL($C_url);
    }  
}  
 
function GET_CURL($url){
        $ch = curl_init();//CURL初始化
    curl_setopt($ch, CURLOPT_URL, $url);//URL地址
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//忽略SSL证书
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);//忽略SSL证书
    $UA=array('User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $UA);//UA记录
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//跳转
    $output = curl_exec($ch);//抓取URL并把它传递给浏览器
    curl_close($ch);// 关闭cURL资源，并且释放系统资源
    return GET_IMG($output);// 返回CURL资源
}
 
function GET_IMG($data){
       
       
       
        $pattern2 = '/window.pageData=(.*?)<\/SPAN>\"}}<\/script>/';//正则规则
        preg_match($pattern2,$data,$match);//正则
		//$str = implode($match[1]);//数组转字符串
		preg_match('/\":false,\"video\":(.*?)reshold/',$data,$aa);//正则
		$str1 = implode($aa);//数组转字符串
		preg_match('/\"rawPhoto\"(.*?),"avatarUrls"/',$str1,$bb);//正则
		$str1 = implode($bb);//数组转字符串
		preg_match('/\"audioUrls\":(.*?)\"},{\"cdn\"/',$str1,$cc);//正则
		$str1 = implode($cc);//数组转字符串
		preg_match('/\"url\":\"(.*?)\"},/',$str1,$music);//正则
		$str2 = implode($music);//数组转字符串
		//echo $str1;

		preg_match('/\"share\":{\"title\":\"(.*?)\",\"desc/', $data, $video_title);
		preg_match('/poster=\"(.*?)\"/', $data, $video_cover);
		preg_match('/new-tag-content\">(.*?)<\/div>/', $data, $video_artist);
		//preg_match('/audio\" src=\"(.*?)\" loop preload><\/audio>/', $data, $video_music);
				//$music = str_replace('//', 'http://', $video_music);//转义斜杠
		preg_match('/\"sex\":\"F\",\"kwaiId\":\"(.*?)\"},\"share/', $data, $video_kwaiId);		
		preg_match('/data-scheme-url=\"kwai:\/\/profile\/(.*?)\" data/', $data, $video_Id);		
		$Id =  $video_kwaiId;
				
		preg_match('/\" role=\"ev\">@(.*?)   <\/div>/', $data, $video_author);
		preg_match('/,\"shareCover\":\"(.*?)\",\"caption/', $data, $video_shareCover);
		preg_match('/\"video\/mp4\" src=\"(.*?)\" alt=\"/', $data, $video_mp4);
		
        if($video_title != NULL){


				
			if(empty($Id)){//TRUE
				$Id = $video_Id;
			}else{//FALSE
				$Id = $video_kwaiId;
			}
			//echo $data;
            $pattern = '/<img class="play-long-image" src="(.*?)">/i';//正则规则
            preg_match_all($pattern,$data,$match);//正则
            $str = str_replace('//', 'http://', $match[1]);//转义斜杠
			//$imgStr = implode("\n", $match[1]);//数组转字符串
			$return = [			
				'code' => 200,
				'msg'  => '解析成功',
				'data' => [
					//'author' => $video_author[1],
					//'avatar' => $video_avatar[1],
					//'time'   => $video_time[1],
					'author' => $video_author[1],
					'kwaiId' => $Id[1],
					"title"  => $video_title[1],
					"cover"  => $video_cover[1],
					"shareCover" => $video_shareCover[1],
					"music" => $music[1],
					"artist" => $video_artist[1],
					"url" =>  $video_mp4[1],
					"imgUrl" => $str,
						
					
				]
			];	
			$Json = str_replace('\\/', '/', json_encode($return,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
            return $Json;
    }else{  
			$arr = array(
				'code' => 201,
				'msg' => '解析失败',
			);
			echo json_encode($arr, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            return $arr;
    }
}
 
function GET_PNG($data){
        $pattern = '/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i';//正则规则
        preg_match_all($pattern,$data,$img);//正则
		
        //download($img[1]);
		//echo $img[0];
        //return json_encode($img[1]);
}
 
//数组转换下载地址
function download($url){
        foreach ($url as $k => $v){
                $return_content = downloadImage($v);
                //写入数据库sql
        }
         
}
//下载图片
function downloadImage($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $UA=array('User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $UA);//UA记录
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//忽略SSL证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);//忽略SSL证书
    $file = curl_exec($ch);
    curl_close($ch);
    saveAsImage($url, $file);
}



function result($errno = 0, $data = '') {
    
    header("Content-type: application/json;charset=utf-8");
    $errno = intval($errno);
    $result = array('code' => $errno, 'message' => $data);
    return json_encode($result, 320);
}