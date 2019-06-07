<?php

namespace App\Http\GraphQL\Queries;

use App\Models\Metadata;
use Illuminate\Database\Eloquent\Model;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class MetadataQuery
{
    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param array $args The arguments that were passed into the field.
     * @param GraphQLContext|null $context Arbitrary data that is shared between all fields of a single query.
     * @param ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     *
     * @return mixed
     */
    public function searchBranch($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        if (isset($args['id']))
        {
            return Metadata::where('id' , $args['id'])->first();
        }
        else if(isset($args['BranchName']))
        {
            return Metadata::getBranch($args['BranchName']);
        }
    }

    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param array $args The arguments that were passed into the field.
     * @param GraphQLContext|null $context Arbitrary data that is shared between all fields of a single query.
     * @param ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     *
     * @return mixed
    */
    public function keyFilter($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        if(isset($args['key']))
        {
            return Metadata::keyFilter($args['key']);
        }
    }

    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param array $args The arguments that were passed into the field.
     * @param GraphQLContext|null $context Arbitrary data that is shared between all fields of a single query.
     * @param ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     *
     * @return mixed
    */
    public function branches($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        return Metadata::GetBranches();
    }

    public function keys($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        return Metadata::GetKeys();
    }
}
