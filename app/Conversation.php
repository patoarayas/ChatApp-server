<?php
/**
 * Copyright (c) Patricio Araya  2020.
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{


    /**
     * Relation with user one
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
//    public function user_one()
//    {
//        return $this->hasOne(User::class, 'id', 'user_one_id');
//    }

    /**
     * Relation with user two
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
//    public function user_two()
//    {
//        return $this->hasOne(User::class, 'id', 'user_two_id');
//    }

    /**
     * A conversations belongs to many users (2 at least).
     * @return BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

    /**
     * A conversation has many messages
     * @return HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
