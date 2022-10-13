<?php

namespace App\Console\Commands;

use App\Models\Skill;
use App\Models\SkillMinimumRate;
use App\Models\SkillSpeciality;
use App\Models\SkillSubSpeciality;
use App\Models\User;
use App\Models\UserSkillScore;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        //test relationship
        // dd(Skill::with('skill_specialities')->get(['id']));
        // dd(SkillSpeciality::with('skill')->get());

        // dd(SkillSpeciality::with('skill_sub_specialities')->get(['id']));
        // dd(SkillSubSpeciality::with('skill_speciality')->get());

        // dd(SkillMinimumRate::with('skill')->get());
        // dd(Skill::with('skill_minimum_rate')->get());

        // dd(User::with('user_skill_scores')->get());
        // dd(Skill::with('user_skill_scores')->get());

        // dd(UserSkillScore::with('user', 'skill')->get());
        
        

    }
}
