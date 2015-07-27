<?php
namespace Project\Interfaces;


interface QuestionFour extends QuestionFive
{
    /**
     * Should return a query string to retrieve how many hours in each course a teacher give by week
     * Formatted as 'matiere' => $value, "heures" => $value
     * @return string
     */
    public function getQuestionFour($name);
}
