package com.example.demo.Repo;

import com.example.demo.Model.Employee;
import com.example.demo.Model.Student;

import java.util.List;

public interface EmployeeRepository {
    int createEmployee(Employee employee);

    int updateEmployee(Employee employee);

    Employee findByID(int id);

    List<Employee> findAll();

    int deleteByID(int id);

    int updateGrade(Student student);
}
