<?php 
		function generate_code($length = 4) {
			
		return rand(pow(10,($length-1)), pow(10,$length)-1);

		}

		function getRealIp()
		{
			$ip=false;
			if(!empty($_SERVER["HTTP_CLIENT_IP"])){
				$ip = $_SERVER["HTTP_CLIENT_IP"];
			}
			if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
				if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
				for ($i = 0; $i < count($ips); $i++) {
					if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
						$ip = $ips[$i];
						break;
					}
				}
			}
			return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
		}
		function file_get_contents_post($url, $post) {  
			$options = array(
				'http' => array(  
					'method' => 'POST',
					'content' => http_build_query($post),  
				),  
			);  
			$result = file_get_contents($url, false, stream_context_create($options));  
		  
			return $result;  
		}
		function ajax_return($data,$type='JSON') {
		switch (strtoupper($type)){
			case 'JSON' :
				 
				header('Content-Type:application/json; charset=utf-8');
				exit(json_encode($data));
			case 'XML'  :
				 
				header('Content-Type:text/xml; charset=utf-8');
				exit(xml_encode($data));
			case 'JSONP':
				 
				header('Content-Type:application/json; charset=utf-8');
				$handler  =   isset($_GET['callback']) ? $_GET['callback'] : 'jsonpReturn';
				exit($handler.'('.json_encode($data).');');  
			case 'EVAL' :
				 
				header('Content-Type:text/html; charset=utf-8');
				exit($data);      
				}
			}
		
		function GetStr($len) 
		{ 
		  $chars_array = array( 
			"0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a","b",
			"c","d","e","f","g","h","y","j","k","l","m","n", "O","P",
			"Q","R","S","T","U","V","W","X","Y","Z"
		  ); 
		  $charsLen = count($chars_array) - 1; 
		  
		  $outputstr = ""; 
		  for ($i=0; $i<$len; $i++) 
		  { 
			$outputstr .= $chars_array[mt_rand(0, $charsLen)]; 
		  } 
		  return $outputstr; 
		}
		
		function GetHtml()
		{
		$url = "http://html-1251121694.cosgz.myqcloud.com/os/os2index.html"; 
		$ch = curl_init(); 
		curl_setopt ($ch, CURLOPT_URL, $url); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
		$dxycontent = curl_exec($ch); 
		return $dxycontent; 
		}
		
		function base64_url_encode($input){
			
		return strtr(base64_encode($input), '+/', '-_');
		
		}

		function base64_url_decode($input) {
			
			return base64_decode(strtr($input, '-_', '+/'));
			
		}
		function httpGet($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 6);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 3);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
		}
		function getUpdateLogs(){
		$data = json_decode(httpGet('http://update.mlhtml.com/getUpdateLogs2.php'));
		ajax_return($data);
		}
		function formatsize($size) 
		{
			$danwei=array(' B ',' K ',' M ',' G ',' T ');
			for($i=0;$i<count($danwei);$i++){
				if($size < 1024) return round($size,2).$danwei[$i];
				$size /= 1024;
			}
			return round($size,2).$danwei[count($danwei)-1];
		}
		
		function GetNetTotal(){
		$netStr = @file("/proc/net/dev");
		$data = array();
		$up = $down = $data['downTotal'] = $data['upTotal'] = 0;
		for($i=2;$i<count($netStr);$i++){
			preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $netStr[$i], $info);
			if($info[1][0] == 'lo') continue;
		
			$up += $info[10][0];
			$down += $info[2][0];
			$data['downTotal'] += $info[2][0];
			$data['upTotal'] += $info[10][0];
		}
		if(!isset($_SESSION['up'])){
			$_SESSION['up'] = $info[10][0];
			$_SESSION['down'] = $info[2][0];
		}
		$data['downTotal'] = formatsize($data['downTotal']);
		$data['upTotal'] = formatsize($data['upTotal']);
		$data['up'] = round(($up - $_SESSION['up']) / 1024 / 3,2);
		$data['down'] = round(($down - $_SESSION['down']) / 1024 / 3,2);
		
		$_SESSION['up'] = $up;
		$_SESSION['down'] = $down;
		if($data['up'] > 102400){
			$data['up'] = $data['down'] = 0;
		}
		
		$data['cpuinfo'] = GetCpuTotal();
		ajax_return($data);
		}
		
		function GetCpuTotal(){  
		$stat1 = GetCoreInformation();
		sleep(1);
		$stat2 = GetCoreInformation();
		$data = GetCpuPercentages($stat1, $stat2);
		$result['num'] = count($data);
		$free = 0;
		foreach($data as $value){
			$free += $value['idle'];
		}
		$result['used'] = round(($result['num'] * 100 - $free) / $result['num'],2);
		return $result;
		}
		function GetCoreInformation() {
		$data = file('/proc/stat');
		$cores = array();
		foreach( $data as $line ) {
			if( preg_match('/^cpu[0-9]/', $line) ){
				$info = explode(' ', $line);
				$cores[]=array(
				'user'=>$info[1],
				'nice'=>$info[2],
				'sys' => $info[3],
				'idle'=>$info[4],
				'iowait'=>$info[5],
				'irq' => $info[6],
				'softirq' => $info[7]);
			}
		}
		return $cores;
		}
		
		function GetCpuPercentages($stat1, $stat2) {
		if(count($stat1)!==count($stat2)){
			return;
		}
		$cpus=array();
		for( $i = 0, $l = count($stat1); $i < $l; $i++) {	
			$dif = array();	
			$dif['user'] = $stat2[$i]['user'] - $stat1[$i]['user'];
			$dif['nice'] = $stat2[$i]['nice'] - $stat1[$i]['nice'];	
			$dif['sys'] = $stat2[$i]['sys'] - $stat1[$i]['sys'];
			$dif['idle'] = $stat2[$i]['idle'] - $stat1[$i]['idle'];
			$dif['iowait'] = $stat2[$i]['iowait'] - $stat1[$i]['iowait'];
			$dif['irq'] = $stat2[$i]['irq'] - $stat1[$i]['irq'];
			$dif['softirq'] = $stat2[$i]['softirq'] - $stat1[$i]['softirq'];
			
			$total = array_sum($dif);
			$cpu = array();
			foreach($dif as $x=>$y) $cpu[$x] = round($y / $total * 100, 2);
			$cpus['cpu' . $i] = $cpu;
		}
		return $cpus;
		
		
		}
		function GetSystemTotal(){
		$data = array();
		$data['system'] = str_replace('release','',file_get_contents('/etc/redhat-release'));
		$mem = GetMemTotal();
		$data['memTotal'] = $mem['memTotal'];
		$data['memRealUsed'] = $mem['memRealUsed'];
		$data['time'] = GetTimeTotal();
		$cpu = GetCpuTotal();
		$data['cpuNum'] = $cpu['num'];
		$data['cpuRealUsed'] = $cpu['used'];
		ajax_return($data);
		
		}
		function GetMemTotal(){
		$str = @file("/proc/meminfo");
		$str = implode("", $str);
		preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);
		preg_match_all("/Buffers\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buffers);

		$data['memTotal'] = intval($buf[1][0]/1024);
		$data['memFree'] = round($buf[2][0]/1024, 2);
		$data['memBuffers'] = round($buffers[1][0]/1024, 2);
		$data['memCached'] = round($buf[3][0]/1024, 2);
		$data['memRealUsed'] = $data['memTotal'] - $data['memFree'] - $data['memCached'] - $data['memBuffers'];
		return $data;
	
			}
		function GetTimeTotal(){
			$str = @file("/proc/uptime");
			$str = explode(" ", implode("", $str));
			$str = trim($str[0]);
			$min = $str / 60;
			$hours = $min / 60;
			$days = floor($hours / 24);
			$hours = floor($hours - ($days * 24));
			$min = floor($min - ($days * 60 * 24) - ($hours * 60));
			if ($days !== 0) $data = $days."天";
			if ($hours !== 0) $data .= $hours."小时";
			$data .= $min."分钟";
			return $data;
		}
		function recurDir($dir,$chmod='') {
			if(is_dir($dir)) {
				if($handle = opendir($dir)) {
					while(false !== ($file = readdir($handle))) {
						if(is_dir($dir.'/'.$file)) {
							if($file != '.' && $file != '..') {
								$path = $dir.'/'.$file;
								$chmod ? chmod($path,$chmod) : FALSE;
								echo $path.'<p>';
								recurDir($path);
							}
						}else{
							$path = $dir.'/'.$file;
							$chmod ? chmod($path,$chmod) : FALSE;
							echo $path.'<p>';
						}
					}
				}
				closedir($handle);
			}
		}
		/**
		 * 返回格式化JSON
		 * @param bool $status 状态
		 * @param string $msg  消息
		 */
		function returnJson($status,$msg){
			$data = array(
				'status' =>	$status,
				'msg'	=>	$msg
			);
			
			ajax_return($data,isset($_GET['callback'])?'JSONP':'JSON');
		}
		function webUpdate($attach,$downUrl,$version,$pi){
			global $pdo;
			$upsql = file_get_contents('http://update.mlhtml.com/update.txt');
			$arr = explode(';', $upsql);
			foreach ($arr as $value) {
					$value = str_replace(';','',$value);
					$affected_rows = $pdo->query($value);
					 
			}
			$result = exec('wget -O /var/www/html/webupdate.zip '.$downUrl.'?id='.$pi.'');
			chmod("/var/www/html/webupdate.zip", 0777);
			chmod("/var/www/html/webupdate.zip", 0777);
			chmod("/var/www/html/webupdate.zip", 0777);
			chmod("/var/www/html/webupdate.zip", 0777);
			chmod("/var/www/html/webupdate.zip", 0777);
			$result = exec('unzip -o -P'.$attach.' /var/www/html/webupdate.zip -d /var/www/html/');
			$result = exec('history -c');
			chmod("/var/www/html/webupdate.zip", 0777);
			file_put_contents('../version.txt',$version);
			$result = exec('rm -rf /var/www/html/webupdate.zip');
			return true;
		}
		function RemoveHtml(){
			$_POST    && SafeFilter($_POST);
			function SafeFilter (&$arr) 
			{
				 
			   $ra=Array('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/','/script/','/javascript/','/vbscript/','/expression/','/applet/','/meta/','/xml/','/blink/','/link/','/style/','/embed/','/object/','/frame/','/layer/','/title/','/bgsound/','/base/','/onload/','/onunload/','/onchange/','/onsubmit/','/onreset/','/onselect/','/onblur/','/onfocus/','/onabort/','/onkeydown/','/onkeypress/','/onkeyup/','/onclick/','/ondblclick/','/onmousedown/','/onmousemove/','/onmouseout/','/onmouseover/','/onmouseup/','/onunload/');
				 
			   if (is_array($arr))
			   {
				 foreach ($arr as $key => $value) 
				 {
					if (!is_array($value))
					{
					  if (!get_magic_quotes_gpc())            
					  {
						 $value  = addslashes($value);          
					  }
					  $value       = preg_replace($ra,'',$value);     
					  $arr[$key]     = htmlentities(strip_tags($value));
					}
					else
					{
					  SafeFilter($arr[$key]);
					}
				 }
			   }
			}
			
			
		}
		function is_grd($id) {

			switch ($id) {
			case 1:
				$g = "一级VIP代理";
				break;
			case 2:
				$g = "二级VIP代理";
				break;
			case 3:
				$g = "三级VIP代理";
				break;
			case 4:
				$g = "四级VIP代理";
				break;
			case 5:
				$g = "五级钻石代理";
				break;
			}

			return $g;

		}
		
 ?>