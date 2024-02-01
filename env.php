
<?php

const DBHOST = "localhost";
const DBNAME = "ezcode_oop";
const DBCHARSET = "utf8";
const DBUSER = "root";
const DBPASS = "";

const BASE_URL =  'http://localhost/ezcode/';
const ADMIN_URL =  'http://localhost/ezcode/admin/';
const PATH_IMG =  'http://localhost/ezcode/public/images/';

function route($url)
{
    return BASE_URL . $url;
}
