<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Registration;

final readonly class RegistrationMutation
{
    /** @param  array{}  $args */
    public function restore($_, array $args)
    {
        $registration = Registration::withTrashed()
            ->findOrFail($args['id']);

        $registration->restore();

        return $registration;
    }

    public function withTrash($_, array $args)
    {
        return Registration::withTrashed()->get();
    }

    public function onlyTrash($_, array $args)
    {
        return Registration::onlyTrashed()->get();
    }

    public function forceDelete($_, array $args)
    {
        $registration = Registration::withTrashed()
            ->findOrFail($args['id']);

        $registration->forceDelete();
    }
    
}
