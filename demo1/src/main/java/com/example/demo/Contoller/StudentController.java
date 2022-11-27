package com.example.demo.Contoller;

import com.example.demo.Model.Classes;
import com.example.demo.Model.Student;

import com.example.demo.Repo.StudentRepository;

import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.util.MultiValueMap;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;
import java.util.Map;


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
            repository.createStudent(new Student(student.getStudentID(), student.getStudentName()));
            return new ResponseEntity<>("[CREATION]" + student.getStudentName() + " was created.", HttpStatus.OK);
        } catch (Exception e) {
            System.out.println("[CREATION FAILED] " + student.getStudentName() + " failed to create.");
            return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }


    @GetMapping("/students/{id}/classes")
    public ResponseEntity<List<Classes>> getClasses(@PathVariable("id") int id) {
       List<Classes> list = repository.getClass(id);

        for (Classes classes: list) {
            System.out.println("[RETRIEVE] " + classes.toString());
        }

        return new ResponseEntity<List<Classes>> ( repository.getClass(id), HttpStatus.OK);
    }
}


