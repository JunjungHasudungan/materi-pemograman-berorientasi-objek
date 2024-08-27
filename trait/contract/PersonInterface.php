<?php

interface PersonInterface {
    public function setData($id): void;
    public function update(): bool;
    public function setName($name): void;
    public function setEmail($email): void;
    public function setRole($role): void;
    public function getRole():string;
    public function setAdress($address): void;
}