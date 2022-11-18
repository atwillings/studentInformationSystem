package com.example.demo.Model;


import java.util.Arrays;
import java.util.List;

public class Student {

    private int studentID;
    private String studentName;
    private Classes[] classes;

    public Student()  {
    }

    public Student(int studentID, String studentName) {
        this.studentID = studentID;
        this.studentName = studentName;
    }


    public int getStudentID() {
        return studentID;
    }

    public void setStudentID(int studentID) {
        this.studentID = studentID;
    }

    public String getStudentName() {
        return studentName;
    }

    public void setStudentName(String studentName) {
        this.studentName = studentName;
    }

    public void setClasses(Classes[] classes) {
        this.classes = classes;
    }

    public Classes[] getClasses() {
        return classes;
    }

    @Override
    public String toString() {
        return "Student{" +
                "studentID=" + studentID +
                ", studentName='" + studentName + '\'' +
                ", classes=" + Arrays.toString(classes) +
                '}';
    }
}
