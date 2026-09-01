<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\User as ModelsUser;

final readonly class User
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        // TODO implement the resolver
    }
    public function userOlder($root, array $args)
    {
        # return ModelsUser::where('age', '>', $args['olderThan'])->get();
        return ModelsUser::where('year_of_birth', '<', now()->year-$args['olderThan'])->get();
    }

    public function totalAgesCount(): int
    {
        return (int) ModelsUser::query()
            ->selectRaw(
                'SUM(? - year_of_birth) as total',
                [now()->year]
            )
            ->value('total') ?? 0;
    }

}
