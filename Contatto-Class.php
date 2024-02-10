<?php

class Contatto {
    public $nome;
    public $cognome;
    public $telefono;
    public $email;
    public $messaggio;

    public function __construct($nome, $cognome, $telefono, $email, $messaggio) {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->messaggio = $messaggio;
    }

    public function toText() {
        // Formatta il contatto in formato di testo
        $text = "Nome: " . $this->nome . "\n";
        $text .= "Cognome: " . $this->cognome . "\n";
        $text .= "Telefono: " . $this->telefono . "\n";
        $text .= "Email: " . $this->email . "\n";
        $text .= "Messaggio: " . $this->messaggio . "\n\n";
        return $text;
    }
}

?>