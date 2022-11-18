package com.example.demo.Model;

public class Classes {

    private String className;
    private char grade;

    public Classes() {
    }


    public Classes(String className, char grade) {
        this.className = className;
        this.grade = grade;
    }

    public String getClassName() {
        return className;
    }

    public void setClassName(String className) {
        this.className = className;
    }

    public char getGrade() {
        return grade;
    }

    public void setGrade(char grade) {
        this.grade = grade;
    }
}
