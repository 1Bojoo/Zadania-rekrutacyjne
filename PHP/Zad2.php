<?php

interface UserInterface{
    public function add(string $text);
    public function getValue();
}

class TextInput implements UserInterface{

    protected $result = '';

    public function add(string $text){
        return $this->result .= " ".$text;
    }

    public function getValue(){
        return $this->result;
    }

}

class NumericInput extends TextInput{

    public function add($text){
        if(is_numeric($text)){
            parent::add($text);
        }
    }

}

$text = new TextInput;
$text->add('tekst');
$text->add('zadanie 2');

echo $text->getValue()."<br>";


$num = new NumericInput;
$num->add("asd");
$num->add("0192");
$num->add("019a2");

echo $num->getValue();

?>