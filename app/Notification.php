<?php

namespace App;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public static function toDevice()
    {

    }
}
