<?php
namespace Project\Interfaces;


interface QuestionThree extends QuestionFour
{
    /**
     * Should return a query string to retrieve course name for the fist course of the week for a student by its name
     * Formatted as 'matiere' => $value
     * @return string
     */
    public function getQuestionThree($name);
}
