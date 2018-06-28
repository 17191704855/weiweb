
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.25, maximum-scale=4.0" />
    <meta name="applicable-device" content="mobile">
    <title>穿衣打扮</title>
    <link rel="stylesheet" rev="stylesheet" href="style/default.css" type="text/css" media="all" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon.png" />
    <link rel="canonical" href="/" />
</head>
<body>
<div class="m_header">
    <a href="/" target="_self"><img src="style/logo.gif" alt="穿衣打扮" title="穿衣打扮" /></a>
</div>
@foreach($article_list as $k=>$v)
    <div class="m_list">
        <a href="read/{{$v->id}}" target="_blank">
            <img src="{{$v->image_path}}" alt="{{$v->title}}" title="{{$v->title}}" />
            <h2>{{$v->title}}</h2>
            {!! str_limit(str_replace('　', '',$v->content),116, '...').'</p>' !!}
        </a>
    </div>
@endforeach
<div class="load_more">
    @if($page!=1)
         <a href="?page={{$page-1}}" target="_self">上一页</a>
    @endif
    @if($page_count!=$page)
        <a href="?page={{$page+1}}" target="_self">下一页</a>
    @endif
</div>


<div class="to_normal">
    <a href="/" target="_self">首页更精彩</a>　微信号 <strong>cydbabc</strong> 求关注
</div>

<div class="count">
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?987a52b30d2e01bb9a5a912588468110";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</div>

</body>
</html>