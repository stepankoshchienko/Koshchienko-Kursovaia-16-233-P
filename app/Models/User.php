<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',       // Имя
        'last_name',
        'email',            // Email
        'phone',            // Телефон
        'password',         // Пароль
        'birth_date',       // Дата рождения
        'email_subscriptions',  // Email подписки
        'promotional_emails',   // Рекламные рассылки
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth_date' => 'date',              // Приведение к типу даты
        'email_subscriptions' => 'boolean',  // Приведение к boolean
        'promotional_emails' => 'boolean',   // Приведение к boolean
    ];

    // Если будет отдельная таблица профилей - раскомментировать
    // public function profile() {
    //     return $this->hasOne(Profile::class);
    // }

    // Дополнительные методы для удобства

    /**
     * Получить полное имя пользователя
     */
    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    /**
     * Проверить, подписан ли пользователь на email рассылки
     */
    public function hasEmailSubscriptions()
    {
        return $this->email_subscriptions === true;
    }

    /**
     * Проверить, согласен ли пользователь на рекламные рассылки
     */
    public function wantsPromotionalEmails()
    {
        return $this->promotional_emails === true;
    }

    /**
     * Получить пользователей с подтвержденным email
     */
    public function scopeVerified($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

}