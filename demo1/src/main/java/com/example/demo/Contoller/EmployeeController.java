package com.example.demo.Contoller;

import com.example.demo.Model.ClassData;
import com.example.demo.Model.Classes;
import com.example.demo.Model.Student;
import com.example.demo.Repo.EmployeeRepository;
import com.example.demo.Repo.StudentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;

@RestController
@RequestMapping("/api/teacher")
public class EmployeeController {

    @Autowired
    EmployeeRepository repository;

    @Autowired
    StudentRepository studentRepository;



    @PutMapping("/students/{id}")
    public ResponseEntity<String> updateStudent(@PathVariable("id") int id, @RequestBody Student student) {

        if (student != null) {
            student.setStudentID(id);
            student.setStudentName(student.getStudentName());
            studentRepository.update(student);
            return new ResponseEntity<>("[UPDATE] " + student.getStudentName() + " was updated.", HttpStatus.OK);
        } else {
            return new ResponseEntity<>("[ERROR] Student was not found.", HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }
    @PutMapping("/teacher/student/{classID}")
    public ResponseEntity<String> updateGrade(@PathVariable int classID, @RequestBody Student student, @RequestBody char grade) {
        List<Classes> classes = studentRepository.getClass(student.getStudentID());
        ClassData data = studentRepository.getClassData(classID);
        for (Classes classes1 : classes) {
            if (classID == classes1.getClassID()) {
                repository.updateGrade(student.getStudentID(), data.getTeacherID(), classID, grade);
                return new ResponseEntity<String>("[SUCC] Grade updated", HttpStatus.OK);
            }
        }
        return new ResponseEntity<String>("[FAILED] :(", HttpStatus.NOT_FOUND);
    }

}
