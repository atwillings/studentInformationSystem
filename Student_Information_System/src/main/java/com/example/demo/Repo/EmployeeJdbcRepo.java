package com.example.demo.Repo;

import com.example.demo.Model.Employee;
import com.example.demo.Model.Student;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public class EmployeeJdbcRepo implements EmployeeRepository {

    private JdbcTemplate template;

    @Override
    public int createEmployee(Employee employee) {
        return 0;
    }

    @Override
    public int updateEmployee(Employee employee) {
        return 0;
    }

    @Override
    public Employee findByID(int id) {
        return null;
    }

    @Override
    public List<Employee> findAll() {
        return null;
    }

    @Override
    public int deleteByID(int id) {
        return 0;
    }

    @Override
    public int updateGrade(Student student) {
        return 0;
    }
}
