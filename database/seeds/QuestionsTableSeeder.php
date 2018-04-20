<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voids
     */
    public function run()
    {
        DB::table('questions')->truncate();

        $user_names = array('Vasya', 'Petya', 'Женя', 'Катя');
        $user_emails = array('Vasya@ya.ru', 'Petya@gmail.com', 'jen@yandex.com', 'katya@sdfsdf.com');

        Question::create(['status'=>1,'question'=>'Какого ...?','category_id'=>rand(1,6), 'user_name'=>$user_names[rand(0,3)], 'user_email'=>$user_emails[rand(0,3)], 'response'=>'Конечно, окна бывают - пластиковые, деревянные, металлопластиковые. О таких вещах, как: установка окон Вы можете прочитать в специальных разделах. Мы продаем: пластиковые окна и еще множество других товаров. Производство — один из видов деятельности организации, направленный на изготовление конечного продукта или услуги. Потребление является целью производства лишь во внерыночных системах хозяйства. Наше производственное предприятие выполняет производство пластиковых окон и не только. ']);
        Question::create(['status'=>1,'question'=>'Где вообще..?','category_id'=>rand(1,6), 'user_name'=>$user_names[rand(0,3)], 'user_email'=>$user_emails[rand(0,3)], 'response'=>'Разработка алгоритма моя:), аналогов Вы не найдете, уже при нескольких десятках общетематических шаблонов возможна генерация уникальных ЧИТАЕМЫХ статей до 5000 символов. По вопросам сотрудничества или приобретения алгоритма - свяжитесь со мной']);
        Question::create(['question'=>'Как правильно..?','category_id'=>rand(1,6), 'user_name'=>$user_names[rand(0,3)], 'user_email'=>$user_emails[rand(0,3)]]);
        Question::create(['question'=>'С чего вдруг..?','category_id'=>rand(1,6), 'user_name'=>$user_names[rand(0,3)], 'user_email'=>$user_emails[rand(0,3)]]);
        Question::create(['question'=>'Смысл..?','category_id'=>rand(1,6), 'user_name'=>$user_names[rand(0,3)], 'user_email'=>$user_emails[rand(0,3)]]);
        Question::create(['question'=>'Зачем..?','category_id'=>rand(1,6), 'user_name'=>$user_names[rand(0,3)], 'user_email'=>$user_emails[rand(0,3)]]);
    }
}
