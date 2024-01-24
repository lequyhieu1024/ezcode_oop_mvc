<?php
// tạo kết nối từ project php sang mysql

namespace App\Models;

use PDO;

require_once "env.php";

class BaseModel
{
    protected $connect;
    public function __construct()
    {
        $this->connect = new PDO(
            "mysql:host=" . DBHOST
                . ";dbname=" . DBNAME
                . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
    }
    public function dataProcess($sql, $getDataAll = true)
    {
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        if ($getDataAll) {
            return $stmt->fetchAll();
        }
        return $stmt->fetch();
    }
}
