<?php

namespace App\Http\Controllers\api;

use GraphQL;
use GraphQL\Schema;
use App\GraphQL\Type;
use App\GraphQL\Query;
use Illuminate\Http\Request;
use GraphQL\GraphQL as Graph;
use App\Http\Controllers\Controller;

class GraphQLController extends Controller
{
    protected $tag = 'GraphQL Controller ';

    public function Queries(Request $request) {
        if ($this->getAuthUser()['statusCode'] !== 200) {
            return response()->json([
                'error' => $this->getAuthUser()['error'],
                'statusCode' => (int)401
            ], 401);
        }

        $query = $request->input('query');
        $schema = GraphQL::schema();
        $result = Graph::execute($schema, $query);
        return response()->json($result);
    }

    public function Mutations(Request $request) {
        if ($this->getAuthUser()['statusCode'] !== 200) {
            return response()->json([
                'error' => $this->getAuthUser()['error'],
                'statusCode' => (int)401
            ], 401);
        }

        $query = $request->input('mutations');
        $schema = GraphQL::schema();
        $result = Graph::execute($schema, $query);
        return response()->json($result);
    }

    public function Subscriptions(Request $request) {
        if ($this->getAuthUser()['statusCode'] !== 200) {
            return response()->json([
                'error' => $this->getAuthUser()['error'],
                'statusCode' => (int)401
            ], 401);
        }

        $query = $request->input('subscriptions');
        $schema = GraphQL::schema();
        $result = Graph::execute($schema, $query);
        return response()->json($result);
    }

}
