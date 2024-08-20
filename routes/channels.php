<?php

use Illuminate\Support\Facades\Broadcast;
use App\Broadcasting\OrderChannel;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('orders.{order}', OrderChannel::class);