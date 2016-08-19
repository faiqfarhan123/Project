<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AgeGroup::create(array('age'=>'Everyone welcome'));
	\App\AgeGroup::create(array('age'=>'25+'));
	\App\AgeGroup::create(array('age'=>'24+'));
	\App\AgeGroup::create(array('age'=>'23+'));
	\App\AgeGroup::create(array('age'=>'22+'));
	\App\AgeGroup::create(array('age'=>'21+'));
	\App\AgeGroup::create(array('age'=>'20+'));
	\App\AgeGroup::create(array('age'=>'19+'));
	\App\AgeGroup::create(array('age'=>'18+'));

	\App\EventType::create(array('name' => 'Conference'));
	\App\EventType::create(array('name' => 'Seminar'));
	\App\EventType::create(array('name' => 'Meeting'));
	\App\EventType::create(array('name' => 'Business Dinner'));
	\App\EventType::create(array('name' => 'Press Conference'));
	\App\EventType::create(array('name' => 'Opening Ceremony'));
	\App\EventType::create(array('name' => 'Award Ceremony'));
	\App\EventType::create(array('name' => 'Wedding'));
	\App\EventType::create(array('name' => 'Birthday'));
	\App\EventType::create(array('name' => 'Wedding Anniversary'));
	\App\EventType::create(array('name' => 'Family Event'));

	\App\EventCategory::create(array('name' => 'Arts'));
	\App\EventCategory::create(array('name' => 'Music'));
	\App\EventCategory::create(array('name' => 'Concert'));
	\App\EventCategory::create(array('name' => 'Comedy'));
	\App\EventCategory::create(array('name' => 'Festival'));
	\App\EventCategory::create(array('name' => 'Social'));
	\App\EventCategory::create(array('name' => 'Party'));
	\App\EventCategory::create(array('name' => 'Theater'));
	\App\EventCategory::create(array('name' => 'Nightclub'));
	\App\EventCategory::create(array('name' => 'Ceremony'));
	\App\EventCategory::create(array('name' => 'Sports'));
	\App\EventCategory::create(array('name' => 'Religious'));
	\App\EventCategory::create(array('name' => 'Startup'));
	\App\EventCategory::create(array('name' => 'Education'));
	\App\EventCategory::create(array('name' => 'Performance'));
    }
}