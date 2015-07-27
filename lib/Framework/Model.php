<?php
namespace Framework;


abstract class Model
{
    private $db = null;

    /**
     * @return Db
     */
    public function getDb()
    {
        if (!$this->db) {
            $this->db = new Db;
        }
        return $this->db;
    }
}
