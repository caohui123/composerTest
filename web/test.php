<script>
    ws = new WebSocket("ws://127.0.0.1:2346");
    ws.onopen = function() {
        alert("连接成功");
        ws.send('tom');
        alert("给服务端发送一个字符串：tom");
    };
    ws.onmessage = function(e) {
        alert("收到服务端的消息：" + e.data);
    };
   // ws.close(200,'success');
</script>

