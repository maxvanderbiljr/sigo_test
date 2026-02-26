<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('foto'),
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                // DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
        //         DatePicker::make('data_nascimento'),
        //         TextInput::make('cpf')
        //             ->required(),
        //         Select::make('estado_civil')
        //             ->options([
        //     'solteiro' => 'Solteiro',
        //     'casado' => 'Casado',
        //     'divorciado' => 'Divorciado',
        //     'viuvo' => 'Viuvo',
        //     'uniao_estavel' => 'Uniao estavel',
        // ]),
                // TextInput::make('telefone')
                //     ->tel(),
                // Textarea::make('endereco')
                //     ->columnSpanFull(),
                // TextInput::make('estado'),
                // TextInput::make('cidade'),
                // TextInput::make('cep'),
                CheckboxList::make('perfis')
                    ->options([
                        'admin' => 'Administrador',
                        'coordenador' => 'Coordenador',
                        'orientador' => 'Orientador',
                    ])
                    ->required()
                    ->columns(1),
                Toggle::make('status')
                    ->label('Status')
                    ->required(),
                // Toggle::make('primeiro_acesso')
                //     ->required(),
                // DateTimePicker::make('ultimo_acesso'),
            ]);
    }
}
