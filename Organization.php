<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'founded_at'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function active_users()
    {
        return $this->users()->where('is_active', '=', 1)->get();
    }

    public function oldest_inactive_user()
    {
        return $this->users()->where('is_active', '=', 0)->orderBy('created_at', 'asc')->limit(1)->get();
    }

    public function set_inactive()
    {
        $this->users()->whereBetween('created_at', [ now()->subMonth(2), now()->subMonth() ])->update([ "is_active" => false ]);
    }

    public function set_founded_at($founded_at)
    {
        $this->update([ 'founded_at' => $founded_at ]);
    }

    public function add_user($email, $password)
    {
        $user = User::create([ 'email' => $email, 'password' => bcrypt($password) ]);
        $this->users()->save($user);
    }



}
