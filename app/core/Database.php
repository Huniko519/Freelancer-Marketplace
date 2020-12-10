<?php

namespace Fir\Connection;

use Medoo\Medoo;

/**
 * The database class which creates the database connection
 */
class Database
{
    /**
     * Starts the database connection
     * @return \mysqli
     */
    public function connect()
    {

        $db = new Medoo([
            'database_type' => DB_TYPE,
            'server' => DB_HOST,
            'database_name' => DB_DATABASE,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD
        ]);

        return $db;        
    }
}