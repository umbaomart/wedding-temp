<?php

namespace App\Http\Controllers\Api;

use App\Models\Guests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GuestsController extends Controller
{
    public function index()
    {
        $guests = Guests::all();

        if ($guests->count() > 0) {

            return response()->json([
                'status' => 200,
                'data' => $guests
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Guests Found!'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'phone' => 'required|digits:10',
            'tags' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $guests = Guests::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'tags' => $request->tags,
                'status' => $request->status
            ]);

            if ($guests) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Guest Created Successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $guest = Guests::find($id);

        if ($guest) {
            return response()->json([
                'status' => 200,
                'data' => $guest
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Guest Not Found!'
            ], 404);
        }
    }

    public function edit($id)
    {
        $guest = Guests::find($id);

        if ($guest) {
            return response()->json([
                'status' => 200,
                'data' => $guest
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Guest Not Found!'
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'phone' => 'required|digits:10',
            'tags' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {

            $guests = Guests::find($id);

            if ($guests) {
                $guests->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'tags' => $request->tags,
                    'status' => $request->status
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'Guest updated successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Guest Not Found!'
                ], 404);
            }
        }
    }
}
