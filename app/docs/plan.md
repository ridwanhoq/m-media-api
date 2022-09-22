## Tables

>> skills [programming] (b)
    >> title
    >> description [nullable]
    >> is_active (default:1)
    
>> skill_specialities [php] (1-#)
    >> skill_id
    >> title 
    >> description [nullable]
    >> is_active (default:0)

>> skill_sub_specialities [laravel] (1-#)
    >> skill_speciality_id
    >> title
    >> description [nullable]
    >> is_active (default:0)


>> skill_minimum_rates
    >> skill_id
    >> skill_score (default:1)
    >> minimum_rate_per_minute

>> user_skill_scores (1-#)
    >> user_id
    >> skill_id
    >> skill_score [setting model]

>> user_skill_speciality_scores (1-#)
    >> user_id
    >> skill_speciality_id
    >> skill_score [setting model]

>> user_skill_sub_speciality_scores (1-#)
    >> user_id
    >> skill_sub_speciality_id
    >> skill_score [setting model]
    
-------------
>> user_deposits (1-#)
    >> user_id
    >> amount

>> user_withdrawls (1-#)
    >> user_id
    >> amount

>> user_balances (1-1)
    >> user_id
    >> balance

>> user_transactions (b)
    >> user_id
    >> amount
--------------
>> tasks (b)
    >> title
    >> description [nullable]
    >> hours_to_finish [0, 23]
    >> minutes_to_finish [5, 59]//if hour 0 then it's minimum 5 otherwise 0
    >> positions [minimum:1]
    >> rate [minimum:as_per_pre_defined_minimum]

>> task_statuses (1-1)
    >> task_id
    >> status

>> task_reveiws (1-#)
    >> task_id
    >> reveiw [from setting model]
    >> description

>> task_minimum_skils (#-#)
    >> task_id
    >> skill_id
    >> minimum_score
>> 

---------------------------------------------------------------------