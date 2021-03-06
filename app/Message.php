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
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{

    protected $fillable = [
        'conversation_id',
        'user_id',
        'content',
        'loc_latitude',
        'loc_longitude',
        'loc_error'
    ];

    /**
     * A message belongs to a conversation.
     * @return BelongsTo
     */
    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    /**
     * A message belongs to an user.
     * @return BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
