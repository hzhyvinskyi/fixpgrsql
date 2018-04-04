function q($query, $key = 0) {
    $res = DB::_($key)->query($query);
    if ($res === false) {
        $info = debug_backtrace();
        $error = date("Y-m-d H:i:s").' QUERY: '.$query.' in file '.$info[0]['file'].' at line '.$info[0]['line'].'<br>'.PHP_EOL.DB::_($key)->error.PHP_EOL.PHP_EOL;

        file_put_contents('./logs/mysql.log', strip_tags($error)."\n\n", FILE_APPEND);
        echo $error;
        exit();
    }

    return $res;
}
