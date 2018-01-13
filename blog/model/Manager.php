<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=benedictcpoc2.mysql.db;dbname=benedictcpoc2;charset=utf8', 'benedictcpoc2', 'OpenclassroomDWJ24');
        return $db;
    }
}