<?php

namespace php_lab1;

use DateInterval;
use DateTime;
use ErrorException;

class Employee
{
    public function __construct(private int $id, private string $name, private int $salary, private string $hire_date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->hire_date = $hire_date;
        $this->validation();
    }

    public function get_experience(): string
    {
        $buff_hire_date = DateTime::createFromFormat('d.m.Y', $this->hire_date);;
        $current_date = new DateTime();
        return $buff_hire_date->diff($current_date)->format("%Y");
    }

    private function validate_name(): bool
    {
        if (!preg_match("/^(([a-zA-Z' -]{1,30})|([а-яА-Я' -]{1,30}))$/u", $this->name)) {
            return false;
        }
        return true;
    }

    private function validate_salary(): bool
    {
        if (!(preg_match("|^[\d]*$|", $this->salary) && (is_numeric($this->salary)))) {
            return false;
        }
        return true;
    }

    private function validate_date(): bool
    {
        $date = preg_replace('/[^0-9\.]/u', '', trim($this->hire_date));
        $test_data_ar = explode('.', $date);

        if (@checkdate($test_data_ar[1], $test_data_ar[0], $test_data_ar[2])) {
            return true;
        }
        return false;
    }

    /**
     * @throws ErrorException
     */
    private function validation()
    {
        if (!$this->validate_name()) {
            throw new ErrorException("Wrong name: " . $this->name);
        }
        if (!$this->validate_salary()) {
            throw new ErrorException("Wrong salary: " . $this->salary);
        }
        if (!$this->validate_date()) {
            throw new ErrorException("Wrong date: " . $this->hire_date);
        }
    }

    public function print_info() : void
    {
        echo "\tEmployee id: " . $this->id . "\n";
        echo "\t\tname: " . $this->name . "\n";
        echo "\t\tsalary: " . $this->salary . "\n";
        echo "\t\thire date: " . $this->hire_date . "\n";
        echo "\t\twork experience: " . $this->get_experience() . "\n";
    }

    /**
     * @return int
     */
    public function get_id(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function set_id(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function get_name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function set_name(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function get_salary(): int
    {
        return $this->salary;
    }

    /**
     * @param int $salary
     */
    public function set_salary(int $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function get_hire_date(): string
    {
        return $this->hire_date;
    }

    /**
     * @param string $hire_date
     */
    public function set_hire_date(string $hire_date): void
    {
        $this->hire_date = $hire_date;
    }

}