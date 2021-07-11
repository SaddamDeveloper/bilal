<?php

namespace App\Rules;

use App\Models\UserBalance;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TransferAmountValidation implements Rule
{
    public $user;
    public $currencyId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user, $currencyId)
    {
        $this->user = $user;
        $this->currencyId = $currencyId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $isUserBalanceEnough = UserBalance::where('currency_id', $this->currencyId)->where('user_id', $this->user->id)->where('amount', '>=', $value)->first();

        if ($isUserBalanceEnough && $value > 0) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is invalid.';
    }
}
