<?php
class MovieModel {
    protected $db;

    function __construct() {
        $this->db = new PDO('mysql:host= http://localhost/phpmyadmin/index.php?route=/database/structure&db=cine' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        $tableName = 'movies';

        if (!in_array($tableName, $tables)) {
            $sql = <<<SQL
                CREATE TABLE `movies` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
                  `duracion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                  `release_year` int(4) NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 SQL;
            $this->db->query($sql);
        }
    }
}