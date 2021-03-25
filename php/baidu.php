<?php
$urls = array(
    'https://www.sbblog.top/posts/be1f.html',
    'https://www.sbblog.top/posts/4c2as1.html',
    'https://www.sbblog.top/posts/60b64ed3.html',
    'https://www.sbblog.top/posts/3c8a.html',
    'https://www.sbblog.top/posts/fb20.html',
    'https://www.sbblog.top/posts/93941216.html',
    'https://www.sbblog.top/posts/64001171.html',
    'https://www.sbblog.top/posts/61e56c7e.html',
    'https://www.sbblog.top/posts/15c8b954.html',
    'https://www.sbblog.top/posts/4b1d.html',
    'https://www.sbblog.top/posts/3e2c.html',
    'https://www.sbblog.top/posts/4c2a.html',
    'https://www.sbblog.top/posts/954f.html',
    'https://www.sbblog.top/posts/fc3f.html',
    'https://www.sbblog.top/posts/9ad4.html',
    'https://www.sbblog.top/posts/979a.html',
    'https://www.sbblog.top/posts/b6e8.html',
);
$api = 'http://data.zz.baidu.com/urls?site=www.sbblog.top&token=iCHDA5PWGVSxWhIH';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;
