<?php

namespace App\Domain\Http\Actions\API\v1\Organization\Listing;

use Illuminate\Support\Facades\Pipeline;
use App\Domain\Http\DTO\Organization\ListOrganizationParams;
use App\Domain\Http\Actions\API\v1\Organization\Listing\Stages\OrderBy;
use App\Domain\Http\Actions\API\v1\Organization\Listing\Stages\Paginate;
use App\Domain\Http\Actions\API\v1\Organization\Listing\Stages\FilterByTitle;
use App\Domain\Http\Actions\API\v1\Organization\Listing\Stages\FilterByActive;
use App\Domain\Http\Actions\API\v1\Organization\Listing\Stages\CreateViewOrganizationInstance;

class ListingPipeline
{
    public function execute(ListOrganizationParams $dto)
    {
        $state = new ListingState($dto);

        $stages = [
            CreateViewOrganizationInstance::class,
            FilterByTitle::class,
            FilterByActive::class,
            OrderBy::class,
            Paginate::class
        ];

        return Pipeline::send($state)
            ->through($stages)
            ->then(fn(ListingState $state) => $state->getResult());
    }
}
