<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Overtimes;

class OvertimeEndDateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($date, $timeended, $employee_id)
    {
        //

        $this->date = $date;
        $this->timeended = $timeended;
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

        $existing_times = Overtimes::where([['employee_id', $this->employee_id], ['date', $this->date]])->first()->time_ended;

        if($existing_times >= $this->timeended)
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
        return 'Entry ended time are between existing overtime request';
    }
}
