<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'status',
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
            'status' => 'boolean',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // Permite acesso ao painel apenas para usuários ativos com perfil 'admin' ou 'coordenador' ou 'orientador'
        return $this->status && ($this->isAdmin() || $this->isCoordenador() || $this->isOrientador());
    }

// User tem um Currículo (apenas orientadores terão)
public function curriculo(): HasOne
{
    return $this->hasOne(Curriculo::class);
}

// Helper para verificar perfis (seu campo JSON)
public function hasPerfil(string $perfil): bool
{
    $perfis = $this->perfis ?? [];
    return in_array($perfil, $perfis);
}

public function isAdmin(): bool       { return $this->hasPerfil('admin'); }
public function isCoordenador(): bool { return $this->hasPerfil('coordenador'); }
public function isOrientador(): bool  { return $this->hasPerfil('orientador'); }

}
