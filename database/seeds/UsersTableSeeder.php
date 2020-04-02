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

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cant = 3; // How many users to seed
        for ($i = 1; $i <= $cant; $i++){
            \App\User::create([

                'name' => 'usuario'.$i,
                'email' => 'usuario'.$i.'@usuarios.cl',
                'password' => bcrypt('usuario'.$i),
                'api_token' => \Illuminate\Support\Str::random(60),
            ]);
        }

    }
}
