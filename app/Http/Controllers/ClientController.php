<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends BasicController
{
    public $model = User::class;
    public $reactView = 'Admin/Clients.jsx';

    public function setReactViewProperties()
    {
        $usersJpa = User::with(['memberships', 'memberships.payment'])
            ->select('users.*', 'memberships.item')
            ->join('memberships', 'users.email', '=', 'memberships.email')
            ->where('memberships.start_date', '>=', now()->subMonth())
            ->groupBy('users.id', 'users.email', 'users.name', 'users.created_at', 'users.updated_at', 'memberships.item')
            ->get();
        return [
            'users' => $usersJpa
        ];
    }
}
