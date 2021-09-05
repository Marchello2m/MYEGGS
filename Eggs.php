<?php
function createRandomEgg(string $name,int $power,int $qty):stdClass
{
    $egg=new stdClass();
    $egg->name=$name;
    $egg->power=$power;
    $egg->qty=$qty;
    return $egg;
}
$playerEggs=[
    createRandomEgg('PlayerEgg1',50,2),
    createRandomEgg('PlayerEgg2',70,3),
    createRandomEgg('PlayerEgg3',60,1),
     createRandomEgg('PlayerEgg4',30,1),
    createRandomEgg('PlayerEgg4',10,1)
];

$pcEggs=[];
echo "Easter battle 2022:".PHP_EOL;
echo"Get ready to get eliminated!!".PHP_EOL;
$input=readline("Battle?: ".PHP_EOL);
echo"-----------------------".PHP_EOL;

for($i=0;$i<3;$i++)
{
    $power=rand(20,70);
    $qty=rand(1,3);
    $pcEggs[]=createRandomEgg('PCEgg'.$i,$power,$qty);
    echo " ";
}
foreach ($playerEggs as $egg){
    echo "Player egg name - {$egg->name} Quantity ({$egg->qty})And POWER:{$egg->power})" .PHP_EOL;
}

echo PHP_EOL;

while(true){
    if ($input === 'yes') {
        if (count($playerEggs) <= 0 || count($pcEggs) <= 0) break;

        $playerEgg = $playerEggs[array_rand($playerEggs)];
        $pcEgg = $pcEggs [array_rand($pcEggs)];

        $totalThickets = $playerEgg->power + $pcEgg->power;

        $randomNumber = rand(1, $totalThickets);

      //  echo "{$playerEgg->name} Power:{$playerEgg->power} ".PHP_EOL;
       // echo "fights against {$pcEgg->name} Power:{$pcEgg->power}".PHP_EOL;
    //    echo "Random was: {$randomNumber}".PHP_EOL;
      //  echo PHP_EOL;
        $battle=5;
//----------------
        $pcWon=0;
        $playerWins=0;

        $winning=1;
//-------------------
        $pcAllEggs=5;
        $addEgg=1;
        $playersEggs=5;
        for($r = 0; $r < $battle; $r++) {

            if ($pcEggs >= $playerEggs) {

                echo "PC EGG won " . PHP_EOL;
                echo "-----------------------" . PHP_EOL;
                echo "{$playerEgg->name} Power:{$playerEgg->power} " . PHP_EOL;
                echo "fights against {$pcEgg->name} Power:{$pcEgg->power}" . PHP_EOL;
                echo "Random was: {$randomNumber}" . PHP_EOL;
                echo "-----------------------" . PHP_EOL;
                $pcWon += $winning;
                $pcAllEggs += $addEgg;
                $playersEggs -= $addEgg;
            } else {

                echo 'Player EGG won' . PHP_EOL;
                echo "-----------------------" . PHP_EOL;
                echo "{$playerEgg->name} Power:{$playerEgg->power} " . PHP_EOL;
                echo "fights against {$pcEgg->name} Power:{$pcEgg->power}" . PHP_EOL;
                echo "Random was: {$randomNumber}" . PHP_EOL;

                $playerWins += $winning;
                $pcAllEggs -= $addEgg;
                $playersEggs += $addEgg;
            }
            echo "-----------------------" . PHP_EOL;
            echo "Pc winn: $pcWon times and Eggs left  $pcAllEggs" . PHP_EOL;
            echo "Player win: $playerWins times and Eggs left  $playersEggs ." . PHP_EOL;

        }

        if($randomNumber <=$playerEgg->power)
{
echo PHP_EOL;
}else {
    break;
}
    }

}