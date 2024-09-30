<?php

namespace App;

require_once 'App/Config/Database.php'; // melakukan registrasi alamat file Database.php
require_once 'App/Config/config.php'; // melakukan registrasi alamat file config.php
require_once 'App/Utilities/PersonInterface.php'; // melakukan registrasi alamat file PersonInterface.php
require_once 'App/Helper/Role.php'; // melakukan registrasi alamat file Role.php
require_once 'App/Models/BaseClass.php'; // melakukan registrasi alamat file Baseclass.php
require_once 'App/Models/User.php'; // melakukan registrasi alamat file User.php
require_once 'App/Service-trait/InteractWithDatabase.php'; // melakukan registrasi alamat file InteractWithDatabase.php

require_once __DIR__ . '/../autoload.php';

// Sekarang Anda dapat menggunakan semua class yang terdaftar tanpa `require_once`
use App\Models\User;
use App\Config\Database;
use App\Helper\Role;