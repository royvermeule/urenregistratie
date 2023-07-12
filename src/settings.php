<?php
//Database params
const DB_HOST = 'localhost'; //Add your db host
const DB_USER = 'root'; // Add your DB root
const DB_PASS = ''; //Add your DB pass
const DB_NAME = 'testdb'; //Add your DB Name

//APPROOT
define('APPROOT', dirname(__FILE__, 2));

//URLROOT (Dynamic links)
//here is where you specify your website url
const URLROOT = 'http://www.urenreg.com';

//Sitename
const SITENAME = 'Uren registratie';

//timezone
const DTZ = new DateTimeZone('Europe/Amsterdam');