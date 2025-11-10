<?php
	function totalDiff(DateTime $master, DateTime $second) {
		$diff = $second->format("U.v") - $master->format("U.v");
		return round($diff, 3);
	}
	
	$file = fopen("ranking.txt", "r") or die("Error!");

	$currentRank = 1;
	while(!feof($file)) {
		$arr = explode("|", substr(fgets($file),3));
		$team = $arr[0];
		if(isset($arr[1])) {
			$date = $arr[1];
		} else {
			$date = null;
		}
		if($currentRank === 1 && $arr[0] != "") {
			$master_date = new DateTime($date);
			echo "#" . $currentRank . ": ". $team . "<br>";
			$currentRank++;
		} else {
			if($arr[0] != "") {
				$second_date = new DateTime($date);
				$echo = totalDiff($master_date, $second_date);
				echo "#" . $currentRank . ": ". $team . "| +".$echo."s <br>";
			}
		}
	}
	fclose($file);	
?>
