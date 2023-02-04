<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>中悦森PLAZA</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="keywords" content="青埔站前特區 森態超級商辦 | 80-550坪 02-8522-8585">
    <meta name="description" content="青埔站前特區 森態超級商辦 | 80-550坪 02-8522-8585">
    <meta property="og:site_name" content="森Plaza" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="森Plaza" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('web.layouts.css')
    @include('web.layouts.gtm_head')
</head>

<body>

@include('web.layouts.gtm_head')
<main class="main">
    @include('web.layouts.sidebar')
    @section('main')
    @show
</main>
@include('web.layouts.scripts')
</body>

</html>
