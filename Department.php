<?php

namespace php_lab1;

class Department
{
    static public function filter_max_salary($departments){
        $min_salary = PHP_INT_MAX;
        $max_salary = PHP_INT_MIN;
        foreach ($departments as $dep){
            if ($dep instanceof Department){
                $dep_salary = $dep->get_salary_in_department();
                if ($dep_salary < $min_salary){
                    $min_salary = $dep_salary;
                }
                if ($dep_salary > $max_salary){
                    $max_salary = $dep_salary;
                }
            } else {
                return;
            }
        }
        echo "\tMax salary departments:\n";
        foreach ($departments as $dep){
            if ($dep instanceof Department){
                $dep_salary = $dep->get_salary_in_department();
                if ($dep_salary == $max_salary){
                    $dep->print_info();
                }
            } else{
                return;
            }
        }
    }

    static public function filter_min_salary($departments){
        $min_salary = PHP_INT_MAX;
        $max_salary = PHP_INT_MIN;
        foreach ($departments as $dep){
            if ($dep instanceof Department){
                $dep_salary = $dep->get_salary_in_department();
                if ($dep_salary < $min_salary){
                    $min_salary = $dep_salary;
                }
                if ($dep_salary > $max_salary){
                    $max_salary = $dep_salary;
                }
            } else {
                return;
            }
        }
        echo "\tMin salary departments:\n";
        foreach ($departments as $dep) {
            if ($dep instanceof Department) {
                $dep_salary = $dep->get_salary_in_department();
                if ($dep_salary == $min_salary) {
                    $dep->print_info();
                }
            } else {
                return;
            }
        }
    }

    static public function filter_same_salary($departments){
        $min_salary = PHP_INT_MAX;
        $max_salary = PHP_INT_MIN;
        foreach ($departments as $dep){
            if ($dep instanceof Department){
                $dep_salary = $dep->get_salary_in_department();
                if ($dep_salary < $min_salary){
                    $min_salary = $dep_salary;
                }
                if ($dep_salary > $max_salary){
                    $max_salary = $dep_salary;
                }
            } else {
                return;
            }
        }
        echo "\tDepartments with same salary or Department with more people\n";
        for ($i = 0; $i < sizeof($departments); $i++) {
            $isPrintDepByI = false;
            for ($j = $i + 1; $j < sizeof($departments); $j++) {
                if($departments[$i]->get_salary_in_department()
                    == $departments[$j]->get_salary_in_department()){
                    if(sizeof($departments[$i]->get_employees() )
                        > sizeof($departments[$j]->get_employees())){
                        $isPrintDepByI = true;
                    } else if (sizeof($departments[$i]->get_employees())
                        < sizeof($departments[$j]->get_employees())) {
                        $departments[$j]->print_info();
                    } else {
                        $isPrintDepByI = true;
                        $departments[$j]->print_info();
                    }
                }
            }
            if ($isPrintDepByI){
                $departments[$i]->print_info();
            }
        }
    }

    private array $employees = array();
    private string $name;


    public function __construct($name, $employees)
    {
        $this->name = $name;
        $this->employees = $employees;
    }

    public function get_salary_in_department(): int
    {
        $total = 0;
        foreach ($this->employees as $employee) {
            $total += $employee->get_salary();
        }
        return $total;
    }

    public function print_info(): void
    {
        echo "Department " . $this->name . "\n";
        echo "Employees:" . "\n";
        foreach ($this->employees as $employee) {
            $employee->print_info();
        }
        echo "Count of people: " . sizeof($this->employees) . "\n\n";
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
     * @return array
     */
    public function get_employees(): array
    {
        return $this->employees;
    }

    /**
     * @param array $employees
     */
    public function set_employees(array $employees): void
    {
        $this->employees = $employees;
    }

}