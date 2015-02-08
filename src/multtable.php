<?php 

function getVariable($name) {
	if (isset($_GET[$name])) {
		return $_GET[$name];
	}

	return false;
}

function checkMissing($minMaxArray) {
	$missing = false;

	foreach ($minMaxArray as $minMaxKey => $minMaxValue) {
		if (empty($minMaxValue)) {
			$missing = true;
			echo "Missing parameter " . $minMaxKey . "<br/>";
		}
	}

	return $missing;
}


function checkMinGreaterThanMax($minMaxArray, $min, $max) {
	$isValid = true; 

	switch ($min) {
		case "min-multiplier":
			$multiString = "multiplier";
			break;
		case "min-multiplicand";
			$multiString = "multiplicand";
			break;
	}

	if ($minMaxArray[$min] > $minMaxArray[$max]) {
		$isValid = false;
		echo "Minimum " . $multiString . " larger than maximum" . "<br/>"; 
	}

	return $isValid; 

}

$minMaxArray = array(
	'min-multiplicand' => getVariable('min-multiplicand'),
	'max-multiplicand' => getVariable('max-multiplicand'),
	'min-multiplier'   => getVariable('min-multiplier'),
	'max-multiplier'   => getVariable('max-multiplier')
);

$isMissing = checkMissing($minMaxArray);

if ($isMissing) {
	exit;
}


$isMultiplicandValid = checkMinGreaterThanMax($minMaxArray, 'min-multiplicand', 'max-multiplicand');
$isMultiplierValid = checkMinGreaterThanMax($minMaxArray, 'min-multiplier', 'max-multiplier');

if (!$isMultiplicandValid || !$isMultiplierValid) {
	exit; 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Multiplication Table</title>
</head>
<body>
	<table>
		<?php 

			$minMultiplier = $minMaxArray["min-multiplier"];
			$maxMultiplier = $minMaxArray["max-multiplier"];
			$minMultiplicand = $minMaxArray["min-multiplicand"];
			$maxMultiplicand = $minMaxArray["max-multiplicand"];

			// $i = rows     (multiplicands)
			// $j = columns  (multipliers)

			$numberOfRows = $maxMultiplicand - $minMultiplicand + 2;
			$numberOfCols = $maxMultiplier - $minMultiplier + 2;

			for ($i = 0; $i < $numberOfRows; $i++) {
			?>
			<tr>
			<?php
				for ($j = 0; $j < $numberOfCols; $j++) {
					if ($i == 0 && $j == 0) {
						$data = "";
					} else {
						$multiplier = $minMultiplier + $j - 1;
						$multiplicand = $minMultiplicand + $i - 1;

						if ($i == 0) {
							// row = 0
							$data = $multiplier;
						} else if ($j == 0) {
							// col = 0
							$data = $multiplicand;
						} else {
							$data = $multiplier * $multiplicand;
						}
					}
			?>
				<td><?php echo $data; ?></td>
			<?php
				}
			?>
			</tr>
			<?php
			}
		 ?>
	</table>
</body>
</html>	




































