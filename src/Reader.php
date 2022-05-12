<?php

    namespace App;

    class Reader implements \SplObserver {

        private string $name;

        public function __construct($name) {
            $this->name = $name;
        }

        public function update(\SplSubject $subject): void {
            echo $this->name.' is reading breakout news <b>'.$subject->getContent().'</b><br>';
        }

    }

?>