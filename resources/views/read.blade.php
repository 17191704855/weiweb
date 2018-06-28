
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.25, maximum-scale=4.0" />
    <meta name="applicable-device" content="mobile">
    <title>来点变化更吸睛，真假两件定全身 - 穿衣打扮</title>
    <link rel="stylesheet" rev="stylesheet" href="/style/default.css" type="text/css" media="all" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon.png" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>

<div class="m_header">
    <a href="{{url('/')}}" target="_self"><img src="/style/logo.gif" alt="穿衣打扮" title="穿衣打扮" /></a>
</div>



<div class="m_article">
    <h1>{{ $article->title }}</h1>
    <div class="m_writer">{{ $article->created_at }}</div>
    <div class="m_content">
        {!! $article->content !!}
    </div>
    <div class="m_tuijian"><div id="hm_t_59273"></div></div>
    @if(!empty($next_article))
        <div class="m_more"><a href="/read/{{$next_article->id}}" target="_self">下一篇：{{$next_article->title }}</a></div>
    @endif
</div>

<div class="to_normal">
    <a href="/" target="_self">首页更精彩</a>　微信号 <strong>cydbabc</strong> 求关注
</div>

<div class="count">

</div>

</body>
<script type="text/javascript" src="/js/clipboard.min.js"></script>
<script>
    $('.itemCopy').click( function () {
        tklid=$(this).attr('tkl_id')
        that=this
        $.ajax({
            async:false,
            type:'get',
            url:"/tkl/"+tklid,
            dataType:'json',
            success:function(msg){
               if(msg['type']=='1'){
                   $(that).attr('data-clipboard-text',msg['tkl']);
                }else{
                   $(that).attr("href",msg['url']);

               }
            }
        });
    })
    var clipboard = new Clipboard('.itemCopy');
    clipboard.on('success',
        function(e) {
            if (e.trigger.disabled == false || e.trigger.disabled == undefined) {
                text=e.trigger.innerHTML
                e.trigger.innerHTML = "复制成功，打开淘宝会自动弹出口令";

                //e.clearSelection();
                e.trigger.disabled = true;
                //2秒后按钮恢复原状
                setTimeout(function() {
                        e.trigger.innerHTML = text;
                        e.trigger.disabled = false;
                    },
                    2000);
            }
        });

</script>
</html>