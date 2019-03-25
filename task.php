<?php

class Task {
    public $description;

    public $completed;

    public function isCompleted(){
        return $this->completed;
    }
}