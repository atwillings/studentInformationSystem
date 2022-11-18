package com.example.demo.Repo;

import com.example.demo.Model.Classes;
import com.example.demo.Model.Student;

import java.util.List;

public interface StudentRepository {
    int create(Student student);

    int update(Student student);

    Student findByID(int id);

    List<Student> findAll();

    int deleteByID(int id);

    Classes getClass (int studentID);
}
