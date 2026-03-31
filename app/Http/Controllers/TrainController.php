<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    // ── GET /api/trains ───────────────────────────────────────────
    public function index(): JsonResponse
    {
        try {
            $trains = Train::orderBy('id', 'desc')->get();

            return response()->json([
                'success' => true,
                'count'   => $trains->count(),
                'data'    => $trains,
            ]);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    // ── GET /api/trains/{id} ──────────────────────────────────────
    public function show(int $id): JsonResponse
    {
        try {
            $train = Train::find($id);

            if (!$train) {
                return response()->json(['success' => false, 'message' => 'Train not found'], 404);
            }

            return response()->json(['success' => true, 'data' => $train]);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    // ── POST /api/trains ──────────────────────────────────────────
    public function store(Request $request): JsonResponse
    {
        $trainName = trim($request->input('train_name', ''));
        $price     = $request->input('price', '');
        $route     = trim($request->input('route', ''));

        if (!$trainName || $price === '' || !$route) {
            return response()->json([
                'success' => false,
                'message' => 'train_name, price, and route are required',
            ], 400);
        }

        try {
            $train = Train::create([
                'train_name' => $trainName,
                'price'      => $price,
                'route'      => $route,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Train created',
                'data'    => $train,
            ], 201);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    // ── PUT /api/trains/{id} ──────────────────────────────────────
    public function update(Request $request, int $id): JsonResponse
    {
        $trainName = trim($request->input('train_name', ''));
        $price     = $request->input('price', '');
        $route     = trim($request->input('route', ''));

        if (!$trainName || $price === '' || !$route) {
            return response()->json(['success' => false, 'message' => 'All fields are required'], 400);
        }

        try {
            $train = Train::find($id);

            if (!$train) {
                return response()->json(['success' => false, 'message' => 'Train not found'], 404);
            }

            $train->update([
                'train_name' => $trainName,
                'price'      => $price,
                'route'      => $route,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Train updated',
                'data'    => $train->fresh(),
            ]);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    // ── DELETE /api/trains/{id} ───────────────────────────────────
    public function destroy(int $id): JsonResponse
    {
        try {
            $train = Train::find($id);

            if (!$train) {
                return response()->json(['success' => false, 'message' => 'Train not found'], 404);
            }

            $train->delete();

            return response()->json(['success' => true, 'message' => 'Train deleted']);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }
}
