<?php

namespace App\Jobs;

use App\Models\CreditCard;
use App\Models\UserAccount;
use App\Services\Handler\DataHelperTrait;
use App\Services\Persistance\Implementation\DataBasePersistance;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AccountProcess implements ShouldQueue
{
    use DataHelperTrait, Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array chunk
     */
    protected $chunks;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $chunks)
    {
        $this->chunks = $chunks;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->chunks as $chunk) {
            $crediCardData = $chunk['credit_card'];
            unset($chunk['credit_card']);
            $userAccount = new UserAccount();
            $userAccount->fill($this->formatDate($chunk, ['date_of_birth']));

            $crediCard =new CreditCard();
            $crediCard->fill($crediCardData);
            print_r($crediCardData);
            DataBasePersistance::persist($userAccount, $crediCard);
        }
    }
}
