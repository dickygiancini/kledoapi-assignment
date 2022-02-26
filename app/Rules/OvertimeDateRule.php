<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Overtimes;

class OvertimeDateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($date, $timestarted, $employee_id)
    {
        //
        $this->date = $date;
        $this->timestarted = $timestarted;
        $this->employee_id = $employee_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if(Overtimes::where('employee_id', $this->employee_id)->doesntExist())
        {
            return true;
        }

        if(Overtimes::where([['employee_id', $this->employee_id], ['date', $this->date]])->doesntExist())
        {
            return true;
        }

        $existing_times = Overtimes::where([['employee_id', $this->employee_id], ['date', $this->date]])->first()->time_started;

        if($existing_times <= $this->timestarted)
        {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Entry starting time are between existing overtime request';
    }
}
