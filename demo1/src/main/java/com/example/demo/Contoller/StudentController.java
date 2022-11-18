package com.example.demo.Contoller;

import com.example.demo.Model.Classes;
import com.example.demo.Model.Student;

import com.example.demo.Repo.StudentRepository;

import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;


@CrossOrigin(origins = "http://localhost")
@RestController
@RequestMapping("/api")


public class StudentController {


    @Autowired
    StudentRepository repository;


    @GetMapping("/students")
    public ResponseEntity<List<Student>> findStudents() {
        List<Student> students = new ArrayList<Student>(repository.findAll());

        if (!students.isEmpty()) {
            for (Student student : students) {
                System.out.println("[RETURNING] " + student.toString());
            }
            System.out.println("--------------------------------------");

        }

        if (students.isEmpty()) {
            System.out.println("[ERROR] No students found??? WTFFF");
            return new ResponseEntity<>(HttpStatus.NO_CONTENT);
        }
        return new ResponseEntity<>(students, HttpStatus.OK);
    }

    @GetMapping("/students/{id}")
    public ResponseEntity<Student> getStudentByID(@PathVariable String id) {
        Student student = repository.findByID(Integer.parseInt(id));

        if (student != null) {
            System.out.println("[RETURNING]: " + student.toString());
            System.out.println("--------------------------------------");
            System.out.println();
            return new ResponseEntity<>(student, HttpStatus.OK);
        } else {
            System.out.println("[ERROR]: Student " + id + " not found.");
            System.out.println("--------------------------------------");
            System.out.println();
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }

    @PostMapping("/students")
    public ResponseEntity<String> createStudent(@RequestBody Student student) {
        try {
            repository.create(new Student(student.getStudentID(), student.getStudentName()));
            return new ResponseEntity<>("[CREATION]" + student.getStudentName() + " was created.", HttpStatus.OK);
        } catch (Exception e) {
            System.out.println("[CREATION FAILED] " + student.getStudentName() + " failed to create.");
            return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }

    @PutMapping("/students/{id}")
    public ResponseEntity<String> updateStudent(@PathVariable("id") int id, @RequestBody Student student) {
        Student fetchStudent = repository.findByID(id);

        if (fetchStudent != null) {
            fetchStudent.setStudentID(id);
            fetchStudent.setStudentName(student.getStudentName());
            repository.update(fetchStudent);
            return new ResponseEntity<>("[UPDATE] " + fetchStudent.getStudentName() + " was updated.", HttpStatus.OK);
        } else {
            return new ResponseEntity<>("[ERROR] " + student.getStudentName() + " was not found.", HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }
    @GetMapping("/students/{id}/classes")
    public ResponseEntity<Classes> getClasses(@PathVariable("id") int id) {
        Student fetchStudent = repository.findByID(id);
        if (fetchStudent != null) {

            return new ResponseEntity<>(repository.getClass(id), HttpStatus.OK);
        }
        return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
    }
}


