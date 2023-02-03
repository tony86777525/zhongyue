<?php

function getPostNoticeMailData(): array
{
    $subject = '來自「中悦森PLAZA」網站的 預約賞屋留言內容';
    $fromName = '中悦森PLAZA - 官網名單';
    $fromMail = env('MAIL_USERNAME');
    $toName = 'alliswell';
    $toMails = [
        'alliswell.dragon@gmail.com',
        'alliswell.emily@gmail.com',
        'alliswell.zoey@gmail.com',
        'alliswell.weiwaa@gmail.com',

        // 2023-02-03 add email
        'sunnyafeel@hotmail.com',
        'joyes250@gmail.com'
    ];

    return [
        'subject' => $subject,
        'fromMail' => $fromMail,
        'fromName' => $fromName,
        'toMail' => $toMails,
        'toName' => $toName,
    ];
}