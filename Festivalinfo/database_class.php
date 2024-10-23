<?php

include "db_connect.php";

class PdoDatabase
{
    private $host;
    private $user;
    private $pass;
    private $dbname;

    public $dbh;

    public $error;

    private $queryString;

    public function __construct($host, $user, $pass, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;

        $dsn = "pgsql:host=" . $host . ";dbname=" . $dbname . ";";

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }


    public function query($query)
    {
        $this->queryString = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->queryString->bindValue($param, $value, $type);
    }

    public function getFormattedQuery()
    {
        $query = $this->queryString->queryString;
        $bindings = $this->queryString->debugDumpParams();
        ob_start();
        $this->queryString->debugDumpParams();
        $bindings = ob_get_clean();
        return $query . " with bindings: " . $bindings;
    }

    public function execute($bool_debug = false)
    {
        if ($bool_debug) {
            echo $this->getFormattedQuery();
        }

        try {
            return $this->queryString->execute();
        } catch (Exception $e) {
            error_log("FOUT BY QUERY: " . $e->getMessage());
            throw new Exception("<b>FOUT BY QUERY:</b> " . $e->getMessage());
        }
    }

    public function getRows()
    {
        return $this->queryString->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRow()
    {
        return $this->queryString->fetch(PDO::FETCH_ASSOC);
    }

    public function seekData($value)
    {
        return $this->queryString->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_ABS, $value);
    }


    public function rowCount()
    {
        return $this->queryString->rowCount();
    }

    public function lastInsertID()
    {
        return $this->dbh->lastInsertId();
    }

    public function gethost()
    {
        return $this->host;
    }

    public function getuser()
    {
        return $this->user;
    }

    public function getdb()
    {
        return $this->dbname;
    }


    public function close()
    {
        $this->dbh = null;
    }
}
