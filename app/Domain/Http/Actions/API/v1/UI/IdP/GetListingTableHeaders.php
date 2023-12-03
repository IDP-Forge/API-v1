<?php

namespace App\Domain\Http\Actions\API\v1\UI\IdP;

class GetListingTableHeaders
{
    protected array $response = [];

    public function execute(): self
    {
        $this->response = [
            [
                'align' => 'start',
                'key' => 'id',
                'sortable' => true,
                'title' => 'ID'
            ],

            [
                'align' => 'start',
                'key' => 'is_default',
                'sortable' => true,
                'title' => 'Default IdP'
            ],

            [
                'align' => 'start',
                'key' => 'protocol_title',
                'sortable' => true,
                'title' => 'Protocol'
            ],

            [
                'align' => 'start',
                'key' => 'title',
                'sortable' => true,
                'title' => 'Title'
            ],

            [
                'align' => 'start',
                'key' => 'description',
                'sortable' => false,
                'title' => 'Description'
            ],

            [
                'key' => 'actions',
                'align' => 'center',
                'title' => 'Actions'
            ],
        ];


        return $this;
    }

    public function getResponse(): array
    {
        return $this->response;
    }
}
