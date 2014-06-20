<?php 
/**
* 
*/
class Social
{
	function getTweets($url){
	    $json = file_get_contents( "http://urls.api.twitter.com/1/urls/count.json?url=".$url );
	    $ajsn = json_decode($json, true);
	    $cont = $ajsn['count'];
	    return $cont;
	}

	function getPins($url){
	    $json = file_get_contents( "http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=".$url );
	    $json = substr( $json, 13, -1);
	    $ajsn = json_decode($json, true);
	    $cont = $ajsn['count'];
	    return $cont;
	}

	function getFacebooks($url) { 
	    $xml = file_get_contents("http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($url));
	    $xml = simplexml_load_string($xml);
	    $shares = $xml->link_stat->share_count;
	    $likes  = $xml->link_stat->like_count;
	    $comments = $xml->link_stat->comment_count; 
	    $arr = array(
	    	'share'=>$shares,
	    	'like'=>$likes,
	    	'comment'=>$comments
	    );
	    return $arr;
	}
	function getPlus1($url) {
	    $html =  file_get_contents( "https://plusone.google.com/_/+1/fastbutton?url=".urlencode($url));
	    // return $html;
	    $doc = new DOMDocument();   
	    @$doc->loadHTML($html);
	    $counter=$doc->getElementById('aggregateCount');
	    return $counter->nodeValue;
	}
}
?>