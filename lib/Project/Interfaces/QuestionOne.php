<?php
namespace Project\Interfaces;


interface QuestionOne extends QuestionTwo
{
    /**
     * Should return a query string to retrieve all courses given for a teacher by its name
     * Formatted as 'matiere' => $value
     * @return string
     */
    public function getQuestionOne($name);
}
