<?php

date_default_timezone_set("Asia/Jakarta");
/*
 Date : 04-11-2021, 17:21 WB
 Author : Kingtebe
 Follow my github https://github.com/Musk-ID
*/
function curl_get($url,$headers){
	$http = curl_init();
	curl_setopt($http, CURLOPT_URL, $url);
	curl_setopt($http, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($http);
	curl_close($http);
	return $result;}

function curl_post($url,$data,$headers){
	$http = curl_init();
	curl_setopt($http, CURLOPT_URL, $url);
	curl_setopt($http, CURLOPT_POSTFIELDS, $data);
	curl_setopt($http, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
	$reward = curl_exec($http);
	curl_close($http);
	return $reward;}

function chat($message){
	$str = str_split($message);
	foreach($str as $repr){
		echo $repr;
		usleep(280);}}

function main(){
	include("cfg.php");
	$c = "\033[1;36m";$p = "\033[1;37m";$h = "\033[1;32m";$k = "\033[1;33m";$b = "\033[1;34m";$m = "\033[1;31m";$q = "\033[1;30m";$z = "\033[101m";$o = "\033[0m";$g = "\033[0;36m";
	$headers = array(
		"user-agent:".$user,
		"cookie:".$cookie,
		"content-type:application/x-www-form-urlencoded",
		"referer:https://btcbunch.com/auto",
	);
	$time = date('H:i:s');$date = date('d/m/Y');
	$find_ip = file_get_contents("https://api.myip.com");
	$json = json_decode($find_ip,true);
	$page = curl_get("https://btcbunch.com/dashboard",$headers);
	if(preg_match('#class\="img-fluid">\s+([^.*?>]+)</#',$page,$username)){
		preg_match('#\sclass\="">([^>]+)</#',$page,$balance);system("clear");
		chat( "\n  Time : {$time}                 Date : {$date}\n {$m}╔{$c}═════════════════════════════════════════════════{$m}╗\n {$c}║ {$m}███████{$c}╗ {$m}█████{$c}╗  {$m}█████{$c}╗ {$m}██{$c}╗  {$m}████████{$c}╗{$m}██{$c}╗   {$m}██{$c}╗ ║\n {$c}║ {$m}██{$c}╔════╝{$m}██{$c}╔══{$m}██{$c}╗{$m}██{$c}╔══{$m}██{$c}╗{$m}██{$c}║  {$c}╚══{$m}██{$c}╔══╝{$m}██{$c}║   {$m}██{$c}║ ║\n {$c}║ {$m}█████{$c}╗  {$m}███████{$c}║{$m}███████{$c}║{$m}██{$c}║     {$m}██{$c}║   {$m}██{$c}║   {$m}██{$c}║ ║\n {$c}║ {$m}██{$c}╔══╝  {$m}██{$c}╔══{$m}██{$c}║{$m}██{$c}╔══{$m}██{$c}║{$m}██{$c}║     {$m}██{$c}║   {$c}╚{$m}██{$c}╗ {$m}██{$c}╔╝ ║\n {$c}║ {$m}██{$c}║     {$m}██{$c}║  {$m}██{$c}║{$m}██{$c}║  {$m}██{$c}║{$m}███████{$c}╗{$m}██{$c}║    {$c}╚{$m}████{$c}╔╝  ║\n {$c}║ ╚═╝     ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝     ╚═══╝   ║\n {$c}║{$k}-------------------------------------------------{$c}║\n {$c}║ {$k}▶ {$p}Author {$k}: {$p}Kingtebe                             {$c}║\n {$c}║ {$k}▶ {$p}Github {$k}: {$p}github.clom/Musk-ID        {$m}[{$p}ONLINE{$m}]  {$c}║\n {$m}╚{$c}═════════════════════════════════════════════════{$m}╝\n {$q}<══════════════[{$k}{$z} • FREE SCRIPT • {$o}{$q}]════════════════>\n  {$c}▶ {$p}Version {$k}: {$p}1.1\n  {$c}▶ {$p}IP Kamu {$k}: {$h}{$json['ip']}\n  {$c}▶ {$p}Youtube {$k}: {$p}FaaL TV\n {$q}<═════════════════════════════════════════════════>\n");
		echo "  {$p}Your account login as {$c}".$username[1]." {$p}balance {$h}".$balance[1]."\n {$q}<═════════════════════════════════════════════════>\n";sleep(1.8);
		while(true){
			$get = curl_get("https://btcbunch.com/auto",$headers);
			preg_match('#value\="+([^>]+).*?"#',$get,$token);
			preg_match('#let\stimer\s=\s+([^a-z]+),#',$get,$timer);
			$time = time()+$timer[1];
			while(true):
				echo "\r									\r";
				$ses = $time-time();
				if($ses < 1){ break; }
					echo "  {$k}▶ {$p}Waiting ⟨{$g}".date('00:i:s',$ses)."{$p}⟩ ";
					sleep(1);
				endwhile;
			$post = curl_post("https://btcbunch.com/auto/verify","token=".$token[1],$headers);
			$site = curl_get("https://btcbunch.com/dashboard",$headers);
			preg_match('#\sclass\="">([^>]+)</#',$site,$balance);
			echo "  {$h}Good job!, 5 tokens has been added to your balance\n";
			echo "            {$p}••••{$m}> {$q}[ {$c}".$balance[1]." {$q}] {$m}<{$p}••••\n";}
	}else{
		exit("\n ~> Cookie has expired!\n\n");}}main();

?>

