<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->delete();
        DB::table('questions')->insert(array(
            array(
                'question_no' => 1,
                'question_name' => 'what does html stands for?',
                'question_answer1' => 'hyper text markup language',
                'question_answer2' => 'hyper links markup language',
                'question_answer3' => 'hyper tool markup language',
                'correct_answer'   => 'hyper text markup language',
                'exam_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 2,
                'question_name' => 'Choose the correct HTML element for the largest heading:',
                'question_answer1' => 'h6',
                'question_answer2' => 'h3',
                'question_answer3' => 'h1',
                'correct_answer'   => 'h1',
                'exam_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 3,
                'question_name' => 'What is the correct HTML element for inserting a line break?',
                'question_answer1' => '<lb>',
                'question_answer2' => '<br>',
                'question_answer3' => '<b>',
                'correct_answer'   => '<br>',
                'exam_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 4,
                'question_name' => 'Choose the correct HTML element to define important text',
                'question_answer1' => '<i>',
                'question_answer2' => '<b>',
                'question_answer3' => '<strong>',
                'correct_answer'   => '<strong>',
                'exam_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 5,
                'question_name' => 'Which character is used to indicate an end tag?',
                'question_answer1' => '/',
                'question_answer2' => '>',
                'question_answer3' => '<',
                'correct_answer'   => '/',
                'exam_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 6,
                'question_name' => 'How can you make a numbered list?',
                'question_answer1' => 'ul',
                'question_answer2' => 'li',
                'question_answer3' => 'ol',
                'correct_answer'   => 'ol',
                'exam_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 1,
                'question_name' => 'What does CSS stand for?',
                'question_answer1' => 'colorful style sheets',
                'question_answer2' => 'cascading style sheets',
                'question_answer3' => 'creative style sheets',
                'correct_answer'   => 'cascading style sheets',
                'exam_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 2,
                'question_name' => 'Which HTML tag is used to define an internal style sheet?',
                'question_answer1' => '<css>',
                'question_answer2' => '<script>',
                'question_answer3' => '<style>',
                'correct_answer'   => '<style>',
                'exam_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 3,
                'question_name' => 'Which HTML attribute is used to define inline styles?',
                'question_answer1' => 'font',
                'question_answer2' => 'style',
                'question_answer3' => 'class',
                'correct_answer'   => 'style',
                'exam_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 4,
                'question_name' => 'Which property is used to change the background color?',
                'question_answer1' => 'bgcolor',
                'question_answer2' => 'color',
                'question_answer3' => 'background-color',
                'correct_answer'   => 'background-color',
                'exam_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            array(
                'question_no' => 5,
                'question_name' => 'Which CSS property is used to change the text color of an element?',
                'question_answer1' => 'text-color',
                'question_answer2' => 'color',
                'question_answer3' => 'background-color',
                'correct_answer'   => 'text-color',
                'exam_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ),
            
        ));
    }
}
