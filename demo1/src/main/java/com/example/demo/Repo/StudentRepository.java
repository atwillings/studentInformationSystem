package com.example.demo.Repo;

import com.example.demo.Model.ClassData;
import com.example.demo.Model.Classes;
import com.example.demo.Model.Student;

import java.util.List;
import java.util.Map;

public interface StudentRepository {


    int createStudent(Student student);

    int update(Student student);



    Student findByID(int id);

    List<Student> findAll();

    int deleteByID(int id);

    List<Classes> getClass (int studentID);

    ClassData getClassData(int classID);
}
