package com.example.demo.Repo;


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
    public int create(Student student) {
        return template.update("INSERT INTO students (id, name) VALUES(?,?)",
                student.getId(), student.getName());
    }

    @Override
    public int update(Student student) {
        return template.update("UPDATE students SET id = ?, name = ? WHERE id = ?",
                student.getId(), student.getName());
    }

    @Override
    public Student findByID(int id) {
        try {
            Student student = template.queryForObject("SELECT * FROM students WHERE id = ?",
                    BeanPropertyRowMapper.newInstance(Student.class), id);
            return student;
        }
        catch (Exception e) {
            return null;
        }
    }

    @Override
    public List<Student> findAll() {
        return template.query("SELECT * FROM students",BeanPropertyRowMapper.newInstance(Student.class) );
    }

    @Override
    public int deleteByID(int id) {
        return template.query()
    }
}
