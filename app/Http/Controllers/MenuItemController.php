<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('childrenRecursive')
            ->whereNull('parent_id')
            ->where('is_active', 'A')
            ->get()
            ->toArray();

        $menuTree = $this->buildMenuTree($menuItems);

        return response()->json($menuTree);
    }

    private function buildMenuTree($menuItems)
    {
        $menuTree = [];

        foreach ($menuItems as $menuItem) {
            // Solo agregar el elemento del menú si está activo
            if ($menuItem['is_active'] === 'A') {
                $menuItemData = [
                    'id' => $menuItem['id'],
                    'item_name' => $menuItem['item_name'],
                    'url' => $menuItem['url'],
                    'children' => [], // Inicializar el array de hijos
                ];

                // Construir recursivamente el árbol de menú para los hijos activos
                if (!empty($menuItem['children_recursive'])) {
                    $menuItemData['children'] = $this->buildMenuTree($menuItem['children_recursive']);
                }

                $menuTree[] = $menuItemData;
            }
        }

        return $menuTree;
    }


    public function store(Request $request)
    {
        $menuItem = MenuItem::create($request->all());

        return response()->json($menuItem, 201);
    }

    public function show($id)
    {
        $menuItem = MenuItem::with('children')->find($id);

        return response()->json($menuItem);
    }

    public function add(Request $request, $parent_id)
    {
        $parent = MenuItem::find($parent_id);

        $newChild = new MenuItem();

        $newChild->item_name = $request->input('item_name');
        $newChild->url = $request->input('url');
        $newChild->parent_id = $parent->id;

        $newChild->save();

        return response()->json(['message' => 'El elemento del menú ha sido registrado correctamente'], 200);
    }

    public function update(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->item_name = $request->input('item_name');
        $menuItem->save();

        return response()->json($menuItem, 200);
    }

    public function delete($id)
    {
        try {
            // Buscar el elemento del menú por su ID
            $menuItem = MenuItem::findOrFail($id);

            // Actualizar el campo is_active a 'I' para marcar el elemento como inactivo
            $menuItem->update(['is_active' => 'I']);

            return response()->json(['message' => 'El elemento del menú ha sido marcado como inactivo'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se pudo marcar el elemento como inactivo'], 500);
        }
    }

    public function destroy($id)
    {
        MenuItem::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
