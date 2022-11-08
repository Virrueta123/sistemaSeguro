<?php
return [

    /*
    |--------------------------------------------------------------------------
    | MYSQL
    |--------------------------------------------------------------------------
    */

    'mysql' => [

        /*
        |--------------------------------------------------------------------------
        | mysql Path
        |--------------------------------------------------------------------------
        |
        | Path to mysql, must be absolute on windows.
        |
        */

        'mysql_path' => 'mysql',

        /*
        |--------------------------------------------------------------------------
        | mysqldump Path
        |--------------------------------------------------------------------------
        |
        | Path to mysqldump, must be absolute on windows.
        |
        */

        'mysqldump_path' => 'mysqldump',

        /*
        |--------------------------------------------------------------------------
        | File compression
        |--------------------------------------------------------------------------
        |
        | Enable or disable file compression.
        |
        */

        'compress' => false,

        /*
        |--------------------------------------------------------------------------
        | Local Storage
        |--------------------------------------------------------------------------
        */

        'local-storage' => [

            /*
            |--------------------------------------------------------------------------
            | Local Storage Disk Name
            |--------------------------------------------------------------------------
            */

            'disk' => 'local',

            /*
            |--------------------------------------------------------------------------
            | Local Storage Path
            |--------------------------------------------------------------------------
            */

            'path' => 'public/backups',

        ],

        /*
        |--------------------------------------------------------------------------
        | Cloud Storage
        |--------------------------------------------------------------------------
        */

        'cloud-storage' => [

            /*
            |--------------------------------------------------------------------------
            | Enabled Cloud Storage?
            |--------------------------------------------------------------------------
            */

            'enabled' => false,

            /*
            |--------------------------------------------------------------------------
            | Cloud Storage Disk Name
            |--------------------------------------------------------------------------
            */

            'disk' => 's3',

            /*
            |--------------------------------------------------------------------------
            | Cloud Storage Path
            |--------------------------------------------------------------------------
            */

            'path' => 'path/to/your/backup-folder/',

            /*
            |--------------------------------------------------------------------------
            | Keep Local Files After Cloud Storage?
            |--------------------------------------------------------------------------
            */

            'keep-local' => true,

        ],

    ],

];