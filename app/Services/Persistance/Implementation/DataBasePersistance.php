<?php


namespace App\Services\Persistance\Implementation;


use App\Models\CreditCard;
use App\Models\UserAccount;
use Illuminate\Support\Facades\DB;

class DataBasePersistance
{
    public static function persist(UserAccount $userAccount, CreditCard $creditCard): void
    {
        DB::transaction(function () use ($userAccount, $creditCard){
            $userAccount->save();
            $creditCard->userAccount()->associate($userAccount);
            $creditCard->save();
        });
    }
}
