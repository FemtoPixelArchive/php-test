<?php
namespace Project\Interfaces;


interface QuestionTwo extends QuestionThree
{
    /**
     * Should return a query string to retrieve when is the last course of the week for a student by its name
     * Formatted as 'jour' => $value, 'heure' => $value
     * @return string
     */
    public function getQuestionTwo($name);
}
