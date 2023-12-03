<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ViewOrganization extends Model
{
    use HasFactory;

    protected $table = 'view_organizations';

    public function getOrderableFields(): array
    {
        return ['id', 'title'];
    }
}
