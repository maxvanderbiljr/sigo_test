<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'perfis',
        'ativo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'perfis' => 'array',
            'ativo' => 'boolean',
        ];
    }

    public function isAdmin(): bool
    {
        return in_array('admin', $this->perfis ?? []);
    }

    public function isCoordenador(): bool
    {
        return in_array('coordenador', $this->perfis ?? []);
    }

    public function isOrientador(): bool
    {
        return in_array('orientador', $this->perfis ?? []);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // Permite acesso se o usuário estiver ativo e tiver pelo menos um perfil
        return $this->ativo && !empty($this->perfis);
    }

}
