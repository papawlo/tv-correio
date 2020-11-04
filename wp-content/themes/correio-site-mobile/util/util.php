<?php   
	/*
		Arquivo que contém funções para ser reutilizadas
	*/

	function getYoutubeThumbnail($video_url, $size){
        $video_url = strstr($video_url, 'https://www.youtube.com/embed/');
        $video_url = substr($video_url, 0, strpos($video_url , '?'));
        $video_url = str_replace('https://www.youtube.com/embed/', '', $video_url);
        $video_url =  'http://img.youtube.com/vi/'.$video_url.'/0.jpg';
        
        if($size == 'medium')
        $video_url =  '<img width="360" height="310" src="'. $video_url .'" class="attachment-thumb-360x229 wp-post-image" alt="tv_correio">';
    	else
    		$video_url =  '<img width="129" height="125" src="'. $video_url .'" class="attachment-thumb-129x132 wp-post-image" alt="tv_correio">';
        return $video_url;
        
	}

?>