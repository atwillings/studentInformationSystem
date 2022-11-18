package com.example.demo.Repo;


import com.example.demo.Model.Classes;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.BeanPropertyRowMapper;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import java.util.List;
import com.example.demo.Model.Student;

@Repository
public class StudentJdbcRepo implements StudentRepository {

    @Autowired
    private JdbcTemplate template;

    public void setJdbcTemplate(JdbcTemplate jdbcTemplate) {
        this.template = jdbcTemplate;
    }

    @Override
    //student.create(new student)
    public int create(Student student) {
        return template.update("INSERT INTO Student (studentID, studentName) VALUES(?,?)",
                student.getStudentID(), student.getStudentName());
    }

    @Override
    //update specific student
    public int update(Student student) {
        return template.update("UPDATE Student SET studentID = ?, studentID = ? WHERE studentID = ?",
                student.getStudentID(), student.getStudentName());
    }

    @Override
    public Student findByID(int id) {
        try {
            System.out.println("SELECT * FROM student WHERE studentID = " + id);
            return template.queryForObject("SELECT * FROM Student WHERE studentID = ?",
                    BeanPropertyRowMapper.newInstance(Student.class), id);
        } catch (Exception e) {
            return null;
        }
    }

    @Override
    public List<Student> findAll() {
        System.out.println("SELECT * FROM STUDENT");
        return template.query("SELECT * FROM Student", BeanPropertyRowMapper.newInstance(Student.class));
    }

    @Override
    public int deleteByID(int id) {
        return template.update("DELETE FROM Student WHERE studentID = ?", id);
    }

    @Override
    public Classes getClass(int studentID) {
        return template.queryForObject("SELECT class FROM student WHERE studentID = ?",BeanPropertyRowMapper.newInstance(Classes.class), studentID);

    }

}

