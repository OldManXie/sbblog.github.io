<?php
//需要和你在Github上填写的secret一致
$secret = "xieyunhu123.";
// 需要同步的项目路径
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
if ($signature) {
    $hash = "sha1=".hash_hmac('sha1', $HTTP_RAW_POST_DATA, $secret);
    if (strcmp($signature, $hash) == 0) {
        //shell_exec执行shell命令，2>&1用于标准错误重定向到标准输出，也就是脚本执行错误时也能返回错误信息
        echo shell_exec("cd /personal/www/www.sbblog.top && /usr/bin/git reset --hard origin/master && /usr/bin/git clean -f && /usr/bin/git pull 2>&1");
        $path = '/personal/www/www.sbblog.top/posts';
        $open = opendir( $path );
        $dir = array();
        while (($file = readdir($open)) !== false ||$file != '.'||$file != '..'){
            $dir[] = $file;
        }
        closedir($open);
        for ($i=2;$i<=count($dir)-1;$i++){
            $str = file_get_contents( $path . '/' . $dir[$i] );

            $str = preg_replace( '/\n/' , '' , $str );

            $str = preg_replace( '/\r/' , '' , $str );

            $str = str_replace( '  ' , '' , $str );

            file_put_contents( $path . '/' . $dir[$i] , $str );
        }
        exit(date('Y-m-d H:i:s'));
    }
}
http_response_code(404);
?>

