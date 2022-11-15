package com.example.demo;

import com.example.demo.Model.Student;
import com.example.demo.Repo.StudentJdbcRepo;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.web.servlet.support.SpringBootServletInitializer;

@SpringBootApplication
public class Demo1Application extends SpringBootServletInitializer {
    public static void main(String[] args) {
        SpringApplication.run(Demo1Application.class, args);
        Student student = new Student(1, "John Doe");
        Student student2 = new Student(2, "Jane Smith");

        StudentJdbcRepo template = new StudentJdbcRepo();

        template.create(student);
        template.create(student2);
    }

}
