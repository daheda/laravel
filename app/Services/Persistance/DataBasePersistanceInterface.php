<?php
declare(strict_types=1);

namespace App\Services\Persistance;


use App\Models\CreditCard;
use App\Models\UserAccount;

interface DataBasePersistanceInterface
{
    public static function persist(UserAccount $userAccount, CreditCard $creditCard):void;
}
