package com.example.demo.Repo;

import com.example.demo.Model.Teacher;

public interface EmployeeRepository {
    int createEmployee(Teacher employee);

    int updateEmployee(Teacher employee);

    int deleteByID(int id);

    Teacher findByID(int id);

    int updateGrade(int studentID, int employeeID, int classID,char grade);
}
