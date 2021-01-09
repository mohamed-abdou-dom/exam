<?php

use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exams')->delete();
        DB::table('exams')->insert(array(
            array(
                'exam_name' => 'html',
                'total_result' => 100,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'exam_name' => 'css',
                'total_result' => 100,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
        ));
    }
}
