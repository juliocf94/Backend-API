<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        // Obtener todos los visitantes de la base de datos
        $visitors = Visitor::all();

        // Iterar sobre cada visitante para calcular su generación
        foreach ($visitors as $visitor) {
            $generation = $this->calculateGeneration($visitor->birth_date);
            $visitor->generation = $generation;
        }

        // Devolver los visitantes con la información de la generación
        return response()->json($visitors);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $visitor = Visitor::create($request->all());
        return response()->json($visitor, 201);
    }

    public function show($id)
    {
        $visitor = Visitor::find($id);
        return response()->json($visitor);
    }

    public function update(Request $request, $id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->update($request->all());
        return response()->json($visitor, 200);
    }

    public function destroy($id)
    {
        Visitor::findOrFail($id)->delete();
        return response()->json(['message' => 'Visitor deleted successfully'], 200);
    }

    // Función para calcular la generación basada en la fecha de nacimiento
    private function calculateGeneration($birthDate)
    {
        // Convertir la fecha de nacimiento a objeto DateTime
        $birthDateTime = new \DateTime($birthDate);
        // Obtener el año de nacimiento
        $birthYear = $birthDateTime->format('Y');

        // Definir los rangos de años para cada generación
        $generations = [
            'Baby boomers' => [1949, 1968],
            'Generación X' => [1969, 1980],
            'Los millennials' => [1981, 1993],
            'Generación Z' => [1994, 2010],
            'Generación Alpha' => [2010, date('Y')]
        ];

        // Iterar sobre cada generación para determinar a cuál pertenece la persona
        foreach ($generations as $generation => $range) {
            if ($birthYear >= $range[0] && $birthYear <= $range[1]) {
                return $generation;
            }
        }

        // Si no se encuentra ninguna generación, devolver un valor por defecto
        return 'Otra generación';
    }
}
