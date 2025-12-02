<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    // Публичный профиль
    public function profile() {
        // Для демонстрации: берем первого пользователя, если есть, иначе создаем фиктивного
        $user = User::first();

        if (!$user) {
            $user = new User([
                'first_name' => 'Иван',
                'last_name' => 'Иванов',
                'phone' => '+7 999 123-45-67',
                'email' => 'example@mail.com',
                'birth_date' => '1990-01-01',
                'promotional_emails' => true,
                'password' => bcrypt('demo123'), // заглушка для пароля
            ]);

            $user->save();
        }

        return inertia('components/Profile', [
            'user' => [
                'id' => $user->id ?? null,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'phone' => $user->phone,
                'email' => $user->email,
                'birth_date' => $user->birth_date ? $user->birth_date->format('Y-m-d') : null,
                'promotional_emails' => $user->promotional_emails,
            ]
        ]);
    }

    // Обновление профиля — если нужно для демо
    public function update(Request $request) {
        $user = User::first();

        if (!$user) {
            // Если пользователя нет, создаем временного
            $user = new User();
        }

        $data = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255|unique:users,phone,' . ($user->id ?? 'NULL'),
            'birth_date' => 'nullable|date',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . ($user->id ?? 'NULL'),
            'promotional_emails' => 'boolean',
        ]);

        $user->fill($data);
        $user->save();

        return back()->with('success', 'Профиль обновлен');
    }
}
