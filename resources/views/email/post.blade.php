來自「{{ env('APP_NAME') }}」網站的預約賞屋留言內容：
<br>
<ol>
    <li>
        <b>姓名</b>
        <div>{{ $name }}</div>
    </li>
    <li>
        <b>連絡電話</b>
        <div>{{ $phone }}</div>
    </li>
    <li>
        <b>Email</b>
        <div>{{ $email }}</div>
    </li>
    <li>
        <b>用戶IP位置</b>
        <div>{{ $ip }}</div>
    </li>
    <li>
        <b>來源網址</b>
        <div>{{ $url }}</div>
    </li>
</ol>
<br>
--- 這封信來自網址 {{ env('APP_URL') }}