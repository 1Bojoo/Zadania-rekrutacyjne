<?php

class Thesaurus
{
    private $thesaurus = array();

    public function __construct($data = array()){
        $this->thesaurus = $data;
    }

    public function getSynonyms(string $word){
        return json_encode(["word" => $word, "synonyms" => $this->thesaurus[$word] ?? []]);
    }

}

$thesaurus = new Thesaurus(
    array(
        "market" => array("trade"), 
        "small" => array("little", "compact")
        )
    );

echo $thesaurus->getSynonyms("small")."<br>";
echo $thesaurus->getSynonyms("asleast");

?>