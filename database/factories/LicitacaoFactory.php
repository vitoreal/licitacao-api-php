<?php

namespace Database\Factories;

use App\Models\Licitacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Licitacao>
 */
class LicitacaoFactory extends Factory
{
    protected $model = Licitacao::class;

    public function definition()
    {
        return [
            'id'   => $this->faker->numerify('########'),
            'codigo_uasg'   => $this->faker->numerify('########'),
            'numero_pregao' => $this->faker->bothify('2025/##'),
            'objeto'        => $this->faker->sentence,
            'data_proposta' => $this->faker->date(),
            'visualizada'   => $this->faker->boolean,
        ];
    }
}