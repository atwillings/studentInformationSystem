package com.example.demo.Repo;

import com.example.demo.Model.ClassData;
import com.example.demo.Model.Classes;
import com.example.demo.Model.Student;
import com.example.demo.Model.Teacher;
import org.springframework.jdbc.core.BeanPropertyRowMapper;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

@Repository
public class EmployeeJdbcRepo implements EmployeeRepository {

    private JdbcTemplate template;

    @Override
    public int createEmployee(Teacher employee) {
        return 0;
    }

    @Override
    public int updateEmployee(Teacher employee) {
        return 0;
    }

    @Override
    public int deleteByID(int id) {
        return 0;
    }

    @Override
    public Teacher findByID(int id) {
        return template.queryForObject("SELECT * FROM employee.teacher WHERE TeacherID = ?", BeanPropertyRowMapper.newInstance(Teacher.class), id);
    }

    @Override
    public int updateGrade(int studentID, int employeeID, int classID, char grade) {
        ClassData classes = template.queryForObject("SELECT * FROM students.class WHERE ClassID = ?", BeanPropertyRowMapper.newInstance(ClassData.class), classID);

        if (classes.getTeacherID() == employeeID) {
            template.update("UPDATE studentclassgrade SET Grade = ? WHERE studentID = ? AND ClassID = ?", grade, studentID, classes.getClassID());
        }
        return 0;


    }
}
