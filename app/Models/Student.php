<?php

namespace App\Models;

use App\Models\Relations\StudentRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class Student extends User
{
    use HasParent;
    use HasFactory;
    use StudentRelations;
}
