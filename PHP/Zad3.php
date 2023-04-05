<?php

class RankingTable{

    private $players = array();

    public function __construct($data = array()){
        foreach($data as $player) {
            $this->players[$player] = array();
        }
    }

    public function recordResult(string $player, int $result){
        $this->players[$player][] = $result;
    }

    public function playerRank($rank){

        uasort($this->players, function($a, $b){

            $scoreA = array_sum($a);
            $scoreB = array_sum($b);

            if($scoreA != $scoreB){
                return ($scoreA > $scoreB) ? -1 : 1;
            }else{
                $gamesA = count($a);
                $gamesB = count($b);

                if($gamesA != $gamesB){
                    return ($gamesA > $gamesB) ? 1 : -1;
                }else{
                    reset($a);
                    $first = key($a);

                    reset($b);
                    $second = key($b);

                    return ($first > $second) ? -1 : 1;
                }
            }
        });

        $i = 1;
        foreach($this->players as $player => $results){
            if($i == $rank){
                return $player;
            }
            $i++;
        }

        return null;

    }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));

$table->recordResult('Jan', 3);
$table->recordResult('Maks', 8);
$table->recordResult('Monika', 8);

echo $table->playerRank(1);

?>