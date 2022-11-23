<?php

namespace App\date;

use DateTime;

class Month {

    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    public $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    public $month;
    public $year;

    /**
     * Month constructor
     * @param $month / mois compris entre et 12
     * @param $year / l'année
     * @throws \Exception
     */
    public function __construct(?int $month = null, ?int $year = null)
    {
        if ($month === null){
            $month = intval(date('m'));
        }
        if ($year === null){
            $year = intval(date('Y'));
        }
        if ($month < 1 || $month > 12){
            throw new \Exception("Le mois $month n'est pas valide.");
        }
        if ($year < 1970){
            throw new \Exception("L'année est inférieure à 1970.");
        }
        $this->month = $month;
        $this->year = $year;
        
    }
    /**
     * Renvoie le 1er jour du mois
     * @return DateTime
     */
    public function getStartingDay()
    {
        return new \DateTime("{$this->year}-{$this->month}-01");
    }

    /**
     * Retourne le mois en français
     * @return string
     */
    public function toString()
    {
        return $this->months[$this->month - 1].' '. $this->year;
    }

    /**
     * Renvoie le nombre de semaine dans le mois en cours
     * @return int
     */
    public function getWeeks()
    {
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month - 1 day');
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;
        if ($weeks < 0){
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }

    public function withinMonth($date)
    {
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

    /**
     * Renvoie le mois suivant, et renvoie l'année suivante si mois en décembre...
     * @return Month
     */
    public function nextMonth()
    {
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > 12){
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    /**
     * Renvoie le mois précédent, et renvoie l'année précédente si mois en janvier...
     * @return Month
     */
    public function previousMonth()
    {
        $month = $this->month - 1;
        $year = $this->year;
        if ($month <= 0){
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }
}