package com.example.demo.Repo;


import com.example.demo.Model.ClassData;
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


    @Override
    //student.create(new student)
    public int createStudent(Student student) {
        return template.update("INSERT INTO student (studentID, studentName) VALUES(?,?)",
                student.getStudentID(), student.getStudentName());
    }

    @Override
    //update specific student
    public int update(Student student) {
        return template.update("UPDATE student SET studentID = ? WHERE studentID = ?",
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
    public List<Classes> getClass(int studentID) {
        System.out.println("SELECT studentClassGrades WHERE studentID = " + studentID);
        //return classes
        return template.query("SELECT * FROM studentclassgrade WHERE studentID = ?",
                BeanPropertyRowMapper.newInstance(Classes.class), studentID);
    }

    @Override
    public ClassData getClassData(int classID) {
        return template.queryForObject("SELECT * FROM class WHERE classID = ?", BeanPropertyRowMapper.newInstance(ClassData.class), classID);
    }
}


