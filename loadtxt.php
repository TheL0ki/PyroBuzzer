<?php
	function totalDiff(DateTime $master, DateTime $second) {
		$diff = $second->format("U.v") - $master->format("U.v");
		return round($diff, 3);
	}
	
	$file = fopen("ranking.txt", "r") or die("Error!");

	while(!feof($file)) {
		$line = json_decode(fgets($file), true);
		if($line) {
			$team = $line['team'];
			$date = $line['date'];
			$rank = $line['rank'];
			if($rank === 1 && $team != "") {
				$master_date = new DateTime($date);
				echo '
				<div class="grid grid-cols-3">
					<div class="text-start">#' . $rank . '</div>
					<div class="text-center">Team ' . $team . '</div>
					<div class="text-end"></div>
				</div>
				';
			} else {
				if($team != "") {
					$second_date = new DateTime($date);
					$echo = totalDiff($master_date, $second_date);
					echo '
					<div class="grid grid-cols-3"">
						<div class="text-start">#' . $rank . '</div>
						<div class="text-center">Team ' . $team . '</div>
						<div class="text-end">+'.$echo.'s</div>
					</div>
					';
				}
			}
		}
	}
	fclose($file);	
?>
