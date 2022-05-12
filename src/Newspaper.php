<?php

    namespace App;

    class Newspaper implements \SplSubject {

        private array  $observers = array();
        private string $name;
        private string $content;
        
        public function __construct($name) {
            $this->name = $name;
        }

        public function attach(\SplObserver $observer): void {
            $this->observers[] = $observer;
        }

        public function detach(\SplObserver $observer): void {
            $key = array_search($observer, $this->observers); 
            if ($key) {
                unset($this->observers[$key]);
            }
        }   

        // setter
        function breakOutNews($content) {
            $this->content = $content;
            $this->notify();
        }

        // getter
        function getContent() {
            return $this->content." ($this->name)";
        }

        public function notify(): void {
            foreach ($this->observers as $value) {
                $value->update($this);
            }
        }

    }

?>