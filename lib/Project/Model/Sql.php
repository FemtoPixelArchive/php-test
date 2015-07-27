<?php
namespace Project\Model;

use \Project\Mock\Sql as Mock;
use \Project\Interfaces\AnswerSql;

final class Sql extends \Framework\Model
{
    private $answer;

    public function getDate()
    {
        return $this->getDb()->execute("SELECT NOW() as date");
    }

    public function setAnswer(AnswerSql $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    /**
     * @return Mock|AnswerSql
     */
    public function getAnswer()
    {
        if (!$this->answer) {
            return new Mock;
        }
        return $this->answer;
    }

    public function getQuestionOne($name)
    {
        if ($this->getAnswer() instanceof Mock) {
            return array();
        }
        return $this->getDb()->execute($this->getAnswer()->getQuestionOne($name));
    }

    public function getQuestionTwo($name)
    {
        if ($this->getAnswer() instanceof Mock) {
            return array();
        }
        return $this->getDb()->execute($this->getAnswer()->getQuestionTwo($name));
    }

    public function getQuestionThree($name)
    {
        if ($this->getAnswer() instanceof Mock) {
            return array();
        }
        return $this->getDb()->execute($this->getAnswer()->getQuestionThree($name));
    }

    public function getQuestionFour($name)
    {
        if ($this->getAnswer() instanceof Mock) {
            return array();
        }
        return $this->getDb()->execute($this->getAnswer()->getQuestionFour($name));
    }

    public function getQuestionFive($name)
    {
        if ($this->getAnswer() instanceof Mock) {
            return array();
        }
        return $this->getDb()->execute($this->getAnswer()->getQuestionFive($name));
    }
}
