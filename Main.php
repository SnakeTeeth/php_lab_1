<?php

namespace php_lab1;

use Exception;

require_once('Employee.php');
require_once('Department.php');

function main(){
    //check_employees();
    check_department();
}

function emp_creation(int $id, string $name, int $salary, string $hire_date){
    try{
        return new Employee($id, $name, $salary, $hire_date);
    } catch (Exception $e){
        echo $e;
    }
}

function check_employees(){


    //$empl1 = emp_creation(1, "Tom", "999", "12.3.2023");
    /*Wrong name*/
    //$empl2 = emp_creation(2, "VeryLongNAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAME", "999", "12.3.2023");
    //$empl3 = emp_creation(3, "Tom", "9a9", "12.3.2023");
    //$empl4 = emp_creation(4, "Tom", "999", "12/3/2023");
    //$empl5 = emp_creation(5, "Tom", "999", "33/3/2023");
}

function check_department(){
    $empls1 = array();
    for ($i = 0; $i < 1; $i++) {
        $empls1[$i] = new Employee($i, "Tom", "2000", "12.3.2023");
    }

    $empls2 = array();
    for ($i = 0; $i < 2; $i++) {
        $empls2[$i] = new Employee($i, "Bob", "1000", "12.3.2023");
    }

    $empls3 = array();
    for ($i = 0; $i < 3; $i++) {
        $empls3[$i] = new Employee($i, "Biba", "0", "12.3.2023");
    }

    $departments = array();
    $departments[0] = new Department("SameSalary1", $empls1);
    $departments[1] = new Department("SameSalary2", $empls2);
    $departments[2] = new Department("MorePeople", $empls3);

    Department::filter_max_salary($departments);
    Department::filter_min_salary($departments);
    Department::filter_same_salary($departments);

}
main();