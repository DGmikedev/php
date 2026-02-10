<?php 




class Tager{

    private $tag = "bchdfgt76ehkw8233heue7";
    private $id = 01;
    private DateTimeImmutable $date;

    public function getTag(){
        echo $this->getDateTime();
        return $this->tag;
    }

    private function getDateTime(){
        
        $zone = new DateTimeZone("America/Mazatlan");
        
        $this->date = new DateTimeImmutable("now", $zone); 

        return $this->date->format('Y-m-d h:mm:s');

    }


}

$tager = new Tager();

echo "Tag: " . $tager->getTag();

// getDateTime
