package com.example.demo.Contoller;

import com.example.demo.Model.Student;

import com.example.demo.Repo.StudentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.Collection;
import java.util.List;


@CrossOrigin(origins = "http://localhost:3306")
@RestController
@RequestMapping("/api")
public class Controller {

    @Autowired
    StudentRepository repository;

    @GetMapping("/students")
    public ResponseEntity<List<Student>> findStudents(@RequestParam(required = false) int id) {
        try {
            List<Student> students = new ArrayList<Student>();
            if (id >= 0) {
                repository.findAll().forEach(students::add);
            }
            else {
                repository.findByID(id);
            }
            if (students.isEmpty()) {
                return new ResponseEntity<>(HttpStatus.NO_CONTENT);
            }
            return new ResponseEntity<>(students, HttpStatus.OK);
        }
        catch (Exception e) {
            return new ResponseEntity<>(null, HttpStatus.I_AM_A_TEAPOT);
        }
    }
}
