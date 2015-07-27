<?php
namespace Project\Interfaces;


interface QuestionFive
{
    /**
     * Should return a query string to retrieve name, firstname, course that shares a course with a given teacher's name
     * Formatted as 'matiere' => $value, "nom" => $value, "prenom" => $value
     * @return string
     */
    public function getQuestionFive($name);
}
