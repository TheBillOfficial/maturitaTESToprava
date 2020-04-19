<?php

class Komponenty extends Nette\Application\UI\Form {

    public function __construct($parent, $name) {
        parent::__construct();
        $this->setAction($parent->link('Komponenty:success'));
        
        $this->setMethod("POST");
        
        $this->addText('Nazev_Komponentu', 'Název komponentu')
                ->setRequired('Prosíme, zapište název potřebné komponenty');
        
        $this->addText('Seriove_Cislo_Komponenta', 'Sériové číslo komponenty')
                ->setRequired('Prosíme, zapište sériové číslo potřebné komponenty');
    
        $this->addEmail('email', 'Váš email')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::EMAIL, 'Tato adresa není platná');
        
        $this->addText('Pocet_Kusu', 'Počet kusů')->setRequired('Napište počet kusů')
                ->addRule(\Nette\Forms\Form::INTEGER, 'Zapište počet kusů pouze čísly');
        
        $this->addCheckboxList('Typ_Komponenty', 'Typ komponentu', array('RAM'=>'paměť RAM', 'HDD'=>'HDD', 'SSD'=>'SSD'));
        
        $this->addRadioList('Doprava', 'Způsob dopravy', array('Osobne'=>'Osobní odběr', 'PostaDR'=>'Česká Pošta balik do ruky', 'PostaNP'=>'Česká Pošta balík na poštu','Zasilkovna'=>'Zásilkovna', 'DopravaPPL'=>'dopravce PPL','dopravceGEIS'=> 'dopravce GEIS'));
        
        $this->addTextArea('Detaily', 'Upřesnění objednávky', 40, 6);
        
        $this->addSelect('Platba', 'Vyberte možnosti platby', array('karta'=>'Platba kartou', 'hotove'=>'Platba hotově'));
        
        $this->addUpload('Upload');
        
        $this->addPassword('Heslo', 'Vaše heslo')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::MIN_LENGTH, 'Více než 6 znaků', 6);
        
        $this->addPassword('Heslo2', 'Vaše heslo znovu')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::EQUAL, 'Heslo nesouhlasí', $this['Heslo']);
        
        $this->addSubmit('Odeslat_Formular', 'Odeslat');
        
    }

}
