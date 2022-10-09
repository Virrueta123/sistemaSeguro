<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class PropietarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function generar(){
        return DB::select('SELECT sistemacat.GenerarCodigoCat() as codigo' )[0]->codigo;
    }
    public function definition()
    {
         
        $fechaI =  $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
        $fechaF =  Carbon::parse($fechaI)->addYear(1)->addDay(-1)->format("Y-m-d");
        return [
            "Prx_NroCat" => $this->generar() ,
            "Prx_VigenciaI" => $fechaI,
            "Prx_VigenciaF" => $fechaF,
            "Prx_Nombre" =>  $this->faker->name(),
            "Prx_Apellido" =>  $this->faker->lastname(),
            "Prx_Dni" =>  $this->faker->randomNumber(8, true),
            "Prx_Contacto" => "942".$this->faker->randomNumber(6, true),
            "Prx_Direccion" => $this->faker->address(),
            "Prx_Ubigeo" =>  $this->faker->randomNumber(6, true),
            "Prx_NroPlaca" =>   $this->faker->regexify('[0-9]{4}-[0-4A-Z]{2}'),
            "Prx_Categoria" => $this->faker->randomElement(['Monto lineal', 'Trimovil', 'Auto']) ,
            "Prx_Ano" =>  $this->faker->date($format = 'Y',$startDate = '-3 years', $max = '+3years'),
            "Prx_Marca" =>  "marca",
            "Prx_NroAsientos" =>  $this->faker->randomNumber(1, true) ,
            "Prx_NroSerie" =>  $this->faker->regexify('[0-9]{1}[A-Z]{4}[0-9]{2}[A-Z]{4}[0-9]{6}'),
            "Prx_Modelo" =>  "modelo",
            "Prx_Uso" =>   $this->faker->randomNumber(1, true),
            "activo" =>   $this->faker->randomElement(['A', 'D']) 
        ];
       
    }
}
