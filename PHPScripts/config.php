<?php
date_default_timezone_set('Europe/Paris');
if (file_exists('./Config/config.ini'))
    $CONFIG = parse_ini_file('./Config/config.ini', true);
else
    $CONFIG = parse_ini_file('../Config/config.ini', true);