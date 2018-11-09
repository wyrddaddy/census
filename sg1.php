<?PHP

//Scientific Games Question 1

//generate data set of 500 people 
//generate random number from 1-100
//set birth year between 1900 and 2000

$people = [];
$startYear = 1900;
$endYear = 2000;
for($i=0;$i<=500;$i++)
{
	$age = rand(1,100);
	$coinflip = rand(1,10);
	if ($coinflip %2 == 0)
	{
		$birthYear = $startYear + $age;
		$deathYear = $birthYear + $age;
	}else{
		$deathYear = $endYear - $age;
		$birthYear = $deathYear - $age;
	}
	if($birthYear < $startYear || $deathYear > $endYear )
	{	
		next;
	}else{
		$people[$i]['age'] = $age;
		$people[$i]['birthYear'] = $birthYear;
		$people[$i]['deathYear'] = $deathYear;
	}
}

$year = $startYear;
$census = [];
while($year <= $endYear)
{
	$alive = 0;
	
	foreach($people as $p){
		if ($year >= $p['birthYear'] && $year <= $p['deathYear']){
			$alive++;
			
		}
		
	}
    $census[$year] = $alive;
	$year++;
	$max = array_keys($census, max($census));
	$min = array_keys($census, min($census));
	
}
echo "Between 1900 and 2000:<br>";
echo "The year " . $max[0]  . " had the highest population of " . max($census) ."<br>";
echo "The year " . $min[0] . " had the lowest population of " . min($census);
